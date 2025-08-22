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
        'modal_price',
        'discount',
        'stock',
        'weight',
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
