@extends('layouts.master')

@section('title', ($catalogItem->name ?? 'Catalog Item') . ' | ARS Wood Works')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $catalogItem->name }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('catalog') }}">Catalog</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{ $catalogItem->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        .catalog-detail-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 16px;
            overflow: hidden;
        }
        .catalog-cover {
            width: 100%;
            max-height: 520px;
            object-fit: cover;
            border-radius: 16px;
        }
        .catalog-meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
        .catalog-meta-item {
            border-radius: 12px;
            background: var(--light);
            border: 1px solid var(--line);
            padding: 14px 16px;
        }
        .catalog-meta-item small { display: block; color: var(--muted); font-size: 0.78rem; margin-bottom: 2px; }
        .catalog-meta-item strong { color: var(--dark); font-size: 0.95rem; }
        .spec-list { display: flex; flex-direction: column; gap: 10px; }
        .spec-item {
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 14px 16px;
            background: var(--light);
        }
        .spec-item .label { color: var(--dark); font-size: 0.84rem; font-weight: 700; display: block; margin-bottom: 4px; }
        .spec-item .value { color: var(--muted); margin-bottom: 0; }
        .related-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        @media (max-width: 575.98px) {
            .catalog-meta-grid { grid-template-columns: 1fr; }
        }
    </style>

    @php
        $imagePath = $catalogItem->image ?: 'assets/img/portfolio-1.jpg';
        $imageUrl = \Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
            ? $imagePath
            : asset(ltrim($imagePath, '/'));
        $specs = is_array($catalogItem->specifications) ? $catalogItem->specifications : [];
    @endphp

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Left: Image -->
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="catalog-detail-card p-3">
                        <img src="{{ $imageUrl }}" alt="{{ $catalogItem->name }}" class="catalog-cover">
                    </div>
                </div>

                <!-- Right: Summary -->
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="catalog-detail-card p-4 mb-4">
                        <span class="badge text-white px-3 py-2 mb-3" style="background:var(--primary);border-radius:6px;font-size:0.75rem;">{{ $catalogItem->category }}</span>
                        <h2 class="mb-3" style="font-weight:700;">{{ $catalogItem->name }}</h2>
                        <p class="text-muted mb-4" style="line-height:1.7;">{{ $catalogItem->description ?: 'Detailed description will be updated shortly.' }}</p>

                        <div class="catalog-meta-grid mb-4">
                            <div class="catalog-meta-item">
                                <small>Category</small>
                                <strong>{{ $catalogItem->category }}</strong>
                            </div>
                            <div class="catalog-meta-item">
                                <small>Specifications</small>
                                <strong>{{ count($specs) }} {{ count($specs) === 1 ? 'detail' : 'details' }}</strong>
                            </div>
                            <div class="catalog-meta-item">
                                <small>Availability</small>
                                <strong>Made to Order</strong>
                            </div>
                            <div class="catalog-meta-item">
                                <small>Support</small>
                                <strong>Design Consultation</strong>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('contact') }}" class="btn btn-primary py-2 px-4">
                                <i class="fa-solid fa-arrow-right me-2"></i>Request Quote
                            </a>
                            @if($catalogItem->attachment)
                                <a href="{{ asset($catalogItem->attachment) }}" class="btn btn-outline-primary py-2 px-4" target="_blank" rel="noopener">
                                    <i class="fa-solid fa-download me-2"></i>Download Brochure
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="catalog-detail-card p-4 text-center" style="background:var(--accent-soft);">
                        <i class="fa-solid fa-ruler-combined fa-2x mb-3" style="color:var(--primary);"></i>
                        <h5 class="mb-2" style="font-weight:700;">Need a Custom Size?</h5>
                        <p class="text-muted mb-3" style="font-size:0.9rem;">Share your dimensions and preferred finish for a tailored quote.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary py-2 px-4">Talk to Expert</a>
                    </div>
                </div>
            </div>

            <!-- Specifications + Why Choose -->
            <div class="row g-4 mt-3">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="catalog-detail-card p-4">
                        <h4 class="mb-3" style="font-weight:700;"><i class="fa-solid fa-list-check me-2 text-primary"></i>Product Specifications</h4>
                        @if(!empty($specs))
                            <div class="spec-list">
                                @foreach($specs as $key => $value)
                                    <div class="spec-item">
                                        @if(is_string($key))
                                            <span class="label">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
                                            <p class="value">{{ $value }}</p>
                                        @else
                                            <p class="value mb-0">{{ $value }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mb-0">Specification details will be added soon.</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="catalog-detail-card p-4 h-100">
                        <h5 class="mb-3" style="font-weight:700;">Why Choose ARS</h5>
                        <div class="d-flex align-items-start mb-3">
                            <i class="fa-solid fa-check-circle text-primary mt-1 me-2"></i>
                            <p class="mb-0 text-muted">Premium craftsmanship with durable materials.</p>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <i class="fa-solid fa-check-circle text-primary mt-1 me-2"></i>
                            <p class="mb-0 text-muted">Design-first execution for homes and commercial spaces.</p>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <i class="fa-solid fa-check-circle text-primary mt-1 me-2"></i>
                            <p class="mb-0 text-muted">Clear timelines and professional project support.</p>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="fa-solid fa-check-circle text-primary mt-1 me-2"></i>
                            <p class="mb-0 text-muted">Free design consultation included.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @if(isset($relatedCatalogItems) && $relatedCatalogItems->isNotEmpty())
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0" style="font-weight:700;">Related Products</h4>
                        <a href="{{ route('catalog') }}" class="text-primary fw-semibold" style="text-decoration:none;">View All <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                    <div class="row g-4">
                        @foreach($relatedCatalogItems as $relatedItem)
                            @php
                                $relatedImagePath = $relatedItem->image ?: 'assets/img/portfolio-1.jpg';
                                $relatedImageUrl = \Illuminate\Support\Str::startsWith($relatedImagePath, ['http://', 'https://'])
                                    ? $relatedImagePath
                                    : asset(ltrim($relatedImagePath, '/'));
                            @endphp
                            <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="{{ ($loop->index % 3) * 0.2 + 0.1 }}s">
                                <div class="h-100 rounded overflow-hidden" style="border:1px solid var(--line);background:#fff;transition:all 0.4s ease;">
                                    <div style="height:180px;overflow:hidden;">
                                        <img class="img-fluid w-100 h-100" src="{{ $relatedImageUrl }}" alt="{{ $relatedItem->name }}" style="object-fit:cover;">
                                    </div>
                                    <div class="p-4">
                                        <span class="badge text-white px-2 py-1 mb-2" style="background:var(--primary);border-radius:6px;font-size:0.7rem;">{{ $relatedItem->category }}</span>
                                        <h5 class="mb-2">{{ $relatedItem->name }}</h5>
                                        <p class="text-muted mb-3" style="font-size:0.88rem;">{{ \Illuminate\Support\Str::limit($relatedItem->description, 80) }}</p>
                                        <a href="{{ route('catalog.show', $relatedItem->slug) }}" class="btn btn-primary btn-sm px-3">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Back -->
            <div class="text-center mt-5">
                <a href="{{ route('catalog') }}" class="text-muted" style="text-decoration:none;">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back to Full Catalog
                </a>
            </div>
        </div>
    </div>
@endsection
