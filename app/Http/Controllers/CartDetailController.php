<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request) {
        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        $notification = 'Has agregado el producto correctamente';
        return back()->with(compact('notification'));
    }

    public function destroy(Request $request) {
        $cartDetail = CartDetail::find($request->id_to_delete);
        if($cartDetail->cart_id == auth()->user()->cart->id)
        $cartDetail->delete();

        $notification = 'Has eliminado el producto correctamente';
        return back()->with(compact('notification'));
    }
}
