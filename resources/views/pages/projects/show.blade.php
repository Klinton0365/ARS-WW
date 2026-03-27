@extends('layouts.master')

@section('title', $project->title . ' | ARS Wood Works')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $project->title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('projects') }}">Projects</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{ $project->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        .project-detail-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid var(--line);
            overflow: hidden;
        }
        .project-cover {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 16px;
        }
        .project-info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 0;
            border-bottom: 1px solid var(--line);
        }
        .project-info-item:last-child { border-bottom: none; }
        .project-info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        .project-gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 12px;
        }
        .project-gallery-grid img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .project-gallery-grid img:hover {
            transform: scale(1.03);
        }
    </style>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Left: Cover + Description -->
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    @if($project->cover_image)
                        <img class="project-cover mb-4 w-100" src="{{ asset($project->cover_image) }}" alt="{{ $project->title }}">
                    @endif

                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <span class="badge text-white px-3 py-2" style="background:var(--primary);border-radius:6px;">{{ $project->category }}</span>
                        @if($project->is_featured)
                            <span class="badge px-3 py-2" style="background:#fef3c7;color:#92400e;border-radius:6px;"><i class="fa-solid fa-star me-1"></i>Featured Project</span>
                        @endif
                    </div>

                    <h2 class="mb-3" style="font-weight:700;">{{ $project->title }}</h2>
                    <p class="text-muted mb-4" style="font-size:1.05rem;line-height:1.8;">{{ $project->summary }}</p>

                    @if($project->description)
                        <div style="line-height:1.8;color:#374151;">
                            {!! nl2br(e($project->description)) !!}
                        </div>
                    @endif

                    <!-- Gallery -->
                    @if(!empty($project->gallery))
                        <div class="mt-5">
                            <h4 class="mb-3"><i class="fa-solid fa-images me-2 text-primary"></i>Project Gallery</h4>
                            <div class="project-gallery-grid">
                                @foreach($project->gallery as $image)
                                    <a href="{{ $image }}" data-lightbox="project-gallery" data-title="{{ $project->title }}">
                                        <img src="{{ $image }}" alt="Gallery image">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right: Details Sidebar -->
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="project-detail-card p-4 mb-4">
                        <h5 class="mb-3" style="font-weight:700;">Project Details</h5>

                        <div class="project-info-item">
                            <div class="project-info-icon" style="background:rgba(30,95,174,0.1);color:#1E5FAE;">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size:0.75rem;">Client</small>
                                <span style="font-weight:600;">{{ $project->client_name ?: 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="project-info-item">
                            <div class="project-info-icon" style="background:rgba(76,175,80,0.1);color:#4CAF50;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size:0.75rem;">Location</small>
                                <span style="font-weight:600;">{{ $project->location ?: 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="project-info-item">
                            <div class="project-info-icon" style="background:rgba(255,152,0,0.1);color:#FF9800;">
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size:0.75rem;">Completed</small>
                                <span style="font-weight:600;">{{ $project->completed_at?->format('d M Y') ?: 'In Progress' }}</span>
                            </div>
                        </div>

                        <div class="project-info-item">
                            <div class="project-info-icon" style="background:rgba(156,39,176,0.1);color:#9C27B0;">
                                <i class="fa-solid fa-tag"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size:0.75rem;">Category</small>
                                <span style="font-weight:600;">{{ $project->category }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Card -->
                    <div class="project-detail-card p-4 text-center" style="background:var(--accent-soft);">
                        <i class="fa-solid fa-comments fa-2x mb-3" style="color:var(--primary);"></i>
                        <h5 class="mb-2" style="font-weight:700;">Want Something Similar?</h5>
                        <p class="text-muted mb-3" style="font-size:0.9rem;">Let's discuss your project requirements. Get a free consultation today.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary w-100 py-3">
                            <i class="fa-solid fa-arrow-right me-2"></i>Request a Quote
                        </a>
                    </div>

                    <!-- Back Link -->
                    <div class="mt-3 text-center">
                        <a href="{{ route('projects') }}" class="text-muted" style="font-size:0.9rem;text-decoration:none;">
                            <i class="fa-solid fa-arrow-left me-1"></i> Back to All Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
