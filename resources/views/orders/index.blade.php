@extends('components.layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">My Orders</h2>
    @foreach($orders as $order)
        <div class="bg-white p-4 rounded shadow mb-4">
            <p>Order #{{ $order->id }}</p>
            <p>Total: ${{ number_format($order->total_price, 2) }}</p>
            <p>Status: <span class="font-semibold">{{ ucfirst($order->status) }}</span></p>
            <button wire:click="cancelOrder({{ $order->id }})" class="text-red-500">Cancel</button>
        </div>
    @endforeach
@endsection
