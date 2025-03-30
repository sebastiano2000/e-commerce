<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductList extends Component
{
    public $search = '';
    public $editingProduct = null; // Initialize it here
    public $products;
    public $addingProduct = false;
    public $newProduct = [
        'name'  => '',
        'price' => '',
    ];
    protected $rules = [
        'editingProduct.name' => 'required|string|max:255',
        'editingProduct.price' => 'required|numeric|min:0',
        'newProduct.name' => 'required|string|max:255',
        'newProduct.price' => 'required|numeric|min:0',
    ];
    protected $listeners = ['productUpdated' => '$refresh'];

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::all();
    }

    public function editProduct($productId)
    {
        $this->editingProduct = Product::find($productId)->toArray();
    }

    public function edit(Product $product)
    {
        $this->editingProduct = $product;
    }

    public function delete($productId)
    {
        Product::findOrFail($productId)->delete();
        session()->flash('message', 'Product deleted successfully.');
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.product-list', compact('products'));
    }

    public function saveEdit()
    {
        if ($this->editingProduct && isset($this->editingProduct['id'])) {
            $product = Product::find($this->editingProduct['id']);

            if ($product) {
                $product->update([
                    'name' => $this->editingProduct['name'],
                    'price' => $this->editingProduct['price'],
                ]);

                session()->flash('message', 'Product updated successfully.');
                
                // Reset editing product & refresh list instantly
                $this->editingProduct = null;
            }
        }
    }

    // Add product methods
    public function addProduct()
    {
        $this->addingProduct = true;
    }

    public function cancelAdd()
    {
        $this->addingProduct = false;
        $this->newProduct = ['name' => '', 'price' => ''];
    }

    public function saveNewProduct()
    {
        $this->validate([
            'newProduct.name'  => 'required|string|max:255',
            'newProduct.price' => 'required|numeric|min:0',
        ]);

        Product::create($this->newProduct);

        session()->flash('message', 'Product added successfully.');
        $this->addingProduct = false;
        $this->reset('newProduct');
    }
}
