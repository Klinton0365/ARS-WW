@extends('layouts.site')

@section('title', 'Projects | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <div class="divider"></div>
      <h2>Project Portfolio</h2>
      <p class="meta">End-to-end projects with measurable execution quality.</p>
    </div>
    <div class="grid grid-3">
      @forelse($projects as $project)
      <article class="card reveal">
        @if($project->cover_image)
          <img class="thumb" src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}">
        @endif
        <span class="badge">{{ $project->category }}</span>
        <h3>{{ $project->title }}</h3>
        <p class="meta">{{ \Illuminate\Support\Str::limit($project->summary, 140) }}</p>
        <a class="btn btn-outline btn-sm" href="{{ route('projects.show', $project->slug) }}">Open Project</a>
      </article>
      @empty
      <div class="empty-state"><p class="meta">No projects available.</p></div>
      @endforelse
    </div>
    <div class="pagination-wrap">{{ $projects->links() }}</div>
  </div>
</section>
@endsection
