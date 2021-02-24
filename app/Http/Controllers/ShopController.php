<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        if (request()->id) {
            $categories = Category::all();
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('category_id', request()->id);
            })->get();
            $categoryName = $categories->where('slug', request()->category);
            $categoryName = $categoryName->first() ? $categoryName->first()->name : 'Nepostoji kategorija ' . request()->category;
        } else {
            $categories = Category::all();
            $products = Product::all();
            $categoryName = 'Svi artikli';
        }

        return view('shop.index')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
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
        $mightAlsoLike = Product::where('id', '!=', $productId)->mightAlsoLike()->get();
        return view('shop.show')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }
}
