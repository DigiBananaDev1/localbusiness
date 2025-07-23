@extends('app')

@section('content')



{{-- MAIN CONTENT HERE --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
    :root {
      --bs-primary: #0D6EFD;
      --bs-primary-rgb: 13,110,253;
      --bs-btn-hover-bg: #0b5ed7;
      --bs-btn-active-bg: #0a58ca;
      --bs-orange: #FF4500;
    }
   
    .category-scroll {
      overflow-x: auto;
      white-space: nowrap;
    }
    .category-btn {
      min-width: 180px;
      margin-right: 12px;
      border-radius: 2rem;
      font-weight: 500;
      border: 2px solid #0D6EFD;
      color: #0D6EFD;
      background: #fff;
      transition: background 0.2s, color 0.2s, border 0.2s;
    }
    .category-btn.active, .category-btn:focus, .category-btn:hover {
      background: #0D6EFD;
      color: #fff;
      border-color: #0D6EFD;
        font-family: "Poppins", sans-serif;
    }
    .leading-supplier {
      position: absolute;
      top: 18px;
      left: -18px;
      background: #0D6EFD;
      color: #fff;
      padding: 4px 18px;
      font-size: 0.98rem;
      font-weight: 600;
      border-radius: 0 10px 10px 0;
      box-shadow: 0 2px 8px rgba(13,110,253,0.08);
      transform: rotate(-18deg);
      z-index: 2;
      letter-spacing: 1px;
        font-family: "Poppins", sans-serif;
    }
    .product-img {
      max-width: 100%;
      border-radius: 14px;
      box-shadow: 0 4px 18px rgba(13,110,253,0.10);
      border: 2px solid #e3e8f0;
      background: #fff;
    }
    .card {
      border-radius: 18px;
      box-shadow: 0 4px 32px rgba(13,110,253,0.07);
      border: none;
    }
    .card-title {
      font-weight: 700;
      color: #0D6EFD;
        font-family: "Poppins", sans-serif;
    }
    .card .btn-outline-primary {
      border-color: #0D6EFD;
      color: #0D6EFD;
      font-weight: 500;
      border-radius: 2rem;
        font-family: "Poppins", sans-serif;
    }
    .card .btn-outline-primary:hover, .card .btn-outline-primary:focus {
      background: #0D6EFD;
      color: #fff;
    }
    .btn-orange, .btn-orange:focus {
      background: #FF4500;
      color: #fff;
      border: none;
      font-weight: 600;
      border-radius: 2rem;
      box-shadow: 0 2px 8px rgba(255,69,0,0.10);
    }
    .btn-orange:hover {
      background: #d63a00;
      color: #fff;
    }
    .badge.bg-success {
      background: #0D6EFD !important;
    }
    .badge.bg-warning {
      background: #FF4500 !important;
      color: #fff !important;
    }
    .divider {
      border-bottom: 2px dashed #ececec;
      margin: 24px 0;
    }
    .text-orange {
      color: #FF4500 !important;
    }
    .card-subtitle {
      font-weight: 700;
      color: #0D6EFD !important;
        font-family: "Poppins", sans-serif;
    }
    .supplier-actions .btn {
      font-size: 1.08rem;
      padding: 0.7rem 1.2rem;
      border-radius: 2rem;
        font-family: "Poppins", sans-serif;
    }
    .supplier-actions .btn-outline-success {
      border-color: #0D6EFD;
      color: #0D6EFD;
      font-weight: 500;
    }
    .supplier-actions .btn-outline-success:hover, .supplier-actions .btn-outline-success:focus {
      background: #0D6EFD;
      color: #fff;
    }
    .supplier-actions .btn-success {
      background: #FF4500;
      border: none;
      color: #fff;
      font-weight: 600;
    }
    .supplier-actions .btn-success:hover, .supplier-actions .btn-success:focus {
      background: #d63a00;
      color: #fff;
    }
    @media (max-width: 768px) {
      .category-btn {
        min-width: 120px;
        font-size: 0.95rem;
      }
      .leading-supplier {
        left: 0;
        top: 8px;
        font-size: 0.9rem;
        padding: 2px 10px;
      }
      .card {
        border-radius: 12px;
      }
    }
  </style>
  <!-- Bootstrap Icons (optional, for icons) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-4">

  <!-- Categories to explore -->
  <div class="mb-4">
    <div class="fw-bold mb-2 fs-5 text-orange">Categories To Explore</div>
    <div class="category-scroll d-flex">
      <button class="btn category-btn active me-2">Diagnostic Test Kit</button>
      <button class="btn category-btn me-2">Cell Counter</button>
      <button class="btn category-btn me-2">Immunoassay Analyzer</button>
      <button class="btn category-btn me-2">Semi Auto Analyser</button>
      <button class="btn category-btn me-2">...</button>
    </div>
  </div>
{{-- Card 1 --}}
  <div class="row g-4 mb-4">
    <!-- Product Card -->
    <div class="col-lg-8">
      <div class="card position-relative h-100 p-2">
 
        <div class="row g-0">
          <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
            <img src="https://5.imimg.com/data5/SELLER/Default/2021/5/XO/MF/GR/11392823/mispa-viva-semi-automated-clinical-chemistry-analyzer-1000x1000.png" class="product-img" alt="Product">
          </div>
          <div class="col-md-7" style="  font-family: 'Poppins', sans-serif;">
            <div class="card-body">
              <a href="#" class="card-title mb-2">Agappe Mispa Viva Biochemistry Analyzer</a>
              <h4 class="mb-3" style="color:#FF4500; font-weight:700;">₹ 99,000 <small class="text-muted fs-6">/Piece</small></h4>
              <button class="btn btn-outline-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#supplierModal">Get Latest Price</button>
              <ul class="list-unstyled mb-0">
                <li><strong>Model Name/Number:</strong> Mispa Viva</li>
                <li><strong>Brand:</strong> Agappe</li>
                <li><strong>Power Supply:</strong> 265 V AC</li>
                <li><strong>Frequency:</strong> 60 Hz</li>
                <li><strong>Weight:</strong> 6 Kg</li>
                <li><strong>Dimension:</strong> 362 x 364 x 195 mm (L x W x H)</li>
              </ul>
              <a href="#" class="btn btn-orange btn-sm mt-3"><i class="bi bi-play-circle me-1"></i>Watch Video</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Supplier Card -->
    <div class="col-lg-4">
      <div class="card h-100 p-2">
        <div class="card-body" style="  font-family: 'Poppins', sans-serif;">
          <h6 class="card-subtitle mb-2">Agappe Diagnostics Ltd</h6>
          <div class="mb-2"><small>Pattimattam, Ernakulam</small></div>
          <div class="mb-2">
            <span class="badge bg-success">GST</span>
            <span class="badge bg-warning">TrustSEAL Verified</span>
            <span class="ms-2"><i class="bi bi-clock-history"></i> 10 yrs</span>
          </div>
          <div class="mb-2">
            <span class="text-orange fw-bold">★ 4.5</span>
            <span class="text-muted">(68)</span>
          </div>
          <div class="mb-2">
            <span class="text-success">72% Response Rate</span>
          </div>
          <div class="d-grid gap-2 mt-4 supplier-actions">
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#supplierModal">Contact Supplier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- CARD 2 --}}
  <div class="row g-4 mb-4">
    <!-- Product Card -->
    <div class="col-lg-8">
      <div class="card position-relative h-100 p-2">

        <div class="row g-0">
          <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
            <img src="https://5.imimg.com/data5/SELLER/Default/2024/4/409929917/IS/JB/SE/17029/biochemistry-analyzer-easy-lab-250x250.jpg" class="product-img" alt="Product">
          </div>
          <div class="col-md-7" style="  font-family: 'Poppins', sans-serif;">
            <div class="card-body">
            <a href="#" class="card-title mb-2">Agappe Mispa Viva Biochemistry Analyzer</a>
              <h4 class="mb-3" style="color:#FF4500; font-weight:700;">₹ 99,000 <small class="text-muted fs-6">/Piece</small></h4>
              <button class="btn btn-outline-primary btn-sm mb-3">Get Latest Price</button>
              <ul class="list-unstyled mb-0">
                <li><strong>Model Name/Number:</strong> Mispa Viva</li>
                <li><strong>Brand:</strong> Agappe</li>
                <li><strong>Power Supply:</strong> 265 V AC</li>
                <li><strong>Frequency:</strong> 60 Hz</li>
                <li><strong>Weight:</strong> 6 Kg</li>
                <li><strong>Dimension:</strong> 362 x 364 x 195 mm (L x W x H)</li>
              </ul>
              <a href="#" class="btn btn-orange btn-sm mt-3"><i class="bi bi-play-circle me-1"></i>Watch Video</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Supplier Card -->
    <div class="col-lg-4">
      <div class="card h-100 p-2">
        <div class="card-body" style="  font-family: 'Poppins', sans-serif;">
          <h6 class="card-subtitle mb-2">Agappe Diagnostics Ltd</h6>
          <div class="mb-2"><small>Pattimattam, Ernakulam</small></div>
          <div class="mb-2">
            <span class="badge bg-success">GST</span>
            <span class="badge bg-warning">TrustSEAL Verified</span>
            <span class="ms-2"><i class="bi bi-clock-history"></i> 10 yrs</span>
          </div>
          <div class="mb-2">
            <span class="text-orange fw-bold">★ 4.5</span>
            <span class="text-muted">(68)</span>
          </div>
          <div class="mb-2">
            <span class="text-success">72% Response Rate</span>
          </div>
          <div class="d-grid gap-2 mt-4 supplier-actions">
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#supplierModal">Contact Supplier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
   {{-- CARD3 --}}
  <div class="row g-4 mb-4">
    <!-- Product Card -->
    <div class="col-lg-8">
      <div class="card position-relative h-100 p-2">
        <div class="row g-0">
          <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
            <img src="https://5.imimg.com/data5/SELLER/Default/2024/1/382070990/VL/XU/GZ/928419/touch-screen-bio-chemistry-analyzer-250x250.jpg" class="product-img" alt="Product">
          </div>
          <div class="col-md-7" style="  font-family: 'Poppins', sans-serif;">
            <div class="card-body">
              <a href="#" class="card-title mb-2">Agappe Mispa Viva Biochemistry Analyzer</a>
              <h4 class="mb-3" style="color:#FF4500; font-weight:700;">₹ 99,000 <small class="text-muted fs-6">/Piece</small></h4>
              <button class="btn btn-outline-primary btn-sm mb-3">Get Latest Price</button>
              <ul class="list-unstyled mb-0">
                <li><strong>Model Name/Number:</strong> Mispa Viva</li>
                <li><strong>Brand:</strong> Agappe</li>
                <li><strong>Power Supply:</strong> 265 V AC</li>
                <li><strong>Frequency:</strong> 60 Hz</li>
                <li><strong>Weight:</strong> 6 Kg</li>
                <li><strong>Dimension:</strong> 362 x 364 x 195 mm (L x W x H)</li>
              </ul>
              <a href="#" class="btn btn-orange btn-sm mt-3"><i class="bi bi-play-circle me-1"></i>Watch Video</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Supplier Card -->
    <div class="col-lg-4">
      <div class="card h-100 p-2">
        <div class="card-body" style="  font-family: 'Poppins', sans-serif;">
          <h6 class="card-subtitle mb-2">Agappe Diagnostics Ltd</h6>
          <div class="mb-2"><small>Pattimattam, Ernakulam</small></div>
          <div class="mb-2">
            <span class="badge bg-success">GST</span>
            <span class="badge bg-warning">TrustSEAL Verified</span>
            <span class="ms-2"><i class="bi bi-clock-history"></i> 10 yrs</span>
          </div>
          <div class="mb-2">
            <span class="text-orange fw-bold">★ 4.5</span>
            <span class="text-muted">(68)</span>
          </div>
          <div class="mb-2">
            <span class="text-success">72% Response Rate</span>
          </div>
          <div class="d-grid gap-2 mt-4 supplier-actions">
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#supplierModal">Contact Supplier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
   {{-- CARD 4 --}}
  <div class="row g-4 mb-4">
    <!-- Product Card -->
    <div class="col-lg-8">
      <div class="card position-relative h-100 p-2">

        <div class="row g-0">
            <a href="#" class="card-title mb-2">Agappe Mispa Viva Biochemistry Analyzer</a>        <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
            <img src="https://5.imimg.com/data5/SELLER/Default/2025/5/508757034/RI/FF/IW/1000963/rx-50-plus-biochemistry-analyzer-250x250.png" class="product-img" alt="Product">
          </div>
          <div class="col-md-7" style="  font-family: 'Poppins', sans-serif;">
            <div class="card-body">
              <h5 class="card-title mb-2">Agappe Mispa Viva Biochemistry Analyzer</h5>
              <h4 class="mb-3" style="color:#FF4500; font-weight:700;">₹ 99,000 <small class="text-muted fs-6">/Piece</small></h4>
              <button class="btn btn-outline-primary btn-sm mb-3">Get Latest Price</button>
              <ul class="list-unstyled mb-0">
                <li><strong>Model Name/Number:</strong> Mispa Viva</li>
                <li><strong>Brand:</strong> Agappe</li>
                <li><strong>Power Supply:</strong> 265 V AC</li>
                <li><strong>Frequency:</strong> 60 Hz</li>
                <li><strong>Weight:</strong> 6 Kg</li>
                <li><strong>Dimension:</strong> 362 x 364 x 195 mm (L x W x H)</li>
              </ul>
              <a href="#" class="btn btn-orange btn-sm mt-3"><i class="bi bi-play-circle me-1"></i>Watch Video</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Supplier Card -->
    <div class="col-lg-4">
      <div class="card h-100 p-2">
        <div class="card-body" style="  font-family: 'Poppins', sans-serif;">
          <h6 class="card-subtitle mb-2">Agappe Diagnostics Ltd</h6>
          <div class="mb-2"><small>Pattimattam, Ernakulam</small></div>
          <div class="mb-2">
            <span class="badge bg-success">GST</span>
            <span class="badge bg-warning">TrustSEAL Verified</span>
            <span class="ms-2"><i class="bi bi-clock-history"></i> 10 yrs</span>
          </div>
          <div class="mb-2">
            <span class="text-orange fw-bold">★ 4.5</span>
            <span class="text-muted">(68)</span>
          </div>
          <div class="mb-2">
            <span class="text-success">72% Response Rate</span>
          </div>
          <div class="d-grid gap-2 mt-4 supplier-actions">
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#supplierModal">Contact Supplier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
   {{-- CARD 5 --}}
  <div class="row g-4 mb-4">
    <!-- Product Card -->
    <div class="col-lg-8">
      <div class="card position-relative h-100 p-2">

        <div class="row g-0">
          <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
            <img src="https://5.imimg.com/data5/SELLER/Default/2024/9/451954275/HV/CB/GT/3127482/flow-cell-biochemisty-250x250.jpeg" class="product-img" alt="Product">
          </div>
          <div class="col-md-7" style="  font-family: 'Poppins', sans-serif;">
            <div class="card-body">
          <a href="#" class="card-title mb-2">Agappe Mispa Viva Biochemistry Analyzer</a>
              <h4 class="mb-3" style="color:#FF4500; font-weight:700;">₹ 99,000 <small class="text-muted fs-6">/Piece</small></h4>
              <button class="btn btn-outline-primary btn-sm mb-3">Get Latest Price</button>
              <ul class="list-unstyled mb-0">
                <li><strong>Model Name/Number:</strong> Mispa Viva</li>
                <li><strong>Brand:</strong> Agappe</li>
                <li><strong>Power Supply:</strong> 265 V AC</li>
                <li><strong>Frequency:</strong> 60 Hz</li>
                <li><strong>Weight:</strong> 6 Kg</li>
                <li><strong>Dimension:</strong> 362 x 364 x 195 mm (L x W x H)</li>
              </ul>
              <a href="#" class="btn btn-orange btn-sm mt-3"><i class="bi bi-play-circle me-1"></i>Watch Video</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Supplier Card -->
    <div class="col-lg-4">
      <div class="card h-100 p-2">
        <div class="card-body" style="  font-family: 'Poppins', sans-serif;">
          <h6 class="card-subtitle mb-2">Agappe Diagnostics Ltd</h6>
          <div class="mb-2"><small>Pattimattam, Ernakulam</small></div>
          <div class="mb-2">
            <span class="badge bg-success">GST</span>
            <span class="badge bg-warning">TrustSEAL Verified</span>
            <span class="ms-2"><i class="bi bi-clock-history"></i> 10 yrs</span>
          </div>
          <div class="mb-2">
            <span class="text-orange fw-bold">★ 4.5</span>
            <span class="text-muted">(68)</span>
          </div>
          <div class="mb-2">
            <span class="text-success">72% Response Rate</span>
          </div>
          <div class="d-grid gap-2 mt-4 supplier-actions">
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#supplierModal">Contact Supplier</button>
          </div>
        </div>
      </div>
    </div>
  </div>
   {{-- CARD 6 --}}
  <div class="row g-4 mb-4">
    <!-- Product Card -->
    <div class="col-lg-8">
      <div class="card position-relative h-100 p-2">

        <div class="row g-0">
          <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
            <img src="https://5.imimg.com/data5/IW/RA/JU/SELLER-21453223/mxi50-pw-fully-auto-biochemistry-analyzer-250x250.jpg" class="product-img" alt="Product">
          </div>
          <div class="col-md-7" style="  font-family: 'Poppins', sans-serif;">
            <div class="card-body">
          <a href="#" class="card-title mb-2">Agappe Mispa Viva Biochemistry Analyzer</a>
              <h4 class="mb-3" style="color:#FF4500; font-weight:700;">₹ 99,000 <small class="text-muted fs-6">/Piece</small></h4>
              <button class="btn btn-outline-primary btn-sm mb-3">Get Latest Price</button>
              <ul class="list-unstyled mb-0">
                <li><strong>Model Name/Number:</strong> Mispa Viva</li>
                <li><strong>Brand:</strong> Agappe</li>
                <li><strong>Power Supply:</strong> 265 V AC</li>
                <li><strong>Frequency:</strong> 60 Hz</li>
                <li><strong>Weight:</strong> 6 Kg</li>
                <li><strong>Dimension:</strong> 362 x 364 x 195 mm (L x W x H)</li>
              </ul>
              <a href="#" class="btn btn-orange btn-sm mt-3"><i class="bi bi-play-circle me-1"></i>Watch Video</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Supplier Card -->
    <div class="col-lg-4">
      <div class="card h-100 p-2">
        <div class="card-body" style="  font-family: 'Poppins', sans-serif;">
          <h6 class="card-subtitle mb-2">Agappe Diagnostics Ltd</h6>
          <div class="mb-2"><small>Pattimattam, Ernakulam</small></div>
          <div class="mb-2">
            <span class="badge bg-success">GST</span>
            <span class="badge bg-warning">TrustSEAL Verified</span>
            <span class="ms-2"><i class="bi bi-clock-history"></i> 10 yrs</span>
          </div>
          <div class="mb-2">
            <span class="text-orange fw-bold">★ 4.5</span>
            <span class="text-muted">(68)</span>
          </div>
          <div class="mb-2">
            <span class="text-success">72% Response Rate</span>
          </div>
          <div class="d-grid gap-2 mt-4 supplier-actions">
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#supplierModal">Contact Supplier</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>








<!-- Modal -->
<div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="row g-4">
        <!-- Product Info -->
        <div class="col-md-5 border-end">
          <img src="https://5.imimg.com/data5/SELLER/Default/2021/5/XO/MF/GR/11392823/mispa-viva-semi-automated-clinical-chemistry-analyzer-1000x1000.png" class="img-fluid rounded" alt="Product">
          <h5 class="mt-3">Agappe Mispa Viva Biochemistry Analyzer</h5>
          <p class="mb-1 text-danger fw-bold">₹ 99,000 <small>/Piece</small></p>
          <p class="mb-0">Sold By - Agappe Diagnostics Ltd, Ernakulam, Kerala</p>
          <p class="text-muted mt-1">📞 0804xxxxxxx</p>
        </div>

        <!-- Login Form -->
        <div class="col-md-7">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-3">Please login to view Supplier's Mobile Number</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form>
            <div class="mb-3">
              <label for="mobileNumber" class="form-label">Mobile Number</label>
              <div class="input-group">
                <span class="input-group-text">+91</span>
                <input type="tel" class="form-control" id="mobileNumber" placeholder="Enter your mobile" required>
              </div>
              <small class="text-muted mt-1 d-block">Your Country is <a href="#">India</a></small>
            </div>
            <button type="submit" class="btn btn-success w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection