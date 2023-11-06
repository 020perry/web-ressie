<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu; // Gewijzigd naar Menu-model
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('menu')->get(); // Gewijzigd naar 'menu'
        return view('categories.index', compact('categories'));
    }

    public function fetchCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function create()
    {
        $menus = Menu::all(); // Gewijzigd naar 'Menu'
        return view('categories.create', compact('menus')); // Gewijzigd naar 'menus'
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'menu_id' => 'required|exists:menus,id' // Gewijzigd naar 'menu_id'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $menus = Menu::all(); // Gewijzigd naar 'Menu'
        return view('categories.edit', compact('category', 'menus')); // Gewijzigd naar 'menus'
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'menu_id' => 'required|exists:menus,id' // Gewijzigd naar 'menu_id'
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
