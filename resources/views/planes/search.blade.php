@extends('layouts.main')

@section('title', 'Harga Tiket Pesawat Murah - Cari & Pesan Tiket Hanya di TripMate')

@section('content')
  <div class="flight">
    <!-- Ubah Penerbangan -->
    <div class="preview-flight">
      <div class="container">
        <div class="row preview-flight-content">
          <div class="col-lg-10 col-md-9 col-12">
            <div class="choose-flight row align-items-center pl-lg-0 pl-2">
              <div class="left-side col-auto mr-4 pr-0 d-lg-inline-block d-md-none d-none">
                <img src="{{ url('img/icons/ic_flight_depart.png') }}" alt="" width="32px" height="32px">
              </div>
              <div class="right-side col-auto p-lg-0 pl-3">
                <div class="text-choose">Pilih Penerbangan Pergi</div>
                <div class="list d-flex align-items-center">
                  <div class="text-airport mr-1 d-lg-inline-block d-md-inline-block d-none">Soekarno Hatta</div>
                  <div class="text-airport-code">(CGK)</div>
                  <img src="{{ url('img/icons/ic_arrow-right-long.png') }}" class="mx-2" width="20px" height="20px">

                  <div class="text-airport mr-1 d-lg-inline-block d-md-inline-block d-none">Ngurah Rai</div>
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
          <div class="col-lg-2 col-md-3 border-left d-flex align-items-center justify-content-center">
            <div class="content">
              <div class="border-left-ticket"></div>
              <div class="btn btn-light btn-ubah-pencarian mb-lg-0 mb-md-0 mb-4">Ubah Pencarian</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   
    <div class="container" id="wrapperPencarianPenerbangan">
      <div class="row">
         <!-- Filter -->
        <div class="col-lg-4 filter-box">
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
                <div class="card">
                  <div class="card-header p-0" id="section1Header">
                    <div class="collapse-label mt-1 mb-3">
                      <a data-toggle="collapse" data-parent="#filterAccordion" href="#section1Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                        <span>Transit</span>
                        <i class="fa fa-chevron-down"></i>
                      </a>
                    </div>
                  </div>
                  <div id="section1Content" class="collapse in">
                    <div class="card-body">
                      Section 1 content
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0" id="section2Header">
                    <div class="collapse-label my-3">
                      <a data-toggle="collapse" data-parent="#filterAccordion" href="#section2Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                        <span>Durasi Transit</span>
                        <i class="fa fa-chevron-down"></i>
                      </a>
                    </div>
                  </div>
                  <div id="section2Content" class="collapse in">
                    <div class="card-body">
                      Section 2 content
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0" id="section3Header">
                    <div class="collapse-label my-3">
                      <a data-toggle="collapse" data-parent="#filterAccordion" href="#section3Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                        <span>Waktu</span>
                        <i class="fa fa-chevron-down"></i>
                      </a>
                    </div>
                  </div>
                  <div id="section3Content" class="collapse in">
                    <div class="card-body">
                      Section 3 content
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0" id="section4Header">
                    <div class="collapse-label my-3">
                      <a data-toggle="collapse" data-parent="#filterAccordion" href="#section4Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                        <span>Maskapai</span>
                        <i class="fa fa-chevron-down"></i>
                      </a>
                    </div>
                  </div>
                  <div id="section4Content" class="collapse in">
                    <div class="card-body">
                      Section 4 content
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0" id="section5Header">
                    <div class="collapse-label my-3">
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
                <div class="card">
                  <div class="card-header p-0" id="section6Header">
                    <div class="collapse-label my-3">
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
                <div class="card">
                  <div class="card-header p-0" id="section7Header">
                    <div class="collapse-label my-3">
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
              </div>
            </div>
          </div>
        </div>

        <!-- List Penerbangan -->
        <div class="col-lg-8 px-lg-0 px-md-0">
          <div class="wrapper-result">
            <div class="wrapper-flight-list bg-white border">
              <div class="row">
                <div class="col-lg-6 left pr-0">
                  <div class="row row-cols-1">
                    <span class="maskapai-penerbangan col">Lion Air</span>
                  </div>
                  <div class="d-flex">
                    <div class="logo-airline d-flex justify-content-center align-items-center p-3">
                      <img src="{{ url('img/logo_partners/Lion.png') }}" alt="Logo Maskapai" class="img-fluid">
                    </div>
                    <div class="departure-time">
                      <div class="text-time">21:50</div>
                      <div class="text-code">DPS</div>
                    </div>
                    <div class="flight-icon d-flex align-items-center">
                      <img src="{{ url('img/icons/ic_pesawat_tampak_atas_abu.png') }}" width="16px" height="16px" alt="ICON-pesawat">
                    </div>
                    <!-- <div class="flight-duration text-center">
                      <div class="text-total-time">12j 0m</div>
                      <div class="timeline">
                        <hr class="hr-line">
                      </div>
                      <div class="text-total-time">1 Transit</div>
                    </div> -->
                    <div class="arrival-time">
                      <div class="text-time">21:50</div>
                      <div class="text-code">DPS</div>
                    </div>
                    <div class="flight-duration">
                      <div class="text-total-time">4j 20m</div>
                      <div class="flight-type">1 Transit</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 right">
                  <div class="row">
                    <div class="col-lg-6 px-0">
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
                    <div class="col-lg-6 pl-0">
                      <div class="text-price text-right">
                        IDR 500.000
                        <label class="text-pax">/org</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto mt-4 btn-details">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a href="#" class="nav-link active">Detail Penerbangan</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Detail Harga</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection