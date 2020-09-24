<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Bootstrap CSS -->
  <link href="{{ url('css/app.css') }}" rel="stylesheet" />
  <!-- Custom Styles -->
  @stack('stylesheets')
  <!-- Main Styles -->
  <link href="{{ url('css/style.css') }}" rel="stylesheet" />
  <!-- Font Awesome -->
  <!-- <script src="https://kit.fontawesome.com/b769966f19.js" crossorigin="anonymous"></script> -->
  
</head>
<body id="auth-body">
  <header class="logo-header text-center">
    <img src="{{ url('img/logo_trip_mate.png') }}" class="img-fluid mt-4 logo" alt="LOGO_TRIPMATE">
  </header>
  <main>
    @yield('content')
  </main>
  <footer class="mt-5">
    <div class="copyright">
      <div class="text-center">
        TripMate © <?= date('Y'); ?> All Rights Reserved
      </div>
    </div>
  </footer>

  <!-- Jquery -->
  <script src="{{ url('plugin/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ url('plugin/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <!-- Custom JS -->
  @stack('scripts')
</body>
</html>