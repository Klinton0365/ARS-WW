@extends('layouts.master')

@section('title', 'Products | ARS Wood Works')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    @php
        $groupedProducts = $products->groupBy(fn($item) => $item->category ?: 'Uncategorized');
    @endphp

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">Browse Our Products</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width:650px;">Quality wood products and interior solutions, organized by category. Each product is customizable to your needs.</p>
            </div>

            @forelse($groupedProducts as $categoryName => $items)
                <div class="mb-5">
                    <div class="d-flex align-items-center mb-4">
                        <div style="width:4px;height:32px;background:var(--primary);border-radius:2px;margin-right:14px;"></div>
                        <div>
                            <h3 class="mb-0" style="font-weight:700;">{{ $categoryName }}</h3>
                            <small class="text-muted">{{ $items->count() }} {{ $items->count() === 1 ? 'product' : 'products' }}</small>
                        </div>
                    </div>

                    <div class="row g-4">
                        @foreach($items as $item)
                            @php
                                $imagePath = $item->image ?: 'assets/img/portfolio-1.jpg';
                                $imageUrl = \Illuminate\Support\Str::startsWith($imagePath, ['http://', 'https://'])
                                    ? $imagePath
                                    : asset(ltrim($imagePath, '/'));
                            @endphp

                            <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="{{ ($loop->index % 3) * 0.2 + 0.1 }}s">
                                <div class="h-100 rounded overflow-hidden" style="border:1px solid var(--line);background:#fff;transition:all 0.4s ease;">
                                    <div class="position-relative" style="height:220px;overflow:hidden;">
                                        <img class="img-fluid w-100 h-100" src="{{ $imageUrl }}" alt="{{ $item->name }}" style="object-fit:cover;transition:transform 0.5s ease;">
                                        <div class="position-absolute top-0 start-0 m-3">
                                            <span class="badge text-white px-3 py-2" style="background:var(--primary);border-radius:6px;font-size:0.72rem;">{{ $item->category }}</span>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h5 class="mb-2">{{ $item->name }}</h5>
                                        <p class="text-muted mb-3" style="font-size:0.9rem;line-height:1.6;">{{ \Illuminate\Support\Str::limit($item->short_description ?: $item->description, 110) }}</p>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="{{ route('products.show', $item->slug) }}" class="btn btn-primary btn-sm px-3">View Product</a>
                                            @if($item->attachment)
                                                <a href="{{ asset($item->attachment) }}" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm px-3">
                                                    <i class="fa-solid fa-download me-1"></i>Brochure
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa-solid fa-box-open fa-3x mb-3" style="color:var(--muted);opacity:0.3;"></i>
                    <h5 class="text-muted">No Products Available</h5>
                    <p class="text-muted">Products will appear here once published from the admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
