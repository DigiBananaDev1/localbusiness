@extends('app')

@section('content')
    <style>
        .leading-supplier {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #0d6efd;
            color: #fff;
            padding: 2px 10px;
            font-size: 0.8rem;
            border-radius: 0.25rem;
            z-index: 2;
        }

        .card-img-top {
            height: 150px;
            object-fit: cover;
            background: #f8f9fa;
            border-bottom: 1px solid #eee;
        }

        .card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            border-radius: 10px;
            border: none;
            transition: box-shadow 0.2s;
            min-height: 450px;
            max-height: 450px;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.13);
        }

        .card-body {
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            padding-bottom: 1.2rem;
        }

        .product-title-fixed {
            min-height: 44px;
            max-height: 44px;
            display: flex;
            align-items: center;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .related-brands img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            margin-right: 10px;
        }

        .related-brands li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        @media (max-width: 991.98px) {
            .cta-section {
                margin-top: 2rem;
            }

            .center-scroll {
                height: auto !important;
                max-height: none !important;
                overflow-y: visible !important;
            }

            .sticky-top {
                position: static !important;
            }
        }

        .product-row {
            display: flex;
            flex-wrap: wrap;
        }

        .product-card-col {
            display: flex;
            flex-direction: column;
        }

        @media (max-width: 767.98px) {
            .product-card-col {
                flex: 0 0 50% !important;
                max-width: 50% !important;
                padding-left: 8px;
                padding-right: 8px;
            }

            .product-row {
                margin-left: -8px;
                margin-right: -8px;
            }
        }

        /* ads */
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




    {{-- Breadcrumb  --}}
    <div class="container my-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                @foreach ($breadcrumb as $crumb)
                    @if (!$loop->last)
                        <li class="breadcrumb-item">
                            <a href="{{ route('category', $crumb->slug) }}">{{ $crumb->name }}</a>
                        </li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ $crumb->name }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>


    <h4 class="px-5"> {{ $category->name }} <span class="fs-6 text-primary">
            ({{ $productCount }}+ Products available)</span></h4>


    <div class="container-fluid py-3">
        {{-- <div class="alert alert-warning mb-3">
            <strong>Verification of drug license & valid prescription is strongly advised for the users before dealing in
                medicines.</strong>
        </div> --}}
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-2 mb-4 sticky-top" style="top: 24px; z-index: 2;">
                <h6>Related Brands</h6>
                @if ($relatedVendors->count())
                    <ul class="list-unstyled related-brands">

                        @foreach ($relatedVendors as $vendor)
                            <li><a href="{{ route('productcat') }}">
                                    <img src="{{ asset('public/images/vendor/' . $vendor->image) }}"
                                        alt="">{{ $vendor->business_name }}</a></li>
                        @endforeach


                    </ul>
                @endif
                <div class="d mt-5"></div>

                <h6>Related Categories</h6>
                @if ($relatedCategories->count())
                    <ul class="list-unstyled related-brands">


                        @foreach ($relatedCategories as $cat)
                        
                            <li><a href="{{ route('productsByCategory', $cat->slug) }}"><img
                                        src="{{asset('public/images/category/' . $cat->image)}}"
                                        alt="">{{ $cat->name }}</a></li>
                        @endforeach

                    </ul>
                @endif
            </div>
            <!-- Center Product Section -->
            <div class="col-lg-7 mb-4 center-scroll" style="height:190vh; overflow-y: auto;">
                <div class="mb-3">
                    <button class="btn btn-outline-secondary btn-sm">Near Me</button>
                    <button class="btn btn-outline-secondary btn-sm">Delhi</button>
                    <button class="btn btn-outline-secondary btn-sm">Hyderabad</button>
                    <button class="btn btn-outline-secondary btn-sm">Mumbai</button>
                    <button class="btn btn-outline-secondary btn-sm">Lucknow</button>
                    <button class="btn btn-outline-secondary btn-sm">Ahmedabad</button>
                    <button class="btn btn-outline-secondary btn-sm">Bengaluru</button>
                    <button class="btn btn-outline-secondary btn-sm">Jaipur</button>
                    <button class="btn btn-outline-secondary btn-sm">Pune</button>
                </div>
                <div class="row g-3 product-row">
                    @forelse ($products as $product)
                        <div class="col-md-4 col-6 product-card-col">
                            <div class="card position-relative h-100">
                                <span class="leading-supplier">Leading Supplier</span>
                                <img src="{{ asset('public/' . $product->image) }}" class="card-img-top"
                                    alt="{{ $product->name }}">
                                <div class="card-body">
                                    <div class="product-title-fixed"><a
                                            href="{{ route('productdetails', $product->slug) }}">{{ $product->name }}</a></div>
                                    <div class="mb-2 fw-bold" style="font-size:1.1rem;">
                                        <span
                                            class="text-muted text-decoration-line-through">₹{{ number_format($product->mrp, 2) }}</span>

                                        <small
                                            class="text-success fw-bold">₹{{ number_format($product->price, 2) }}</small>


                                    </div>
                                    <div class="mb-1 text-secondary" style="font-size:0.95rem;">
                                        {{ $product->vendor->business_name }}</div>
                                    <div class="mb-1 text-muted" style="font-size:0.9rem;">
                                        <i class="bi bi-geo-alt"></i>
                                        {{ $product->vendor->city }}{{ $product->vendor->state ? ', ' . $product->vendor->state : '' }}
                                    </div>
                                    <div class="mb-1 d-flex gap-3" style="font-size:0.9rem;">
                                        {{-- <span class="badge bg-light text-dark border me-1">GST</span> --}}

                                        @if ($product->vendor->status)
                                            <span class="badge bg-light text-dark me-1">
                                                <img src="{{ asset('public/assetss/img/verified.gif') }}" width="18px"
                                                    alt="">
                                                Verified
                                            </span>
                                        @endif
                                        {{-- @if ($product->vendor->created_at)
                                            <span class="badge bg-light text-dark border">Verified {{ $product->vendor->created_at->diffForHumans() }}</span>
                                        <span class="badge bg-light text-dark border">10 yrs</span>
                                        @endif --}}
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
                                    <div class="mb-1" style="font-size:0.95rem;">
                                        <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                        <span class="fw-bold">4.6</span>
                                        <span class="text-muted">(1061)</span>
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-link p-0" style="font-size:0.95rem;"
                                        data-bs-toggle="modal" data-bs-target="#supplierModal{{ $product->id }}">
                                        <i class="bi bi-telephone"></i> View Mobile Number
                                    </a>
                                    <div class="text-success" style="font-size:0.85rem;">7% Response Rate</div>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-success btn-sm w-100 mt-2"data-bs-toggle="modal"
                                            data-bs-target="#supplierModal{{ $product->id }}">Contact Supplier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="supplierModal{{ $product->id }}" tabindex="-1"
                            aria-labelledby="supplierModal{{ $product->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content p-3">
                                    <div class="row g-4">
                                        <!-- Product Info -->
                                        <div class="col-md-5 border-end">
                                            <img src="{{ asset('public/' . $product->image) }}" class="img-fluid rounded"
                                                alt="Product">
                                            <h5 class="mt-3">{{ $product->name }}</h5>
                                            <p class="mb-1 text-danger fw-bold"><span
                                                    class="text-decoration-line-through">₹
                                                    {{ number_format($product->mrp, 2) }}</span> <small
                                                    class="text-success">₹ {{ number_format($product->price, 2) }}</small>
                                            </p>
                                            <p class="mb-0">Sold By - {{ $product->vendor->business_name }} </p>
                                            <p class="text-muted mt-1">📞 {{ maskMobileNumber($product->vendor->mobile) }}
                                            </p>
                                        </div>

                                        <!-- Login Form -->
                                        <div class="col-md-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="mb-3">Please login to view Supplier's Mobile Number</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="mobileNumber" class="form-label">Mobile Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">+91</span>
                                                        <input type="tel" class="form-control" id="mobileNumber"
                                                            placeholder="Enter your mobile" required>
                                                    </div>
                                                    <small class="text-muted mt-1 d-block">Your Country is <a
                                                            href="#">India</a></small>
                                                </div>
                                                <button type="submit" class="btn btn-success w-100">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="p-3  border border-danger rounded text-center">
                                <p class="text-danger">No products found in this category.</p>
                                </div> 
                        </div>
                    @endforelse


                </div>
            </div>
            <!-- Right CTA Section -->
            <div class="col-lg-3 cta-section sticky-top" style="top: 24px; z-index: 2;">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Get Best Sellers for Pharmaceutical Drug</h6>
                        <form>
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="+91 Enter your mobile">
                            </div>
                            <small class="text-muted">Seller will contact you on this number</small><br>
                            <small class="text-muted">Your Country is <b>India</b></small>
                            <button type="submit" class="btn btn-primary w-100 mt-2" data-bs-toggle="modal"
                                data-bs-target="#supplierModal">Submit Requirement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>











    {{-- ADS --}}
    <div class="ad-placeholder">
        Ad Space Reserved
    </div>

    {{-- 6Th Section --}}
    <div class="container my-5">
        <div class="main-heading text-center">Industrial Plants, Machinery & Equipment</div>
        <div class="row quotes-section  d-flex justify-content-center  align-items-center">

            <!-- Right Form Section -->
            <div class="col-lg-10">
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

                    <button type="submit" class="btn submit-btn bg-success text-white w-100">Submit Requirement</button>
                </form>
            </div>
        </div>
    </div>
@endsection
