@extends('layouts.site')

@section('title', 'Projects | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <h2>Project Portfolio</h2>
    <p class="meta">End-to-end projects with measurable execution quality.</p>
    <div class="grid grid-3">
      @forelse($projects as $project)
      <article class="card">
        @if($project->cover_image)
          <img class="thumb" src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}">
        @endif
        <span class="badge">{{ $project->category }}</span>
        <h3>{{ $project->title }}</h3>
        <p class="meta">{{ \Illuminate\Support\Str::limit($project->summary, 140) }}</p>
        <a class="btn btn-outline" href="{{ route('projects.show', $project->slug) }}">Open Project</a>
      </article>
      @empty
      <article class="card"><p class="meta">No projects available.</p></article>
      @endforelse
    </div>
    <div style="margin-top:1rem;">{{ $projects->links() }}</div>
  </div>
</section>
@endsection
