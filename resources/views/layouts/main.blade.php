<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <!-- Styles -->
        <link href="{{ url('css/app.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <link rel="stylesheet" href="{{ url('plugin/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css') }}">
        <script src="https://kit.fontawesome.com/b769966f19.js" crossorigin="anonymous"></script>
    </head>
    <body>
    
    <!-- Header -->
    <header class="container-fluid bg-gradation-blue" id="header-container">
			<div class="container p-0">
				<nav class="navbar navbar-expand-lg navbar-light m-auto p-lg-0 p-md-0 pt-3 px-0">
					<a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('img/logo_trip_mate.png')}}" alt="Logo TripMate" class="img-fluid logo" ></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
							<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav product-list header-left">
							<li class="nav-item">
									<a class="nav-link text-light" href="{{ url('/pesawat') }}">Pesawat <span class="sr-only">(current)</span></a>
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
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer-group">
      <div class="footer-content">
          <div class="container">
              <div class="tripmate-logo text-center">
                  <img src="{{url('img/logo_trip_mate.png')}}" class="img-fluid logo" alt="">
              </div>
              <div class="row justify-content-lg-center justify-content-center mt-5">
                  <div class="contact-us col-lg-auto col-sm-auto mr-lg-5">
                      <div class="contact-us-content d-flex mb-4">
                          <span class="icon-image"><img src="{{url('img/icons/ic_message.png')}}" alt="Whatsapp Contact"></span>
                          <div class="contact-us-phone content-gray">
                              <span class="d-block">Whatsapp</span>
                              <span>0882-9005-1993</span>
                          </div>
                      </div>
                      <div class="contact-us-content d-flex">
                          <span class="icon-image"><img src="{{url('img/icons/ic_mail.png')}}" alt="Whatsapp Contact"></span>
                          <div class="contact-us-email content-gray">
                              <span class="d-block">Email</span>
                              <span>auliaelihza@gmail.com</span>
                          </div>
                      </div>
                  </div>

                  <div class="footer-list col-lg-auto col-sm-auto col-auto mr-lg-5">
                      <div class="footer-item-title">Produk</div>
                      <div class="footer-item"><a href="#" class="content-gray">Pesawat</a></div>
                      <div class="footer-item"><a href="#" class="content-gray">Kereta Api</a></div>
                  </div>

                  <div class="footer-list col-lg-auto col-sm-auto col-auto">
                      <div class="footer-item-title">Dukungan</div>
                      <div class="footer-item"><a href="#" class="content-gray">Pusat Bantuan</a></div>
                      <div class="footer-item"><a href="#" class="content-gray">Kebijakan</a></div>
                      <div class="footer-item"><a href="#" class="content-gray">Syarat & Ketentuan</a></div>
                  </div>

              </div>
          </div>
      </div>
      <hr>
      <div class="copyright">
        <div class="container text-center content-gray">
            TripMate © <?= date('Y'); ?> All Rights Reserved
        </div>
      </div>
    </footer>

    <script src="{{ url('plugin/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('plugin/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{ url('plugin/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ url('plugin/moment-js/moment-js.js') }}"></script>
    <script src="{{ url('plugin/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('plugin/bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.id.min.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>
    </body>
</html>