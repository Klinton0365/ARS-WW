@extends('layouts.site')

@section('title', $project->title.' | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container grid grid-2">
    <article class="card reveal">
      @if($project->cover_image)
        <img class="thumb" src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}">
      @endif
      <span class="badge">{{ $project->category }}</span>
      <h2>{{ $project->title }}</h2>
      <p class="meta">{{ $project->summary }}</p>
      <div class="divider"></div>
      <p class="meta">{!! nl2br(e($project->description)) !!}</p>
    </article>
    <aside class="card reveal">
      <h3>Project Details</h3>
      <ul class="detail-list">
        <li><span class="detail-label">Client</span><span class="detail-value">{{ $project->client_name ?: 'N/A' }}</span></li>
        <li><span class="detail-label">Location</span><span class="detail-value">{{ $project->location ?: 'N/A' }}</span></li>
        <li><span class="detail-label">Completed</span><span class="detail-value">{{ $project->completed_at?->format('d M Y') ?: 'In Progress' }}</span></li>
      </ul>
      @if(!empty($project->gallery))
      <div class="divider"></div>
      <h4>Gallery</h4>
      <ul>
        @foreach($project->gallery as $image)
          <li><a href="{{ $image }}" target="_blank">{{ $image }}</a></li>
        @endforeach
      </ul>
      @endif
      <a class="btn btn-primary" href="{{ route('contact') }}" style="width:100%;justify-content:center;">Request Similar Work</a>
    </aside>
  </div>
</section>
@endsection
