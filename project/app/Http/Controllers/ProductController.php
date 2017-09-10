<?php

namespace App\Http\Controllers;

use App\Http\Requests\VaridateProduct;
use App\Products;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use App\Pro_cat;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $product = Products::with('pro_cat')->orderBy('id', 'desc')->paginate(5);
        return view('product.index', [
            'products' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $pro_cat = Pro_cat::pluck('name', 'id');
        return view('product.create', ['cat_id' => $pro_cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VaridateProduct $request) {
        $products = new products();
        $products->cat_id = $request->cat_id;
        $products->pro_name = $request->pro_name;
        $products->pro_code = $request->pro_code;
        $products->pro_price = $request->pro_price;
        $products->stock = $request->stock;
        $products->pro_info = $request->pro_info;

        //upload image
        if ($request->hasFile('pro_img')) {
            $newfilename = str_random(10) . '.' .
                            $request->file('pro_img')
                            ->getClientOriginalExtension();
            $request->file('pro_img')
                    ->move(public_path() . '/images/product/', $newfilename);

            Image::make(public_path() . '/images/product/' . $newfilename)
                    ->resize(300, 310)
                    ->save(public_path() . '/images/product_resize/' . $newfilename);
            $products->pro_img = $newfilename;
        }
        $products->save();
        $request->session()->flash('insert', 'บันทึกสินค้าเรียบร้อยแล้ว');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Products::find($id);
        return view('product.show', [
            'products' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pro_cat = Pro_cat::pluck('name', 'id');
        $product = Products::find($id);
        return view('product.edit', [
            'cat_id' => $pro_cat,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VaridateProduct $request, $id) {
        $products = Products::find($id);
        $products->cat_id = $request->cat_id;
        $products->pro_name = $request->pro_name;
        $products->pro_code = $request->pro_code;
        $products->pro_price = $request->pro_price;
        $products->spl_price = $request->spl_price;
        $products->stock = $request->stock;
        $products->pro_info = $request->pro_info;
        if ($request->hasFile('pro_img')) {
            //delete file
            if ($products->pro_img != 'nopic.jpg') {
                File::delete(public_path() . '\\images\product\\' . $products->pro_img);
                File::delete(public_path() . '\\images\product_resize\\' . $products->pro_img);
            }

            $newfilename = str_random(10) . '.' .
                    $request->file('pro_img')->getClientOriginalExtension();
            $request->file('pro_img')
                    ->move(public_path() . '/images/product/', $newfilename);

            //rezise image
            Image::make(public_path() . '/images/product/' . $newfilename)
                    ->resize(300, 310)
                    ->save(public_path() . '/images/product_resize/' . $newfilename);
            $products->pro_img = $newfilename;
        } else {
            $products->pro_img = $products->pro_img;
        }
        $products->save();
        $request->session()->flash('update', 'แก้ไขสินค้าเรียบร้อยแล้ว');
        return redirect()->action('ProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $products = Products::find($id);
        if ($products->pro_img != 'nopic.jpg') {
            File::delete(public_path() . '\\images\product\\' . $products->pro_img);
            File::delete(public_path() . '\\images\product_resize\\' . $products->pro_img);
        }
        $products->delete();
        return back();
    }

}
