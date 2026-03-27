@extends('layouts.site')

@section('title', 'Portfolio | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <div class="divider"></div>
      <h2>Craft Portfolio</h2>
      <p class="meta">A showcase of our finest craftsmanship and attention to detail.</p>
    </div>
    <div class="grid grid-3">
      @forelse($portfolioItems as $item)
      <article class="card reveal">
        @if($item->image)
          <img class="thumb" src="{{  asset($item->image) }}" alt="{{ $item->title }}">
        @endif
        <span class="badge">{{ $item->service_type }}</span>
        <h3>{{ $item->title }}</h3>
        <p class="meta">{{ $item->description }}</p>
      </article>
      @empty
      <div class="empty-state"><p class="meta">No portfolio items yet.</p></div>
      @endforelse
    </div>
  </div>
</section>
@endsection
