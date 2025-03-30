@extends('components.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Price</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update Product</button>
    </form>
</div>
@endsection
