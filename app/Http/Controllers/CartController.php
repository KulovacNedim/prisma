<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPrice = 0;
        foreach (Cart::content() as $item) {
            $totalPrice = $totalPrice + $item->price;
        };
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('cart.index')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'priceWithDelivary' => $totalPrice + 7
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->id);
        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('\App\Models\Product');
        return response()->json(['quantity' => Cart::count()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer'
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Kolicina mora biti cijeli broj');
        }

        Cart::update($id, $request->quantity);
        $subtotal = null;
        try {
            $newPrice = Cart::get($id);
            $subtotal = round($newPrice->price * $newPrice->qty, 2);
        } catch (\Throwable $th) {
            error_log('Cart item with id ' . $id . ' deleted');
        }
        return response()->json([
            'quantity' => Cart::count(),
            'subtotal' => $subtotal,
            'cartSubtotal' => Cart::subtotal(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return response()->json([
            'quantity' => Cart::count(),
            'cartSubtotal' => Cart::subtotal(),
        ]);
    }
}
