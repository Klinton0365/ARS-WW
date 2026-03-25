@extends('layouts.master')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Service</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <style>
        .svc-section { background: #faf8f5; }
        .svc-subtitle { color: #C89B6D; font-weight: 600; letter-spacing: 3px; text-transform: uppercase; font-size: 0.85rem; }
        .svc-card {
            position: relative;
            background: #fff;
            border-radius: 16px;
            padding: 40px 30px;
            text-align: center;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 1px solid rgba(200,155,109,0.12);
            height: 100%;
        }
        .svc-card::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #C89B6D, #a07a4e);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        .svc-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(200,155,109,0.15);
            border-color: rgba(200,155,109,0.3);
        }
        .svc-card:hover::before { transform: scaleX(1); }
        .svc-icon-wrap {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(200,155,109,0.1), rgba(200,155,109,0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: all 0.4s ease;
        }
        .svc-card:hover .svc-icon-wrap {
            background: linear-gradient(135deg, #C89B6D, #a07a4e);
            transform: scale(1.1);
        }
        .svc-icon-wrap i {
            font-size: 32px;
            color: #C89B6D;
            transition: color 0.4s ease;
        }
        .svc-card:hover .svc-icon-wrap i { color: #fff; }
        .svc-card h4 {
            font-family: 'Manrope', sans-serif;
            font-weight: 700;
            font-size: 1.15rem;
            color: #1E1E1E;
            margin-bottom: 0;
            transition: margin 0.4s ease;
        }
        .svc-card:hover h4 { margin-bottom: 12px; }
        .svc-card-body {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.4s ease;
        }
        .svc-card:hover .svc-card-body {
            max-height: 160px;
            opacity: 1;
        }
        .svc-card-body p {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 14px;
        }
        .svc-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            color: #C89B6D;
            text-decoration: none;
            transition: gap 0.3s ease;
        }
        .svc-link:hover { gap: 10px; color: #a07a4e; }
        @media (max-width: 767px) {
            .svc-card { padding: 30px 20px; }
            .svc-icon-wrap { width: 64px; height: 64px; }
            .svc-icon-wrap i { font-size: 26px; }
        }
    </style>
    <div class="container-xxl py-5 svc-section">
        <div class="container">
            <div class="text-center mb-5">
                <p class="svc-subtitle wow fadeInUp">What We Do</p>
                <h1 class="display-5 fw-bold wow fadeInUp" data-wow-delay="0.1s" style="color:#1E1E1E;">Our Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="svc-card">
                        <div class="svc-icon-wrap">
                            <i class="fa fa-hammer"></i>
                        </div>
                        <h4>General Carpentry</h4>
                        <div class="svc-card-body">
                            <p>From structural framing to fine trim work — professional execution with premium materials and reliable timelines.</p>
                            <a href="{{ route('services') }}" class="svc-link">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="svc-card">
                        <div class="svc-icon-wrap">
                            <i class="fa fa-couch"></i>
                        </div>
                        <h4>Furniture Manufacturing</h4>
                        <div class="svc-card-body">
                            <p>Bespoke furniture crafted to your exact specifications — from concept sketches to showroom-quality pieces.</p>
                            <a href="{{ route('services') }}" class="svc-link">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="svc-card">
                        <div class="svc-icon-wrap">
                            <i class="fa fa-sync-alt"></i>
                        </div>
                        <h4>Furniture Remodeling</h4>
                        <div class="svc-card-body">
                            <p>Breathe new life into existing pieces. We restore, refinish, and reimagine furniture to match your evolving style.</p>
                            <a href="{{ route('services') }}" class="svc-link">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="svc-card">
                        <div class="svc-icon-wrap">
                            <i class="fa fa-th-large"></i>
                        </div>
                        <h4>Wooden Flooring</h4>
                        <div class="svc-card-body">
                            <p>Hardwood, engineered, and parquet flooring — installed with precision for warmth and elegance underfoot.</p>
                            <a href="{{ route('services') }}" class="svc-link">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="svc-card">
                        <div class="svc-icon-wrap">
                            <i class="fa fa-chair"></i>
                        </div>
                        <h4>Wooden Furniture</h4>
                        <div class="svc-card-body">
                            <p>Tables, cabinets, wardrobes, and shelving — handcrafted from select timber with meticulous joinery.</p>
                            <a href="{{ route('services') }}" class="svc-link">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="svc-card">
                        <div class="svc-icon-wrap">
                            <i class="fa fa-pencil-ruler"></i>
                        </div>
                        <h4>Custom Work</h4>
                        <div class="svc-card-body">
                            <p>Unique projects that defy categories — decorative carving, built-ins, and one-of-a-kind commissioned pieces.</p>
                            <a href="{{ route('services') }}" class="svc-link">Learn More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/Yin Yang.png') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Free Quote</h1>
                        </div>
                        <p class="mb-4 pb-2">ARS Wood Works combines decades of carpentry expertise with modern project management. Get a free consultation and quote for your next project.</p>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Note"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team managed the entire project professionally, from custom furniture to complete interior fit-out. Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team managed the entire project professionally, from custom furniture to complete interior fit-out. Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team managed the entire project professionally, from custom furniture to complete interior fit-out. Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        
@endsection
