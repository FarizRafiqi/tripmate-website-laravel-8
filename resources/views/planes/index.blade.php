@extends("layouts.main")

@section('title', "Harga Tiket Pesawat Murah")

@section("content")
	<div class="home">
		<div class="home-page-widget-overlay"></div>
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

		<div class="container">
			<!-- Flight Form -->
			<div class="card product-widget p-4" id="productWidget">
				<form action="pesawat/search">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="row">

								<!-- Input Bandara Penerbangan -->
								<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3 form-group" id="containerInputBandara1">
									<label for="input-bandara-asal">Dari</label>
									<div class="input-group product-search-input-container">
										<img src="{{ url('img/icons/ic_pesawat_takeoff.png') }}" class="tm tm-pesawat-takeoff">
										<input type="text" class="form-control product-search-input" name="departure" id="input-bandara-asal" placeholder="Mau ke mana?" autocomplete="off">
									</div>
									<div class="dropdown boxairport" id="boxAirport">
										<div class="dropdown-menu shadow">
											<div class="dropdown-header">
													Pilih kota atau bandara
													<i class="fa fa-times"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="reverse-button-container position-relative">
										<span><img src="{{ url('img/icons/ic_opposite_arrow.svg') }}" alt="" class="tm tm-opposite-arrow" id="opposite-arrow"></span>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3 form-group" id="containerInputBandara2">
									<label for="input-bandara-tujuan">Ke</label>
									<div class="input-group product-search-input-container">
										<img src="{{ url('img/icons/ic_pesawat_landing.png') }}" class="tm tm-pesawat-landing">
										<input type="text" class="form-control product-search-input" name="arrival" id="input-bandara-tujuan" placeholder="Mau ke mana?" autocomplete="off">
									</div>
									<div class="dropdown boxairport" id="boxAirport2">
										<div class="dropdown-menu shadow">
											<div class="dropdown-header">
												Pilih kota atau bandara
												<i class="fa fa-times"></i>
											</div>
										</div>
									</div>
								</div>

								<!-- Input Tanggal Penerbangan -->
								<div class="col-lg-6 col-md-6 col-sm-12 mb-3 form-group" id="containerTanggalBerangkat">
										<label for="inputTanggalBerangkat">Tanggal Berangkat</label>
										<div class="input-group product-search-input-container date">
												<img src="{{ url('img/icons/ic_kalender.png') }}" class="tm tm-kalender">
												<input type="text" class="form-control product-search-input" name="dDate" id="inputTanggalBerangkat" value="<?= strftime("%a, %d %b %Y"); ?>">
										</div>
								</div>
								
								<div class="col-lg-6 col-md-6 col-sm-12 mb-3 form-group" id="containerTanggalPulang">
										<div class="custom-control custom-checkbox mb-2">
												<input type="checkbox" class="custom-control-input" id="returnCheckbox">
												<label class="custom-control-label" for="returnCheckbox">Tanggal Pulang</label>
										</div>
										<div class="input-group product-search-input-container date" id="inputTanggalPulangContainer">
												<img src="{{ url('img/icons/ic_kalender.png') }}" class="tm tm-kalender">
												<input type="text" class="form-control product-search-input" name="aDate" id="inputTanggalPulang" value="<?= strftime("%A, %d %b %Y"); ?>">
										</div>
								</div>

								<!-- Input Jumlah Penumpang -->
								<div class="col-lg-6 col-md-6 form-group passenger-dropdown-container dropdown">
									<label>Penumpang</label>
									<div class="input-group">
										<button class="dropdown-toggle text-left form-control product-search-input" id="dropdownMenuButton" data-toggle="dropdown">
										</button>
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
																	<input type="number" name="adult" min="1" max="7" id="adultPassenger" value="1">
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
																	<input type="number" name="child" id="childPassenger" min="0"
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
																	<input type="number" name="infant" id="infantPassenger"
																	min="0"
																	max="4"
																	value="0">
															</div>
													</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Input Kelas Kabin -->
								<div class="col-lg-6 col-md-6 form-group">
									<label for="selectBoxKelasKabin">Kelas Kabin</label>
									<div class="input-group">
										<i class="tm tm-caret"></i>
										<select class="form-control product-search-input" name="class" id="selectBoxKelasKabin">
												<option>Ekonomi</option>
										</select>
									</div>
								</div>

								<!-- Button Cari Penerbangan -->
								<div class="col-lg-12">
										<button type="submit" class="btn product-form-search-button w-100">Cari Penerbangan</button>
								</div>
							</div>
						</div>

						<div class="col-lg-6 d-lg-inline-block d-none illustration-container">
							<div class="row row-cols-1">
								<img src="{{ url('img/icons/aircraft-illustration.svg') }}" alt="ilustrasi pesawat" height="320px">
							</div>
						</div>
					</div>
				</form>
			</div>

			<!-- TripMate Partners Section -->
			<section class="tripmate-partners">
				<div id="partner-flight">
					<div class="text-center">
						<div class="text-airline-partners">Partner Maskapai</div>
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
			</section>

			<hr class="mx-auto">

			<div class="book-cheap">
				<div class="text-book-cheap text-center">Pesan Tiket Pesawat Murah di TripMate</div>
				<div class="col-description row">
					<div class="col-lg-4 col-12 pr-0">
						<div class="d-flex">
							<img src="{{ url('img/icons/ic_reschedule.png') }}" alt="Smart Reschedule">
							<div class="text-bookcheap-title">
								Simple Reschedule
							</div>
						</div>
						<div class="text-bookcheap-description">
							Fitur Simple Reschedule TripMate akan memudahkan Anda melakukan pengajuan reschedule untuk penerbangan pilihan Anda.
						</div>
					</div>
					<div class="col-lg-4 col-12 mt-lg-0 mt-4">
						<div class="d-flex">
							<img src="{{ url('img/icons/ic_refund.png') }}" alt="Smart Refund">
							<div class="text-bookcheap-title">
								Simple Refund
							</div>
						</div>
						<div class="text-bookcheap-description">
							Fitur Simple Refund memungkinkan Anda untuk mendapatkan pengembalian dana dengan mudah jika melakukan pembatalan tiket pesawat online. Simple refund dari TripMate akan memudahkan Anda untuk mendapatkan uang Anda kembali.
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="d-flex">
							<img src="{{ url('img/icons/ic_reschedule.png') }}" alt="Smart Reschedule">
							<div class="text-bookcheap-title">
								Smart Trip
							</div>
						</div>
						<div class="text-bookcheap-description">
							Dapatkan harga tiket pesawat murah untuk penerbangan pulang-pergi ke destinasi favorit Anda. Fitur Smart Trip dari TripMate membuat Anda makin mudah menemukan kombinasi tiket pesawat online PP tanpa harus melakukan pencarian dua kali.
						</div>
					</div>
				</div>
			</div>

			<hr class="mx-auto">
			
			<div class="home-popular">
				<div class="text-popular-title text-center mb-4">Tujuan Terpopuler</div>
				<div class="list-popular row">
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Surabaya</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Murah Ke Bali</a></div>
				</div>
			</div>

			<div class="home-popular mt-5">
				<div class="text-popular-title text-center mb-4">Rute Terpopuler</div>
				<div class="list-popular row">
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
					<div class="col-lg-4 col-md-4 col-auto"><a href="#">Tiket Pesawat Jakarta Bali</a></div>
				</div>
			</div>
			<hr class="mx-auto">
		</div>
	</div>
@endsection