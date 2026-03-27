@extends('layouts.master')

@section('title', ($product->name ?? 'Product') . ' | ARS Wood Works')

@section('content')
<style>
    .product-detail-page {
        background: linear-gradient(180deg, #f7f5f2 0%, #ffffff 26%, #ffffff 100%);
    }
    .product-detail-card,
    .product-detail-side,
    .product-detail-specs,
    .product-related-card {
        background: #ffffff;
        border: 1px solid #ececec;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(17, 24, 39, 0.06);
    }
    .product-detail-image {
        width: 100%;
        max-height: 560px;
        object-fit: cover;
        border-radius: 16px;
    }
    .product-detail-tag {
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
    .product-spec-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .product-spec-item {
        border: 1px solid #edf1f4;
        border-radius: 12px;
        padding: 12px 14px;
        background: #f8fafb;
    }
    .product-spec-label {
        color: #374151;
        font-size: 0.84rem;
        font-weight: 700;
        display: block;
        margin-bottom: 4px;
    }
    .product-related-card {
        overflow: hidden;
        height: 100%;
    }
    .product-related-image {
        width: 100%;
        height: 170px;
        object-fit: cover;
    }
</style>

@php
    $imagePath = $product->image ?: 'assets/img/portfolio-1.jpg';
    $imageUrl = \Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
        ? $imagePath
        : (str_starts_with($imagePath, 'assets/') ? asset($imagePath) : asset(ltrim($imagePath, '/')));
    $specs = is_array($product->specifications) ? $product->specifications : [];
@endphp

<div class="container-fluid product-detail-page py-5">
    <div class="container py-3">
        <div class="mb-4">
            <a href="{{ route('products') }}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left me-2"></i>Back to Products</a>
        </div>

        <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-detail-card p-3 p-md-4">
                    <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="product-detail-image">
                </div>
            </div>

            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="product-detail-side p-4 p-lg-5 mb-4">
                    <span class="product-detail-tag">{{ $product->category }}</span>
                    <h1 class="h2 mt-3 mb-3">{{ $product->name }}</h1>
                    <p class="text-muted mb-3">{{ $product->short_description ?: 'Professional product with customizable options.' }}</p>
                    <p class="text-muted mb-4">{{ $product->description ?: 'Detailed description will be updated shortly.' }}</p>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('contact') }}" class="btn btn-primary py-2 px-4">Request Quote</a>
                        @if($product->attachment)
                            <a href="{{ asset($product->attachment) }}" target="_blank" rel="noopener" class="btn btn-dark py-2 px-4">Download Attachment</a>
                        @endif
                    </div>
                </div>

                <div class="product-detail-side p-4">
                    <h5 class="mb-2">Need Customization?</h5>
                    <p class="text-muted mb-3">Share your dimensions and usage needs to get a tailored quote.</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary py-2 px-4">Contact Team</a>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-detail-specs p-4 p-lg-5">
                    <h4 class="mb-3">Specifications</h4>
                    @if(!empty($specs))
                        <div class="product-spec-list">
                            @foreach($specs as $key => $value)
                                <div class="product-spec-item">
                                    @if(is_string($key))
                                        <span class="product-spec-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
                                        <p class="mb-0 text-muted">{{ $value }}</p>
                                    @else
                                        <p class="mb-0 text-muted">{{ $value }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">Specifications will be updated soon.</p>
                    @endif
                </div>
            </div>
        </div>

        @if(isset($relatedProducts) && $relatedProducts->isNotEmpty())
            <div class="mt-5">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="mb-0">Related Products</h4>
                    <a href="{{ route('products') }}" class="fw-semibold">View All</a>
                </div>

                <div class="row g-4">
                    @foreach($relatedProducts as $relatedProduct)
                        @php
                            $relatedImagePath = $relatedProduct->image ?: 'assets/img/portfolio-1.jpg';
                            $relatedImageUrl = \Illuminate\Support\Str::startsWith($relatedImagePath, ['http://', 'https://'])
                                ? $relatedImagePath
                                : (str_starts_with($relatedImagePath, 'assets/') ? asset($relatedImagePath) : asset(ltrim($relatedImagePath, '/')));
                        @endphp

                        <div class="col-md-6 col-xl-4">
                            <article class="product-related-card">
                                <img src="{{ $relatedImageUrl }}" alt="{{ $relatedProduct->name }}" class="product-related-image">
                                <div class="p-4">
                                    <span class="product-detail-tag">{{ $relatedProduct->category }}</span>
                                    <h5 class="mt-2">{{ $relatedProduct->name }}</h5>
                                    <p class="text-muted mb-3">{{ \Illuminate\Support\Str::limit($relatedProduct->short_description ?: $relatedProduct->description, 90) }}</p>
                                    <a href="{{ route('products.show', $relatedProduct->slug) }}" class="btn btn-outline-primary py-2 px-4">View Product</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
