<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
   public function update()
   {
       $cart = auth()->user()->cart;
       $cart->status = 'Pending';
       $cart->save();

       $notification = "Tu pedido se registró correctamente, te avisaremos cuando se procese.";
       return back()->with(compact('notification'));
   }
}
