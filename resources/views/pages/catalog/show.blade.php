@extends('layouts.master')

@section('title', ($catalogItem->name ?? 'Catalog Item') . ' | ARS Wood Works')

@section('content')
<style>
    .product-page {
        background: linear-gradient(180deg, #f7f5f2 0%, #ffffff 26%, #ffffff 100%);
    }
    .product-breadcrumb {
        font-size: 0.85rem;
        letter-spacing: 0.02em;
    }
    .product-breadcrumb a {
        color: #6b7280;
    }
    .product-breadcrumb a:hover {
        color: #ab7442;
    }
    .product-media-card,
    .product-summary-card,
    .product-spec-card,
    .product-cta-card,
    .related-card {
        background: #ffffff;
        border: 1px solid #ececec;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(17, 24, 39, 0.06);
    }
    .product-image {
        width: 100%;
        max-height: 560px;
        object-fit: cover;
        border-radius: 16px;
    }
    .product-tag {
        display: inline-block;
        border-radius: 999px;
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 8px 12px;
        background: rgba(171, 116, 66, 0.12);
        color: #ab7442;
    }
    .product-meta-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }
    .product-meta-item {
        border-radius: 12px;
        background: #f9fafb;
        border: 1px solid #edf1f4;
        padding: 12px 14px;
    }
    .product-meta-item span {
        display: block;
        color: #6b7280;
        font-size: 0.8rem;
        margin-bottom: 2px;
    }
    .product-meta-item strong {
        color: #111827;
        font-size: 0.95rem;
    }
    .product-section-title {
        font-weight: 700;
        color: #111827;
    }
    .spec-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .spec-item {
        border: 1px solid #edf1f4;
        border-radius: 12px;
        padding: 12px 14px;
        background: #f8fafb;
    }
    .spec-item .label {
        color: #374151;
        font-size: 0.84rem;
        font-weight: 700;
        display: block;
        margin-bottom: 4px;
    }
    .spec-item .value {
        color: #4b5563;
        margin-bottom: 0;
    }
    .related-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }
    .related-card {
        overflow: hidden;
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 32px rgba(17, 24, 39, 0.09);
    }
    @media (max-width: 575.98px) {
        .product-meta-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }
</style>

@php
    $imagePath = $catalogItem->image ?: 'assets/img/portfolio-1.jpg';
    $imageUrl = \Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
        ? $imagePath
        : (str_starts_with($imagePath, 'assets/') ? asset($imagePath) : asset(ltrim($imagePath, '/')));

    $specs = is_array($catalogItem->specifications) ? $catalogItem->specifications : [];
@endphp

<div class="container-fluid product-page py-5">
    <div class="container py-2 py-lg-3">
        <div class="product-breadcrumb mb-3">
            <a href="{{ route('home') }}">Home</a>
            <span class="mx-2 text-muted">/</span>
            <a href="{{ route('catalog') }}">Catalog</a>
            <span class="mx-2 text-muted">/</span>
            <span class="text-dark">{{ $catalogItem->name }}</span>
        </div>

        <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-media-card p-3 p-md-4">
                    <img src="{{ $imageUrl }}" alt="{{ $catalogItem->name }}" class="product-image">
                </div>
            </div>

            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="product-summary-card p-4 p-lg-5 mb-4">
                    <span class="product-tag">{{ $catalogItem->category }}</span>
                    <h1 class="h2 mt-3 mb-3">{{ $catalogItem->name }}</h1>
                    <p class="text-muted mb-4">{{ $catalogItem->description ?: 'Detailed description will be updated shortly for this product.' }}</p>

                    <div class="product-meta-grid mb-4">
                        <div class="product-meta-item">
                            <span>Category</span>
                            <strong>{{ $catalogItem->category }}</strong>
                        </div>
                        <div class="product-meta-item">
                            <span>Specifications</span>
                            <strong>{{ count($specs) }} {{ count($specs) === 1 ? 'detail' : 'details' }}</strong>
                        </div>
                        <div class="product-meta-item">
                            <span>Availability</span>
                            <strong>Made to Order</strong>
                        </div>
                        <div class="product-meta-item">
                            <span>Support</span>
                            <strong>Design Consultation</strong>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('contact') }}" class="btn btn-primary py-2 px-4">
                            Request Quote
                        </a>
                        @if($catalogItem->attachment)
                            <a href="{{ asset($catalogItem->attachment) }}" class="btn btn-dark py-2 px-4" target="_blank" rel="noopener">
                                Download Attachment
                            </a>
                        @endif
                        <a href="{{ route('catalog') }}" class="btn btn-outline-primary py-2 px-4">
                            Back to Catalog
                        </a>
                    </div>
                </div>

                <div class="product-cta-card p-4">
                    <h5 class="mb-2">Need This in a Custom Size?</h5>
                    <p class="text-muted mb-3">Share your dimensions and preferred finish, and our team will provide a tailored quote.</p>
                    <a href="{{ route('contact') }}" class="btn btn-dark py-2 px-4">Talk to Expert</a>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-spec-card p-4 p-lg-5">
                    <h4 class="product-section-title mb-3">Product Specifications</h4>

                    @if(!empty($specs))
                        <div class="spec-list">
                            @foreach($specs as $key => $value)
                                <div class="spec-item">
                                    @if(is_string($key))
                                        <span class="label">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
                                        <p class="value">{{ $value }}</p>
                                    @else
                                        <p class="value">{{ $value }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">Specification details will be added soon.</p>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="product-spec-card p-4 h-100">
                    <h5 class="mb-3">Why Choose ARS</h5>
                    <div class="d-flex align-items-start mb-3">
                        <i class="fa-solid fa-check-circle text-primary mt-1 me-2"></i>
                        <p class="mb-0 text-muted">Premium craftsmanship with durable materials.</p>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <i class="fa-solid fa-check-circle text-primary mt-1 me-2"></i>
                        <p class="mb-0 text-muted">Design-first execution for homes and commercial spaces.</p>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="fa-solid fa-check-circle text-primary mt-1 me-2"></i>
                        <p class="mb-0 text-muted">Clear timelines and professional project support.</p>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($relatedCatalogItems) && $relatedCatalogItems->isNotEmpty())
            <div class="mt-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="mb-0">Related Products</h4>
                    <a href="{{ route('catalog') }}" class="fw-semibold">View All</a>
                </div>

                <div class="row g-4">
                    @foreach($relatedCatalogItems as $relatedItem)
                        @php
                            $relatedImagePath = $relatedItem->image ?: 'assets/img/portfolio-1.jpg';
                            $relatedImageUrl = \Illuminate\Support\Str::startsWith($relatedImagePath, ['http://', 'https://'])
                                ? $relatedImagePath
                                : (str_starts_with($relatedImagePath, 'assets/') ? asset($relatedImagePath) : asset(ltrim($relatedImagePath, '/')));
                        @endphp

                        <div class="col-md-6 col-xl-4">
                            <article class="related-card">
                                <img src="{{ $relatedImageUrl }}" alt="{{ $relatedItem->name }}" class="related-image">
                                <div class="p-4">
                                    <span class="product-tag mb-2">{{ $relatedItem->category }}</span>
                                    <h5 class="mt-2">{{ $relatedItem->name }}</h5>
                                    <p class="text-muted mb-3">{{ \Illuminate\Support\Str::limit($relatedItem->description, 90) }}</p>
                                    <a href="{{ route('catalog.show', $relatedItem->slug) }}" class="btn btn-outline-primary py-2 px-4">View Product</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        
        <div class="text-center mt-5">
            <a href="{{ route('catalog') }}" class="btn btn-primary py-3 px-5">
                Explore More Products
            </a>
        </div>
    </div>
</div>
@endsection
