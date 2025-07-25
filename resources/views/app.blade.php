<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>One Platform for Millions of Local Businesses</title>

    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Favicon and Manifest -->
    <link rel="icon" type="image/png" href="{{ asset('public/assets/img/favicon.png') }}" sizes="124x124" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('public/assets/img/favicon.svg') }}" />
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />


    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- jQuery (required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- HEADER CSS --}}

    <style>
        /* --- NAVBAR & SEARCH SECTION (INDIAMART STYLE) --- */
        .navbar {
            background: white !important;
            box-shadow: none;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .navbar .navbar-brand {
            margin-right: 1.5rem;
        }

        .navbar .navbar-brand img {
            max-width: 250px;
            height: auto;
        }

        .search-section {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
            background: transparent;
            border: none;
        }

        .search-section .input-group {
            width: 100%;
        }

        .search-section .input-group-text {
            background: #fff;
            border: none;
            font-size: 1.2rem;
        }

        .search-section select.form-select {
            border: none;
            background: transparent;
            outline: none;
            font-size: 1rem;
            color: #333;
            min-width: 100px;
            box-shadow: none;
        }

        .search-section input[type="text"],
        .search-section .form-control {
            border: none;
            background: transparent;
            outline: none;
            font-size: 1rem;
            color: #333;
            box-shadow: none;
        }

        .search-section input[type="text"]:focus,
        .search-section .form-control:focus,
        .search-section select.form-select:focus {
            box-shadow: none;
            outline: none;
        }

        .search-section button[type="submit"] {
            background: #f79321;
            color: #fff;
            border: none;
            border-radius: 0 2rem 2rem 0;
            min-width: 44px;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(247, 147, 33, 0.08);
        }

        .search-section button[type="submit"]:hover {
            background: #d96d00;
        }

        /* Right bar section */
        .navbar-nav {
            align-items: right;
        }

        .navbar-nav .nav-item {
            margin-left: 0.5rem;
            margin-right: 0.5rem;
        }

        .navbar-nav .nav-link {
            background: none !important;
            color: #d96d00 !important;
            border-radius: 0.3rem;
            padding: 0.3rem 0.7rem !important;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 1rem;
            transition: background 0.2s, color 0.2s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            background: #f79321 !important;
            color: #fff !important;
        }

        .navbar-nav .nav-link i {
            font-size: 1.2rem;
        }

        .navbar-nav .loginbtn .nav-link {
            background: #fff !important;
            color: #1f85c7 !important;
            font-weight: 700;
        }

        .navbar-nav .loginbtn .nav-link:hover {
            background: #f79321 !important;
            color: #fff !important;
        }

        .navbar-nav .dropdown-menu {
            min-width: 180px;
            border-radius: 1rem;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
        }

        .navbar-nav .dropdown-item {
            border-radius: 1rem;
            margin: 0.2rem 0;
        }

        @media (max-width: 991.98px) {
            .navbar-nav .nav-item {
                margin: 0.25rem 0;
            }

            .navbar-nav .nav-link {
                width: 100%;
                justify-content: flex-start;
            }

            .search-section {
                min-width: 0;
                max-width: 100%;
            }
        }

        @media (max-width: 600px) {
            .navbar .navbar-brand img {
                max-width: 110px;
            }

            .search-section {
                flex-direction: column;
                border-radius: 0.5rem;
                width: 100%;
                margin: 0.5rem 0;
            }
        }


        /* FAQ */


        .faq-section {
            background: white;
            border-radius: 0px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .faq-item {
            border-bottom: 1px solid #eee;
            padding: 1rem 0;
        }

        .faq-question {
            font-weight: 600;
            color: #2c3e50;
            cursor: pointer;
        }


        .faq-section h3 {
            color: #1f85c7;
        }


        .faq-answer {
            color: #666;
            margin-top: 0.5rem;
            font-weight: 400;
        }

        .ask-question-section {
            background: #f8f9fa;
            padding: 3rem 0;
            border-radius: 0px !important;
            margin-top: 2rem;
        }

        /* PREFOOTER */

        .category-link {
            color: #333;
            text-decoration: none;
            padding: 8px 0;
            display: block;
            transition: color 0.2s;
        }

        .category-link:hover {
            color: #0d6efd;
        }

        .service-link {
            color: #666;
            text-decoration: none;
            padding: 6px 0;
            display: block;
        }

        .service-link:hover {
            color: #0d6efd;
        }

        .section-divider {
            border-bottom: 1px solid #eee;
            margin: 2rem 0;
        }

        /* FOOTER */

        a {
            text-decoration: none;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .footer-section {
            background-color: #1f85c7;
            position: relative;
            overflow: hidden;
            z-index: 9;
        }

        .footer-top {
            padding-top: 96px;
            padding-bottom: 50px;
        }

        .footer-top p,
        .company-footer-contact-list li {
            color: #ffffff;
        }

        .company-footer-contact-list {
            margin-top: 10px;
        }

        .company-footer-contact-list li {
            display: flex;
            display: -webkit-flex;
            align-items: center;
        }

        .company-footer-contact-list li+li {
            margin-top: 5px;
        }

        .company-footer-contact-list li i {
            margin-right: 10px;
            font-size: 20px;
            display: inline-block;
        }

        .footer-top .site-logo {
            margin-bottom: 25px;
            display: block;
            max-width: 170px;
        }

        .widget-title {
            text-transform: capitalize;
        }

        .footer-top .widget-title {
            color: #ffffff;
            margin-bottom: 40px;
        }

        .courses-link-list li+li {
            margin-top: 10px;
        }

        .courses-link-list li a {
            color: #ffffff;
            text-transform: capitalize;
            font-family: var(--para-font);
            font-weight: 400;
        }

        .courses-link-list li a:hover {
            color: #ffb606;
        }

        .courses-link-list li i {
            margin-right: 5px;
        }

        .footer-top .small-post-title a {
            font-family: var(--para-font);
            color: #ffffff;
            font-weight: 400;
        }

        .small-post-item .post-date {
            color: #f79321;
            margin-bottom: 3px;
            font-family: var(--para-font);
            font-weight: 400;
        }

        .small-post-list li+li {
            margin-top: 30px;
        }

        .news-letter-form {
            margin-top: 15px;
        }

        .news-letter-form input {
            width: 100%;
            padding: 12px 25px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            border: none;
        }

        .news-letter-form input[type="submit"] {
            width: auto;
            border: none;
            background-color: #ffffff;
            padding: 9px 30px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            color: #000000;
            margin-top: 10px;
        }

        .footer-bottom {
            padding: 13px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.149);
        }

        .copy-right-text {
            color: #ffffff;
        }

        .copy-right-text a {
            color: #ffb606;
        }

        .terms-privacy li+li {
            margin-left: 30px;
        }

        .terms-privacy li a {
            color: #ffffff;
            position: relative;
        }

        .terms-privacy li a:after {
            position: absolute;
            content: '-';
            color: #ffffff;
            display: inline-block;
            top: 0;
            right: -18px;
        }

        .terms-privacy li+li a:after {
            display: none;
        }

        .navbar-toggler {
            border: none;
            /* Removes border */
            outline: none;
            /* Removes outline */
            box-shadow: none;
            /* Removes Bootstrap's focus ring */
        }

        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }

        /* RESPONSIVE CODE */



        @media only screen and (max-width: 600px) {

            .navbar-brand p {
                font-size: 1.3rem !important;
                padding-top: 10px;
            }

            #searchInput {
                width: 300px !important;
            }

            .searchbtn {
                left: 88% !important;
                top: 47% !important;
            }

        }
    </style>

</head>

<body>

    {{-- HEADER START --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="{{ url('/') }}">

                <img src="{{ asset('public/assets/img/mlb.png') }}" alt="" width="250px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12H21M3 6H21M9 18H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Main Navigation Links -->
                <form action="{{ route('search') }}" method="POST" class="search-section mx-auto">
                    @csrf
                    <div class="input-group flex-nowrap align-items-center"
                        style="background: #fff; border-radius: 2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.07); padding: 0.15rem 0.3rem;">
                        <span class="input-group-text bg-white border-0 px-2" style="border-radius: 2rem 0 0 2rem;">
                            <i class="fa fa-map-marker text-primary"></i>
                        </span>
                        <select name="city" class="form-select border-0"
                            style="max-width: 120px; background: transparent;">
                            <option value="">All City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="search_text" class="form-control border-0" id="searchInput"
                            placeholder="Search for businesses, services..." style="background: transparent;" />
                        <button type="submit" class="btn d-flex align-items-center justify-content-center"
                            style="background: #f79321; color: #fff; border-radius: 0 2rem 2rem 0; min-width: 44px; min-height: 44px; box-shadow: 0 2px 8px rgba(247,147,33,0.08);">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Right Side Links -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    {{-- <li class="nav-item me-3">
                        <a class="nav-link list btn  text-white btn-sm px-3 d-flex align-items-center"
                            href="{{url('/list-your-bussiness')}}">
                            <i class="bi bi-plus-circle"></i>
                            <span class="ms-2">List Your Business</span>
                        </a>
                    </li> --}}
                    <li class="nav-item me-3">
                        <a href="{{ url('/list-your-bussiness') }}"
                            class="nav-link   text-white btn-sm px-3 d-flex align-items-center"><i
                                class="fa-solid fa-shop me-2"></i>Selll</a>
                    </li>

                    <li class="nav-item me-3">
                        <a href="#" class="nav-link   text-white btn-sm px-3 d-flex align-items-center"><i
                                class="fa-solid fa-question me-2"></i>Help</a>
                    </li>


                    @if (Auth::guard('web')->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link p-0 d-flex align-items-center" id="navbarDropdown" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user-circle fs-4 text-primary"></i>
                                <i class="bi bi-chevron-down ms-2"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0"
                                aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('showUserQueries', Auth::guard('web')->user()->id) }}">
                                        <i class="bi bi-chat-left-text"></i>
                                        <span class="ms-2">My Queries</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('user.logout') }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-flex align-items-center text-danger">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span class="ms-2">Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item loginbtn">
                            {{-- <button type="button" class="btn btn-primary btn-sm px- d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bi bi-person"></i>
                                <span class="ms-2">Login</span>
                            </button> --}}
                            <a role="button" class="nav-link   text-white btn-sm px-3 d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bi bi-person"></i>
                                <span class="ms-2">Login</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- LOGIN MODAL --}}
    <div>
        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-lg makes it wider -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="loginFormDiv">
                            <form action="{{ route('user.sendOtp') }}" id="loginForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="loginEmail" name="email" type="email" />
                                    <label for="loginEmail">Email address</label>
                                    <small class="email-error alert alert-danger p-2 d-block mt-2 d-none"></small>
                                </div>

                                <div class="text-center mt-4 mb-0">
                                    <button type="button" id="sendOtp" class="btn btn-primary">Send Otp</button>
                                </div>
                            </form>
                        </div>
                        <div id="otpForm" style="display: none;">
                            <form method="POST" action="{{ route('user.loginSubmit') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="otp" name="otp" type="text" />
                                    <label for="otp">Enter OTP</label>
                                </div>
                                <div class="text-center mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer text-center py-3">
                        <div class="small">
                            <!-- <a href="{{ route('user.register') }}" data-bs-dismiss="modal">Need an account? Sign up!</a> -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal"
                                data-bs-dismiss="modal">Need an account? Sign up!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-lg makes it wider -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="registerFormDiv">
                            <form action="{{ route('storeUser') }}" id="registerForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="name"
                                        value="{{ old('name') }}" />
                                    <label for="name">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="mobile" name="mobile" type="number"
                                        value="{{ old('mobile') }}" />
                                    <label for="mobile">Mobile Number</label>
                                    <small class="reg-mobile-error alert alert-danger p-2 d-block mt-2 d-none"></small>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="regEmail" name="email" type="email"
                                        value="{{ old('email') }}" />
                                    <label for="regEmail">Email address</label>
                                    <small class="reg-email-error alert alert-danger p-2 d-block mt-2 d-none"></small>
                                </div>
                                <div class="form-floating mb-3 d-none">
                                    <input class="form-control" id="regOtp" name="otp" type="number"
                                        value="{{ old('otp') }}" />
                                    <label for="regOtp">Otp</label>
                                    @error('otp')
                                        <small class="alert alert-danger p-2 d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-block text-center mt-4 mb-0">
                                    <button type="button" id="sendRegOtp" class="btn btn-primary">Send Otp</button>
                                    <button type="submit" id="verifyRegOtp"
                                        class="btn btn-primary d-none">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('content')

    <!-- FAQ'S -->

    <section class="py-5 bg-light" id="faq">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="head-h2">FAQ</h2>
                    <p class="lead text-muted">Need Help? We’ve Got Answers</p>
                </div>
            </div>
            <!-- FAQ Sections -->
            <div class="row">
                <!-- New Seller FAQ -->
                <div class="col-md-12">
                    <div class="faq-section">
                        <!-- <h3 class="mb-4">Customer</h3> -->
                        @foreach ($faqs as $faq)
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse"
                                    data-bs-target="#faq{{ $faq->id }}">
                                    {{ $faq->question }}
                                    <i class="fas fa-chevron-down float-end"></i>
                                </div>
                                <div class="faq-answer collapse" id="faq{{ $faq->id }}">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Prefooter --}}
    <!-- Header -->
    <div class="section-divider"></div>
    <header class="bg-white py-4 mt-5">
        <div class="container">
            <h1 class="h3 mb-4">Local Business - Your One-Stop Solution for All Your Needs</h1>
            <p class="lead text-muted">
                LocalBusiness.com is a leading online platform connecting you with expert service providers across a
                wide range of categories. From home services like carpentry, plumbing, and painting to education support
                with tutors, coaching centers, and career guidance, Sulekha makes life easier by bringing trusted
                professionals to your doorstep.
            </p>
        </div>
    </header>

    <div class="section-divider"></div>

    <!-- Popular Categories Section -->
    <section class="py-4">
        <div class="container">
            <h2 class="h4 mb-4">Popular Categories</h2>
            <div class="row">
                @foreach (collect($categories)->chunk(3)->take(4) as $chunk)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        @foreach ($chunk as $category)
                            <div class="d-flex align-items-center ">
                                <img src="{{ asset('public/images/category/' . $category->image) }}"
                                    alt="Category image" width="25" height="25" class="me-2 rounded">
                                <a href="{{ route('category', $category->slug) }}" class="category-link">
                                    {{ $category['name'] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <footer class="footer-section">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="widget company-intro-widget">
                            <a class="navbar-brand fw-bold text-primary d-flex align-items-center"
                                href="{{ url('/') }}">

                                <P>LOCAL <span>BUSINESS</span></P>
                            </a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever.</p>
                            <ul class="company-footer-contact-list">
                                <li><i class="fas fa-phone"></i>+91 1234 5678 90</li>
                                <li><i class="fas fa-clock"></i>Mon - Sat 8.00 - 18.00</li>
                                <li><i class="fas fa-envelope"></i> LocalBusiness@example.com</li>
                            </ul>
                        </div>
                    </div><!-- widget end -->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget course-links-widget">
                            <h5 class="widget-title">HELPFUL LINKS</h5>
                            <ul class="courses-link-list">
                                <li><a href="{{ url('/') }}"><i class="fas fa-long-arrow-alt-right"></i>Home</a>
                                </li>
                                <li><a href="{{ route('about') }}"><i
                                            class="fas fa-long-arrow-alt-right"></i>About</a>
                                </li>
                                <li><a href="#faq"><i class="fas fa-long-arrow-alt-right"></i>Faq</a></li>
                                <li><a href="{{ route('privacyPolicy') }}" target="_blank"><i
                                            class="fas fa-long-arrow-alt-right"></i>Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div><!-- widget end -->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget latest-news-widget">
                            <h5 class="widget-title">LATEST NEWS</h5>
                            <ul class="small-post-list">
                                <li>
                                    <div class="small-post-item">
                                        <a href="#" class="post-date">July 18, 2018</a>
                                        <h6 class="small-post-title"><a href="#">Lorem Ipsum is simply dummy
                                                text of the
                                                printing.</a></h6>
                                    </div>
                                </li><!-- small-post-item end -->
                                <li>
                                    <div class="small-post-item">
                                        <a href="#" class="post-date">July 28, 2018</a>
                                        <h6 class="small-post-title"><a href="#">Lorem Ipsum is simply dummy
                                                text of the
                                                printing</a></h6>
                                    </div>
                                </li><!-- small-post-item end -->
                            </ul>
                        </div>
                    </div><!-- widget end -->
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="widget newsletter-widget">
                            <h5 class="widget-title">NEWSLETTER</h5>
                            <div class="footer-newsletter">
                                <p>Sign Up to Our Newsletter to Get Latest Updates & Services</p>
                                <form class="news-letter-form">
                                    <input type="email" name="news-email" id="news-email"
                                        placeholder="Your email address">
                                    <input type="submit" value="Send">
                                </form>
                            </div>
                        </div>
                    </div><!-- widget end -->
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 text-sm-left text-center">
                        <span class="copy-right-text">© 2025 DIGIBELLS All Rights Reserved.</span>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <ul class="terms-privacy d-flex justify-content-sm-end justify-content-center">
                            <li><a href="{{ route('termsAndConditions') }}" target="_blank">Terms & Conditions</a>
                            </li>
                            <li><a href="{{ route('privacyPolicy') }}" target="_blank">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- footer-bottom end -->
    </footer>


    <!-- Modal -->
    <div class="modal fade" id="ContactUsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="ContactUsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ContactUsModalLabel">
                        Contact Local Bussiness Support.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.contact.query') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Full Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile Number">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <select name="city" class="form-select">
                                <option value="">All City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->city }}">{{ $city->city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" placeholder="message" rows="5"></textarea>
                        </div>
                        <div>
                            <button class="ssub-btn" type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toaster for messages like success or error  -->
    @if (session('success'))
        @php
            $successMessage = str_replace("'", "\\'", session('success'));
        @endphp
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toastr.success('{!! $successMessage !!}', 'Success', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000
                });
            });
        </script>
    @elseif(session('error'))
        @php
            $errorMessage = str_replace("'", "\\'", session('error'));
        @endphp
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toastr.error('{!! $errorMessage !!}', 'Error', {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000
                });
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Initialize Owl Carousel -->
    <script src="{{ asset('public/assets/js/my.js') }}"></script>
    <script>
        //     document.addEventListener("DOMContentLoaded", function () {
        //   setTimeout(() => {
        //     const myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
        //       keyboard: false
        //     });
        //     myModal.show();
        //   }, 3000); // 3 seconds delay
        // });
    </script>
    <script>
        // Close alerts automatically after 3 seconds
        setTimeout(() => {
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');
            if (successAlert) successAlert.style.display = 'none';
            if (errorAlert) errorAlert.style.display = 'none';
        }, 3000);
    </script>
    <script>
        document.getElementById('sendRegOtp').addEventListener('click', function(e) {
            const regForm = document.getElementById('registerForm');
            const name = regForm.name.value;
            const email = regForm.email.value;
            const mobile = regForm.mobile.value;

            fetch("{{ route('user.sendRegOtp') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        email: email,
                        name: name,
                        mobile: mobile
                    })
                })
                .then(res => {
                    if (!res.ok) throw res;
                    return res.json();
                })
                .then(data => {
                    if (data.success === true) {
                        document.getElementById('regOtp').parentElement.classList.remove('d-none');
                        document.getElementById('regEmail').setAttribute('readonly', true);
                        document.getElementById('name').setAttribute('readonly', true);
                        document.getElementById('mobile').setAttribute('readonly', true);
                        document.querySelector('.reg-email-error').classList.add('d-none');
                        document.querySelector('.reg-mobile-error').classList.add('d-none');
                        e.target.classList.add('d-none');
                        e.target.nextElementSibling.classList.remove('d-none');
                    }
                    if (data.message.email) {
                        document.querySelector('.reg-email-error').classList.remove('d-none');
                        document.querySelector('.reg-email-error').textContent = data.message.email;
                    }
                    if (data.message.mobile) {
                        document.querySelector('.reg-mobile-error').classList.remove('d-none');
                        document.querySelector('.reg-mobile-error').textContent = data.message.mobile;
                    }
                })
                .catch(async err => {
                    console.log(err);
                });
        });

        document.getElementById('sendOtp').addEventListener('click', function(e) {
            // const loginForm = document.getElementById('loginForm');

            //both ways of getting email are correct
            const email = document.getElementById('loginEmail').value;
            // const email = loginForm.email.value;

            fetch("{{ route('user.sendOtp') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        email
                    })
                })
                .then(res => {
                    if (!res.ok) throw res;
                    return res.json();
                })
                .then(data => {
                    // On success: switch to OTP form
                    if (data.success === true) {
                        document.getElementById('loginFormDiv').style.display = 'none';
                        document.getElementById('otpForm').style.display = 'block';
                    }
                    if (data.message) {
                        document.querySelector('.email-error').classList.remove('d-none');
                        document.querySelector('.email-error').textContent = data.message;
                    }
                })
                .catch(async err => {
                    console.log(err);
                });
        });
    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @if ($errors->any() && session('modal_open'))
        <script>
            window.onload = function() {
                var registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
                registerModal.show();
                document.getElementById('regOtp').parentElement.classList.remove('d-none');
                document.getElementById('verifyRegOtp').classList.remove('d-none');
                document.getElementById('sendRegOtp').classList.add('d-none');
                document.getElementById('regEmail').setAttribute('readonly', true);
                document.getElementById('name').setAttribute('readonly', true);
                document.getElementById('mobile').setAttribute('readonly', true);
            };
        </script>
    @endif
    <script>
        const searchInput = document.getElementById("searchInput");

        const messages = [
            "Search for Vendors...",
            "Find your Need...",
            "Explore top categories...",
            "Discover new Services Near ..."
        ];

        let msgIndex = 0;
        let charIndex = 0;

        function typePlaceholder() {
            const currentMsg = messages[msgIndex];

            if (charIndex <= currentMsg.length) {
                searchInput.placeholder = currentMsg.substring(0, charIndex);
                charIndex++;
                setTimeout(typePlaceholder, 80);
            } else {
                // Pause before starting the next message
                setTimeout(() => {
                    charIndex = 0;
                    msgIndex = (msgIndex + 1) % messages.length;
                    typePlaceholder();
                }, 1500); // wait 1.5s before typing next
            }
        }

        window.addEventListener("load", typePlaceholder);


        // OWL CAROUSLE

        $(document).ready(function() {
            $(".full-screen-carousel").owlCarousel({
                items: 1, // Number of items per slide
                margin: 10,
                loop: true,
                nav: true,
                autoplay: true,
                dots: false,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 1
                    }
                }
            });
        });



        $(document).ready(function() {
            $(".top-rank").owlCarousel({
                items: 6, // Number of items per slide
                margin: 10,
                loop: true,
                nav: true,
                autoplay: true,
                dots: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 6
                    }
                }
            });
        });


        $(document).ready(function() {
            $(".brand-carousel").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                autoplay: true,
                autoplayTimeout: 2000,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        });
    </script>


    {{-- loading Button after Submitting Form --}}

    <script>
        document.querySelectorAll('.form-with-loader').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('.submit-btn-with-loader');
                const btnText = submitBtn.querySelector('.btn-text');
                const btnSpinner = submitBtn.querySelector('.btn-spinner');

                const loadingText = submitBtn.dataset.loadingText || 'Submitting...';

                submitBtn.disabled = true;
                btnText.textContent = loadingText;
                btnSpinner.classList.remove('d-none');
            });
        });
    </script>
</body>

</html>
