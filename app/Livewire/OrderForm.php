<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderForm extends Component
{
    public $customer_name;
    public $email;
    public $quantity = 1;
    // For bonus, you could include a product_id or cart data.

    protected $rules = [
        'customer_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'quantity' => 'required|integer|min:1',
    ];

    public function submitOrder()
    {
        $this->validate();

        // Calculate total price here (for simplicity, assuming $100 each)
        $totalPrice = $this->quantity * 100;

        // Optionally create a customer record or link to an authenticated user.
        $order = Order::create([
            'customer_name' => $this->customer_name,
            'email' => $this->email,
            'quantity' => $this->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Order placed successfully!');
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}
