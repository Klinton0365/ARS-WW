@extends('layouts.site')

@section('title', 'Portfolio | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <h2>Craft Portfolio</h2>
    <div class="grid grid-3">
      @forelse($portfolioItems as $item)
      <article class="card">
        @if($item->image)
          <img class="thumb" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
        @endif
        <span class="badge">{{ $item->service_type }}</span>
        <h3>{{ $item->title }}</h3>
        <p class="meta">{{ $item->description }}</p>
      </article>
      @empty
      <article class="card"><p class="meta">No portfolio items yet.</p></article>
      @endforelse
    </div>
  </div>
</section>
@endsection
