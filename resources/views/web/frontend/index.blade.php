<!-- Homepage -->
@extends("web.frontend.layout")

@section('title', 'tripmate - Teman Liburanmu')

@push('stylesheets')
	<link rel="stylesheet" href="{{ url('plugin/select2/dist/css/select2.css') }}">
  <link rel="stylesheet" href="{{ url('plugin/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css') }}">
@endpush

@section('content')
	<div class="home-page">
		<div class="overlay"></div>
		<!-- Banner -->
		<div class="banner bg-gradation-blue">
			<div class="home-slider">
				<div id="carouselHomepage" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselHomepage" data-slide-to="0" class="active"></li>
						<li data-target="#carouselHomepage" data-slide-to="1"></li>
						<li data-target="#carouselHomepage" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<a href="{{ url('/') }}"><img src="{{ url('img/banner-example.png') }}" class="d-block" alt=""></a>
						</div>
						<div class="carousel-item">
							<a href="{{ url('/') }}"><img src="{{ url('img/banner-example.png') }}" class="d-block" alt=""></a>
						</div>
						<div class="carousel-item">
							<a href="{{ url('/') }}"><img src="{{ url('img/banner-example.png') }}" class="d-block" alt=""></a>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselHomepage" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselHomepage" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<!-- End of Banner -->

		<!-- Main Content -->
		<div class="container">
			<!-- Product Form -->
			<div class="card product-widget p-4" id="productWidget">
				<form action="pesawat/search/">
					<div class="row">

						<!-- Left Side -->
						<div class="col-lg-6 col-md-12 col-sm-12">
							<!-- Product List -->
							<div class="product-list row justify-content-lg-between justify-content-md-between justify-content-between">
								<div class="col-6">
									<a href="{{ url('/pesawat') }}" class="btn bg-gradation-blue text-light mr-sm-4 p-2 product" id="plane-product">
                    <img src="{{ url('img/icons/ic_pesawat_putih.png') }}" alt="ic_pesawat"> <span class="d-lg-inline-block d-md-inline-block d-none">Pesawat</span> 
									</a>
								</div>
								<div class="col-6">
									<a href="{{ url('/kereta-api') }}" class="btn bg-light p-2 product">
                    <img src="{{ url('img/icons/ic_kereta_api.png') }}" alt="ic_kereta_api">
                    <span class="d-lg-inline-block d-md-inline-block d-none">Kereta Api</span>
									</a>
								</div>
							</div>
							<!-- End of Product List -->

							<!-- Trip Type Inputs -->
							<div class="custom-control custom-radio custom-control-inline mt-3 col-md-6 col-6 d-lg-inline-block d-none">
                <input type="radio" id="oneway" name="trip" value="oneway" class="custom-control-input" checked>
                <label class="custom-control-label" for="oneway">Sekali Jalan</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline mt-3 col-md-5 col-5 d-lg-inline-block d-none">
                <input type="radio" id="roundtrip" name="trip" value="roundtrip" class="custom-control-input">
                <label class="custom-control-label" for="roundtrip">Pulang-Pergi</label>
							</div>
							<!-- End of Trip Type Inputs -->

							<div class="row">
								<!-- Airport Inputs -->
								<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3 form-group mt-2" id="containerInputBandara1">
                  <label for="input-bandara-asal">Dari</label>
                  <!-- <div class="input-group product-search-input-container">
                      <img src="{{ url('img/icons/ic_pesawat_takeoff.png') }}" class="tm tm-pesawat-takeoff">
											<input type="text" name="bandara_asal" class="form-control product-search-input @error('bandara_asal') is-invalid @enderror" id="input-bandara-asal" autocomplete="off" placeholder="Mau ke mana?" value="{{old('bandara_asal')}}">
											@error('bandara_asal')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
									</div> -->
                  <!-- <div class="dropdown boxairport" id="boxAirport">
                    <div class="dropdown-menu shadow">
                      <div class="dropdown-header">
                        Pilih kota atau bandara
                        <i class="fa fa-times"></i>
											</div>
											@foreach($cities as $city)
												<div class="dropdown-item d-flex">
													<div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
													<div class="dropdown-option-content">
															<div class="airport-city-location">Jakarta</div>
															<div class="airport-city-name">{{ $city->nama }}</div>
													</div>
													<div class="dropdown-option-code ml-auto text-center">{{ $city->kode_iata }}</div>
												</div>
											@endforeach
                    </div>
									</div> -->
									<input type="hidden" name="nama_bandara_asal" value="">
									<div class="input-group product-search-input-container">
										<img src="{{ url('img/icons/ic_pesawat_takeoff.png') }}" class="tm tm-pesawat-takeoff">
										<select name="bandara_asal" id="selectBoxKotaAsal" class="form-control product-search-input @error('bandara_asal') is-invalid @enderror" data-placeholder="Mau ke mana?">
											<option value=""></option>
											@foreach($cities as $city)
												<optgroup label="{{$city->nama}}">
													@foreach($city->airports as $airport)
														<option value="{{$airport->kode_iata}}">{{$airport->nama}}</option>
													@endforeach
												</optgroup>
											@endforeach
										</select>
										@error('bandara_asal')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
                </div>
                
								<div class="reverse-button-container position-relative">
										<span><i class="fas fa-exchange-alt" id="switch-btn"></i></span>
                </div>
                
								<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3 mt-2 form-group" id="containerInputBandara2">
                  <label for="input-bandara-tujuan">Ke</label>
                  <!-- <div class="input-group product-search-input-container">
                    <img src="{{ url('img/icons/ic_pesawat_landing.png') }}" class="tm tm-pesawat-landing">
										<input type="text" name="bandara_tujuan" class="form-control product-search-input @error('bandara_tujuan') is-invalid @enderror" id="input-bandara-tujuan" autocomplete="off" placeholder="Mau ke mana?" value="{{old('bandara_tujuan')}}">
										@error('bandara_tujuan')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
                  </div> -->
                  <!-- <div class="dropdown boxairport" id="boxAirport2">
                    <div class="dropdown-menu shadow">
                      <div class="dropdown-header">
                        Pilih kota atau bandara
                        <i class="fa fa-times"></i>
											</div>
											@foreach($cities as $city)
												<div class="dropdown-item d-flex">
													<div class="dropdown-option-logo mr-3"><i class="fa fa-city"></i></div>
													<div class="dropdown-option-content">
															<div class="airport-city-location">Jakarta</div>
															<div class="airport-city-name">{{ $city->nama }}</div>
													</div>
													<div class="dropdown-option-code ml-auto text-center">{{ $city->kode_iata }}</div>
												</div>
											@endforeach
                    </div>
									</div> -->
									<input type="hidden" name="nama_bandara_tujuan" value="">
									<div class="input-group product-search-input-container">
										<img src="{{ url('img/icons/ic_pesawat_landing.png') }}" class="tm tm-pesawat-takeoff">
										<select name="bandara_tujuan" id="selectBoxKotaTujuan" class="form-control product-search-input @error('bandara_tujuan') is-invalid @enderror" data-placeholder="Mau ke mana?">
											<option value=""></option>
											@foreach($cities as $city)
												<optgroup label="{{$city->nama}}">
													@foreach($city->airports as $airport)
														<option value="{{$airport->kode_iata}}">{{$airport->nama}}</option>
													@endforeach
												</optgroup>
											@endforeach
										</select>
										@error('bandara_tujuan')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
									</div>
								</div>
								<!-- End of Airport Inputs -->

								<!-- Flight Date Inputs -->
								<div class="col-lg-6 col-md-6 col-sm-12 mb-3 form-group" id="containerTanggalBerangkat">
                  <label for="#input-tanggal-berangkat">Tanggal Berangkat</label>
                  <div class="input-group product-search-input-container date">
                    <img src="{{ url('img/icons/ic_kalender.png') }}" class="tm tm-kalender">
                    <input type="text" name="tanggal_berangkat" class="form-control product-search-input @error('tanggal_berangkat') is-invalid @enderror" id="input-tanggal-berangkat"
										value="">
										<!-- <?= strftime("%a, %d %b %Y"); ?> -->
										@error('tanggal_berangkat')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
                  </div>
								</div>
								
								<div class="col-lg-6 col-md-6 col-sm-12 mb-3 form-group" id="containerTanggalPulang">
                  <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="returnCheckbox">
                    <label class="custom-control-label" for="returnCheckbox">Tanggal Pulang</label>
                  </div>
                  <div class="input-group product-search-input-container date" id="inputTanggalPulangContainer">
                    <img src="{{ url('img/icons/ic_kalender.png') }}" class="tm tm-kalender">
										<input type="text" name="tanggal_pulang" class="form-control product-search-input @error('tanggal_pulang') is-invalid @enderror" id="input-tanggal-pulang">
										@error('tanggal_pulang')
											<div class="invalid-feedback">{{$message}}</div>
										@enderror
                  </div>
								</div>
								<!-- End of Flight Date Inputs -->

								<!-- Passenger Amount Input-->
								<div class="col-lg-6 col-md-6 form-group passenger-dropdown-container dropdown">
									<label>Penumpang</label>
									<div class="input-group">
										<div class="dropdown-toggle text-lg-left text-md-left form-control product-search-input" id="dropdownMenuButton" data-toggle="dropdown">
										</div>
										<div class="dropdown-menu shadow">
                      <div class="dropdown-header">
                        Penumpang
                        <i class="fa fa-times"></i>
                      </div>
                      <div class="dropdown-item pb-0">
                        <div class="row">
                          <div class="col-5 passenger-type">
                            <label for="adultPassenger">Dewasa</label>
                          </div>
                          <div class="col-7">
                            <input type="number" name="dewasa" min="1" max="7" id="adultPassenger" value="1">
                          </div>
                        </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <div class="dropdown-item pb-0">
                        <div class="row">
                          <div class="col-5 passenger-type">
                            <label for="childPassenger">Anak</label>
                          </div>
                          <div class="col-7">
                            <input type="number" name="anak" id="childPassenger" min="0"
                            max="6" value="0">
                          </div>
                        </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <div class="dropdown-item pb-0">
                        <div class="row">
                          <div class="col-5 passenger-type">
                            <label for="infantPassenger">Bayi</label>
                          </div>
                          <div class="col-7">
                            <input type="number" name="bayi" id="infantPassenger" min="0" max="4" value="0">
                          </div>
                        </div>
                      </div>
										</div>
									</div>
								</div>
								<!-- End of Passenger Amount Input-->

								<!-- Cabin Class Inputs -->
								<div class="col-lg-6 col-md-6 form-group">
									<label for="selectBoxKelasKabin">Kelas Kabin</label>
									<div class="input-group text-center">
                    <i class="tm tm-caret"></i>
                    <select class="form-control product-search-input" name="kelas" id="selectBoxKelasKabin">
                      <option value="Ekonomi">Ekonomi</option>
                      <option value="Premium Ekonomi">Premium Ekonomi</option>
                      <option value="Bisnis">Bisnis</option>
                      <option value="First">First</option>
                    </select>
									</div>
								</div>
								<!-- End of Cabin Class Inputs -->

								<!-- Flight Search Button -->
								<div class="col-lg-12">
                  <button type="submit" class="btn product-form-search-button">Cari Penerbangan</button>
								</div>
								<!-- End of Flight Search Button -->
							</div>
						</div>
						<!-- End of Left Side -->

						<!-- Right Side -->
						<div class="col-lg-6 d-lg-inline-block d-none illustration-container">
							<div class="row row-cols-1">
								<img src="{{ url('img/illustration-drib-drib-travel.jpg') }}" alt="ilustrasi pesawat" height="450px">
							</div>
						</div>
						<!-- End of Right Side -->
					</div>
				</form>
			</div>
			<!-- End of Product Form -->

			<!-- Feature Section -->
			<section class="feature">
				<div class="container">
					<div class="feature-box row">
						<div class="list col-lg-6 col-sm-6 d-lg-flex d-flex px-0">
							<div class="feature-image">
								<img src="{{ url('img/icons/ic_reschedule.png') }}" alt="Simple Reschedule">
							</div>
							<div class="feature-info">
								<h3 class="title">Simple Reschedule</h3>
								<p class="subtitle">Memudahkan kamu mengatur ulang penerbangan.</p>
							</div>
						</div>
						<div class="list col-lg-6 col-sm-6 d-lg-flex d-flex">
							<div class="feature-image">
								<img src="{{ url('img/icons/ic_refund.png') }}" alt="Simple Refund">
							</div>
							<div class="feature-info">
								<h3 class="title">Simple Refund</h3>
								<p class="subtitle">Refund tiket ga perlu ribet.</p>
							</div>
						</div>
						<div class="list col-lg-6 col-sm-6 d-lg-flex d-flex px-0">
							<div class="feature-image">
								<img src="{{ url('img/icons/ic_profile_book.png') }}" alt="Simple Profile">
							</div>
							<div class="feature-info">
								<h3 class="title">Simple Profile</h3>
								<p class="subtitle">Isi data penumpang tinggal sekali klik.</p>
							</div>
						</div>
						<div class="list col-lg-6 col-sm-6 d-lg-flex d-flex">
							<div class="feature-image">
								<img src="{{ url('img/icons/ic_booking_process.png') }}" alt="Simple Booking Process">
							</div>
							<div class="feature-info">
								<h3 class="title">Simple Booking Process</h3>
								<p class="subtitle">Pemesanan tanpa ribet dimanapun dan kapanpun.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End of Feature Section -->

			<!-- Divider -->
			<hr class="mx-auto">

			<!-- TripMate Partners Section -->
			<section class="tripmate-partners">
				<div class="container">
          <h2 class="font-weight-bolder text-center">Partner Kami</h2>
          
          <!-- Flight Partner -->
					<div id="partner-flight">
						<div class="text-center">
              <div class="partner-product-icon">
                  <img src="{{ url('img/icons/ic_pesawat_gradasi_circle.png') }}" width="70px" height="70px">
              </div>
              <div class="partner-product-name">Pesawat</div>
						</div>
						<div class="partner-product-list row">
							<div class="col-lg-12 col-12">
								<div class="row justify-content-center">
									<div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Citilink"><img src="{{ url('img/logo_partners/Citilink.png') }}"></a>
									</div>
									<div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Garuda Indonesia"><img src="{{ url('img/logo_partners/GarudaIndonesia.png') }}"></a>
									</div>
									<div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Batik Air"><img src="{{ url('img/logo_partners/BatikAir.png') }}"></a>
									</div>
									<div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Wings Air"><img src="{{ url('img/logo_partners/WingsAir.png') }}"></a>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-12">
                <div class="row justify-content-center">
                  <div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Air Asia"><img src="{{ url('img/logo_partners/AirAsia.png') }}"></a>
                  </div>
                  <div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Kalstar Aviation"><img src="{{ url('img/logo_partners/KalstarAviation.png') }}"></a>
                  </div>
                  <div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Lion Air"><img src="{{ url('img/logo_partners/LionAir.png') }}"></a>
                  </div>
                  <div class="col-lg-auto col-md-auto col-3">
                    <a href="#" alt="Tiket Pesawat Sriwijaya Air"><img src="{{ url('img/logo_partners/SriwijayaAir.png') }}"></a>
                  </div>
                </div>
							</div>
						</div>
          </div>
          <!-- End of Flight Partner -->

          <!-- Train Partner -->
					<div id="partner-train">
            <div class="text-center">
              <div class="partner-product-icon">
                <img src="{{ url('img/icons/ic_kereta_api_oren_circle.png') }}" width="70px" height="70px">
              </div>
              <div class="partner-product-name">Kereta</div>
              <div class="partner-product-list row justify-content-center">
                <div><a href="#"><img src="{{ url('img/logo_partners/KAI.png') }}" alt="" width="35%"></a></div>
              </div>
            </div>
          </div>
          <!-- End of Train Partner -->
				</div>
			</section>
			<!-- End of TripMate Partners Section -->

			<!-- Divider -->
			<hr class="mx-auto">

			<!-- TripMate Advantages Section -->
			<section class="tripmate-advantages">
        <div class="container">
          <h2 class="font-weight-bolder text-center">Kenapa Memesan Di TripMate?</h2>
          <div class="row">
            <div class="col-lg-5 col-md-5">
              <img src="{{ url('img/icons/online-payments-illustration.svg') }}" alt="ilustrasi online payments" class="img-fluid">
            </div>
            <div class="col-lg-7 col-md-7">
              <h3 class="title text-lg-left text-sm-center text-center">Tersedia Berbagai Macam Pembayaran</h3>
              <p>Di TripMate kamu tidak perlu repot untuk datang ke tempat ATM. Karena kami menyediakan 3 macam metode pembayaran yaitu ATM Transfer, dan Virtual Account (VA) seperti Online Banking dan Mobile Banking.</p>
            </div>
            <div class="col-lg-7 col-md-7 order-lg-1 order-md-1 order-6">
              <h3 class="title text-lg-left text-sm-center text-center">Banyak Promo Spesial</h3>
              <p>Banyak promo untuk tiket pesawat dan kereta api. Dapatkan diskon terbaik supaya bujet liburan kamu semakin hemat. Tidak ada alasan lagi untuk menunda liburan kamu.</p>
            </div>
            <div class="col-lg-5 col-md-5 order-lg-6 order-md-6">
              <img src="{{ url('img/icons/discount-illustration.svg') }}" alt="ilustrasi discount" class="img-fluid">
            </div>
          </div>
        </div>
			</section>
			<!-- End of TripMate Advantages Section -->

			<!-- Divider -->
			<hr class="mx-auto">
		</div>
		<!-- End of Main Content -->
	</div>
@endsection

@push('scripts')
  <script src="{{ url('plugin/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}"></script>
  <script src="{{ url('plugin/moment-js/moment-js.js') }}"></script>
  <script src="{{ url('plugin/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ url('plugin/bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.id.min.js') }}"></script>
	<script src="{{ url('plugin/select2/dist/js/select2.min.js') }}"></script>
	<script>
		// Plugin Input Spinner
		let config = {
				incrementButton: "<i class='fa fa-plus'></i>",
				decrementButton: "<i class='fa fa-minus'></i>",
		};

		$("input[type='number']").inputSpinner(config);

		function formatBandara (bandara) {
			if (!bandara.id) {
				return bandara.text;
			}
			let $cities = $(
				`<i class="fa fa-city mr-2"></i><span>${bandara.text} </span><span class="dropdown-option-code ml-auto text-center">${bandara.id}</span>`
			);
			return $cities;
		};

		$("#selectBoxKotaAsal").select2({
			dropdownParent: $("#containerInputBandara1"),
			templateResult: formatBandara
		});

		$("#selectBoxKotaTujuan").select2({
			dropdownParent: $("#containerInputBandara2"),
			templateResult: formatBandara
		});

		$('#selectBoxKotaAsal').on('select2:select', function (e) {
			let data = e.params.data;
			$("input[name='nama_bandara_asal']").val(data.text);
			$("#select2-selectBoxKotaAsal-container").append(' ('+data.id+')');
		});
		$('#selectBoxKotaTujuan').on('select2:select', function (e) {
			let data = e.params.data;
			$("input[name='nama_bandara_tujuan']").val(data.text);
			$("#select2-selectBoxKotaTujuan-container").append(' ('+data.id+')');
		});
	</script>
@endpush