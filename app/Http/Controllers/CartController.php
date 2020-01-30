<?php

namespace App\Http\Controllers;

use App\cart;
use App\cartproduct;
use App\Product;
use Auth;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.products.cart');
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
    public function storeproducts(Request $request, $id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userCart = cart::where('userid', $userId)->first();
            $productprice = Product::where('id', $id)->pluck('price')->first();

            if ($userCart) {
                $productCart = cartproduct::where('productid', $id)->where('userid', Auth::user()->id)->first();
                if ($productCart) {
                    $productCart->quantity = $request->quantity;
                    $productCart->update();
                } else {
                    // dd('empty');
                    $cartproduct = new cartproduct();
                    $cartproduct->userid = $userId;
                    $cartproduct->cartid = $userCart->id;
                    $cartproduct->productid = $id;
                    $cartproduct->priceproduct = $productprice;
                    $cartproduct->quantity = $request->quantity;
                    $cartproduct->save();
                }
            } else {

                /////////// add user cart/////////
                $cart = new cart();
                $cart->userid = $userId;
                $cart->save();
                //////////  cart products/////////
                $lastid = $cart->id;
                $cartproduct = new cartproduct();
                $cartproduct->userid = $userId;
                $cartproduct->cartid = $lastid;
                $cartproduct->priceproduct = $productprice;
                $cartproduct->productid = $id;
                $cartproduct->quantity = $request->quantity;
                $cartproduct->save();
            }
            return redirect()->route('show');
        } else {
            return view('auth.login');
        }

    }
    public function storeproduct($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userCart = cart::where('userid', $userId)->first();
            $productprice = Product::where('id', $id)->pluck('price')->first();
            
            if ($userCart) {
                $productCart = cartproduct::where('productid', $id)->first();
                if ($productCart) {
                    $productCart->quantity = 1;
                    $productCart->update();
                } else {
                    $cartproduct = new cartproduct();
                    $cartproduct->userid = $userId;
                    $cartproduct->cartid = $userCart->id;
                    $cartproduct->productid = $id;
                    $cartproduct->priceproduct = $productprice;
                    $cartproduct->quantity = 1;
                    $cartproduct->save();
                }
            } else {
                /////////// add user cart/////////
                $cart = new cart();
                $cart->userid = $userId;
                $cart->save();
                //////////  cart products/////////
                $cartproduct = new cartproduct();
                $cartproduct->userid = $userId;
                $cartproduct->cartid = $cart->id;
                $cartproduct->productid = $id;
                $cartproduct->priceproduct = $productprice;
                $cartproduct->quantity = 1;
                $cartproduct->save();
            }
            return redirect()->route('show');
        } else {
            return view('auth.login');
        }

    }
    public function showcart()
    {
        $userId = Auth::id();
        $cartproducts = cartproduct::where('userid', $userId)->pluck('productid')->toArray();
        $userCart = cart::where('userid', Auth::user()->id)->first();
        $products = cartproduct::where('cartid', $userCart->id)->get();
        $productIds = cartproduct::where('cartid', $userCart->id)->pluck('productid')->toArray();
        $totalprice = cartproduct::whereIN('productid', $productIds)->where('userid', Auth::user()->id)->select(DB::raw('sum( priceproduct * quantity) as Total'))->first();
        return view('website.products.cart', compact('products', 'totalprice'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach ($request->quantity as $key => $value) {
            $q = cartproduct::find($key);
            $q->quantity = $value;
            $q->save();
        }
        return redirect()->route('show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cartproduct::where('id', $id)->where('userid', Auth::user()->id)->delete();
        return redirect()->route('show');
    }
}
