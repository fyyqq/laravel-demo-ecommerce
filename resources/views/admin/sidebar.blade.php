<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
            <span class="ms-1 font-weight-bold text-white">{{ Auth::user()->name }} Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white active {{ Request::is('dashboard') ? "bg-gradient-primary" : "" }}" href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item my-2">
                <a class="nav-link text-white active {{ Request::is('dashboard/category*') ? "bg-gradient-primary" : "" }}" href="{{ route('admin_category') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white active {{ Request::is('dashboard/products*') ? "bg-gradient-primary" : "" }}" href="{{ route('admin_products') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-bag-fill" style="transform: translateY(-2px)"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white active {{ Request::is('dashboard/orders*') ? "bg-gradient-primary" : "" }}" href="{{ route('orders-page') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notes</i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white active {{ Request::is('dashboard/users*') ? "bg-gradient-primary" : "" }}" href="{{ route('users-page') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <div class="sidenav-footer position-absolute w-100 bottom-0 mb-3">
                <a class="nav-link text-white active border" href="/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-door-fill"></i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </div>
        </ul>
    </div>
</aside>