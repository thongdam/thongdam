<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'qty' => 'required|numeric|min:1'
        ];
    }
    public function messages() {
        return[
            'qty.numeric' => 'กรุณากรอกจำนวนสิ้นค้าเป็นตัวเลขเท่านั้น.',
            'qty.required' => 'กรุณากรอกจำนวนสินค้า.',
            'qty.min' => 'จำนวนสินค้าต้องมากกว่าศูนย์.'
        ];
    }
}
