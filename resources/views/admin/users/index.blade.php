@extends('layouts/dashboard')

@section('page')
    <div class="container-fluid mt-3">
        <div class="card mb-4 bg-dark">
            <div class="card-header text-light fw-bold">Register Users</div>
        </div>
        <table class="table bg-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataUser as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name . ' ' . $item->lname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <a href="/dashboard/users/view-user/{{ $item->id }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection