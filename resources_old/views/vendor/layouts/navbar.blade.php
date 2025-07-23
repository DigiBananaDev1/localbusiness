<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('venderdashboard') }}">Vendor Panel</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa fa-bars fs-4"></i></button>
    @if (session('success'))
    <div class="toast align-items-center text-bg-success border-0" id="success-toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="toast align-items-center text-bg-danger border-0" id="error-toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('error') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user-circle fs-2"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="d-flex align-items-center"><a class="dropdown-item w-fit" style="width: fit-content;" href="{{ route('vendor.profile') }}">Profile</a>
                @if(Auth::guard('vendor')->user()->status == 1)
                <img src="{{ asset('public/images/icons/verified.png') }}" alt="Verified" width="18" height="18">
                @endif
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form action="{{ route('vendor.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                    <!-- <a class="dropdown-item" href="#!">Logout</a> -->
                </li>
            </ul>
        </li>
    </ul>
</nav>