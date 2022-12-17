<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index() {

        $orders = Order::where('status', 0)->get();

        return view('admin.orders.index', [
            "ordersData" => $orders
        ]);
    }

    public function views(Order $order) {
        $orderData = Order::with('items', 'rating')->where('id', $order->id)->first();

        foreach ($orderData->items as $product) {
            if ($orderData->id == $product->order_id) {
                $data_product = OrderItem::with('product')->where('order_id', $orderData->id)->get();
            }
        }

        return view('admin.orders.orders_view', [
            "title" => "Orders View",
            "data" => $data_product,
            "orderDetail" => $orderData
        ]);
    }
    
    public function update(Order $order, Request $request) {
        if (Auth::check()) {
                Order::where('id', $order->id)->update(["status" => $request->order_status]);
                return redirect(route('orders-page'))->with('status', 'Success Update Status Orders');
        } else {
            return redirect('/login');
        }
    }

    public function history() {
        $order = Order::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('admin.orders.order_history', [
            "title" => "Order History",
            "ordersData" => $order
        ]);
    }

    public function viewRating($id) {

        if (Auth::check()) {
            $orders = Order::with('items')->where('user_id', Auth::id())->get();

            foreach ($orders as $value) {
                $order_item = $value->items->where('product_id', $id)->first();
                $user = $value;
            }
        } else {
            return redirect('/login');
        }

        return view('admin.orders.rating', [
            "title" => "Rating Order",
            "dataOrder" => $order_item,
            "userOrder" => $user
        ]);
    }

    public function postRating(Request $request) {
        if (Auth::check()) {
            $check = Order::where('id', $request->user_id)->exists();
            if ($check) {
                $rating = new Rating();
                $rating->order_id = $request->user_id;
                $rating->product_id = $request->product_id;
                $rating->product_qty = $request->product_qty; 
                $rating->title = $request->title; 
                $rating->star = $request->star; 
                $rating->review = $request->review; 
                $rating->save();
            }
        } else {
            return redirect('/login');
        }
    }
}
