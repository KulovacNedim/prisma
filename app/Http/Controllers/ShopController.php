<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $data = ['products' => $products];

        return view('shop.index', $data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($productId, $slug)
    {
        $product = Product::where('id', $productId)->firstOrFail();
        return view('shop.show')->with('product', $product);
    }
}
