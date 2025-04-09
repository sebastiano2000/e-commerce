<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Products</h1>
        <button wire:click="addProduct" class="bg-green-500 text-white px-4 py-2 my-2 rounded hover:bg-green-600 transition">
            Add Product
        </button>
    </div>

    <div class="flex items-center gap-4 mb-4">
        <input type="text" wire:model="search" placeholder="Search products..." class="w-full p-2 border rounded">
        <button wire:click="searchProducts" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Search
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">#</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Category</th>
                <th class="border p-2">Price</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody wire:poll.500ms>
            @foreach ($products as $product)
                <tr>
                    <td class="border p-2">{{ $product->id }}</td>
                    <td class="border p-2">{{ $product->name }}</td>
                    <td class="border p-2">
                        {{ $product->category?->name ?? 'N/A' }}
                    </td>
                    <td class="border p-2">${{ $product->price }}</td>
                    <td class="border p-2 flex gap-2">
                        <button wire:click="editProduct({{ $product->id }})" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                        <button wire:click="deleteProduct({{ $product->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Add New Product Modal -->
    @if($addingProduct)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded shadow-lg w-96">
                <h2 class="text-xl font-bold mb-2">Add New Product</h2>
                <input type="text" wire:model.defer="newProduct.name" class="border w-full p-2 mb-2" placeholder="Product Name">
                <input type="number" wire:model.defer="newProduct.price" class="border w-full p-2 mb-2" placeholder="Product Price">

                <!-- Category Dropdown -->
                <select wire:model.defer="newProduct.category_id" class="border w-full p-2 mb-4">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <div class="flex justify-end">
                    <button wire:click="cancelAdd" class="bg-gray-500 text-white px-3 py-1 rounded mr-2 hover:bg-gray-600 transition">
                        Cancel
                    </button>
                    <button wire:click="saveNewProduct" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition">
                        Save
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Edit Product Modal -->
    @if($editingProduct)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded shadow-lg w-96">
                <h2 class="text-xl font-bold mb-2">Edit Product</h2>

                <input type="text" wire:model.defer="editingProduct.name" class="border w-full p-2 mb-2">
                <input type="number" wire:model.defer="editingProduct.price" class="border w-full p-2 mb-2">

                <!-- Category Dropdown -->
                <select wire:model.defer="editingProduct.category_id" class="border w-full p-2 mb-4">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <div class="flex justify-end">
                    <button wire:click="$set('editingProduct', null)" class="bg-gray-500 px-3 py-1 text-white rounded mr-2">Cancel</button>
                    <button wire:click="saveEdit" class="bg-blue-500 px-3 py-1 text-white rounded">Save</button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    Livewire.on('productUpdated', () => {
        Livewire.emit('refreshComponent');
    });
</script>
