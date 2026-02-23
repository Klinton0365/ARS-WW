@extends('layouts.site')

@section('title', $project->title.' | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container grid grid-2">
    <article class="card">
      @if($project->cover_image)
        <img class="thumb" src="{{ asset('storage/'.$project->cover_image) }}" alt="{{ $project->title }}">
      @endif
      <span class="badge">{{ $project->category }}</span>
      <h2>{{ $project->title }}</h2>
      <p class="meta">{{ $project->summary }}</p>
      <p class="meta">{!! nl2br(e($project->description)) !!}</p>
    </article>
    <aside class="card">
      <h3>Project Details</h3>
      <p class="meta"><strong>Client:</strong> {{ $project->client_name ?: 'N/A' }}</p>
      <p class="meta"><strong>Location:</strong> {{ $project->location ?: 'N/A' }}</p>
      <p class="meta"><strong>Completed:</strong> {{ $project->completed_at?->format('d M Y') ?: 'In Progress' }}</p>
      @if(!empty($project->gallery))
      <h4>Gallery Links</h4>
      <ul>
        @foreach($project->gallery as $image)
          <li><a href="{{ $image }}" target="_blank">{{ $image }}</a></li>
        @endforeach
      </ul>
      @endif
      <a class="btn btn-primary" href="{{ route('contact') }}">Request Similar Work</a>
    </aside>
  </div>
</section>
@endsection
