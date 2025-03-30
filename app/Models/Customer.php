<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
