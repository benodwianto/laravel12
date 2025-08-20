<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'modal_price' => 'required|numeric',
            'price' => 'required|numeric',
            'dicount' => 'numeric',
            'stock' => 'required|numeric',
            'weight' => 'numeric',
        ]);

        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);

        Product::create([
            'image' => $image_name,
            'title' => $request->title,
            'description' => $request->description,
            'modal_price' => $request->modal_price,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'weight' => $request->weight
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'modal_price' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'numeric',
            'stock' => 'required|numeric',
            'weight' => 'numeric',
        ]);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->modal_price = $request->modal_price;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->weight = $request->weight;

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $product->image = $image_name;
        }

        $product->save();

        return redirect()->route('products.show', $product->id)
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
