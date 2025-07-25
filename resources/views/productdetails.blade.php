@extends('app')

@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <div class="container-fluid py-2">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="card shadow-lg border-0 p-2 p-md-4 mb-4">
                    <div class="row g-4 align-items-start flex-lg-row py-2 py-md-4 flex-column flex-lg-row">
                        <!-- Left: Thumbnails and Main Image -->
                        {{-- <div
                            class="col-lg-5 d-flex flex-row flex-md-row flex-column-reverse align-items-start align-items-md-start align-items-lg-start mb-3 mb-lg-0">
                            <div class="product-thumbnails d-flex flex-row flex-lg-column overflow-auto mb-2 mb-lg-0 me-0 me-lg-3 w-100 w-lg-auto"
                                style="gap:10px;">
                                <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863908/YH/NF/CC/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg"
                                    class="active" alt="Thumb1">
                                    
                                <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863902/TO/LQ/QJ/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg"
                                    alt="Thumb2">
                                <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863905/BD/GZ/IB/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpeg"
                                    alt="Thumb3">
                                <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863908/YH/NF/CC/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg"
                                    alt="Thumb4">
                            </div>
                            <img id="mainProductImage"
                                src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863903/VC/WW/GR/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg"
                                class="product-image ms-0 ms-lg-2 mb-2 mb-lg-0" alt="Product Main">
                        </div> --}}
                        <div
                            class="col-lg-5 d-flex flex-row flex-md-row flex-column-reverse align-items-start align-items-md-start align-items-lg-start mb-3 mb-lg-0">

                            <div class="product-thumbnails d-flex flex-row flex-lg-column overflow-auto mb-2 mb-lg-0 me-0 me-lg-3 w-100 w-lg-auto"
                                style="gap:10px;">

                                @foreach ($product->galleries as $index => $gallery)
                                    <img src="{{ asset('public/' . $gallery->image_path) }}"
                                        class="{{ $index === 0 ? 'active' : '' }}" alt="Thumb {{ $index + 1 }}"
                                        onclick="document.getElementById('mainProductImage').src=this.src"
                                        style="cursor:pointer;">
                                @endforeach
                            </div>

                            <img id="mainProductImage"
                                src="{{ asset('public/' . ($product->galleries->first()->image_path ?? $product->image)) }}"
                                class="main-product-image ms-0 ms-lg-2 mb-2 mb-lg-0" alt="Product Main">
                        </div>

                        <!-- Center: Product Details -->
                        <div class="col-lg-4 mt-3 mt-lg-0 ppcard">
                            <h5 class="fw-bold mb-2">{{ $product->name }}</h5>
                            <h5 class="text-success mb-3">
                                <span class="text-muted text-decoration-line-through fs-4 fw-bold">₹
                                    {{ number_format($product->mrp, 2) }}</span>
                                <small>₹ {{ number_format($product->price, 2) }}</small>
                            </h5>
                            <a href="#" class="mb-3 d-inline-block text-decoration-underline" data-bs-toggle="modal"
                                data-bs-target="#MainProductModal">Get Latest Price</a>
                            <table class="table table-sm table-bordered mt-2 mb-3">

                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Category</td>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Slot</td>
                                        <td>{{ $product->bunch }} Bunch</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Search Tags</td>
                                        <td>{{ $product->search_tags }}</td>
                                    </tr>


                                </tbody>
                            </table>
                            <p class="small text-muted mb-2">{{ $product->description }}</p>

                            <a href="#" class="btn btn-success btn-lg w-100 mt-2 shadow-sm" data-bs-toggle="modal"
                                data-bs-target="#MainProductModal">Get Latest Price</a>
                        </div>



                        <!-- Right: Seller Info -->
                        <div class="col-lg-3 mt-3 mt-lg-0">
                            <div class="seller-card">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('public/images/vendor/' . $product->vendor->image) }}"
                                        class="rounded-circle me-2 border" style="width:48px;height:48px;object-fit:cover;"
                                        alt="Seller Logo">
                                    <div>
                                        <strong>{{ $product->vendor->business_name }}</strong><br>
                                        <span class="text-muted small">{{ $product->vendor->city }},
                                            {{ $product->vendor->state }}</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    {{-- <span class="badge bg-success">Verified Exporter</span>
                                    <span class="ms-2 small">6 yrs</span> --}}

                                    @if ($product->vendor->status)
                                        <span class="badge bg-light text-dark me-1">
                                            <img src="{{ asset('public/assetss/img/verified.gif') }}" width="18px"
                                                alt="">
                                            Verified
                                        </span>
                                    @endif

                                    @if ($product->vendor && $product->vendor->created_at)
                                        @php
                                            $createdAt = Carbon\Carbon::parse($product->vendor->created_at);
                                            $diffInMonths = $createdAt->diffInMonths(now());

                                            // Only show if more than 6 months
                                            if ($diffInMonths > 6) {
                                                $years = floor($diffInMonths / 12);
                                                $months = $diffInMonths % 12;

                                                $label = '';
                                                if ($years > 0) {
                                                    $label .= $years . ' yr' . ($years > 1 ? 's' : '');
                                                }
                                                if ($months > 0) {
                                                    $label .= ' ' . $months . ' mo' . ($months > 1 ? 's' : '');
                                                }
                                            }
                                        @endphp

                                        @if (!empty($label))
                                            <span class="badge bg-light">{{ $label }}</span>
                                        @endif
                                        {{-- <span class="badge bg-light text-dark ">6 mo</span> --}}
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                                    <span class="small">4.3 (97)</span>
                                </div>
                                <button class="btn btn-outline-primary w-100 mb-2 shadow-sm" data-bs-toggle="modal"
                                    data-bs-target="#MainProductModal">View Mobile Number</button>
                                <button class="btn btn-primary w-100 shadow-sm" data-bs-toggle="modal"
                                    data-bs-target="#MainProductModal">Contact Supplier</button>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="MainProductModal" tabindex="-1" aria-labelledby="MainProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="row g-4">
                    <!-- Product Info -->
                    <div class="col-md-5 border-end">
                        <img src="{{ asset('public/' . $product->image) }}" class="img-fluid rounded" alt="Product">
                        <h5 class="mt-3">{{ $product->name }}</h5>
                        <p class="mb-1 text-danger fw-bold"><span class="text-decoration-line-through">₹
                                {{ number_format($product->mrp, 2) }}</span> <small class="text-success">₹
                                {{ number_format($product->price, 2) }}</small>
                        </p>
                        <p class="mb-0">Sold By - {{ $product->vendor->business_name }} </p>
                        <p class="text-muted mt-1">📞 {{ maskMobileNumber($product->vendor->mobile) }}
                        </p>
                    </div>

                    <!-- Login Form -->
                    <div class="col-md-7">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-3">Please login to view Supplier's Mobile Number</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('createQuery') }}" method="POST">
                            @csrf

                            <input type="hidden" id="vendor_id" name="vendor_id" value="{{ $product->vendor_id }}">
                            <input type="hidden" id="service_id" name="service_id" value="{{ $product->id }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Your Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Query</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
        .product-thumbnails img {
            cursor: pointer;
            border: 2px solid #eee;
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
            background: #fff;
        }

        .product-thumbnails img.active,
        .product-thumbnails img:hover {
            border-color: #0d6efd;
            box-shadow: 0 0 0 2px #0d6efd33;
            transform: scale(1.05);
        }

        .product-thumbnails {
            max-width: 100vw;
            overflow-x: auto;
            gap: 10px;
            scrollbar-width: thin;
        }

        .seller-card {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 1.2rem;
            background: #fafbfc;
            box-shadow: 0 2px 12px 0 #0001;
        }

        .product-image {
            width: 100%;
            max-width: 350px;
            object-fit: contain;
            background: #f8f9fa;
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 12px 0 #0001;
            border: 1px solid #eee;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .main-product-image {
            width: 100%;
            max-width: 400px;
            aspect-ratio: 1 / 1;
            object-fit: contain;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .ppcard h5 {
            font-family: "Poppins", sans-serif;
            font-size: 16px;
        }

        @media (max-width: 991.98px) {
            .flex-lg-row {
                flex-direction: column !important;
            }

            .seller-card {
                margin-top: 2rem;
            }

            .product-thumbnails {
                flex-direction: row !important;
                margin-bottom: 1rem;
                margin-right: 0 !important;
                gap: 10px;
                width: 100%;
                justify-content: flex-start;
            }

            .product-thumbnails img {
                margin-bottom: 0;
            }

            .product-image {
                margin-left: 0 !important;
                max-width: 100vw;
            }

            .ppcard h5 {
                font-size: 15px;
            }
        }

        @media (max-width: 575.98px) {
            .product-image {
                max-width: 95vw;
                height: auto;
            }

            .ppcard h5 {
                font-size: 14px;
            }

            .seller-card {
                padding: 0.8rem;
            }

            .card {
                padding: 0.5rem !important;
            }

            .table {
                font-size: 13px;
            }

            .btn {
                font-size: 15px;
                padding: 0.5rem 0.75rem;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.product-thumbnails img');
            const mainImage = document.getElementById('mainProductImage');
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    thumbnails.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    mainImage.src = this.src;
                });
            });
        });
    </script>

    {{-- SECTION2 --}}

    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .product-img {
            width: 180px;
            height: 140px;
            object-fit: contain;
            background: #f0f0f0;
            border-radius: 8px 8px 0 0;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-get-price {
            background: #e6f7f3;
            color: #00897b;
            font-weight: bold;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-get-price:hover {
            background: #b2dfdb;
            color: #00695c;
        }

        .view-mobile {
            color: #1976d2;
            text-decoration: underline;
            cursor: pointer;
            display: block;
            margin-bottom: 8px;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #222;
        }

        .product-unit {
            font-size: 0.9rem;
            font-weight: normal;
            color: #555;
        }

        @media (min-width: 1200px) {

            /* Custom 5-column layout for xl screens */
            .col-xl-5th {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }
    </style>

    <h2 class="mb-4">Find products similar to <b>{{ $product->name }}</b></h2>
    <div class="container-fluid">
        <div class="row g-3">
            @forelse ($relatedProducts as $rltProduct)
                <!-- Product Card 1 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
                    <a href="{{ route('productdetails', $rltProduct->slug) }}" class="text-decoration-none text-dark">
                        <div class="card h-100">
                            <img src="{{ asset('public/' . $rltProduct->image) }}" class="card-img-top product-img"
                                alt="{{ $rltProduct->name }}">
                            <div class="card-body d-flex flex-column">
                                {{-- <button class="btn btn-get-price mb-2" >View Product</button> --}}
                                <h6 class="card-title"> {{ $rltProduct->name }} </h6>
                                <div class="text-muted mb-1"> {{ $rltProduct->vendor->city }},
                                    {{ $rltProduct->vendor->state }} </div>
                                <a class="view-mobile" href="#"data-bs-toggle="modal"
                                    data-bs-target="#rtlModal{{ $rltProduct->id }}">View Mobile Number</a>
                                <div class="mt-auto product-price">
                                    <span class="text-muted text-decoration-line-through fw-bold">₹
                                        {{ number_format($product->mrp, 2) }}</span>
                                    <small class="fs-6">₹ {{ number_format($product->price, 2) }}</small>
                                    {{-- ₹ 7,50,000 <span class="product-unit">/Piece</span> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="rtlModal{{ $rltProduct->id }}" tabindex="-1"
                    aria-labelledby="rtlModal{{ $rltProduct->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content p-3">
                            <div class="row g-4">
                                <!-- Product Info -->
                                <div class="col-md-5 border-end">
                                    <img src="{{ asset('public/' . $rltProduct->image) }}" class="img-fluid rounded"
                                        alt="Product">
                                    <h5 class="mt-3">{{ $rltProduct->name }}</h5>
                                    <p class="mb-1 text-danger fw-bold"><span class="text-decoration-line-through">₹
                                            {{ number_format($rltProduct->mrp, 2) }}</span> <small class="text-success">₹
                                            {{ number_format($rltProduct->price, 2) }}</small>
                                    </p>
                                    <p class="mb-0">Sold By - {{ $rltProduct->vendor->business_name }} </p>
                                    <p class="text-muted mt-1">📞 {{ maskMobileNumber($rltProduct->vendor->mobile) }}
                                    </p>
                                </div>

                                <!-- Login Form -->
                                <div class="col-md-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-3">Please login to view Supplier's Mobile Number</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('createQuery') }}" method="POST">
                                        @csrf

                                        <input type="hidden" id="vendor_id" name="vendor_id"
                                            value="{{ $rltProduct->vendor_id }}">
                                        <input type="hidden" id="service_id" name="service_id"
                                            value="{{ $rltProduct->id }}">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Your Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Your Mobile</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Your Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Query</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No similar products found.</div>
            @endforelse





        @endsection
