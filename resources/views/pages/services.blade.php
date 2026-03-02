@extends('layouts.site')

@section('title', 'Services | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <div class="divider"></div>
      <h2>Service Expertise</h2>
      <p class="meta">Professional service lines for residential, commercial, and industrial requirements.</p>
    </div>
    <div class="grid grid-3">
      @forelse($services as $service)
      <article class="card reveal">
        <span class="badge">{{ $service->name }}</span>
        <h3>{{ $service->tagline ?: 'Skilled Delivery Team' }}</h3>
        <p class="meta">{{ $service->description }}</p>
        <a class="btn btn-ghost btn-sm" href="{{ route('contact') }}">Enquire Now</a>
      </article>
      @empty
      <div class="empty-state"><p class="meta">No services found.</p></div>
      @endforelse
    </div>
  </div>
</section>
@endsection
