@extends('layouts/homepage')

@section('pages')
    <div class="container-sm" style="padding-top: 120px;">
        <div class="d-flex align-items-center mb-4">
            <h1 class="text-muted h2 me-3">My Wishlist</h1>
            <i class="fa-sharp fa-solid fa-heart text-danger" style="font-size: 28px; transform: translateY(-5px)"></i>
        </div>
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissable mb-4">
                <a href="#" class="close text-decoration-none" data-dismiss="alert" aria-label="close">×</a>
                <strong class="me-2">{{ session('status') }}</strong>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                @if ($data->count() < 1)
                    <div class="alert alert-danger">Ooopss You'r not Add to Wishlist yet !</div>
                @else
                    <table class="table mb-0 wishlistItem">
                        <tbody class="tbody">
                            @foreach ($data as $item)
                                <tr>
                                    <th class="pt-4" scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img src="upload/product/{{ $item->product->image }}" style="width: 70px;">
                                    </td>
                                    <td class="pt-4" style="transform: translateY(6px)">{{ $item->product->name }}</td>
                                    <td class="pt-4" style="transform: translateY(6px)">${{ $item->product->selling_price }}</td>
                                    <th class="pt-4" style="transform: translateY(6px)">{{ ($item->product->quantity < 1) ? "Out Of Stock" : "In Stock" }}</th>
                                    <td class="pt-4" style="transform: translateY(8px)">
                                        <input type="hidden" class="product_id" name="product_id" value="{{ $item->product_id }}">
                                        <i class="fa-sharp wishlist-delete fa-solid fa-heart text-danger" style="font-size: 22px;"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('script.js') }}"></script>
    @endpush
@endsection