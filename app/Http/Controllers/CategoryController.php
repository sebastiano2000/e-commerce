<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show create category form
    public function create()
    {
        $categories = Category::all(); // Fetch all categories for dropdown (for subcategories)
        return view('categories.create', compact('categories'));
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    // Show edit category form
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit', compact('category', 'categories'));
    }

    // Update category
    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    // Delete category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted');
    }
}
