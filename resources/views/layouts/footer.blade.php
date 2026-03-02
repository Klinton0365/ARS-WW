 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
     <div class="container py-5">
         <div class="row g-5">
             <div class="col-lg-3 col-md-6">
                 <h4 class="text-light mb-4">ARS Wood Works</h4>
                 <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Professional Wood & Interior Services</p>
                 <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>Contact Us for a Free Quote</p>
                 <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@arswoodworks.com</p>
                 <div class="d-flex pt-2">
                     <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                     <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                     <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <h4 class="text-light mb-4">Our Services</h4>
                 <a class="btn btn-link" href="{{ route('services') }}">Wood Works</a>
                 <a class="btn btn-link" href="{{ route('services') }}">Interior Works</a>
                 <a class="btn btn-link" href="{{ route('services') }}">Decorative Carving</a>
                 <a class="btn btn-link" href="{{ route('services') }}">Carpentry Services</a>
                 <a class="btn btn-link" href="{{ route('services') }}">Industrial Fit-outs</a>
             </div>
             <div class="col-lg-3 col-md-6">
                 <h4 class="text-light mb-4">Quick Links</h4>
                 <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                 <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                 <a class="btn btn-link" href="{{ route('projects') }}">Our Projects</a>
                 <a class="btn btn-link" href="{{ route('portfolio') }}">Portfolio</a>
                 <a class="btn btn-link" href="{{ route('catalog') }}">Catalog</a>
             </div>
             <div class="col-lg-3 col-md-6">
                 <h4 class="text-light mb-4">Get In Touch</h4>
                 <p>Have a project in mind? Submit your details and our team will reach out within 24 hours.</p>
                 <a href="{{ route('contact') }}" class="btn btn-primary py-3 px-4">Start Your Project<i class="fa fa-arrow-right ms-2"></i></a>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="copyright">
             <div class="row">
                 <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                     &copy; {{ date('Y') }} <a class="border-bottom" href="{{ route('home') }}">ARS Wood Works</a>, All Rights Reserved.
                 </div>
                 <div class="col-md-6 text-center text-md-end">
                     <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                     Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Footer End -->
