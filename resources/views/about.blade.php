@extends('app')

@section('content')
    <style>
        .minibanner {
            position: relative;
            background: url("{{ asset('public/assets/img/minibanner.jpg') }}") no-repeat center center;
            background-size: cover;
            height: 300px;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .minibanner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            /* black overlay with 50% opacity */
            z-index: 1;
        }

        .minibanner-content {
            position: relative;
            z-index: 2;
        }


        .minibanner h2 {
            font-size: 3rem;
            text-transform: uppercase;
        }

        .para p {
            text-align: justify;
            font-size: 1.2rem;
            line-height: 2.2rem;
        }

     .qview {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .qview h2 {
        font-weight: 600;
        margin-bottom: 40px;
        font-size: 2.5rem;
        color: #222;
    }

    .counter-box {
        background: #fff;
        padding: 30px 20px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .counter-box:hover {
        transform: translateY(-5px);
    }

    .counter-box .count {
        color:#007bff;
        font-size: 2.5rem;
    }

    .counter-box p {
        margin: 0;
        font-size: 1.5rem;
        color: #555;
    }

    @media (max-width: 767px) {
        .qview h2 {
            font-size: 2rem;
        }
    }
        @media only screen and (max-width: 600px) {
            .minibanner h2 {
                font-size: 1.5rem;
                padding: 0px 1px;
                text-transform: uppercase;
            }

        }
    </style>

    <div class="minibanner">
        <div class="minibanner-content">
            <h2>India’s leading digital platform for expert services</h2>
        </div>
    </div>


    {{-- ABOUT US --}}
    <div class="container about">

        <div class="row d-flex justify-content-center text-center mt-5 para">
            <div class="col-md-10">
                <h2>WHO WE ARE ?</h2>
                <p>At our core, we are a multi-faceted team of passionate individuals driven by a shared vision: to deliver
                    quality, trust, and innovation across every service we offer. From wellness and personal care products
                    rooted in nature and tradition, to expertly curated e-commerce solutions that bring the best of
                    lifestyle, health, and daily essentials to your doorstep — our work reflects a deep understanding of
                    what today’s customer truly needs.

                    We believe in authenticity, transparency, and a customer-first approach in everything we do. Whether
                    it's formulating Ayurvedic remedies using time-tested ingredients, helping brands grow through digital
                    services, offering ethical handmade collections, or managing logistics and product delivery — we handle
                    each step with precision, care, and professionalism.

                    Our mission is to bridge tradition with modern needs, combining the purity of nature with the
                    convenience of technology. With a strong commitment to sustainability, quality, and continuous
                    improvement, we’re not just providing products or services — we’re building lasting relationships.

                    Every solution we offer is crafted to make your life easier, healthier, and more empowered. We’re proud
                    to be your trusted partner in wellness, commerce, and growth — and we’re just getting started.

                    Let me know your brand name and exact services, and I’ll personalize this further to fit your business
                    perfectly.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>OUR MISSON</h2>
                    <p>Our approach is based on a deep understanding of our clients' businesses and their customers. We
                        believe in building long-term relationships with our clients and working closely with them to
                        achieve their goals. Our team of experts stays up-to-date with the latest trends and technologies in
                        the digital marketing industry to ensure that our clients stay ahead of the competition.</p>
                </div>
                <div class="col-md-6">
                    <h2>Our Approach</h2>
                    <p>Our approach is based on a deep understanding of our clients' businesses and their customers. We
                        believe in building long-term relationships with our clients and working closely with them to
                        achieve their goals. Our team of experts stays up-to-date with the latest trends and technologies in
                        the digital marketing industry to ensure that our clients stay ahead of the competition.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- QUICK VIEW --}}
    <div class="container qview">
        <div class="row text-center"> 
                <h2>QUICK VIEW</h2>
                <div class="col-6 col-md-3 mb-4">
                    <div class="counter-box">
                        <h2 class="count display-5 fw-bold" data-count="5000">0</h2>
                        <p class="text-muted">Happy Customers</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 mb-4">
                    <div class="counter-box">
                        <h2 class="count display-5 fw-bold" data-count="250">0</h2>
                        <p class="text-muted">Products</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 mb-4">
                    <div class="counter-box">
                        <h2 class="count display-5 fw-bold" data-count="10">0</h2>
                        <p class="text-muted">Years Experience</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 mb-4">
                    <div class="counter-box">
                        <h2 class="count display-5 fw-bold" data-count="24">0</h2>
                        <p class="text-muted">Support Hours</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll('.count');
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const speed = 200; // lower = faster
                    const inc = Math.ceil(target / speed);

                    if (count < target) {
                        counter.innerText = count + inc;
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        });
    </script>


@endsection