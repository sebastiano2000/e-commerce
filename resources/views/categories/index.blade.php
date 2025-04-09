@extends('components.layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
        <a href="{{ route('categories.create') }}" class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
            + Add Category
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 border-b text-gray-700">#</th>
                    <th class="p-4 border-b text-gray-700">Category Name</th>
                    <th class="p-4 border-b text-gray-700 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-600">{{ $category->id }}</td>
                        <td class="p-4 text-gray-700 font-medium">{{ $category->name }}</td>
                        <td class="p-4 flex justify-center space-x-4">
                            <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 transition">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
