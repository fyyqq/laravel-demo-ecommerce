@extends('layouts.dashboard')

@section('page')
    <div class="container-fluid mt-3">
        <div class="card bg-success">
            <div class="card-header fw-bold text-light">Order History</div>
        </div>
        <div class="mt-3 mb-1 d-flex justify-content-end">
            <a href="{{ route('orders-page') }}" class="btn btn-dark">New Order</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Order Dates</th>
                            <th scope="col" class="text-center">Tracking No.</th>
                            <th scope="col" class="text-center">Total Price</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordersData as $item)
                            <tr>
                                <th class="pt-4 text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="pt-4 text-center">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td class="pt-4 text-center">{{ $item->tracking_no }}</td>
                                <td class="pt-4 text-center">${{ $item->total_price }}</td>
                                <td class="pt-4 text-center">{{ ($item->status == '0') ? "Pending" : "Completed" }}</td>
                                <td class="pt-4 text-center">
                                    <a href="/dashboard/orders/view-order/{{ $item->id }}" class="btn btn-success">Views</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection