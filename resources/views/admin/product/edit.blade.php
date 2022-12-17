@extends('layouts/dashboard')

@section('page')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">Edit Product</div>
        </div>
        <div class="card-body mt-3">
            <form action="/dashboard/products/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <select name="category_id" id="" class="form-select shadow-none py-3">
                            @foreach ($category as $item)
                                <option value="{{ $loop->iteration }}" {{ ($data->category_id == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="floatingName" placeholder="name@example.com" name="name" value="{{ $data->name }}">
                            <label for="floatingName">Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="floatingSlug" placeholder="name@example.com" name="slug" value="{{ $data->slug }}">
                            <label for="floatingSlug">Slug</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="floatingSDesc" placeholder="name@example.com" name="small_description" value="{{ $data->small_description }}">
                            <label for="floatingSDesc">Short Description</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control shadow-none" id="floatingDesc" placeholder="name@example.com" name="description" rows="3">{{ $data->description }}</textarea>
                            <label for="floatingDesc">Description</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control shadow-none" name="original_price" id="floatingOprice" value="{{ $data->original_price }}">
                            <label for="floatingOprice">Original Price - Rm</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control shadow-none" name="selling_price" id="floatingSprice" value="{{ $data->selling_price }}">
                            <label for="floatingSprice">Selling Price - Rm</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control shadow-none" name="quantity" id="floatingQty" value="{{ $data->quantity }}">
                            <label for="floatingQty">Quantity</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control shadow-none" name="tax" id="floatingTax" value="{{ $data->tax }}">
                            <label for="floatingTax">Tax</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="mt-1">Status</label>
                        <input type="checkbox" class="my-0" name="status" id="status" {{ ($data->status == 1) ? "checked" : "" }}><br>
                        <label for="trending" class="my-0">Trending</label>
                        <input type="checkbox" class="my-0" name="trending" id="trending" {{ ($data->trending == 1) ? "checked" : "" }}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="floatingTitle" placeholder="name@example.com" name="meta_title" value="{{ $data->meta_title }}">
                            <label for="floatingTitle">Meta Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control shadow-none" id="floatingMDesc" placeholder="name@example.com" name="meta_description" rows="3">{{ $data->meta_description }}</textarea>
                            <label for="floatingMDesc">Meta Description</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control shadow-none" id="floatingKey" placeholder="name@example.com" name="meta_keywords" rows="3">{{ $data->meta_keywords }}</textarea>
                            <label for="floatingKey">Meta Keywords</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-lg-3 mb-2">
                        <div class="d-flex flex-column flex-lg-row justify-content-start align-items-center">
                            @if ($data->image)
                                <img src="{{ asset('upload/product/' . $data->image) }}" class="w-35 rounded">
                            @endif
                            <div class="ms-4 w-100">
                                <input type="file" name="image" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="float-end btn btn-primary text-lowercase px-4 py-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection