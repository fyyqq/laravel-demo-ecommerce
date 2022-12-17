<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('img/small-logos/google-webdev.svg') }}">
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>
    <style>
        .container-fluid {
            padding-left: 220px;
        }
        @media screen and (max-width: 1196px) {
            .container-fluid {
                padding-left: 0px;
            }
        }
    </style>
    <body class="g-sidenav-show bg-gray-200 pb-5">
        <div class="container">
            {{-- Sidebar --}}
            @include('admin.sidebar')
            <!-- Navbar -->
            @include('admin.navbar')
            <!-- Admin/dashboard -->
            {{-- @include('admin.dashboard.content') --}}
            <!-- Admin/category -->
            {{-- @include('admin.category.index') --}}
            @yield('page')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('admin/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/js/chartjs.min.js') }}"></script>
    </body>
</html>
    