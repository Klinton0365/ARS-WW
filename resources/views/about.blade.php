@extends('layouts.master')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-user-check fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">01</h1>
                    </div>
                    <h5>Expert Craftsmen</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-check fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">02</h1>
                    </div>
                    <h5>Premium Quality</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-drafting-compass fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">03</h1>
                    </div>
                    <h5>Free Consultation</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-headphones fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">04</h1>
                    </div>
                    <h5>Dedicated Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->



    <!-- About Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <video class="position-absolute w-100 h-100" style="object-fit: cover;" autoplay muted loop playsinline>
                            <source src="{{ asset('assets/img/6035510_Man_People_3840x2160.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">About ARS Wood Works</h1>
                        </div>
                        <p class="mb-4 pb-2">ARS Wood Works delivers modular and custom wood solutions, complete interior execution, decorative carving, and heavy-duty carpentry. Our workflow covers consultation, design, fabrication, finishing, quality review, and handover documentation.</p>
                        <div class="row g-4 mb-4 pb-2">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa-solid fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">1234</h2>
                                        <p class="fw-medium mb-0">Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa-solid fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">1234</h2>
                                        <p class="fw-medium mb-0">Projects Done</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-5">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Expert Service Teams Start -->
    <style>
        .svc-team-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--line);
            transition: all 0.4s ease;
            height: 100%;
        }
        .svc-team-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(30,95,174,0.12);
            border-color: var(--primary);
        }
        .svc-team-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin: 0 auto 16px;
            transition: all 0.4s ease;
        }
        .svc-team-card:hover .svc-team-icon {
            transform: scale(1.1);
        }
        .svc-team-count {
            display: inline-block;
            background: var(--accent-soft);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 20px;
            margin-bottom: 10px;
        }
        .svc-team-list {
            list-style: none;
            padding: 0;
            margin: 16px 0 0;
        }
        .svc-team-list li {
            padding: 6px 0;
            font-size: 0.88rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .svc-team-list li i {
            color: var(--primary);
            font-size: 0.7rem;
        }
    </style>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-2">Our Expert Teams</h1>
                <p class="text-muted mx-auto mb-5" style="max-width:600px;">Dedicated specialist teams for every stage of your project — from design to final handover.</p>
            </div>
            <div class="row g-4">
                <!-- Design & Consultation -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="svc-team-card text-center p-4">
                        <div class="svc-team-icon" style="background:rgba(30,95,174,0.1); color:#1E5FAE;">
                            <i class="fa-solid fa-compass-drafting"></i>
                        </div>
                        <span class="svc-team-count">8 Experts</span>
                        <h5 class="mb-1">Design & Consultation</h5>
                        <small class="text-muted d-block mb-2">Planning your vision</small>
                        <ul class="svc-team-list text-start">
                            <li><i class="fa-solid fa-check"></i> Space measurement & analysis</li>
                            <li><i class="fa-solid fa-check"></i> 3D design visualization</li>
                            <li><i class="fa-solid fa-check"></i> Material consultation</li>
                            <li><i class="fa-solid fa-check"></i> Budget planning</li>
                        </ul>
                    </div>
                </div>

                <!-- Carpentry & Fabrication -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="svc-team-card text-center p-4">
                        <div class="svc-team-icon" style="background:rgba(0,188,212,0.1); color:#00BCD4;">
                            <i class="fa-solid fa-hammer"></i>
                        </div>
                        <span class="svc-team-count">15 Craftsmen</span>
                        <h5 class="mb-1">Carpentry & Fabrication</h5>
                        <small class="text-muted d-block mb-2">Building with precision</small>
                        <ul class="svc-team-list text-start">
                            <li><i class="fa-solid fa-check"></i> Custom furniture making</li>
                            <li><i class="fa-solid fa-check"></i> Modular kitchen & wardrobes</li>
                            <li><i class="fa-solid fa-check"></i> Decorative wood carving</li>
                            <li><i class="fa-solid fa-check"></i> CNC & machine work</li>
                        </ul>
                    </div>
                </div>

                <!-- Interior Execution -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="svc-team-card text-center p-4">
                        <div class="svc-team-icon" style="background:rgba(76,175,80,0.1); color:#4CAF50;">
                            <i class="fa-solid fa-couch"></i>
                        </div>
                        <span class="svc-team-count">12 Specialists</span>
                        <h5 class="mb-1">Interior Execution</h5>
                        <small class="text-muted d-block mb-2">Bringing spaces to life</small>
                        <ul class="svc-team-list text-start">
                            <li><i class="fa-solid fa-check"></i> Full home interiors</li>
                            <li><i class="fa-solid fa-check"></i> Office & commercial fit-outs</li>
                            <li><i class="fa-solid fa-check"></i> Flooring & wall panelling</li>
                            <li><i class="fa-solid fa-check"></i> Lighting & finishing</li>
                        </ul>
                    </div>
                </div>

                <!-- Quality & Handover -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="svc-team-card text-center p-4">
                        <div class="svc-team-icon" style="background:rgba(255,152,0,0.1); color:#FF9800;">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <span class="svc-team-count">6 Inspectors</span>
                        <h5 class="mb-1">Quality & Handover</h5>
                        <small class="text-muted d-block mb-2">Ensuring perfection</small>
                        <ul class="svc-team-list text-start">
                            <li><i class="fa-solid fa-check"></i> Multi-point quality check</li>
                            <li><i class="fa-solid fa-check"></i> Finishing & polish review</li>
                            <li><i class="fa-solid fa-check"></i> Client walkthrough</li>
                            <li><i class="fa-solid fa-check"></i> Warranty documentation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Expert Service Teams End -->
@endsection
