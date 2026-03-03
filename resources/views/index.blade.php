@extends('layouts.master')

@section('content')

    @include('hero')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/img/carousel-1.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Craftsmanship Meets Precision</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Premium Wood Works & Interior Solutions</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We design and execute premium carpentry and interior projects with reliable quality and finishing standards that scale from homes to industrial sites.</p>
                                <a href="{{ route('projects') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View Projects</a>
                                <a href="{{ route('contact') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Get Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Expert Execution</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Interior Fit-outs & Custom Carpentry</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">From custom furniture to complete interior execution, our team delivers quality craftsmanship with professional project management.</p>
                                <a href="{{ route('services') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Services</a>
                                <a href="{{ route('contact') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Start a Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/img/carousel-3.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Industrial Grade Quality</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Decorative Carving & Industrial Fit-outs</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Heavy-duty carpentry and decorative solutions for commercial and industrial environments, built with precision and durability.</p>
                                <a href="{{ route('portfolio') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">View Portfolio</a>
                                <a href="{{ route('contact') }}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Get Free Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light" style="width: 60px; height: 60px;">
                            <i class="fa fa-user-check fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">01</h1>
                    </div>
                    <h5>Expert Craftsmen</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light" style="width: 60px; height: 60px;">
                            <i class="fa fa-check fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">02</h1>
                    </div>
                    <h5>Premium Quality</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light" style="width: 60px; height: 60px;">
                            <i class="fa fa-drafting-compass fa-2x text-primary"></i>
                        </div>
                        <h1 class="display-1 text-light mb-0">03</h1>
                    </div>
                    <h5>Free Consultation</h5>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-light" style="width: 60px; height: 60px;">
                            <i class="fa fa-headphones fa-2x text-primary"></i>
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
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/about.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">About ARS Wood Works</h1>
                        </div>
                        <p class="mb-4 pb-2">ARS Wood Works delivers modular and custom wood solutions, complete interior execution, decorative carving, and heavy-duty carpentry for commercial and industrial environments. Our workflow covers consultation, design, fabrication, finishing, quality review, and handover.</p>
                        <div class="row g-4 mb-4 pb-2">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-users fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">500</h2>
                                        <p class="fw-medium mb-0">Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h2 class="text-primary mb-1" data-toggle="counter-up">750</h2>
                                        <p class="fw-medium mb-0">Projects Done</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('about') }}" class="btn btn-primary py-3 px-5">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Services</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/service-1.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">General Carpentry</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable timelines.</p>
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/service-2.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Furniture Manufacturing</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable timelines.</p>
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/service-3.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Furniture Remodeling</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable timelines.</p>
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/service-4.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Wooden Floor</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable timelines.</p>
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/service-5.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Wooden Furniture</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable timelines.</p>
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/service-6.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center border border-5 border-light border-top-0">
                            <h4 class="mb-3">Custom Work</h4>
                            <p>Professional execution with premium materials, quality-controlled processes, and reliable timelines.</p>
                            <a class="fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Work Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">How We Work</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width: 600px;">From the first conversation to the final handover, every step is managed with precision and craftsmanship.</p>
            </div>
            <div class="work-process-timeline">
                <div class="process-line"></div>
                <div class="row g-0">
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="process-step" data-step="1">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-comments fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Consultation</h6>
                            <small class="text-muted">Understand your vision</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="process-step" data-step="2">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-drafting-compass fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Design</h6>
                            <small class="text-muted">Blueprint & planning</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="process-step" data-step="3">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-hammer fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Fabrication</h6>
                            <small class="text-muted">Precision woodwork</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="process-step" data-step="4">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-tools fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Installation</h6>
                            <small class="text-muted">On-site assembly</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="process-step" data-step="5">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-search fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Quality Check</h6>
                            <small class="text-muted">Inspect & refine</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="process-step" data-step="6">
                            <div class="process-icon">
                                <div class="process-icon-inner">
                                    <i class="fa fa-handshake fa-2x"></i>
                                </div>
                                <svg class="process-ring" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="46" />
                                </svg>
                            </div>
                            <h6 class="mt-3 mb-1">Handover</h6>
                            <small class="text-muted">Delivered with care</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Work Process End -->


    <!-- Before & After Start -->
    <div class="container-fluid bg-light overflow-hidden py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">Transformation</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width: 600px;">See the difference our craftsmanship makes. Drag the slider to reveal the before and after.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="ba-wrapper" id="baSlider">
                        <div class="ba-image ba-before">
                            <img src="{{ asset('assets/img/before.jpg') }}" alt="Before renovation">
                            <span class="ba-label ba-label-before">BEFORE</span>
                        </div>
                        <div class="ba-image ba-after">
                            <img src="{{ asset('assets/img/after.jpg') }}" alt="After renovation">
                            <span class="ba-label ba-label-after">AFTER</span>
                        </div>
                        <div class="ba-handle" id="baHandle">
                            <div class="ba-handle-line"></div>
                            <div class="ba-handle-circle">
                                <i class="fa fa-arrows-alt-h"></i>
                            </div>
                            <div class="ba-handle-line"></div>
                        </div>
                    </div>
                    <div class="row mt-4 g-3">
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="ba-stat-card text-center p-3">
                                <i class="fa fa-home fa-2x text-primary mb-2"></i>
                                <h5 class="mb-1">Complete Renovation</h5>
                                <small class="text-muted">Interior + Furniture</small>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="ba-stat-card text-center p-3">
                                <i class="fa fa-calendar-check fa-2x text-primary mb-2"></i>
                                <h5 class="mb-1">45 Days</h5>
                                <small class="text-muted">Project Duration</small>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="ba-stat-card text-center p-3">
                                <i class="fa fa-star fa-2x text-primary mb-2"></i>
                                <h5 class="mb-1">100% Satisfied</h5>
                                <small class="text-muted">Client Approved</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Before & After End -->


    <!-- Room Designer Start -->
    <div class="container-xxl py-5" id="roomDesignerSection">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">Design Your Dream Room</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width: 600px;">Experience our craftsmanship in 3D. Customize walls, floors, and furniture to visualize your perfect space.</p>
            </div>
            <div class="room-designer-wrap wow fadeInUp" data-wow-delay="0.2s">
                <div class="rd-canvas-container" id="rdCanvas"></div>
                <div class="rd-panel">

                    <div class="rd-group">
                        <label class="rd-label">Wall Color</label>
                        <input type="color" id="rdWallColor" value="#f0e8dc" class="rd-color-picker" onchange="rdSetWallColor(this.value)">
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Floor Material</label>
                        <div class="rd-btn-row">
                            <button class="rd-floor-btn active" data-floor="wood" onclick="rdSetFloor('wood')">
                                <span class="rd-swatch" style="background:#b08050"></span> Wood
                            </button>
                            <button class="rd-floor-btn" data-floor="marble" onclick="rdSetFloor('marble')">
                                <span class="rd-swatch" style="background:#e8e0d8"></span> Marble
                            </button>
                            <button class="rd-floor-btn" data-floor="tiles" onclick="rdSetFloor('tiles')">
                                <span class="rd-swatch" style="background:#d0c8c0"></span> Tiles
                            </button>
                        </div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Wood Finish</label>
                        <div class="rd-btn-row">
                            <button class="rd-wood-btn active" data-wood="oak" onclick="rdSetWoodFinish('oak')">
                                <span class="rd-swatch" style="background:#c4a76c"></span> Oak
                            </button>
                            <button class="rd-wood-btn" data-wood="teak" onclick="rdSetWoodFinish('teak')">
                                <span class="rd-swatch" style="background:#9a6b3a"></span> Teak
                            </button>
                            <button class="rd-wood-btn" data-wood="walnut" onclick="rdSetWoodFinish('walnut')">
                                <span class="rd-swatch" style="background:#4a2c17"></span> Walnut
                            </button>
                        </div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Add Furniture</label>
                        <div class="rd-furniture-grid">
                            <button onclick="rdAddFurniture('sofa')" title="Add Sofa">
                                <i class="fa fa-couch"></i><span>Sofa</span>
                            </button>
                            <button onclick="rdAddFurniture('table')" title="Add Table">
                                <i class="fa fa-border-all"></i><span>Table</span>
                            </button>
                            <button onclick="rdAddFurniture('chair')" title="Add Chair">
                                <i class="fa fa-chair"></i><span>Chair</span>
                            </button>
                            <button onclick="rdAddFurniture('cabinet')" title="Add Cabinet">
                                <i class="fa fa-th-large"></i><span>Cabinet</span>
                            </button>
                        </div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Selected</label>
                        <div class="rd-selected-row">
                            <span id="rdSelectedInfo">None</span>
                            <button id="rdRotateBtn" class="rd-icon-btn" style="display:none" onclick="rdRotateSelected()" title="Rotate 45°">
                                <i class="fa fa-redo-alt"></i>
                            </button>
                            <button id="rdDeleteBtn" class="rd-icon-btn rd-danger" style="display:none" onclick="rdDeleteSelected()" title="Remove">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>
                        <div id="rdFurnitureList"></div>
                    </div>

                    <div class="rd-group">
                        <label class="rd-label">Lighting</label>
                        <div class="rd-lighting-row">
                            <button id="rdLightBtn" class="rd-toggle-btn active" onclick="rdToggleLights()">
                                <i class="fa fa-lightbulb"></i> Lights
                            </button>
                            <button id="rdDayBtn" class="rd-toggle-btn active" onclick="rdSetDayMode(true)">
                                <i class="fa fa-sun"></i>
                            </button>
                            <button id="rdNightBtn" class="rd-toggle-btn" onclick="rdSetDayMode(false)">
                                <i class="fa fa-moon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="rd-hint">
                        <small><i class="fa fa-mouse-pointer"></i> Drag to orbit &bull; Scroll to zoom &bull; Click furniture to select &bull; Drag to move</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Designer End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Why Choose ARS</h1>
                        </div>
                        <p class="mb-4 pb-2">We combine decades of carpentry expertise with modern project management to deliver precision results. From residential interiors to industrial-scale fit-outs, our team ensures quality at every stage.</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Quality</p>
                                        <h5 class="mb-0">Services</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-user-check fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Creative</p>
                                        <h5 class="mb-0">Designers</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-drafting-compass fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Free</p>
                                        <h5 class="mb-0">Consultation</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                                        <i class="fa fa-headphones fa-2x text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Customer</p>
                                        <h5 class="mb-0">Support</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/feature.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Our Projects</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">General Carpentry</li>
                        <li class="mx-2" data-filter=".second">Custom Carpentry</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-1.jpg') }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ asset('assets/img/portfolio-1.jpg') }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">General Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-2.jpg') }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ asset('assets/img/portfolio-2.jpg') }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-3.jpg') }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ asset('assets/img/portfolio-3.jpg') }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">General Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-4.jpg') }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ asset('assets/img/portfolio-4.jpg') }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-5.jpg') }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ asset('assets/img/portfolio-5.jpg') }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">General Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-6.jpg') }}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="{{ asset('assets/img/portfolio-6.jpg') }}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2">Custom Carpentry</p>
                            <h5 class="lh-base mb-0">Wooden Furniture Manufacturing And Remodeling</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Quote Start -->
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/quote.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Free Quote</h1>
                        </div>
                        <p class="mb-4 pb-2">ARS Wood Works combines decades of carpentry expertise with modern project management to deliver precision results. Get a free consultation and quote for your next project.</p>
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


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{ asset('assets/img/team-1.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{ asset('assets/img/team-2.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{ asset('assets/img/team-3.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="{{ asset('assets/img/team-4.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-5 border-light border-top-0 p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="{{ asset('assets/img/testimonial-1.jpg') }}" style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team managed the entire project professionally, from custom furniture to complete interior fit-out. Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="{{ asset('assets/img/testimonial-2.jpg') }}" style="width: 90px; height: 90px;">
                    <div class="testimonial-text text-center p-4">
                        <p>ARS Wood Works transformed our office space with exceptional attention to detail. Their team managed the entire project professionally, from custom furniture to complete interior fit-out. Highly recommended for quality craftsmanship.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light p-2 mx-auto mb-3" src="{{ asset('assets/img/testimonial-3.jpg') }}" style="width: 90px; height: 90px;">
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

@push('scripts')
<script>
(function () {
    /* ===== Before / After Slider ===== */
    var wrapper = document.getElementById('baSlider');
    var handle  = document.getElementById('baHandle');
    if (wrapper && handle) {
        var beforeImg = wrapper.querySelector('.ba-before');
        var dragging  = false;

        function setPosition(x) {
            var rect = wrapper.getBoundingClientRect();
            var pct  = Math.max(0, Math.min(1, (x - rect.left) / rect.width));
            beforeImg.style.clipPath = 'inset(0 ' + ((1 - pct) * 100) + '% 0 0)';
            handle.style.left = (pct * 100) + '%';
        }

        wrapper.addEventListener('mousedown', function (e) {
            e.preventDefault();
            dragging = true;
            wrapper.classList.add('active');
            setPosition(e.clientX);
        });
        window.addEventListener('mousemove', function (e) {
            if (!dragging) return;
            setPosition(e.clientX);
        });
        window.addEventListener('mouseup', function () {
            dragging = false;
            wrapper.classList.remove('active');
        });

        wrapper.addEventListener('touchstart', function (e) {
            dragging = true;
            wrapper.classList.add('active');
            setPosition(e.touches[0].clientX);
        }, { passive: true });
        wrapper.addEventListener('touchmove', function (e) {
            if (!dragging) return;
            setPosition(e.touches[0].clientX);
        }, { passive: true });
        wrapper.addEventListener('touchend', function () {
            dragging = false;
            wrapper.classList.remove('active');
        });
    }

    /* ===== Work Process Timeline animation ===== */
    var timeline = document.querySelector('.work-process-timeline');
    if (timeline) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    timeline.classList.add('animated');
                    observer.unobserve(timeline);
                }
            });
        }, { threshold: 0.25 });
        observer.observe(timeline);
    }
})();
</script>
@endpush

@push('scripts')
<script type="importmap">
{
    "imports": {
        "three": "https://cdn.jsdelivr.net/npm/three@0.162.0/build/three.module.js",
        "three/addons/": "https://cdn.jsdelivr.net/npm/three@0.162.0/examples/jsm/"
    }
}
</script>
<script type="module">
    const rdContainer = document.getElementById('rdCanvas');
    if (rdContainer) {
        const obs = new IntersectionObserver(async (entries) => {
            if (entries[0].isIntersecting) {
                obs.disconnect();
                const { initRoomDesigner } = await import('{{ asset("assets/js/room-designer.js") }}');
                initRoomDesigner(rdContainer);
            }
        }, { threshold: 0.1 });
        obs.observe(rdContainer);
    }
</script>
@endpush