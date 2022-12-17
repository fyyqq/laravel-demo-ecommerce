@extends('layouts/dashboard')

@section('page')
    <div class="container-fluid my-4">
        <div class="card">
            <div class="card-header">Category</div>
        </div>
        @if (session()->has("delete"))
            <div class="alert alert-danger alert-dismissible fade show my-2">
                <strong class="me-3">Deleted !</strong> {{ session("delete") }}
                <button type="button" class="btn-close fw-bold text-light" data-bs-dismiss="alert" style="transform: translateY(-5px)">X</button>
            </div>
        @endif
        @if (session()->has("create"))
            <div class="alert alert-success alert-dismissible fade show my-2">
                <strong class="me-3">Created !</strong> {{ session("create") }}
                <button type="button" class="btn-close fw-bold text-light" data-bs-dismiss="alert" style="transform: translateY(-5px)">X</button>
            </div>
        @endif
        @if (session()->has("update"))
            <div class="alert alert-info alert-dismissible fade show my-2">
                <strong class="me-3">Updated !</strong> {{ session("update") }}
                <button type="button" class="btn-close fw-bold text-light" data-bs-dismiss="alert" style="transform: translateY(-5px)">X</button>
            </div>
        @endif
        <div class="mt-3 mb-4">
            <a href="{{ route('add-category') }}" class="bg-dark pb-2 rounded pt-1 px-3" data-bs-toggle="tooltip" title="Add New Category">
                <i class="bi bi-plus text-light"></i>
            </a>
        </div>
        <table class="table bg-light">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Category</th>
                    <th scope="col" class="text-center">Description</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr class="">
                        <th class="pt-4 text-center" scope="row">{{ $loop->iteration }}</th>
                        <td class="pt-4 text-center">{{ $item->name }}</td>
                        <td class="pt-4 text-center">{{ $item->description }}</td>
                        <td class="text-center">
                            <img src="{{ asset('upload/category/' . $item->image) }}" class="w-20">
                        </td>
                        <td class="pt-4" style="transform: translateX(-20px);">
                            <a href="/dashboard/category/edit/{{ $item->id }}" type="submit" class="btn btn-primary me-2 px-4 mb-0">Edit</a>
                            <form action="/dashboard/category/delete/{{ $item->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger mb-0" onclick="return confirm('Delete ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection