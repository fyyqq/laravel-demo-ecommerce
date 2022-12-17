@extends('layouts/dashboard')

@section('page')
    <div class="container-fluid my-4">
        <div class="card">
            <div class="card-header">Add Category</div>
        </div>
        <div class="card-body mt-3">
            <form action="{{ route('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="floatingName" placeholder="name@example.com" name="name">
                            <label for="floatingName">Category</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="floatingSlug" placeholder="name@example.com" name="slug">
                            <label for="floatingSlug">Slug</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control shadow-none" id="floatingDesc" placeholder="name@example.com" name="description" rows="3"></textarea>
                            <label for="floatingDesc">Description</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="mt-1">Status</label>
                        <input type="checkbox" class="my-0" name="status" id="status"><br>
                        <label for="popular" class="my-0">Popular</label>
                        <input type="checkbox" class="my-0" name="popular" id="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="floatingTitle" placeholder="name@example.com" name="meta_title" rows="3">
                            <label for="floatingTitle">Meta Title</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control shadow-none" id="floatingMDesc" placeholder="name@example.com" name="meta_description" rows="3"></textarea>
                            <label for="floatingMDesc">Meta Description</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control shadow-none" id="floatingKey" placeholder="name@example.com" name="meta_keywords" rows="3"></textarea>
                            <label for="floatingKey">Meta Keywords</label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="float-end btn btn-primary text-lowercase px-4 py-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection