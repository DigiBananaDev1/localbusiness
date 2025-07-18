@extends('app')

@section('content')
    {{-- ======================CSS============================= --}}

    <style>
        :root {
            --bs-primary-rgb: 13, 110, 253;
            --pf: "font-family: " Poppins", sans-serif;";
            font-weight: 800 !important;
            font-style: normal;
        }

        .hero-section h2 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 700;
        }

        .hero-section h2 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 700;
        }

        .head-h2 {
            text-transform: uppercase;
            font-weight: 800;
            font-size: 30px;
            color: #0d6efd !important;
        }

        .cool p {
            font-weight: 500;
        }

        .category h2 {
            font-size: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .Articles-carousel p {
            font-size: 13px;
        }

        .red-btn {
            background: #07077e;
        }

        .blog-read {
            color: white;
            letter-spacing: 1px;
        }

        .blog-read:hover {
            color: white;
        }

        .get-qbtn {
            border-radius: 0px !important;
        }

        .explore span {
            font-size: 18px;
        }

        .popular-search-section {
            padding: 20px;

        }

        .popular-search-section h3 {
            margin-bottom: 15px;
        }

        .popsearch .item a {
            display: inline-block;
            padding: 10px 20px;
            background: #eee;
            border-radius: 20px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .popsearch .item a:hover {
            background: #007bff;
            color: #fff;
        }

        .popsearch .item {
            border: none !important;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background-color: rgba(var(--bs-primary-rgb), 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .hover-card {
            transition: transform 0.3s ease;
            border-radius: 0px !important;
        }

        .hover-card:hover {
            transform: translateY(-5px);
        }

        .hover-card:hover .icon-circle {
            background-color: var(--bs-primary);
        }

        .hover-card:hover .icon-circle i {
            color: white !important;
        }

        .card {
            border-radius: 15px;
        }


        .serv-name {
            color: #0d6efd;
            font-size: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            font-weight: 700;
            margin: 20px 0px;
        }

        .cta {
            background-color: rgba(var(--bs-primary-rgb), 0.1);
            border-radius: 100px;
        }

        .cta h2 {
            font-size: 30px;
            padding: 10px;
            text-transform: uppercase;
            font-weight: 800;
        }

        .cta p {
            font-size: 16px;
            padding-left: 10px;
            text-transform: uppercase;
            font-weight: 400;
        }

        .cta .btn {
            background: black;
            width: 150px;
            padding: 10px;
            border-radius: 60px;
            margin-top: 10px;
        }

        @media only screen and (max-width: 600px) {
            .cta {
                border-radius: 20px !important;
            }

            .cta h2 {
                font-size: 25px;
            }
        }


        .hero-section1 {
            padding: 5rem 0;
        }

        .left-side {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .top-section {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .main-image-container {
            flex: 2;
            position: relative;
            padding-bottom: 70%;
            border-radius: 16px;
            overflow: hidden;
            width: 65%;
        }

        .stats-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            width: 35%;
        }

        .main-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .stat-card {
            padding: 2rem 1.5rem;
            border-radius: 16px;
            text-align: center;
            color: white;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        .stat-card.dark {
            background-color: #1a1a1a;
        }

        .stat-card.green {
            background-color: #0D6EFD;
        }

        .stat-number {
            font-size: 2.75rem;
            font-weight: bold;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-text {
            font-size: 1rem;
            opacity: 0.9;
        }

        .bottom-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* space between images */
            padding: 10px;
        }

        .bottom-image-container img {
            width: 150px;
            /* set desired width */
            height: auto;
            /* maintain aspect ratio */
            object-fit: contain;
        }

        .content-side {
            padding-left: 4rem;
        }

        .badge-custom {
            background-color: #f8f9fa;
            color: #333;
            padding: 0.75rem 1.25rem;
            border-radius: 30px;
            font-weight: 500;
            font-size: 1rem;
            margin-bottom: 2rem;
            display: inline-block;
        }

        .main-heading {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: #1a1a1a;
        }

        .main-description {
            font-size: 1.125rem;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin-bottom: 2.5rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1.125rem;
            color: #444;
        }

        .feature-icon {
            color: #0D6EFD;
            margin-right: 1rem;
            font-size: 1.25rem;
        }

        .btn-discover {
            background-color: #0D6EFD;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 1rem 2rem;
            font-size: 1.125rem;
            font-weight: 500;
        }



        .btn-discover:hover {
            color: white;
        }

        @media (max-width: 991px) {
            .content-side {
                padding-left: 1rem;
                padding-top: 2rem;
            }

            .main-heading {
                font-size: 2.5rem;
            }

            .top-section {
                flex-direction: column;
            }

            .main-image-container {
                width: 100%;
                padding-bottom: 60%;
            }

            .stats-column {
                width: 100%;
                flex-direction: row;
            }

            .stat-card {
                /* min-height: 140px; */
            }

            .bottom-image-container {
                padding: 10px;
                display: block;
            }

            .main-heading {
                font-size: 1.5rem;
            }

            .hero-section h2 {
                font-size: 1.9rem;
            }
        }



        /* BOX SAME SIZE CSS */
        .education-carousel {
            border: 1px solid rgba(128, 128, 128, 0.63);
            border-radius: 10px;
        }

        .education-carousel .item {
            height: 100%;
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            border: 0px solid gray;

        }

        .education-carousel img {
            width: 150px !important;
            height: 100px !important;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-title {
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 10px;
            min-height: 40px;
            display: block;
            color: #212529;
            text-decoration: none;
            text-transform: uppercase;
            font-family: var(--pf);
        }

        .qsection {
            margin-top: auto;
            display: block !important;
            font-size: 1rem;
            text-align: center;
        }

        .get-qbtn {
            background-color: #0d6efd;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.875rem;
            display: block !important;
            text-align: center;
            transition: all 0.5s;
        }

        .get-qbtn:hover {
            background-color: #FF4500;
            color: #fff;
        }

        /* .cate-stck {
                            position: sticky;
                            height: fit-content;
                            max-height: calc(100vh);
                            overflow-y: auto;

                        }

                        .cate-card {
                            background: #fff;
                            padding: 10px;
                            border-radius: 8px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                            transition: all 0.3s ease;
                        }

                        .cate-card:hover {
                            transform: translateX(5px);
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        }

                        .cate-link {
                            color: #333;
                            text-decoration: none;
                            font-weight: 500;
                        }

                        .cate-link:hover {
                            color: #0D6EFD;
                        } */

        .full-screen-carousel img {

            height: 70vh;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 24px;
            padding: 20px;
        }

        .category-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #fff;
            border-radius: 16px;

            padding: 20px 10px;
            transition: box-shadow 0.2s;
            cursor: pointer;
            border: 1px solid #eee;
        }

        .category-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
        }

        .category-icon {
            width: 48px;
            height: 48px;
            margin-bottom: 12px;
            border-radius: 12px;
            object-fit: contain;
        }

        .category-label {
            text-align: center;
            font-size: 15px;
            color: #222;
            margin-top: 4px;
            word-break: break-word;
        }

        .categories-grid a {
            white-space: nowrap;
            /* Prevents text from wrapping */
            overflow: hidden;
            /* Hides overflow text */
            text-overflow: ellipsis;
            /* Adds "..." at the end */
            display: inline-block;
            /* Required for ellipsis to work */
            max-width: 100%;
            /* Set a width or max-width */
        }

        .rb1 {
            position: relative;
            background: #1274c0 url("{{ asset('public/assets/img/b2b.webp') }}");
            background-size: 200px;
            background-repeat: no-repeat;
            background-position: right;
            height: 35vh;
            width: 100%;
            display: flex;
            justify-content: space-between;
            /* Push content to sides */

            align-items: center;
            color: white;
            padding: 0 2rem;
            /* Optional spacing */
        }

        .rb1 a {
            color: white;
        }

        .rb2 {
            position: relative;
            background: #FF6C00 url("{{ asset('public/assets/img/b2b2.webp') }}");
            background-size: 200px;
            background-repeat: no-repeat;
            background-position: right;
            height: 35vh;
            width: 100%;
            display: flex;
            justify-content: space-between;
            /* Push content to sides */

            align-items: center;
            color: white;
            padding: 0 2rem;
            /* Optional spacing */
        }

        .rb2 a {
            color: white;
        }
    </style>


    {{-- HERO SECTION --}}

    {{-- LEFT SECTION --}}

    <div class="container mt-1">
        <div class="row">
            <div class="col-md-8">
                <div class="owl-carousel full-screen-carousel owl-theme">
                    <div class="item">

                        <img src="{{ asset('public/assets/img/off-4.jpg') }}" alt="Slide 1">

                    </div>
                    <div class="item">

                        <img src="{{ asset('public/assets/img/banner-4.webp') }}" alt="Slide 1">

                    </div>
                    <div class="item">

                        <img src="{{ asset('public/assets/img/banner-3.webp') }}" alt="Slide 1">

                    </div>
                    <div class="item">

                        <img src="{{ asset('public/assets/img/banner-6.webp') }}" alt="Slide 1">

                    </div>
                    <div class="item">

                        <img src="{{ asset('public/assets/img/banner-5.webp') }}" alt="Slide 1">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="rb1 mb-1">
                        <div class="text-content">
                            <h2>B2B</h2>
                            <p>Wholesale & Supply</p>

                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="rb2">
                        <div class="text-content">
                            <h2>REPAIR & <br> SERVICES</h2>
                            <p>Service Providers</p>

                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>









    {{-- SIDEBAR AND SERVICES --}}

    {{-- <div class="container  p-4 b-0">
        <div class="row gap-0">
            <div class="col-md-12 cate-stck">
                <h2 class="serv-name">CATEGORIES</h2>
                @foreach ($categories as $category)
                <div class=" d-flex align-items-center mb-2 ">
                    <img src="{{ asset('public/images/category/' . $category->image) }}" alt="Category image" width="40"
                        height="40" class="me-2 rounded">
                    <a class="cate-link text-truncate" href="{{ route('venders', $category->id) }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $category->name }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    {{-- CATEGOREY --}}


    <div class="container">
        <div class="categories-grid">
            @foreach ($categories as $category)
                <div class="category-card">
                    <img src="{{ asset('public/images/category/' . $category->image) }}" alt="Category image"
                        class="category-icon">
                    <a class="cate-link text-truncate" href="{{ route('venders', $category->id) }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $category->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6" style="border: 0px solid gainsboro; border-radius: 10px;">
                @foreach ($vendorCategories as $categoryName => $vendors)
                    <h2 class="serv-name">{{ $categoryName }}</h2>
                    <div class="owl-carousel education-carousel">
                        @foreach ($vendors as $vendor)
                            <div class="item">
                                <a href="{{ route('venderServices', $vendor->id) }}">
                                    @if (empty($vendor->image))
                                        <img src="{{ asset('public/assetss/img/image.png') }}" alt="image"
                                            height="200" width="150">
                                    @else
                                        <img src="{{ asset('public/images/vendor/' . $vendor->image) }}" alt="Image 1"
                                            height="200" width="150">
                                    @endif
                                </a>
                                <div>
                                    <a class="product-title"
                                        href="{{ route('venderServices', $vendor->id) }}">{{ $vendor->business_name }}</a>
                                </div>
                                <div class="qsection">
                                    <span class="experts text-muted">5624 Experts</span>
                                    <a class="get-qbtn" href="{{ route('venderServices', $vendor->id) }}">GET QUOTES</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            {{-- Right Section --}}
            <div class="col-md-6" style="border: 0px solid gainsboro; border-radius: 10px;">
                @foreach ($vendorCategories as $categoryName => $vendors)
                    <h2 class="serv-name">{{ $categoryName }}</h2>
                    <div class="owl-carousel education-carousel">
                        @foreach ($vendors as $vendor)
                            <div class="item">
                                <a href="{{ route('venderServices', $vendor->id) }}">
                                    @if (empty($vendor->image))
                                        <img src="{{ asset('public/assetss/img/image.png') }}" alt="image"
                                            height="200" width="150">
                                    @else
                                        <img src="{{ asset('public/images/vendor/' . $vendor->image) }}" alt="Image 1"
                                            height="200" width="150">
                                    @endif
                                </a>
                                <div>
                                    <a class="product-title"
                                        href="{{ route('venderServices', $vendor->id) }}">{{ $vendor->business_name }}</a>
                                </div>
                                <div class="qsection">
                                    <span class="experts text-muted">5624 Experts</span>
                                    <a class="get-qbtn" href="{{ route('venderServices', $vendor->id) }}">GET QUOTES</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>




    {{-- COOL SECTION --}}
    <!-- <div class="container-fluid cool mt-5" style="border: 0px solid gainsboro;border-radius: 10px;">
                            <h2 class="head-h2">Cool Day Essentials</h2>
                            <p>Discover wide range of winter collection</p>
                            <div class="owl-carousel recent-carousel">
                                <div class="item item1">
                                    <img src="{{ asset('public/assets/img/c1.jpg') }}" alt="Image 1" class="cool-img">
                                    <div class="de-pro">
                                        <a class="product-title" href="#">Beauty Parlours</a>
                                        <a class="explore" href="#">Explore <span>&#8250;</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="item item1">
                                    <img src="{{ asset('public/assets/img/c2.jpg') }}" alt="Image 1" class="cool-img">
                                    <div class="de-pro">
                                        <a class="product-title" href="#">Beauty Parlours</a>
                                        <a class="explore" href="#">Explore <span>&#8250;</span> </a>
                                    </div>
                                </div>
                                <div class="item item1">
                                    <img src="{{ asset('public/assets/img/c3.jpg') }}" alt="Image 1" class="cool-img">
                                    <div class="de-pro">
                                        <a class="product-title" href="#">Beauty Parlours</a>
                                        <a class="explore" href="#">Explore <span>&#8250;</span> </a>
                                    </div>
                                </div>
                                <div class="item item1">
                                    <img src="{{ asset('public/assets/img/c4.jpg') }}" alt="Image 1" class="cool-img">
                                    <div class="de-pro">
                                        <a class="product-title" href="#">Beauty Parlours</a>
                                        <a class="explore" href="#">Explore <span>&#8250;</span> </a>
                                    </div>
                                </div>
                                <div class="item item1">
                                    <img src="{{ asset('public/assets/img/c5.jpg') }}" alt="Image 1" class="cool-img">
                                    <div class="de-pro">
                                        <a class="product-title" href="#">Beauty Parlours</a>
                                        <a class="explore" href="#">Explore <span>&#8250;</span> </a>
                                    </div>
                                </div>


                            </div>
                        </div> -->



    {{-- POPULAR SEARCH --}}
    {{-- <div class="popular-search-section">
        <h2 class="head-h2">Popular Searches</h2>
        <div class="owl-carousel popsearch mt-4">
            @foreach ($categories as $category)
            <div class="item"><a href="{{ route('venders', $category->id) }}">{{ $category->name }}</a></div>
            @endforeach
            <div class="item"><a href="#">T-Shirts</a></div>
        </div>
    </div> --}}

    {{-- WHY CHOOSE US SECTION --}}
    <section class="py-5 bg-light" id="why-choose-us">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="head-h2">WHY CHOOSE US?</h2>
                    <p class="lead text-muted">Hamari services aapke business ko digital duniya mein aage badhane ke liye
                        best hain!</p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="card h-100 shadow-lg border-0 hover-card">
                        <div class="card-body text-center p-5">
                            <div class="icon-circle mb-4 floating-animation">
                                <i class="bi bi-currency-rupee fs-2 text-primary"></i>
                            </div>
                            <h5 class="card-title text-primary">Affordable Pricing</h5>
                            <p class="card-text">Har business ke budget mein fit, best value for money.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="card h-100 shadow-lg border-0 hover-card">
                        <div class="card-body text-center p-5">
                            <div class="icon-circle mb-4 floating-animation">
                                <i class="bi bi-people-fill fs-2 text-primary"></i>
                            </div>
                            <h5 class="card-title text-primary">Expert Team</h5>
                            <p class="card-text">Experienced developers aur designers, jo aapke business ko samajhte hain.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="card h-100 shadow-lg border-0 hover-card">
                        <div class="card-body text-center p-5">
                            <div class="icon-circle mb-4 floating-animation">
                                <i class="bi bi-lightning-fill fs-2 text-primary"></i>
                            </div>
                            <h5 class="card-title text-primary">Fast Delivery</h5>
                            <p class="card-text">Time par project completion, bina kisi delay ke.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="card h-100 shadow-lg border-0 hover-card">
                        <div class="card-body text-center p-5">
                            <div class="icon-circle mb-4 floating-animation">
                                <i class="bi bi-headset fs-2 text-primary"></i>
                            </div>
                            <h5 class="card-title text-primary">24/7 Support</h5>
                            <p class="card-text">Hamesha aapke saath, kisi bhi samasya mein turant madad.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="card h-100 shadow-lg border-0 hover-card">
                        <div class="card-body text-center p-5">
                            <div class="icon-circle mb-4 floating-animation">
                                <i class="bi bi-gear-fill fs-2 text-primary"></i>
                            </div>
                            <h5 class="card-title text-primary">Customized Solutions</h5>
                            <p class="card-text">Har business ki alag zarurat ke hisaab se solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- COUNTER SECTION --}}


    <section class="hero-section1">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 mt-5">
                    <div class="left-side">
                        <!-- Top section with image and stats -->
                        <div class="top-section">
                            <!-- Main large image -->
                            <div class="main-image-container">
                                <img src="https://mizzle.webestica.com/assets/images/about/02.jpg" alt="Meeting Room"
                                    class="main-image">
                            </div>

                            <!-- Stats cards column -->
                            <div class="stats-column">
                                <div class="stat-card dark">
                                    <div class="stat-number">10+</div>
                                    <div class="stat-text">Years of experience</div>
                                </div>
                                <div class="stat-card green">
                                    <div class="stat-number">1.2K</div>
                                    <div class="stat-text">Happy customers</div>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom image -->
                        <div class="bottom-image-container">
                            <img
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/640px-Google_2015_logo.svg.png">
                            <img src="https://reviewthere.com/wp-content/uploads/review-there-logo.png">
                            <img
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Trustpilot_Logo_%282022%29.svg/640px-Trustpilot_Logo_%282022%29.svg.png">
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="content-side">
                        <span class="badge badge-custom">🎯 Your gateway to digital success</span>
                        <h1 class="main-heading">Defining the future of online experiences!</h1>
                        <p class="main-description">Embrace a new era of digital success with Mizzle. Our team combines
                            cutting-edge design with robust development to deliver websites that captivate and convert.</p>

                        <ul class="feature-list">
                            <li class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Emphasis on ROI-driven solutions</span>
                            </li>
                            <li class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Expert team with diverse skill</span>
                            </li>
                            <li class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Proven track record of delivering results</span>
                            </li>
                        </ul>

                        <a href="{{ route('about') }}" class="btn btn-discover">Discover more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
