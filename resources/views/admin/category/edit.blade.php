@extends('layouts/dashboard')

@section('page')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">Edit Category</div>
        </div>
        <div class="card-body mt-3">
            <form action="/dashboard/category/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-lg-3 mb-2">
                            <input type="text" class="form-control shadow-none" id="floatingName" placeholder="name@example.com" name="name" value="{{ $data->name }}">
                            <label for="floatingName">Category</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-lg-3 mb-2">
                            <input type="text" class="form-control shadow-none" id="floatingSlug" placeholder="name@example.com" name="slug" value="{{ $data->slug }}">
                            <label for="floatingSlug">Slug</label>
                        </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-floating mb-lg-3 mb-2">
                        <textarea type="text" class="form-control shadow-none" id="floatingDesc" placeholder="name@example.com" name="description" rows="3">{{ $data->description }}</textarea>
                        <label for="floatingDesc">Description</label>
                    </div>
                </div>
                <div class="col-md-6 my-2 my-lg-0">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" id="status" {{ $data->status == 1 ? 'checked' : '' }}>
                        <br>
                        <label for="popular">Popular</label>
                        <input type="checkbox" name="popular" id="popular" {{ $data->popular == 1 ? 'checked' : '' }}>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating mb-lg-3 mb-2">
                        <input type="text" class="form-control shadow-none" id="floatingTitle" placeholder="name@example.com" name="meta_title" rows="3" value="{{ $data->meta_title }}">
                        <label for="floatingTitle">Meta Title</label>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating mb-lg-3 mb-2">
                        <textarea type="text" class="form-control shadow-none" id="floatingMDesc" placeholder="name@example.com" name="meta_description" rows="3">{{ $data->meta_description }}</textarea>
                        <label for="floatingMDesc">Meta Description</label>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating mb-lg-3 mb-2">
                        <textarea type="text" class="form-control shadow-none" id="floatingKey" placeholder="name@example.com" name="meta_keywords" rows="3">{{ $data->meta_keywords }}</textarea>
                        <label for="floatingKey">Meta Keywords</label>
                    </div>
                </div>
                <div class="col-md-12 mb-lg-3 mb-2">
                    <div class="d-flex flex-column flex-lg-row justify-content-start align-items-center">
                        @if ($data->image)
                            <img src="{{ asset('upload/category/' . $data->image) }}" class="w-35 rounded">
                        @endif
                        <div class="ms-4 w-100">
                            <input type="file" name="image" class="form-control shadow-none">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="float-end btn btn-primary text-lowercase px-4 py-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection