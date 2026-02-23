@extends('layouts.site')

@section('title', 'About | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container grid grid-2">
    <div class="card">
      <span class="badge">About ARS</span>
      <h2>Built for precision projects and long-term durability</h2>
      <p class="meta">ARS Wood Works delivers modular and custom wood solutions, complete interior execution, decorative carving, and heavy-duty carpentry for commercial and industrial environments.</p>
      <p class="meta">Our workflow covers consultation, design, fabrication, finishing, quality review, and handover documentation.</p>
    </div>
    <div class="card">
      <h3>Capability Snapshot</h3>
      <p class="meta"><strong>{{ $projectCount }}</strong> completed and active projects.</p>
      <div class="grid">
        @foreach($services as $service)
          <div class="badge">{{ $service->name }}</div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection
