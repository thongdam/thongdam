<?php

namespace App\Http\Controllers;

use App\Products;
use App\Http\Requests\CheckoutValidate;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller {

    public function index() {
        $cartitems = Cart::content();
        return view('cart.index', compact('cartitems'));
    }

    public function additem(Request $request, $id) {
        $products = Products::find($id);
        Cart::add($id, $products->pro_name, 1, $products->pro_price, [
            'img' => $products->pro_img,
            'stock' => $products->stock,
            'pro_code' => $products->pro_code,
        ]);
        $request->session()->flash('status', 'สินค้าถูกเพิ่มลงในตะกร้าแล้ว.');
        return back();
    }

    public function destroy($id) {
        Cart::remove($id);
        return back();
    }

    public function updatecart(CheckoutValidate $request, $id) {
        $qty = $request->qty;
        $pro_id = $request->pro_id;
        $products = Products::find($pro_id);
        $stock = $products->stock;
        if ($qty < $stock) {
            Cart::update($id, $request->qty);
            $request->session()->flash('success', 'อัพเดทตะกร้าสินค้าเรียบร้อย.');
            return back();
        } else {
            $request->session()->flash('error', 'สินค้าในสต๊อกไม่เพียงพอ.');
            return back();
        }
    }

}
