@extends('layouts.site')

@section('title', 'Contact | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container grid grid-2">
    <div class="card">
      <span class="badge">Lead Capture</span>
      <h2>Tell us your requirement</h2>
      <p class="meta">Submit your project details for wood works, interior, carving, carpentry or industrial services.</p>
      <form method="POST" action="{{ route('lead.capture') }}">
        @csrf
        <input type="hidden" name="source" value="contact_page">
        <div class="form-row">
          <input type="text" name="name" placeholder="Name" required>
          <input type="text" name="phone" placeholder="Phone" required>
        </div>
        <div class="form-row">
          <input type="email" name="email" placeholder="Email">
          <select name="service_type" required>
            <option value="Wood Works">Wood Works</option>
            <option value="Interior Works">Interior Works</option>
            <option value="Carving">Carving</option>
            <option value="Carpentry Services">Carpentry Services</option>
            <option value="Industrial Services">Industrial Services</option>
          </select>
        </div>
        <textarea name="message" placeholder="Project scope, area, and timeline"></textarea>
        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    </div>
    <div class="card">
      <h3>Why clients choose ARS</h3>
      <ul>
        <li>Professional planning and milestone tracking</li>
        <li>Custom fabrication and premium finishing</li>
        <li>Site-safe industrial execution process</li>
        <li>Responsive support and transparent updates</li>
      </ul>
    </div>
  </div>
</section>
@endsection
