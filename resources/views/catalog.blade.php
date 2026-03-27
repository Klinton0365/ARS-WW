@extends('layouts.master')

@section('title', 'Catalog | ARS Wood Works')

@section('content')
<style>
    .catalog-section {
        background: #f8f8f8;
    }
    .catalog-category-section + .catalog-category-section {
        margin-top: 2.5rem;
    }
    .catalog-category-header {
        border-left: 4px solid #ab7442;
        padding-left: 14px;
        margin-bottom: 1rem;
    }
    .catalog-category-title {
        margin-bottom: 0.25rem;
    }
    .catalog-category-meta {
        color: #6b7280;
        font-size: 0.92rem;
        margin-bottom: 0;
    }
    .catalog-card {
        background: #fff;
        border: 1px solid #ececec;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .catalog-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 34px rgba(0, 0, 0, 0.08);
    }
    .catalog-thumb {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    .catalog-category {
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
    .catalog-title {
        font-size: 1.15rem;
        margin-bottom: 10px;
    }
    .catalog-description {
        color: #6b7280;
        font-size: 0.95rem;
        margin-bottom: 14px;
    }
    .catalog-specs {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 18px;
    }
    .catalog-spec-chip {
        font-size: 12px;
        background: #f4f5f7;
        color: #374151;
        border-radius: 999px;
        padding: 5px 10px;
    }
</style>

<div class="container-fluid catalog-section py-5">
    <div class="container py-3">
        @php
            $groupedCatalogItems = $catalogItems->groupBy(function ($item) {
                return $item->category ?: 'Uncategorized';
            });
        @endphp

        <div class="section-title text-center mx-auto" style="max-width: 760px;">
            <h1 class="display-5 mb-3">Product Catalog</h1>
            <p class="text-muted mb-0">Explore our curated carpentry and interior product options, grouped dynamically by category.</p>
        </div>

        @forelse($groupedCatalogItems as $categoryName => $items)
            <section class="catalog-category-section mt-4">
                <div class="catalog-category-header">
                    <h2 class="h4 catalog-category-title">{{ $categoryName }}</h2>
                    <p class="catalog-category-meta">{{ $items->count() }} {{ $items->count() === 1 ? 'product' : 'products' }}</p>
                </div>

                <div class="row g-4">
                    @foreach($items as $item)
                        @php
                            $imagePath = $item->image ?: 'assets/img/portfolio-1.jpg';
                            $imageUrl = \Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
                                ? $imagePath
                                : (str_starts_with($imagePath, 'assets/') ? asset($imagePath) : asset(ltrim($imagePath, '/')));

                            $specs = is_array($item->specifications) ? $item->specifications : [];
                            $specLabels = [];
                            foreach ($specs as $key => $value) {
                                $specLabels[] = is_string($key) ? ucfirst(str_replace('_', ' ', (string) $key)) . ': ' . $value : $value;
                            }
                        @endphp

                        <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                            <article class="catalog-card">
                                <img class="catalog-thumb" src="{{ $imageUrl }}" alt="{{ $item->name }}">
                                <div class="p-4">
                                    <span class="catalog-category">{{ $item->category }}</span>
                                    <h3 class="catalog-title">{{ $item->name }}</h3>
                                    <p class="catalog-description">{{ \Illuminate\Support\Str::limit($item->description, 110) }}</p>

                                    @if(!empty($specLabels))
                                        <div class="catalog-specs">
                                            @foreach(array_slice($specLabels, 0, 3) as $spec)
                                                <span class="catalog-spec-chip">{{ $spec }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <a href="{{ route('catalog.show', $item->slug) }}" class="btn btn-primary py-2 px-4">
                                        View Details
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </section>
        @empty
            <div class="row g-4 mt-2">
                <div class="col-12">
                    <div class="bg-white border rounded p-5 text-center">
                        <h5 class="mb-2">No Catalog Items Available</h5>
                        <p class="text-muted mb-0">Add and publish catalog entries from your admin panel to display them here.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
