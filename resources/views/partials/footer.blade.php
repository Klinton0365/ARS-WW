<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <div class="footer-brand">ARS WOOD WORKS</div>
        <p class="footer-desc">Premium carpentry, interior execution, decorative carving, and industrial fit-out services delivered with precision and quality.</p>
      </div>
      <div>
        <div class="footer-heading">Quick Links</div>
        <ul class="footer-links">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('projects') }}">Projects</a></li>
          <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
        </ul>
      </div>
      <div>
        <div class="footer-heading">Get In Touch</div>
        <ul class="footer-links">
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
          <li><a href="{{ route('catalog') }}">Browse Catalog</a></li>
          <li><a href="{{ route('about') }}">About ARS</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <small>&copy; {{ date('Y') }} ARS Wood Works. All rights reserved.</small>
      <small>Crafted with precision and care.</small>
    </div>
  </div>
</footer>
