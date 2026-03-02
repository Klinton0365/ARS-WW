@extends('layouts.site')

@section('title', 'About | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container grid grid-2">
    <div class="card reveal">
      <span class="badge">About ARS</span>
      <h2>Built for precision projects and long-term durability</h2>
      <p class="meta">ARS Wood Works delivers modular and custom wood solutions, complete interior execution, decorative carving, and heavy-duty carpentry for commercial and industrial environments.</p>
      <p class="meta">Our workflow covers consultation, design, fabrication, finishing, quality review, and handover documentation.</p>
      <a class="btn btn-primary" href="{{ route('contact') }}">Start a Project</a>
    </div>
    <div class="card reveal">
      <h3>Capability Snapshot</h3>
      <p class="meta"><strong class="text-brand">{{ $projectCount }}</strong> completed and active projects.</p>
      <div class="divider"></div>
      <h4>Our Expertise</h4>
      <div class="capability-tags">
        @foreach($services as $service)
          <span class="badge">{{ $service->name }}</span>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection
