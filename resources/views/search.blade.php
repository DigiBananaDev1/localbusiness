@extends('app')

@section('content')
<style>
    .dropdown1-btn {
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        padding: 3px 17px;
        border-radius: 5px;
    }

    .dropdown1 {
        text-align: center;
    }

    .dropdown1-content {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 10px;
        z-index: 1;
        right: 490px;
        top: 135px;
    }

    .dropdown1-content input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .dropdown1-content ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        max-height: 150px;
        overflow-y: auto;
    }

    .dropdown1-content ul li {
        padding: 8px;
        cursor: pointer;
    }

    .dropdown1-content ul li:hover {
        background-color: #f1f1f1;
    }

    #cancel-btn {
        background-color: transparent;
        border: none;
        color: #007bff;
        cursor: pointer;
        margin-top: 10px;
    }

    #cancel-btn:hover {
        text-decoration: underline;
    }

    .check {
        max-height: calc(2 * 100px);
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        background-color: #ffffff;
    }


    .check::-webkit-scrollbar {
        width: 2px;
    }

    .check::-webkit-scrollbar-thumb {
        background: #ffffff;
        border-radius: 4px;
    }

    .get-btn {
        border: none;
        background: #e10000;
        color: white;
        font-weight: 700;
        padding: 10px;
        width: 70%;
    }

    .aviation {
        font-size: 27px;
        padding-bottom: 11px;
    }

    .btn-experts {
        list-style-type: none;
        display: flex;
        gap: 32px;
        padding: 11px 20px;
        background: #e1e1e1;
    }

    a.expert-link {
        font-size: 17px;
        text-decoration: none;
        color: #6a6666;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin: 20px;
    }

    .card img {
        border-radius: 5px 0 0 5px;
    }

    .card-body {
        padding: 15px;
    }

    .tags .badge {
        margin-right: 5px;
    }

    .actions {
        margin-top: 15px;
    }

    .actions .btn {
        margin-right: 10px;
    }

    .sticky-container {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #fff;

    }

    .review-section {
        font-family: Arial, sans-serif;
        margin: auto;
        padding: 20px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .review-section h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .review-section p {
        margin: 5px 0;
        color: #555;
    }

    .rating-summary {
        display: flex;
        align-items: center;
        margin: 15px 0;
    }

    .rating-summary .overall-rating {
        font-size: 24px;
        font-weight: bold;
        color: #ff9800;
        margin-right: 10px;
    }

    .rating-summary .review-count {
        color: #888;
    }

    .review-list {
        margin-top: 20px;
    }

    .review-card {
        border-top: 1px solid #ddd;
        padding: 15px 0;
    }

    .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .review-header .user-initial {
        width: 40px;
        height: 40px;
        background-color: #007bff;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-info strong {
        font-size: 16px;
    }

    .user-info span {
        font-size: 14px;
        color: #666;
    }

    .user-rating {
        font-size: 16px;
        color: #ff9800;
    }

    .review-date {
        font-size: 14px;
        color: #aaa;
    }

    .review-text {
        margin-top: 10px;
        font-size: 15px;
        color: #333;
    }

    /* this is used to blur any element on which this class is placed */
    .blurred {
        filter: blur(4px);
        pointer-events: none;
        user-select: none;
    }
</style>

{{-- SAERCH HEADER --}}
<div class="quates bg-white text-center">
    <div class="container">
        <h2 class="text-capitalize">Your Search Text Is <span class="text-danger">{{ $searchText }} </span>{{ $city }}</h2>
    </div>
</div>

{{-- SEARCH HEADER CLOSE --}}

<div class="container-fluid mt-3">
    <div class="container-fluid p-0 b-0">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">

                @if ($filteredVendors->isEmpty() && $filteredServices->isEmpty())
                <div class="alert alert-info text-center py-4 shadow-sm rounded">
                    <h2 class="fw-light">No Service/Product Available</h2>
                </div>
                @else
                @foreach ($filteredVendors as $vendor)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <div class="h-100">
                                @if (empty($vendor->image))
                                <img src="{{ asset('public/assetss/img/image.png') }}"
                                    class="img-fluid h-100 w-100 object-fit-cover"
                                    alt="AC Service" style="min-height: 200px;">
                                @else
                                <img src="{{ asset('public/images/vendor/' . $vendor->image) }}"
                                    class="img-fluid h-100 w-100 object-fit-cover"
                                    alt="{{ $vendor->business_name }}" style="min-height: 200px;">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <a href="{{route('venderServices', $vendor->id)}}"><h5 class="fw-semibold mb-1 text-uppercase">{{ $vendor->business_name }}</h5></a>
                                        <p class="text-muted small mb-0">{{ $vendor->description }}</p>
                                    </div>
                                    <span class="badge bg-success rounded-pill p-2"
                                        style="background-color: #27ae60 !important;">
                                        <i class="bi bi-clock me-1"></i>Within 15 Mins
                                    </span>
                                </div>
                                {{-- CONTACT INFORMATION --}}
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <i class="bi bi-telephone-fill me-1"
                                                    style="color: #3498db;"></i>
                                                <span @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
                                                    @auth
                                                    {{ $vendor->mobile }}
                                                    @else
                                                    {{ substr($vendor->mobile, 0, 4) . str_repeat('X', 6) }}
                                                    @endauth
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <i class="bi bi-whatsapp me-1"
                                                    style="color: #25d366;"></i>
                                                <span @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
                                                    @auth
                                                    {{ $vendor->whatsapp_no }}
                                                    @else
                                                    {{ substr($vendor->whatsapp_no, 0, 4) . str_repeat('X', 6) }}
                                                    @endauth
                                                </span>
                                            </div>
                                            <div>
                                                <i class="bi bi-envelope-fill me-1"
                                                    style="color: #3498db;"></i>
                                                <span @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
                                                    @auth
                                                    {{ $vendor->email }}
                                                    @else
                                                    {{ substr($vendor->email, 0, 1) . str_repeat('*', 8) . '@' . str_repeat('*', 8) . substr($vendor->email, -1) }}
                                                    @endauth
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <i class="bi bi-geo-alt-fill text-danger"></i>
                                                <a href="https://www.google.com/maps/search/{{ $vendor->business_name }} {{ $vendor->block_building }},{{ $vendor->street_colony }}, {{ $vendor->city }}, {{ $vendor->state }}{{ $vendor->pin_code }}"
                                                    class="text-decoration-none text-muted d-block"
                                                    target="_blank">
                                                    {{ $vendor->block_building }}, {{ $vendor->street_colony }},
                                                    {{ $vendor->city }}, {{ $vendor->state }} ({{ $vendor->pin_code }})
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 mt-3">
                                    @auth
                                    <button type="button" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#chatModal"
                                        data-service-id="" data-vendor-id="{{ $vendor->id }}">
                                        <i class="bi bi-question-circle me-1"></i> Query
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=91{{ $vendor->whatsapp_no }}&text={{ urlencode('I want to know about ' . $vendor->business_name . ",\n" . $vendor->description) }}&type=phone_number&app_absent=0"
                                        target="_blank" class="btn btn-outline-success">
                                        <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                    </a>
                                    <button class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#reviewModal"
                                        data-service-id="" data-vendor-id="{{ $vendor->id }}">
                                        <i class="bi bi-star-fill me-1"></i> Review
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#chatModal">
                                        <i class="bi bi-question-circle me-1"></i> Query
                                    </button>
                                    <button class="btn btn-outline-success"
                                        data-bs-toggle="modal" data-bs-target="#loginModal">
                                        <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                    </button>
                                    <button class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#loginModal">
                                        <i class="bi bi-star-fill me-1"></i> Review
                                    </button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($filteredServices as $service)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <div class="h-100">
                                @if (empty($service->image))
                                <img src="{{ asset('public/assetss/img/image.png') }}"
                                    class="img-fluid h-100 w-100 object-fit-cover"
                                    alt="Service Image" style="min-height: 200px;">
                                @else
                                <img src="{{ asset('public/storage/' . $service->image) }}"
                                    class="img-fluid h-100 w-100 object-fit-cover"
                                    alt="{{ $service->name }}" style="min-height: 200px;">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="fw-semibold mb-1">{{ $service->name }}</h5>
                                        <p class="text-muted small mb-0">{{ $service->vendor->business_name }} - {{ $service->description }}</p>
                                    </div>
                                    <span class="badge bg-success rounded-pill"
                                        style="background-color: #27ae60 !important;">
                                        <i class="bi bi-clock me-1"></i>Within 15 Mins
                                    </span>
                                </div>

                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <i class="bi bi-telephone-fill me-1"
                                                    style="color: #3498db;"></i>
                                                <span @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
                                                    @auth
                                                    {{ $service->vendor->mobile }}
                                                    @else
                                                    {{ substr($service->vendor->mobile, 0, 4) . str_repeat('X', 6) }}
                                                    @endauth
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <i class="bi bi-whatsapp me-1"
                                                    style="color: #25d366;"></i>
                                                <span @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
                                                    @auth
                                                    {{ $service->vendor->whatsapp_no }}
                                                    @else
                                                    {{ substr($service->vendor->whatsapp_no, 0, 4) . str_repeat('X', 6) }}
                                                    @endauth
                                                </span>
                                            </div>
                                            <div>
                                                <i class="bi bi-envelope-fill me-1"
                                                    style="color: #3498db;"></i>
                                                <span @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
                                                    @auth
                                                    {{ $service->vendor->email }}
                                                    @else
                                                    {{ substr($service->vendor->email, 0, 1) . str_repeat('*', 8) . '@' . str_repeat('*', 8) . substr($service->vendor->email, -1) }}
                                                    @endauth
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <i class="bi bi-geo-alt-fill text-danger"></i>
                                                <a href="https://www.google.com/maps/search/{{ $service->vendor->business_name }} {{ $service->vendor->block_building }},{{ $service->vendor->street_colony }}, {{ $service->vendor->city }}, {{ $service->vendor->state }}{{ $service->vendor->pin_code }}"
                                                    class="text-decoration-none text-muted d-block"
                                                    target="_blank">
                                                    {{ $service->vendor->block_building }}, {{ $service->vendor->street_colony }},
                                                    {{ $service->vendor->city }}, {{ $service->vendor->state }} ({{ $service->vendor->pin_code }})
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 mt-3">
                                    @auth
                                    <button type="button" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#chatModal"
                                        data-service-id="{{ $service->id }}"
                                        data-vendor-id="{{ $service->vendor->id }}">
                                        <i class="bi bi-question-circle me-1"></i> Query
                                    </button>
                                    <a href="https://api.whatsapp.com/send/?phone=91{{ $service->vendor->whatsapp_no }}&text={{ urlencode('I want to know about ' . $service->name . ",\n" . $service->description) }}&type=phone_number&app_absent=0"
                                        target="_blank" class="btn btn-outline-success">
                                        <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                    </a>
                                    <button class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#reviewModal"
                                        data-service-id="{{ $service->id }}"
                                        data-vendor-id="{{ $service->vendor->id }}">
                                        <i class="bi bi-star-fill me-1"></i> Review
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#chatModal">
                                        <i class="bi bi-question-circle me-1"></i> Query
                                    </button>
                                    <button class="btn btn-outline-success"
                                        data-bs-toggle="modal" data-bs-target="#loginModal">
                                        WhatsApp
                                    </button>
                                    <button class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#loginModal">
                                        <i class="bi bi-star-fill me-1"></i> Review
                                    </button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>

            {{-- CATEGORY SIDE BAR SECTION --}}
            <div class="col-lg-3 col-md-3 col-sm-3 q-stck" style="height: 100vh; overflow: auto;">
                @foreach ($categories as $category)
                <div class="cate-card d-flex align-items-center p-2">
                    <img src="{{ asset('public/images/category/' . $category->image) }}" alt="Category image"
                        width="40" height="40" class="me-2 rounded">
                    <a class="cate-link text-truncate" href="{{ route('venders', $category->id) }}"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $category->name }}
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<!-- Chat Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatModalLabel">Submit Your Query</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('createQuery') }}" method="POST">
                    @csrf

                    <input type="hidden" id="vendor_id" name="vendor_id">
                    <input type="hidden" id="service_id" name="service_id">

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

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Submit Review for </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('reviews.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::guard('web')->User()->id ?? '' }}">
                <input type="hidden" name="service_id" id="review_service_id">
                <input type="hidden" name="vendor_id" id="review_vendor_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <div id="rating" class="d-flex gap-2">
                            <!-- Rating Checkboxes -->
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rating"
                                    id="rating{{ $i }}" value="{{ $i }}"
                                    onclick="handleRatingSelection(this)">
                                <label class="form-check-label" for="rating{{ $i }}">
                                    {{ $i }}
                                </label>
                        </div>
                        @endfor
                    </div>
                    <div class="mb-3">
                        <textarea name="review" class="form-control" rows="4" placeholder="Write your review here..." required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit Review</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>







<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdown1Btn = document.querySelector(".dropdown1-btn");
        const dropdown1Content = document.querySelector(".dropdown1-content");
        const citySearch = document.getElementById("city-search");
        const cityList = document.getElementById("city-list");
        const selectedCity = document.getElementById("selected-city");
        const cancelBtn = document.getElementById("cancel-btn");
        let chatButtons = document.querySelectorAll(".openChatModal");
        let reviewButtons = document.querySelectorAll(".openReviewModal");

        // Toggle Modal
        chatButtons.forEach(button => {
            button.addEventListener("click", function() {
                let vendorId = this.getAttribute("data-vendor-id");
                let serviceId = this.getAttribute("data-service-id");
                document.getElementById("vendor_id").value = vendorId;
                document.getElementById("service_id").value = serviceId;
            });
        });
        reviewButtons.forEach(button => {
            button.addEventListener("click", function() {
                let vendorId = this.getAttribute("data-vendor-id");
                let serviceId = this.getAttribute("data-service-id");
                document.getElementById("review_vendor_id").value = vendorId;
                document.getElementById("review_service_id").value = serviceId;
            });
        });

        // Toggle dropdown1
        // dropdown1Btn.addEventListener("click", () => {
        //     dropdown1Content.style.display =
        //         dropdown1Content.style.display === "block" ? "none" : "block";
        // });

        // Filter cities
        // citySearch.addEventListener("keyup", () => {
        //     const searchText = citySearch.value.toLowerCase();
        //     const cities = cityList.querySelectorAll("li");

        //     cities.forEach((city) => {
        //         if (city.textContent.toLowerCase().includes(searchText)) {
        //             city.style.display = "block";
        //         } else {
        //             city.style.display = "none";
        //         }
        //     });
        // });

        // Select city
        // cityList.addEventListener("click", (event) => {
        //     if (event.target.tagName === "LI") {
        //         selectedCity.textContent = event.target.textContent;
        //         dropdown1Content.style.display = "none";
        //     }
        // });

        // Cancel button
        // cancelBtn.addEventListener("click", () => {
        //     dropdown1Content.style.display = "none";
        // });

        // Close dropdown1 when clicking outside
        // document.addEventListener("click", (event) => {
        //     if (!event.target.closest(".dropdown1")) {
        //         dropdown1Content.style.display = "none";
        //     }
        // });
    });
</script>

<script>
    // Ensure only one checkbox is selected at a time
    function handleRatingSelection(selectedCheckbox) {
        document.querySelectorAll('input[name="rating"]').forEach(checkbox => {
            if (checkbox !== selectedCheckbox) {
                checkbox.checked = false; // Uncheck other checkboxes
            }
        });
    }
</script>

<!-- Script for the tooltip is included on the app.blade directly so it can be used anywhere multiple times -->
@endsection