@extends('web.frontend.layouts.transaction')

@section('title', 'Metode Pembayaran')

@section('content')
  <div class="container order-payment" style="max-width:1000px;">
    @if($order->status != 'CANCEL')
      <h3>Metode Pembayaran</h3>
      <div class="row">
        <div class="col-md-7 col-payment-method bg-white border order-2 order-md-1">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, incidunt.
        </div>
        <div class="col-md-4 col-order-detail ml-auto bg-white p-0 order-1 order-md-2">
          <div class="accordion" id="orderDetail">
            <div class="card">
              <div class="card-header bg-white">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left text-dark text-decoration-none p-0" type="button" data-toggle="collapse" data-target="#flightDetail">
                    <div class="row no-gutters">
                      <div class="col-2">
                        <i class="fa fa-plane mt-2"></i>
                      </div>
                      <div class="col-10 title-extra">
                        <div class="d-flex align-items-center">  
                          <span class="from-city">
                            {{Str::limit($order->flightOrderDetails()->first()->flight->fromAirport->city->name,8)}}
                          </span>
                          <span class="flight-type">
                            @if(session('trip') == 'roundtrip')
                            <i class="fa fa-exchange-alt mx-2"></i>
                            @else
                            <i class="fa fa-long-arrow-alt-right mx-2"></i>
                            @endif
                          </span>
                          <span class="to-city">
                            {{Str::limit($order->flightOrderDetails()->first()->flight->toAirport->city->name,12)}}
                          </span>
                          <i class="fa fa-chevron-down ml-auto"></i>
                        </div>
                        <div class="order-id font-weight-bold">
                          Order ID: {{$order->id}}
                        </div>
                      </div>
                    </div>
                  </button>
                </h2>
              </div>

              <div id="flightDetail" class="collapse flight-detail" data-parent="#orderDetail"> 
                <div class="card-body">
                  <ul class="nav nav-tabs order-detail-tab">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#departure">Pergi</a>
                    </li>
                    @if(session('trip') == 'roundtrip')
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#return">Pulang</a>
                      </li>
                    @endif
                  </ul>
                  <div class="tab-content order-detail-flight">
                    <div class="tab-pane fade show active" id="departure">
                      <div class="card tripline">
                        <div class="card-header d-flex align-items-center bg-light border-0">
                          <span class="from-airport">
                            {{$departureflight->fromAirport->iata_code}}
                          </span>
                          <span><i class="fa fa-arrow-right mx-2"></i></span>
                          <span class="to-airport">
                            {{$departureflight->toAirport->iata_code}}
                          </span>
                          <i class="fa fa-clock-o ml-auto mr-2" aria-hidden="true"></i>
                          {{$departureflight->getFlightDuration()->format("%hj %im")}}
                        </div>
                        <div class="card-body bg-light">
                          <ul>
                            <li>
                              <strong>@time($departureflight->departure_time)</strong>
                              <span>{{date('M d', strtotime($departureflight->departure_time))}}</span>
                            </li>
                            <li>
                              {{$departureflight->fromAirport->name}} 
                              ({{$departureflight->fromAirport->iata_code}})
                              <span>Terminal 1</span>
                            </li>
                            <li>
                              <span>
                                {{$departureflight->getFlightDuration()->format("%hj %im")}} 
                              </span>
                            </li>
                            <li>
                              <p class="provider d-flex align-items-center">
                                <img src="{{asset('img/logo_partners') . '/' . $order->flightOrderDetails()->first()->flight->plane->airline->logo}}" class="img-fluid">
                                <span class="">
                                  {{$departureflight->id}} •
                                  {{ucfirst($departureflight->class)}}
                                </span>
                              </p>
                            </li>
                            <li>
                              <strong>@time($departureflight->arrival_time)</strong>
                              <span>{{date('M d', strtotime($departureflight->arrival_time))}}</span>
                            </li>
                            <li>
                              {{$departureflight->toAirport->name}} 
                              ({{$departureflight->toAirport->iata_code}})
                              <span>Terminal 2</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="card passengger mt-4">
                        <div class="card-header bg-white"><strong>Penumpang</strong></div>
                        <div class="card-body p-0 m-0 accordion passengger-detail" id="passenggerDetail">
                          @foreach($departurepassenggers as $item)
                            <div class="card">
                              <div class="card-header bg-white p-1">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#passengger-{{$loop->iteration}}">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <span>{{$loop->iteration.'. '. ucfirst($item->title) .' '.$item->full_name}}</span>
                                      <i class="fa fa-chevron-down ml-auto"></i>
                                    </div>
                                  </button>
                                </h2>
                              </div>

                              <div id="passengger-{{$loop->iteration}}" class="collapse" data-parent="#passenggerDetail">
                                <div class="card-body">
                                  <div>
                                    <strong>
                                      {{$departureflight->fromAirport->iata_code}}
                                      <span><i class="fa fa-arrow-right mx-1"></i></span>
                                      {{$departureflight->toAirport->iata_code}}
                                    </strong>
                                  </div>
                                  @foreach($departureflight->details as $detail)
                                    <span class="mx-1">
                                      <i class="{{$detail->facility->icon}}"></i>
                                      <span class="mx-2">
                                        @if($detail->facility->name == 'Bagasi')
                                          {{$detail->facility->name . ' ' . $detail->weight . ' Kg'}}
                                        @else
                                          {{$detail->amount . ' ' .$detail->facility->name}}
                                        @endif
                                      </span>
                                    </span>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    @if(session('trip') == 'roundtrip')
                      <div class="tab-pane fade" id="return">
                        <div class="card tripline">
                          <div class="card-header d-flex align-items-center bg-light border-0">
                            <span class="from-airport">
                              {{$returnflight->fromAirport->iata_code}}
                            </span>
                            <span><i class="fa fa-arrow-right mx-2"></i></span>
                            <span class="to-airport">
                              {{$returnflight->toAirport->iata_code}}
                            </span>
                            <i class="fa fa-clock-o ml-auto mr-2" aria-hidden="true"></i>
                            {{$returnflight->getFlightDuration()->format("%hj %im")}}
                          </div>
                          <div class="card-body bg-light">
                            <ul>
                              <li>
                                <strong>@time($returnflight->departure_time)</strong>
                                <span>
                                  {{date('M d', strtotime($returnflight->departure_time))}}
                                </span>
                              </li>
                              <li>
                                {{$returnflight->fromAirport->name}} 
                                ({{$returnflight->fromAirport->iata_code}})
                                <span>Terminal 1</span>
                              </li>
                              <li>
                              <span>
                                {{$returnflight->getFlightDuration()->format("%hj %im")}} 
                              </span>
                              </li>
                              <li>
                                <p class="provider d-flex align-items-center">
                                  <img src="/../img/logo_partners/{{$order->flightOrderDetails()->first()->flight->plane->airline->logo}}" class="img-fluid">
                                  <span class="">
                                    {{$returnflight->id}} •
                                    {{ucfirst($returnflight->class)}}
                                  </span>
                                </p>
                              </li>
                              <li>
                                <strong>@time($returnflight->arrival_time)</strong>
                                <span>{{date('M d', strtotime($returnflight->arrival_time))}}</span>
                              </li>
                              <li>
                                {{$returnflight->toAirport->name}} 
                                ({{$returnflight->toAirport->iata_code}})
                                <span>Terminal 2</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="card passengger mt-4">
                          <div class="card-header bg-white"><strong>Penumpang</strong></div>
                          <div class="card-body p-0 m-0 accordion passengger-detail" id="passenggerDetail">
                            @foreach($returnpassenggers as $item)
                              <div class="card">
                                <div class="card-header bg-white p-1">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#passengger-{{$loop->iteration}}">
                                      <div class="d-flex justify-content-between align-items-center">
                                        <span>{{$loop->iteration.'. '. ucfirst($item->title) .' '.$item->full_name}}</span>
                                        <i class="fa fa-chevron-down ml-auto"></i>
                                      </div>
                                    </button>
                                  </h2>
                                </div>

                                <div id="passengger-{{$loop->iteration}}" class="collapse" data-parent="#passenggerDetail">
                                  <div class="card-body">
                                    <div>
                                      <strong>
                                        {{$returnflight->fromAirport->iata_code}}
                                        <span><i class="fa fa-arrow-right mx-1"></i></span>
                                        {{$returnflight->toAirport->iata_code}}
                                      </strong>
                                    </div>
                                    @foreach($returnflight->details as $detail)
                                      <span class="mx-1">
                                        <i class="{{$detail->facility->icon}}"></i>
                                        <span class="mx-2">
                                          @if($detail->facility->name == 'Bagasi')
                                            {{$detail->facility->name . ' ' . $detail->weight . ' Kg'}}
                                          @else
                                            {{$detail->amount . ' ' .$detail->facility->name}}
                                          @endif
                                        </span>
                                      </span>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header bg-white border-0">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed text-dark text-decoration-none p-0" type="button" data-toggle="collapse" data-target="#priceDetail">
                    <div class="d-flex justify-content-between align-items-center">
                      <span>Detail Harga</span>
                      <i class="fa fa-chevron-down ml-auto"></i>
                    </div>
                    <div class="total font-weight-bold">
                      Total Pembayaran
                    </div>
                  </button>
                </h2>
              </div>
              <div id="priceDetail" class="collapse" data-parent="#orderDetail">
                <div class="card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
    <div class="error-boundary-wrapper">
      <div class="error-boundary-box">
        <img src="{{asset('img/session_timeout_warning.png')}}" class="img-fluid" width="480px" alt="">
        <p class="error-boundary-text">
          <strong>Oh tidak! Waktumu habis</strong>
          Maaf kami tidak bisa menahan pesanan terlalu lama. Silakan ulangi pemesanan karena penerbangan ini bisa saja habis atau harganya berubah.
        </p>
        <div class="error-boundary-area-button">
          <form action="{{route('home')}}">
            <button type="submit" class="btn btn-cta">ULANGI PEMESANAN</button>
          </form>
        </div>
      </div>
    </div>
    @endif
  </div>
  <form action="{{route('payment.flight.update', $order->id)}}" method="POST" class="d-none" id="paymentUpdate">
    @method('PUT')
    @csrf
    <button type="submit">submit</button>
  </form>
@endsection

@push('scripts')
<script src="{{asset('plugin/moment-js/moment-js.js')}}"></script>
<script src="{{asset('plugin/jquery.countdown-2.2.0/jquery.countdown.min.js')}}"></script>
<script>
  $("#time-countdown")
    .countdown("{{$paymenttimeleft}}", function (
        event
    ) {
        $(this).html(
            `<span class="border border-white rounded p-1">${event.strftime(
                "%H"
            )}</span> : <span class="border border-white rounded p-1">${event.strftime(
                "%M"
            )}</span> : </span><span class="border border-white rounded p-1">${event.strftime(
                "%S"
            )}</span>`
        );
    })
    .on("finish.countdown", function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        Swal.fire({
          title: "Waktu Pembayaran Habis!",
          icon: "warning",
          buttons: "OK"
        }).then((result) => {
          if(result.isConfirmed){
            $("#paymentUpdate").trigger('submit');
          }
        });
    });
</script>
@endpush