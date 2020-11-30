<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style-transaction.css') }}">
  <meta name="csrf-token" content="{{csrf_token()}}" />
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/b769966f19.js" crossorigin="anonymous"></script>
  @stack('styles')
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand mx-auto mx-md-0" href="#"><img src="{{asset('img/logo_trip_mate.png')}}" alt=""></a>
      <div class="booking-steps mr-auto d-md-inline-block d-none">
        <ul class="navbar-nav mt-2">
          <li class="nav-item {{active(['cart/flight/*', 'payment/flight/*'])}}"><span class="mr-4">1. Pesan</span><i class="fa fa-chevron-right"></i></li>
          <li class="nav-item {{active(['payment/flight/*'])}}"><span class="mx-4">2. Bayar</span><i class="fa fa-chevron-right"></i></li>
          <li class="nav-item"><span class="ml-4">3. Selesai</span></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid {{(Route::currentRouteName() == 'cart.flight.index') ? 'bg-warning' : 'bg-dark text-light'}} d-flex justify-content-center py-2">
    Selesaikan {{(Route::currentRouteName() == 'cart.flight.index') ? 'pemesanan' : 'pembayaran'}} dalam
    <div class="ml-1" id="time-countdown"></div></div>
  <main>
    @yield('content')
  </main>

  <footer>
    © TripMate {{date('Y')}}. All Rights Reserved
  </footer>
  <!-- Jquery -->
  <script src="{{ url('plugin/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ url('plugin/bootstrap/js/bootstrap.bundle.js')}}"></script>
  @include('sweetalert::alert')
  @stack('scripts')
</body>
</html>