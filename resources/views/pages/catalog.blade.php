@extends('layouts.site')

@section('title', 'Catalog | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <div class="section-header reveal">
      <div class="divider"></div>
      <h2>Product Catalog</h2>
      <p class="meta">Configurable products and material options for every project need.</p>
    </div>
    <div class="grid grid-3">
      @forelse($catalogItems as $item)
      <article class="card reveal">
        @if($item->image)
          <img class="thumb" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}">
        @endif
        <span class="badge">{{ $item->category }}</span>
        <h3>{{ $item->name }}</h3>
        <p class="meta">{{ $item->description }}</p>
        @if(!empty($item->specifications))
          <ul class="spec-list">
            @foreach($item->specifications as $spec)
              <li>{{ $spec }}</li>
            @endforeach
          </ul>
        @endif
      </article>
      @empty
      <div class="empty-state"><p class="meta">No catalog entries yet.</p></div>
      @endforelse
    </div>
  </div>
</section>
@endsection
