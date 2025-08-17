<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        $carts = Cart::where('user_id', auth()->id())->get();

        return view('index', compact(['products', 'carts']));
    }
}
