@extends('layouts.master')

@section('title', 'Products | ARS Wood Works')

@section('content')
<style>
    .products-page {
        background: #f8f8f8;
    }
    .product-category-block + .product-category-block {
        margin-top: 2.25rem;
    }
    .product-category-head {
        border-left: 4px solid #ab7442;
        padding-left: 14px;
        margin-bottom: 1rem;
    }
    .product-category-meta {
        color: #6b7280;
        margin-bottom: 0;
        font-size: 0.92rem;
    }
    .product-card {
        background: #fff;
        border: 1px solid #ececec;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 34px rgba(0, 0, 0, 0.08);
    }
    .product-thumb {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    .product-category-chip {
        display: inline-block;
        background: rgba(171, 116, 66, 0.12);
        color: #ab7442;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        padding: 6px 10px;
        border-radius: 999px;
        margin-bottom: 14px;
    }
</style>

<div class="container-fluid products-page py-5">
    <div class="container py-3">
        @php
            $groupedProducts = $products->groupBy(function ($item) {
                return $item->category ?: 'Uncategorized';
            });
        @endphp

        <div class="section-title text-center mx-auto" style="max-width: 760px;">
            <h1 class="display-5 mb-3">Products</h1>
            <p class="text-muted mb-0">Browse our products dynamically grouped by category, with dedicated product detail pages.</p>
        </div>

        @forelse($groupedProducts as $categoryName => $items)
            <section class="product-category-block mt-4">
                <div class="product-category-head">
                    <h2 class="h4 mb-1">{{ $categoryName }}</h2>
                    <p class="product-category-meta">{{ $items->count() }} {{ $items->count() === 1 ? 'product' : 'products' }}</p>
                </div>

                <div class="row g-4">
                    @foreach($items as $item)
                        @php
                            $imagePath = $item->image ?: 'assets/img/portfolio-1.jpg';
                            $imageUrl = \Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
                                ? $imagePath
                                : (str_starts_with($imagePath, 'assets/') ? asset($imagePath) : asset(ltrim($imagePath, '/')));
                        @endphp

                        <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                            <article class="product-card">
                                <img class="product-thumb" src="{{ $imageUrl }}" alt="{{ $item->name }}">
                                <div class="p-4">
                                    <span class="product-category-chip">{{ $item->category }}</span>
                                    <h3 class="h5">{{ $item->name }}</h3>
                                    <p class="text-muted mb-3">{{ \Illuminate\Support\Str::limit($item->short_description ?: $item->description, 120) }}</p>

                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="{{ route('products.show', $item->slug) }}" class="btn btn-primary py-2 px-4">View Product</a>
                                        @if($item->attachment)
                                            <a href="{{ asset($item->attachment) }}" target="_blank" rel="noopener" class="btn btn-outline-primary py-2 px-3">Attachment</a>
                                        @endif
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </section>
        @empty
            <div class="bg-white border rounded p-5 text-center mt-4">
                <h5 class="mb-2">No Products Available</h5>
                <p class="text-muted mb-0">Add and publish products from the admin panel to display them here.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
