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
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            $request->session()->flash('warning', 'Artikal je već na listi');
            return redirect()->route('cart.index');
        }

        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('\App\Models\Product');

        $request->session()->flash('success', 'Artikal je dodan na listu za upit');
        return redirect()->route('cart.index');
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
        return response()->json(['success' => true]);
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

        Session::flash('success', 'Artikal je izbrisan sa liste');
        return back();
    }
}
