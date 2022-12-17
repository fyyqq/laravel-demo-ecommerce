<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            "category" => Category::all()
        ]);
    }

    public function adding() {
        return view('admin.category.add');
    }

    public function add(Request $request) {
        $category = new Category();
        // return $request;

        // dd($request->hasFile('image'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $ext;
            $file->move(public_path('/upload/category'), $file_name);
            $category->image = $file_name;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = ($request->status == true) ? "1" : "0";
        $category->popular = ($request->popular == true) ? "1" : "0";
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        
        return redirect(route('admin_category'))->with('create', 'Category has been added');
    }

    public function edit(Request $request, $category) {
        $datas = Category::where('id', $category)->get();
        $dt = [];
        foreach ($datas as $data) {
            $dt = $data;
        }
        return view('admin.category.edit', [
            "data" => $dt
        ]);
    }

    public function update(Request $request, $category) {
        $data = Category::find($category);

        if ($request->hasFile('image')) {
            $path = asset('upload/category/' . $data->image);
            if (file_exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $ext;
            $file->move('upload/category/', $file_name);
            $data->image = $file_name;
        }

        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->description = $request->description;
        $data->status = ($request->status == true) ? "1" : "0";
        $data->popular = ($request->popular == true) ? "1" : "0";
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        $data->update();

        return redirect(route('admin_category'))->with('update', 'Category has been updated');
    }

    public function destroy($category) {
        $data = Category::find($category);

        if ($data->image) {
            $path = asset('upload/category/' . $data->image);
            if (file_exists($path)) {
                File::delete($path);
            }
        }
        $data->delete();
        
        return redirect(route('admin_category'))->with('delete', 'Category has been deleted');
    }
}