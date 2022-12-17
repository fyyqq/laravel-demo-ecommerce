<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function index() {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->get();

        return view('pages.wishlist', [
            "title" => "Wishlist Product",
            "data" => $wishlist
        ]);
    }

    public function addWishlist(Request $request) {
        if (!Auth::check()) {
            return response()->json(['status' => 'Login']);
        } else {
            $product = Product::where('id', $request->product_id)->first();

            if ($product) {
                if (Wishlist::where('product_id', $request->product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => 'Exists']);
                } else {
                    $wishlist = new Wishlist();
                    $wishlist->user_id = Auth::id();
                    $wishlist->product_id = $request->product_id;
                    $wishlist->save();
                    
                    return response()->json(['status' => 'Add']);
                }
            }
        }
    }

    public function destroy(Request $request) {
        if (Auth::check()) {
            $wishlist = Wishlist::where('product_id', $request->prod_id)->first();
            if ($wishlist) {
                if (Wishlist::where('product_id', $request->prod_id)->where('user_id', Auth::id())->exists()) {
                    Wishlist::where('product_id', $request->prod_id)->delete();
                    return response()->json(["status" => "Success"]);
                }
            }
        } else {
            return redirect('/login');
        }
    }

    public function wishlistCount() {
        $wishCount = Wishlist::where('user_id', Auth::id())->get();
        return response()->json(["status" => $wishCount->count()]);
    }
}
