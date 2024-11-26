<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->with('products')->get();

        if ($cartitems->count() > 0) {
            $total = $cartitems->map(function ($item) {
                return $item->products->selling_price * $item->prod_qty; // Calculate total for each item
            })->sum();

            $order = new Order();
            $user = Auth::user();

            $order->user_id = $user->id;
            $order->name = $user->name;
            $order->email = $user->email;
            $order->mobile = $user->mobile;
            $order->total_price = $total;

            // Collect all product IDs as a comma-separated string
            $prodIds = $cartitems->pluck('prod_id')->implode(',');

            $order->prod_id = $prodIds; // Store the product IDs in the 'prod_id' column

            // Create product details
            $productDetails = [];
            foreach ($cartitems as $item) {
                $productDetails[] = [
                    'prod_id' => $item->prod_id,
                    'prod_qty' => $item->prod_qty,
                    'prod_price' => $item->products->selling_price,
                    'prod_name' => $item->products->name,
                ];
            }
            $order->product_detail = json_encode($productDetails);
            $order->tracking_no = 'gite' . rand(1111, 9999);

            $order->save();

            // Clear the cart after the order is placed
            Cart::where('user_id', Auth::id())->delete();

            return response()->json(['status' => 'Order Placed Successfully']);
        } else {
            return response()->json(['status' => 'Add Some Product in Cart']);
        }
    }


    public function myorder()
    {
        $cartitems = Cart::where('user_id', Auth::id())->with('products')->get();
        $total = $cartitems->map(function ($item) {
            return $item->products->selling_price * $item->prod_qty; // Calculate total for each item
        })->sum();
        $orders = Order::where('user_id', Auth::id())->where('status','0')->get();
        return view('frontend.order.index', compact('orders', 'total'));
    }

    public function cancelorder($id){
        $order=Order::find($id);
        $order->delete();

        return response()->json(['status' => "Order Cancel Successfully"]);
    }

    public function orderhistory() {
        $orders = Order::where('user_id', Auth::id())->where('status','1')->get();
        return view('frontend.order.history', compact('orders'));
    }
    
}
