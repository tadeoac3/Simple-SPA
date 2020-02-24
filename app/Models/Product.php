<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'is_cart'];

    public function scopeInCart($query)
    {
        return $query->whereIsCart(true);
    }
}
