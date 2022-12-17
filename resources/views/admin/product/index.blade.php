@extends('layouts/dashboard')

@section('page')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">Products</div>
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
            <a href="{{ route('add-products') }}" class="bg-dark pb-2 rounded pt-1 px-3" data-bs-toggle="tooltip" title="Add New Product">
                <i class="bi bi-plus text-light"></i>
            </a>
        </div>
        <table class="table bg-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Original Price</th>
                    <th scope="col">Selling</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td class="pt-4 text-center">{{ $loop->iteration }}</td>
                        <td class="pt-4 text-center">{{ $item->category->name ?? "Not Found" }}</td>
                        <td class="pt-4 text-center">{{ $item->name }}</td>
                        <td class="pt-4 text-center">{{ $item->small_description }}</td>
                        <td class="pt-4 text-center">${{ $item->original_price }}</td>
                        <td class="pt-4 text-center">${{ $item->selling_price }}</td>
                        <td>
                            <img src="{{ asset('upload/product/' . $item->image) }}" class="w-100">
                        </td>
                        <td class="pt-4">
                            <a href="/dashboard/products/edit/{{ $item->id }}" type="submit" class="btn btn-primary me-2 px-4 mb-0">Edit</a>
                            <form action="/dashboard/products/delete/{{ $item->id }}" method="post" class="d-inline">
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