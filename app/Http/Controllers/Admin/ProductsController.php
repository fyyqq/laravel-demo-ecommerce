<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('admin.product.index', [
            "products" => $products
        ]);
    }
    
    public function store() {
        $products = Product::all();
        $category = Category::all();
        
        return view('admin.product.add', [
            "products" => $products,
            "category" => $category
        ]);
    }

    public function insert(Request $request) {

        $products = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $ext;
            $file->move(public_path('/upload/product'), $file_name);
            $products->image = $file_name;
        }

        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->quantity = $request->quantity;
        $products->tax = $request->tax;
        $products->status = ($request->status == true) ? "1" : "0";
        $products->trending = ($request->trending == true) ? "1" : "0";
        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keywords = $request->meta_keywords;
        $products->save();

        return redirect(route('admin_products'))->with('create', 'Product has been created');
    }

    public function edit($products) {
        $data = Product::find($products);

        return view('admin.product.edit', [
            "data" => $data,
            "category" => Category::all()
        ]);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $path = asset('upload/product/' . $product);
            if (file_exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $ext;
            $file->move('upload/product/', $file_name);
            $product->image = $file_name;
        }

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->tax = $request->tax;
        $product->status = ($request->status == true) ? "1" : "0";
        $product->trending = ($request->trending == true) ? "1" : "0";
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->update();

        return redirect(route('admin_products'))->with('update', 'Product has been updated');
    }
    
    public function destroy($id) {
        $product = Product::find($id);

        if ($product->image) {
            $path = asset('upload/product/' . $product->image);
            if (file_exists($path)) {
                File::delete($path);
            }
        }

        $product->delete();
        return redirect(route('admin_products'))->with('delete', 'Product has been deleted');
    }
}
