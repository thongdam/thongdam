<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //  {
    // $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = DB::table('pro_cat')
                ->join('products', 'products.cat_id', '=', 'pro_cat.id')
                ->where('pro_cat.status', '=', 1)
                ->orderBy('products.id', 'desc')
                ->paginate(9);
        $slide = DB::table('pro_cat')
                ->join('products', 'products.cat_id', '=', 'pro_cat.id')
                ->where('pro_cat.status', '=', 1)
                ->orderBy('products.id', 'desc')
                ->get();
        return view('front.home', [
            'products' => $products,
            'slide' => $slide,
        ]);
    }

    public function shop() {
        $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->paginate(9);
        $slide = DB::table('pro_cat')
                ->join('products', 'products.cat_id', '=', 'pro_cat.id')
                ->where('pro_cat.status', '=', 1)
                ->orderBy('products.id', 'desc')
                ->get();
        return view('front.shop', [
            'products' => $products,
            'slide' => $slide,
        ]);
    }

    public function proCat(Request $request) {
        $id = $request->name;
        $products = DB::table('pro_cat')
                ->join('products', 'pro_cat.id', '=', 'products.cat_id')
                ->where('pro_cat.name', '=', $id)
                ->orderBy('products.cat_id')
                ->paginate(9);
        $slide = DB::table('pro_cat')
                ->join('products', 'products.cat_id', '=', 'pro_cat.id')
                ->where('pro_cat.status', '=', 1)
                ->orderBy('products.id', 'desc')
                ->get();
        return view('front.shop', [
            'products' => $products,
            'slide' => $slide,
        ]);
    }

    public function product_details($id) {
        $product = Products::find($id);
        $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->get();
        return view('front.product_details', [
            'product' => $product,
            'products' => $products
        ]);
    }

    public function search(Request $request) {
        $search = $request->search_data;
        $slide = DB::table('pro_cat')
                ->join('products', 'products.cat_id', '=', 'pro_cat.id')
                ->where('pro_cat.status', '=', 1)
                ->orderBy('products.id', 'desc')
                ->get();
        $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->where('pro_name', 'like', '%' . $search . '%')
                ->paginate();
        return view('front.home', [
            'msg' => 'ผลการค้นหา : ' . $search], compact('products','slide'));
    }

}
