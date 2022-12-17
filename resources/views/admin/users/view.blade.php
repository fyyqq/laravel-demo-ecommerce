@extends('layouts/dashboard')

@section('page')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card bg-dark">
                        <div class="card-header text-light fw-bold">User Detail </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row" style="row-gap: 20px;">
                            <div class="col-md-4">
                                <label for="" class="form-label">Role</label>
                                <div class="p-2 border">{{ ($data->role_as == 0 ? "Buyer" : "Seller") }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">First Name</label>
                                <div class="p-2 border">{{ $data->name }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Last Name</label>
                                <div class="p-2 border">{{ $data->lname }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Email Address</label>
                                <div class="p-2 border">{{ $data->email }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Phone Number</label>
                                <div class="p-2 border">{{ $data->phone }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Address 1</label>
                                <div class="p-2 border">{{ $data->address1 }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Address 2</label>
                                <div class="p-2 border">{{ $data->address2 }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">City</label>
                                <div class="p-2 border">{{ $data->city }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">State</label>
                                <div class="p-2 border">{{ $data->state }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Country</label>
                                <div class="p-2 border">{{ $data->country }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Pin Code</label>
                                <div class="p-2 border">{{ $data->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection