<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of orders for the authenticated customer.
     */
    public function index()
    {
        if (Auth::check()) {
            $orders = Order::where('customer_id', Auth::id())->paginate(10);
        } else {
            return redirect()->route('login')->with('error', 'Please log in to view your orders.');
        }

        return view('orders.index', compact('orders'));
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        // Ensure that the order belongs to the logged-in customer.
        if (Auth::check() && $order->customer_id != Auth::id()) {
            abort(403, 'Unauthorized access.');
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Cancel the specified order.
     */
    public function cancel(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Ensure the order belongs to the authenticated user.
        if (Auth::check() && $order->customer_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Update the order status to "cancelled".
        $order->update(['status' => 'cancelled']);

        return redirect()->route('orders.index')
                         ->with('success', 'Order cancelled successfully.');
    }
}
