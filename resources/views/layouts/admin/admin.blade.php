<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin | ARS')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
</head>
<body>
  <div class="admin-shell">
    <aside class="admin-aside">
      <h3>ARS Admin</h3>
      <a href="{{ route('admin.dashboard') }}">Dashboard</a>
      <a href="{{ route('admin.services.index') }}">Services</a>
      <a href="{{ route('admin.projects.index') }}">Projects</a>
      <a href="{{ route('admin.portfolios.index') }}">Portfolio</a>
      <a href="{{ route('admin.catalogs.index') }}">Catalog</a>
      <a href="{{ route('admin.leads.index') }}">Leads</a>
      <form method="POST" action="{{ route('admin.logout') }}" style="margin-top:1rem;">
        @csrf
        <button class="btn btn-outline" type="submit">Logout</button>
      </form>
    </aside>
    <main class="admin-main">
      @include('admin.partials.flash')
      @yield('content')
    </main>
  </div>
</body>
</html>
