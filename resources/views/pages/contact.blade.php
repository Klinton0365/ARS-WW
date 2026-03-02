@extends('layouts.site')

@section('title', 'Contact | ARS Wood Works')

@section('content')
<section class="section">
  <div class="container grid grid-2">
    <div class="card reveal">
      <span class="badge">Get In Touch</span>
      <h2>Tell us your requirement</h2>
      <p class="meta">Submit your project details and our team will get back to you within 24 hours.</p>
      <form method="POST" action="{{ route('lead.capture') }}">
        @csrf
        <input type="hidden" name="source" value="contact_page">
        <div class="form-row form-row-2">
          <div>
            <label class="form-label">Full Name</label>
            <input type="text" name="name" placeholder="Your full name" required>
          </div>
          <div>
            <label class="form-label">Phone</label>
            <input type="text" name="phone" placeholder="Your phone number" required>
          </div>
        </div>
        <div class="form-row form-row-2">
          <div>
            <label class="form-label">Email</label>
            <input type="email" name="email" placeholder="your@email.com">
          </div>
          <div>
            <label class="form-label">Service Type</label>
            <select name="service_type" required>
              <option value="" disabled selected>Select a service</option>
              <option value="Wood Works">Wood Works</option>
              <option value="Interior Works">Interior Works</option>
              <option value="Carving">Carving</option>
              <option value="Carpentry Services">Carpentry Services</option>
              <option value="Industrial Services">Industrial Services</option>
            </select>
          </div>
        </div>
        <div>
          <label class="form-label">Project Details</label>
          <textarea name="message" placeholder="Describe your project scope, area, and expected timeline"></textarea>
        </div>
        <button class="btn btn-primary" type="submit" style="width:100%;justify-content:center;margin-top:0.5rem;">Submit Enquiry</button>
      </form>
    </div>
    <div class="card reveal">
      <h3>Why clients choose ARS</h3>
      <div class="divider"></div>
      <ul class="feature-list">
        <li>Professional planning and milestone tracking</li>
        <li>Custom fabrication and premium finishing</li>
        <li>Site-safe industrial execution process</li>
        <li>Responsive support and transparent updates</li>
      </ul>
      <div style="margin-top:1.5rem;padding:1.2rem;background:var(--accent-soft);border-radius:var(--radius-md);">
        <h4 style="margin:0 0 0.3rem;font-size:0.95rem;">Need urgent help?</h4>
        <p class="meta" style="margin:0;font-size:0.88rem;">Reach out directly and we'll prioritize your request.</p>
      </div>
    </div>
  </div>
</section>
@endsection
