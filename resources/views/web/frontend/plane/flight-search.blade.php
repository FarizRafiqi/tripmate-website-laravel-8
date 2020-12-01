@extends('web.frontend.layout')

@section('title', 'Harga Tiket Pesawat Murah - Cari & Pesan Tiket Hanya di TripMate')

@push('stylesheets')
  <link rel="stylesheet" href="{{ url('plugin/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ url('plugin/select2/dist/css/select2.css') }}">
  <link rel="stylesheet" href="{{ url('plugin/noUiSlider-master/distribute/nouislider.css') }}">
@endpush

@section('content')
  <div class="flight">
    {{-- Preview Flight --}}
    <div class="preview-flight bg-white">
      <div class="container-fluid bg-white">
        <div class="container px-0 position-relative">
          
          <div class="preview-flight-content">
            <div class="row preview-flight-departure">
              <div class="col-xl-10 col-lg-9 col-md-8 col-12">
                <div class="choose-flight row align-items-center pl-lg-0">
                  <div class="left-side col-auto mr-4 pr-0 d-lg-inline-block d-md-none d-none">
                    <img src="{{ url('img/icons/ic_flight_depart.png') }}" alt="" width="32px" height="32px">
                  </div>
                  <div class="right-side col-auto p-lg-0 pl-3">
                    <div class="text-choose d-lg-inline-block d-none">Pilih Penerbangan Pergi</div>
                    
                    <div class="list d-flex align-items-center">
                      <div class="text-airport mr-1 d-lg-inline-block d-md-none d-none">
                        {{Str::limit($originairport, 8)}}
                      </div>
                      <div class="text-airport-code">({{$request->origin}})</div>
                      @if($request->trip == 'roundtrip')
                        <i class="fa fa-exchange-alt mx-2"></i>
                      @else
                        <i class="fa fa-long-arrow-alt-right mx-2"></i>
                      @endif

                      <div class="text-airport mr-1 d-lg-inline-block d-md-none d-none">
                        {{Str::limit($destinationairport, 8)}}
                      </div>
                      <div class="text-airport-code">({{$request->destination}})</div>
      
                      <div class="dot-circle d-lg-inline-block d-md-inline-block mx-lg-3 mx-md-3 mx-3"></div>
                      
                      <div class="text-depart-date">@datetime($request->departure_date)</div>
      
                      <div class="dot-circle d-lg-inline-block d-md-inline-block mx-3"></div>
      
                      <div class="text-passengers d-flex">
                        <span class="jumlah-penumpang">{{$request->adult+$request->child+$request->infant}}</span>
                        <i class="fa fa-user d-lg-none d-md-none d-inline-block mt-lg-0 mt-md-0 mt-1 mr-1"></i>
                        <span class="d-lg-inline-block d-md-inline-block d-none ml-1">Penumpang</span>
                      </div>
      
                      <div class="dot-circle d-lg-inline-block d-md-inline-block mx-3"></div>
      
                      <div class="text-cabin-class">{{ucwords($request->class)}}</div>
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
            <div class="row preview-flight-return d-none">
              <div class="col-xl-3 col-lg-4 col-12 d-none d-lg-inline-block">
                <div class="choose-flight px-0">
                  <div class="text-choose">Penerbangan Pergi</div>
                  <div class="list d-flex align-items-center">
                    <div class="text-airport-code">{{$request["origin"]}}</div>
                    
                    <i class="fa fa-long-arrow-alt-right mx-2"></i>

                    <div class="text-airport-code">{{$request["destination"]}}</div>
  
                    <div class="dot-circle d-lg-inline-block d-md-inline-block mx-lg-3 mx-md-3 mx-3"></div>
                    
                    <div class="text-depart-date">{{date('D, d M y', strtotime($request["departure_date"]))}}</div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 col-lg-8 col-12 border-left mb-lg-0 mb-md-0 mb-3 p-3">
                <div class="row justify-content-lg-between justify-content-md-end justify-content-center align-items-center" style="height:100%;">
                  <div class="col-1 pr-0 d-lg-inline-block d-md-none d-none">
                    <img src="{{ url('img/icons/ic_flight_depart.png') }}" alt="" width="32px" height="32px">
                  </div>
                  <div class="col-lg-8 col-7">
                    <div class="text-choose">Pilih Penerbangan Pulang</div>
                    <div class="list d-flex align-items-center">
                      <div class="text-airport mr-1 d-lg-inline-block d-md-none d-none">
                        {{$destinationairport}}</div>
                      <div class="text-airport-code">({{$request->destination}})</div>
                      
                      <i class="fa fa-long-arrow-alt-right mx-2"></i>
      
                      <div class="text-airport mr-1 d-lg-inline-block d-md-none d-none">
                        {{$originairport}}
                      </div>
                      <div class="text-airport-code">({{$request->origin}})</div>
  
                      <div class="dot-circle d-lg-inline-block d-md-inline-block mx-lg-3 mx-md-3 mx-3"></div>
                      
                      <div class="text-depart-date">@datetime($request->arrival_date)</div>
      
                      <div class="dot-circle d-lg-inline-block d-md-inline-block mx-3"></div>
      
                      <div class="text-cabin-class">{{str_replace('_', ' ', ucwords($request->class))}}</div>
                    </div>
                  </div>
                  <div class="content col-lg-3 col-5">
                    <!-- <div class="border-left-ticket" id="border-left-ticket"></div> -->
                    <div class="d-flex">
                      <button class="btn btn-light btn-ubah-pencarian ml-auto" data-toggle="modal" data-target="#changeSearchModal">
                        Ubah Pencarian
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Change Flight Form -->
          <!-- Modal -->
          <div class="modal fade" id="changeSearchModal">
            <div class="modal-dialog modal-xl m-lg-0">
              <div class="modal-content">
                <div class="modal-body p-lg-0 p-4 m-0">
                  <div class="wrapper-change-search container-fluid p-0">
                    <div class="wrapper-form container px-lg-0">
                      <form action="{{route('flight_search')}}">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-12 px-0 px-lg-3 px-xl-0">
                            <div class="row no-gutters">
                              <div class="col-xl-auto col-lg-2 col-12 px-lg-0">
                                <div class="form-group box-flightform-airport mb-lg-0 mb-3" id="containerBandaraAsal">
                                  <span><i class="fa fa-plane-departure"></i></span>
                                  <label for="inputBandaraAsal">Dari</label><br>
                                  <select name="origin" id="selectBoxBandara1" class="form-control @error('origin') is-invalid @enderror text-truncate">
                                    @foreach($cities as $city)
                                      <optgroup label="{{$city->name}}">
                                        @foreach($city->airports as $airport)
                                          <option value="{{$airport->iata_code}}" {{ old('origin') == $airport->iata_code ? 'selected' : '' }} {{ ($airport->iata_code == $request->origin) ? 'selected' : '' }}>{{$airport->name}}</option>
                                        @endforeach
                                      </optgroup>
                                    @endforeach
                                  </select>
                                  @error('origin')
                                    <div class="invalid-feedback">{{$message}}</div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-xl-auto col-lg-2 col-12 px-lg-0">
                                <div class="form-group box-flightform-airport mb-lg-0 mb-3" id="containerBandaraTujuan">
                                  <span><i class="fa fa-plane-arrival"></i></span>
                                  <label for="inputBandaraTujuan">Ke</label>
                                  <select name="destination" id="selectBoxBandara2" class="form-control @error('destination') is-invalid @enderror text-truncate">
                                    @foreach($cities as $city)
                                      <optgroup label="{{$city->name}}">
                                        @foreach($city->airports as $airport)
                                          <option value="{{$airport->iata_code}}" {{ old('destination') == $airport->iata_code ? 'selected' : '' }} {{ ($airport->iata_code == $request->destination) ? 'selected' : '' }}>{{$airport->name}}</option>
                                        @endforeach
                                      </optgroup>
                                    @endforeach
                                  </select>
                                  @error('destination')
                                    <div class="invalid-feedback">{{$message}}</div>
                                  @enderror
                                  @if(session('error_message'))
                                    <small class="text-danger">
                                      {{ session('error_message') }}
                                    </small>
                                  @endif
                                </div>
                              </div>
                              <div class="col-xl-auto col-lg-auto col-12 px-lg-0">
                                <div class="form-group box-flightform-passenger mb-lg-0 mb-3">
                                  <span class="fa-stack position-absolute">
                                    <i class="far fa-calendar-alt fa-stack-1x"></i>
                                    <i class="fa fa-arrow-right fa-stack-2x"></i>
                                  </span>
                                  <label for="inputTanggalBerangkat">Berangkat</label>
                                  <input type="text" name="departure_date" id="inputTanggalBerangkat" class="form-control @error('departure_date') is-invalid @enderror" autocomplete="off" value="{{date('D, d M Y', strtotime($request["departure_date"]))}}">
                                </div>
                                @error('departure_date')
                                  <div class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                              <div class="col-xl-auto col-lg-auto col-12 px-lg-0">
                                <div class="form-group box-flightform-passenger mb-lg-0 mb-3">
                                  <span class="fa-stack position-absolute returndate-icon">
                                    <i class="far fa-calendar-alt fa-stack-1x"></i>
                                    <i class="fa fa-arrow-left fa-stack-2x"></i>
                                  </span>

                                  <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" name="trip" value="roundtrip" id="checkboxTanggalPulang" @isset($request->arrival_date) checked @endisset>
                                    <label class="custom-control-label" for="checkboxTanggalPulang">Pulang</label>
                                  </div>

                                  <input type="text" name="arrival_date" id="inputTanggalPulang" class="form-control @error('arrival_date') is-invalid @enderror" autocomplete="off" value="{{isset($request->arrival_date) ? date('D, d M Y', strtotime($request->arrival_date)) : date('D, d M Y', strtotime('tomorrow'))}}" {{ isset($request->arrival_date) ? '' : 'disabled'}} >
                                </div>

                                @error('arrival_date')
                                  <div class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                @enderror
                              </div>
                              <div class="col-xl-auto col-lg-auto col-12 px-lg-0">
                                <div class="form-group box-flightform-passenger">
                                  <i class="fa fa-user-alt"></i>
                                  <label for="inputPassenger">Penumpang & Kelas Kabin</label>
                                  <input type="text" id="inputPassengerCabin" class="form-control @error('penumpang_dan_kelas') is-invalid @enderror" autocomplete="off" value="{{$request->adult+$request->child+$request->infant.' Penumpang, '. ucwords($request->class)}}" readonly>
                                  <i class="fa fa-chevron-down"></i>
                                  @error('adult')
                                  <div class="invalid-feedback">{{$message}}</div>
                                  @enderror
                                  @error('child')
                                    <div class="invalid-feedback">{{$message}}</div>
                                  @enderror
                                  @error('infant')
                                    <div class="invalid-feedback">{{$message}}</div>
                                  @enderror
                                </div>
                                <div class="dropdown dropdown-passenger-cabin">
                                  <div class="dropdown-menu">
                                    <div class="close" data-dismiss="dropdown-passenger-cabin">
                                      <span>&times;</span>
                                    </div>
                                    <div class="passenger-cabin-title d-flex">
                                      <div class="passenger-cabin-container" style="width: 254px;">Penumpang</div>
                                      <div class="passenger-cabin-container" style="width: 224px;">Kelas Kabin</div>
                                    </div>
                                    <div class="passenger-cabin-content-container d-flex">
                                      <div class="passenger-cabin-content-list" style="width: 254px;">
                                        <div class="passenger-cabin-item-list row align-items-center">
                                          <div class="col-4 pr-0">
                                            <label for="adultPassenger" class="m-0">Dewasa</label><br>
                                            <small class="m-0">Usia 12+</small>
                                          </div>
                                          <div class="col-8">
                                            <input type="number" name="adult" min="1" max="7" id="adultPassenger" value="{{$request->adult}}">
                                          </div>
                                        </div>
                                        <div class="passenger-cabin-item-list row align-items-center">
                                          <div class="col-4 pr-0">
                                            <label for="childPassenger" class="m-0">Anak</label><br>
                                            <small class="m-0">Usia 2-11</small>
                                          </div>
                                          <div class="col-8">
                                            <input type="number" name="child" min="0" max="7" id="childPassenger" value="{{$request->child}}">
                                          </div>
                                        </div>
                                        <div class="passenger-cabin-item-list row align-items-center">
                                          <div class="col-4 pr-0">
                                            <label for="infantPassenger" class="m-0">Bayi</label><br>
                                            <small class="m-0">Di bawah 2</small>
                                          </div>
                                          <div class="col-8">
                                            <input type="number" name="infant" min="0" max="4" id="infantPassenger" value="{{$request->infant}}">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="passenger-cabin-content-list" style="width: 224px;">
                                        <input type="hidden" name="class" value="{{$request->class}}">
                                        <div class="passenger-cabin-item-list d-flex align-items-center justify-content-between cabin-class @if(strtolower($request->class) == 'ekonomi') {{'selected'}} @endif">
                                          Ekonomi
                                        </div>
                                        <div class="passenger-cabin-item-list d-flex align-items-center justify-content-between cabin-class @if(strtolower($request->class) == 'premium ekonomi') {{'selected'}} @endif">
                                          Premium Ekonomi
                                        </div>
                                        <div class="passenger-cabin-item-list d-flex align-items-center justify-content-between cabin-class @if(strtolower($request->class) == 'bisnis') {{'selected'}} @endif">
                                          Bisnis
                                        </div>
                                        <div class="passenger-cabin-item-list d-flex align-items-center justify-content-between cabin-class @if(strtolower($request->class) == 'first') {{'selected'}} @endif">
                                          First
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Button Cari Penerbangan -->
                          <div class="col-12 d-flex justify-content-md-end justify-content-center align-items-center my-lg-3 mt-4 mb-0 pr-0 pr-lg-3">
                            <button type="submit" class="btn btn-orange btn-change-search">CARI</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="_separator w-100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Change Flight Form -->

        </div>
      </div>
    </div>
    {{-- End of Preview Flight --}}
    <div class="progress d-none">
      <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    {{-- Search Result --}}
    <div class="wrapper-search-result position-relative" id="wrapperPencarianPenerbangan">
      <div class="container">
        <div class="row">
           <!-- Filter -->
          <div class="col-lg-4 col-md-4 d-lg-inline-block d-md-inline-block d-none px-xl-0 pr-0 mb-5 col-filter">
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
                    <!-- Transit Filter -->
                    <div class="card filter-category">
                      <div class="card-header p-0" id="section1Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section1Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Transit</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section1Content" class="collapse in">
                        <div class="card-body pr-lg-0 pr-3">
                          <!-- Horizontal Form -->
                          <div class="form-group row align-items-center">
                            <label for="direct" class="col-sm-10 col-form-label">
                              Langsung
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="direct">
                            </div>
                            <label for="stop" class="col-sm-10 col-form-label">
                              1 Transit
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="stop">
                            </div>
                            <label for="stops" class="col-sm-10 col-form-label">
                              2+ Transit
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="stops">
                            </div>
                          </div>
                          <!-- End of Horizontal Form -->
                        </div>
                      </div>
                    </div>
                    <!-- End of Transit Filter -->

                    <hr class="mb-2 mt-3 mx-2">
                    
                    <!-- Transit Duration Filter -->
                    <div class="card filter-category">
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
                          <label for="customRange2" class="text-duration">
                            Durasi per transit:
                            <span class="text-hour"></span>
                          </label>
                          <div id="slider1"></div>
                          <div class="text-min-max d-flex align-items-center justify-content-between mt-2">
                            <span>0j</span>
                            <span>13j</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Transit Duration Filter -->

                    <hr class="mb-2 mt-3 mx-2">

                    <!-- FLight Time Filter -->
                    <div class="card filter-category">
                      <div class="card-header p-0" id="section3Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section3Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Waktu</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section3Content" class="collapse in">
                        <div class="card-body pr-lg-0 pr-3">
                          <!-- Horizontal Form -->
                          <div class="title">Berangkat</div>
                          <div class="form-group row align-items-center">
                            <label for="departure_dawn" class="col-sm-10 col-form-label">
                              00:00 - 06:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_dawn">
                            </div>
                            <label for="departure_morning" class="col-sm-10 col-form-label">
                              00:00 - 06:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_morning">
                            </div>
                            <label for="departure_afternoon" class="col-sm-10 col-form-label">
                              12:00 - 18:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_afternoon">
                            </div>
                            <label for="departure_evening" class="col-sm-10 col-form-label">
                              18:00 - 24:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="departure_evening">
                            </div>
                          </div>

                          <div class="title">Tiba</div>
                          <div class="form-group row align-items-center">
                            <label for="arrival_dawn" class="col-sm-10 col-form-label">
                              00:00 - 06:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="arrival_dawn">
                            </div>
                            <label for="arrival_morning" class="col-sm-10 col-form-label">
                              00:00 - 06:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="arrival_morning">
                            </div>
                            <label for="arrival_afternoon" class="col-sm-10 col-form-label">
                              12:00 - 18:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="arrival_afternoon">
                            </div>
                            <label for="arrival_evening" class="col-sm-10 col-form-label">
                              18:00 - 24:00
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="arrival_evening">
                            </div>
                          </div>
                          <!-- End of Horizontal Form -->
                        </div>
                      </div>
                    </div>
                    <!-- End of FLight Time Filter -->

                    <hr class="mb-2 mt-3 mx-2">

                    <!-- Airlines Filter -->
                    <div class="card filter-category">
                      <div class="card-header p-0" id="section4Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section4Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Maskapai</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section4Content" class="collapse in">
                        <div class="card-body pr-lg-0 pr-3">
                          <div class="form-group row align-items-center">
                            <label for="QGcheckbox" class="col-sm-10 col-form-label">
                              <div class="row align-items-center">
                                <div class="col-3 text-center pr-0">
                                  <div class="logo-airline-wrapped border">
                                    <img src="{{ url('img/logo_partners/Citilink.png') }}" class="img-fluid" alt="">
                                  </div>
                                </div>
                                <div class="col-9 new-label">
                                  <div class="label-1">Citilink Indonesia</div>
                                  <div class="label-2">dari IDR 676.000</div>
                                </div>
                              </div>
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control" id="QGcheckbox">
                            </div>
                            <label for="GAcheckbox" class="col-sm-10 col-form-label">
                              <div class="row align-items-center">
                                <div class="col-3 text-center pr-0">
                                  <div class="logo-airline-wrapped border">
                                    <img src="{{ url('img/logo_partners/Garuda.png') }}" class="img-fluid" alt="">
                                  </div>
                                </div>
                                <div class="new-label col-9">
                                  <div class="label-1">Garuda Indonesia</div>
                                  <div class="label-2">dari IDR 1.278.000</div>
                                </div>
                              </div>
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control" id="GAcheckbox">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Airlines Filter -->

                    <hr class="mb-2 mt-3 mx-2">

                    <!-- Facilities Filter -->
                    <div class="card filter-category">
                      <div class="card-header p-0" id="section5Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section5Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Fasilitas</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section5Content" class="collapse in">
                        <div class="card-body pr-lg-0 pr-3">
                          <!-- Horizontal Form -->
                          <div class="form-group row align-items-center">
                            <label for="baggageMultilabel" class="col-sm-10 col-form-label new-label">
                              <div class="label-1">Bagasi</div>
                              <div class="label-2">2 Penerbangan</div>
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="baggageMultilabel">
                            </div>
                            <label for="mealMultilabel" class="col-sm-10 col-form-label new-label">
                              <div class="label-1">Makanan</div>
                              <div class="label-2">1 Penerbangan</div>
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="mealMultilabel">
                            </div>
                          </div>
                          <!-- Horizontal Form -->
                        </div>
                      </div>
                    </div>
                    <!-- End of Facilities Filter -->

                    <hr class="mb-2 mt-3 mx-2">

                    <!-- Transit Airport Filter -->
                    <div class="card filter-category">
                      <div class="card-header p-0" id="section6Header">
                        <div class="collapse-label">
                          <a data-toggle="collapse" data-parent="#filterAccordion" href="#section6Content" class="  text-decoration-none d-flex justify-content-between align-items-center">
                            <span>Bandara Transit</span>
                            <i class="fa fa-chevron-down"></i>
                          </a>
                        </div>
                      </div>
                      <div id="section6Content" class="collapse in">
                        <div class="card-body pr-lg-0 pr-3">
                          <div class="form-group row align-items-center">
                            <label for="DPSC" class="col-sm-10 col-form-label">
                              Denpasar-Bali
                            </label>
                            <div class="col-sm-2">
                              <input type="checkbox" class="form-control m-auto" id="DPSC">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Transit Airport Filter -->

                    <hr class="mb-2 mt-3 mx-2">

                    <!-- Flight Duration Filter -->
                    <div class="card mb-2 filter-category">
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
                          <label for="rangeTripDuration" class="text-duration">Total: 
                            <span class="text-hour"></span>
                          </label>
                          <div id="slider2"></div>
                          <div class="text-min-max d-flex align-items-center justify-content-between mt-2">
                            <span>0j</span>
                            <span>13j</span>
                          </div>
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
          <div class="col-lg-8 col-md-8 pr-xl-0 mb-5 col-result">
            <div class="wrapper-result">
              @if(count($flights) >= 1)
                <div class="mb-4">Menampilkan {{count($flights)}} penerbangan terbaik</div>
                <!-- Flight Ticket List -->
                @foreach($flights as $flight)
                  <div class="wrapper-flight-list bg-white mb-2" id="flight-{{$loop->iteration}}">
                    <div class="row position-relative">
                      <!-- Nama Maskapai -->
                      <div class="col-md-12 col-9 px-lg-3 pt-lg-0 pb-3 col-airline">
                          <span class="maskapai-penerbangan">{{$flight->plane->airline->name}}</span>
                      </div>

                      <!-- Left Side of Card -->
                      <div class="col-lg-7 col-md-12 col-sm-8 col-12 left">
                        <div class="row align-items-lg-center align-items-md-center">

                          <!-- Airline Logo -->
                          <div class="col-xl-3 col-lg-3 col-md-2 col-12 my-2 pr-0">
                            <div class="logo-airline text-xl-center text-lg-center">
                              <img src="{{ asset('img/logo_partners/'.$flight->plane->airline->logo)}}" alt="AIRLINE_ICON">
                            </div>
                          </div>
                          <!-- End of Airline Logo -->

                          <!-- Flight Timeline -->
                          <div class="col-xl-5 col-lg-5 col-md-7 col-8 pl-lg-0 mt-lg-0 mt-md-2 flight-timeline">
                            <div class="row align-items-center">
                              <div class="departure-time col-lg-auto col-md-auto col-auto">
                                <div class="text-time">@time($flight->departure_time)</div>
                                <div class="text-code">{{$flight->fromAirport->iata_code}}</div>
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
                                @if($flight->isRedEyeFlight())
                                  <div class="badge badge-warning text-plus-day">{{$flight->getFlightDuration()->format("+%d h")}}</div>
                                @endif
                                <div class="text-time mr-lg-0">@time($flight->arrival_time)</div>
                                <div class="text-code">{{$flight->toAirport->iata_code}}</div>
                              </div>
                            </div>
                          </div>
                          <!-- End Flight Timeline -->

                          <div class="col-xl-4 col-lg-3 col-md-3 col-4 mt-lg-0 mt-md-2 pr-0">
                            <div class="flight-duration">
                              <div class="text-total-time">
                                {{$flight->getFlightDuration()->h.'j '.$flight->getFlightDuration()->minutes.'m'}}</div>
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
                              @foreach($flight->details as $detail)
                                <span class="facilities-icon px-1" data-toggle="tooltip" data-placement="bottom"
                                  data-html="true" title="<div>{{$detail->facility->name}}</div>">
                                  <i class="{{$detail->facility->icon}}"></i>
                                </span>
                              @endforeach
                            </div>
                          </div>
                          <!-- End of Facilities List -->
                          <div class="col-lg-8 col-md-12 col-12 pt-lg-0 pt-md-2 pt-4 pl-0">
                            <div class="text-price text-right">
                              @rupiah($flight->fares()->getFare())
                              <label class="text-pax">/org</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Right Side -->

                      <!-- Detail Buttons -->
                      <div class="col-lg-9 col-md-8 col-8 mt-3">
                        <form action="" method="post">
                          <p class="btn-details position-absolute" style="left: 10px;">
                            <a href="#flight-detail-{{$loop->iteration}}" class="text-decoration-none" id="flight-detail-btn-{{$loop->iteration}}" data-toggle="collapse">Detail Penerbangan</a>
                            <a href="#price-detail-{{$loop->iteration}}" class="text-decoration-none ml-4" id="price-detail-btn-{{$loop->iteration}}" data-toggle="collapse">Detail Harga</a>
                          </p>
                        </form>
                      </div>
                      <!-- End of Detail Buttons -->
                      
                      <div class="col-lg-3 col-md-4 col-4 btn btn-book-now text-right">
                          <form action="{{ route('cart.flight.store', $flight->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="flightid" value="{{$flight->id}}">
                            @foreach($request->all() as $key=>$value)
                              <input type="hidden" name="{{$key}}" value="{{$value}}">
                            @endforeach
                            @foreach($fares[$loop->index] as $key=>$value)
                                <input type="hidden" name="{{$key}}" value="{{$value}}">
                            @endforeach
                            <button class="btn bg-gradation-blue text-white" type="submit">PILIH</button>
                          </form>
                      </div>
                    </div>
                    <!-- Flight Detail -->
                    <div class="wrapper-collapse collapse" id="flight-detail-{{$loop->iteration}}" data-parent="#flight-{{$loop->iteration}}">
                      <hr>
                      <div class="row pt-3">
                        <div class="col-auto">
                          <div class="text-time-fd">{{date('H:i', strtotime($flight->departure_time))}}</div>
                          <div class="text-date-fd">{{date('d M', strtotime($flight->departure_time))}} </div>
                        </div>
      
                        <div class="col-lg-8 col-md-6 col-sm-6 col-9 text-left">
                          <div class="text-airport text-truncate">{{$flight->fromAirport->name}}</div>
                          <div class="text-airport-terminal"></div>
                        </div>
      
                        <div class="col-lg-2 col-md-3 col-sm-3 col-12 text-right">
                          <i class="far fa-clock"></i>
                          <span class="text-total-time">
                            {{$flight->getFlightDuration()->h.'j '.$flight->getFlightDuration()->minutes.'m'}}
                          </span>
                        </div>
                      </div>
                      <div class="row pr-3">
                        <table>
                          <tbody>
                            <tr>
                              <th class="col-flight-detail-1 text-date-fd col pr-0">
                                {{$flight->getFlightDuration()->h.'j '.$flight->getFlightDuration()->minutes.'m'}}
                              </th>
                              <th class="th-detail position-relative">
                                <div class="col-flight-detail-2">
                                  <div class="box-flight-detail">
                                    <div class="detail-info-wrapper">
                                      <div class="details-info-header d-flex align-items-center">
                                        <div class="logo-airline d-flex justify-content-center align-items-center mr-2">
                                          <img src="{{ asset('img/logo_partners/'.$flight->plane->airline->logo)}}" alt="AIRLINE_ICON" class="img-fluid">
                                        </div>
      
                                        <div class="header-title">
                                          {{$flight->id}}
                                        </div>
      
                                        <div class="line"></div>
      
                                        <div class="header-title cabin-class">{{ucfirst($flight->kelas)}}</div>
                                      </div>
                                      <hr class="d-none">
                                      <div class="details-info-body">
                                        <div class="row row-cols-lg-3 row-cols-sm-2 align-items-center baggage-list">
                                          <div class="facilities-icon col pl-0 mb-3">
                                          @foreach($flight->details as $detail)
                                            <i class="{{$detail->facility->icon}}"></i>
                                            <span class="text-facilities ml-1 mr-2">
                                              {{$detail->facility->name}}
                                            </span>
                                          @endforeach
                                          </div>
                                        </div>
                                        <div class="row mt-5">
                                          <div class="col-12 mb-3">
                                            <div class="row">
                                              <div class="col-6">
                                                <div class="text-title">Model</div>
                                                <div class="text-value">{{$flight->plane->model}}</div>
                                              </div>
                                              <div class="col-6">
                                                <div class="text-title">Denah Kursi</div>
                                                <div class="text-value">2-2</div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-12">
                                            <div class="row">
                                              <div class="col-6">
                                                <div class="text-title">Kursi</div>
                                                <div class="text-value">{{ucwords($flight->kelas)}}</div>
                                              </div>
                                              <div class="col-6">
                                                <div class="seat seat-pitch">
                                                  <img src="" alt="">
                                                  <div></div>
                                                </div>
                                                <div class="seat seat-width">
                                                  <img src="" alt="">
                                                  <div></div>
                                                </div>
                                                <div class="seat seat-tilt">
                                                  <img src="" alt="">
                                                  <div></div>
                                                </div>
                                              </div>
                                            </div>
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
                          <div class="text-time-fd">{{date('H:i', strtotime($flight->arrival_time))}}</div>
                          <div class="text-date-fd">
                            {{date('d M', strtotime($flight->arrival_time))}} 
                          </div>
                        </div>
      
                        <div class="col-lg-8 col-md-6 col-6 text-left">
                          <div class="text-airport text-truncate">{{$flight->toAirport->name}}</div>
                          <div class="text-airport-terminal"></div>
                        </div>
                      </div>

                      <!-- Flight Transit -->
                      <!-- <div class="transit">
                        <div class="row">
                          <div class="text-transit col">
                            <label>0j 1m</label>
                            Transit di Lombok (LOP)
                          </div>
                        </div>
                      </div> -->
                      <!-- End of Flight Transit -->

                    </div>
                    <!-- End of Flight Detail -->

                    <!-- Price Detail -->
                    <div class="wrapper-collapse collapse" id="price-detail-{{$loop->iteration}}" data-parent="#flight-{{$loop->iteration}}">
                      <hr>
                      <div class="wrapper-detail price-details pt-3">
                        <div class="row">
                          <div class="col-12">
                            <div class="text-subtitle">Tarif</div>
                          </div>

                          @if(!empty($request->adult) && $request->adult > 0 && $request->adult <= 11)
                          <div class="col-12">
                            <div class="row">
                              <div class="col-6 col-passenger">
                                <ul class="pl-3"> 
                                  <li>Dewasa (x{{$request->adult}})</li>
                                </ul>
                              </div>
                              <div class="col-6 col-price text-right">
                                @rupiah($fares[$loop->index]['adultfare'])
                              </div>
                            </div>
                          </div>
                          @endif

                          @if(!empty($request->child))
                            <div class="col-12">
                              <div class="row">
                                <div class="col-6 col-passenger">
                                  <ul class="pl-3"> 
                                    <li>Anak (x{{$request->child}})</li>
                                  </ul>
                                </div>
                                <div class="col-6 col-price text-right">
                                  @rupiah($fares[$loop->index]['childfare'])
                                </div>
                              </div>
                            </div>
                          @endif

                          @if(!empty($request->infant))
                            <div class="col-12">
                              <div class="row">
                                <div class="col-6 col-passenger">
                                  <ul class="pl-3"> 
                                    <li>Bayi (x{{$request->infant}})</li>
                                  </ul>
                                </div>
                                <div class="col-6 col-price text-right">
                                  @rupiah($fares[$loop->index]['infantfare'])
                                </div>
                              </div>
                            </div>
                          @endif
                          <div class="col-12">
                            <div class="text-subtitle">Pajak dan biaya lainnya</div>
                          </div>
                          <div class="col-12">
                            <div class="row">
                              <div class="col-6 col-tax">
                                <ul class="pl-3"> 
                                  <li>PPN (10%)</li>
                                </ul>
                              </div>
                              <div class="col-6 text-free text-right">
                                @rupiah($fares[$loop->index]['tax'])
                              </div>
                              <div class="col-6 col-tax">
                                <ul class="pl-3"> 
                                  <li>Iuran Wajib (IW)</li>
                                </ul>
                              </div>
                              <div class="col-6 text-free text-right">
                                @rupiah($fares[$loop->index]['assurance'])
                              </div>
                              <div class="col-6 col-tax">
                                <ul class="pl-3"> 
                                  <li>Pajak Bandara</li>
                                </ul>
                              </div>
                              <div class="col-6 text-free text-right">
                                @rupiah($fares[$loop->index]['airporttax'])
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <hr class="mt-2 mb-3">
                            <div class="row">
                              <div class="col-6 text-total">Total</div>
                              <div class="col-6 col-price-total text-right">
                                @rupiah($fares[$loop->index]['totalfare'])
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Price Detail -->
                    
                  </div>
                @endforeach
                <!-- End of Flight Ticket List -->
              @else
                <!-- Empty States No Flight Available -->
                <div class="no-flight-available bg-white py-5 px-5">
                  <div>
                    <img src="{{ url('img/empty-state-no-flight-available-edit.png') }}" class="img-fluid" alt="illustration">
                  </div>
                  <div class="text-no-flight-available text-center">Penerbangan tidak tersedia</div>
                  <div class="text-no-flight-available-desc mt-3 text-center">Tip: Ubah pencarian dengan tanggal atau kelas kabin yang berbeda</div>
                  <div class="btn-change mt-4 text-center">
                    <button class="btn btn-orange" data-toggle="modal" data-target="#changeSearchModal">
                      Ubah Penerbangan
                    </button>
                  </div>

                </div>
                <!-- End of Empty States No Flight Available -->
              @endif

              @guest
                <div class="card bg-warning p-3 mt-3">
                  <div class="card-title">
                    <h5>Login & nikmati banyak benefit</h5>
                  </div>
                  <p>Pesan lebih cepat</p>
                  <a href="{{ url('/login') }}" class="btn btn-primary" style="width: 150px; border-radius: 24px;">Login</a>
                </div>
              @endguest
            </div>
          </div>
          <!-- End of Available Flight List -->
        </div>
      </div>
    </div>
    {{-- End of Search Result --}}
  </div>
@endsection

@push('scripts')
  <script src="{{ url('plugin/moment-js/moment-js.js') }}"></script>
  <script src="{{ url('plugin/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}"></script>
  <script src="{{ url('plugin/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ url('plugin/bootstrap-datepicker-master/dist/locales/bootstrap-datepicker.id.min.js') }}"></script>
  {{-- JS for Custom Range Input --}}
  <script src="{{ url('plugin/noUiSlider-master/distribute/nouislider.js') }}"></script>
  <script src="{{ url('plugin/wnumb-master/wNumb.min.js') }}"></script>
  <script src="{{ url('plugin/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ url('js/script-halaman-search.js') }}"></script>
  <script>
    $(".btn-book-now form").on("submit", function(e){
      //ambil trip dari input, cek apakah trip sama dengan roundtrip
      const trip = $(this).find("input[name='trip']").val();
      const id = $(this).find("input[name='flightid']").val();
      let urlstore = "{{route('cart.flight.store',':id')}}";
      urlstore = urlstore.replace(":id", id);
      $.ajaxSetup({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
      });
      if(trip == "roundtrip"){
        e.preventDefault();
        $(".preview-flight-return").removeClass('d-none');
        $(".preview-flight-departure").addClass('d-none');
        $.ajax({
          url: urlstore,
          method: "post",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data){
            
          }
        });

        let urlsearch = "{{route('flight_search')}}";
        let persen = 0;
        $(".progress").removeClass("d-none");
        let timer = setInterval(function () {
            persen = persen + 1;
            progressBarProcess(persen, timer);
        }, 100);
        $(".col-filter .filter").addClass("d-none");
        $(".col-filter").prepend($("<div class='placeholder-item bg-white'></div>").css('height', 409));
        $('.col-result .wrapper-result').children().remove();
        $('.col-result .wrapper-result').prepend($("<div class='bg-white mb-2 placeholder-item'></div>").css('height', 178));
        $.ajax({
          url: urlsearch,
          method: "get",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data){
            $(".progress").addClass("d-none");
            $(".col-filter .filter").removeClass("d-none");
            $(".placeholder-item").remove();
            $('.col-result').append($(data.html).find('.wrapper-result'));
          }
        });
      }

      function progressBarProcess(persen, timer) {
          $(".progress-bar").css("width", persen + "%");
          if (persen > 100) {
              clearInterval(timer);
              $(".progress").addClass("d-none");
              $(".progress-bar").css("width", "0%");
          }
      }
    });
  </script>
@endpush