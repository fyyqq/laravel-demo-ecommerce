@extends('layouts/homepage')

@section('pages')
<style>
    .form-label {
        font-size: 13.5px;
    }
</style>
    <div class="container-sm pb-5" style="padding-top: 120px;">
        <div class="row">
            <div class="col-md-6">
                <div class="card border border-success border-2">
                    <div class="card-body">
                        <h6 class="text-dark">Basic Details</h6>
                        <hr>
                        <div class="row">
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="fname" type="text" value="{{ $orderDetail->fname }}" class="form-control shadow-none" id="floatingFname" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingFname" class="form-label">First Name</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="lname" type="text" value="{{ $orderDetail->lname }}" class="form-control shadow-none" id="floatingLname" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingLname" class="form-label">Last Name</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" value="{{ $orderDetail->email }}" class="form-control shadow-none" id="floatingEmail" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingEmail" class="form-label">Email Address</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="phone" type="text" value="{{ $orderDetail->phone }}" class="form-control shadow-none" id="floatingPNumber" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingPNumber" class="form-label">Phone Number</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="address1" type="text" value="{{ $orderDetail->address1 }}" class="form-control shadow-none" id="floatingAddress1" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingAddress1" class="form-label">Address 1</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="address2" type="text" value="{{ $orderDetail->address2 }}" class="form-control shadow-none" id="floatingAddress2" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingAddress2" class="form-label">Address 2</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="city" type="text" value="{{ $orderDetail->city }}" class="form-control shadow-none" id="floatingCity" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingCity" class="form-label">City</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="state" type="text" value="{{ $orderDetail->state }}" class="form-control shadow-none" id="floatingState" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingState" class="form-label">State</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="country" type="text" value="{{ $orderDetail->country }}" class="form-control shadow-none" id="floatingCountry" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingCountry" class="form-label">Country</label>
                                </div>
                            </div>
                            <div>
                                <div class="form-floating mb-3">
                                    <input name="pincode" type="text" value="{{ $orderDetail->pincode }}" class="form-control shadow-none" id="floatingPinCode" placeholder="name@example.com" {{ ($orderDetail->status == "1") ? "disabled" : "" }}>
                                    <label for="floatingPinCode" class="form-label">Pin Code</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border border-success border-2">
                    <div class="card-body">
                        <h6 class="text-dark">Order Details</h6>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Names</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Images</th>
                                    @if ($orderDetail->user_id == Auth::id())
                                        @if ($orderDetail->status == '1')
                                            <th class="text-center">Rated</th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                @foreach ($data as $items)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="pt-3 text-center">{{ $items->product->name }}</td>
                                        <td class="pt-3 text-center">x{{ $items->quantity }}</td>
                                        <td class="pt-3 text-center">${{ $items->product->selling_price }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('upload/product/' . $items->product->image) }}" style="width: 62px;">
                                        </td>
                                        @if ($orderDetail->user_id == Auth::id())
                                            @if ($orderDetail->status == '1')
                                                @if (empty($items->product->rating))
                                                    <td class="text-center pt-3">
                                                        <a href="/dashboard/orders/rating/{{ $items->product_id }}" class="btn btn-success">Rate</a>
                                                    </td>
                                                @else
                                                    <td class="text-center pt-3">
                                                        <i class="fa-solid fa-circle-check text-success" style="font-size: 25px;"></i>
                                                    </td>
                                                @endif
                                            @endif
                                        @endif
                                    </tr>
                                    <?php $total += $items->product->selling_price * $items->quantity ?>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex align-items-center justify-content-start">
                            <p class="text-muted pe-2">Total Price :</p>
                            <p class="text-dark">$<?php echo $total; ?></p>
                        </div>
                        <hr>
                        <div class="pt-2">
                            <p class="text-muted">Order Status :</p>
                            @if ($orderDetail->status == "1")
                                <select name="order_status" id="" class="text-center form-control shadow-none bg-success text-light mb-2" disabled>
                                    <option value="1">Complete</option>
                                </select>
                            @else
                                <form action="/dashboard/orders/update-order/{{ $orderDetail->id }}" method="post">
                                    @csrf
                                    <select name="order_status" id="" class="form-control shadow-none">
                                        <option value="">Your Status Orders ?</option>
                                        <option {{ $orderDetail->status == "0" ? "selected" : "" }} value="0">Pending</option>
                                        <option {{ $orderDetail->status == "1" ? "selected" : "" }} value="1">Complete</option>
                                    </select>
                                    <button class="mt-3 btn btn-success w-100">Save Changes</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection