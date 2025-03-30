<div>
    <h2 class="text-2xl font-bold mb-4">Checkout</h2>
    <input type="text" wire:model="name" placeholder="Full Name" class="border p-2 w-full mb-2">
    <input type="text" wire:model="address" placeholder="Address" class="border p-2 w-full mb-2">
    <button wire:click="placeOrder()" class="bg-blue-500 text-white px-6 py-2 rounded">Place Order</button>
</div>
