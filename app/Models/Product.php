<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image_url'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
