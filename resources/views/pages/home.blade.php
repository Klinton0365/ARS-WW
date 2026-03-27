@extends('layouts.site')

@section('title', 'ARS Wood Works | Professional Wood & Interior Services')

@section('content')
<section class="hero">
  <div class="container hero-box">
    <span class="badge">Craftsmanship Meets Precision</span>
    <h1>Upgraded Solutions for Wood Works, Interiors, Carving and Industrial Fit-outs</h1>
    <p>We design and execute premium carpentry and interior projects with reliable quality, project planning, and finishing standards that scale from homes to industrial sites.</p>
    <div class="hero-actions">
      <a class="btn btn-primary" href="{{ route('contact') }}">Start Your Project</a>
      <a class="btn btn-outline" href="{{ route('projects') }}">View Projects</a>
    </div>
    <div class="stats">
      <div class="stat"><strong>{{ $stats['projects'] }}</strong><span>Projects Delivered</span></div>
      <div class="stat"><strong>{{ $stats['services'] }}</strong><span>Service Verticals</span></div>
      <div class="stat"><strong>{{ $stats['portfolio'] }}</strong><span>Portfolio Entries</span></div>
      <div class="stat"><strong>{{ $stats['catalog'] }}</strong><span>Catalog Items</span></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <div class="divider"></div>
      <h2>Our Core Services</h2>
      <p class="meta">Everything managed through a dynamic process and quality-controlled installation.</p>
    </div>
    <div class="grid grid-3">
      @forelse($services as $service)
      <article class="card reveal">
        <span class="badge">{{ $service->name }}</span>
        <h3>{{ $service->tagline ?: 'Professional Execution' }}</h3>
        <p class="meta">{{ \Illuminate\Support\Str::limit($service->description, 130) }}</p>
      </article>
      @empty
      <div class="empty-state"><p class="meta">No services added yet.</p></div>
      @endforelse
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <div class="divider"></div>
      <h2>Featured Projects</h2>
      <p class="meta">End-to-end projects delivered with measurable execution quality.</p>
    </div>
    <div class="grid grid-3">
      @forelse($featuredProjects as $project)
      <article class="card reveal">
        @if($project->cover_image)
          <img class="thumb" src="{{  asset($project->cover_image) }}" alt="{{ $project->title }}">
        @endif
        <span class="badge">{{ $project->category }}</span>
        <h3>{{ $project->title }}</h3>
        <p class="meta">{{ $project->summary }}</p>
        <a class="btn btn-outline btn-sm" href="{{ route('projects.show', $project->slug) }}">View Case Study</a>
      </article>
      @empty
      <div class="empty-state"><p class="meta">No featured projects yet.</p></div>
      @endforelse
    </div>
  </div>
</section>
@endsection
