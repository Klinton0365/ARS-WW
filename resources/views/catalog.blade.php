@extends('layouts.master')

@section('title', 'Catalog | ARS Wood Works')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Product Catalog</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Catalog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    @php
        $groupedCatalogItems = $catalogItems->groupBy(fn($item) => $item->category ?: 'Uncategorized');
    @endphp

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">Explore Our Collection</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width:650px;">Curated carpentry and interior products, grouped by category. Find the perfect fit for your space.</p>
            </div>

            @forelse($groupedCatalogItems as $categoryName => $items)
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
                                $specs = is_array($item->specifications) ? $item->specifications : [];
                                $specLabels = [];
                                foreach ($specs as $key => $value) {
                                    $specLabels[] = is_string($key) ? ucfirst(str_replace('_', ' ', (string) $key)) . ': ' . $value : $value;
                                }
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
                                        <p class="text-muted mb-3" style="font-size:0.9rem;line-height:1.6;">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>

                                        @if(!empty($specLabels))
                                            <div class="d-flex flex-wrap gap-1 mb-3">
                                                @foreach(array_slice($specLabels, 0, 3) as $spec)
                                                    <span class="px-2 py-1" style="font-size:0.72rem;background:var(--accent-soft);color:var(--primary);border-radius:20px;font-weight:600;">{{ $spec }}</span>
                                                @endforeach
                                            </div>
                                        @endif

                                        <a href="{{ route('catalog.show', $item->slug) }}" class="btn btn-primary btn-sm px-3">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="fa-solid fa-box-open fa-3x mb-3" style="color:var(--muted);opacity:0.3;"></i>
                    <h5 class="text-muted">No Catalog Items Available</h5>
                    <p class="text-muted">Products will appear here once published from the admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
