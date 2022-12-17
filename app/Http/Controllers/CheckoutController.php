<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index() {
        $carts = Carts::where('user_id', Auth::id())->get();

        return view('pages.checkout', [
            "title" => "Checkout",
            "data" => $carts
        ]);
    }

    public function placeOrder(Request $request) {

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = $request->total_price;
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pincode = $request->pincode;
        $order->tracking_no = strtolower($request->fname) . rand(1111, 9999);
        $order->save();

        $cartItem = Carts::where('user_id', Auth::id())->get();        
        foreach ($cartItem as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->product_qty,
                'price' => $item->product->selling_price * $item->product_qty
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product_quantity = $product->quantity - $item->product_qty;
            Product::where('id', $item->product_id)->update(['quantity' => $product_quantity]);
        }

        if (Auth::user()->address1 == null) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->pincode = $request->pincode;
            $user->update();
        }

        Carts::where('user_id', Auth::id())->delete();

        return redirect(route('orders-page'));
    }
}
