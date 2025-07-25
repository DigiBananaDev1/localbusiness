<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            @if (auth()->guard('admin')->user()->role == 'admin')
                {{-- <a class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }}"
                    href="{{ route('admin.users') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a> --}}

                <a class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{-- {{dd(auth()->guard('admin')->user()->role)}} --}}
                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pages
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                        aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div> --}}
                <a class="nav-link {{ Request::segment(2) == 'images' ? 'active' : '' }}"
                    href="{{ route('admin.images.show') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Image Library
                </a>
                <a class="nav-link {{ Request::segment(2) == 'queries' ? 'active' : '' }}"
                    href="{{ route('admin.showQueries') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Queries
                </a>
                <a class="nav-link {{ Request::segment(2) == 'vendors' ? 'active' : '' }} "
                    href="{{ route('admin.showVendors') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Vendors
                </a>
                <a class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }} "
                    href="{{ route('admin.users') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Users
                </a>
                <a class="nav-link {{ Request::segment(2) == 'category' ? 'active' : '' }}"
                    href="{{ route('admin.category') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Category
                </a>
                <a class="nav-link {{ Request::segment(2) == 'business-types' ? 'active' : '' }}"
                    href="{{ route('business-types.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Business Types
                </a>
                <a class="nav-link {{ Request::segment(2) == 'faq' ? 'active' : '' }}"
                    href="{{ route('admin.faq') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Faq
                </a>
                <a class="nav-link {{ Request::segment(2) == 'contact-us-queries' ? 'active' : '' }} "
                    href="{{ route('admin.contactUs') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Contact Us Queries
                </a>
            @elseif (auth()->guard('admin')->user()->role == 'sale')
                <a class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::segment(2) == 'contact-us-queries' ? 'active' : '' }} "
                    href="{{ route('admin.contactUs') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Contact Us Queries
                </a>
            @elseif (auth()->guard('admin')->user()->role == 'data-entry')
                <a class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::segment(2) == 'vendors' ? 'active' : '' }} "
                    href="{{ route('admin.showVendors') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Vendors
                </a>
                <a class="nav-link {{ Request::segment(2) == 'category' ? 'active' : '' }}"
                    href="{{ route('admin.category') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                    Category
                </a>
            @else
                <a class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
            @endif
        </div>
    </div>

    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::guard('admin')->user()->name }}
    </div>
</nav>
