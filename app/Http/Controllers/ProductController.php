<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products with optional sorting & searching.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Display the specified product details.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
