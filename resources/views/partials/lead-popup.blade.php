<div class="popup-overlay" data-lead-popup>
  <div class="popup-card">
    <button class="popup-close" type="button" data-popup-close>&times;</button>
    <span class="badge">Free Consultation</span>
    <h3>Get a Free Site Visit & Quote</h3>
    <p class="meta">Tell us your requirement and our team will reach out within 24 hours.</p>
    <form method="POST" action="{{ route('lead.capture') }}">
      @csrf
      <input type="hidden" name="source" value="popup_form">
      <div class="form-row form-row-2">
        <input type="text" name="name" placeholder="Your name" required>
        <input type="text" name="phone" placeholder="Phone number" required>
      </div>
      <div class="form-row form-row-2">
        <input type="email" name="email" placeholder="Email (optional)">
        <select name="service_type" required>
          <option value="" disabled selected>Select service type</option>
          <option value="Wood Works">Wood Works</option>
          <option value="Interior Works">Interior Works</option>
          <option value="Carving">Carving</option>
          <option value="Carpentry Services">Carpentry Services</option>
          <option value="Industrial Services">Industrial Services</option>
        </select>
      </div>
      <textarea name="message" placeholder="Brief description of your project"></textarea>
      <button class="btn btn-primary" type="submit" style="width:100%;justify-content:center;">Get Free Quote</button>
    </form>
  </div>
</div>
