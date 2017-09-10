<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('profile.index');
    }

    public function thankyou() {
        return view('profile.thankyou');
    }

    public function orders() {
        $user_id = Auth::user()->id;
        $orders = DB::table('orders_products')
                ->Join('orders', 'orders.id', '=', 'orders_products.orders_id')
                ->Join('products', 'products.id', '=', 'orders_products.products_id')
                ->where('orders.user_id', '=', $user_id)
                ->get();
        return view('profile.orders', compact('orders'));
    }

    public function Address() {
        $user_id = Auth::user()->id;
        $address_data = DB::table('address')->where('user_id', '=', $user_id)->get();
        return view('profile.address', compact('address_data'));
    }

    public function UpdateAddress(Request $request) {
        $this->validate($request, [
            'fullname' => 'required|max:50',
            'phone' => 'required|numeric',
            'address' => 'required',
            'amphur' => 'required',
            'province' => 'required',
            'zipcode' => 'required|numeric',
            'district' => 'required'
                ], [
            'fullname.required' => 'กรุณากรอกชื่อ-สกุล',
            'phone.required' => 'กรุณากรอกเบอร์โทร',
            'phone.numeric' => 'กรุณากรอกเบอร์โทรให้เป็นตัวเลขเท่านั้น',
            'address.required' => 'กรุณากรอกกรอกที่อยู่',
            'district.required' => 'กรุณากรอกแขวงหรือตำบล',
            'amphur.required' => 'กรุณาเลือกเขตหรืออำเภอ',
            'province.required' => 'กรุณาเลือกจังหวัด',
            'zipcode.required' => 'กรุณากรอกรหัสไปษณีย์',
            'zipcode.numeric' => 'กรุณากรอกรหัสไปษณีย์เป็นตัวเลขเท่านั้น',
        ]);
        $user_id = Auth::user()->id;
        DB::table('address')
                ->where('user_id', $user_id)
                ->update($request->except('_token'));
        $request->session()->flash('status', 'อัพเดทที่อยู่เรียบร้อย.');
        return back();
    }

    public function password() {
        return view('profile.updatePassword');
    }

    public function UpdatePassword(Request $request) {
        $this->validate($request, [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
                ], [
            'old_password.required' => 'กรุณากรอกรหัสผ่านปัจจุ',
            'old_password.min' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร',
            'new_password.required' => 'กรุณากรอกรหัสผ่านใหม่',
            'new_password.min' => 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร',
        ]);

        $old_password = $request->old_password;
        $new_password = $request->new_password;

        if (!Hash::check($old_password, Auth::user()->password)) {
            $request->session()->flash('status', 'รหัสผ่านปัจจุบันของคุณไม่ถูกต้อง!');
            return back();
        } else {
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            $request->session()->flash('success', 'การเปลี่ยนรหัสผ่านใหม่เรียบร้อยแล้ว.');
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
