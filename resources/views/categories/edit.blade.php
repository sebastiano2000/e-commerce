@extends('components.layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white shadow-md rounded p-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Category Name:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="parent_id" class="block text-gray-700">Parent Category (Optional):</label>
            <select id="parent_id" name="parent_id" class="w-full px-4 py-2 border rounded-lg">
                <option value="">None</option>
                @foreach ($categories as $parentCategory)
                    <option value="{{ $parentCategory->id }}" {{ $category->parent_id == $parentCategory->id ? 'selected' : '' }}>
                        {{ $parentCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Update</button>
    </form>

    <a href="{{ route('categories.index') }}" class="text-blue-500 mt-4 inline-block">Back to Categories</a>
</div>
@endsection
