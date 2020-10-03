@extends('web.frontend.layout')

@section('title', 'Harga Tiket Pesawat Murah - Cari & Pesan Tiket Hanya di TripMate')

@push('stylesheets')
  <link rel="stylesheet" href="{{ url('plugin/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css') }}">
@endpush

@section('content')
  <div class="train">
    <!-- Preview Train -->
    <div class="preview-train">
      <div class="overlay"></div>
      <div class="container-fluid bg-white">
        <div class="container px-0 position-relative">
          
          <div class="row preview-train-content">
            <div class="col-xl-10 col-lg-9 col-md-8 col-12">
              <div class="choose-train row align-items-center pl-lg-0">
                <div class="left-side col-auto mr-4 pr-0 d-lg-inline-block d-md-none d-none">
                  <img src="{{ url('img/icons/ic_facing_right_train_circle.png') }}" alt="" width="32px" height="32px">
                </div>
                <div class="right-side col-auto p-lg-0 pl-3">
                  <div class="text-choose">Pilih Kereta Pergi</div>
                  <div class="list d-flex align-items-center">
                    <div class="text-station mr-1 d-md-inline-block d-none">Bandung</div>
                    <div class="text-station-code">(ALL)</div>
                    <i class="fa fa-long-arrow-alt-right mx-2"></i>
    
                    <div class="text-station mr-1 d-md-inline-block d-none">Jakarta</div>
                    <div class="text-station-code">(ALL)</div>
    
                    <div class="dot-circle mx-lg-3 mx-md-3 mx-3"></div>
                    
                    <div class="text-depart-date">Jum, 10 Sep</div>
    
                    <div class="dot-circle mx-3"></div>
    
                    <div class="text-passengers">
                      1 Penumpang
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-12 border-left mb-lg-0 mb-md-0 mb-3 d-flex align-items-center justify-content-lg-end justify-content-md-end justify-content-center">
              <div class="content">
                <div class="border-left-ticket"></div>
                <button class="btn btn-light btn-ubah-pencarian" data-toggle="modal" data-target="#changeSearchModal">
                  Ubah Pencarian
                </button>
              </div>
            </div>
          </div>

          <!-- Change Train Form -->
          <div class="modal fade" id="changeSearchModal">
            <div class="modal-dialog modal-xl m-0">
              <div class="modal-content py-3">
                <div class="modal-body">
                  <div class="wrapper-change-search container-fluid">
                    <div class="wrapper-form container px-0">
                      <form>
                        <div class="row">
                          <div class="col-lg-10 col-md-10 col-12">
                            <div class="row no-gutters">
                              <div class="col-lg-3 col-md-3 col-6 px-2">
                                <div class="form-group">
                                  <span><i class="fa fa-train"></i></span>
                                  <label for="inputStasiunAsal">Dari</label>
                                  <input type="text" name="stasiun_asal" id="inputStasiunAsal" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-6 px-2">
                                <div class="form-group">
                                  <span><i class="fa fa-train"></i></span>
                                  <label for="inputStasiunTujuan">Ke</label>
                                  <input type="text" name="stasiun_tujuan" id="inputStasiunTujuan" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-6 px-2">
                                <div class="form-group">
                                  <span class="fa-stack position-absolute">
                                    <i class="far fa-calendar-alt fa-stack-1x"></i>
                                    <i class="fa fa-arrow-right fa-stack-2x"></i>
                                  </span>
                                  <label for="inputTanggalBerangkat">Berangkat</label>
                                  <input type="text" name="tanggal_berangkat" id="inputTanggalBerangkat" class="form-control" autocomplete="off">
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-3 col-6 px-2">
                                <div class="form-group">
                                  <span class="fa-stack position-absolute">
                                    <i class="far fa-calendar-alt fa-stack-1x"></i>
                                    <i class="fa fa-arrow-left fa-stack-2x"></i>
                                  </span>
                                  <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="checkboxTanggalPulang">
                                    <label class="custom-control-label" for="checkboxTanggalPulang">Pulang</label>
                                  </div>
                                  <input type="text" name="tanggal_pulang" id="inputTanggalPulang" class="form-control" autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Button Cari Penerbangan -->
                          <div class="col-lg-2 col-md-2 col-12 d-flex align-items-lg-center align-items-md-center align-items-center justify-content-lg-end justify-content-md-end justify-content-center mt-lg-0 mt-md-0 mt-3">
                            <div class="btn btn-orange">CARI</div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Change Train Form -->

        </div>
      </div>
    </div>
    <!-- End of Preview Train -->

    <!-- Search Result -->
    <div class="wrapper-search-result position-relative">
      <div class="container">
        <div class="row">
          
           <!-- Filter -->
          <div class="col-lg-4 col-md-4 col d-md-inline-block px-xl-0 pr-md-0 mb-5 col-filter">
            <div class="filter">
              <div class="filter-header row mb-3">
                <div class="col-6 text-filter">
                  Filter
                </div>
                <div class="col-6 text-right pt-1" id="btnReset">
                  RESET
                </div>
              </div>
              <div class="filter-body card">
                <div class="card-body">
                  <div id="filterAccordion">
                    <!-- Train CLass Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section1Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#trainClass" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Kelas</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="trainClass" class="collapse in">
                        <div class="card-body">
                          <!-- Horizontal Form -->
                          <div class="form-group row align-items-center">
                            <label for="ekonomi" class="col-10 col-form-label">
                              Ekonomi
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="ekonomi">
                            </div>
                            <label for="bisnis" class="col-10 col-form-label">
                              Bisnis
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="bisnis">
                            </div>
                            <label for="eksekutif" class="col-10 col-form-label">
                              Eksekutif
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="eksekutif">
                            </div>
                          </div>
                          <!-- End of Horizontal Form -->
                        </div>
                      </div>
                    </div>
                    <!-- End of Train Class Filter -->

                    <hr class="mb-2 mt-3 mx-2">
                    
                    <!-- Time Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section3Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#trainTime" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Waktu</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="trainTime" class="collapse in">
                        <div class="card-body">
                          <!-- Horizontal Form -->
                          <div class="form-group row align-items-center">
                            <label for="departure_dawn" class="col-10 col-form-label">
                              00:00 - 06:00
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_dawn">
                            </div>
                            <label for="departure_morning" class="col-10 col-form-label">
                              00:00 - 06:00
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_morning">
                            </div>
                            <label for="departure_afternoon" class="col-10 col-form-label">
                              12:00 - 18:00
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_afternoon">
                            </div>
                            <label for="departure_evening" class="col-10 col-form-label">
                              18:00 - 24:00
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_evening">
                            </div>
                          </div>
                          <!-- End of Horizontal Form -->
                        </div>
                      </div>
                    </div>
                    <!-- End of Time Filter -->

                    <hr class="mb-2 mt-3 mx-2">

                    <!-- Train Name Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section3Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#trainName" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Nama Kereta</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="trainName" class="collapse in">
                        <div class="card-body">
                          <!-- Horizontal Form -->
                          <div class="form-group row align-items-center">
                            <label for="serayu32" class="col-10 col-form-label">
                              Serayu
                            </label>
                            <div class="col-2">
                              <input type="checkbox" class="form-control m-auto" id="serayu32">
                            </div>
                          </div>
                          <!-- End of Horizontal Form -->
                        </div>
                      </div>
                    </div>
                    <!-- End of Train Name Filter -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Filter -->

          <!-- Available Train List -->
          <div class="col-lg-8 col-md-8 pr-xl-0 mb-5 col-result">
            <div class="wrapper-result">

              <!-- Train Ticket List -->
              <div class="wrapper-train-list bg-white">
                <div class="row position-relative">
                  <!-- Train Name and Trip Class -->
                  <div class="col-12 col-lg-4 col-train-desc">
                    <span class="nama-kereta">Serayu 325</span>
                    <div class="kelas-kereta">Ekonomi</div>
                  </div>
                  <!-- End of Train Name and Trip Class-->

                  <!-- Middle of Card -->
                  <div class="col-6 col-md-8 col-lg-5 col-time-desc">
                    <!-- Train Trip Timeline -->
                    <div class="train-timeline">
                      <div class="row align-items-center">
                        <div class="departure-time d-lg-inline-block d-flex align-items-center col-lg-auto col-12">
                          <div class="text-time">21:50</div>
                          <div class="text-code pl-lg-0 pl-2">CMI</div>
                        </div>
                        <div class="trip-duration col-lg-auto col-12 pl-lg-0 pl-5 text-lg-center">
                          <div class="text-total-time">0j 30m</div>
                          <hr class="my-1 d-lg-block d-none">
                          <div class="text-total-time">Langsung</div>
                        </div>
                        <div class="train-icon col-lg-auto col-2 d-lg-inline-block pl-0 d-none text-center">
                          <img src="{{ url('img/icons/ic_facing_right_gray_train.png') }}" width="26px" height="26px" alt="ICON-kereta">
                        </div>
                        <div class="arrival-time d-lg-inline-block d-flex align-items-center col-lg-auto col-12 px-lg-0">
                          <div class="text-time mr-lg-0">21:51</div>
                          <div class="text-code pl-lg-0 pl-2">JNG</div>
                        </div>
                      </div>
                    </div>
                    <!-- End Train Trip Timeline -->
                  </div>
                  <!-- End of Middle Card -->

                  <!-- Right Side -->
                  <div class="col-6 col-md-4 col-lg-3 right d-lg-inline-block d-flex align-items-end justify-content-end pb-lg-0 pb-2 col-price-desc">
                    <div class="text-price text-right">
                      IDR 63.000
                    </div>
                  </div>
                  <!-- End of Right Side -->

                  <!-- Details and Choose Button -->
                  <div class="col-12">
                    <div class="row">
                      <!-- Detail Buttons -->
                      <div class="btn-details col-12 col-sm-7 col-md-9 col-lg-5 offset-lg-4 mt-lg-3 mt-2 order-2 order-sm-1">
                        <a href="#train-detail" class="text-decoration-none" id="train-detail-btn-1" data-toggle="collapse">Detail Perjalanan</a>
                        <a href="#price-detail" class="text-decoration-none ml-4" id="price-detail-btn-1" data-toggle="collapse">Detail Harga</a>
                      </div>
                      <!-- End of Detail Buttons -->
                      <div class="btn-book-now col-12 col-sm-5 col-md-3 text-right order-1 order-sm-2">
                        <a href="#" class="btn bg-gradation-blue text-white">PILIH</a>
                      </div>
                    </div>
                  </div>
                  <!-- End of Details and Choose Button -->
                </div>
                
                <!-- Train Detail -->
                <div class="wrapper-collapse collapse mt-4" id="train-detail" data-parent=".wrapper-train-list">
                  <hr>
                  <div class="row pt-3">
                    <div class="col-auto">
                      <div class="text-time-fd">21:50</div>
                      <div class="text-date-fd">15 Sep</div>
                    </div>
  
                    <div class="col-lg-8 col-md-6 col-sm-6 col-9 text-left">
                      <div class="text-airport text-truncate">Bandung</div>
                      <div class="text-airport-terminal"></div>
                    </div>
  
                    <div class="col-lg-2 col-md-3 col-sm-3 col-12 text-right">
                      <i class="far fa-clock"></i>
                      <span class="text-total-time">
                        0j 1m
                      </span>
                    </div>
                  </div>
                  <div class="row pr-3">
                    <table>
                      <tbody>
                        <tr>
                          <th class="col-train-detail-1 text-date-fd col">0j 1m</th>
                          <th class="th-detail position-relative">
                            <div class="col-train-detail-2">
                              <div class="box-train-detail">
                                <div class="detail-info-wrapper">
                                  <div class="details-info-body">
                                    <div class="nama-kereta">Serayu 325</div>
                                    <div class="kelas-kereta">Ekonomi</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-auto">
                      <div class="text-time-fd">21:50</div>
                      <div class="text-date-fd">15 Sep</div>
                    </div>
  
                    <div class="col-lg-8 col-md-6 col-6 text-left">
                      <div class="text-airport text-truncate">Jatinegara</div>
                      <div class="text-airport-terminal"></div>
                    </div>
                  </div>

                  <!-- Train Transit -->
                  <!-- <div class="transit">
                    <div class="row">
                      <div class="text-transit col">
                        <label>0j 1m</label>
                        Transit di Lombok (LOP)
                      </div>
                    </div>
                  </div> -->
                  <!-- End of Train Transit -->

                </div>
                <!-- End of Train Detail -->

                <!-- Price Detail -->
                <div class="wrapper-collapse collapse mt-4" id="price-detail" data-parent=".wrapper-train-list">
                  <hr>
                  <div class="wrapper-detail price-details pt-3">
                    <div class="row">
                      <div class="col-12">
                        <div class="text-subtitle">Tarif</div>
                      </div>
                      <div class="col-12">
                        <div class="train-name">Serayu - Ekonomi</div>
                        <div class="row">
                          <div class="col-6 col-passenger">
                            <ul class="pl-3"> 
                              <li>Dewasa (x1)</li>
                            </ul>
                          </div>
                          <div class="col-6 col-price text-right">
                            IDR 63.000
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="text-subtitle">Biaya lainnya</div>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6 col-tax">
                            <ul class="pl-3 mb-0"> 
                              <li>Pajak</li>
                            </ul>
                          </div>
                          <div class="col-6 text-free text-right mb-0">
                            Termasuk
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6 col-tax">
                            <ul class="pl-3 mb-0"> 
                              <li>Biaya Layanan Penumpang</li>
                            </ul>
                          </div>
                          <div class="col-6 text-free text-right mb-0">
                            GRATIS
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="row">
                          <div class="col-6 text-total">Total</div>
                          <div class="col-6 col-price-total text-right">IDR 63.000</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Price Detail -->
                
              </div>
              <!-- End of Train Ticket List -->

              <!-- Empty States No Train Available -->
              <div class="no-train-available bg-white py-5 px-5">
                <div>
                  <img src="{{ url('img/empty-state-train.png') }}" class="img-fluid" alt="illustration">
                </div>
                <div class="text-no-train-available text-center">Kereta ini belum tersedia</div>
                <div class="text-no-train-available-desc mt-3 text-center">Ubah pencarian dengan asal dan tujuan atau tanggal yang berbeda.</div>

                <div class="btn-change mt-4 text-center">
                  <button class="btn btn-orange" data-toggle="modal" data-target="#changeSearchModal">
                    Ubah Pencarian
                  </button>
                </div>

              </div>
              <!-- End of Empty States No Train Available -->

            </div>
          </div>
          <!-- End of Available Train List -->
        </div>
      </div>
    </div>
    <!-- End of Search Result -->
  </div>
@endsection

@push('scripts')
  <script src="{{ url('plugin/moment-js/moment-js.js') }}"></script>
  <script src="{{ url('plugin/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ url('plugin/bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.id.min.js') }}"></script>
@endpush