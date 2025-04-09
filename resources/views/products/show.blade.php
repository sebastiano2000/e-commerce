@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div>
        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
        <p class="mb-4">{{ $product->description }}</p>
        <p class="mb-4">Price: ${{ number_format($product->price, 2) }}</p>
        
        <div>
            <strong>Sub Categories:</strong>
            @if($product->categories->isNotEmpty())
                <ul class="list-disc pl-5">
                    @foreach($product->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            @else
                <span>None</span>
            @endif
        </div>
        <div>
            <strong>Product Image:</strong>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-64 h-auto">
            @else
                <span>No image available.</span>
            @endif
        </div>
    </div>
</div>
@endsection
