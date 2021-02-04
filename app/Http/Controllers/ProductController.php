<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data = ['name' => 'Elektrprizma', 'products' => $products];

        return view('products.index', $data);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', ["product" => $product]);
    }

    public function store()
    {
        $product = new Product();
        $product->name = request('name');
        $product->colors = request('colors');
        $product->save();
        return redirect('/')->with('msg', 'Thanks for your order!');
    }

    public function create()
    {
        return view('products.create');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products');
    }
}
