<header class="topbar">
  <div class="container topbar-inner">
    <a class="logo" href="{{ route('home') }}">ARS WOOD WORKS</a>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav class="menu" id="mainMenu">
      <a href="{{ route('home') }}" @if(request()->routeIs('home')) class="active" @endif>Home</a>
      <a href="{{ route('about') }}" @if(request()->routeIs('about')) class="active" @endif>About</a>
      <a href="{{ route('services') }}" @if(request()->routeIs('services')) class="active" @endif>Services</a>
      <a href="{{ route('projects') }}" @if(request()->routeIs('projects') || request()->routeIs('projects.show')) class="active" @endif>Projects</a>
      <a href="{{ route('portfolio') }}" @if(request()->routeIs('portfolio')) class="active" @endif>Portfolio</a>
      <a href="{{ route('catalog') }}" @if(request()->routeIs('catalog')) class="active" @endif>Catalog</a>
      <a href="{{ route('contact') }}" @if(request()->routeIs('contact')) class="active" @endif>Contact</a>
      <a class="btn btn-outline btn-sm" href="{{ route('admin.login') }}">Admin</a>
    </nav>
  </div>
</header>
