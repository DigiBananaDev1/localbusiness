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

<div class="quates" id="Expert">
    <div class="dropdown1">
        <h5 class="aviation">Aviation Colleges in <button class="dropdown1-btn"><span id="selected-city">Rewa</span>
                ▼</button></h5>
        <div class="dropdown1-content">
            <input type="text" id="city-search" placeholder="Search your city">
            <ul id="city-list">
                <li>Delhi</li>
                <li>Hyderabad</li>
                <li>Mumbai</li>
                <li>Ahmedabad</li>
                <li>Kolkata</li>
                <li>Pune</li>
            </ul>
            <button id="cancel-btn">Cancel</button>
        </div>
    </div>
    <div class="quates-from">
        <h4 class="head-h4">Choose your preferred programme</h4>
        <div class="check">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            B. Sc. Aviation
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            BBA Airline and Airport Management
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            BBA Aviation Management
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            MBA Airline and Airport Management
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            B.Tech Aircraft Maintenance Engineering
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            M.Sc Aviation
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            BBA Aviation
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Type Rating
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="get-btn">Get Started</button>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="sticky-container">
        <ul class="btn-experts">
            <li><a class="expert-link" href="#Expert">Find Experts</a></li>
            <li><a class="expert-link" href="#Listing">Listing</a></li>
            <li><a class="expert-link" href="#Review">Reviews</a></li>
            <li><a class="expert-link" href="#Faq">FAQs</a></li>
        </ul>
    </div>

    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9" style="border: 1px solid gainsboro; border-radius: 10px;">
                <div id="Listing">
                   
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/assets/img/b1.jpg') }}" alt="Institute Image"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$vendor->business_name}}</h5>
                                    <p class="card-text">
                                        <strong>Description:</strong> {{$vendor->description}}
                                    </p>
                                    <div class="tags">
                                        <span class="badge bg-primary">Aviation Colleges</span>
                                        <span class="badge bg-secondary">BBA Aviation Management</span>
                                        <span class="badge bg-secondary">BBA Aviation Colleges</span>
                                    </div>
                                    <p><strong>Response Time:</strong> Within 15 Mins</p>
                                    <div class="info">
                                        <p><strong>Contact Details:</strong></p>
                                        <ul>
                                            <li><strong>Number: </strong>{{$vendor->mobile}}</li>
                                            <li><strong>Whatsapp: </strong>{{$vendor->whatsapp_no}}</li>
                                            <li><strong>Email: </strong>{{$vendor->email}}</li>
                                        </ul>
                                        <p>
                                            <strong>Address:</strong> {{$vendor->address}}, {{$vendor->city}}, {{$vendor->state}}({{$vendor->pin_code}})
                                        </p>
                                    </div>
                                    <div class="actions">
                                        <button type="button" class="btn btn-success openChatModal" data-bs-toggle="modal" data-bs-target="#chatModal" data-vendor-id="{{$vendor->id}}">
                                            Chat
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              




                    <!-- <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/assets/img/b1.jpg') }}" alt="Institute Image"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Athena Training Academy</h5>
                                    <p class="card-text">
                                        Welcome to Athena Training Academy, where we provide top-notch job training in
                                        the fields of aviation and hospitality...
                                    </p>
                                    <div class="tags">
                                        <span class="badge bg-primary">Aviation Colleges</span>
                                        <span class="badge bg-secondary">BBA Aviation Management</span>
                                        <span class="badge bg-secondary">BBA Aviation Colleges</span>
                                    </div>
                                    <p><strong>Response Time:</strong> Within 15 Mins</p>
                                    <p><strong>Sulekha Score:</strong> 6.2</p>
                                    <div class="info">
                                        <p><strong>Courses Offered:</strong></p>
                                        <ul>
                                            <li>Airline Customer Service</li>
                                            <li>Certificate in Airport Operations</li>
                                        </ul>
                                        <p><strong>Eligibility:</strong></p>
                                        <p>12th Standard from a reputed board</p>
                                    </div>
                                    <p><strong>Placement Support:</strong> Yes</p>
                                    <p><strong>Course Fee:</strong> Please call the institute</p>
                                    <div class="actions">
                                        <button class="btn btn-success">Chat</button>
                                        <button class="btn btn-danger">Enquire Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/assets/img/b1.jpg') }}" alt="Institute Image"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Athena Training Academy</h5>
                                    <p class="card-text">
                                        Welcome to Athena Training Academy, where we provide top-notch job training in
                                        the fields of aviation and hospitality...
                                    </p>
                                    <div class="tags">
                                        <span class="badge bg-primary">Aviation Colleges</span>
                                        <span class="badge bg-secondary">BBA Aviation Management</span>
                                        <span class="badge bg-secondary">BBA Aviation Colleges</span>
                                    </div>
                                    <p><strong>Response Time:</strong> Within 15 Mins</p>
                                    <p><strong>Sulekha Score:</strong> 6.2</p>
                                    <div class="info">
                                        <p><strong>Courses Offered:</strong></p>
                                        <ul>
                                            <li>Airline Customer Service</li>
                                            <li>Certificate in Airport Operations</li>
                                        </ul>
                                        <p><strong>Eligibility:</strong></p>
                                        <p>12th Standard from a reputed board</p>
                                    </div>
                                    <p><strong>Placement Support:</strong> Yes</p>
                                    <p><strong>Course Fee:</strong> Please call the institute</p>
                                    <div class="actions">
                                        <button class="btn btn-success">Chat</button>
                                        <button class="btn btn-danger">Enquire Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/assets/img/b1.jpg') }}" alt="Institute Image"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Athena Training Academy</h5>
                                    <p class="card-text">
                                        Welcome to Athena Training Academy, where we provide top-notch job training in
                                        the fields of aviation and hospitality...
                                    </p>
                                    <div class="tags">
                                        <span class="badge bg-primary">Aviation Colleges</span>
                                        <span class="badge bg-secondary">BBA Aviation Management</span>
                                        <span class="badge bg-secondary">BBA Aviation Colleges</span>
                                    </div>
                                    <p><strong>Response Time:</strong> Within 15 Mins</p>
                                    <p><strong>Sulekha Score:</strong> 6.2</p>
                                    <div class="info">
                                        <p><strong>Courses Offered:</strong></p>
                                        <ul>
                                            <li>Airline Customer Service</li>
                                            <li>Certificate in Airport Operations</li>
                                        </ul>
                                        <p><strong>Eligibility:</strong></p>
                                        <p>12th Standard from a reputed board</p>
                                    </div>
                                    <p><strong>Placement Support:</strong> Yes</p>
                                    <p><strong>Course Fee:</strong> Please call the institute</p>
                                    <div class="actions">
                                        <button class="btn btn-success">Chat</button>
                                        <button class="btn btn-danger">Enquire Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/assets/img/b1.jpg') }}" alt="Institute Image"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Athena Training Academy</h5>
                                    <p class="card-text">
                                        Welcome to Athena Training Academy, where we provide top-notch job training in
                                        the fields of aviation and hospitality...
                                    </p>
                                    <div class="tags">
                                        <span class="badge bg-primary">Aviation Colleges</span>
                                        <span class="badge bg-secondary">BBA Aviation Management</span>
                                        <span class="badge bg-secondary">BBA Aviation Colleges</span>
                                    </div>
                                    <p><strong>Response Time:</strong> Within 15 Mins</p>
                                    <p><strong>Sulekha Score:</strong> 6.2</p>
                                    <div class="info">
                                        <p><strong>Courses Offered:</strong></p>
                                        <ul>
                                            <li>Airline Customer Service</li>
                                            <li>Certificate in Airport Operations</li>
                                        </ul>
                                        <p><strong>Eligibility:</strong></p>
                                        <p>12th Standard from a reputed board</p>
                                    </div>
                                    <p><strong>Placement Support:</strong> Yes</p>
                                    <p><strong>Course Fee:</strong> Please call the institute</p>
                                    <div class="actions">
                                        <button class="btn btn-success">Chat</button>
                                        <button class="btn btn-danger">Enquire Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/assets/img/b1.jpg') }}" alt="Institute Image"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Athena Training Academy</h5>
                                    <p class="card-text">
                                        Welcome to Athena Training Academy, where we provide top-notch job training in
                                        the fields of aviation and hospitality...
                                    </p>
                                    <div class="tags">
                                        <span class="badge bg-primary">Aviation Colleges</span>
                                        <span class="badge bg-secondary">BBA Aviation Management</span>
                                        <span class="badge bg-secondary">BBA Aviation Colleges</span>
                                    </div>
                                    <p><strong>Response Time:</strong> Within 15 Mins</p>
                                    <p><strong>Sulekha Score:</strong> 6.2</p>
                                    <div class="info">
                                        <p><strong>Courses Offered:</strong></p>
                                        <ul>
                                            <li>Airline Customer Service</li>
                                            <li>Certificate in Airport Operations</li>
                                        </ul>
                                        <p><strong>Eligibility:</strong></p>
                                        <p>12th Standard from a reputed board</p>
                                    </div>
                                    <p><strong>Placement Support:</strong> Yes</p>
                                    <p><strong>Course Fee:</strong> Please call the institute</p>
                                    <div class="actions">
                                        <button class="btn btn-success">Chat</button>
                                        <button class="btn btn-danger">Enquire Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 q-stck">
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                        <path data-name="Rectangle 73076" style="fill:#fff" d="M0 0h50v50H0z" />
                        <g data-name="restaurant (3)" transform="translate(6 4)">
                            <circle data-name="Ellipse 3041" cx="18.762" cy="18.762" r="18.762"
                                transform="translate(.739 .738)" style="fill:#fddeb0" />
                            <circle data-name="Ellipse 3042" cx="12.35" cy="12.35" r="12.35"
                                transform="translate(7.151 7.151)" style="fill:#fdb441" />
                            <g data-name="Group 145759">
                                <path data-name="Path 147435"
                                    d="M332.888 187.914a3.248 3.248 0 1 1-6.276 1.681l-.217-.809 3.137-.841 3.138-.842z"
                                    transform="translate(-301.079 -171.645)" style="fill:#e6e6e6" />
                                <path data-name="Path 147436"
                                    d="M99.609 74.941c2.36.632 3.434 4.272 2.4 8.129s-3.368 4.92-5.727 4.288-3.849-2.719-2.815-6.577 3.784-6.472 6.142-5.84z"
                                    transform="translate(-87.089 -68.663)" style="fill:#e6e6e6" />
                            </g>
                            <g data-name="Group 145760">
                                <path data-name="Path 147437"
                                    d="M393.12 348.538a1.66 1.66 0 0 1-3.206.859l-2.789-10.408a1.66 1.66 0 1 1 3.206-.858z"
                                    transform="translate(-356.738 -309.064)" style="fill:#f24c8f" />
                                <path data-name="Path 147438"
                                    d="M47.253 336.955a1.659 1.659 0 0 1 1.173 2.033L45.639 349.4a1.66 1.66 0 0 1-3.207-.859l2.789-10.407a1.66 1.66 0 0 1 2.032-1.179z"
                                    transform="translate(-40.525 -309.063)" style="fill:#f24c8f" />
                            </g>
                            <g data-name="Group 145761">
                                <path data-name="Path 147439"
                                    d="M215.331 79.386a.742.742 0 0 0 .16-.018 11.788 11.788 0 0 1 4.5-.107.738.738 0 0 0 .249-1.455 13.272 13.272 0 0 0-5.069.121.738.738 0 0 0 .159 1.459z"
                                    transform="translate(-198.514 -71.206)" style="fill:#333a60" />
                                <path data-name="Path 147440"
                                    d="M145.182 316.778a11.535 11.535 0 0 1-8.211 3.4 11.659 11.659 0 0 1-9.386-4.774.738.738 0 1 0-1.193.87 13.14 13.14 0 0 0 10.578 5.38 13 13 0 0 0 9.255-3.833.738.738 0 1 0-1.044-1.044z"
                                    transform="translate(-117.471 -289.068)" style="fill:#333a60" />
                                <path data-name="Path 147441"
                                    d="M54.961 31.367A19.5 19.5 0 1 0 19.987 19.5a19.344 19.344 0 0 0 3.505 11.155l-2.312 8.627a2.4 2.4 0 0 0 1.7 2.937 2.412 2.412 0 0 0 .625.083 2.4 2.4 0 0 0 2.313-1.778l1.543-5.757a19.5 19.5 0 0 0 23.671.452l1.422 5.305a2.4 2.4 0 0 0 2.308 1.776 2.412 2.412 0 0 0 .625-.083 2.4 2.4 0 0 0 1.7-2.937zm-30.574 8.775a.921.921 0 1 1-1.78-.477L25.4 29.257a.923.923 0 0 1 .889-.683.928.928 0 0 1 .24.032.921.921 0 0 1 .652 1.129zm15.1-2.619A17.987 17.987 0 0 1 27.776 33.2l.826-3.084a2.4 2.4 0 0 0-1.013-2.633l2.124-7.927a5.217 5.217 0 0 0 .707.049 4.508 4.508 0 0 0 2.528-.754A7.056 7.056 0 0 0 35.62 14.6c1.157-4.317-.127-8.285-2.922-9.034s-5.891 2.046-7.048 6.362a7.057 7.057 0 0 0 .188 5.018 4.6 4.6 0 0 0 2.449 2.227L26.163 27.1a2.393 2.393 0 0 0-2.152 1.643 18.023 18.023 0 1 1 30.456.783l-.174-.651A2.4 2.4 0 0 0 52.1 27.1l-1.714-6.4a3.988 3.988 0 0 0 2.124-4.626l-2.36-8.807a.738.738 0 1 0-1.426.382l1.952 7.284-1.712.459-1.953-7.28a.738.738 0 1 0-1.426.382l1.952 7.284-1.712.459-1.952-7.284a.738.738 0 1 0-1.426.382l2.36 8.807a3.994 3.994 0 0 0 3.851 2.958c.1 0 .2 0 .3-.013l1.715 6.4a2.4 2.4 0 0 0-1.013 2.633l.954 3.562a18.041 18.041 0 0 1-11.127 3.841zm-10.116-19.54c-2.295-.615-3.109-2.63-2.294-5.673.829-3.093 2.889-5.387 4.707-5.387a2.046 2.046 0 0 1 .532.069c1.929.517 2.789 3.826 1.878 7.225a5.667 5.667 0 0 1-2.062 3.4 3.27 3.27 0 0 1-2.761.366zm19.261-.969 2.425-.65.026.1a2.511 2.511 0 1 1-4.85 1.3l-.026-.1zm6.932 23.351a.921.921 0 0 1-1.688-.222l-2.789-10.409a.921.921 0 1 1 1.78-.477l2.789 10.408a.915.915 0 0 1-.093.699z"
                                    transform="translate(-19.987)" style="fill:#333a60" />
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Restaurants</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 28 28">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none
                                }

                                .cls-2 {
                                    fill: #84879c
                                }

                                .cls-3 {
                                    fill: #323c6b;
                                    stroke: #323c6b;
                                    stroke-width: .4px
                                }

                                .cls-8 {
                                    fill: #dbe2eb
                                }
                            </style>
                        </defs>
                        <g id="Beauty" transform="translate(-102 -285)">
                            <path id="Rectangle_6234" d="M0 0h28v28H0z" class="cls-1" transform="translate(102 285)" />
                            <g id="Group_13184" transform="translate(102 285)">
                                <g id="daily-needs-icn">
                                    <path id="Rectangle_91" d="M0 0h28v28H0z" class="cls-1" />
                                </g>
                                <path id="Rectangle_27" d="M0 0h28v28H0z" class="cls-1" />
                            </g>
                            <g id="woman" transform="translate(88.475 286)">
                                <circle id="Ellipse_870" cx="2.938" cy="2.938" r="2.938" class="cls-2"
                                    transform="translate(24.384 .203)" />
                                <path id="Path_12736"
                                    d="M49.509 6.283a3.142 3.142 0 1 1 3.142-3.142 3.141 3.141 0 0 1-3.142 3.142zm0-5.877a2.735 2.735 0 1 0 2.735 2.735A2.735 2.735 0 0 0 49.509.406z"
                                    class="cls-3" transform="translate(-22.187)" />
                                <ellipse id="Ellipse_871" cx="1.014" cy="1.929" fill="#e8c79c" rx="1.014" ry="1.929"
                                    transform="rotate(-13.175 74.082 -72.721)" />
                                <path id="Path_12737"
                                    d="M20.791 75.675a1.172 1.172 0 0 1-.853-.472 3.2 3.2 0 0 1-.644-1.347c-.272-1.164.035-2.2.7-2.353a1.066 1.066 0 0 1 1.027.452 3.482 3.482 0 0 1 .664 2.84 1.066 1.066 0 0 1-.72.86.755.755 0 0 1-.174.02zm-.628-3.785a.337.337 0 0 0-.077.009c-.373.087-.628.875-.4 1.865a2.788 2.788 0 0 0 .555 1.174c.214.248.442.366.627.322s.337-.25.419-.567a3.081 3.081 0 0 0-.578-2.472.8.8 0 0 0-.546-.331z"
                                    class="cls-3" transform="translate(-.534 -56.963)" />
                                <ellipse id="Ellipse_872" cx="1.929" cy="1.014" fill="#e8c79c" stroke="#323c6b"
                                    stroke-width="0.4px" rx="1.929" ry="1.014"
                                    transform="rotate(-76.825 28.38 -12.134)" />
                                <path id="Path_12738"
                                    d="M92.81 75.674a.756.756 0 0 1-.173-.02 1.067 1.067 0 0 1-.72-.86 3.482 3.482 0 0 1 .664-2.84 1.065 1.065 0 0 1 1.027-.452c.664.155.972 1.189.7 2.353a3.2 3.2 0 0 1-.644 1.347 1.172 1.172 0 0 1-.854.472zm.628-3.785a.8.8 0 0 0-.55.331 3.081 3.081 0 0 0-.578 2.472c.082.317.235.524.419.567s.413-.075.627-.322a2.789 2.789 0 0 0 .555-1.174c.231-.99-.023-1.778-.4-1.865a.338.338 0 0 0-.073-.009z"
                                    class="cls-3" transform="translate(-57.981 -56.962)" />
                                <ellipse id="Ellipse_873" cx="6.927" cy="9.508" fill="#e5bda3" rx="6.927" ry="9.508"
                                    transform="translate(20.292 6.78)" />
                                <ellipse id="Ellipse_874" cx="6.368" cy="8.741" fill="#ffd39f" rx="6.368" ry="8.741"
                                    transform="translate(20.851 6.78)" />
                                <path id="Path_12739"
                                    d="M33.355 51.8c-3.931 0-7.13-4.357-7.13-9.712s3.2-9.712 7.13-9.712 7.13 4.357 7.13 9.712-3.199 9.712-7.13 9.712zm0-19.017c-3.708 0-6.723 4.174-6.723 9.305s3.016 9.305 6.723 9.305 6.723-4.174 6.723-9.305-3.016-9.304-6.723-9.304z"
                                    class="cls-3" transform="translate(-6.136 -25.801)" />
                                <path id="Path_12740"
                                    d="M22.968 29.59s2.034-7.409 6.644-7a10.364 10.364 0 0 0 7.507 7.782 11.93 11.93 0 0 0 .2-9.183c-1.64-4.606-6.791-5.884-10.688-4.08s-6.244 7.142-3.663 12.481z"
                                    class="cls-2" transform="translate(-2.676 -13.006)" />
                                <path id="Path_12741"
                                    d="M36.323 29.791a.2.2 0 0 1-.055-.008A10.662 10.662 0 0 1 28.648 22c-4.289-.222-6.26 6.792-6.28 6.864a.2.2 0 0 1-.379.035 10.158 10.158 0 0 1-.551-7.881 8.48 8.48 0 0 1 4.312-4.878 8.641 8.641 0 0 1 6.863-.174 7.245 7.245 0 0 1 4.1 4.37 12.023 12.023 0 0 1-.213 9.348.2.2 0 0 1-.178.106zm-7.879-8.2c.128 0 .257.005.389.017a.2.2 0 0 1 .183.169 10.238 10.238 0 0 0 7.2 7.573 12.027 12.027 0 0 0 .117-8.873 6.848 6.848 0 0 0-3.876-4.132 8.227 8.227 0 0 0-6.535.168 8.073 8.073 0 0 0-4.1 4.643 9.665 9.665 0 0 0 .315 7.085c.547-1.66 2.515-6.654 6.307-6.654z"
                                    class="cls-3" transform="translate(-1.881 -12.224)" />
                                <path id="Path_12742"
                                    d="M87.537 22.44c0 .5-.408 2.666-.91 2.666s-.91-2.164-.91-2.666a.911.911 0 1 1 1.821 0z"
                                    class="cls-8" transform="translate(-53.543 -17.156)" />
                                <path id="Path_12743"
                                    d="M85.832 24.514c-.8 0-1.114-2.674-1.114-2.87a1.114 1.114 0 1 1 2.227 0c0 .196-.311 2.87-1.113 2.87zm0-3.577a.708.708 0 0 0-.707.707 5.228 5.228 0 0 0 .713 2.464 5.371 5.371 0 0 0 .7-2.464.708.708 0 0 0-.706-.707z"
                                    class="cls-3" transform="translate(-52.747 -16.36)" />
                                <path id="Path_12744"
                                    d="M85.715 41.806c0-.5.408-2.666.91-2.666s.911 2.163.911 2.666a.911.911 0 1 1-1.821 0z"
                                    class="cls-8" transform="translate(-53.542 -31.19)" />
                                <path id="Path_12745"
                                    d="M85.832 42.124a1.115 1.115 0 0 1-1.114-1.114c0-.2.31-2.87 1.114-2.87s1.113 2.673 1.113 2.869a1.115 1.115 0 0 1-1.113 1.115zm-.005-3.578a5.371 5.371 0 0 0-.7 2.464.707.707 0 0 0 1.415 0 5.237 5.237 0 0 0-.713-2.464z"
                                    class="cls-3" transform="translate(-52.747 -30.394)" />
                                <path id="Path_12746"
                                    d="M92.864 36.479c-.5 0-2.666-.408-2.666-.91s2.164-.91 2.666-.91a.911.911 0 0 1 0 1.821z"
                                    class="cls-8" transform="translate(-57.114 -27.618)" />
                                <path id="Path_12747"
                                    d="M92.067 35.885c-.2 0-2.87-.31-2.87-1.114s2.674-1.114 2.87-1.114a1.114 1.114 0 1 1 0 2.227zm0-1.821a5.228 5.228 0 0 0-2.464.713 5.371 5.371 0 0 0 2.464.7.707.707 0 0 0 0-1.415z"
                                    class="cls-3" transform="translate(-56.317 -26.821)" />
                                <path id="Path_12748"
                                    d="M73.5 34.657c.5 0 2.666.408 2.666.91s-2.163.911-2.666.911a.911.911 0 0 1 0-1.821z"
                                    class="cls-8" transform="translate(-43.081 -27.617)" />
                                <path id="Path_12749"
                                    d="M72.7 35.884a1.114 1.114 0 0 1 0-2.227c.2 0 2.87.31 2.87 1.114s-2.67 1.113-2.87 1.113zm0-1.821a.707.707 0 1 0 0 1.415 5.227 5.227 0 0 0 2.464-.713 5.358 5.358 0 0 0-2.464-.702z"
                                    class="cls-3" transform="translate(-42.284 -26.82)" />
                                <path id="Path_12750"
                                    d="M92.481 26.929c-.355.355-2.174 1.6-2.529 1.242s.886-2.173 1.242-2.529a.91.91 0 0 1 1.288 1.288z"
                                    class="cls-8" transform="translate(-56.868 -20.221)" />
                                <path id="Path_12751"
                                    d="M89.361 27.634a.451.451 0 0 1-.332-.117c-.569-.569 1.1-2.678 1.242-2.817a1.114 1.114 0 0 1 1.575 1.575 6.124 6.124 0 0 1-2.485 1.359zm1.7-2.854a.7.7 0 0 0-.5.207c-.45.45-1.375 1.993-1.239 2.246.243.128 1.789-.8 2.239-1.246a.707.707 0 0 0-.5-1.208z"
                                    class="cls-3" transform="translate(-56.089 -19.423)" />
                                <path id="Path_12752"
                                    d="M76.7 40.133c.356-.356 2.174-1.6 2.53-1.241s-.886 2.173-1.242 2.529a.91.91 0 0 1-1.288-1.288z"
                                    class="cls-8" transform="translate(-46.147 -30.941)" />
                                <path id="Path_12753"
                                    d="M76.546 41.089a1.113 1.113 0 0 1-.788-1.9 7.713 7.713 0 0 1 1.308-.92c1.045-.6 1.361-.469 1.509-.321.569.569-1.1 2.678-1.242 2.817a1.11 1.11 0 0 1-.788.326zm-.5-1.613a.707.707 0 1 0 1 1c.449-.45 1.375-1.994 1.239-2.246-.244-.129-1.789.8-2.239 1.246z"
                                    class="cls-3" transform="translate(-45.347 -30.141)" />
                                <path id="Path_12754"
                                    d="M91.192 41.421c-.355-.356-1.6-2.174-1.241-2.529s2.173.886 2.529 1.242a.91.91 0 0 1-1.288 1.288z"
                                    class="cls-8" transform="translate(-56.867 -30.941)" />
                                <path id="Path_12755"
                                    d="M91.056 41.115a1.106 1.106 0 0 1-.788-.325c-.139-.139-1.81-2.248-1.242-2.817s2.678 1.1 2.817 1.242a1.114 1.114 0 0 1-.787 1.9zm-1.677-2.864a.146.146 0 0 0-.068.014c-.129.245.8 1.789 1.246 2.239a.724.724 0 0 0 1 0 .708.708 0 0 0 0-1 6.081 6.081 0 0 0-2.178-1.253z"
                                    class="cls-3" transform="translate(-56.087 -30.167)" />
                                <path id="Path_12756"
                                    d="M77.987 25.642c.356.356 1.6 2.173 1.242 2.529s-2.173-.886-2.529-1.242a.91.91 0 1 1 1.288-1.288z"
                                    class="cls-8" transform="translate(-46.145 -20.221)" />
                                <path id="Path_12757"
                                    d="M78.246 27.641a2.65 2.65 0 0 1-1.18-.445 7.713 7.713 0 0 1-1.308-.92 1.114 1.114 0 1 1 1.575-1.576c.139.139 1.81 2.249 1.241 2.817a.431.431 0 0 1-.328.124zm-1.7-2.86a.707.707 0 0 0-.5 1.207c.45.45 1.991 1.375 2.246 1.239.13-.245-.8-1.789-1.246-2.239a.705.705 0 0 0-.5-.207z"
                                    class="cls-3" transform="translate(-45.348 -19.423)" />
                                <circle id="Ellipse_875" cx="1.171" cy="1.171" r="1.171" fill="#00a7ff"
                                    transform="translate(31.913 6.78)" />
                                <path id="Path_12758"
                                    d="M84.812 35.121a1.374 1.374 0 1 1 1.374-1.374 1.374 1.374 0 0 1-1.374 1.374zm0-2.341a.967.967 0 1 0 .968.968.967.967 0 0 0-.968-.968z"
                                    class="cls-3" transform="translate(-51.727 -25.798)" />
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Beauty Spa</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                        <path data-name="Rectangle 73077" style="fill:#fff" d="M0 0h50v50H0z" />
                        <g data-name="hotel (3)">
                            <g data-name="Group 145751">
                                <g data-name="Group 145726">
                                    <path data-name="Path 147365"
                                        d="M74.96 95.714v11.592a.806.806 0 0 1-.819.793h-3.134a.806.806 0 0 1-.819-.793V95.714a.806.806 0 0 0-.819-.793H56.97a.806.806 0 0 0-.819.793v31a.806.806 0 0 0 .819.793h31.208a.806.806 0 0 0 .819-.793v-31a.806.806 0 0 0-.819-.793h-12.4a.806.806 0 0 0-.818.793z"
                                        transform="translate(-47.574 -82.989)" style="fill:#d3e1f5" />
                                </g>
                                <g data-name="Group 145727">
                                    <path data-name="Path 147366"
                                        d="M279.145 107.306V95.714a.806.806 0 0 1 .819-.793h-2.523a.806.806 0 0 0-.819.793v11.592a.806.806 0 0 1-.819.793h2.523a.806.806 0 0 0 .819-.793z"
                                        transform="translate(-249.236 -82.989)" style="fill:#b3ceec" />
                                </g>
                                <g data-name="Group 145728">
                                    <path data-name="Path 147367"
                                        d="M58.674 126.712v-31a.806.806 0 0 1 .819-.793H56.97a.806.806 0 0 0-.819.793v31a.806.806 0 0 0 .819.793h2.523a.806.806 0 0 1-.819-.793z"
                                        transform="translate(-47.574 -82.989)" style="fill:#b3ceec" />
                                </g>
                                <g data-name="Group 145729">
                                    <path data-name="Path 147368"
                                        d="M90.684 133.108h-2.206a.4.4 0 0 1-.41-.4v-3.2a.4.4 0 0 1 .41-.4h2.206a.4.4 0 0 1 .41.4v3.2a.4.4 0 0 1-.41.4z"
                                        transform="translate(-76.877 -114.468)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145730">
                                    <path data-name="Path 147369"
                                        d="M159.346 133.108h-2.206a.4.4 0 0 1-.41-.4v-3.2a.4.4 0 0 1 .41-.4h2.206a.4.4 0 0 1 .41.4v3.2a.4.4 0 0 1-.41.4z"
                                        transform="translate(-139.916 -114.468)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145731">
                                    <path data-name="Path 147370"
                                        d="M90.684 214.708h-2.206a.4.4 0 0 1-.41-.4v-3.2a.4.4 0 0 1 .41-.4h2.206a.4.4 0 0 1 .41.4v3.2a.4.4 0 0 1-.41.4z"
                                        transform="translate(-76.877 -189.597)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145732">
                                    <path data-name="Path 147371"
                                        d="M159.346 214.708h-2.206a.4.4 0 0 1-.41-.4v-3.2a.4.4 0 0 1 .41-.4h2.206a.4.4 0 0 1 .41.4v3.2a.4.4 0 0 1-.41.4z"
                                        transform="translate(-139.916 -189.597)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145733">
                                    <path data-name="Path 147372"
                                        d="M388.74 133.108h2.206a.4.4 0 0 0 .41-.4v-3.2a.4.4 0 0 0-.41-.4h-2.206a.4.4 0 0 0-.41.4v3.2a.4.4 0 0 0 .41.4z"
                                        transform="translate(-352.547 -114.468)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145734">
                                    <path data-name="Path 147373"
                                        d="M320.078 133.108h2.206a.4.4 0 0 0 .41-.4v-3.2a.4.4 0 0 0-.41-.4h-2.206a.4.4 0 0 0-.41.4v3.2a.4.4 0 0 0 .41.4z"
                                        transform="translate(-289.508 -114.468)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145735">
                                    <path data-name="Path 147374"
                                        d="M388.74 214.708h2.206a.4.4 0 0 0 .41-.4v-3.2a.4.4 0 0 0-.41-.4h-2.206a.4.4 0 0 0-.41.4v3.2a.4.4 0 0 0 .41.4z"
                                        transform="translate(-352.547 -189.597)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145736">
                                    <path data-name="Path 147375"
                                        d="M320.078 214.708h2.206a.4.4 0 0 0 .41-.4v-3.2a.4.4 0 0 0-.41-.4h-2.206a.4.4 0 0 0-.41.4v3.2a.4.4 0 0 0 .41.4z"
                                        transform="translate(-289.508 -189.597)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145737">
                                    <path data-name="Path 147376"
                                        d="m58.429 11.406-1.044.531a.287.287 0 0 1-.419-.294l.2-1.126a.274.274 0 0 0-.083-.247l-.845-.8A.277.277 0 0 1 56.4 9l1.167-.164a.288.288 0 0 0 .217-.153l.516-1.028a.293.293 0 0 1 .517 0l.522 1.024a.288.288 0 0 0 .217.153L60.728 9a.277.277 0 0 1 .16.476l-.845.8a.274.274 0 0 0-.083.247l.2 1.126a.287.287 0 0 1-.419.294l-1.041-.537a.3.3 0 0 0-.271 0z"
                                        transform="translate(-47.573 -2.499)" style="stroke:#333a60;fill:#ffd772" />
                                </g>
                                <g data-name="Group 145738">
                                    <path data-name="Path 147377"
                                        d="m143.959 11.407-1.044.531a.287.287 0 0 1-.419-.294l.2-1.126a.274.274 0 0 0-.083-.247l-.845-.8a.277.277 0 0 1 .16-.476l1.167-.164a.288.288 0 0 0 .217-.153l.522-1.024a.293.293 0 0 1 .517 0l.522 1.024a.288.288 0 0 0 .217.153l1.168.169a.277.277 0 0 1 .16.476l-.845.8a.274.274 0 0 0-.083.247l.2 1.126a.287.287 0 0 1-.419.294l-1.044-.531a.3.3 0 0 0-.268-.005z"
                                        transform="translate(-126.098 -2.5)" style="stroke:#333a60;fill:#ffd772" />
                                </g>
                                <g data-name="Group 145739">
                                    <path data-name="Path 147378"
                                        d="m229.491 11.406-1.044.531a.287.287 0 0 1-.419-.294l.2-1.126a.274.274 0 0 0-.083-.247l-.845-.8a.277.277 0 0 1 .16-.47l1.167-.164a.288.288 0 0 0 .217-.153l.522-1.024a.293.293 0 0 1 .517 0l.522 1.024a.288.288 0 0 0 .217.153L231.79 9a.277.277 0 0 1 .16.476l-.845.8a.274.274 0 0 0-.083.247l.2 1.126a.287.287 0 0 1-.419.294l-1.044-.531a.3.3 0 0 0-.268-.006z"
                                        transform="translate(-204.625 -2.499)" style="stroke:#333a60;fill:#ffd772" />
                                </g>
                                <g data-name="Group 145740">
                                    <path data-name="Path 147379"
                                        d="m315.022 11.407-1.044.531a.287.287 0 0 1-.419-.294l.2-1.126a.274.274 0 0 0-.083-.247l-.845-.8a.277.277 0 0 1 .16-.476l1.167-.164a.288.288 0 0 0 .217-.153l.522-1.024a.293.293 0 0 1 .517 0l.522 1.024a.288.288 0 0 0 .217.153l1.168.169a.277.277 0 0 1 .16.476l-.845.8a.274.274 0 0 0-.083.247l.2 1.126a.287.287 0 0 1-.419.294l-1.044-.531a.3.3 0 0 0-.268-.005z"
                                        transform="translate(-283.151 -2.5)" style="stroke:#333a60;fill:#ffd772" />
                                </g>
                                <g data-name="Group 145741">
                                    <path data-name="Path 147380"
                                        d="m400.553 11.407-1.044.531a.287.287 0 0 1-.419-.294l.2-1.126a.274.274 0 0 0-.083-.247l-.845-.8a.277.277 0 0 1 .16-.476l1.167-.164a.288.288 0 0 0 .217-.153l.522-1.024a.293.293 0 0 1 .517 0l.522 1.024a.288.288 0 0 0 .217.153l1.168.169a.277.277 0 0 1 .16.476l-.845.8a.274.274 0 0 0-.083.247l.2 1.126a.287.287 0 0 1-.419.294l-1.044-.531a.3.3 0 0 0-.268-.005z"
                                        transform="translate(-361.676 -2.5)" style="stroke:#333a60;fill:#ffd772" />
                                </g>
                                <g data-name="Group 145744">
                                    <g data-name="Group 145743">
                                        <g data-name="Group 145742">
                                            <path data-name="Path 147381"
                                                d="M68.14 301.37H33.007a.806.806 0 0 1-.819-.793v-7.713a.806.806 0 0 1 .819-.793H68.14a.806.806 0 0 1 .819.793v7.713a.806.806 0 0 1-.819.793z"
                                                transform="translate(-25.574 -264.505)" style="fill:#fcb577" />
                                        </g>
                                    </g>
                                </g>
                                <g data-name="Group 145746">
                                    <g data-name="Group 145745">
                                        <path data-name="Path 147382"
                                            d="M34.665 300.577v-7.713a.806.806 0 0 1 .819-.793h-2.477a.806.806 0 0 0-.819.793v7.713a.806.806 0 0 0 .819.793h2.477a.806.806 0 0 1-.819-.793z"
                                            transform="translate(-25.574 -264.505)" style="fill:#fb9e72" />
                                    </g>
                                </g>
                                <g data-name="Group 145747">
                                    <path data-name="Path 147383" d="M56.151 409.336H89v2.706H56.151z"
                                        transform="translate(-47.574 -372.472)" style="fill:#ffd772" />
                                </g>
                                <g data-name="Group 145748">
                                    <path data-name="Path 147384" d="M56.151 409.336h2.523v2.706h-2.523z"
                                        transform="translate(-47.574 -372.472)" style="fill:#fdb440" />
                                </g>
                                <g data-name="Group 145749">
                                    <path data-name="Path 147385" d="M217.023 409.336h6.494v7.652h-6.494z"
                                        transform="translate(-195.27 -372.472)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 145750">
                                    <path data-name="Path 147386" d="M217.023 409.336h1.783v7.652h-1.783z"
                                        transform="translate(-195.27 -372.472)" style="fill:#3c87d0" />
                                </g>
                            </g>
                            <g data-name="Group 145752">
                                <path data-name="Path 147387"
                                    d="M49.265 101.789a.6.6 0 0 0 .614-.595V88.809a.2.2 0 0 1 .2-.2h12.4a.2.2 0 0 1 .2.2V100.4a1.413 1.413 0 0 0 1.433 1.388h3.134a1.413 1.413 0 0 0 1.433-1.388V88.809a.2.2 0 0 1 .2-.2h12.4a.2.2 0 0 1 .2.2v4.242a.615.615 0 0 0 1.229 0v-4.242a1.413 1.413 0 0 0-1.433-1.388h-12.4a1.413 1.413 0 0 0-1.433 1.388V100.4a.2.2 0 0 1-.2.2h-3.121a.2.2 0 0 1-.2-.2V88.809a1.413 1.413 0 0 0-1.433-1.388h-12.4a1.413 1.413 0 0 0-1.433 1.388v12.385a.6.6 0 0 0 .614.595z"
                                    transform="translate(-40.688 -76.083)" style="fill:#333a60" />
                                <path data-name="Path 147388"
                                    d="M84.823 122.6a1.009 1.009 0 0 0-1.024-.991h-2.206a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991H83.8a1.009 1.009 0 0 0 1.024-.991v-3.2zm-1.229 3.005H81.8V122.8h1.8v2.807z"
                                    transform="translate(-69.992 -107.562)" style="fill:#333a60" />
                                <path data-name="Path 147389"
                                    d="M153.484 122.6a1.009 1.009 0 0 0-1.024-.991h-2.206a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991h2.206a1.009 1.009 0 0 0 1.024-.991zm-1.229 3.005h-1.8V122.8h1.8z"
                                    transform="translate(-133.03 -107.562)" style="fill:#333a60" />
                                <path data-name="Path 147390"
                                    d="M83.8 203.211h-2.207a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991H83.8a1.009 1.009 0 0 0 1.024-.991v-3.2a1.009 1.009 0 0 0-1.024-.991zm-.2 4h-1.8V204.4h1.8v2.807z"
                                    transform="translate(-69.992 -182.691)" style="fill:#333a60" />
                                <path data-name="Path 147391"
                                    d="M152.46 203.211h-2.206a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991h2.206a1.009 1.009 0 0 0 1.024-.991v-3.2a1.009 1.009 0 0 0-1.024-.991zm-.2 4h-1.8V204.4h1.8z"
                                    transform="translate(-133.03 -182.691)" style="fill:#333a60" />
                                <path data-name="Path 147392"
                                    d="M385.084 122.6a1.009 1.009 0 0 0-1.024-.991h-2.206a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991h2.206a1.009 1.009 0 0 0 1.024-.991zm-1.229 3.005h-1.8V122.8h1.8z"
                                    transform="translate(-345.661 -107.562)" style="fill:#333a60" />
                                <path data-name="Path 147393"
                                    d="M316.422 122.6a1.009 1.009 0 0 0-1.024-.991h-2.206a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991h2.208a1.009 1.009 0 0 0 1.024-.991zm-1.229 3.005h-1.8V122.8h1.8z"
                                    transform="translate(-282.622 -107.562)" style="fill:#333a60" />
                                <path data-name="Path 147394"
                                    d="M384.06 203.211h-2.206a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991h2.206a1.009 1.009 0 0 0 1.024-.991v-3.2a1.009 1.009 0 0 0-1.024-.991zm-.2 4h-1.8V204.4h1.8z"
                                    transform="translate(-345.661 -182.691)" style="fill:#333a60" />
                                <path data-name="Path 147395"
                                    d="M315.4 203.211h-2.206a1.009 1.009 0 0 0-1.024.991v3.2a1.009 1.009 0 0 0 1.024.991h2.206a1.009 1.009 0 0 0 1.024-.991v-3.2a1.009 1.009 0 0 0-1.024-.991zm-.2 4h-1.8V204.4h1.8z"
                                    transform="translate(-282.622 -182.691)" style="fill:#333a60" />
                                <path data-name="Path 147401"
                                    d="M61.255 191.566h-.529v-7.415a.615.615 0 0 0-1.229 0v7.415H26.121a1.413 1.413 0 0 0-1.433 1.388v7.713a1.413 1.413 0 0 0 1.433 1.388h.529v6.264a1.413 1.413 0 0 0 1.433 1.388h31.209a1.413 1.413 0 0 0 1.433-1.388v-6.264h.529a1.413 1.413 0 0 0 1.433-1.388v-7.713a1.413 1.413 0 0 0-1.432-1.388zm-21.428 12H27.879v-1.516h11.948zm-11.947 4.748v-3.554h11.947v3.757H28.084a.2.2 0 0 1-.205-.198zm13.176.2v-6.463h5.266v6.463zm18.237 0H47.549v-3.754H51.8a.6.6 0 1 0 0-1.189h-4.251v-1.516H59.5v1.516h-4.794a.6.6 0 1 0 0 1.189H59.5v3.559a.2.2 0 0 1-.208.198zm2.167-7.85a.2.2 0 0 1-.2.2H26.121a.2.2 0 0 1-.2-.2v-7.713a.2.2 0 0 1 .2-.2h35.134a.2.2 0 0 1 .2.2z"
                                    transform="translate(-18.688 -164.595)" style="fill:#333a60" />
                                <path data-name="Path 147402"
                                    d="M393.722 318.026h-1.1v-4.15a.615.615 0 0 0-1.229 0v4.741a.6.6 0 0 0 .51.586 4.652 4.652 0 0 0 .625.013h1.2a.595.595 0 1 0 0-1.189z"
                                    transform="translate(-355.357 -284.037)" style="fill:#333a60" />
                                <path data-name="Path 147403"
                                    d="M90 313.285a.6.6 0 0 0-.614.595v1.7h-2.165v-1.7a.615.615 0 0 0-1.229 0v4.745a.615.615 0 0 0 1.229 0v-1.859h2.163v1.859a.615.615 0 0 0 1.229 0v-4.745a.6.6 0 0 0-.613-.595z"
                                    transform="translate(-74.971 -284.037)" style="fill:#333a60" />
                                <path data-name="Path 147404"
                                    d="M325.9 315.02a.6.6 0 1 0 0-1.189h-2.046a.6.6 0 0 0-.614.595v4.7a.6.6 0 0 0 .614.595h2.046a.6.6 0 1 0 0-1.189h-1.432v-1.161h1.281a.6.6 0 1 0 0-1.19h-1.281v-1.161z"
                                    transform="translate(-292.785 -284.54)" style="fill:#333a60" />
                                <path data-name="Path 147405"
                                    d="M254.91 313.285h-2.71a.6.6 0 1 0 0 1.189h.734v4.15a.615.615 0 0 0 1.229 0v-4.15h.745a.6.6 0 1 0 0-1.189z"
                                    transform="translate(-227.005 -284.037)" style="fill:#333a60" />
                                <path data-name="Path 147406"
                                    d="M164 313.285a2.969 2.969 0 1 0 3.065 2.967 3.021 3.021 0 0 0-3.065-2.967zm0 4.745a1.779 1.779 0 1 1 1.836-1.778A1.81 1.81 0 0 1 164 318.03z"
                                    transform="translate(-143.775 -284.037)" style="fill:#333a60" />
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Beauty Spa</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                        <g data-name="Home Decor">
                            <path data-name="Rectangle 73075" style="fill:#fff" d="M0 0h50v50H0z" />
                            <g transform="translate(2 3)">
                                <path data-name="Path 147500"
                                    d="M277.078 141.5H274.5l2.578 18.3h4.3l-1.719-2.578v-13.144a2.586 2.586 0 0 0-2.581-2.578z"
                                    transform="translate(-250.91 -129.34)" style="fill:#84c5fa" />
                                <path data-name="Path 147501"
                                    d="M69.586 144.078V159.8H47.5l1.719-2.578v-13.144A2.586 2.586 0 0 1 51.8 141.5h15.208a2.586 2.586 0 0 1 2.578 2.578z"
                                    transform="translate(-43.418 -129.34)" style="fill:#a2daf9" />
                                <g data-name="Group 145829">
                                    <path data-name="Path 147502" d="M30.937 454.5v4.3H27.5v-2.578z"
                                        transform="translate(-25.137 -415.441)" style="fill:#cbccca" />
                                    <path data-name="Path 147503" d="M337.938 456.219v2.581H334.5v-4.3z"
                                        transform="translate(-305.754 -415.441)" style="fill:#cbccca" />
                                </g>
                                <path data-name="Path 147504" d="m290.516 394.5-1.719 6.875h-2.578L284.5 394.5z"
                                    transform="translate(-260.051 -360.598)" style="fill:#84c5fa" />
                                <path data-name="Path 147505" d="M69.586 394.5v6.875H49.219L47.5 394.5z"
                                    transform="translate(-43.418 -360.598)" style="fill:#70b5e8" />
                                <g data-name="Group 145830">
                                    <path data-name="Path 147506"
                                        d="M9.219 284.5a1.719 1.719 0 1 0 0 3.437v12.891h3.437v-12.891a3.448 3.448 0 0 0-3.437-3.437z"
                                        transform="translate(-6.855 -260.051)" style="fill:#70b5e8" />
                                    <path data-name="Path 147507"
                                        d="M337.938 284.5a3.448 3.448 0 0 0-3.438 3.437v12.891h3.438v-12.891a1.719 1.719 0 0 0 0-3.437z"
                                        transform="translate(-305.753 -260.051)" style="fill:#70b5e8" />
                                </g>
                                <path data-name="Path 147508"
                                    d="M277.078 324.5H274.5l2.578 7.734h2.578v-5.156a2.586 2.586 0 0 0-2.578-2.578z"
                                    transform="translate(-250.91 -296.613)" style="fill:#84c5fa" />
                                <g data-name="Group 145831">
                                    <path data-name="Path 147509"
                                        d="M87.867 327.078v5.156H67.5v-5.156a2.586 2.586 0 0 1 2.578-2.578h15.211a2.586 2.586 0 0 1 2.578 2.578z"
                                        transform="translate(-61.699 -296.613)" style="fill:#a2daf9" />
                                    <path data-name="Path 147510"
                                        d="m434.4 7.5 1.719 11.473h-2.578l-3.851-5.736 2.988-5.737z"
                                        transform="translate(-390.404 -6.855)" style="fill:#f3a744" />
                                </g>
                                <path data-name="Path 147511" d="m391.375 7.5.859 11.473H384.5L386.219 7.5z"
                                    transform="translate(-349.102 -6.855)" style="fill:#edcb61" />
                                <path data-name="Path 147512"
                                    d="M388.594 12.022 386.876.549a.645.645 0 0 0-.638-.549h-6.875a.644.644 0 0 0-.637.549l-1.719 11.473a.644.644 0 0 0 .637.74h1.934v7.262a.645.645 0 1 0 1.289 0v-7.262h1.289v29.949h-2.793a.645.645 0 0 0 0 1.289h6.875a.645.645 0 0 0 0-1.289h-2.793V12.762h4.512a.644.644 0 0 0 .637-.74zm-10.2-.549 1.526-10.184h5.765l1.526 10.184z"
                                    transform="translate(-341.602)"
                                    style="stroke-width:.3px;stroke:#333a60;fill:#333a60" />
                                <path data-name="Path 147514"
                                    d="M32.184 146.289a4.067 4.067 0 0 0-2.793 1.108v-10.174A3.226 3.226 0 0 0 26.168 134H8.379a3.226 3.226 0 0 0-3.223 3.223V147.4a4.067 4.067 0 0 0-2.793-1.108 2.363 2.363 0 0 0-.645 4.637v14.911a.645.645 0 0 0 .645.645H5.8a.645.645 0 0 0 .645-.645v-1.934H28.1v1.934a.645.645 0 0 0 .645.645h3.438a.645.645 0 0 0 .645-.645v-14.914a2.363 2.363 0 0 0-.645-4.637zm-23.8-11h17.784a1.936 1.936 0 0 1 1.934 1.934v13.15a3.206 3.206 0 0 0-1.934-.646H8.379a3.206 3.206 0 0 0-1.934.646v-13.15a1.936 1.936 0 0 1 1.934-1.934zm-7.09 13.363a1.075 1.075 0 0 1 1.074-1.074 2.8 2.8 0 0 1 2.793 2.793v12.246H3.008v-12.246a.645.645 0 0 0-.645-.645 1.075 1.075 0 0 1-1.074-1.074zM5.156 165.2H3.008v-1.289h2.148zm1.289-2.578v-3.872h1.934a.645.645 0 1 0 0-1.289H6.445v-4.512a1.936 1.936 0 0 1 1.934-1.934h17.789a1.936 1.936 0 0 1 1.934 1.934v4.512H10.957a.645.645 0 1 0 0 1.289H28.1v3.867zm22.946 2.578v-1.289h2.148v1.289zm2.793-15.469a.645.645 0 0 0-.645.645v12.246h-2.148v-12.251a2.8 2.8 0 0 1 2.793-2.793 1.074 1.074 0 0 1 0 2.148z"
                                    transform="translate(0 -122.484)"
                                    style="stroke-width:.1px;stroke:#333a60;fill:#333a60" />
                                <circle data-name="Ellipse 3043" cx=".645" cy=".645" r=".645"
                                    transform="translate(22.365 16.758)" style="fill:#333a60" />
                                <circle data-name="Ellipse 3044" cx=".645" cy=".645" r=".645"
                                    transform="translate(16.629 16.758)" style="fill:#333a60" />
                                <circle data-name="Ellipse 3045" cx=".645" cy=".645" r=".645"
                                    transform="translate(10.893 16.758)" style="fill:#333a60" />
                                <circle data-name="Ellipse 3046" cx=".645" cy=".645" r=".645"
                                    transform="translate(22.365 22)" style="fill:#333a60" />
                                <circle data-name="Ellipse 3047" cx=".645" cy=".645" r=".645"
                                    transform="translate(16.629 22)" style="fill:#333a60" />
                                <circle data-name="Ellipse 3048" cx=".645" cy=".645" r=".645"
                                    transform="translate(10.893 22)" style="fill:#333a60" />
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Home Decor</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 28 28">
                        <g id="Education" transform="translate(-23 -359)">
                            <rect id="Rectangle_8759" data-name="Rectangle 8759" width="28" height="28"
                                transform="translate(23 359)" fill="#e5e5e5" opacity="0" />
                            <g id="graduation-cap" transform="translate(25.14 322.18)">
                                <g id="Layer_2_1_" transform="translate(0.523 42.122)">
                                    <g id="Group_15123" data-name="Group 15123" transform="translate(0 0)">
                                        <path id="Path_14357" data-name="Path 14357"
                                            d="M20.4,58.789l10.077-4.861s.095-1.059-.813-1.287S20.4,48.2,20.4,48.2a5.666,5.666,0,0,0-2.506,0L8.167,52.835s-.542.644-.251,1.093l10.369,4.861A5.68,5.68,0,0,0,20.4,58.789Z"
                                            transform="translate(-7.828 -48.041)" fill="#5effbd" />
                                        <path id="Path_14358" data-name="Path 14358"
                                            d="M71.948,166.038l2.648-.771L79.1,162.9v5.7s-1.28,3.185-7.407,3.527c0,0-3.527.483-7.5-3.332l.143-5.886Z"
                                            transform="translate(-60.419 -155.017)" fill="#5effbd" />
                                        <g id="Group_15121" data-name="Group 15121" transform="translate(3.829 7.883)">
                                            <path id="Path_14359" data-name="Path 14359"
                                                d="M65.869,163.577v6.543L64.3,168.793l.141-5.893Z"
                                                transform="translate(-64.3 -162.9)" fill="#48e4a4" />
                                        </g>
                                        <g id="Group_15122" data-name="Group 15122">
                                            <path id="Path_14360" data-name="Path 14360"
                                                d="M20.2,48.657l-9.762,4.418a.438.438,0,0,0,0,.8L20.2,58.291l-.556.55-2.32-.329L8.35,54.161l-.55-.684.845-.912,9.507-4.492,1.3-.074.751.657"
                                                transform="translate(-7.8 -48)" fill="#48e4a4" />
                                        </g>
                                    </g>
                                </g>
                                <g id="Capa_1" transform="translate(0 41.7)">
                                    <path id="Path_14361" data-name="Path 14361"
                                        d="M2.491,53.368v-3.86l1.435.711v5.634a.437.437,0,0,0,.081.244,9.833,9.833,0,0,0,7.8,3.6,9.777,9.777,0,0,0,7.771-3.6.437.437,0,0,0,.081-.244V50.246l3.2-1.571a1.162,1.162,0,0,0,.785-1.029,1.211,1.211,0,0,0-.785-1.036L13.431,42a3.858,3.858,0,0,0-3.006,0l-9.64,4.6A1.162,1.162,0,0,0,0,47.646c0,.244.108.677.785,1.029l.785.379v4.321Zm16.3,2.343a9.054,9.054,0,0,1-6.986,3.142A9.054,9.054,0,0,1,4.82,55.711v-5.12l5.605,2.682a3.651,3.651,0,0,0,1.489.3,3.3,3.3,0,0,0,1.516-.325l5.361-2.628Zm3.683-7.795-9.423,4.6a3.005,3.005,0,0,1-2.275,0l-7.23-3.474,8.313-.975a.422.422,0,0,0-.081-.84L2.139,48.37l-.975-.46a.546.546,0,0,1-.3-.244c0-.027.054-.135.3-.244L10.8,42.79a2.8,2.8,0,0,1,1.11-.217,2.744,2.744,0,0,1,1.137.217l9.423,4.6c.244.108.3.217.3.271A.788.788,0,0,1,22.475,47.917Z"
                                        transform="translate(0 -41.7)" fill="#333a60" />
                                    <path id="Path_14362" data-name="Path 14362"
                                        d="M6.936,207a1.636,1.636,0,1,0,1.636,1.636A1.634,1.634,0,0,0,6.936,207Z"
                                        transform="translate(-4.945 -195.781)" fill="#333a60" />
                                    <circle id="Ellipse_967" data-name="Ellipse 967" cx="0.932" cy="0.932" r="0.932"
                                        transform="translate(1.059 11.939)" fill="#ffd064" />
                                    <path id="Path_14363" data-name="Path 14363"
                                        d="M29.7,219.537a.918.918,0,1,0,0-1.837l.013.013a1.365,1.365,0,0,1-.013,1.857h0"
                                        transform="translate(-27.709 -205.767)" fill="#f2ab08" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Education</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Rent_Hire" data-name="Rent &amp; Hire" width="50"
                        height="50" viewBox="0 0 28 28">
                        <path id="Rectangle_91" data-name="Rectangle 91" d="M0,0H28V28H0Z" fill="none" />
                        <g id="Filledotuline" transform="translate(-11.5 -23.511)">
                            <path id="Path_14315" data-name="Path 14315"
                                d="M251.58,152v2.506l-.716.716.716.716-.716.716.716.716-.716.716.716.716v1.074l-1.79,1.074L248,159.877V152Z"
                                transform="translate(-221.617 -119.525)" fill="#e4e4e3" />
                            <path id="Path_14316" data-name="Path 14316"
                                d="M216,37.041v2.529a.889.889,0,0,0,.461.783l2.327,1.293a.883.883,0,0,0,.868,0l2.327-1.293a.9.9,0,0,0,.461-.783V37.041a.889.889,0,0,0-.461-.783l-2.327-1.293a.883.883,0,0,0-.868,0l-2.327,1.293a.889.889,0,0,0-.461.783Z"
                                transform="translate(-191.049 -7.618)" fill="#0093b9" />
                            <circle id="Ellipse_965" data-name="Ellipse 965" cx="0.716" cy="0.716" r="0.716"
                                transform="translate(27.457 28.894)" fill="#f3f2f2" />
                            <path id="Path_14317" data-name="Path 14317"
                                d="M89.432,360H90.7a8.008,8.008,0,0,1,3.58.846,2.138,2.138,0,0,0,.971.228h2.775a.9.9,0,1,1,0,1.79H98a1.848,1.848,0,0,0,.729-.148l2.994-1.271a.941.941,0,0,1,1.231.506.064.064,0,0,1,.009.027.969.969,0,0,1-.542,1.258h0l-5.531,2.108a5.85,5.85,0,0,1-4.292-.049l-3.164-1.311L88,363.938V360Z"
                                transform="translate(-68.778 -318.217)" fill="#f8caa8" />
                            <path id="Path_14318" data-name="Path 14318" d="M16,352h4.654v5.012H16Z"
                                transform="translate(0 -310.575)" fill="#0093b9" />
                            <path id="Path_14319" data-name="Path 14319"
                                d="M208.549,33.043l.788.439v6.87a.366.366,0,0,0,.175.309l1.79,1.074a.36.36,0,0,0,.367,0l1.79-1.074a.355.355,0,0,0,.175-.309V39.277a.362.362,0,0,0-.1-.255l-.465-.461.461-.461a.359.359,0,0,0,0-.506h0l-.461-.465.461-.461a.359.359,0,0,0,0-.506h0l-.461-.465.461-.461a.355.355,0,0,0,.1-.255v-1.5l.788-.439a1.25,1.25,0,0,0,.644-1.1V29.423a1.255,1.255,0,0,0-.644-1.1l-2.327-1.293a1.253,1.253,0,0,0-1.217,0l-2.327,1.293a1.25,1.25,0,0,0-.644,1.1v2.529a1.262,1.262,0,0,0,.649,1.092Zm4.368,1.79-.6.6a.375.375,0,0,0-.009.515h0l.461.461-.461.461a.359.359,0,0,0,0,.506h0l.461.461-.461.461a.359.359,0,0,0,0,.506h0l.613.613v.725L211.485,41l-1.432-.859V33.88l.716.4v3.567a.359.359,0,0,0,.358.358h0a.359.359,0,0,0,.358-.358V34.493a1.258,1.258,0,0,0,.609-.157l.823-.456Zm-4.3-5.411a.537.537,0,0,1,.277-.47l2.327-1.293a.544.544,0,0,1,.524,0l2.327,1.293a.537.537,0,0,1,.277.47v2.529a.537.537,0,0,1-.277.47l-2.327,1.293a.544.544,0,0,1-.524,0L208.9,32.421a.537.537,0,0,1-.277-.47Z"
                                transform="translate(-183.312 0)" fill="#193651" />
                            <path id="Path_14320" data-name="Path 14320"
                                d="M265.074,66.148A1.074,1.074,0,1,0,264,65.074,1.071,1.071,0,0,0,265.074,66.148Zm0-1.432a.358.358,0,1,1-.358.358A.359.359,0,0,1,265.074,64.716Z"
                                transform="translate(-236.901 -35.464)" fill="#193651" />
                            <path id="Path_14321" data-name="Path 14321"
                                d="M264.358,128h1.432a.359.359,0,0,1,.358.358h0a.359.359,0,0,1-.358.358h-1.432a.359.359,0,0,1-.358-.358h0A.359.359,0,0,1,264.358,128Z"
                                transform="translate(-236.901 -96.599)" fill="#193651" />
                            <path id="Path_14323" data-name="Path 14323"
                                d="M34.523,346.655a1.3,1.3,0,0,0-1.714-.729l-2.314.985a1.252,1.252,0,0,0-1.119-1.374,1.22,1.22,0,0,0-.13,0H26.468a1.813,1.813,0,0,1-.81-.192,8.42,8.42,0,0,0-3.741-.882h-.9a.359.359,0,0,0-.358-.358h-4.3a.354.354,0,0,0-.354.354h0v5.012h0a.354.354,0,0,0,.354.354h4.3a.359.359,0,0,0,.358-.358v-.134l2.672,1.11a6.187,6.187,0,0,0,4.556.049l5.531-2.108a1.329,1.329,0,0,0,.752-1.723Zm-17.807,2.452a.021.021,0,0,1-.022-.022v-4.252a.021.021,0,0,1,.022-.022h3.558a.03.03,0,0,1,.022.018v4.26a.03.03,0,0,1-.022.018Zm17.131-1.714h0a.592.592,0,0,1-.331.318l-5.531,2.108a5.469,5.469,0,0,1-4.028-.045l-2.945-1.222V345.17h.908a7.68,7.68,0,0,1,3.419.806,2.6,2.6,0,0,0,1.128.269h2.779a.537.537,0,0,1,.022,1.074H24.951v.716h4.3a.436.436,0,0,0,.076,0,2.214,2.214,0,0,0,.774-.175l2.994-1.271a.556.556,0,0,1,.448,0,.6.6,0,0,1,.322.331A.634.634,0,0,1,33.847,347.394Z"
                                transform="translate(0 -303.028)" fill="#193651" />
                            <path id="Path_14324" data-name="Path 14324"
                                d="M80.358,424h0a.359.359,0,0,1,.358.358h0a.359.359,0,0,1-.358.358h0a.359.359,0,0,1-.358-.358h0A.359.359,0,0,1,80.358,424Z"
                                transform="translate(-61.136 -379.352)" fill="#193651" />
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Rent & Hire</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #fff;
                                }

                                .cls-2 {
                                    fill: none;
                                }

                                .cls-3 {
                                    fill: #beb9dd;
                                }

                                .cls-10,
                                .cls-3,
                                .cls-4,
                                .cls-5,
                                .cls-6,
                                .cls-7,
                                .cls-8,
                                .cls-9 {
                                    fill-rule: evenodd;
                                }

                                .cls-4 {
                                    fill: #eb5468;
                                }

                                .cls-5 {
                                    fill: #a7a2d3;
                                }

                                .cls-6 {
                                    fill: #e5384f;
                                }

                                .cls-7 {
                                    fill: #f9f7f8;
                                }

                                .cls-8 {
                                    fill: #b1e4f9;
                                }

                                .cls-9 {
                                    fill: #75cef8;
                                }

                                .cls-10 {
                                    fill: #dddaec;
                                }
                            </style>
                        </defs>
                        <g id="i_finddoctors" transform="translate(-173 -285)">
                            <path id="Rectangle_27" data-name="Rectangle 27" class="cls-1" d="M0,0H50V50H0Z"
                                transform="translate(173 285)" />
                            <g id="Hotels" transform="translate(71)">
                                <path id="Rectangle_6234" class="cls-2" d="M0,0H50V50H0Z"
                                    transform="translate(102 285)" />
                                <g id="Group_13184" transform="translate(102 285)">
                                    <g id="daily-needs-icn">
                                        <path id="Rectangle_91" class="cls-2" d="M0,0H50V50H0Z" />
                                    </g>
                                    <path id="Rectangle_27-2" data-name="Rectangle_27" class="cls-2"
                                        d="M0,0H50V50H0Z" />
                                </g>
                                <g id="hospital" transform="translate(105.187 258.205)">
                                    <g id="Group_155892" data-name="Group 155892" transform="translate(2.21 43.191)">
                                        <path id="Path_268287" data-name="Path 268287" class="cls-3"
                                            d="M38.326,182.015V155.03l-12.378.853h-.015v26.133Z"
                                            transform="translate(-25.933 -155.03)" />
                                    </g>
                                    <g id="Group_155893" data-name="Group 155893" transform="translate(29.024 43.191)">
                                        <path id="Path_268288" data-name="Path 268288" class="cls-3"
                                            d="M353.006,155.883l-12.378-.853v26.985h12.393V155.883S353.011,155.885,353.006,155.883Z"
                                            transform="translate(-340.628 -155.03)" />
                                    </g>
                                    <g id="Group_155894" data-name="Group 155894" transform="translate(0.639 40.88)">
                                        <path id="Path_268289" data-name="Path 268289" class="cls-4"
                                            d="M7.5,129.493a1.587,1.587,0,0,0,1.571,1.582H20.606v-3.163H9.085A1.589,1.589,0,0,0,7.5,129.493Z"
                                            transform="translate(-7.5 -127.911)" />
                                    </g>
                                    <g id="Group_155895" data-name="Group 155895" transform="translate(29.881 40.881)">
                                        <path id="Path_268290" data-name="Path 268290" class="cls-4"
                                            d="M350.685,127.912v3.163h11.536a1.582,1.582,0,0,0-.015-3.163H350.685Z"
                                            transform="translate(-350.685 -127.912)" />
                                    </g>
                                    <g id="Group_155896" data-name="Group 155896" transform="translate(2.21 44.044)">
                                        <path id="Path_268291" data-name="Path 268291" class="cls-5"
                                            d="M25.933,167.013h8.8c1.267,0,1.051.659,1.051,1.938V191.17h1.682V165.037H25.933Z"
                                            transform="translate(-25.933 -165.037)" />
                                    </g>
                                    <g id="Group_155897" data-name="Group 155897" transform="translate(39.288 40.881)">
                                        <path id="Path_268292" data-name="Path 268292" class="cls-6"
                                            d="M462.667,129.494a1.587,1.587,0,0,1-1.571,1.582h2.114a1.582,1.582,0,0,0-.015-3.163h-2.114A1.588,1.588,0,0,1,462.667,129.494Z"
                                            transform="translate(-461.082 -127.912)" />
                                    </g>
                                    <g id="Group_155898" data-name="Group 155898" transform="translate(29.881 44.044)">
                                        <path id="Path_268293" data-name="Path 268293" class="cls-5"
                                            d="M362.206,165.036H350.685v1.977h8.385c.728,0,1.037-.015,1.037.782v23.374h2.114V165.036Z"
                                            transform="translate(-350.685 -165.036)" />
                                    </g>
                                    <g id="Group_155899" data-name="Group 155899" transform="translate(13.745 35.608)">
                                        <path id="Path_268294" data-name="Path 268294" class="cls-7"
                                            d="M177.451,67l-8.31-.969L161.315,67v33.6H164.7V90.862h9.373V100.6h3.382V67Z"
                                            transform="translate(-161.315 -66.028)" />
                                    </g>
                                    <g id="Group_155900" data-name="Group 155900" transform="translate(5.115 55.326)">
                                        <path id="Path_268295" data-name="Path 268295" class="cls-8"
                                            d="M60.035,297.445h5.724v3.641H60.035Z"
                                            transform="translate(-60.035 -297.445)" />
                                    </g>
                                    <g id="Group_155901" data-name="Group 155901" transform="translate(5.115 47.675)">
                                        <path id="Path_268296" data-name="Path 268296" class="cls-8"
                                            d="M60.035,207.647h5.724v3.641H60.035Z"
                                            transform="translate(-60.035 -207.647)" />
                                    </g>
                                    <g id="Group_155902" data-name="Group 155902" transform="translate(32.785 47.675)">
                                        <path id="Path_268297" data-name="Path 268297" class="cls-8"
                                            d="M384.758,207.647h5.727v3.641h-5.727Z"
                                            transform="translate(-384.758 -207.647)" />
                                    </g>
                                    <g id="Group_155903" data-name="Group 155903" transform="translate(32.785 55.326)">
                                        <path id="Path_268298" data-name="Path 268298" class="cls-8"
                                            d="M384.758,297.445h5.727v3.641h-5.727Z"
                                            transform="translate(-384.758 -297.445)" />
                                    </g>
                                    <g id="Group_155904" data-name="Group 155904" transform="translate(32.785 62.98)">
                                        <path id="Path_268299" data-name="Path 268299" class="cls-8"
                                            d="M384.758,387.272h5.727v3.638h-5.727Z"
                                            transform="translate(-384.758 -387.272)" />
                                    </g>
                                    <g id="Group_155905" data-name="Group 155905" transform="translate(5.115 62.98)">
                                        <path id="Path_268300" data-name="Path 268300" class="cls-8"
                                            d="M60.035,387.272h5.724v3.638H60.035Z"
                                            transform="translate(-60.035 -387.272)" />
                                    </g>
                                    <g id="Group_155906" data-name="Group 155906" transform="translate(5.115 47.675)">
                                        <path id="Path_268301" data-name="Path 268301" class="cls-9"
                                            d="M60.035,207.647h5.724v1.347H60.035Z"
                                            transform="translate(-60.035 -207.647)" />
                                    </g>
                                    <g id="Group_155907" data-name="Group 155907" transform="translate(5.115 55.326)">
                                        <path id="Path_268302" data-name="Path 268302" class="cls-9"
                                            d="M60.035,297.445h5.724v1.347H60.035Z"
                                            transform="translate(-60.035 -297.445)" />
                                    </g>
                                    <g id="Group_155908" data-name="Group 155908" transform="translate(5.115 62.98)">
                                        <path id="Path_268303" data-name="Path 268303" class="cls-9"
                                            d="M60.035,387.272h5.724v1.344H60.035Z"
                                            transform="translate(-60.035 -387.272)" />
                                    </g>
                                    <g id="Group_155909" data-name="Group 155909" transform="translate(32.785 62.98)">
                                        <path id="Path_268304" data-name="Path 268304" class="cls-9"
                                            d="M384.758,387.272h5.727v1.344h-5.727Z"
                                            transform="translate(-384.758 -387.272)" />
                                    </g>
                                    <g id="Group_155910" data-name="Group 155910" transform="translate(32.785 55.326)">
                                        <path id="Path_268305" data-name="Path 268305" class="cls-9"
                                            d="M384.758,297.445h5.727v1.347h-5.727Z"
                                            transform="translate(-384.758 -297.445)" />
                                    </g>
                                    <g id="Group_155911" data-name="Group 155911" transform="translate(32.785 47.675)">
                                        <path id="Path_268306" data-name="Path 268306" class="cls-9"
                                            d="M384.758,207.647h5.727v1.347h-5.727Z"
                                            transform="translate(-384.758 -207.647)" />
                                    </g>
                                    <g id="Group_155912" data-name="Group 155912" transform="translate(13.745 36.576)">
                                        <path id="Path_268307" data-name="Path 268307" class="cls-10"
                                            d="M161.315,79.35h12.254c1.19,0,1.578-.119,1.578,1.141V111h2.3V77.4H161.315Z"
                                            transform="translate(-161.315 -77.398)" />
                                    </g>
                                    <g id="Group_155913" data-name="Group 155913" transform="translate(12.063 40.881)">
                                        <path id="Path_268308" data-name="Path 268308" class="cls-6"
                                            d="M141.572,127.912v3.163h1.682v-3.163Z"
                                            transform="translate(-141.572 -127.912)" />
                                    </g>
                                    <g id="Group_155914" data-name="Group 155914" transform="translate(11.33 33.413)">
                                        <path id="Path_268309" data-name="Path 268309" class="cls-4"
                                            d="M152.109,40.274H134.553a1.582,1.582,0,1,0,0,3.163h17.556a1.582,1.582,0,1,0,0-3.163Z"
                                            transform="translate(-132.968 -40.274)" />
                                    </g>
                                    <g id="Group_155915" data-name="Group 155915" transform="translate(28.167 33.413)">
                                        <path id="Path_268310" data-name="Path 268310" class="cls-6"
                                            d="M330.571,40.274a1.582,1.582,0,1,1,0,3.163h2.3a1.582,1.582,0,1,0,0-3.163Z"
                                            transform="translate(-330.571 -40.274)" />
                                    </g>
                                    <g id="Group_155916" data-name="Group 155916" transform="translate(17.127 60.442)">
                                        <path id="Path_268311" data-name="Path 268311" class="cls-8"
                                            d="M201,357.482h4.685v9.735H201Z"
                                            transform="translate(-201.001 -357.482)" />
                                    </g>
                                    <g id="Group_155917" data-name="Group 155917" transform="translate(21.812 60.442)">
                                        <path id="Path_268312" data-name="Path 268312" class="cls-8"
                                            d="M255.986,357.482h4.688v9.735h-4.688Z"
                                            transform="translate(-255.986 -357.482)" />
                                    </g>
                                    <g id="Group_155918" data-name="Group 155918" transform="translate(17.127 60.442)">
                                        <path id="Path_268313" data-name="Path 268313" class="cls-9"
                                            d="M201,358.792h4.685v-1.31H201Z"
                                            transform="translate(-201.001 -357.482)" />
                                    </g>
                                    <g id="Group_155919" data-name="Group 155919" transform="translate(21.812 60.442)">
                                        <path id="Path_268314" data-name="Path 268314" class="cls-9"
                                            d="M255.986,357.482v1.31h2.743c.755,0,.6.223.6,1.017v7.407h1.347v-9.735Z"
                                            transform="translate(-255.986 -357.482)" />
                                    </g>
                                    <g id="Group_155920" data-name="Group 155920" transform="translate(17.591 40.97)">
                                        <path id="Path_268315" data-name="Path 268315" class="cls-4"
                                            d="M211.987,128.963h-2.646a.23.23,0,0,0-.228.23v2.434h-2.44a.23.23,0,0,0-.231.23v2.64a.228.228,0,0,0,.231.228h2.44v2.437a.228.228,0,0,0,.228.228h2.646a.23.23,0,0,0,.231-.228v-2.437h2.44a.23.23,0,0,0,.231-.228v-2.64a.232.232,0,0,0-.231-.23h-2.44v-2.434A.232.232,0,0,0,211.987,128.963Z"
                                            transform="translate(-206.442 -128.963)" />
                                    </g>
                                    <g id="Group_155921" data-name="Group 155921" transform="translate(20.659 40.97)">
                                        <path id="Path_268316" data-name="Path 268316" class="cls-6"
                                            d="M244.929,128.963H243a9.425,9.425,0,0,1,.709,3.728,8.218,8.218,0,0,1-1.26,4.7h2.476a.23.23,0,0,0,.231-.228v-2.437h2.44a.23.23,0,0,0,.231-.228v-2.64a.232.232,0,0,0-.231-.23h-2.44v-2.434A.232.232,0,0,0,244.929,128.963Z"
                                            transform="translate(-242.453 -128.963)" />
                                    </g>
                                    <g id="Group_155922" data-name="Group 155922" transform="translate(0 32.774)">
                                        <path id="Path_268317" data-name="Path 268317"
                                            d="M384.264,290.584a.639.639,0,0,0-.639-.639H377.9a.639.639,0,0,0-.639.639v3.641a.639.639,0,0,0,.639.639h5.726a.639.639,0,0,0,.639-.639Zm-1.278,3h-4.448v-2.362h4.448Z"
                                            transform="translate(-345.113 -268.032)" />
                                        <path id="Path_268318" data-name="Path 268318"
                                            d="M383.625,379.772H377.9a.639.639,0,0,0-.639.639v3.638a.639.639,0,0,0,.639.639h5.726a.639.639,0,0,0,.639-.639v-3.638A.639.639,0,0,0,383.625,379.772Zm-.639,3.638h-4.448v-2.36h4.448Z"
                                            transform="translate(-345.113 -350.205)" />
                                        <path id="Path_268319" data-name="Path 268319"
                                            d="M43.627,42.462A2.225,2.225,0,0,0,41.4,40.241H30.52V37.214a2.22,2.22,0,0,0-.049-4.44H12.915a2.221,2.221,0,1,0,0,4.441h.191v3.026H2.224a2.22,2.22,0,0,0-.654,4.343V70.176a.639.639,0,0,0,.639.639H41.417a.639.639,0,0,0,.639-.639V58.184a.639.639,0,0,0-1.278,0V69.537H30.52V44.683H40.778V55.224a.639.639,0,0,0,1.278,0V44.585A2.225,2.225,0,0,0,43.627,42.462ZM11.969,34.995a.945.945,0,0,1,.946-.943H30.471a.943.943,0,1,1,0,1.885H12.915a.945.945,0,0,1-.946-.943ZM1.278,42.462a.945.945,0,0,1,.946-.943H13.106V43.4H2.224a.946.946,0,0,1-.946-.943Zm1.571,2.221H13.106V69.537H2.849Zm11.536-7.467H29.242V69.537h-2.1v-9.1A.639.639,0,0,0,26.5,59.8H17.127a.639.639,0,0,0-.639.639v9.1h-2.1Zm8.067,23.865h3.41v8.456h-3.41Zm-1.278,8.457H17.766V61.081h3.407ZM41.4,43.4H30.52V41.52H41.4a.943.943,0,1,1,0,1.885Z"
                                            transform="translate(0 -32.774)" />
                                        <path id="Path_268320" data-name="Path 268320"
                                            d="M58.9,200.147H53.174a.639.639,0,0,0-.639.639v3.641a.639.639,0,0,0,.639.639H58.9a.639.639,0,0,0,.639-.639v-3.641A.639.639,0,0,0,58.9,200.147Zm-.639,3.641H53.813v-2.362h4.446Z"
                                            transform="translate(-48.059 -185.885)" />
                                        <path id="Path_268321" data-name="Path 268321"
                                            d="M58.9,289.945H53.174a.639.639,0,0,0-.639.639v3.641a.639.639,0,0,0,.639.639H58.9a.639.639,0,0,0,.639-.639v-3.641A.639.639,0,0,0,58.9,289.945Zm-.639,3.641H53.813v-2.362h4.446Z"
                                            transform="translate(-48.059 -268.032)" />
                                        <path id="Path_268322" data-name="Path 268322"
                                            d="M58.9,379.772H53.174a.639.639,0,0,0-.639.639v3.638a.639.639,0,0,0,.639.639H58.9a.639.639,0,0,0,.639-.639v-3.638A.639.639,0,0,0,58.9,379.772Zm-.639,3.638H53.813v-2.36h4.446Z"
                                            transform="translate(-48.059 -350.205)" />
                                        <path id="Path_268323" data-name="Path 268323"
                                            d="M384.264,200.786a.639.639,0,0,0-.639-.639H377.9a.639.639,0,0,0-.639.639v3.641a.639.639,0,0,0,.639.639h5.726a.639.639,0,0,0,.639-.639Zm-1.278,3h-4.448v-2.362h4.448Z"
                                            transform="translate(-345.113 -185.885)" />
                                        <path id="Path_268324" data-name="Path 268324"
                                            d="M199.812,128.5h1.8v1.8a.868.868,0,0,0,.867.867h2.646a.869.869,0,0,0,.87-.867v-1.8h1.8a.869.869,0,0,0,.87-.867V125a.87.87,0,0,0-.87-.869H206v-1.8a.87.87,0,0,0-.87-.869H202.48a.869.869,0,0,0-.867.869v1.8h-1.8a.87.87,0,0,0-.87.869v2.64A.869.869,0,0,0,199.812,128.5Zm.408-3.1h2.031a.639.639,0,0,0,.639-.639v-2.025h1.827v2.025a.639.639,0,0,0,.639.639h2.031v1.82h-2.031a.639.639,0,0,0-.639.639v2.025H202.89v-2.025a.639.639,0,0,0-.639-.639H200.22Z"
                                            transform="translate(-181.991 -113.907)" />
                                        <path id="Path_268325" data-name="Path 268325"
                                            d="M222.845,259.075h-5.4a.639.639,0,0,0,0,1.278h5.4a.639.639,0,1,0,0-1.278Z"
                                            transform="translate(-198.331 -239.792)" />
                                        <path id="Path_268326" data-name="Path 268326"
                                            d="M222.845,294.494h-5.4a.639.639,0,0,0,0,1.278h5.4a.639.639,0,1,0,0-1.278Z"
                                            transform="translate(-198.331 -272.193)" />
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">hospitals</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                        <path data-name="Rectangle 73074" style="fill:#fff" d="M0 0h50v50H0z" />
                        <path data-name="Path 147536"
                            d="M30.706 40h-2.971l-1.485 5.2-2.168-1.735.272 2.316.8 6.847-.39 2.972h8.913V40.8a5.831 5.831 0 0 0-2.971-.8z"
                            transform="translate(-4.681 -8.776)" style="fill:#d1e7f8" />
                        <path data-name="Path 147537"
                            d="M28.282 14.884h-.743v-.743a9.649 9.649 0 0 0-5.2-8.56 9.507 9.507 0 0 0-2.229-.835v-.26A1.485 1.485 0 0 0 18.627 3h-1.486a1.485 1.485 0 0 0-1.485 1.485v.26a9.656 9.656 0 0 0-7.427 9.4v.743h-.744a1.485 1.485 0 1 0 0 2.971h20.8a1.485 1.485 0 0 0 0-2.971z"
                            transform="translate(-.029 .743)" style="fill:#ffcd00" />
                        <path data-name="Path 147538"
                            d="M32.141 14.884H31.4v-.743a9.649 9.649 0 0 0-5.2-8.56 9.507 9.507 0 0 0-2.229-.835v-.26A1.485 1.485 0 0 0 22.485 3H21a1.485 1.485 0 0 1 1.485 1.485v.26a9.507 9.507 0 0 1 2.228.835 9.649 9.649 0 0 1 5.2 8.561v.743h.743a1.485 1.485 0 0 1 0 2.971h1.485a1.485 1.485 0 1 0 0-2.971z"
                            transform="translate(-3.888 .743)" style="fill:#ddb200" />
                        <path data-name="Path 147539" d="m23.546 43.464 2.168 1.736L27.2 40h-2.229L22 42.228z"
                            transform="translate(-4.145 -8.776)" style="fill:#57a4ff" />
                        <path data-name="Path 147540"
                            d="m19.825 44.236-.272 2.316 1.817.9 1.817-.9-.272-2.316L21.37 43z"
                            transform="translate(-3.516 -9.548)" style="fill:#ed5575" />
                        <path data-name="Path 147541"
                            d="m15.295 45.78.272-2.316L13.4 45.2 11.913 40H8.942A5.942 5.942 0 0 0 3 45.942V55.6h11.884l-.391-2.987z"
                            transform="translate(.743 -8.776)" style="fill:#d1e7f8" />
                        <path data-name="Path 147542"
                            d="m22.91 47.782-1.817.9-1.817-.9-.8 6.83.391 2.987h4.456l.393-2.975z"
                            transform="translate(-3.238 -10.778)" style="fill:#ed5575" />
                        <path data-name="Path 147543" d="m18.654 43.464 1.546-1.236L17.228 40H15l1.485 5.2z"
                            transform="translate(-2.344 -8.776)" style="fill:#57a4ff" />
                        <path data-name="Path 147544"
                            d="M23.942 39.013v-2.851a7.407 7.407 0 0 1-5.927.007c0 1.574-.015 2.843-.015 2.843l2.971 2.228z"
                            transform="translate(-3.116 -7.788)" style="fill:#ffd39f" />
                        <path data-name="Path 147545" d="M9 23v.743a2.228 2.228 0 0 0 2.228 2.228V23z"
                            transform="translate(-.801 -4.402)" style="fill:#ffd39f" />
                        <path data-name="Path 147546" d="M32 25.971a2.228 2.228 0 0 0 2.228-2.228V23H32z"
                            transform="translate(-6.718 -4.402)" style="fill:#ffd39f" />
                        <path data-name="Path 147547" d="M12 23v2.971a7.427 7.427 0 0 0 14.855 0V23z"
                            transform="translate(-1.573 -4.402)" style="fill:#ffd39f" />
                        <path data-name="Path 147548" d="M50.369 33.456V29H37v23.768h17.826V33.456z"
                            transform="translate(-8.004 -5.946)" style="fill:#ffdaaa" />
                        <path data-name="Path 147549" d="M55.913 35v10.4A8.913 8.913 0 0 1 47 54.311h10.4V35z"
                            transform="translate(-10.577 -7.49)" style="fill:#ffc477" />
                        <path data-name="Path 147550" d="M55 29v4.456h4.456v-.034L55.129 29z"
                            transform="translate(-12.635 -5.946)" style="fill:#ed5575" />
                        <g data-name="Group 145842">
                            <path data-name="Path 147552"
                                d="M12.743 18.971h5.2a.743.743 0 0 0 .743-.743v-.743h1.484v.743a.743.743 0 0 0 .743.743h5.2a.743.743 0 0 0 0-1.485h-4.457v-.743a.743.743 0 0 0-.743-.743h-2.971a.743.743 0 0 0-.743.743v.743h-4.456a.743.743 0 1 0 0 1.485z"
                                transform="translate(-1.573 -2.602)" style="fill:#333a60" />
                            <path data-name="Path 147553"
                                d="m46.349 25.953-4.323-4.419a.759.759 0 0 0-.535-.223H28a.743.743 0 0 0-.743.743v7.821a6.67 6.67 0 0 0-2.228-.394h-4.46V27.84A8.194 8.194 0 0 0 25 21.215a2.971 2.971 0 0 0 2.258-2.874 2.228 2.228 0 1 0 0-4.456A10.35 10.35 0 0 0 19.8 3.916 2.228 2.228 0 0 0 17.6 2h-1.488a2.228 2.228 0 0 0-2.2 1.916 10.35 10.35 0 0 0-7.457 9.968 2.228 2.228 0 1 0 0 4.456 2.971 2.971 0 0 0 2.258 2.874 8.17 8.17 0 0 0 4.442 6.625c0 .646-.007 1.226-.007 1.641H8.685A6.7 6.7 0 0 0 2 36.166v9.656a.743.743 0 0 0 .743.743h43.079a.743.743 0 0 0 .743-.743V26.473a.731.731 0 0 0-.216-.52zm-21.324-6.328V18.34h.743a1.474 1.474 0 0 1-.743 1.285zm-16.34 0a1.474 1.474 0 0 1-.743-1.285h.743zm-2.228-2.77a.743.743 0 1 1 0-1.485.743.743 0 0 0 1.485 0v-1.486a8.87 8.87 0 0 1 3.714-7.242v2.043a.743.743 0 1 0 1.485 0v-2.9c.245-.111.49-.208.743-.3v4.685a.743.743 0 0 0 1.485 0V4.228a.743.743 0 0 1 .743-.743H17.6a.743.743 0 0 1 .743.743v5.942a.743.743 0 0 0 1.485 0V5.483c.253.089.5.186.743.3v2.9a.743.743 0 1 0 1.485 0V6.642a8.87 8.87 0 0 1 3.714 7.242v1.485a.743.743 0 1 0 1.485 0 .743.743 0 1 1 0 1.485zm3.714 3.714V18.34h13.368v2.228a6.685 6.685 0 0 1-13.369 0zm6.685 10.955-2.221-1.671c0-.319 0-.817.007-1.426a8.088 8.088 0 0 0 2.213.312 7.924 7.924 0 0 0 2.23-.32v1.434zm1.018 4.048-1.018.505-1.018-.505.171-1.493.847-.676.847.676zm-3.573.371a.027.027 0 0 0-.007.022l-.794 6.782a.776.776 0 0 0 0 .186l.282 2.147H9.427v-5.2a.743.743 0 0 0-1.485 0v5.2H3.485v-8.914a5.205 5.205 0 0 1 5.2-5.2H11.1l1.33 4.657A.743.743 0 0 0 13.6 36l.758-.6zm.542-2.83-1.293 1.033-.906-3.179h1l2.005 1.508-.78.616zm3.587 11.966h-3.15l-.3-2.251.668-5.689.869.438a.79.79 0 0 0 .668 0l.869-.438.668 5.7zm.416-11.988-.78-.616 2.005-1.508h1l-.906 3.179-1.292-1.032zm8.408 11.988h-1.486v-5.2a.743.743 0 1 0-1.485 0v5.2H19.93l.282-2.132a.775.775 0 0 0 0-.186l-.795-6.8a.027.027 0 0 0-.007-.022l-.06-.539.758.6a.758.758 0 0 0 .46.163.778.778 0 0 0 .223-.037.729.729 0 0 0 .49-.505l1.33-4.657h2.414a5.212 5.212 0 0 1 2.228.512zM42.108 23.74l1.983 2.028h-1.983zm2.971 21.339h-16.34V22.8h11.884v3.71a.743.743 0 0 0 .743.743h3.714z"
                                transform="translate(1 1)" style="fill:#333a60" />
                            <path data-name="Path 147554"
                                d="M41.485 38h-.743a.743.743 0 0 0 0 1.485h.743a.743.743 0 1 0 0-1.485z"
                                transform="translate(-8.776 -8.261)" style="fill:#333a60" />
                            <path data-name="Path 147555"
                                d="M53.913 38h-8.17a.743.743 0 1 0 0 1.485h8.17a.743.743 0 1 0 0-1.485z"
                                transform="translate(-10.062 -8.261)" style="fill:#333a60" />
                            <path data-name="Path 147556"
                                d="M41.485 42h-.743a.743.743 0 1 0 0 1.485h.743a.743.743 0 1 0 0-1.485z"
                                transform="translate(-8.776 -9.29)" style="fill:#333a60" />
                            <path data-name="Path 147557"
                                d="M53.913 42h-8.17a.743.743 0 1 0 0 1.485h8.17a.743.743 0 1 0 0-1.485z"
                                transform="translate(-10.062 -9.29)" style="fill:#333a60" />
                            <path data-name="Path 147558"
                                d="M41.485 46h-.743a.743.743 0 0 0 0 1.485h.743a.743.743 0 1 0 0-1.485z"
                                transform="translate(-8.776 -10.319)" style="fill:#333a60" />
                            <path data-name="Path 147559"
                                d="M53.913 46h-8.17a.743.743 0 1 0 0 1.485h8.17a.743.743 0 1 0 0-1.485z"
                                transform="translate(-10.062 -10.319)" style="fill:#333a60" />
                            <path data-name="Path 147560"
                                d="M41.485 50h-.743a.743.743 0 1 0 0 1.485h.743a.743.743 0 1 0 0-1.485z"
                                transform="translate(-8.776 -11.348)" style="fill:#333a60" />
                            <path data-name="Path 147561"
                                d="M53.913 50h-8.17a.743.743 0 1 0 0 1.485h8.17a.743.743 0 1 0 0-1.485z"
                                transform="translate(-10.062 -11.348)" style="fill:#333a60" />
                            <path data-name="Path 147562"
                                d="M41.485 54h-.743a.743.743 0 0 0 0 1.485h.743a.743.743 0 0 0 0-1.485z"
                                transform="translate(-8.776 -12.377)" style="fill:#333a60" />
                            <path data-name="Path 147563"
                                d="M53.913 54h-8.17a.743.743 0 1 0 0 1.485h8.17a.743.743 0 1 0 0-1.485z"
                                transform="translate(-10.062 -12.377)" style="fill:#333a60" />
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Contractors</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                        <path data-name="Rectangle 27" d="M0 0h50v50H0z" style="fill:#fff" />
                        <path d="M0 0h50v50H0z" style="fill:none" />
                        <path d="M0 0h50v50H0z" style="fill:none" />
                        <path data-name="Rectangle_27" d="M0 0h50v50H0z" style="fill:none" />
                        <g>
                            <g data-name="Group 15226">
                                <path data-name="Path 14833"
                                    d="m61.569 87.478 16.284 13.386v19.693H44v-19.693l16.284-13.386a1.021 1.021 0 0 1 1.285 0z"
                                    transform="translate(-36.775 -76.569)" style="fill:#efedef" />
                            </g>
                            <g data-name="Group 15227">
                                <path data-name="Path 14834"
                                    d="M257.1 100.795v19.693h-1.6V102.24a1.183 1.183 0 0 0-.431-.91l-16.021-13.171a.982.982 0 0 0-.248-.152l.726-.6a1.012 1.012 0 0 1 1.293 0z"
                                    transform="translate(-216.025 -76.5)" style="fill:#e5e1e5" />
                            </g>
                            <g data-name="Group 15228">
                                <path data-name="Path 14835"
                                    d="m28.267 7.739 18.87 15.837a.832.832 0 0 1 .3.631v3.911a.817.817 0 0 1-1.341.631L28.259 14.093a1.012 1.012 0 0 0-1.293 0L9.141 28.749a.821.821 0 0 1-1.341-.63v-3.912a.818.818 0 0 1 .3-.631L26.958 7.739a1.014 1.014 0 0 1 1.309 0z"
                                    transform="translate(-3.464 -3.185)" style="fill:#5f99d7" />
                            </g>
                            <g data-name="Group 15229">
                                <path data-name="Path 14836"
                                    d="M257.225 24.2v1.94a.827.827 0 0 0-.176-.2L236.63 8.793a1.1 1.1 0 0 0-.83-.247l.958-.806a1.014 1.014 0 0 1 1.309 0l18.87 15.837a.808.808 0 0 1 .288.623z"
                                    transform="translate(-213.264 -3.185)" style="fill:#3c87d0" />
                            </g>
                            <g data-name="Group 15242">
                                <g data-name="Group 15235">
                                    <g data-name="Group 15230">
                                        <path data-name="Path 14837"
                                            d="M195.743 320.754a6.941 6.941 0 0 0-2.73-2.315 4.969 4.969 0 0 0-4.965 0 7.073 7.073 0 0 0-2.73 2.315 2.82 2.82 0 0 0 .176 3.361 2.852 2.852 0 0 0 1.74.75 8.635 8.635 0 0 0 1.924-.1 7.307 7.307 0 0 1 1.908-.112 12.36 12.36 0 0 0 2.762.208 2.852 2.852 0 0 0 1.74-.75 2.822 2.822 0 0 0 .176-3.361z"
                                            transform="translate(-166.382 -288.693)" style="fill:#ac5e2e" />
                                    </g>
                                    <g data-name="Group 15233">
                                        <g data-name="Group 15231" transform="translate(15.703 24.598)">
                                            <circle data-name="Ellipse 1031" cx="2.075" cy="2.075" r="2.075"
                                                style="fill:#ac5e2e" />
                                        </g>
                                        <g data-name="Group 15232" transform="translate(28.443 24.598)">
                                            <circle data-name="Ellipse 1032" cx="2.075" cy="2.075" r="2.075"
                                                style="fill:#ac5e2e" />
                                        </g>
                                    </g>
                                    <g data-name="Group 15234" transform="translate(21.905 22.187)">
                                        <circle data-name="Ellipse 1033" cx="2.243" cy="2.243" r="2.243"
                                            style="fill:#ac5e2e" />
                                    </g>
                                </g>
                                <g data-name="Group 15241">
                                    <g data-name="Group 15236">
                                        <path data-name="Path 14838"
                                            d="M257.816 324.041a2.833 2.833 0 0 1-1.74.75 6.506 6.506 0 0 1-1.365-.024 2.679 2.679 0 0 0 1.2-.679 3.025 3.025 0 0 0 .192-3.584 7.452 7.452 0 0 0-2.914-2.475 5.975 5.975 0 0 0-.686-.327 5.048 5.048 0 0 1 2.762.655 7.074 7.074 0 0 1 2.73 2.315 2.833 2.833 0 0 1-.179 3.369z"
                                            transform="translate(-228.631 -288.62)" style="fill:#9e5528" />
                                    </g>
                                    <g data-name="Group 15239">
                                        <g data-name="Group 15237">
                                            <path data-name="Path 14839"
                                                d="M160.048 263.767a2.077 2.077 0 0 1-3.648 1.357 2.073 2.073 0 0 0 2.036-2.075 2.052 2.052 0 0 0-.5-1.349h.032a2.071 2.071 0 0 1 2.083 2.067z"
                                                transform="translate(-140.202 -237.094)" style="fill:#9e5528" />
                                        </g>
                                        <g data-name="Group 15238">
                                            <path data-name="Path 14840"
                                                d="M319.748 263.767a2.077 2.077 0 0 1-3.648 1.357 2.073 2.073 0 0 0 2.035-2.075 2.053 2.053 0 0 0-.5-1.349h.032a2.071 2.071 0 0 1 2.083 2.067z"
                                                transform="translate(-287.154 -237.094)" style="fill:#9e5528" />
                                        </g>
                                    </g>
                                    <g data-name="Group 15240">
                                        <path data-name="Path 14841"
                                            d="M239.2 233.643a2.243 2.243 0 0 1-3.9 1.517h.04a2.243 2.243 0 0 0 1.652-3.76 2.252 2.252 0 0 1 2.2 2.243z"
                                            transform="translate(-212.804 -209.213)" style="fill:#9e5528" />
                                    </g>
                                </g>
                            </g>
                            <g data-name="Group 15248">
                                <g data-name="Group 15243">
                                    <path data-name="Path 14842"
                                        d="M51.359 27.214h5.907a.358.358 0 0 0 .359-.359v-2a.358.358 0 0 0-.359-.359h-5.907a.358.358 0 0 0-.359.359v2a.368.368 0 0 0 .359.359z"
                                        transform="translate(-43.216 -18.828)" style="fill:#5f99d7" />
                                </g>
                                <g data-name="Group 15244">
                                    <path data-name="Path 14843"
                                        d="M112.192 24.859v2a.358.358 0 0 1-.359.359H110.3a.358.358 0 0 0 .359-.359v-2a.358.358 0 0 0-.359-.359h1.533a.358.358 0 0 1 .359.359z"
                                        transform="translate(-97.782 -18.828)" style="fill:#3c87d0" />
                                </g>
                                <g data-name="Group 15245">
                                    <path data-name="Path 14844" d="M66.961 63.018V58.5H62.1v8.605z"
                                        transform="translate(-53.43 -50.114)" style="fill:#c9bfc8" />
                                </g>
                                <g data-name="Group 15246">
                                    <path data-name="Path 14845" d="M103.86 58.5v4.526l-1.66 1.4V58.5z"
                                        transform="translate(-90.329 -50.114)" style="fill:#baafb9" />
                                </g>
                                <g data-name="Group 15247">
                                    <path data-name="Path 14846"
                                        d="M189.282 313.542a7.409 7.409 0 0 0-2.953-2.53 5.593 5.593 0 0 0-5.548 0 7.527 7.527 0 0 0-2.953 2.53 3.391 3.391 0 0 0 .263 4.087 3.439 3.439 0 0 0 2.1.926 9.249 9.249 0 0 0 2.059-.1 7.689 7.689 0 0 1 1.764-.112 18.8 18.8 0 0 0 2.315.24 3.738 3.738 0 0 0 2.682-.95 3.381 3.381 0 0 0 .271-4.091zm-1.11 3.249a2.241 2.241 0 0 1-1.373.575 12.062 12.062 0 0 1-2.634-.208 8.478 8.478 0 0 0-2.059.112 7.991 7.991 0 0 1-1.788.1 1.939 1.939 0 0 1-1.461-3.209 6.492 6.492 0 0 1 2.506-2.107 4.347 4.347 0 0 1 4.382 0 6.424 6.424 0 0 1 2.506 2.107 2.212 2.212 0 0 1-.08 2.634z"
                                        transform="translate(-159.411 -281.792)" style="fill:#333a60" />
                                    <path data-name="Path 14847"
                                        d="M147.948 256.774a2.674 2.674 0 1 0-2.674 2.674 2.674 2.674 0 0 0 2.674-2.674zm-2.666 1.477a1.477 1.477 0 1 1 1.477-1.477 1.479 1.479 0 0 1-1.477 1.477z"
                                        transform="translate(-127.504 -230.101)" style="fill:#333a60" />
                                    <path data-name="Path 14848"
                                        d="M304.974 259.448a2.674 2.674 0 1 0-2.674-2.674 2.674 2.674 0 0 0 2.674 2.674zm0-4.151a1.477 1.477 0 1 1-1.477 1.477 1.479 1.479 0 0 1 1.477-1.474z"
                                        transform="translate(-274.456 -230.101)" style="fill:#333a60" />
                                    <path data-name="Path 14849"
                                        d="M223.242 229.675a2.838 2.838 0 1 0-2.842-2.834 2.848 2.848 0 0 0 2.842 2.834zm0-4.486a1.644 1.644 0 1 1-1.644 1.644 1.642 1.642 0 0 1 1.644-1.644z"
                                        transform="translate(-199.094 -202.403)" style="fill:#333a60" />
                                    <path data-name="Path 14850"
                                        d="M38.14 36.113V21.825l.567.471a1.423 1.423 0 0 0 2.323-1.1v-3.913a1.416 1.416 0 0 0-.5-1.086L21.657.352a1.616 1.616 0 0 0-2.075 0L10.6 7.9V5.237a.956.956 0 0 0 .878-.95v-2a.961.961 0 0 0-.958-.958H5.828a.6.6 0 1 0 0 1.2h4.454v1.519H4.854V2.531h1.173a.6.6 0 0 0 0-1.2H4.614a.961.961 0 0 0-.958.958v2a.951.951 0 0 0 .878.95v7.741L.7 16.189a1.416 1.416 0 0 0-.5 1.086v3.911a1.415 1.415 0 0 0 .814 1.285 1.4 1.4 0 0 0 1.5-.192l.567-.471v14.3l-.016 4.742h35.091zM5.74 5.245H9.4v3.648l-3.66 3.074zm31.2 34.4H4.295v-18.81l16.061-13.2a.41.41 0 0 1 .527 0l16.061 13.2V39.65zM21.641 6.714a1.623 1.623 0 0 0-2.051 0L1.765 21.362a.23.23 0 0 1-.239.032.216.216 0 0 1-.128-.2v-3.911a.225.225 0 0 1 .08-.168L20.348 1.27a.432.432 0 0 1 .543 0l18.87 15.837a.225.225 0 0 1 .08.168v3.911a.223.223 0 0 1-.367.168z"
                                        transform="translate(3.529 3.739)" style="fill:#333a60" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">Pet Shops</a>
                </div>
                <div class="cate-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 28 28">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                }

                                .cls-2 {
                                    fill: #fec007;
                                }

                                .cls-3 {
                                    fill: #50b8ff;
                                }

                                .cls-4 {
                                    fill: #caedff;
                                }

                                .cls-5 {
                                    fill: #76c2e0;
                                }

                                .cls-6 {
                                    fill: #fe9700;
                                }

                                .cls-7 {
                                    fill: #efcdb1;
                                }

                                .cls-8 {
                                    fill: #d8ad8f;
                                }

                                .cls-9 {
                                    fill: #2195f2;
                                }

                                .cls-10 {
                                    fill: #333a60;
                                }
                            </style>
                        </defs>
                        <g id="PG_Hostels_Rooms" data-name="PG, Hostels &amp; Rooms" transform="translate(-32 -209)">
                            <g id="daily-needs-icn" transform="translate(32 209)">
                                <path id="Rectangle_91" data-name="Rectangle 91" class="cls-1" d="M0,0H28V28H0Z" />
                                <g id="bunk-bed" transform="translate(2 -28.458)">
                                    <path id="Path_16972" data-name="Path 16972" class="cls-2"
                                        d="M409.442,82.577h0a1,1,0,0,1,0-1.365l1.037-1.084a.9.9,0,0,1,1.306,0h0a1,1,0,0,1,0,1.365l-1.037,1.084A.9.9,0,0,1,409.442,82.577Z"
                                        transform="translate(-389.992 -46.016)" />
                                    <path id="Path_16973" data-name="Path 16973" class="cls-3"
                                        d="M409.442,281.379h0a1,1,0,0,1,0-1.365l1.037-1.084a.9.9,0,0,1,1.306,0h0a1,1,0,0,1,0,1.365l-1.037,1.084A.9.9,0,0,1,409.442,281.379Z"
                                        transform="translate(-389.992 -235.079)" />
                                    <rect id="Rectangle_16113" data-name="Rectangle 16113" class="cls-4" width="9.229"
                                        height="2.698" transform="translate(13.012 36.853)" />
                                    <rect id="Rectangle_16114" data-name="Rectangle 16114" class="cls-5" width="9.229"
                                        height="1.207" transform="translate(13.012 38.344)" />
                                    <path id="Path_16974" data-name="Path 16974" class="cls-2"
                                        d="M76.991,131.522v2.054H63.654v-2.054a1.171,1.171,0,0,1,1.144-1.2H75.847A1.171,1.171,0,0,1,76.991,131.522Z"
                                        transform="translate(-60.67 -94.025)" />
                                    <rect id="Rectangle_16115" data-name="Rectangle 16115" class="cls-6" width="13.337"
                                        height="1.207" transform="translate(2.984 38.344)" />
                                    <rect id="Rectangle_16116" data-name="Rectangle 16116" class="cls-7" width="21.889"
                                        height="1.472" transform="translate(1.056 39.306)" />
                                    <g id="Group_16262" data-name="Group 16262" transform="translate(1.76 39.306)">
                                        <rect id="Rectangle_16117" data-name="Rectangle 16117" class="cls-8"
                                            width="1.039" height="1.472" transform="translate(0 0)" />
                                        <rect id="Rectangle_16118" data-name="Rectangle 16118" class="cls-8"
                                            width="1.039" height="1.472" transform="translate(19.442 0)" />
                                    </g>
                                    <rect id="Rectangle_16119" data-name="Rectangle 16119" class="cls-4" width="9.229"
                                        height="2.698" transform="translate(13.012 46.582)" />
                                    <rect id="Rectangle_16120" data-name="Rectangle 16120" class="cls-5" width="9.229"
                                        height="1.207" transform="translate(13.012 48.073)" />
                                    <path id="Path_16975" data-name="Path 16975" class="cls-3"
                                        d="M76.991,330.117v2.054H63.654v-2.054a1.171,1.171,0,0,1,1.144-1.2H75.847A1.171,1.171,0,0,1,76.991,330.117Z"
                                        transform="translate(-60.67 -282.891)" />
                                    <path id="Path_16976" data-name="Path 16976" class="cls-9"
                                        d="M76.991,370.613v1.207H63.654v-1.207" transform="translate(-60.67 -322.54)" />
                                    <rect id="Rectangle_16121" data-name="Rectangle 16121" class="cls-7" width="21.889"
                                        height="1.472" transform="translate(1.056 49.035)" />
                                    <g id="Group_16263" data-name="Group 16263" transform="translate(1.76 49.035)">
                                        <rect id="Rectangle_16122" data-name="Rectangle 16122" class="cls-8"
                                            width="1.039" height="1.472" transform="translate(19.442)" />
                                        <rect id="Rectangle_16123" data-name="Rectangle 16123" class="cls-8"
                                            width="1.039" height="1.472" />
                                    </g>
                                    <g id="Group_16264" data-name="Group 16264" transform="translate(0.352 31.825)">
                                        <rect id="Rectangle_16124" data-name="Rectangle 16124" class="cls-7"
                                            width="1.408" height="21.265" transform="translate(21.889 0)" />
                                        <rect id="Rectangle_16125" data-name="Rectangle 16125" class="cls-7"
                                            width="1.408" height="21.265" transform="translate(0 0)" />
                                    </g>
                                    <path id="Path_16977" data-name="Path 16977" class="cls-10"
                                        d="M23.648,33.9A.36.36,0,0,0,24,33.534V31.826a.36.36,0,0,0-.352-.367H22.24a.36.36,0,0,0-.352.367v1.889a1.236,1.236,0,0,0-1.65.137L19.2,34.935a1.38,1.38,0,0,0-.233,1.551H16.315a1.468,1.468,0,0,0-1.139-.552H9.528V33.828a.352.352,0,1,0-.7,0v.88H5.27v-.88a.352.352,0,1,0-.7,0v1.244s0,0,0,0,0,0,0,0v.856H4.128a1.532,1.532,0,0,0-1.5,1.563v1.442H2.111V35.444a.352.352,0,1,0-.7,0V39.3s0,0,0,.006,0,0,0,.006v1.459s0,0,0,.006,0,0,0,.006v8.247s0,0,0,0,0,0,0,0V50.5s0,0,0,0,0,0,0,0v2.213H.7V32.193h.7v1.831a.352.352,0,1,0,.7,0v-2.2a.36.36,0,0,0-.352-.367H.352A.36.36,0,0,0,0,31.825V53.091a.36.36,0,0,0,.352.367H1.76a.36.36,0,0,0,.352-.367V50.874H4.567v1.121s0,0,0,0,0,0,0,0v1.089a.352.352,0,1,0,.7,0v-.725H8.825v.725a.352.352,0,1,0,.7,0V50.874h12.36v2.217a.36.36,0,0,0,.352.367h1.408A.36.36,0,0,0,24,53.091V34.954a.352.352,0,1,0-.7,0V52.723h-.7V49.28a.377.377,0,0,1,0-.245V40.778h0v-1.47h0V32.193h.7v1.341A.36.36,0,0,0,23.648,33.9ZM3.335,48.667V47.226a.812.812,0,0,1,.793-.828H10.8a.368.368,0,0,0,0-.735H9.528V41.145h12.36v2.309a1.236,1.236,0,0,0-1.65.137L19.2,44.674a1.38,1.38,0,0,0-.238,1.54H16.317a1.463,1.463,0,0,0-1.14-.552H12.164a.368.368,0,0,0,0,.735h3.012a.782.782,0,0,1,.668.383.851.851,0,0,1,.124.445v1.442Zm-1.224,0V41.145H4.567v1.07s0,0,0,0,0,0,0,0v2.293s0,0,0,0,0,0,0,0v1.142H4.128a1.532,1.532,0,0,0-1.5,1.563v1.442Zm6.714-7.522v.706H5.27v-.706ZM5.27,45.663v-.778H8.825v.778ZM8.825,44.15H5.27V42.586H8.825ZM19.7,46.039a.617.617,0,0,1,0-.846l1.037-1.084a.555.555,0,0,1,.809,0,.617.617,0,0,1,0,.846l-1.037,1.084a.556.556,0,0,1-.4.175h0A.556.556,0,0,1,19.7,46.039Zm2.19-.4v.579h-.554Zm-5.241,1.314h5.241v1.718H16.672V47.226A1.634,1.634,0,0,0,16.648,46.949ZM19.7,35.455l1.037-1.084a.555.555,0,0,1,.809,0,.617.617,0,0,1,0,.846L20.508,36.3a.555.555,0,0,1-.809,0,.617.617,0,0,1,0-.846Zm2.19.442v.589h-.564Zm0,1.324v1.718H16.672V37.5a1.63,1.63,0,0,0-.024-.276ZM5.27,35.443H8.825v.492H5.27ZM3.335,37.5a.812.812,0,0,1,.793-.828H15.176a.812.812,0,0,1,.793.828v1.442H3.335Zm18.554,2.176v.737H2.111v-.737ZM8.825,51.631H5.27v-.757H8.825ZM2.111,50.139V49.4H21.889v.737Z"
                                        transform="translate(0 0)" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <a class="cate-link" href="#">PG/Hostels</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-2 mt-2" id="Review">
        <div class="review-section">
            <h3>Recent Reviews on Aviation Colleges</h3>
            <p><strong>300+</strong> Users have reviewed for Aviation Colleges in Rewa</p>

            <div class="rating-summary">
                <span class="overall-rating">⭐ 4.8</span>
                <span class="review-count">Based on 301 Reviews</span>
            </div>
            <div class="review-list">
                <div class="review-card">
                    <div class="review-header">
                        <span class="user-initial">C</span>
                        <div class="user-info">
                            <strong>Chandana T</strong>
                            <span>Koramangala</span>
                        </div>
                    </div>
                    <div class="user-rating">
                        ⭐⭐⭐⭐
                    </div>
                    <p class="review-date">25 Jun, 2024</p>
                    <p class="review-text">
                        Frankfinn has good reviews like having a good teaching and professional teaching and have a
                        professional training system.
                    </p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <span class="user-initial">P</span>
                        <div class="user-info">
                            <strong>PAVITHRA. S</strong>
                            <span>Koramangala</span>
                        </div>
                    </div>
                    <div class="user-rating">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="review-date">25 Jun, 2024</p>
                    <p class="review-text">
                        Frankfinn institute of air hostess training and I'm really glad to explore the world with help
                        of Frankfinn. Thank you!
                    </p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <span class="user-initial">P</span>
                        <div class="user-info">
                            <strong>PAVITHRA. S</strong>
                            <span>Koramangala</span>
                        </div>
                    </div>
                    <div class="user-rating">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="review-date">25 Jun, 2024</p>
                    <p class="review-text">
                        Frankfinn institute of air hostess training and I'm really glad to explore the world with help
                        of Frankfinn. Thank you!
                    </p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <span class="user-initial">P</span>
                        <div class="user-info">
                            <strong>PAVITHRA. S</strong>
                            <span>Koramangala</span>
                        </div>
                    </div>
                    <div class="user-rating">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="review-date">25 Jun, 2024</p>
                    <p class="review-text">
                        Frankfinn institute of air hostess training and I'm really glad to explore the world with help
                        of Frankfinn. Thank you!
                    </p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <span class="user-initial">P</span>
                        <div class="user-info">
                            <strong>PAVITHRA. S</strong>
                            <span>Koramangala</span>
                        </div>
                    </div>
                    <div class="user-rating">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="review-date">25 Jun, 2024</p>
                    <p class="review-text">
                        Frankfinn institute of air hostess training and I'm really glad to explore the world with help
                        of Frankfinn. Thank you!
                    </p>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <span class="user-initial">P</span>
                        <div class="user-info">
                            <strong>PAVITHRA. S</strong>
                            <span>Koramangala</span>
                        </div>
                    </div>
                    <div class="user-rating">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="review-date">25 Jun, 2024</p>
                    <p class="review-text">
                        Frankfinn institute of air hostess training and I'm really glad to explore the world with help
                        of Frankfinn. Thank you!
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid p-2 mt-2" id="Faq">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        What courses do aviation colleges offer?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li><b>Pilot Training:</b> Courses to become a commercial or private pilot.</li>
                            <li>Aircraft Maintenance Engineering: Programs focusing on the maintenance and repair of
                                aircraft.</li>
                            <li><b>Aviation Management: </b>Courses on the business and management side of the aviation
                                industry.</li>
                            <li><b>Air Traffic Control: </b>Training for managing aircraft movements on the ground and
                                in the air.</li>
                            <li><b>Cabin Crew Training:</b> Programs for aspiring flight attendants.</li>
                            <li><b>Aeronautical Engineering: </b>Focuses on the design and development of aircraft.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What are the eligibility criteria for admission to aviation colleges?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <li>Educational Qualifications: A minimum of high school completion, often with a focus on
                            science and mathematics.</li>
                        <li>Medical Fitness: A medical examination to ensure physical fitness, particularly for pilot
                            training.</li>
                        <li>Age Limit: Some courses have age restrictions, commonly between 17-30 years.</li>
                        <li>Language Proficiency: Proficiency in English, as it is the primary language of aviation.
                        </li>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        How long do aviation courses typically take to complete?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li>Pilot Training: 6 months to 2 years, depending on the type of license (private or
                                commercial).</li>
                            <li>Aircraft Maintenance Engineering: 2 to 4 years.</li>
                            <li>Aviation Management: 1 to 4 years, depending on whether it is a diploma, bachelor's, or
                                master's program.</li>
                            <li>Air Traffic Control: 6 months to 1 year.</li>
                            <li>Cabin Crew Training: 6 months to 1 year.</li>
                            <li>Aeronautical Engineering: 4 years for a bachelor's degree.</li>
                        </ul>
                    </div>
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





<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdown1Btn = document.querySelector(".dropdown1-btn");
        const dropdown1Content = document.querySelector(".dropdown1-content");
        const citySearch = document.getElementById("city-search");
        const cityList = document.getElementById("city-list");
        const selectedCity = document.getElementById("selected-city");
        const cancelBtn = document.getElementById("cancel-btn");
        let chatButtons = document.querySelectorAll(".openChatModal");

        // Toggle Modal
        chatButtons.forEach(button => {
            button.addEventListener("click", function() {
                let vendorId = this.getAttribute("data-vendor-id");
                document.getElementById("vendor_id").value = vendorId;
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

@endsection