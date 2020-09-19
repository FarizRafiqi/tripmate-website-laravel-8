<!-- Header -->
<div class="bg-gradation-blue" id="header-container">
  <div class="container p-xl-0">
    <nav class="navbar navbar-expand-lg navbar-light m-auto p-lg-0 p-md-0 px-0">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('img/logo_trip_mate.png')}}" alt="Logo TripMate" class="img-fluid logo" ></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav product-list header-left">
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/pesawat') }}">
              Pesawat <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('/kereta-api') }}">Kereta Api</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Bantuan</a>
          </li>
        </ul>
        <ul class="navbar-nav product-list header-right ml-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Cek Order <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-light ml-lg-2" href="#" id="btn-register">Daftar</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>