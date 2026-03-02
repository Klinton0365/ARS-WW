<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="ARS Wood Works — Professional carpentry, interior works, carving, and industrial fit-out services.">
  <title>@yield('title', 'ARS Wood Works')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
</head>
<body>
  @include('partials.nav')
  <main>
    @if (session('success') || $errors->any())
    <div class="container" style="padding-top:1.5rem;">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if ($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
      @endif
    </div>
    @endif
    @yield('content')
  </main>
  @include('partials.footer')
  @include('partials.lead-popup')
  <script src="{{ asset('assets/js/site.js') }}"></script>
</body>
</html>
