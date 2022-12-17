@extends('layouts/homepage')

@section('pages')
<style>
    .form-label {
        font-size: 13.5px;
    }
</style>
    <div class="container-sm" style="padding-top: 120px;">
        <form action="{{ route('place-order') }}" method="post" id="myForm">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-dark">Basic Details</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <?php $total_price = 0; ?>
                                        @foreach ($data as $item)
                                            <?php $total_price += $item->product->selling_price * $item->product_qty; ?>
                                        @endforeach
                                        <input type="hidden" name="total_price" value="{{ $total_price }}">
                                        <input name="fname" type="text" value="{{ Auth::user()->name }}" class="form-control shadow-none" id="floatingFname" placeholder="name@example.com" required>
                                        <label for="floatingFname" class="form-label">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="lname" type="text" value="{{ (Auth::user()->lname) }}" class="form-control shadow-none" id="floatingLname" placeholder="name@example.com">
                                        <label for="floatingLname" class="form-label">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="email" type="email" value="{{ Auth::user()->email }}" class="form-control shadow-none" id="floatingEmail" placeholder="name@example.com" required>
                                        <label for="floatingEmail" class="form-label">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="phone" type="text" value="{{ (Auth::user()->phone)}}" class="form-control shadow-none" id="floatingPNumber" placeholder="name@example.com">
                                        <label for="floatingPNumber" class="form-label">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="address1" type="text" value="{{ (Auth::user()->address1)}}" class="form-control shadow-none" id="floatingAddress1" placeholder="name@example.com">
                                        <label for="floatingAddress1" class="form-label">Address 1</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="address2" type="text" value="{{ (Auth::user()->address2)}}" class="form-control shadow-none" id="floatingAddress2" placeholder="name@example.com">
                                        <label for="floatingAddress2" class="form-label">Address 2</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="city" type="text" value="{{ (Auth::user()->city)}}" class="form-control shadow-none" id="floatingCity" placeholder="name@example.com">
                                        <label for="floatingCity" class="form-label">City</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="state" type="text" value="{{ (Auth::user()->state)}}" class="form-control shadow-none" id="floatingState" placeholder="name@example.com">
                                        <label for="floatingState" class="form-label">State</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="country" type="text" value="{{ (Auth::user()->country)}}" class="form-control shadow-none" id="floatingCountry" placeholder="name@example.com">
                                        <label for="floatingCountry" class="form-label">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input name="pincode" type="text" value="{{ (Auth::user()->pincode)}}" class="form-control shadow-none" id="floatingPinCode" placeholder="name@example.com">
                                        <label for="floatingPinCode" class="form-label">Pin Code</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-dark">Order Details</h6>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Names</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>x{{ $item->product_qty }}</td>
                                            <td>${{ $item->product->selling_price * $item->product_qty }}</td>
                                        </tr>
                                        <?php $allTotal = $total += $item->product->selling_price * $item->product_qty ?>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-between pe-5 ps-3 mt-2">
                                <small class="text-muted">Total Price :</small>
                                <small class="text-dark fw-bold">$<?php echo $allTotal; ?></small>
                            </div>
                            <hr>
                            <div class="pt-1">
                                <button type="submit" id="checkout-btn" class="btn btn-primary w-100 px-3">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('script')
        <script src="{{ asset('script.js') }}"></script>
    @endpush
@endsection