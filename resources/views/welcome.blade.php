@extends('app')

@section('content')
    {{-- ======================CSS============================= --}}

    <style>
        :root {
            --bs-primary-rgb: 13, 110, 253;
            --pf: "font-family: " Poppins", sans-serif;";
            font-weight: 400 !important;
            font-style: normal;
        }

        .hero-section h2 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 400;
        }

        .hero-section h2 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 400;
        }

        .head-h2 {
            text-transform: uppercase;
            font-weight: 400;
            font-size: 30px;
            color: #0d6efd !important;
        }

        .cool p {
            font-weight: 400;
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
            font-weight: 400;
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
            font-weight: 400;
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
            font-weight: 400;
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

        .hero {

            background: url("{{ asset('public/assets/img/hero.jpg') }}");
            background-size: cover;
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



        /* 2nd SECTION */

        .main-container {
            border: 2px solid #1274c0;
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
            background: #fff;
            margin-top: 40px;
            padding: 40px 30px;
        }

        .feature-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            transition: transform 0.2s, box-shadow 0.2s;
            background: #f8f9fa;
        }

        .feature-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.13);
        }

        .feature-icon {
            font-size: 2.2rem;
            color: #1274c0;
            margin-bottom: 10px;
        }

        .section-title {
            color: #1274c0;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .form-control:focus {
            border-color: #1274c0;
            box-shadow: 0 0 0 0.2rem rgba(18, 116, 192, .15);
        }

        .btn-success {
            background: #1274c0;
            border: none;
        }

        .btn-success:hover {
            background: #0f5c99;
        }

        @media (max-width: 767px) {
            .main-container {
                padding: 20px 5px;
            }
        }


        /* 3RD SECTION */

        .main-heading {
            font-size: 2.1em;
            font-weight: 400;
            color: #1f85c7;
            margin: 24px 0 24px 16px;
            letter-spacing: 0.5px;

        }

        .section3 {
            display: flex;
            min-height: 80vh;
            box-sizing: border-box;
            padding: 0 0 32px 0;
            align-items: flex-start;
            justify-content: center;
        }

        .sidebar {
            width: 340px;
            margin-right: 28px;
            display: flex;
            flex-direction: column;
        }

        .sidebar-image-wrapper {
            position: relative;
            width: 100%;
            height: 540px;
            border-radius: 12px;
            overflow: hidden;
        }

        .sidebar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .sidebar-gradient {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.85) 100%);
        }

        .sidebar-content {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            padding: 32px 24px 24px 24px;
            z-index: 2;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            font-size: 0.8rem;
        }

        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0 0 24px 0;
        }

        .sidebar-list li {
            margin-bottom: 12px;
            font-size: 1.1em;
            font-weight: 400;
            letter-spacing: 0.2px;
        }

        .view-all-btn {
            padding: 12px 32px;
            background: #008060;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1em;
            font-weight: 400;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.10);
            transition: background 0.2s;
        }

        .view-all-btn:hover {
            background: #005a43;
            color: white;
        }

        .main-content {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            align-content: start;
            max-width: 1100px;
        }

        .category-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
            padding: 24px 18px 18px 18px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-height: 180px;
            height: 100%;
            border: 1px solid #ececec;
        }

        .category-card img {
            width: 64px;
            height: 64px;
            object-fit: contain;
            margin-bottom: 10px;
            border-radius: 8px;
            background: #f3f7f6;
        }

        .category-title {
            font-size: 1.13em;
            font-weight: 800;
            margin-bottom: 8px;
            color: #1f85c7;
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-list li {
            color: #222;
            font-size: 0.8rem;
            margin-bottom: 6px;
        }

        @media (max-width: 1200px) {
            .main-content {
                grid-template-columns: 1fr 1fr;
                max-width: 800px;
            }
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                align-items: stretch;
            }

            .sidebar {
                width: 100%;
                margin-right: 0;
                margin-bottom: 24px;
            }

            .main-content {
                grid-template-columns: 1fr;
                max-width: 100%;
                gap: 18px;
            }
        }






        .category-list a {
            color: #1f85c7;
            text-decoration: none;
            font-size: 1rem;
        }

        .sidebar-list.sidebar-list a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        .category-list li::before {
            content: '»';
            color: #1f85c7;
            text-decoration: none;
            font-size: 1rem;
            padding-right: 5px;
        }

        .sidebar-list li::before {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding-right: 5px;
        }


        /* BRAND  */
        .brand-carousel .item {
            text-align: center;
        }

        .brand-carousel .brand-logo {
            width: 100px !important;
            height: auto;
            object-fit: contain;
            border-radius: 50%;
            transition: all 0.3s ease;
            border: none !important;
        }

        .brand-carousel .brand-logo:hover {
            filter: grayscale(100%);
            transform: scale(1.05);
        }


        /* 8th section */

        .more-section {
            background: #fff;
            padding: 40px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .more-item {
            text-align: center;
            padding: 20px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
        }

        @media (min-width: 768px) {
            .more-item:not(:nth-child(4n))::after {
                content: "";
                position: absolute;
                top: 10%;
                right: 0;
                width: 1px;
                height: 80%;
                background-color: #ccc;
            }
        }

        @media (max-width: 767.98px) {
            .more-item:not(:nth-child(2n))::after {
                content: "";
                position: absolute;
                top: 10%;
                right: 0;
                width: 1px;
                height: 80%;
                background-color: #ccc;
            }
        }

        .more-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
            object-fit: contain;
        }

        .more-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .more-desc {
            font-size: 14px;
            color: #555;
            min-height: 60px;
            /* 👈 Fixed height */
        }

        .more-btn {
            border: 1px solid #007bff;
            color: #007bff;
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 14px;
            margin-top: auto;
            /* 👈 Push button to bottom */
            background: none;
            transition: 0.3s;
        }

        .more-btn:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>


    {{-- HERO SECTION --}}

    <div class="container-fluid hero">

    </div>


    {{-- 2nd Section --}}
    <div class="container">
        <div class="main-container">
            <div class="row g-4 align-items-center">
                <!-- Left Section -->
                <div class="col-lg-5">
                    <h2 class="fw-bold mb-3">We connect <br><span class="fw-bold text-dark">Buyers & Sellers</span></h2>
                    <p class="mb-4 text-secondary">IndiaMART is India's largest online B2B marketplace, connecting buyers
                        with suppliers.</p>
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="feature-card p-3 text-center">
                                <div class="feature-icon"><i class="fa-solid fa-star"></i></div>
                                <div class="small fw-semibold">Trusted Platform</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card p-3 text-center">
                                <div class="feature-icon"><i class="fa-solid fa-shield-halved"></i></div>
                                <div class="small fw-semibold">Safe & Secure</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card p-3 text-center">
                                <div class="feature-icon"><i class="fa-solid fa-headset"></i></div>
                                <div class="small fw-semibold">Quick Assistance</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Section -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <div class="text-center mb-3">
                            <h4 class="section-title">TELL US<br>WHAT YOU NEED</h4>
                        </div>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="Enter Product / Service name">
                            </div>
                            <div class="mb-3 input-group input-group-lg">
                                <span class="input-group-text">+91</span>
                                <input type="text" class="form-control" placeholder="Enter your mobile">
                            </div>
                            <div class="mb-3">
                                <small class="text-muted">Your Country is <span class="text-primary">India ▼</span></small>
                            </div>
                            <button type="submit" class="btn btn-success w-100 mb-4 btn-lg">Submit Requirement</button>
                        </form>
                        <div class="row g-3 text-center">
                            <div class="col-6 col-md-3">
                                <div class="feature-card p-2">
                                    <div class="feature-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                    <div class="fw-bold small">CONVENIENCE<br>OF BUYING</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="feature-card p-2">
                                    <div class="feature-icon"><i class="fa-solid fa-comments-dollar"></i></div>
                                    <div class="fw-bold small">COMPETITIVE<br>QUOTES</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="feature-card p-2">
                                    <div class="feature-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                                    <div class="fw-bold small">PAYMENT<br>PROTECTION</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="feature-card p-2">
                                    <div class="feature-icon"><i class="fa-solid fa-users"></i></div>
                                    <div class="fw-bold small">5.98 CRORE +<br>BUYERS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Right Section -->
            </div>
        </div>
    </div>

    {{-- END --}}



    <style>
        .ad-placeholder {
            width: 100%;
            max-width: 728px;
            height: 90px;
            background: #f5f5f5;
            border: 1px dashed #aaa;
            text-align: center;
            line-height: 90px;
            font-size: 16px;
            color: #555;
            margin: 20px auto;
        }

        @media (max-width: 768px) {
            .ad-placeholder {
                height: 250px;
                max-width: 300px;
                line-height: 250px;
            }
        }
    </style>

    <div class="ad-placeholder">
        Ad Space Reserved
    </div>

    {{-- 4TH SECTION --}}


    @forelse ($categories as $mainCategory)
        <div class="main-heading">{{ $mainCategory->name }}</div>
        <div class="container section3 py-3">
            <div class="sidebar">
                <div class="sidebar-image-wrapper">
                    <img src="{{ asset('public/images/category/'.$mainCategory->image) }}" alt="{{ $mainCategory->name }}" class="sidebar-image">
                    <div class="sidebar-gradient"></div>
                    <div class="sidebar-content">
                        @if ($mainCategory->children->count())
                            <ul class="list-unstyled category-list sidebar-list">
                                @foreach ($mainCategory->children as $subCategory)
                                    <li><a href="{{ route('productsByCategory', $subCategory->slug) }}">{{ $subCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ route('category',$mainCategory->slug) }}" class="view-all-btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="main-content">
                @if ($mainCategory->children->count())
                    @foreach ($mainCategory->children as $subCategory)
                        <div class="category-card">
                            <img src="{{ asset('public/images/category/'.$subCategory->image) }}"
                                alt="{{ $subCategory->name }}">
                            <div class="category-title">{{ $subCategory->name }}</div>
                            @if ($subCategory->children->count())
                                <ul class="list-unstyled category-list">
                                    @foreach ($subCategory->children as $childCategory)
                                        <li><a href="{{ route('productsByCategory', $childCategory->slug) }}">{{ $childCategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
          <div class="ad-placeholder">
        Ad Space Reserved
    </div>
    @empty
        <div class="container text-center my-5">
            <p class="text-muted">No categories available at the moment.</p>
        </div>
    @endforelse


   

    {{-- 6Th Section --}}
    <div class="container my-5">
        <div class="row quotes-section align-items-center">
            <!-- Left Info Section -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="main-heading">Get free quotes from multiple sellers</div>
                <div class="row text-center">
                    <div class="col-4 feature">
                        <img src="https://img.icons8.com/ios/50/paper-plane.png" alt="Tell us">
                        <div class="feature-title">Tell us what<br><strong>You Need</strong></div>
                    </div>
                    <div class="col-4 feature">
                        <img src="https://img.icons8.com/ios/50/open-envelope.png" alt="Receive quotes">
                        <div class="feature-title">Receive free quotes from<br><strong>Sellers</strong></div>
                    </div>
                    <div class="col-4 feature">
                        <img src="https://img.icons8.com/ios/50/handshake.png" alt="Seal the Deal">
                        <div class="feature-title">Seal the<br><strong>Deal</strong></div>
                    </div>
                </div>
            </div>

            <!-- Right Form Section -->
            <div class="col-lg-6">
                <div class="form-title">Tell us your Requirement</div>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Enter Product / Service name" required>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text">+91</span>
                        <input type="tel" class="form-control" placeholder="Enter your mobile" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Select State" required>
                            <option selected disabled>Select your state</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <button type="submit" class="btn submit-btn bg-success text-white w-100">Submit
                        Requirement</button>
                </form>
            </div>
        </div>
    </div>


    {{-- 7th Section --}}


    {{-- SHOP BY BRAND --}}

    <div class="container-fluid my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="main-heading">Explore products from Premium Brands</div>
            <a href="{{ route('productcat') }}" class="text-primary fw-semibold">View All</a>
        </div>

        <div class="owl-carousel brand-carousel owl-theme">

            <a href="/brands/apple" class="item">
                <img src="{{ asset('public/assets/img/brand-1.png') }}" class="img-fluid brand-logo" alt="Apple Logo">
            </a>

            <a href="/brands/samsung" class="item">
                <img src="{{ asset('public/assets/img/brand-2.png') }}" class="img-fluid brand-logo"
                    alt="Samsung Logo">
            </a>

            <a href="/brands/hp" class="item">
                <img src="{{ asset('public/assets/img/brand-3.png') }}" class="img-fluid brand-logo" alt="HP Logo">
            </a>

            <a href="/brands/dell" class="item">
                <img src="{{ asset('public/assets/img/brand-4.png') }}" class="img-fluid brand-logo" alt="Dell Logo">
            </a>

            <a href="/brands/lenovo" class="item">
                <img src="{{ asset('public/assets/img/brand-5.png') }}" class="img-fluid brand-logo" alt="Lenovo Logo">
            </a>

            <a href="/brands/asus" class="item">
                <img src="{{ asset('public/assets/img/brand-6.png') }}" class="img-fluid brand-logo" alt="Asus Logo">
            </a>

            <a href="/brands/asus" class="item">
                <img src="{{ asset('public/assets/img/brand-7.png') }}" class="img-fluid brand-logo" alt="Asus Logo">
            </a>

            <a href="/brands/asus" class="item">
                <img src="{{ asset('public/assets/img/brand-8.png') }}" class="img-fluid brand-logo" alt="Asus Logo">
            </a>

            <a href="/brands/asus" class="item">
                <img src="{{ asset('public/assets/img/brand-9.png') }}" class="img-fluid brand-logo" alt="Asus Logo">
            </a>

        </div>
    </div>





    {{-- 8Th Section --}}
    <div class="container my-5">
        <div class="main-heading">More For You</div>
        <div class="row more-section">
            <div class="col-6 col-md-3 more-item">
                <img src="https://cdn-icons-png.flaticon.com/128/3649/3649497.png" alt="Verified Sellers"
                    class="more-icon" />
                <div class="more-title">Connect with verified sellers</div>
                <div class="more-desc">Tell us your requirement & let our experts find verified sellers for you</div>
                <button class="more-btn">Get Verified Sellers</button>
            </div>
            <div class="col-6 col-md-3 more-item">
                <img src="https://cdn-icons-png.flaticon.com/128/3222/3222657.png" alt="Sell on IndiaMART"
                    class="more-icon" />
                <div class="more-title">Sell on Localbusiness for free</div>
                <div class="more-desc">Reach out to more than 21+ crore buyers. Sell with us.</div>
                <button class="more-btn">Start Selling</button>
            </div>
            <div class="col-6 col-md-3 more-item">
                <img src="https://cdn-icons-png.flaticon.com/128/7075/7075369.png" alt="Download App"
                    class="more-icon" />
                <div class="more-title">Download our App</div>
                <div class="more-desc">Get instant notifications on the go. Download our App Now</div>
                <button class="more-btn">Download Now</button>
            </div>
            <div class="col-6 col-md-3 more-item">
                <img src="https://cdn-icons-png.flaticon.com/128/5579/5579107.png" alt="Tally on Mobile"
                    class="more-icon" />
                <div class="more-title">Best Price</div>
                <div class="more-desc">With Live Keeping, SMEs can now connect their Tally offline data to mobile app
                </div>
                <button class="more-btn">Know More</button>
            </div>
        </div>
    </div>
@endsection
