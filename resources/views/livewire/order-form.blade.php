<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="placeOrder" class="bg-white p-6 rounded shadow-md">
        <!-- Customer Name -->
        <div class="mb-4">
            <label for="customer_name" class="block text-gray-700 font-medium mb-1">Name</label>
            <input type="text" id="customer_name" wire:model.defer="customer_name" 
                   class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
                   placeholder="Your Name">
            @error('customer_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Customer Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" id="email" wire:model.defer="email" 
                   class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
                   placeholder="Your Email">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Order Quantity -->
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-medium mb-1">Quantity</label>
            <input type="number" id="quantity" wire:model.defer="quantity" 
                   class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" 
                   placeholder="Quantity">
            @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Select Product -->
        <div class="mb-4">
            <label for="product_id" class="block text-gray-700 font-medium mb-1">Product</label>
            <select id="product_id" wire:model.defer="product_id" 
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Select Product --</option>
                @foreach (App\Models\Product::all() as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }} - ${{ number_format($product->price, 2) }}
                    </option>
                @endforeach
            </select>
            @error('product_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
            Place Order
        </button>
    </form>
</div>
