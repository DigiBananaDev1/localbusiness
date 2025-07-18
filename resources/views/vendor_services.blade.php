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
</style>

{{-- SERVICES SECTION HERE START --}}

<div class="container-fluid mt-3">

    <div class="container-fluid p-0 b-0">
        <div class="row ">
            <div class="col-lg-9 col-md-9 col-sm-9">
                @if ($services->isEmpty())
                <div class="alert alert-info text-center py-4 shadow-sm rounded">
                    <h2 class="fw-light">No Service/Product Available</h2>
                </div>
                @else
                @foreach ($services as $service)
                <div id="Listing" class="service-card">
                    <div class="card shadow-sm hover-shadow-md border-0 rounded-3 services-details mb-4">
                        <div class="row g-0">
                            <!-- Left: Image with improved container -->
                            <div class="col-lg-3 col-md-3 position-relative overflow-hidden">
                                <div
                                    class="h-100 d-flex align-items-center justify-content-center p-2 bg-light rounded-start">
                                    @if (empty($service->image))
                                    <img src="{{ asset('public/assetss/img/image.png') }}" alt="image"
                                        class="img-fluid rounded-3 object-fit-cover w-100"
                                        style="max-height: 180px;">
                                    @else
                                    <img src="{{ asset('public/storage/' . $service->image) }}"
                                        alt="Institute Image"
                                        class="img-fluid rounded-3 object-fit-cover w-100"
                                        style="max-height: 180px;">
                                    @endif
                                </div>
                            </div>

                            <!-- Right: Details with improved layout -->
                            <div class="col-lg-9 col-md-9">
                                <div class="card-body d-flex flex-column h-100 p-3">
                                    <!-- Header Section with Response Time Badge -->
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h2 class="card-title h5 fw-bold mb-1 text-uppercase"
                                                    style="color: #2c3e50; font-family: 'Segoe UI', system-ui, sans-serif;">
                                                    {{ $service->name }}
                                                </h2>
                                                <h5 class="card-subtitle small"
                                                    style="color: #7f8c8d; font-family: 'Segoe UI', system-ui, sans-serif;">
                                                    {{ $service->vendor->business_name }}
                                                </h5>
                                            </div>
                                            <span class="badge bg-success rounded-pill p-2"
                                                style="background-color: #27ae60 !important;">
                                                <i class="bi bi-clock me-1"></i>Within 15 Mins
                                            </span>
                                        </div>
                                        <div class="description-container mt-2">
                                            <p class="card-text small mb-2"
                                                style="color: #34495e; line-height: 1.5; font-family: 'Segoe UI', system-ui, sans-serif;">
                                                {{ $service->description }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Contact Info with improved layout -->
                                    <div class="contact-info rounded-3 p-2 mb-2 border bg-white"
                                        style="border-color: #e9ecef !important;">
                                        <div class="row g-2">
                                            <div class="col-sm-4">
                                                <div class="contact-item">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <i class="bi bi-telephone-fill me-1"
                                                            style="color: #3498db;"></i>
                                                        <strong class="small"
                                                            style="color: #2c3e50; font-family: 'Segoe UI', system-ui, sans-serif;">Number</strong>
                                                    </div>
                                                    <span class="smaller"
                                                        style="color: #576574; font-family: 'Segoe UI', system-ui, sans-serif;">
                                                        @auth
                                                        {{ $service->vendor->mobile }}
                                                        @else
                                                        {{ substr($service->vendor->mobile, 0, 4) . str_repeat('X', 6) }}
                                                        @endauth
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="contact-item">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <i class="bi bi-whatsapp me-1"
                                                            style="color: #25d366;"></i>
                                                        <strong class="small"
                                                            style="color: #2c3e50; font-family: 'Segoe UI', system-ui, sans-serif;">WhatsApp</strong>
                                                    </div>
                                                    <span class="smaller"
                                                        style="color: #576574; font-family: 'Segoe UI', system-ui, sans-serif;">
                                                        @auth {{ $service->vendor->whatsapp_no }}
                                                        @else
                                                        {{ substr($service->vendor->whatsapp_no, 0, 4) . str_repeat('X', 6) }}
                                                        @endauth
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="contact-item">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <i class="bi bi-envelope-fill me-1"
                                                            style="color: #3498db;"></i>
                                                        <strong class="small"
                                                            style="color: #2c3e50; font-family: 'Segoe UI', system-ui, sans-serif;">Email</strong>
                                                    </div>
                                                    <span class="smaller"
                                                        style="color: #576574; font-family: 'Segoe UI', system-ui, sans-serif;">
                                                        @auth
                                                        {{ $service->vendor->email }}
                                                        @else
                                                        {{ substr($service->vendor->email, 0, 1) . str_repeat('*', 8) . '@' . str_repeat('*', 8) . substr($service->vendor->email, -1) }}
                                                        @endauth
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Address with improved styling --}}
                                    <a href="https://www.google.com/maps/search/{{ $service->vendor->business_name }} {{ $service->vendor->block_building }}, {{ $service->vendor->street_colony }}, {{ $service->vendor->city }}, {{ $service->vendor->state }} {{ $service->vendor->pin_code }}"
                                        target="_blank"
                                        class="d-block mb-3 text-decoration-none border rounded-3 p-2 bg-white hover-bg-light"
                                        style="border-color: #e9ecef !important; transition: all 0.2s ease;">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-geo-alt-fill mt-1 me-2" style="color: #e74c3c;"></i>
                                            <div>
                                                <strong class="small d-block mb-1"
                                                    style="color: #2c3e50; font-family: 'Segoe UI', system-ui, sans-serif;">Address</strong>
                                                <span class="smaller"
                                                    style="color: #576574; font-family: 'Segoe UI', system-ui, sans-serif;">
                                                    {{ $service->vendor->block_building }},
                                                    {{ $service->vendor->street_colony }},
                                                    {{ $service->vendor->city }},
                                                    {{ $service->vendor->state }}
                                                    ({{ $service->vendor->pin_code }})
                                                </span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- Action Buttons with improved styling -->
                                    <div class="mt-auto">
                                        <div class="d-flex flex-wrap gap-2">
                                            @auth
                                            <button type="button"
                                                class="btn btn-outline-primary btn-sm d-flex align-items-center py-1 px-2"
                                                style="font-family: 'Segoe UI', system-ui, sans-serif; font-size: 0.85rem;"
                                                data-bs-toggle="modal" data-bs-target="#chatModal"
                                                data-service-id="{{ $service->id }}"
                                                data-vendor-id="{{ $service->vendor->id }}">
                                                <i class="bi bi-question-circle me-1"></i> Query
                                            </button>

                                            <a href="https://api.whatsapp.com/send/?phone=91{{ $service->vendor->whatsapp_no }}&text={{ urlencode('I want to know about ' . $service->name . ', ' . $service->description) }}"
                                                target="_blank"
                                                class="btn btn-outline-success btn-sm d-flex align-items-center py-1 px-2"
                                                style="font-family: 'Segoe UI', system-ui, sans-serif; font-size: 0.85rem;">
                                                <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                            </a>

                                            <button
                                                class="btn btn-primary btn-sm d-flex align-items-center py-1 px-2"
                                                style="font-family: 'Segoe UI', system-ui, sans-serif; font-size: 0.85rem;"
                                                data-bs-toggle="modal"
                                                data-bs-target="#reviewModal{{ $service->id }}"
                                                data-product-id="{{ $service->id }}">
                                                <i class="bi bi-star-fill me-1"></i> Review
                                            </button>
                                            @else
                                            <button type="button"
                                                class="btn btn-outline-primary btn-sm py-1 px-2"
                                                style="font-family: 'Segoe UI', system-ui, sans-serif; font-size: 0.85rem;"
                                                data-bs-toggle="modal" data-bs-target="#chatModal"
                                                data-service-id="{{ $service->id }}"
                                                data-vendor-id="{{ $service->vendor->id }}">
                                                <i class="bi bi-chat-dots me-1"></i> Query
                                            </button>

                                            <button class="btn btn-outline-success btn-sm py-1 px-2"
                                                style="font-family: 'Segoe UI', system-ui, sans-serif; font-size: 0.85rem;"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                                <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                            </button>

                                            <button class="btn btn-primary btn-sm py-1 px-2"
                                                style="font-family: 'Segoe UI', system-ui, sans-serif; font-size: 0.85rem;"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                                <i class="bi bi-star-fill me-1"></i> Review
                                            </button>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Modal -->
                <div class="modal fade" id="reviewModal{{ $service->id }}" tabindex="-1"
                    aria-labelledby="reviewModalLabel{{ $service->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewModalLabel{{ $service->id }}">Submit
                                    Review for {{ $service->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('reviews.submit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id"
                                    value="{{ Auth::guard('web')->User()->id ?? '' }}">
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <input type="hidden" name="vendor_id" value="{{ $service->vendor->id }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <div id="rating" class="d-flex gap-2">
                                            <!-- Rating Checkboxes -->
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="rating" id="rating{{ $i }}"
                                                    value="{{ $i }}"
                                                    onclick="handleRatingSelection(this)">
                                                <label class="form-check-label"
                                                    for="rating{{ $i }}">
                                                    {{ $i }}
                                                </label>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea name="review" class="form-control" rows="4" placeholder="Write your review here..." required></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit
                                Review</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 q-stck" style="height:100vh; overflow: auto;">
            @foreach ($categories as $category)
            <div class="cate-card d-flex align-items-center p-1">
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


{{-- SERVICES SECTION HERE END --}}


{{-- REVIEW SECTION HERE START --}}
<div class="container-fluid p-2 mt-2" id="Review">
    <div class="review-section">
        @if ($services->isEmpty())
        <div class="alert alert-info text-center py-4 shadow-sm rounded">
            <h2 class="fw-light">No Service/Review Available</h2>
        </div>
        @else
        <h3>Overall Rating for {{ $service->vendor->business_name }}</h3>

        <div class="rating-summary">
            <span class="overall-rating">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <=$ratingAverage)
                    <i class="fa fa-star text-warning"></i> <!-- Filled star -->
                    @else
                    <i class="fa fa-star text-secondary"></i> <!-- Empty star -->
                    @endif
                    @endfor
                    {{ number_format($ratingAverage, 1) }}
            </span>
            <span class="review-count">Based on {{ $reviews->count() }} Reviews</span>
        </div>
        <div class="review-list" style="overflow-y: scroll; height: 20rem;">
            @foreach ($reviews as $review)
            <div class="review-card">
                <div class="review-header">
                    <span class="user-initial">{{ $firstLetter = substr($review->user->name, 0, 1) }}</span>
                    <div class="user-info">
                        <strong>{{ $review->user->name }}</strong>
                    </div>
                </div>
                <div class="user-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <=$review->rating)
                        <i class="fa fa-star text-warning"></i> <!-- Filled star -->
                        @else
                        <i class="fa fa-star text-secondary"></i> <!-- Empty star -->
                        @endif
                        @endfor
                </div>
                <p class="review-date">
                    {{ $review->created_at->format('d M, Y') }}
                </p>
                <p class="review-text">
                    {{ $review->review }}
                </p>
            </div>
            @endforeach
        </div>
        @endif
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
        dropdown1Btn.addEventListener("click", () => {
            dropdown1Content.style.display =
                dropdown1Content.style.display === "block" ? "none" : "block";
        });

        // Filter cities
        citySearch.addEventListener("keyup", () => {
            const searchText = citySearch.value.toLowerCase();
            const cities = cityList.querySelectorAll("li");

            cities.forEach((city) => {
                if (city.textContent.toLowerCase().includes(searchText)) {
                    city.style.display = "block";
                } else {
                    city.style.display = "none";
                }
            });
        });

        // Select city
        cityList.addEventListener("click", (event) => {
            if (event.target.tagName === "LI") {
                selectedCity.textContent = event.target.textContent;
                dropdown1Content.style.display = "none";
            }
        });

        // Cancel button
        cancelBtn.addEventListener("click", () => {
            dropdown1Content.style.display = "none";
        });

        // Close dropdown1 when clicking outside
        document.addEventListener("click", (event) => {
            if (!event.target.closest(".dropdown1")) {
                dropdown1Content.style.display = "none";
            }
        });
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
@endsection