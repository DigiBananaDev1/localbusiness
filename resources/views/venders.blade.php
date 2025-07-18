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

        /* .actions {
                                                                    margin-top: 15px;
                                                                } */

        /* .actions .btn {
                                                                    margin-right: 10px;
                                                                } */

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

        /* .review-text {
                                                                    margin-top: 10px;
                                                                    font-size: 15px;
                                                                    color: #333;
                                                                } */
        .vendor-image>img {
            border-radius: 10px;
            margin: 1rem;

        }


        @media (max-width: 767px) {
            .vendor-image>img {
                border-radius: 10px;
                width: 90%;


            }

            .view-service-button {
                margin-top: 1rem;
            }

            .review-button {
                margin-top: 1rem;
            }
        }
    </style>
    <div class="container-fluid mt-3 p-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div id="Listing">
                        @if ($venders->isNotEmpty())
                            @foreach ($venders as $vendor)
                                <div class="card mb-4 border-0 shadow-sm">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <div class="h-100">
                                                @if (empty($vendor->image))
                                                    <img src="{{ asset('public/assetss/img/image.png') }}"
                                                        class="img-fluid h-100 w-100 object-fit-cover" alt="Service Image"
                                                        style="min-height: 200px;">
                                                @else
                                                    <img src="{{ asset('public/images/vendor/' . $vendor->image) }}"
                                                        class="img-fluid h-100 w-100 object-fit-cover"
                                                        alt="{{ $vendor->business_name }}"
                                                        style="min-height: 200px; text-transform: uppercase;">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h5 class="fw-semibold mb-1 text-uppercase">
                                                            {{ $vendor->business_name }}</h5>
                                                        <p class="text-muted small mb-0">{{ $vendor->description }}</p>
                                                    </div>
                                                    <span class="badge bg-success rounded-pill p-2"
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
                                                                <span
                                                                    @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
                                                                    @auth
                                                                        {{ $vendor->mobile }}
                                                                    @else
                                                                        {{ substr($vendor->mobile, 0, 4) . str_repeat('X', 6) }}
                                                                    @endauth
                                                                </span>
                                                            </div>
                                                            <div class="mb-2">
                                                                <i class="bi bi-whatsapp me-1" style="color: #25d366;"></i>
                                                                <span
                                                                    @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
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
                                                                <span
                                                                    @guest class="text-muted" data-toggle="tooltip" data-placement="top" title="Login to view" @endguest>
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
                                                                <i class="bi bi-geo-alt-fill mt-1 me-2"
                                                                    style="color: #e74c3c;"></i>
                                                                <a href="https://www.google.com/maps/search/{{ $vendor->business_name }} {{ $vendor->block_building }},{{ $vendor->street_colony }}, {{ $vendor->city }}, {{ $vendor->state }}{{ $vendor->pin_code }}"
                                                                    class="text-decoration-none text-muted d-block"
                                                                    target="_blank">
                                                                    {{ $vendor->block_building }},
                                                                    {{ $vendor->street_colony }},
                                                                    {{ $vendor->city }}, {{ $vendor->state }}
                                                                    ({{ $vendor->pin_code }})
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-2 mt-3">
                                                    @auth
                                                        <button type="button" class="btn btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#chatModal{{ $vendor->id }}"
                                                            data-vendor-id="{{ $vendor->id }}">
                                                            <i class="bi bi-question-circle me-1"></i> Query
                                                        </button>
                                                        <a href="https://api.whatsapp.com/send/?phone=91{{ $vendor->whatsapp_no }}&text={{ urlencode('About ' . $vendor->business_name . ",\n" . $vendor->description) }}&type=phone_number&app_absent=0"
                                                            target="_blank" class="btn btn-outline-success">
                                                            <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                                        </a>
                                                        <a href="{{ route('venderServices', $vendor->id) }}"
                                                            class="btn btn-outline-danger">
                                                            <i class="bi bi-eye"></i> View Service
                                                        </a>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#reviewModal{{ $vendor->id }}">
                                                            <i class="bi bi-star-fill me-1"></i> Review
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#chatModal{{ $vendor->id }}">
                                                            <i class="bi bi-question-circle me-1"></i> Query
                                                        </button>
                                                         <a href="https://api.whatsapp.com/send/?phone=91{{ $vendor->whatsapp_no }}&text={{ urlencode('About ' . $vendor->business_name . ",\n" . $vendor->description) }}&type=phone_number&app_absent=0"
                                                            target="_blank" class="btn btn-outline-success">
                                                            <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                                        </a>
                                                        <a href="{{ route('venderServices', $vendor->id) }}"
                                                            class="btn btn-outline-danger">
                                                            <i class="bi bi-eye"></i>View Service
                                                        </a>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#loginModal">
                                                            <i class="bi bi-star-fill me-1"></i> Review
                                                        </button>
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review Modal -->
                                <div class="modal fade" id="reviewModal{{ $vendor->id }}" tabindex="-1"
                                    aria-labelledby="reviewModalLabel{{ $vendor->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="reviewModalLabel{{ $vendor->id }}">Submit
                                                    Review for {{ $vendor->business_name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('reviews.submit') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id"
                                                    value="{{ Auth::guard('web')->User()->id ?? '' }}">
                                                <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="rating">Rating</label>
                                                        <div id="rating" class="d-flex gap-2">
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

                                                        <div class="mb-3">
                                                            <textarea name="review" class="form-control" rows="4" placeholder="Write your review here..." required></textarea>
                                                        </div>
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

                                <!-- Chat Modal -->
                                <div class="modal fade chatMenu" id="chatModal{{ $vendor->id }}" tabindex="-1"
                                    aria-labelledby="chatModalLabel{{ $vendor->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="chatModalLabel{{ $vendor->id }}">Submit Your Query</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('createQuery') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="vendor_id" name="vendor_id" value="{{ $vendor->id }}">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Your Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Your Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mobile" class="form-label">Your Mobile</label>
                                                        <input type="text" class="form-control" id="mobile"
                                                            name="mobile" required>
                                                        @error('mobile')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="message" class="form-label">Your Message</label>
                                                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit
                                                        Query</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-info text-center py-4 shadow-sm rounded">
                                <h2 class="fw-light">No Service/Product Available</h2>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 p-0 q-stck">
                    @foreach ($categories as $category)
                        <div class="cate-card">
                            <img src="{{ asset('public/images/category/' . $category->image) }}" alt="Category image"
                                width="50" height="50">
                            <a class="cate-link" href="{{ route('venders', $category->id) }}">{{ $category->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- FAQ SECTION --}}
    <div class="container-fluid p-2 mt-2" id="Faq">
        <div class="text-center py-3">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="accordion" id="accordionExample">
            @forelse($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne{{ $faq->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne{{ $faq->id }}" aria-expanded="false"
                            aria-controls="collapseOne{{ $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse"
                        aria-labelledby="headingOne{{ $faq->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                </div>
            @empty
                <p>No FAQs available</p>
            @endforelse
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all query buttons
        const queryButtons = document.querySelectorAll('[data-bs-target^="#chatModal"]');
        
        queryButtons.forEach(button => {
            button.addEventListener('click', function() {
                const vendorId = this.getAttribute('data-vendor-id');
                const modal = document.querySelector(this.getAttribute('data-bs-target'));
                const vendorIdInput = modal.querySelector('#vendor_id');
                if (vendorIdInput) {
                    vendorIdInput.value = vendorId;
                }
            });
        });
    });
    </script>
@endsection
