@extends("layouts.main")

@section("title", "tripmate - Pesan Kereta Lebih Mudah")

@section("content")
	<div class="home-page">
		<div class="home-train">
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
				<!-- Train Form -->
				<div class="card train-form p-4" id="formTrain">
					<form action="" method="POST">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="row">
									<!-- Input Stasiun -->
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3 form-group">
											<label for="input-stasiun-asal">Dari</label>
											<div class="input-group product-search-input-container">
													<img src="{{ url('img/icons/ic_kereta_biru_hadap_kanan.png') }}" class="tm tm-kereta-normal">
													<input type="text" class="form-control product-search-input" id="input-stasiun-asal" autocomplete="off" placeholder="Kota atau stasiun" required>
											</div>
											<div class="dropdown stasiun-list-box" id="boxStasiun1">
													<div class="dropdown-menu shadow">
															<div class="dropdown-header">
																Pilih kota atau stasiun
																<i class="fa fa-times"></i>
															</div>
													</div>
											</div>
									</div>
									<div class="reverse-button-container position-relative">
											<span><img src="{{ url('img/icons/ic_opposite_arrow.svg') }}" alt="" class="tm tm-opposite-arrow" id="opposite-arrow"></span>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-3 mt-lg-0 mt-md-0 mt-2 form-group">
											<label for="input-bandara-tujuan">Ke</label>
											<div class="input-group product-search-input-container">
													<img src="{{ url('img/icons/ic_kereta_biru_hadap_kanan.png') }}" class="tm tm-kereta-reverse">
													<input type="text" class="form-control product-search-input" id="input-stasiun-tujuan" autocomplete="off" placeholder="Mau ke mana?" required>
											</div>
											<div class="dropdown stasiun-list-box" id="boxStasiun2">
													<div class="dropdown-menu shadow">
															<div class="dropdown-header">
																Pilih kota atau stasiun
																<i class="fa fa-times"></i>
															</div>
													</div>
											</div>
									</div>
									<!-- Input Tanggal Perjalanan -->
									<div class="col-lg-6 col-md-6 col-sm-12 mb-3 form-group">
											<label for="inputTanggalBerangkat">Tanggal Berangkat</label>
											<div class="input-group product-search-input-container date">
													<img src="{{ url('img/icons/ic_kalender.png') }}" class="tm tm-kalender">
													<input type="text" class="form-control product-search-input" id="inputTanggalBerangkat" value="<?= strftime("%a, %d %b %Y"); ?>">
											</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 mb-3 form-group">
											<div class="custom-control custom-checkbox mb-2">
													<input type="checkbox" class="custom-control-input" id="returnCheckbox">
													<label class="custom-control-label" for="returnCheckbox">Tanggal Pulang</label>
											</div>
											<div class="input-group product-search-input-container date" id="inputTanggalPulangContainer">
													<img src="{{ url('img/icons/ic_kalender.png') }}" class="tm tm-kalender">
													<input type="text" class="form-control product-search-input" id="inputTanggalPulang">
											</div>
									</div>
									<!-- Input Jumlah Penumpang -->
									<div class="col-lg-6 col-md-6 form-group passenger-dropdown-container dropdown">
										<label>Penumpang</label>
										<div class="input-group">
											<div class="dropdown-toggle form-control product-search-input text-lg-left text-md-left" id="dropdownMenuButton" data-toggle="dropdown">
											</div>
											<div class="dropdown-menu shadow">
													<div class="dropdown-header">
														Penumpang
														<i class="fa fa-times"></i>
													</div>
													<div class="dropdown-item">
															<div class="row">
																	<div class="col-5 passenger-type">
																			<label for="adultPassenger">Dewasa</label>
																			<p><small>Usia 3+</small></p>
																	</div>
																	<div class="col-7">
																			<input type="number" name="" min="1" max="4" id="adultPassenger" value="1">
																	</div>
															</div>
													</div>
													<div class="dropdown-divider"></div>
													<div class="dropdown-item">
															<div class="row">
																	<div class="col-5 passenger-type">
																			<label for="infantPassenger">Bayi</label>
																			<p><small>Dibawah 3</small></p>
																	</div>
																	<div class="col-7">
																			<input type="number" name="" id="infantPassenger"
																			min="0"
																			max="4"
																			value="0">
																	</div>
															</div>
													</div>
											</div>
										</div>
									</div>
									<!-- Button Cari Penerbangan -->
									<div class="col-lg-12">
											<button type="submit" class="btn product-form-search-button w-100">Cari Kereta Api</button>
									</div>
								</div>
							
							</div>
							<div class="col-lg-6 d-lg-inline-block d-none illustration-container">
								<div class="row row-cols-1">
										<img src="{{ url('img/icons/subway-illustration.svg') }}" alt="ilustrasi kereta api" height="340px">
								</div>
							</div>
						
						</div>
					</form>
				</div>
				
				<div class="book-cheap">
					<div class="text-book-cheap text-center">Keuntungan Membeli Tiket Kereta di TripMate</div>
					<div class="col-description row">
						<div class="col-lg-4 col-12 pr-0">
							<div class="d-flex">
								<img src="{{ url('img/icons/ic_reschedule.png') }}" alt="Smart Reschedule">
								<div class="text-bookcheap-title">
									Pilih Kursi Sesuai Keinginan
								</div>
							</div>
							<div class="text-bookcheap-description">
								Bebas memilih tempat duduk favorit anda untuk perjalanan anda di semua gerbong kereta yang disediakan oleh kereta api indonesia
							</div>
						</div>
						<div class="col-lg-4 col-12 mt-lg-0 mt-4 pr-0">
							<div class="d-flex">
								<img src="{{ url('img/icons/ic_refund.png') }}" alt="Smart Refund">
								<div class="text-bookcheap-title">
									Reservasi H-90
								</div>
							</div>
							<div class="text-bookcheap-description">
									Kamu dapat melakukan pembelian tiket 90 hari sebelum waktu keberangkatan untuk semua tujuan dan semua kelas (Eksekutif, Bisnis, dan Ekonomi).
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="d-flex">
								<img src="{{ url('img/icons/ic_reschedule.png') }}" alt="Smart Reschedule">
								<div class="text-bookcheap-title">
									Tidak Perlu Mengantri
								</div>
							</div>
							<div class="text-bookcheap-description">
									Kamu tidak perlu mengantri untuk membeli tiket kereta api. Kamu dapat melakukan pemesanan kapan saja di mana saja menggunakan TripMate.
							</div>
						</div>
					</div>
				</div>

				<!-- Favorit Trains -->
				<hr class="mx-auto">
				<div class="content-link">
					<div class="content-link-title text-center mb-4">Kereta Api Favorit</div>
					<div class="list-popular row">
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Argo Parahyangan</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Sembrani</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Logawa</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Kertajaya</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Kahuripan</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Bima</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Matamarja</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Gajayana</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Argo Wilis</a></div>
					</div>
				</div>

				<!-- Popular Train Routes -->
				<hr class="mx-auto">
				<div class="content-link">
					<div class="content-link-title text-center mb-4">Rute Kereta Api Populer</div>
					<div class="list-popular row">
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Bandung - Jakarta</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Semarang - Jakarta</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Cirebon - Jakarta</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Malang - Jakarta</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Bandung - Jakarta</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Jakarta - Semarang</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Jakarta - Cirebon</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Cirebon - Yogyakarta</a></div>
						<div class="col-lg-4 col-md-4 col-6"><a href="#">Surabaya - Yogyakarta</a></div>
					</div>
				</div>

				<hr class="mx-auto">
			</div>
		</div>
	</div>
@endsection
