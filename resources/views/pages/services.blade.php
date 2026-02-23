@extends('layouts.site')

@section('title', 'Services | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <h2>Service Expertise</h2>
    <p class="meta">Professional service lines for residential, commercial, and industrial requirements.</p>
    <div class="grid grid-3">
      @forelse($services as $service)
      <article class="card">
        <span class="badge">{{ $service->name }}</span>
        <h3>{{ $service->tagline ?: 'Skilled Delivery Team' }}</h3>
        <p class="meta">{{ $service->description }}</p>
      </article>
      @empty
      <article class="card"><p class="meta">No services found.</p></article>
      @endforelse
    </div>
  </div>
</section>
@endsection
