<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index() {
        $product = Product::where('trending', 1)->get();
        $category = Category::where('popular', 1)->get();

        return view('pages.home', [
            "title" => "Home",
            "product" => $product,
            "category" => $category
        ]);
    }

    public function category() {
        $category = Category::all();

        return view('pages.category', [
            "title" => "Category",
            "data" => $category
        ]);
    }

    public function show($category) {

        if (Category::where('slug', $category)->exists()) {
            $category_slug = Category::where('slug', $category)->first();
            $product = Product::where('category_id', $category_slug->id)->where('status', '0')->get();
        } else {
            return redirect('/category');
        }
        
        return view('pages.category_products',[
            "title" => $category,
            "data_product" => $product,
            "data_category" => $category_slug
        ]);
    }

    public function categoryProduct($category, $product) {
        if (Category::where('slug', $category)->exists()) {
            if (Product::where('slug', $product)->exists()) {
                $data = Product::where('slug', $product)->first();
            }
        }

        if (Category::where('slug', $category)->exists()) {
            $category_slug = Category::where('slug', $category)->first();
            $products = Product::where('category_id', $category_slug->id)->where('status', '0')->where('slug', '!=', $product)->get();
        }

        $ratings = Rating::where('product_id', $data->id)->take(3)->orderBy('id', 'DESC')->get();

        return view('pages.view_product', [
            "title" => $data->name,
            "data_category" => $data->category,
            "data" => $data,
            "moreProduct" => $products,
            "rating" => $ratings
        ]);
    }

    public function viewRating() {

        $ratings = Rating::where('product_id', 1)->orderBy('id', 'DESC')->get();

        return view('pages.ratings', [
            "title" => "All Ratings",
            "dataRatings" => $ratings
        ]);
    }
}
