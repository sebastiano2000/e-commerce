<div>
    <h2 class="text-2xl font-bold mb-4">Categories</h2>
    @foreach($categories as $category)
    <div class="p-4 bg-white rounded shadow mb-2">
        <h3 class="text-lg font-semibold">{{ $category->name }}</h3>
        @if($category->subcategories)
            <ul class="ml-4">
                @foreach($category->subcategories as $sub)
                <li>{{ $sub->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    @endforeach
</div>
