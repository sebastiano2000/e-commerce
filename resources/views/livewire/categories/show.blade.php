@extends('components.layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">{{ $category->name }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($products as $product)
            <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
                    <p class="text-teal-600 font-medium mb-3">${{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-700 mb-4">{{ Str::limit($product->description, 100) }}</p>
                    <a href="#" class="block text-center bg-gradient-to-r from-teal-500 to-blue-500 text-white py-2 rounded-lg hover:from-teal-600 hover:to-blue-600 transition">View Details</a>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600 col-span-3">No products found.</p>
        @endforelse
    </div>
    
    <!-- Pagination (if using pagination) -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
