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
        $pagination = 10;
        $categories = Category::all();

        if (request()->id) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('category_id', request()->id);
            })->paginate($pagination);
            $categoryName = $categories->where('slug', request()->category);
            $categoryName = $categoryName->first() ? $categoryName->first()->name : 'Nepostoji kategorija ' . request()->category;
        } else {
            $products = Product::paginate($pagination);
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
