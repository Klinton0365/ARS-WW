<div class="popup-overlay" data-lead-popup>
  <div class="popup-card">
    <button class="popup-close" type="button" data-popup-close>&times;</button>
    <h3>Get a Free Site Visit & Quote</h3>
    <p class="meta">Tell us your requirement and our team will call you.</p>
    <form method="POST" action="{{ route('lead.capture') }}">
      @csrf
      <input type="hidden" name="source" value="popup_form">
      <div class="form-row">
        <input type="text" name="name" placeholder="Your name" required>
        <input type="text" name="phone" placeholder="Phone number" required>
      </div>
      <div class="form-row">
        <input type="email" name="email" placeholder="Email (optional)">
        <select name="service_type" required>
          <option value="Wood Works">Wood Works</option>
          <option value="Interior Works">Interior Works</option>
          <option value="Carving">Carving</option>
          <option value="Carpentry Services">Carpentry Services</option>
          <option value="Industrial Services">Industrial Services</option>
        </select>
      </div>
      <textarea name="message" placeholder="Project details"></textarea>
      <button class="btn btn-primary" type="submit">Submit Lead</button>
    </form>
  </div>
</div>
