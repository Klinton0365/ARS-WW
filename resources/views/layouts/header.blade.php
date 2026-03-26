<!-- Header Hide/Reveal Styles -->
<style>
    /* Default: normal flow for all pages */
    .site-header {
        position: relative;
        z-index: 9999;
    }
    /* Homepage only: fixed + hidden until hero scroll completes */
    .site-header.header-hero-hidden {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        transform: translateY(-100%);
        opacity: 0;
        transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.5s ease;
        pointer-events: none;
    }
    .site-header.header-hero-hidden.header-revealed {
        transform: translateY(0);
        opacity: 1;
        pointer-events: auto;
    }
    .site-header.header-hero-hidden .navbar {
        position: relative !important;
    }
</style>

<div class="site-header {{ request()->routeIs('home') ? 'header-hero-hidden' : '' }}" id="siteHeader">
<!-- Topbar Start -->
<div class="container-fluid bg-light p-0">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <i class="fa-solid fa-location-dot text-primary me-2" style="font-size:0.85rem;"></i>
                <small>Professional Wood & Interior Services</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <i class="fa-regular fa-clock text-primary me-2" style="font-size:0.85rem;"></i>
                <small>Mon - Sat : 08.00 AM - 06.00 PM</small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <i class="fa-solid fa-phone text-primary me-2" style="font-size:0.85rem;"></i>
                <small>Contact Us Today</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center gap-2">
                <a href="#" style="width:32px;height:32px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:rgba(24,119,242,0.1);color:#1877F2;transition:all 0.3s ease;font-size:0.85rem;" onmouseover="this.style.background='#1877F2';this.style.color='#fff';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(24,119,242,0.1)';this.style.color='#1877F2';this.style.transform='translateY(0)'"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" style="width:32px;height:32px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:rgba(228,64,95,0.1);color:#E4405F;transition:all 0.3s ease;font-size:0.85rem;" onmouseover="this.style.background='#E4405F';this.style.color='#fff';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(228,64,95,0.1)';this.style.color='#E4405F';this.style.transform='translateY(0)'"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" style="width:32px;height:32px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:rgba(10,102,194,0.1);color:#0A66C2;transition:all 0.3s ease;font-size:0.85rem;" onmouseover="this.style.background='#0A66C2';this.style.color='#fff';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(10,102,194,0.1)';this.style.color='#0A66C2';this.style.transform='translateY(0)'"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" style="width:32px;height:32px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:rgba(37,211,102,0.1);color:#25D366;transition:all 0.3s ease;font-size:0.85rem;" onmouseover="this.style.background='#25D366';this.style.color='#fff';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(37,211,102,0.1)';this.style.color='#25D366';this.style.transform='translateY(0)'"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#" style="width:32px;height:32px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.08);color:#333;transition:all 0.3s ease;font-size:0.85rem;" onmouseover="this.style.background='#000';this.style.color='#fff';this.style.transform='translateY(-2px)'" onmouseout="this.style.background='rgba(0,0,0,0.08)';this.style.color='#333';this.style.transform='translateY(0)'"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0">ARS WOOD WORKS</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('services') }}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('projects') }}" class="nav-item nav-link {{ request()->routeIs('projects') || request()->routeIs('projects.show') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('products') }}" class="nav-item nav-link {{ request()->routeIs('products*') ? 'active' : '' }}">Products</a>
            <a href="{{ route('catalog') }}" class="nav-item nav-link {{ request()->routeIs('catalog*') ? 'active' : '' }}">Catalog</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-primary py-4 px-lg-4 d-none d-lg-block">Get A Quote<i class="fa-solid fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
</div>
