<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Orders;
use Cart;

class CheckoutController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::check()) {
            $cartitems = Cart::content();
            $amphur = DB::table('amphur')->get();
            $province = DB::table('province')->get();
            return view('front.checkout', [
                'amphurs' => $amphur,
                'provinces' => $province,
                'cartitems' => $cartitems,
            ]);
        } else {
            return redirect('login');
        }
    }

    public function formvalidate(Request $request) {
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
        $address = new Address();
        $address->fullname = $request->fullname;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->district = $request->district;
        $address->amphur = $request->amphur;
        $address->province = $request->province;
        $address->zipcode = $request->zipcode;
        $address->user_id = $user_id;
        $address->save();


        Orders::createOrder();
        Cart::destroy();
        return redirect('/thankyou');
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
