<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function history()
    {
        $orders = Order::with('items.product')->where('user_id',
        Auth::id())->latest()->get();
        return view('orders.history', compact('orders'));
    }
   
   public function destroy()
   {

   }
}
