<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaridateProduct extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'cat_id' => 'required',
            'pro_name' => 'required',
            'pro_code' => 'required|max:6',
            'pro_price' => 'required|numeric',
            'stock' => 'required|numeric'
        ];
    }

    public function messages() {
        return[
            'cat_id.required' => 'กรุณาเลือกหมวดสินค้า',
            'pro_name.required' => 'กรุณากรอกชื่อสินค้า',
            'pro_code.required' => 'กรุณากรอกรหัสสินค้า',
            'pro_code.max' => 'คุณกรอกรหัสสินค้าค้าเกิน 6 ตัว',
            'pro_price.required' => 'กรุณากรอกราคา',
            'pro_price.numeric' => 'กรุณากรอกราคาเป็นตัวเลข',
            'stock.required' => 'กรุณากรอกสต๊อกสินค้า',
            'stock.numeric' => 'กรุณากรอกเป็นตัวเลข',
        ];
    }

}
