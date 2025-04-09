@extends('components.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">🛍️ Welcome to the Shop</h1>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-xl">

                <div class="p-5">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500 mt-1">{{ Str::limit($product->description, 90) }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-green-600 font-bold text-md">${{ number_format($product->price, 2) }}</span>
                        <a href="{{ route('products.show', $product->id) }}"
                           class="text-sm bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition">
                            View
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($products->isEmpty())
        <div class="text-center text-gray-500 mt-12">
            <p class="text-lg">No products found. Please check back later!</p>
        </div>
    @endif
</div>
@endsection
