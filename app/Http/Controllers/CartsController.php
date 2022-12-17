<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast;

class CartsController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_qty = $request->product_quantity;
        $product_id = $request->product_id;

        if (!Auth::check()) {
            return response()->json(['status' => 'Login']);
        } else {
            $product_id_check = Product::where('id', $product_id)->first();

            if ($product_id_check) {
                if (Carts::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => 'Exists']);
                }

                $cart = new Carts();
                $cart->user_id = Auth::id();
                $cart->product_id = $product_id;
                $cart->product_qty = $product_qty;
                $cart->save();

                return response()->json(['status' => 'Add']);
            }
        }
    }
    
    public function show() {

        $carts = Carts::where('user_id', Auth::id())->get();

        return view('pages.carts_views', [
            "title" => "Carts",
            "data" => $carts
        ]);
    }

    public function update(Request $request) {
        if (Auth::check()) {
            if (Carts::where('product_id', $request->product_id)->where('user_id', Auth::id())->exists()) {

                $data = Carts::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
                $data->user_id = Auth::id();
                $data->product_id = $request->product_id;
                $data->product_qty = $request->input_value;
                $data->update();

                return response()->json(["status" => "Updated Successfully"]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function destroy(Request $request) {
        if(Auth::check()) {
            if (Carts::where('product_id', $request->product_id)->where('user_id', Auth::id())->exists()) {
                $cart = Carts::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
                $cart->delete();
                
                return response()->json(["status" => "Deleted"]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function cartCount() {
        $carts = Carts::where('user_id', Auth::id())->get();
        return response()->json(['status' => $carts->count()]);
    }
}
