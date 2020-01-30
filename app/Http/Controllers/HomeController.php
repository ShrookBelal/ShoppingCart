<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
    public function index2()
    {
        $categ = Category::all();
        return view('website.home', compact('categ'));
    }
    public function search(Request $request)
    {
        $search = Product::orwhere('categoryid', $request->category)->orWhere('price', $request->price)->orWhere('name', $request->name)->get();
        if ($search == null) {
            return 'sorry,there is no categores like what you want';
        } else {
            return view('website.search', compact('search'));
        }
    }
}
