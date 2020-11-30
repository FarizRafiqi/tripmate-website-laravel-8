<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('img/icon_tripmate.png')}}" type="image/icon">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  <!-- Bootstrap CSS -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <!-- Custom Styles -->
  @stack('stylesheets')
  <!-- Main Styles -->
  <link href="{{ url('/css/style.css') }}" rel="stylesheet" />
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/b769966f19.js" crossorigin="anonymous"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <header>
    @include('web.frontend.layouts.header')
  </header>
  <div class="wrapper d-flex">
    <!-- Main Content -->
    <main>
      @yield('content')
    </main>

    @isset($flightorders)
    <!-- Sidebar -->
    <div class="sidebar border bg-white p-3" id="sidebar-wrapper">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <div class="sidebar-heading">Pencarian Terakhir</div>
        <button type="button" class="close" aria-label="Close" id="btnCloseSidebar">
          <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
      @if(count($flightorders) != 0)
        <form action="{{route('delete_last_search')}}" method="POST">
          @csrf
          <button type="submit" class="btn text-danger p-0">Hapus semua</button>
        </form>
      @else
        Tidak ada pencarian terakhir
      @endif
      <ul class="list-group mt-2">
        @foreach($flightorders as $flightorder)
          <a href="#" class="list-group-item text-decoration-none">
            <div class="d-flex align-items-center">
              <div class="origin">{{$flightorder->flights()->first()->fromAirport->city->name}}</div>
              <i class="fa fa-long-arrow-right mx-2" aria-hidden="true"></i>
              <div class="destination">{{$flightorder->flights()->first()->toAirport->city->name}}</div>
            </div>

            <div class="d-flex align-items-center">
              @foreach($flightorder->flights as $flight)
                {{date('d M y', strtotime($flight->departure_time))}}
                @if(count($flightorder->flights) > 1)
                  @if($loop->last)
  
                  @else
                    <span class="mx-1">&minus;</span>
                  @endif
                @endif
              @endforeach
              <span class="dot-circle mx-2"></span>
              {{$flightorder->total_passenger}} Penumpang
            </div>
          </a>
        @endforeach
      </ul>
    </div>
    <!-- End of Sidebar -->
    @endisset
  </div>
  <!-- Footer -->
  @include('web.frontend.layouts.footer')

  <!-- Jquery -->
  <script src="{{ url('plugin/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap JS -->
  <script src="{{ url('plugin/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <!-- Custom JS -->
  @stack('scripts')
  <script src="{{ url('js/main.js') }}"></script>
  <script>
    $("#btnLastSearch").on("click", function(){
      $("#sidebar-wrapper").toggleClass('toggled');
    });
    
    $("#btnCloseSidebar").on("click", function(){
      $("#sidebar-wrapper").toggleClass('toggled');
    });
  </script>
</body>
</html>
