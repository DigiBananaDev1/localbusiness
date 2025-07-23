@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-7 col-md-7 col-sm-7">
      <div class="text-center">
        <img src="{{asset('public/assets/img/list-your.png')}}" alt="" width="90%">
      </div>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5">
      <div class="list-form-section">
        <h2 class="head-h2-list">List Your Business. Start Getting Enquires.</h2>
        <div class="start-now">
          <p>Let’s start to list your business</p>
          @if (empty(session('email')))
          @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <form action="{{ route('sendotp') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="email" class="form-label">Email:</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <!-- <div class="form-group">
              <label for="password" class="form-label">Password:</label>
              <input type="password" name="password" class="form-control" required>
            </div> -->
            <div class="text-center py-2">

              <button type="submit" class="btn btn-danger btn-sm">Send OTP</button>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </form>
          @else
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <form action="{{ route('verifyotp') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">
            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" required>
            <button type="submit" class="btn btn-success btn-sm">Verify OTP</button>
          </form>

          @endif

          <p>Already Registered? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
        <ul class="list-circle">
          <li>Create your online profile and get discovered</li>
          <li>Display your entire service offerings</li>
          <li>Respond to customer enquiries and engage with reviews</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="section-used ">
  <div class="container p-5">
    <h2 class="head-h2 text-center">How does We work?</h2>
    <p class="text-center">Subscribe, get verified leads, and grow your business.</p>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="text-center">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="176.27" height="128.354" viewBox="0 0 176.27 128.354">
            <defs>
              <filter id="Ellipse_10" x="0" y="32.823" width="83" height="83" filterUnits="userSpaceOnUse">
                <feOffset dy="3" input="SourceAlpha" />
                <feGaussianBlur stdDeviation="3" result="blur" />
                <feFlood flood-opacity="0.161" />
                <feComposite operator="in" in2="blur" />
                <feComposite in="SourceGraphic" />
              </filter>
            </defs>
            <g id="Group_6246" data-name="Group 6246" transform="translate(-354 -1116.177)">
              <path id="Path_10417" data-name="Path 10417" d="M60.354,36c33.333,0,84.87,39.183,84.87,72.515s-51.538,31.028-84.87,31.028S0,116.819,0,83.486,27.022,36,60.354,36Z" transform="translate(385.045 1080.175)" fill="#feb42b" opacity="0.2" />
              <path id="Path_10418" data-name="Path 10418" d="M57.47-12.685c33.333,0,67.164-7.265,67.164,26.068S91.442,75.776,58.109,75.776,0,62.417,0,29.084,24.137-12.685,57.47-12.685Z" transform="translate(503.765 1231.276) rotate(-173)" fill="#dd0916" opacity="0.3" />
              <rect id="Rectangle_4568" data-name="Rectangle 4568" width="167" height="41" rx="20.5" transform="translate(363 1168)" fill="#f5636c" />
              <text id="Verified" transform="translate(440 1194)" fill="#fff" font-size="19" font-family="ProximaNova-Medium, Proxima Nova" font-weight="500">
                <tspan x="0" y="0">Verified</tspan>
              </text>
              <g transform="matrix(1, 0, 0, 1, 354, 1116.18)" filter="url(#Ellipse_10)">
                <circle id="Ellipse_10-2" data-name="Ellipse 10" cx="32.5" cy="32.5" r="32.5" transform="translate(9 38.82)" fill="#ffc55f" />
              </g>
              <path id="Path_10423" data-name="Path 10423" d="M481.611-1611.69l6.841,6.873,18.812-20.028" transform="translate(-98.264 2802.332)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="9" />
            </g>
          </svg>
        </div>
        <div>
          <h2 class="head-h2 text-center">Receive an enquiry from LocalBussiness</h2>
          <p class="text-center">We match your business with suitable customers. Customers can approach you directly, too!</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="text-center">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="183" height="130.64" viewBox="0 0 183 130.64">
            <defs>
              <filter id="Ellipse_8" x="0" y="26.363" width="83" height="83" filterUnits="userSpaceOnUse">
                <feOffset dy="3" input="SourceAlpha" />
                <feGaussianBlur stdDeviation="3" result="blur" />
                <feFlood flood-opacity="0.161" />
                <feComposite operator="in" in2="blur" />
                <feComposite in="SourceGraphic" />
              </filter>
              <filter id="Ellipse_9" x="100" y="46.363" width="83" height="83" filterUnits="userSpaceOnUse">
                <feOffset dy="3" input="SourceAlpha" />
                <feGaussianBlur stdDeviation="3" result="blur-2" />
                <feFlood flood-opacity="0.161" />
                <feComposite operator="in" in2="blur-2" />
                <feComposite in="SourceGraphic" />
              </filter>
            </defs>
            <g id="Group_6245" data-name="Group 6245" transform="translate(-868 -1100.637)">
              <g id="Group_6178" data-name="Group 6178" transform="translate(218.733 -847.719)">
                <path id="Path_10417" data-name="Path 10417" d="M56.924,73.886c33.333,0,67.709-39.434,67.709-6.1S93.687,143.84,60.354,143.84A60.354,60.354,0,0,1,0,83.486C0,50.153,23.592,73.886,56.924,73.886Z" transform="translate(672.312 1927.894)" fill="#feb42b" opacity="0.2" />
                <path id="Path_10418" data-name="Path 10418" d="M56.924,19.484c33.333,0,67.709-39.434,67.709-6.1s-22.487,102.935-55.82,102.935S0,62.417,0,29.084,23.592,19.484,56.924,19.484Z" transform="translate(791.031 2078.996) rotate(-173)" fill="#dd0916" opacity="0.3" />
              </g>
              <g transform="matrix(1, 0, 0, 1, 868, 1100.64)" filter="url(#Ellipse_8)">
                <circle id="Ellipse_8-2" data-name="Ellipse 8" cx="32.5" cy="32.5" r="32.5" transform="translate(9 32.36)" fill="#ffc55f" />
              </g>
              <g transform="matrix(1, 0, 0, 1, 868, 1100.64)" filter="url(#Ellipse_9)">
                <circle id="Ellipse_9-2" data-name="Ellipse 9" cx="32.5" cy="32.5" r="32.5" transform="translate(109 52.36)" fill="#f8666f" />
              </g>
              <path id="Icon_awesome-phone-alt" data-name="Icon awesome-phone-alt" d="M31.837,23.158l-7.169-3.072a1.536,1.536,0,0,0-1.792.442L19.7,24.407A23.726,23.726,0,0,1,8.36,13.065L12.239,9.89A1.532,1.532,0,0,0,12.68,8.1L9.608.929a1.546,1.546,0,0,0-1.76-.89L1.191,1.575A1.536,1.536,0,0,0,0,3.072a29.7,29.7,0,0,0,29.7,29.7,1.536,1.536,0,0,0,1.5-1.191l1.536-6.657a1.555,1.555,0,0,0-.9-1.767Z" transform="translate(993.114 1169.113)" fill="#fff" />
              <path id="Icon_material-chat-bubble" data-name="Icon material-chat-bubble" d="M28.087,3H5.787A2.8,2.8,0,0,0,3,5.787V30.874L8.575,25.3H28.087a2.8,2.8,0,0,0,2.787-2.787V5.787A2.8,2.8,0,0,0,28.087,3Z" transform="translate(892.563 1151.563)" fill="#fff" />
            </g>
          </svg>
        </div>
        <div>
          <h2 class="head-h2 text-center">Connect with customers over call & chat</h2>
          <p class="text-center">Get ahead of your competitors and connect with customers right away.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="text-center">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="157.779" height="129.199" viewBox="0 0 157.779 129.199">
            <defs>
              <filter id="Ellipse_12" x="60.306" y="9.401" width="83" height="83" filterUnits="userSpaceOnUse">
                <feOffset dy="3" input="SourceAlpha" />
                <feGaussianBlur stdDeviation="3" result="blur" />
                <feFlood flood-opacity="0.161" />
                <feComposite operator="in" in2="blur" />
                <feComposite in="SourceGraphic" />
              </filter>
              <filter id="Ellipse_11" x="21.306" y="28.401" width="83" height="83" filterUnits="userSpaceOnUse">
                <feOffset dy="3" input="SourceAlpha" />
                <feGaussianBlur stdDeviation="3" result="blur-2" />
                <feFlood flood-opacity="0.161" />
                <feComposite operator="in" in2="blur-2" />
                <feComposite in="SourceGraphic" />
              </filter>
            </defs>
            <g id="Group_6244" data-name="Group 6244" transform="translate(-1400.694 -1102.799)">
              <path id="Path_10444" data-name="Path 10444" d="M934.21-2498.975s34.647-13.981,55.022-35.974c26.773-28.9,25.365,8.313,42.664,23s28.764,32.787,30.776,38.017,1.81,13.075-19.914,20.316-85.489,15.086-117.874,0c-13.812-6.434-17.818-14.112-17.836-21.143a18.633,18.633,0,0,1,.9-5.534c1.105-4.306,4.765-8.17,6.627-9.629,3.165-2.979,9.016-5.646,11.827-6.632" transform="translate(495 3677)" fill="#f5b4b9" />
              <path id="Path_10424" data-name="Path 10424" d="M55.325,58.618c33.333,0,100.661-41.587,100.661-8.254,0,15.466-6.355,42.273-24.27,59.809-20.249,19.82-53.495,29.372-71.361,29.372C27.022,139.545,0,116.819,0,83.486S21.992,58.618,55.325,58.618Z" transform="translate(1400.694 1065.375)" fill="#feb42b" opacity="0.2" />
              <g transform="matrix(1, 0, 0, 1, 1400.69, 1102.8)" filter="url(#Ellipse_12)">
                <circle id="Ellipse_12-2" data-name="Ellipse 12" cx="32.5" cy="32.5" r="32.5" transform="translate(69.31 15.4)" fill="#f8666f" />
              </g>
              <g id="man-with-tie-svgrepo-com" transform="translate(1478.014 1131.991)">
                <g id="Group_6226" data-name="Group 6226" transform="translate(10.928)">
                  <path id="Path_10441" data-name="Path 10441" d="M35.49,48.945c-1.354-2.2-4.87-3.71-9.4-4.054a.714.714,0,0,0-.546.189,4.855,4.855,0,0,0-.335.362,1.7,1.7,0,0,1-.629.549h0a1.748,1.748,0,0,1-.642-.564,4.366,4.366,0,0,0-.324-.349.723.723,0,0,0-.544-.189c-4.531.34-8.051,1.863-9.43,4.1-.214.379-5.2,9.345-1.087,14.56a.724.724,0,0,0,.569.277H36.034a.723.723,0,0,0,.569-.277C40.766,58.268,35.555,49.057,35.49,48.945ZM25.9,58.3a.54.54,0,0,1-.065.243l-.79,1.469a.543.543,0,0,1-.957,0l-.79-1.469a.549.549,0,0,1-.065-.243l-.28-10.537a.545.545,0,0,1,.223-.454l1.069-.78a.543.543,0,0,1,.641,0l1.07.78a.544.544,0,0,1,.223.454Z" transform="translate(-10.928 -28.615)" fill="#fff" />
                  <path id="Path_10442" data-name="Path 10442" d="M34.7,15.37a7.685,7.685,0,1,0-7.685-7.685A7.694,7.694,0,0,0,34.7,15.37Z" transform="translate(-21.183)" fill="#fff" />
                </g>
              </g>
              <path id="Path_10426" data-name="Path 10426" d="M901.982-2526.114" transform="translate(589 3713.201)" fill="none" stroke="#707070" stroke-width="1" />
              <g transform="matrix(1, 0, 0, 1, 1400.69, 1102.8)" filter="url(#Ellipse_11)">
                <circle id="Ellipse_11-2" data-name="Ellipse 11" cx="32.5" cy="32.5" r="32.5" transform="translate(30.31 34.4)" fill="#ffc55f" />
              </g>
              <g id="SVGRepo_iconCarrier" transform="translate(1444 1147.201)">
                <g id="Group_6181" data-name="Group 6181">
                  <rect id="Rectangle_4569" data-name="Rectangle 4569" width="6" height="8" transform="translate(5 32)" fill="#fff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
                  <rect id="Rectangle_4570" data-name="Rectangle 4570" width="6" height="20" transform="translate(17 20)" fill="#fff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
                  <rect id="Rectangle_4571" data-name="Rectangle 4571" width="6" height="32" transform="translate(29 8)" fill="#fff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
                  <g id="Group_6180" data-name="Group 6180">
                    <line id="Line_1" data-name="Line 1" y1="23.81" x2="23.81" transform="translate(0 0.154)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
                    <path id="Path_10427" data-name="Path 10427" d="M46,30h5.991v5.991" transform="translate(-28.242 -30)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
                  </g>
                </g>
                <line id="Line_2" data-name="Line 2" x1="40" transform="translate(0 40)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3" />
              </g>
            </g>
          </svg>
        </div>
        <div>
          <h2 class="head-h2 text-center">Convert and grow your business</h2>
          <p class="text-center">Stay active on Sulekha and keep growing.</p>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection