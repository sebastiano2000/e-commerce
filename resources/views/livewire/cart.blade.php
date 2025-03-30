<div>
    <h2 class="text-2xl font-bold mb-4">Shopping Cart</h2>
    @foreach($cartItems as $item)
    <div class="flex justify-between p-4 bg-white rounded shadow mb-2">
        <span>{{ $item->name }}</span>
        <span>${{ number_format($item->price, 2) }}</span>
        <button wire:click="removeFromCart({{ $item->id }})" class="text-red-500">Remove</button>
    </div>
    @endforeach

    <button wire:click="checkout()" class="mt-4 bg-green-500 text-white px-6 py-2 rounded">Checkout</button>
</div>
