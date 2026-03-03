@extends('layouts.master')

@section('title', ($catalogItem->name ?? 'Catalog Item') . ' | ARS Wood Works')

@section('content')
<style>
    .catalog-detail-hero {
        background: linear-gradient(180deg, #f7f7f7 0%, #ffffff 100%);
    }
    .catalog-detail-image {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        border-radius: 14px;
        border: 1px solid #ececec;
    }
    .catalog-detail-panel {
        background: #fff;
        border: 1px solid #ececec;
        border-radius: 14px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    }
    .catalog-detail-category {
        display: inline-block;
        background: rgba(171, 116, 66, 0.12);
        color: #ab7442;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        padding: 7px 12px;
        border-radius: 999px;
        margin-bottom: 14px;
    }
    .catalog-spec-grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: 10px;
    }
    .catalog-spec-row {
        border: 1px solid #efefef;
        border-radius: 10px;
        padding: 12px 14px;
        background: #fcfcfc;
    }
    .catalog-spec-label {
        font-weight: 700;
        color: #353535;
        display: block;
        margin-bottom: 2px;
    }
    .catalog-spec-value {
        color: #666;
        margin: 0;
    }
</style>

@php
    $imagePath = $catalogItem->image ?: 'assets/img/portfolio-1.jpg';
    $imageUrl = \Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
        ? $imagePath
        : (str_starts_with($imagePath, 'assets/') ? asset($imagePath) : asset('storage/' . ltrim($imagePath, '/')));

    $specs = is_array($catalogItem->specifications) ? $catalogItem->specifications : [];
@endphp

<div class="container-fluid catalog-detail-hero py-5">
    <div class="container py-3">
        <div class="mb-4">
            <a href="{{ route('catalog') }}" class="btn btn-outline-primary">
                <i class="fa fa-arrow-left me-2"></i>Back to Catalog
            </a>
        </div>

        <div class="row g-4 align-items-start">
            <div class="col-lg-7">
                <img src="{{ $imageUrl }}" alt="{{ $catalogItem->name }}" class="catalog-detail-image">
            </div>

            <div class="col-lg-5">
                <div class="catalog-detail-panel p-4 p-lg-5">
                    <span class="catalog-detail-category">{{ $catalogItem->category }}</span>
                    <h1 class="h2 mb-3">{{ $catalogItem->name }}</h1>
                    <p class="text-muted mb-4">{{ $catalogItem->description ?: 'No description available for this catalog item yet.' }}</p>

                    <h5 class="mb-3">Specifications</h5>
                    @if(!empty($specs))
                        <div class="catalog-spec-grid">
                            @foreach($specs as $key => $value)
                                <div class="catalog-spec-row">
                                    @if(is_string($key))
                                        <span class="catalog-spec-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
                                        <p class="catalog-spec-value">{{ $value }}</p>
                                    @else
                                        <p class="catalog-spec-value mb-0">{{ $value }}</p>
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
    </div>
</div>
@endsection
