<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pro_cat;

class Pro_catController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cat = Pro_cat::paginate(5);
        return view('category.index', ['cats' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
                ], [
            'name.required' => 'กรุณกรอกประเภทสินค้า',
        ]);
        $pro_cat = new Pro_cat;
        $pro_cat->name = $request->name;
        $pro_cat->status = $request->status;
        $pro_cat->save();
        $request->session()->flash('success', 'บันทึกประเภทสินค้าแล้ว');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $cat_id = Pro_cat::find($id);
        return view('category.edit', [
            'cats' => $cat_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
                ], [
            'name.required' => 'กรุณกรอกประเภทสินค้า',
        ]);
        $pro_cat = Pro_cat::find($id);
        $pro_cat->name = $request->name;
        $pro_cat->status = $request->status;
        $pro_cat->save();
        $request->session()->flash('success', 'แก้ไขประเภทสินค้าแล้ว');
        return redirect()->action('Pro_catController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pro_cat = Pro_cat::find($id);
        $pro_cat->delete();
        return back();
    }

}
