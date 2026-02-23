<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | ARS</title>
  <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
</head>
<body>
  <div class="auth-wrap">
    <div class="card auth-card">
      <h2>Admin Login</h2>
      @if ($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
      @endif
      <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="form-row">
          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <label><input type="checkbox" name="remember" value="1"> Remember me</label>
        <div style="margin-top:1rem;">
          <button class="btn btn-primary" type="submit">Login</button>
          <a class="btn btn-outline" href="{{ route('home') }}">Back to Site</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
