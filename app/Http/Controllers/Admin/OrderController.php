<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::where('status','0')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateorder(Request $request, $id){
        $orders=Order::find($id);
        $orders->status=$request->input('order_status');
        $orders->Update();
        return redirect('orders')->with('status',"Order Updated Successfully");
    }

    public function orderhistory(){
        $orders=Order::where('status','1')->get();
        return view('admin.orders.history', compact('orders'));

    }
}
