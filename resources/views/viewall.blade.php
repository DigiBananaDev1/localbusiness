@extends('app')

@section('content')
    <style>
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





        .main-content {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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
                grid-template-columns: repeat(2, 1fr);
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
                grid-template-columns: repeat(2, 1fr);
                max-width: 100%;
                gap: 18px;
            }
        }


        .category-list li::before {
            content: '»';
            color: #1f85c7;
            text-decoration: none;
            font-size: 1rem;
            padding-right: 5px;
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
                <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                <li class="breadcrumb-item"><span>{{ $mainCategory->name }}</span></li>
            </ol>
        </nav>
    </div>

    {{-- 1st SECTION --}}
    <div class="container-fluid section3 py-3">
        @if ($mainCategory->children->count())
            <div class="main-content">
                @foreach ($mainCategory->children as $sub)
                    <div class="category-card">
                        <img src="{{ asset('public/images/category/' . $sub->image) }}" alt="{{ $sub->name }} Image">
                        <div class="category-title">{{ $sub->name }}</div>

                        @if ($sub->children->count())
                            <ul class="list-unstyled category-list">
                                @foreach ($sub->children as $child)
                                    <li><a href="{{ route('productsByCategory', $child->slug) }}">{{ $child->name }}</a></li>
                                @endforeach

                            </ul>
                        @endif
                    </div>
                @endforeach

            </div>
        @endif
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
