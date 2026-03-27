@extends('layouts.master')

@section('title', 'Projects | ARS Wood Works')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Projects</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-3">Project Portfolio</h1>
                <p class="text-muted mb-5 mx-auto" style="max-width:600px;">End-to-end projects delivered with precision, quality materials, and measurable execution standards.</p>
            </div>
            <div class="row g-4">
                @forelse($projects as $project)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ ($loop->index % 3) * 0.2 + 0.1 }}s">
                    <div class="rounded overflow-hidden h-100" style="border:1px solid var(--line);transition:all 0.4s ease;">
                        <div class="position-relative overflow-hidden" style="height:240px;">
                            @if($project->cover_image)
                                <img class="img-fluid w-100 h-100" src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}" style="object-fit:cover;transition:transform 0.5s ease;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:var(--accent-soft);">
                                    <i class="fa-solid fa-image fa-3x" style="color:var(--muted);opacity:0.3;"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge text-white px-3 py-2" style="background:var(--primary);border-radius:6px;font-size:0.75rem;">{{ $project->category }}</span>
                            </div>
                            @if($project->is_featured)
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge px-2 py-1" style="background:#fbbf24;color:#78350f;border-radius:6px;font-size:0.7rem;"><i class="fa-solid fa-star me-1"></i>Featured</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h5 class="mb-2">{{ $project->title }}</h5>
                            <p class="text-muted mb-3" style="font-size:0.9rem;line-height:1.6;">{{ \Illuminate\Support\Str::limit($project->summary, 120) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if($project->location)
                                    <small class="text-muted"><i class="fa-solid fa-location-dot me-1"></i>{{ $project->location }}</small>
                                    @endif
                                </div>
                                <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-primary btn-sm px-3">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-folder-open fa-3x mb-3" style="color:var(--muted);opacity:0.3;"></i>
                    <p class="text-muted">No projects available yet.</p>
                </div>
                @endforelse
            </div>
            <div class="mt-5 d-flex justify-content-center">{{ $projects->links() }}</div>
        </div>
    </div>
@endsection
