<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    const STATUS_AVAILABLE = 'available';
    const STATUS_OUT_OF_ORDER = 'out_of_order';

    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Define image validation rules.
        ]);

        // Handle image upload and storage.
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Store the image in the "public" disk under the "images" directory.
            $imageUrl = asset('storage/' . $imagePath); // Corrected
        } else {
            $imageUrl = null; // If no image was provided, set it to null.
        }

        // Create the product with the image URL.
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
            'image' => $imageUrl, // Store the image URL in the 'image' field.
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $statuses = [self::STATUS_AVAILABLE, self::STATUS_OUT_OF_ORDER];
        $categories = Category::all();
        return view('products.edit', compact('product', 'statuses', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable',
            'status' => 'required|in:' . implode(',', [self::STATUS_AVAILABLE, self::STATUS_OUT_OF_ORDER]),
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
