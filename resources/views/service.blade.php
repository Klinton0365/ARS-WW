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


    <!-- Testimonial / Reviews Start -->
    <style>
        .gr-section { background: #fff; }
        .gr-header { display: flex; align-items: center; gap: 14px; justify-content: center; margin-bottom: 10px; }
        .gr-google-icon { width: 36px; height: 36px; }
        .gr-rating-big { font-size: 2.8rem; font-weight: 700; color: #1E1E1E; line-height: 1; }
        .gr-stars { color: #FBBC04; font-size: 1.1rem; letter-spacing: 2px; }
        .gr-stars-sm { color: #FBBC04; font-size: 0.85rem; letter-spacing: 1px; }
        .gr-meta { color: #70757a; font-size: 0.85rem; }
        .gr-card {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 12px;
            padding: 28px 24px;
            height: 100%;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .gr-card:hover {
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            transform: translateY(-4px);
        }
        .gr-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            color: #fff;
            flex-shrink: 0;
        }
        .gr-name { font-weight: 600; font-size: 0.95rem; color: #1E1E1E; }
        .gr-time { font-size: 0.78rem; color: #70757a; }
        .gr-tag {
            display: inline-block;
            background: #f1f3f4;
            color: #5f6368;
            font-size: 0.72rem;
            font-weight: 500;
            padding: 3px 10px;
            border-radius: 20px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .gr-text { font-size: 0.9rem; color: #3c4043; line-height: 1.65; margin: 14px 0 0; }
        .gr-verified { color: #34A853; font-size: 0.78rem; font-weight: 500; }
    </style>
    <div class="container-xxl py-5 gr-section">
        <div class="container">
            <!-- Google-style summary header -->
            <div class="text-center mb-5 wow fadeInUp">
                <div class="gr-header">
                    <svg class="gr-google-icon" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59A14.5 14.5 0 0 1 9.5 24c0-1.59.28-3.14.76-4.59l-7.98-6.19A23.99 23.99 0 0 0 0 24c0 3.77.9 7.34 2.44 10.5l8.09-5.91z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
                    <div>
                        <div class="gr-rating-big">4.9</div>
                    </div>
                    <div class="text-start">
                        <div class="gr-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <div class="gr-meta">Based on 120+ reviews</div>
                    </div>
                </div>
            </div>

            <!-- Review cards -->
            <div class="row g-4">
                <!-- Review 1: Corporate Office -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="gr-card">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="gr-avatar" style="background:#4285F4;">M</div>
                            <div>
                                <div class="gr-name">Murugan Selvam</div>
                                <div class="gr-time">3 weeks ago</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="gr-stars-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            <span class="gr-tag">Corporate Office</span>
                        </div>
                        <p class="gr-text">Completely redesigned our 5,000 sq ft office space. The modular workstations, conference table, and reception desk are outstanding. Project was delivered on time and the team was extremely professional throughout.</p>
                        <div class="gr-verified"><i class="fa fa-check-circle me-1"></i>Verified Customer</div>
                    </div>
                </div>

                <!-- Review 2: Home Interior -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="gr-card">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="gr-avatar" style="background:#EA4335;">K</div>
                            <div>
                                <div class="gr-name">Kavitha Pandian</div>
                                <div class="gr-time">1 month ago</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="gr-stars-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            <span class="gr-tag">Home Interior</span>
                        </div>
                        <p class="gr-text">We hired ARS for our full home interior — kitchen cabinets, wardrobes, TV unit, and wooden flooring. The finish quality is premium and the wood selection was exactly what we wanted. Our home looks like a magazine now!</p>
                        <div class="gr-verified"><i class="fa fa-check-circle me-1"></i>Verified Customer</div>
                    </div>
                </div>

                <!-- Review 3: Restaurant -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="gr-card">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="gr-avatar" style="background:#FBBC04; color:#1E1E1E;">S</div>
                            <div>
                                <div class="gr-name">Senthil Kumar</div>
                                <div class="gr-time">2 months ago</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="gr-stars-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            <span class="gr-tag">Restaurant</span>
                        </div>
                        <p class="gr-text">ARS built all the custom furniture for our new restaurant — dining tables, bar counter, booth seating, and decorative wall panels. Guests constantly compliment the interiors. Worth every rupee. Highly recommend!</p>
                        <div class="gr-verified"><i class="fa fa-check-circle me-1"></i>Verified Customer</div>
                    </div>
                </div>

                <!-- Review 4: Apartment -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="gr-card">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="gr-avatar" style="background:#34A853;">T</div>
                            <div>
                                <div class="gr-name">Tamilselvi Rajan</div>
                                <div class="gr-time">3 months ago</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="gr-stars-sm">&#9733;&#9733;&#9733;&#9733;<span style="color:#dadce0;">&#9733;</span></span>
                            <span class="gr-tag">Apartment</span>
                        </div>
                        <p class="gr-text">Got my 2BHK apartment fully furnished by ARS Wood Works. The modular kitchen and wardrobe designs are very functional and look beautiful. Small delay in delivery but the quality made up for it. Very happy overall.</p>
                        <div class="gr-verified"><i class="fa fa-check-circle me-1"></i>Verified Customer</div>
                    </div>
                </div>

                <!-- Review 5: Industrial / Warehouse -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="gr-card">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="gr-avatar" style="background:#673AB7;">A</div>
                            <div>
                                <div class="gr-name">Arun Prakash</div>
                                <div class="gr-time">4 months ago</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="gr-stars-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            <span class="gr-tag">Industrial</span>
                        </div>
                        <p class="gr-text">We needed heavy-duty shelving, storage units, and a custom packing station for our warehouse. ARS delivered industrial-grade carpentry that is sturdy and well-built. They understood our requirements perfectly.</p>
                        <div class="gr-verified"><i class="fa fa-check-circle me-1"></i>Verified Customer</div>
                    </div>
                </div>

                <!-- Review 6: Villa -->
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="gr-card">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="gr-avatar" style="background:#FF5722;">M</div>
                            <div>
                                <div class="gr-name">Meenakshi Sundaram</div>
                                <div class="gr-time">5 months ago</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="gr-stars-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            <span class="gr-tag">Luxury Villa</span>
                        </div>
                        <p class="gr-text">ARS handled the complete woodwork for our villa — staircase, ceiling panels, bedroom furniture, and garden pergola. The craftsmanship is exceptional. Our architect was impressed too. They truly care about their work.</p>
                        <div class="gr-verified"><i class="fa fa-check-circle me-1"></i>Verified Customer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial / Reviews End -->
        
@endsection
