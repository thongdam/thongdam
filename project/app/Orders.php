<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Auth;
use App\Products;
class Orders extends Model {

    protected $fillable = ['total', 'status'];

    public function orderFields() {
        return $this->belongsToMany(products::class)->withPivot('qty', 'total');
    }

    public static function createOrder() {
        $user = Auth::user();
        $order = $user->Orders()->create(['total' => Cart::subtotal(), 'status' => 'รอดำเนินการ']);
        $cartitems = Cart::content();
        foreach ($cartitems as $cartitem) {
            $order->orderFields()->attach($cartitem->id, ['qty' => $cartitem->qty, 'total' => $cartitem->qty * $cartitem->price]);
        }
    }

}
