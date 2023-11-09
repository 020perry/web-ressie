<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    const STATUS_AVAILABLE = 'available';
    const STATUS_OUT_OF_ORDER = 'out_of_order';

    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function fetchProducts()
    {
        $products = Product::all()->map(function ($product) {
            if ($product->image) {
                // Generate the full URL for the image path
                $product->image = asset('storage/' . $product->image);
            }
            return $product;
        });
        return response()->json($products);
    }


    public function create()
    {
        $statuses = [self::STATUS_AVAILABLE, self::STATUS_OUT_OF_ORDER];
        $categories = Category::all();
        return view('products.create', compact('statuses', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'status' => 'required|in:' . implode(',', [self::STATUS_AVAILABLE, self::STATUS_OUT_OF_ORDER]),
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath, // Save only the image path
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        if (request()->ajax()) {
            $statuses = [self::STATUS_AVAILABLE, self::STATUS_OUT_OF_ORDER];
            $categories = Category::all();
            return response()->json([
                'product' => $product,
                'statuses' => $statuses,
                'categories' => $categories,
            ]);
        }

        // If it's not an AJAX request, continue with the original behavior
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'status' => 'required|in:' . implode(',', [Product::STATUS_AVAILABLE, Product::STATUS_OUT_OF_ORDER]),
            'category_id' => 'required|exists:categories,id',
            // Make the image rule conditional on the image being present in the request
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $updateData = $request->only(['name', 'description', 'price', 'status', 'category_id']);


        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists and is not a placeholder
            if ($product->image && !Str::contains($product->image, 'placeholder')) {
                Storage::delete('public/' . $product->image);
            }

            // Store the new image and update the image path
            $updateData['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($updateData);

        // If the request is an AJAX request, return JSON response
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                // Return the existing image URL if no new image was uploaded
                'imageUrl' => $request->hasFile('image') ? asset('storage/' . $updateData['image']) : asset('storage/' . $product->image),
            ]);
        }

        // If it's not an AJAX request, continue with the original behavior
        return redirect('/dashboard')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
