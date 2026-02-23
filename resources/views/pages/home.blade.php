@extends('layouts.site')

@section('title', 'ARS Wood Works | Professional Wood & Interior Services')

@section('content')
<section class="hero">
  <div class="container hero-box">
    <span class="badge">Craftsmanship Meets Precision</span>
    <h1>Upgraded Solutions for Wood Works, Interiors, Carving and Industrial Fit-outs</h1>
    <p>We design and execute premium carpentry and interior projects with reliable quality, project planning, and finishing standards that scale from homes to industrial sites.</p>
    <a class="btn btn-primary" href="{{ route('contact') }}">Start Your Project</a>
    <a class="btn btn-outline" href="{{ route('projects') }}">View Projects</a>
    <div class="stats">
      <div class="stat"><strong>{{ $stats['projects'] }}</strong>Projects Delivered</div>
      <div class="stat"><strong>{{ $stats['services'] }}</strong>Service Verticals</div>
      <div class="stat"><strong>{{ $stats['portfolio'] }}</strong>Portfolio Entries</div>
      <div class="stat"><strong>{{ $stats['catalog'] }}</strong>Catalog Items</div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2>Our Core Services</h2>
    <p class="meta">Everything managed through a dynamic process and quality-controlled installation.</p>
    <div class="grid grid-3">
      @forelse($services as $service)
      <article class="card">
        <span class="badge">{{ $service->name }}</span>
        <h3>{{ $service->tagline ?: 'Professional Execution' }}</h3>
        <p class="meta">{{ \Illuminate\Support\Str::limit($service->description, 130) }}</p>
      </article>
      @empty
      <article class="card"><p class="meta">No services added yet.</p></article>
      @endforelse
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <h2>Featured Projects</h2>
    <div class="grid grid-3">
      @forelse($featuredProjects as $project)
      <article class="card">
        @if($project->cover_image)
          <img class="thumb" src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}">
        @endif
        <span class="badge">{{ $project->category }}</span>
        <h3>{{ $project->title }}</h3>
        <p class="meta">{{ $project->summary }}</p>
        <a class="btn btn-outline" href="{{ route('projects.show', $project->slug) }}">View Case Study</a>
      </article>
      @empty
      <article class="card"><p class="meta">No featured projects yet.</p></article>
      @endforelse
    </div>
  </div>
</section>
@endsection
