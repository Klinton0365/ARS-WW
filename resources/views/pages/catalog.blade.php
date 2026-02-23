@extends('layouts.site')

@section('title', 'Catalog | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container">
    <h2>Catalog</h2>
    <p class="meta">Configurable products and material options.</p>
    <div class="grid grid-3">
      @forelse($catalogItems as $item)
      <article class="card">
        @if($item->image)
          <img class="thumb" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}">
        @endif
        <span class="badge">{{ $item->category }}</span>
        <h3>{{ $item->name }}</h3>
        <p class="meta">{{ $item->description }}</p>
        @if(!empty($item->specifications))
          <ul>
            @foreach($item->specifications as $spec)
              <li>{{ $spec }}</li>
            @endforeach
          </ul>
        @endif
      </article>
      @empty
      <article class="card"><p class="meta">No catalog entries yet.</p></article>
      @endforelse
    </div>
  </div>
</section>
@endsection
