<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'customer_name', 'email', 'quantity', 'total_price', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
