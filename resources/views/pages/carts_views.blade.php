@extends('layouts/homepage')

@section('pages')
<style>
    .inc-btn, .dec-btn {
        cursor: pointer;
    }
</style>
    <div class="container-sm" style="padding-top: 120px;">
        <div class="d-flex align-items-center">
            <h1 class="text-muted h2 me-2">My {{ $title }}</h1>
            <i class="fas fa-shopping-cart text-primary" style="font-size: 25px; transform: translateY(-4px)"></i>
        </div>
        <div class="pt-4 cartItem">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @if (count($data) < 1)
                        <div class="alert alert-danger alert-dismissible fade show mb-4">
                            <strong class="me-3">Empty Cart !</strong>
                            <button type="button" class="btn-close fw-bold text-light" data-bs-dismiss="alert" style="transform: translateY(-5px)">-</button>
                        </div> 
                    @else
                        <?php $total = 0; ?>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="upload/product/{{ $item->product->image }}" style="width: 70px;">
                                </td>
                                <td class="pt-4">{{ $item->product->name }}</td>
                                <td class="pt-4">${{ $item->product->selling_price }}</td>
                                <td class="pt-4">
                                    <div class="mb-4 input-group text-center mb-3" style="height: 20px;">
                                        <input type="hidden" id="quantity_product" value="{{ $item->product->quantity }}">
                                        <input type="hidden" name="product_id" class="product_id" value="{{ $item->product_id }}">
                                        <button class="input-group-text dec-btn">-</button>
                                        <input type="text" name="quantity" id="" class="border text-center qty-input" value="{{ $item->product_qty }}" size="2" disabled>
                                        <button class="input-group-text inc-btn">+</button>
                                    </div>
                                </td>
                                <td class="pt-4">
                                    <input type="hidden" class="qty_product" value="{{ $item->product_id }}">
                                    <button type="submit" class="btn border-0 btn-danger cart-delete">Delete</button>
                                </td>
                            </tr>
                            <?php $total += $item->product->selling_price * $item->product_qty ?>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="card mt-2 {{ (count($data) < 1) ? 'd-none' : '' }}">
                <div class="bg-light px-3 py-2 d-flex align-items-center justify-content-between">
                    <h6 class="text-dark pt-1 totalPrice">Total Price : ${{ $total ?? "0" }}</h6>
                    <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('script.js') }}"></script>
    @endpush
@endsection