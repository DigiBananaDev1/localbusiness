@extends('app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<div class="container-fluid py-2">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-12">
      <div class="card shadow-lg border-0 p-2 p-md-4 mb-4">
        <div class="row g-4 align-items-start flex-lg-row py-2 py-md-4 flex-column flex-lg-row">
          <!-- Left: Thumbnails and Main Image -->
          <div class="col-lg-5 d-flex flex-row flex-md-row flex-column-reverse align-items-start align-items-md-start align-items-lg-start mb-3 mb-lg-0">
            <div class="product-thumbnails d-flex flex-row flex-lg-column overflow-auto mb-2 mb-lg-0 me-0 me-lg-3 w-100 w-lg-auto" style="gap:10px;">
              <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863908/YH/NF/CC/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg" class="active" alt="Thumb1">
              <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863902/TO/LQ/QJ/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg" alt="Thumb2">
              <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863905/BD/GZ/IB/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpeg" alt="Thumb3">
              <img src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863908/YH/NF/CC/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg" alt="Thumb4">
            </div>
            <img id="mainProductImage" src="https://5.imimg.com/data5/SELLER/Default/2024/5/421863903/VC/WW/GR/68792294/meril-cliniquant-biochemistry-analyzer-1000x1000.jpg" class="product-image ms-0 ms-lg-2 mb-2 mb-lg-0" alt="Product Main">
          </div>
          <!-- Center: Product Details -->
          <div class="col-lg-4 mt-3 mt-lg-0 ppcard">
            <h5 class="fw-bold mb-2">Semi Automatic Meril CliniQuant Biochemistry Analyzer, Assays: Clinical Chemistry</h5>
            <h5 class="text-success mb-3">₹ 1,50,000 <small class="text-muted">/Unit</small></h5>
            <a href="#" class="mb-3 d-inline-block text-decoration-underline" data-bs-toggle="modal" data-bs-target="#supplierModal">Get Latest Price</a>
            <table class="table table-sm table-bordered mt-2 mb-3">
              <tbody>
                <tr><th>Automation</th><td>Semi Automatic</td></tr>
                <tr><th>Brand</th><td>Meril</td></tr>
                <tr><th>Assays</th><td>Clinical Chemistry</td></tr>
                <tr><th>Instrument Name</th><td>Biochemistry Analyzer</td></tr>
                <tr><th>Model Name</th><td>CliniQuant</td></tr>
                <tr><th>User Input</th><td>Touch</td></tr>
                <tr><th>Display</th><td>Digital</td></tr>
                <tr><th>Storage</th><td>25,600 Test Data Storage</td></tr>
                <tr><th>Weight</th><td>11 KG</td></tr>
              </tbody>
            </table>
            <p class="small text-muted mb-2">*Note: The price mentioned above is virtual, do not consider it for purchase. For actual price and more product details, please contact us at +91 84938 00625 and +91 95966 66361.</p>
            <ul class="small mb-3">
              <li>High performance semi automated Biochemistry analyzer; Compact-Vertical, for routine Chemistries as well as specialized & Turbidimetry Immunoassay.</li>
              <li>A large foot print of 5000 plus satisfied customers across India and presence in 50 plus countries globally.</li>
            </ul>
            <a href="#" class="btn btn-success btn-lg w-100 mt-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#supplierModal">Get Latest Price</a>
          </div>
          <!-- Right: Seller Info -->
          <div class="col-lg-3 mt-3 mt-lg-0">
            <div class="seller-card">
              <div class="d-flex align-items-center mb-2">
                <img src="https://5.imimg.com/data5/SELLER/Logo/2024/2/388320639/KH/KU/ZM/68792294/mt-logo-90x90.jpg" class="rounded-circle me-2 border" style="width:48px;height:48px;object-fit:cover;" alt="Seller Logo">
                <div>
                  <strong>Murtaza Traders</strong><br>
                  <span class="text-muted small">Bemina, Srinagar, Jammu & Kashmir</span>
                </div>
              </div>
              <div class="mb-2">
                <span class="badge bg-success">Verified Exporter</span>
                <span class="ms-2 small">6 yrs</span>
              </div>
              <div class="mb-2">
                <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                <span class="small">4.3 (97)</span>
              </div>
              <button class="btn btn-outline-primary w-100 mb-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</button>
              <button class="btn btn-primary w-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#supplierModal">Contact Supplier</button>
            </div>
          </div>
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
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
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
</head>
<body>
    <h2 class="mb-4">Find products similar to <b>Agappe Mispa Viva Biochemistry Analyzer</b> near Delhi</h2>
    <div class="container-fluid">
        <div class="row g-3">
            <!-- Product Card 1 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
                <div class="card h-100">
                    <img src="https://5.imimg.com/data5/SELLER/Default/2024/3/404257972/QG/PO/DV/10975265/fully-automatic-biochemistry-analyzer-250x250.jpg" class="card-img-top product-img" alt="Product 1">
                    <div class="card-body d-flex flex-column">
                        <button class="btn btn-get-price mb-2"data-bs-toggle="modal" data-bs-target="#supplierModal">Get Best Price</button>
                        <h6 class="card-title">220 Volt Mindray Fully Automatic Biochemistry Analyzer, Model: Bs 200e/c73</h6>
                        <div class="text-muted mb-1">New Delhi</div>
                        <a class="view-mobile" href="#"data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</a>
                        <div class="mt-auto product-price">₹ 7,50,000 <span class="product-unit">/Piece</span></div>
                    </div>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
                <div class="card h-100">
                    <img src="https://5.imimg.com/data5/ANDROID/Default/2024/7/432035556/TP/YM/CY/2960872/product-jpeg-250x250.jpg" class="card-img-top product-img" alt="Product 2">
                    <div class="card-body d-flex flex-column">
                        <button class="btn btn-get-price mb-2"data-bs-toggle="modal" data-bs-target="#supplierModal">Get Best Price</button>
                        <h6 class="card-title">Erba Fully Automated Biochemistry Analyzer, Assays: Clinical Chemistry</h6>
                        <div class="text-muted mb-1">New Delhi</div>
                        <a class="view-mobile" href="#"data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</a>
                        <div class="mt-auto product-price">₹ 70,000 <span class="product-unit">/Piece</span></div>
                    </div>
                </div>
            </div>
            <!-- Product Card 3 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
                <div class="card h-100">
                    <img src="https://5.imimg.com/data5/SELLER/Default/2025/3/493149878/DX/TE/PL/1560002/psr-chem-touch-plus-biochemistry-analyzer-semi-automatic-250x250.webp" class="card-img-top product-img" alt="Product 3">
                    <div class="card-body d-flex flex-column">
                        <button class="btn btn-get-price mb-2"data-bs-toggle="modal" data-bs-target="#supplierModal">Get Best Price</button>
                        <h6 class="card-title">Diatron PSR Chem Touch Plus Biochemistry Analyzer, Semi Automatic, For Laboratory Use</h6>
                        <div class="text-muted mb-1">New Delhi</div>
                        <a class="view-mobile" href="#" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</a>
                        <div class="mt-auto product-price">₹ 1,30,000 <span class="product-unit">/Piece</span></div>
                    </div>
                </div>
            </div>
            <!-- Product Card 4 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
                <div class="card h-100">
                    <img src="https://5.imimg.com/data5/SELLER/Default/2024/9/449114562/ZS/TD/ZJ/74737876/semi-auto-biochemistry-analyzer-250x250.jpeg" class="card-img-top product-img" alt="Product 4">
                    <div class="card-body d-flex flex-column">
                        <button class="btn btn-get-price mb-2"data-bs-toggle="modal" data-bs-target="#supplierModal">Get Best Price</button>
                        <h6 class="card-title">Ozonobie Semi Automatic URA Premio, Assays: MEDSOURCE</h6>
                        <div class="text-muted mb-1">New Delhi</div>
                        <a class="view-mobile" href="#" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</a>
                        <div class="mt-auto product-price">₹ 1,10,000 <span class="product-unit">/Unit</span></div>
                    </div>
                </div>
            </div>
            <!-- Product Card 5 -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-5th">
                <div class="card h-100">
                    <img src="https://5.imimg.com/data5/IW/RA/JU/SELLER-21453223/mxi50-pw-fully-auto-biochemistry-analyzer-250x250.jpg" class="card-img-top product-img" alt="Product 5">
                    <div class="card-body d-flex flex-column">
                        <button class="btn btn-get-price mb-2"data-bs-toggle="modal" data-bs-target="#supplierModal">Get Best Price</button>
                        <h6 class="card-title">Matrix MXi50-PW Fully Auto Biochemistry Analyzer, For Laboratory</h6>
                        <div class="text-muted mb-1">New Delhi</div>
                        <a class="view-mobile" href="#" data-bs-toggle="modal" data-bs-target="#supplierModal">View Mobile Number</a>
                        <div class="mt-auto product-price">₹ 7,85,000 <span class="product-unit">/Piece</span></div>
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