<?php

namespace App\Http\Controllers;

use App\Product;
use App\productimage;
use App\Review;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('website.products.products', compact('product'));
    }


    public function showProduct($id)
    {
        $product = Product::find($id);
        $userId = Auth::id();
        $userrate = Review::where('product_id', $id)->where('user_id', $userId)->pluck('rate')->first();
        // $userreview = Review::where('product_id', $id)->whereNotNull('rate')->pluck('user_id')->toArray();
        $review = Review::where('product_id', $id)->whereNotNull('rate')->get();

        return view('website.products.product', compact('product', 'userrate', 'review'));
    }
    public function like($id)
    {
        $product = Review::where('product_id', $id)->first();

        if ($product->like == 0) {
            $product->like = 1;
            $product->update();
        } elseif ($product->like == 1) {
            $product->like = 0;
            $product->update();
        } else {
            $userId = Auth::id();
            $productLike = new Review();
            $productLike->user_id = $userId;
            $productLike->product_id = $id;
            $productLike->like = 1;
            $productLike->save();
        }
        return redirect()->route('product', ['id' => $id]);
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
        $userId = Auth::id();
        $product = Review::where('product_id', $request->id)->where('user_id', $userId)->where('rate', null)->first();
        if ($product->rate == null) {
            $product->rate = $request->rate;
            $product->review = $request->review;
            $product->update();
        } else {
            $review = new Review();
            $review->user_id = Auth::user()->id;
            $review->product_id = $request->id;
            $review->rate = $request->rate;
            $review->review = $request->review;
            $review->save();
        }
        return redirect()->route('product', ['id' => $request->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
