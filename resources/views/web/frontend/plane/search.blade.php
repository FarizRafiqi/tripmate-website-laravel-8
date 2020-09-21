@extends('web.frontend.layout')

@section('title', 'Harga Tiket Pesawat Murah - Cari & Pesan Tiket Hanya di TripMate')

@push('stylesheets')
  <link rel="stylesheet" href="{{ url('plugin/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css') }}">
@endpush

@section('content')
  <div class="flight">
    <!-- Preview Flight -->
    <div class="preview-flight">
      <div class="overlay"></div>
      <div class="container-fluid bg-white">
        <div class="container px-0 position-relative">
          
          <div class="row preview-flight-content">
            <div class="col-xl-10 col-lg-9 col-md-8 col-12">
              <div class="choose-flight row align-items-center pl-lg-0">
                <div class="left-side col-auto mr-4 pr-0 d-lg-inline-block d-md-none d-none">
                  <img src="{{ url('img/icons/ic_flight_depart.png') }}" alt="" width="32px" height="32px">
                </div>
                <div class="right-side col-auto p-lg-0 pl-3">
                  <div class="text-choose">Pilih Penerbangan Pergi</div>
                  <div class="list d-flex align-items-center">
                    <div class="text-airport mr-1 d-lg-inline-block d-md-none d-none">Soekarno Hatta</div>
                    <div class="text-airport-code">(CGK)</div>
                    <i class="fa fa-long-arrow-alt-right mx-2"></i>
    
                    <div class="text-airport mr-1 d-lg-inline-block d-md-none d-none">Ngurah Rai</div>
                    <div class="text-airport-code">(DPS)</div>
    
                    <div class="dot-circle d-lg-inline-block d-md-inline-block mx-lg-3 mx-md-3 mx-3"></div>
                    
                    <div class="text-depart-date">Jum, 10 Sep</div>
    
                    <div class="dot-circle d-lg-inline-block d-md-inline-block mx-3"></div>
    
                    <div class="text-passengers d-flex">
                      <span class="jumlah-penumpang">1</span>
                      <i class="fa fa-user d-lg-none d-md-none d-inline-block mt-lg-0 mt-md-0 mt-1 mr-1"></i>
                      <span class="d-lg-inline-block d-md-inline-block d-none ml-1">Penumpang</span>
                    </div>
    
                    <div class="dot-circle d-lg-inline-block d-md-inline-block mx-3"></div>
    
                    <div class="text-cabin-class">Ekonomi</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-12 border-left mb-lg-0 mb-md-0 mb-3 d-flex align-items-center justify-content-lg-end justify-content-md-end justify-content-center">
              <div class="content">
                <div class="border-left-ticket"></div>
                <div class="btn btn-light btn-ubah-pencarian">
                  Ubah Pencarian
                </div>
              </div>
            </div>
          </div>

          <!-- Change Flight Form -->
          <div class="wrapper-change-search d-none">
            <div class="wrapper-form bg-white">
              <form>
                <div class="row">
                  <div class="col-lg-10 col-md-10 col-12">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                          <span><i class="fa fa-plane-departure"></i></span>
                          <label for="inputBandaraAsal">Dari</label>
                          <input type="text" name="" id="inputBandaraAsal" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                          <span><i class="fa fa-plane-arrival"></i></span>
                          <label for="inputBandaraTujuan">Ke</label>
                          <input type="text" name="" id="inputBandaraTujuan" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                          <span class="fa-stack position-absolute">
                            <i class="far fa-calendar-alt fa-stack-1x"></i>
                            <i class="fa fa-arrow-right fa-stack-2x"></i>
                          </span>
                          <label for="inputTanggalBerangkat">Berangkat</label>
                          <input type="text" name="" id="inputTanggalBerangkat" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                          <span class="fa-stack position-absolute">
                            <i class="far fa-calendar-alt fa-stack-1x"></i>
                            <i class="fa fa-arrow-left fa-stack-2x"></i>
                          </span>
                          <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="checkboxTanggalPulang">
                            <label class="custom-control-label" for="checkboxTanggalPulang">Pulang</label>
                          </div>
                          <input type="text" name="" id="inputTanggalPulang" class="form-control" autocomplete="off">
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
          <!-- End of Change Flight Form -->

        </div>
      </div>
    </div>
    <!-- End of Preview Flight -->

    <!-- Search Result -->
    <div class="wrapper-search-result position-relative" id="wrapperPencarianPenerbangan">
      <div class="container">
        <div class="row">
           <!-- Filter -->
          <div class="col-lg-4 col-md-4 d-lg-inline-block d-md-inline-block d-none px-xl-0 pr-0 col-filter">
            <div class="filter">
              <div class="filter-header row mb-3">
                <div class="col-6 text-filter">
                  Filter
                </div>
                <div class="col-6 text-right" id="btnReset">
                  RESET
                </div>
              </div>
              <div class="filter-body card">
                <div class="card-body">
                  <div id="filterAccordion">
                    <!-- Transit Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section1Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section1Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Transit</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section1Content" class="collapse in">
                        <div class="card-body">
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="direct">
                            <label class="custom-control-label" for="direct">Langsung</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="stop">
                            <label class="custom-control-label" for="stop">1 Transit</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="stops">
                            <label class="custom-control-label" for="stops">2+ Transit</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Transit Filter -->

                    <hr class="mb-2 mt-3">
                    
                    <!-- Transit Duration Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section2Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section2Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Durasi Transit</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section2Content" class="collapse in">
                        <div class="card-body">
                          <label for="customRange2" class="title">Durasi per transit: </label>
                          <input type="range" class="custom-range" min="0" max="13" id="customRange2">
                          <div class="text-hour d-flex align-items-center justify-content-between">
                            <span>0j</span>
                            <span>13j</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Transit Duration Filter -->

                    <hr class="mb-2 mt-3">

                    <!-- FLight Time Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section3Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section3Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Waktu</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section3Content" class="collapse in">
                        <div class="card-body">
                          <div class="title">Berangkat</div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="departure_dawn">
                            <label class="custom-control-label" for="departure_dawn">00:00 - 06:00</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="departure_morning">
                            <label class="custom-control-label" for="departure_morning">06:00 - 12:00</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="departure_afternoon">
                            <label class="custom-control-label" for="departure_afternoon">12:00 - 18:00</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="departure_evening">
                            <label class="custom-control-label" for="departure_evening">18:00 - 24:00</label>
                          </div>

                          <div class="title">Tiba</div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="arrival_dawn">
                            <label class="custom-control-label" for="arrival_dawn">00:00 - 06:00</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="arrival_morning">
                            <label class="custom-control-label" for="arrival_morning">06:00 - 12:00</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="arrival_afternoon">
                            <label class="custom-control-label" for="arrival_afternoon">12:00 - 18:00</label>
                          </div>
                          <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" name="" class="custom-control-input" id="arrival_evening">
                            <label class="custom-control-label" for="arrival_evening">18:00 - 24:00</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of FLight Time Filter -->

                    <hr class="mb-2 mt-3">

                    <!-- Airlines Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section4Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section4Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Maskapai</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section4Content" class="collapse in">
                        <div class="card-body">
                          <div class="custom-control custom-checkbox">
                            <div class="logo-airline-wrapped">
                              <img src="{{ url('img/logo_partners/Citilink.png') }}" class="img-fluid" alt="" width="53px" height="30px">
                            </div>
                            <div class="checkbox-wrapper">
                              <input type="checkbox" name="" class="custom-control-input" id="QGcheckbox">
                              <label class="custom-control-label" for="QGcheckbox">Citilink</label>
                              <div class="price-from">Example</div>
                            </div>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <div class="logo-airline-wrapped">
                              <img src="{{ url('img/logo_partners/Garuda.png') }}" class="img-fluid" alt="" width="53px" height="30px">
                            </div>
                            <div class="checkbox-wrapper">
                              <input type="checkbox" name="" class="custom-control-input" id="GAcheckbox">
                              <label class="custom-control-label" for="GAcheckbox">Garuda Indonesia</label>
                              <div class="price-from">Example</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Airlines Filter -->

                    <hr class="mb-2 mt-3">

                    <!-- Facilities Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section5Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section5Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Fasilitas</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section5Content" class="collapse in">
                        <div class="card-body">
                          Section 5 content
                        </div>
                      </div>
                    </div>
                    <!-- End of Facilities Filter -->

                    <hr class="mb-2 mt-3">

                    <!-- Transit Airport Filter -->
                    <div class="card">
                      <div class="card-header p-0" id="section6Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section6Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Bandara Transit</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section6Content" class="collapse in">
                        <div class="card-body">
                          Section 6 content
                        </div>
                      </div>
                    </div>
                    <!-- End of Transit Airport Filter -->

                    <hr class="mb-2 mt-3">

                    <!-- Flight Duration Filter -->
                    <div class="card mb-2">
                      <div class="card-header p-0" id="section7Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section7Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Durasi Perjalanan</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section7Content" class="collapse in">
                        <div class="card-body">
                          Section 7 content
                        </div>
                      </div>
                    </div>
                    <!-- End of Flight Duration Filter -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Filter -->

          <!-- Available Flight List -->
          <div class="col-lg-8 col-md-8 pr-xl-0 col-result">
            <div class="wrapper-result">

              <!-- Flight Ticket List -->
              <div class="wrapper-flight-list bg-white">
                <div class="row position-relative">
                  <!-- Nama Maskapai -->
                  <div class="col-md-12 col-9 px-lg-3 pt-lg-0">
                      <span class="maskapai-penerbangan">Lion Air</span>
                  </div>

                  <!-- Left Side of Card -->
                  <div class="col-lg-7 col-md-12 col-sm-8 col-12 left">
                    <div class="row align-items-lg-center align-items-md-center">

                      <!-- Airline Logo -->
                      <div class="col-xl-3 col-lg-3 col-md-2 col-12 my-2 pr-0">
                        <div class="logo-airline text-xl-center text-lg-center">
                          <img src="{{ url('img/logo_partners/Lion.png') }}" alt="AIRLINE_ICON">
                        </div>
                      </div>
                       <!-- End of Airline Logo -->

                      <!-- Flight Timeline -->
                      <div class="col-xl-6 col-lg-5 col-md-7 col-8 pl-lg-0 mt-lg-0 mt-md-2 flight-timeline">
                        <div class="row align-items-center">
                          <div class="departure-time col-lg-auto col-md-auto col-auto">
                            <div class="text-time">21:50</div>
                            <div class="text-code">DPS</div>
                          </div>
                          <div class="flight-icon col-lg-auto col-md-2 col-2 text-center">
                            <img src="{{ url('img/icons/ic_pesawat_tampak_atas_abu.png') }}" width="16px" height="16px" alt="ICON-pesawat">
                          </div>
                          <!-- <div class="flight-duration text-center">
                            <div class="text-total-time">12j 0m</div>
                            <div class="timeline">
                              <hr class="hr-line">
                            </div>
                            <div class="text-total-time">1 Transit</div>
                          </div> -->
                          <div class="arrival-time col-lg-auto col-md-auto col-auto">
                            <div class="text-time mr-lg-0">21:51</div>
                            <div class="text-code">DPS</div>
                          </div>
                        </div>
                      </div>
                       <!-- End Flight Timeline -->

                      <div class="col-xl-3 col-lg-3 col-md-3 col-4 mt-lg-0 mt-md-2 pr-0">
                        <div class="flight-duration">
                          <div class="text-total-time">0j 1m</div>
                          <div class="flight-type">Langsung</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End of Left Side of Card -->

                  <!-- Right Side -->
                  <div class="col-lg-5 col-md-12 col-sm-4 col-12 mt-md-0 mt-2 pl-0 right">
                    <div class="row align-items-lg-start align-items-sm-center h-100">
                      <!-- Facilities List -->
                      <div class="col-lg-4 d-lg-inline-block d-none px-0">
                        <div class="baggage-list text-center">
                          <span class="facilities-icon">
                            <img src="{{ url('img/icons/fasilitas/ic_bagasi.png') }}" alt="ICON-baggage" width="20px" height="20px" data-toggle="tooltip" data-placement="bottom" title="Bagasi 5kg">
                          </span>
                          <span class="facilities-icon">
                            <img src="{{ url('img/icons/fasilitas/ic_bagasi.png') }}" alt="ICON-baggage" width="20px" height="20px" data-toggle="tooltip" data-placement="bottom" title="Bagasi 5kg">
                          </span>
                          <span class="facilities-icon">
                            <img src="{{ url('img/icons/fasilitas/ic_bagasi.png') }}" alt="ICON-baggage" width="20px" height="20px" data-toggle="tooltip" data-placement="bottom" title="Bagasi 5kg">
                          </span>
                        </div>
                      </div>
                      <!-- End of Facilities List -->
                      <div class="col-lg-8 col-md-12 col-12 pt-lg-0 pt-md-2 pt-4 pl-0">
                        <div class="text-price text-right">
                          IDR 25.500.000
                          <label class="text-pax">/org</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End of Right Side -->

                  <!-- Detail Buttons -->
                  <div class="col-lg-9 col-md-8 col-12 mt-3">
                    <!-- <span class="d-lg-none d-inline-block" id="btn-detail-responsive"><a href="#navTabDetails" data-toggle="collapse"><i class="fa fa-chevron-down"></i></a></span> -->
                    <p class="btn-details">
                      <a href="#flight-detail" class="text-decoration-none" id="flight-detail-btn-1" data-toggle="collapse">Detail Penerbangan</a>
                      <a href="#price-detail" class="text-decoration-none ml-4" id="price-detail-btn-1" data-toggle="collapse">Detail Harga</a>
                    </p>
                  </div>
                  <!-- End of Detail Buttons -->

                  <div class="col-lg-3 col-md-4 mt-2 d-md-inline-block d-none btn-book-now text-right">
                    <a href="#" class="btn bg-gradation-blue text-white">PILIH</a>
                  </div>
                </div>
                
                <!-- Flight Detail -->
                <div class="wrapper-collapse collapse" id="flight-detail" data-parent=".wrapper-flight-list">
                  <hr>
                  <div class="row pt-3">
                    <div class="col-auto">
                      <div class="text-time-fd">21:50</div>
                      <div class="text-date-fd">15 Sep</div>
                    </div>
  
                    <div class="col-lg-8 col-md-6 col-sm-6 col-9 text-left">
                      <div class="text-airport text-truncate">Soekarno Hatta</div>
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
                          <th class="col-flight-detail-1 text-date-fd col">0j 1m</th>
                          <th class="th-detail position-relative">
                            <div class="col-flight-detail-2">
                              <div class="box-flight-detail">
                                <div class="detail-info-wrapper">
                                  <div class="details-info-header d-flex align-items-center">
                                    <div class="logo-airline d-flex justify-content-center align-items-center mr-2">
                                      <img src="{{ url('img/logo_partners/Lion.png') }}" alt="AIRLINE_ICON" class="img-fluid">
                                    </div>
  
                                    <div class="header-title">
                                      JT-369
                                    </div>
  
                                    <div class="line"></div>
  
                                    <div class="header-title cabin-class">Ekonomi</div>
                                  </div>
                                  <hr class="d-none">
                                  <div class="details-info-content">
                                    <div class="baggage-list row row-cols-lg-3 row-cols-sm-2 align-items-center">
                                      <div class="facilities-icon col pl-0 mb-3">
                                        <img src="{{ url('img/icons/fasilitas/ic_bagasi.png') }}" alt="ICON-baggage" width="20px" height="20px">
                                        <span class="text-facilities ml-1">
                                          Bagasi 20Kg
                                        </span>
                                      </div>
                                    </div>
                                    
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
                      <div class="text-airport text-truncate">Soekarno Hatta</div>
                      <div class="text-airport-terminal"></div>
                    </div>
                  </div>

                  <!-- Flight Transit -->
                  <div class="transit">
                    <div class="row">
                      <div class="text-transit col">
                        <label>0j 1m</label>
                        Transit di Lombok (LOP)
                      </div>
                    </div>
                  </div>
                  <!-- End of Flight Transit -->

                </div>
                <!-- End of Flight Detail -->

                <!-- Price Detail -->
                <div class="wrapper-collapse collapse" id="price-detail" data-parent=".wrapper-flight-list">
                  <hr>
                  <div class="wrapper-detail price-details pt-3">
                    <div class="row">
                      <div class="col-12">
                        <div class="text-subtitle">Tarif</div>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6 col-passenger">
                            <ul class="pl-3"> 
                              <li>Dewasa (x1)</li>
                            </ul>
                          </div>
                          <div class="col-6 col-price text-right">
                            IDR 25.500.000
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="text-subtitle">Pajak dan biaya lainnya</div>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6 col-tax">
                            <ul class="pl-3"> 
                              <li>Pajak</li>
                            </ul>
                          </div>
                          <div class="col-6 text-free text-right">
                            Termasuk
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="row">
                          <div class="col-6 text-total">Total</div>
                          <div class="col-6 col-price-total text-right">IDR 25.500.000</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Price Detail -->
                
              </div>
              <!-- End of Flight Ticket List -->

              <!-- Empty States No Flight Available -->
              <div class="no-flight-available bg-white py-5 px-5">
                <div>
                  <img src="{{ url('img/empty-state-no-flight-available-edit.png') }}" class="img-fluid" alt="illustration">
                </div>
                <div class="text-no-flight-available text-center">Penerbangan tidak tersedia</div>
                <div class="text-no-flight-available-desc mt-3 text-center">Tip: Ubah pencarian dengan tanggal atau kelas kabin yang berbeda</div>
                <div class="btn-change mt-4 text-center">
                  <button class="btn btn-orange">
                    Ubah Penerbangan
                  </button>
                </div>

              </div>
              <!-- End of Empty States No Flight Available -->

            </div>
          </div>
          <!-- End of Available Flight List -->
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