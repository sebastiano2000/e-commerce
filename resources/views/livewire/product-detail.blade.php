<div>
    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
    <p class="mb-2">{{ $product->description }}</p>
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
</div>
