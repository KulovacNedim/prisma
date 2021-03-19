<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
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
        SEOMeta::setTitle('Shop');

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
        $mightAlsoLike = Category::find($product->categories()->first()->id)->products()->mightAlsoLike()->get();

        SEOMeta::setTitle($product->name);
        SEOMeta::setDescription($product->description);

        OpenGraph::setTitle($product->name);
        OpenGraph::setDescription($product->description);
        OpenGraph::addImage(productImage($product->image));

        return view('shop.show')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::search($query)->paginate(12);
        return view('search-results')->with('products', $products);
    }
}
