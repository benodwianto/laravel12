<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        $cart[$request->product_id] = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }
}
