<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('orders')->orderBy('id', 'Desc')->get();
        return view('admin.orders.orders')->with(compact('orders'));
    }

    public function orderDetails($order_id) {
        $orderDetails = Order::with('orders')->where('id', $order_id)->first();
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id', $user_id)->first();
        return view('admin.orders.order_details')->with(compact('orderDetails', 'userDetails'));
    }
}
