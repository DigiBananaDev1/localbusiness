@extends('app')

@section('content')

    <style>
        .section-box {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        }

        .search-input {
            border-radius: 0.375rem;
        }

        .btn-blue {
            background-color: #007bff;
            color: white;
            border-radius: 0.375rem;
        }


        .btn-blue:hover{
            color: white;
        }
        .person-img {
            max-width: 300px;
            height: 300px;
        }

        .bg-light-blue {
            background-color: #f4f8ff;
        }

        .highlight {
            font-weight: 700;
        }


        .category-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 0.5rem;
            transition: transform 0.3s ease;
            border: none;
        }

        .item:hover .category-img {
            transform: scale(1.05);
        }

        .item {
            border: none;
        }




        .card-custom {
            border: 1px solid #ddd;
            border-radius: 16px;
            overflow: hidden;
            padding: 18px 10px 10px 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.10);
            transition: transform 0.2s, box-shadow 0.2s;
            background: #fff;
        }

        .card-custom:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);

        }

        .store-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 8px;
            border-radius: 10px;
        }

        .rating-box {
            background-color: #28a745;
            color: #fff;
            padding: 3px 10px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            display: inline-block;
            margin-right: 7px;
        }

        .ratings-count {
            color: #888;
            font-size: 0.95rem;
        }

        .phone-btn {
            background-color: #28a745;
            color: white;
            border: none;
            font-weight: 500;
            border-radius: 5px;
            padding: 6px 14px;
            transition: background 0.2s;
        }

        .phone-btn:hover {
            background-color: #218838;
            color: white;
        }

        .enquiry-btn {
            background-color: #007bff;
            color: white;
            border: none;
            font-weight: 500;
            border-radius: 5px;
            padding: 6px 14px;
            transition: background 0.2s;
        }

        .enquiry-btn:hover {
            background-color: #0069d9;
            color: white;
        }

        @media (max-width: 991.98px) {
            .col-md-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 575.98px) {

            .col-md-3,
            .col-sm-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .section-title {
                font-size: 1.4rem;
            }

            .store-img {
                width: 70px;
                height: 70px;
            }

            .store-img {
                width: 400px;
                height: 200px;
            }
        }

        .brand-carousel .item {
            text-align: center;
        }

        .brand-carousel .brand-logo {
            width: 150px;
            height: auto;
            object-fit: contain;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .brand-carousel .brand-logo:hover {
            filter: grayscale(100%);
            transform: scale(1.05);
        }

        .price {
            font-size: 1.3rem;
        }

        .price span {
            font-size: 0.9rem;
        }

        .op {
            text-decoration: line-through;
        }

        .off {
            color: #FF4500;
            font-weight: 800;
        }
    </style>


    {{-- MAIN CONTENT HERE --}}


    <div class="container py-5">
        <div class="row g-4">

            <!-- Left Box -->
            <div class="col-md-6">
                <div class="section-box h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold">Tell us what you need</h5>
                        <p class="text-muted">We will help you find verified sellers</p>
                    </div>
                    <div class="d-flex mt-3">
                        <input type="text" class="form-control me-2 search-input" placeholder="Search by Product Name">
                        <button class="btn btn-blue d-flex align-items-center">
                            Get Verified Sellers
                            <span class="ms-1"><i class="bi bi-chevron-double-right"></i></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Box -->
            <div class="col-md-6 ">
                <div class="section-box h-100 d-flex flex-column justify-content-between bg-primary text-white">
                    <div>
                        <h6 class="fw-bold">Have a business ?</h6>
                        <p>
                            Start selling with us in <br>
                            <span class="highlight">just 40 secs for free!</span>
                        </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <button class="btn btn-blue me-3" style="background: #ff4500;">
                            Register Now <span class="ms-1"><i class="bi bi-chevron-double-right"></i></span>
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- Top-Ranked Categories For You --}}
    <!-- Carousel Section -->
    <div class="container-fluid py-4" style="background: #F5F7FB;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Top-Ranked Categories For You</h4>
            <a href="#" class="text-primary fw-semibold">View All</a>
        </div>

        <div class="owl-carousel top-rank owl-theme">
            <!-- Item Start -->
            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq6fqbGecEitebdKTzo6NIV-RiXvHuSJUCHg&s"
                    alt="AC Repair" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">AC REPAIR</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnqdH85_PRMR9LTM4p6PuM7wCIbbiEpFQRpw&s"
                    alt="BODY SPA" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">BODY SPA</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/693259801.jpg?k=560d5d51898e5c0694c3f32f8e7feb479535959ec265fd41123001a7190b5806&o=&hp=1"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4TAbO0h7CSW1G7oHiaZ8H1WzdZ0NPnp0Y_g&s"
                    alt="CARE HIRE" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">CARE HIRE</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjUURg1GR61Xe1q-JQs4WWz_PRxpHUk5PXGw&s"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://suriandco.com/wp-content/uploads/2023/05/Why-it-is-Important-to-Have-a-Chartered-Accountant-for-Your-Business.jpg"
                    alt="ACCOUNTANT" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">ACCOUNTANT</a>
            </div>
            <!-- Item End -->
        </div>
    </div>



    {{-- Top-Ranked Categories For You --}}
    <!-- Carousel Section -->
    <div class="container-fluid py-4" style="background: #F5F7FB;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Similar To Your Interest</h4>
            <a href="#" class="text-primary fw-semibold">View All</a>
        </div>

        <div class="owl-carousel top-rank owl-theme">
            <!-- Item Start -->
            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq6fqbGecEitebdKTzo6NIV-RiXvHuSJUCHg&s"
                    alt="AC Repair" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">AC REPAIR</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnqdH85_PRMR9LTM4p6PuM7wCIbbiEpFQRpw&s"
                    alt="BODY SPA" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">BODY SPA</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/693259801.jpg?k=560d5d51898e5c0694c3f32f8e7feb479535959ec265fd41123001a7190b5806&o=&hp=1"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4TAbO0h7CSW1G7oHiaZ8H1WzdZ0NPnp0Y_g&s"
                    alt="CARE HIRE" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">CARE HIRE</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjUURg1GR61Xe1q-JQs4WWz_PRxpHUk5PXGw&s"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://suriandco.com/wp-content/uploads/2023/05/Why-it-is-Important-to-Have-a-Chartered-Accountant-for-Your-Business.jpg"
                    alt="ACCOUNTANT" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">ACCOUNTANT</a>
            </div>
            <!-- Item End -->
        </div>
    </div>


    {{-- Top-Ranked Categories For You --}}
    <!-- Carousel Section -->
    <div class="container-fluid py-4" style="background: #F5F7FB;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Categories Similar To Your Search</h4>
            <a href="#" class="text-primary fw-semibold">View All</a>
        </div>

        <div class="owl-carousel top-rank owl-theme">
            <!-- Item Start -->
            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq6fqbGecEitebdKTzo6NIV-RiXvHuSJUCHg&s"
                    alt="AC Repair" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">AC REPAIR</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnqdH85_PRMR9LTM4p6PuM7wCIbbiEpFQRpw&s"
                    alt="BODY SPA" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">BODY SPA</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/693259801.jpg?k=560d5d51898e5c0694c3f32f8e7feb479535959ec265fd41123001a7190b5806&o=&hp=1"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4TAbO0h7CSW1G7oHiaZ8H1WzdZ0NPnp0Y_g&s"
                    alt="CARE HIRE" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">CARE HIRE</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjUURg1GR61Xe1q-JQs4WWz_PRxpHUk5PXGw&s"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://suriandco.com/wp-content/uploads/2023/05/Why-it-is-Important-to-Have-a-Chartered-Accountant-for-Your-Business.jpg"
                    alt="ACCOUNTANT" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">ACCOUNTANT</a>
            </div>
            <!-- Item End -->
        </div>
    </div>


    {{-- Verified Sellers --}}
    <div class="container-fluid py-4" style="background: #F5F7FB;">
        <h4 class="fw-bold mb-0">
            Verified Sellers in Delhi <img src="{{asset('public/assets/img/verified.png')}}" width="30px"></h4>
<div class="d-flex flex-wrap gap-1 my-3">
  <button type="button" class="btn btn-outline-primary">Laptop Repair in Delhi</button>
  <button type="button" class="btn btn-outline-primary">Laptop Screen Replacement</button>
  <button type="button" class="btn btn-outline-primary">Fast Laptop Repair Nehru Place</button>
  <button type="button" class="btn btn-outline-primary">Affordable Laptop Repair</button>
  <button type="button" class="btn btn-outline-primary">Genuine Laptop Parts Delhi</button>
  <button type="button" class="btn btn-outline-primary">Top Laptop Service Center</button>
    <button type="button" class="btn btn-outline-primary">Dell Screen Repair</button>
      <button type="button" class="btn btn-outline-primary">MSI Laptop Battery Replacement</button>
</div>

    </div>
    <div class="container-fluid my-4">
        <div class="row g-4">

            <!-- CARD 1 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://c8.alamy.com/comp/2C3Y7XH/new-delhi-india-22nd-june-2020-a-glimpse-of-a-crowded-mobile-and-laptop-repair-shopnehru-place-electronic-market-it-hub-is-known-as-the-indias-biggest-it-market-especially-for-computer-hardware-desktop-printers-laptops-hard-disks-monitors-mobile-and-mobile-accessories-credit-sopa-images-limitedalamy-live-news-2C3Y7XH.jpg"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> Lc Online</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                        <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                                Call</a>
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDFjZsYULE493_upTmW0XVwDjORVeqQurqnobPcgtQnXbQXqz_TMr6o6PXo0wvBhbqinw&usqp=CAU"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> MK SOLUTION</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                         <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                                Call</a>
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5v-ulwM5FrWCVQTbvRghiLAWPTiYzcgirpA&s"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> SM REPAIR</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                         <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                                Call</a>
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://chandrashekhara.files.wordpress.com/2011/12/7b82ef4e-edb7-11e0-9bda-000b5dabf613.jpg?w=640&h=425"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> IT SHOP HUB</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                         <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                                Call</a>
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 5 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSV82JgRIiI_21Fu1WVaGhQlxAyJsXGy73k7j4_J1mMhtKwPaRwnrTITY__YFgyTwbBZWc&usqp=CAU"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> Babu Lohar Shop</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                         <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                                Call</a>
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 6 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://content.jdmagicbox.com/v2/comp/delhi/k2/011pxx11.xx11.160606090001.q8k2/catalogue/ss-computer-nehru-place-delhi-computer-repair-and-services-himcs2hlch.jpg"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> OS REPAIR</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                         <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                                Call</a>
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 7 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZknKOuxF3VGuEyX55YEW08NFxVr2iBwm00Xpmeq5kOfI2JCqgDCuLYsydS4pPnWnL-TE&usqp=CAU"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> SHIVA COMPUTER</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                         <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                                Call</a>
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 8 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-custom h-100">
                    <a href="#"><img
                            src="https://content.jdmagicbox.com/comp/delhi/h4/011pxx11.xx11.130319135444.x3h4/catalogue/honest-computers-rohini-sector-7-delhi-second-hand-laptop-dealers-7ssgep-250.jpg"
                            class="img-fluid store-img" alt="Store Image"></a>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1 fw-bold">
                            <a href="#" class="text-decoration-none text-dark"><img
                                    src="{{asset('public/assets/img/verified.png')}}" width="20px"> DNEST COMPUTER</a>
                        </h5>
                        <div class="mb-1"><span class="rating-box">4.2 ★</span> <span>87 ratings</span></div>
                        <p class="text-muted mb-2">Nehru Place - Delhi</p>
                         <div class="price mb-2">
                            ₹ 689
                            <span class="op px-2">₹ 999
                            </span>
                            <span class="off">-36%</span>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="tel:07411355154" class="btn phone-btn"><i class="bi bi-telephone-fill me-1"></i>
                       
                            <a href="#" class="btn enquiry-btn"><i class="bi bi-send me-1"></i> Enquiry</a>
                                                        <a href="#" class="btn enquiry-btn"><i class="bi bi-whatsapp"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <a href="#">View All</a>
            </div>
        </div>
    </div>



    {{-- Top-Ranked Categories For You --}}
    <!-- Carousel Section -->
    <div class="container-fluid py-4" style="background: #F5F7FB;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Suggestions For You </h4>
            <a href="#" class="text-primary fw-semibold">View All</a>
        </div>

        <div class="owl-carousel top-rank owl-theme">
            <!-- Item Start -->
            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq6fqbGecEitebdKTzo6NIV-RiXvHuSJUCHg&s"
                    alt="AC Repair" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">AC REPAIR</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnqdH85_PRMR9LTM4p6PuM7wCIbbiEpFQRpw&s"
                    alt="BODY SPA" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">BODY SPA</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/693259801.jpg?k=560d5d51898e5c0694c3f32f8e7feb479535959ec265fd41123001a7190b5806&o=&hp=1"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4TAbO0h7CSW1G7oHiaZ8H1WzdZ0NPnp0Y_g&s"
                    alt="CARE HIRE" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">CARE HIRE</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjUURg1GR61Xe1q-JQs4WWz_PRxpHUk5PXGw&s"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://suriandco.com/wp-content/uploads/2023/05/Why-it-is-Important-to-Have-a-Chartered-Accountant-for-Your-Business.jpg"
                    alt="ACCOUNTANT" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">ACCOUNTANT</a>
            </div>
            <!-- Item End -->
        </div>
    </div>

    {{-- SHOP BY BRAND --}}

    <div class="container-fluid my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Shop By Brands</h4>
            <a href="#" class="text-primary fw-semibold">View All</a>
        </div>

        <div class="owl-carousel brand-carousel owl-theme">

            <a href="/brands/apple" class="item">
                <img src="{{ asset('public/assets/img/brand-1.png') }}" class="img-fluid brand-logo" alt="Apple Logo">
            </a>

            <a href="/brands/samsung" class="item">
                <img src="{{ asset('public/assets/img/brand-2.png') }}" class="img-fluid brand-logo" alt="Samsung Logo">
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





    {{-- Top-Ranked Categories For You --}}
    <!-- Carousel Section -->
    <div class="container-fluid py-4" style="background: #F5F7FB;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">By Customer Need</h4>
            <a href="#" class="text-primary fw-semibold">View All</a>
        </div>

        <div class="owl-carousel top-rank owl-theme">
            <!-- Item Start -->
            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRq6fqbGecEitebdKTzo6NIV-RiXvHuSJUCHg&s"
                    alt="AC Repair" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">AC REPAIR</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnqdH85_PRMR9LTM4p6PuM7wCIbbiEpFQRpw&s"
                    alt="BODY SPA" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">BODY SPA</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/693259801.jpg?k=560d5d51898e5c0694c3f32f8e7feb479535959ec265fd41123001a7190b5806&o=&hp=1"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4TAbO0h7CSW1G7oHiaZ8H1WzdZ0NPnp0Y_g&s"
                    alt="CARE HIRE" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">CARE HIRE</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjUURg1GR61Xe1q-JQs4WWz_PRxpHUk5PXGw&s"
                    alt="HOTEL" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">HOTEL</a>
            </div>

            <div class="item text-center p-2 bg-white rounded shadow-sm">
                <img src="https://suriandco.com/wp-content/uploads/2023/05/Why-it-is-Important-to-Have-a-Chartered-Accountant-for-Your-Business.jpg"
                    alt="ACCOUNTANT" class="category-img mb-2">
                <a href="#" class="text-dark fw-medium text-decoration-none">ACCOUNTANT</a>
            </div>
            <!-- Item End -->
        </div>
    </div>




@endsection