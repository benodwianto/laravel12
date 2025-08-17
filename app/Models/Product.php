<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'discount',
        'stock'
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
