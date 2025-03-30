<div>
    <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
    <img src="{{ $product->image_url }}" class="w-full h-64 object-cover mt-4">
    <p class="text-gray-600 mt-4">{{ $product->description }}</p>
    <p class="text-lg font-bold text-gray-800">${{ number_format($product->price, 2) }}</p>
    
    <button wire:click="addToCart({{ $product->id }})" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded">Add to Cart</button>
</div>
