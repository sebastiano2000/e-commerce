@extends('components.layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800">Welcome to Our eCommerce Store</h1>
        <p class="text-gray-600 mt-2">Find the best products at unbeatable prices.</p>
        
        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                Shop Now
            </a>
        </div>
    </div>
</div>
@endsection
