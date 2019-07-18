<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
   public function update()
   {
       $client = auth()->user();
       $cart = auth()->user()->cart;
       $cart->status = 'Pending';
       $cart->order_date = Carbon::now();
       $cart->save();

       $admins = User::where('admin', true)->get();
       try {
        Mail::to($admins)->send(new NewOrder($client, $cart));
       } catch (\Throwable $th) {
           throw $th;
       }

       $notification = "Tu pedido se registró correctamente, te avisaremos cuando se procese.";
       return back()->with(compact('notification'));
   }
}
