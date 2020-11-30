@extends('web.frontend.layouts.transaction')

@section('title', 'Harga Tiket Pesawat Murah')

@section('content')
  <div class="container">

    <div class="row">
      <div class="col-lg-8 order-lg-1 order-2 col-form-pemesanan">
        <form action="{{route()}}" method="POST">
          @csrf
          <!-- Detail Pemesan -->
          <div class="card" id="detailPemesan">
            <div class="card-body p-4">
              <div class="form-row">
                <!-- Select Title -->
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-12">
                      <span><i class="far fa-address-book"></i></span>
                      <label for="inputTitle" class="mb-4 pl-3"><h4>Detail Pemesan</h4></label>
                    </div>
                    <div class="form-group col-lg-3 mb-4">
                      <select id="inputTitle" class="form-control" name="title_pemesan">
                        <option value="tuan">Tuan</option>
                        <option value="nyonya">Nyonya</option>
                        <option value="nona">Nona</option>
                      </select>
                    </div>

                    <div class="form-group col-lg-9 mb-4">
                      <input type="text" name="nama_pemesan" id="namaPemesan" class="form-control @error('nama_pemesan') is-invalid @enderror" autocomplete="off" value="{{Auth::user()->nama}}">
                      <small id="help1" class="text-muted">Isi sesuai KTP/Paspor/SIM (tanpa tanda baca dan gelar)</small>
                      @error('nama_pemesan')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="form-group col-lg-12 mb-4">
                      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" autocomplete="off" value="{{Auth::user()->email}}">
                      <small id="help2" class="text-muted">E-tiket akan dikirim ke alamat email ini</small>
                      @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="form-group col-lg-12 mb-0">
                      <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="Nomor Telepon" autocomplete="off" value="{{Auth::user()->no_telp}}">
                      <small id="help3" class="text-muted"></small>
                      @error('telepon')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- End of Select Title -->
              </div>
            </div>
          </div>
          <!-- Akhir dari Detail Pemesan -->

          <!-- Detail Penumpang -->
          <?php $loop=0; ?>

            <!-- Input untuk penumpang dewasa -->
            @if(!empty($passenger['adult']) && isset($passenger['adult']))
              @for($i=1;$i <= $passenger['adult'];$i++)
                <div class="card my-4" id="detailPenumpangDewasa{{$i}}">
                  <div class="card-body p-4">
                    <div class="form-row">
                      <div class="col-12 mb-4">
                        <span><i class="far fa-user"></i></span>
                        <label class="mb-4 pl-3"><h4>Detail Penumpang</h4></label>
                        <div class="switch-box bg-gray p-2 mx-0 row align-items-center rounded">
                          <div class="text-passenger col-12 col-md-6">Penumpang {{$i}}: Dewasa</div>

                          @if($i==1)
                            <label class="px-md-0 m-md-0 text-md-right col-sm-9 col-md-4" for="customSwitch">Sama dengan pemesan</label>
                            <div class="custom-control custom-switch col-sm-3 col-md-2 pl-md-0 text-right">
                              <input type="checkbox" class="custom-control-input" id="customSwitch">
                              <label class="custom-control-label" for="customSwitch"></label>
                            </div>
                          @endif
                        </div>
                      </div>
                      <div class="form-group col-lg-3 mb-4">
                        <select class="form-control" name="title_penumpang[]" id="titlePenumpang{{$i}}">
                          <option value="tuan">Tuan</option>
                          <option value="nyonya">Nyonya</option>
                          <option value="nona">Nona</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-12 mb-0">
                        <input type="text" name="nama_penumpang[]" class="form-control @error('nama_penumpang.'.$loop) is-invalid @enderror" autocomplete="off" id="inputPenumpang{{$i}}" placeholder="Nama Lengkap">
                        <small class="text-muted">Isi sesuai KTP/Paspor/SIM (tanpa tanda baca dan gelar)</small>
                      </div>

                      @error('nama_penumpang.'.$loop++)
                        <div class="text-danger ml-1">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              @endfor
            @endif

            <!-- Input untuk penumpang anak -->
            @if(!empty($passenger['child']) && isset($passenger['child']))
              @for($a=1; $a <= $passenger['child']; $a++)
                <div class="card my-4" id="detailPenumpangAnak">
                  <div class="card-body p-4">
                    <div class="form-row">
                      <div class="col-12 mb-4">
                        <span><i class="far fa-user"></i></span>
                        <label for="" class="mb-4 pl-3"><h4>Detail Penumpang</h4></label>
                        <div class="switch-box bg-gray p-2 mx-0 row align-items-center rounded">
                          <div class="text-passenger col-12 col-md-6">Penumpang {{$i++}}: Anak</div>
                        </div>
                      </div>
                      <div class="form-group col-lg-3 mb-4">
                        <select class="form-control" name="title_penumpang[]">
                          <option value="tuan">Tuan</option>
                          <option value="nyonya">Nyonya</option>
                          <option value="nona">Nona</option>
                        </select>
                      </div>

                      <div class="form-group col-lg-12 mb-2">
                        <input type="text" name="nama_penumpang[]" class="form-control @error('nama_penumpang.*') is-invalid @enderror" autocomplete="off" placeholder="Nama Lengkap">
                        <small class="text-muted">Isi sesuai KTP/Paspor/SIM (tanpa tanda baca dan gelar)</small>
                      </div>
                    
                      @error('nama_penumpang.'.$loop++)
                        <div class="text-danger ml-1 mb-3">{{$message}}</div>
                      @enderror
                      
                      <div class="form-group col-lg-12 mb-0">
                        <input type="date" name="tanggal_lahir[]" class="form-control @error('tanggal_lahir.*') is-invalid @enderror" autocomplete="off" placeholder="Tanggal Lahir">
                        <small class="text-muted">Penumpang Anak (2-11 tahun)</small>
                      </div>

                      @error('tanggal_lahir.')
                        <div class="text-danger ml-1 mb-3">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                </div>
              @endfor
            @endif
          
           <!-- Input untuk penumpang bayi -->
            @if(!empty($passenger['infant']) && isset($passenger['infant']))
              @for($b=0; $b < $passenger['infant']; $b++)
                <div class="card my-4" id="detailPenumpangBayi{{$a}}">
                  <div class="card-body p-4">
                    <div class="form-row">
                      <div class="col-12 mb-4">
                        <span><i class="far fa-user"></i></span>
                        <label for="" class="mb-4 pl-3"><h4>Detail Penumpang</h4></label>
                        <div class="switch-box bg-gray p-2 mx-0 row align-items-center rounded">
                          <div class="text-passenger col-12 col-md-6">Penumpang {{$i++}}: Bayi</div>
                        </div>
                      </div>
                      <div class="form-group col-lg-3 mb-4">
                        <select class="form-control" name="title_penumpang[]">
                          <option value="tuan">Tuan</option>
                          <option value="nyonya">Nyonya</option>
                          <option value="nona">Nona</option>
                        </select>
                      </div>
              
                      <div class="form-group col-lg-12">
                        <input type="text" name="nama_penumpang[]" class="form-control @error('nama_penumpang.*') is-invalid @enderror" autocomplete="off" placeholder="Nama Lengkap">
                        <small class="text-muted">Isi sesuai KTP/Paspor/SIM (tanpa tanda baca dan gelar)</small>
                      </div>

                      @error('nama_penumpang.'.$loop++)
                        <div class="text-danger ml-1 mb-3">{{$message}}</div>
                      @enderror

                      <div class="form-group col-lg-12 mb-0">
                        <input type="date" name="tanggal_lahir[]" class="form-control @error('tanggal_lahir.*') is-invalid @enderror" autocomplete="off" placeholder="Tanggal Lahir">
                        <small class="text-muted">Penumpang Anak (2-11 tahun)</small>
                      </div>
                    </div>
                  </div>
                </div>
              @endfor
            @endif
          <!-- Akhir dari Detail Penumpang -->

          <!-- Fasilitas Ekstra -->
          <div class="card my-4" id="fasilitasEkstra">
            <div class="card-body p-4">
              <div class="form-row">
                <div class="col-12 mb-4">
                  <span><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                  <label for="" class="mb-4 pl-3"><h4>Fasilitas Ekstra</h4></label>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-8 col-md-6">
                      <div class="form-group row align-items-center">
                        <label for="" class="col-2 col-form-label baggage-label">
                          <i class="fa fa-suitcase" style="font-size:22px;"></i>
                        </label>
                        <div class="col-10 pl-0">
                          <div class="">Bagasi</div>
                          <div class="">Tambah kapasitas barang bawaanmu</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 col-md-6 text-right">
                      <button class="btn btn-fasilitas-ekstra text-decoration-none" data-toggle="modal" data-target="#modalFasilitasEkstra" onclick="event.preventDefault()">PESAN</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir dari Fasilitas Ekstra -->

          <div class="d-flex justify-content-end">
            <button class="btn mb-4 btn-cta" data-toggle="modal" data-target="#modalOrderConfirmation" id="btnLanjutKePembayaran" type="submit">LANJUT KE PEMBAYARAN</button>
          </div>
        </form>
      </div>
      <div class="col-lg-4 order-lg-2 order-1 col-detail-penerbangan mb-lg-0 mb-4 pl-lg-0">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Penerbangan</h4>
            @foreach($flightorderdetails as $flightorderdetail)
              <div class="penerbangan-{{$loop->iteration}}">
                <div class="bandara-penerbangan d-flex align-items-center">
                  <span>{{$flightorderdetail->flight->fromAirport->city->nama}}</span>
                  <i class="fa fa-long-arrow-right mx-2"style="font-size:20px;"></i> 
                  <span>{{$flightorderdetail->flight->toAirport->city->nama}}</span>
                </div>
                <div class="d-flex mb-2 my-2">
                  <span class="text-penerbangan d-flex align-items-center">
                    <span classs="text-truncate">{{$flightorderdetail->flight->fromAirport->kode_iata}}</span>
                    <span class="mx-1">-</span>
                    <span classs="text-truncate">{{$flightorderdetail->flight->toAirport->kode_iata}}</span> 
                    <div class="dot-circle mx-2 my-0"></div>
                    {{date('D, d M y', strtotime($flightorderdetail->flight->waktu_berangkat))}}
                    <div class="dot-circle mx-2 my-0"></div>
                    {{date('H:i', strtotime($flightorderdetail->flight->waktu_berangkat))}}
                  </span>
                  <span class="ml-auto"><a href="#modalDetailPenerbangan" data-toggle="modal" class="text-decoration-none btn-detail-penerbangan" data-id="{{$flightorderdetail->flight->id}}">Detail</a></span>
                </div>
                <div class="kebijakan-penerbangan-{{$loop->iteration}}">
                  <h5>Kebijakan Tiket</h5>
                  <div><img src="{{url('img/icons/ic_refundable.png')}}" class="mr-2" width="25px" height="25px" alt="Bisa Refund">Bisa Refund</div>
                  <div><img src="{{url('img/icons/ic_rescheduleable.png')}}" class="mr-2" width="25px" height="25px" alt="Bisa Reschedule">Bisa Reschedule</div>
                </div>
              </div>
              <hr>
            @endforeach
            <div class="total-payments d-flex justify-content-between">
              <span>Total Pembayaran</span>

              <div class="detail-harga">
                  @if(count($fares) > 1)
                    <span class="text-primary total-price">IDR {{number_format($fares[0]['totalfare']+$fares[1]['totalfare'], 2, ",", ".")}}</span>
                  @else
                    <span class="text-primary total-price">IDR {{number_format($fares[0]['totalfare'], 2, ",", ".")}}</span>
                  @endif
                  <a href="#modalDetailHarga" data-toggle="modal" type="button"><i class="fa fa-chevron-down mx-0 text-primary" style="font-size:16px;"></i></a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
   
    <!-- Modal Fasilitas Ekstra -->
    <div class="modal modal-fasilitas-ekstra fade" id="modalFasilitasEkstra">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Bagasi</h5>
            <button type="button" class="close" data-toggle="modal" data-target="#modalCancelOrderBaggage">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-5">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-passenger1-list" data-toggle="list" href="#list-passenger1">{{Auth::user()->nama}}</a>
                    <a class="list-group-item list-group-item-action" id="list-passenger2-list" data-toggle="list" href="#list-passenger2">Mardanu Julnizar</a>
                  </div>
                </div>
                <div class="col-7">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-passenger1">
                      <div class="form-group">
                        <div class="text-flight-route"><i class="fa fa-long-arrow-right mx-2" aria-hidden="true"></i> </div>
                        <select name="selectBoxBagasi" id="selectBoxBagasi" class="form-control">
                          <option value="5kg">Bagasi 5Kg</option>
                        </select>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="list-passenger2">...</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-subtotal mr-4">Subtotal IDR <span></span></div>
            <button type="button" class="btn btn-cta" class="close" data-dismiss="modal">SIMPAN</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Fasilitas Ekstra -->

     <!-- Modal Detail Penerbangan -->
     <div class="modal modal-detail-penerbangan fade" id="modalDetailPenerbangan">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Detail Penerbangan</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="nav nav-tabs" id="tab">
              <li class="nav-item">
                <a class="nav-link active" id="tab-penerbangan" data-toggle="tab" href="#penerbangan">Penerbangan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="kebijakan-tab" data-toggle="tab" href="#kebijakan">Kebijakan</a>
              </li>
            </ul>
            <div class="tab-content" id="content">
              <div class="tab-pane pt-4 pl-1 fade show active" id="penerbangan">
                
              <div class="container-fluid">
                <div class="penerbangan"></div>
                <div class="row align-items-center">
                  <div class="logo-airline col-2">
                    <img src="" class="img-fluid">
                  </div>

                  <span class="nama-maskapai col-3 px-0"></span>

                  <div class="col-7">
                    <div class="d-flex">
                      <div class="departure-time">
                        <div class="text-time">
                          <div class="text-hour"></div>
                          <div class="text-date"></div>
                        </div>
                        <div class="text-code"></div>
                      </div>
  
                      <div class="flight-duration text-center mx-3">
                        <div class="text-total-time">
                        </div>
                        <div class="timeline">
                          <div class="fa-stack" style="height:18px;">
                            <hr class="hr-line mt-1 mb-2 fa-stack-2x position-absolute" style="width:70px; left:-15px; top:7px;">
                            <i class="fa fa-plane fa-stack-1x position-absolute" aria-hidden="true" style="top:-4px;color:#8a93a7;"></i>
                          </div>
                        </div>
                        <div class="text-total-time">Langsung</div>
                      </div>
  
                      <div class="arrival-time">
                        <div class="text-time">
                          <div class="text-hour"></div>
                          <div class="text-date"></div> 
                        </div>
                        <div class="text-code"></div>
                      </div>
                    </div>
                  </div>

                  <h5 class="my-3">Fasilitas</h5>
                  <div class="col-12 col-fasilitas-penerbangan">
                    <ul class="list-group list-group-horizontal-lg">
                    </ul>
                  </div>
                </div>
              </div>

              </div>
              <div class="tab-pane fade" id="kebijakan">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sit soluta nulla odio voluptates at cupiditate dignissimos placeat quaerat commodi porro nam rem quisquam, illum eligendi perferendis, ipsum nostrum aperiam sunt pariatur labore. Asperiores doloribus magni, assumenda, nulla iure culpa totam repellendus aliquam dicta labore eius illum. Atque hic reprehenderit vero officiis numquam necessitatibus commodi! Vero saepe omnis, libero assumenda nam odio distinctio ipsa sequi. Corrupti recusandae quas enim laborum labore adipisci, odit aperiam voluptatem, ratione deleniti sed maiores! Voluptates asperiores rem a optio consequuntur expedita nobis magnam labore quae quas iusto consectetur officia eum, neque praesentium error facilis autem.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Detail Penerbangan -->

    <!-- Modal Cancel Order Baggage -->
    <div class="modal" id="modalCancelOrderBaggage">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
          <h5 class="title">Batalkan Pembelian Bagasi?</h5>
          <p>Membeli bagasi tambahan di sini lebih murah daripada di bandara, yakin ingin batal?</p>
          <div class="modal-footer" style="border-top: none;">
            <button type="button" class="btn" id="btnCancelOrderBaggage">BATALKAN</button>
            <button type="button" class="btn btn-cta" data-dismiss="modal">LANJUTKAN MEMBELI</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Cancel Order Baggage -->

    <!-- Modal Konfirmasi Pesanan -->
    <div class="modal" id="modalOrderConfirmation">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content p-4">
          <h5 class="title">Lanjutkan Pembayaran?</h5>
          <p>Pastikan data yang kamu masukkan sudah benar</p>
          <div class="modal-footer" style="border-top: none;">
            <button type="button" class="btn" data-dismiss="modal" id="NO">TIDAK</button>
            <button type="button" class="btn" id="YES">YA</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Cancel Order Baggage -->

     <!-- Modal Detail Harga -->
     <div class="modal modal-detail-harga" id="modalDetailHarga">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-header p-0">
            <div class="title">Detail Harga</div>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body px-0 pb-0 pt-3">
            @foreach($flightorderdetails as $flightorderdetail)
              @if($loop->index > 0)
                <div class="badge badge-gray">Pulang</div>
              @else
                <div class="badge badge-gray">Pergi</div>
              @endif
              <div class="text-departure-flight my-3">
                {{$flightorderdetail->flight->fromAirport->city->nama}}
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                {{$flightorderdetail->flight->toAirport->city->nama}}
              </div>
              <div class="text-tarif">Tarif</div>
              <ul class="passenger-list pl-3">
               
                @if($passenger['adult'] > 0)
                  <li class="passenger-item">
                    <div class="d-flex">
                      <span>Dewasa (x{{$passenger['adult']}})</span> 
                      <span class="ml-auto">IDR {{number_format($fares[$loop->index]['adult'], 0, ",", ".")}}</span>
                    </div>
                  </li>
                @endif
                @if($passenger['child'] > 0)
                  <li class="passenger-item">
                    <div class="d-flex">
                      <span>Anak (x{{$passenger['child']}})</span> 
                      <span class="ml-auto">IDR {{number_format($fares[$loop->index]['child'], 0, ",", ".")}}</span>
                    </div>
                  </li>
                @endif
                @if($passenger['infant'] > 0)
                  <li class="passenger-item">
                    <div class="d-flex">
                      <span>Bayi (x{{$passenger['infant']}})</span> 
                      <span class="ml-auto">IDR {{number_format($fares[$loop->index]['infant'], 0, ",", ".")}}</span>
                    </div>
                  </li>
                @endif
              </ul>

              <div class="text-tarif">Biaya Lainnya</div>
              <ul class="tax-list pl-3">
                <li class="tax-item">
                  <div class="d-flex">
                    <span>PPN (10%)</span> 
                    <span class="ml-auto">IDR {{number_format($fares[$loop->index]['tax'], 0, ",", ".")}}</span>
                  </div>
                </li>
                <li class="tax-item">
                  <div class="d-flex">
                    <span>Iuran Wajib (IW)</span> 
                    <span class="ml-auto">IDR {{number_format($fares[$loop->index]['assurance'], 0, ",", ".")}}</span>
                  </div>
                </li>
                <li class="tax-item">
                  <div class="d-flex">
                    <span>Pajak Bandara</span> 
                    <span class="ml-auto">Termasuk</span>
                  </div>
                </li>
              </ul>
            @endforeach
          </div>
          <div class="modal-footer" style="border-top: none;">
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Detail Harga -->

    <!-- Modal Notifikasi Waktu Pemesanan -->
    <div class="modal modal-notifikasi" id="modalNotifikasi">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h5>Waktu Pemesanan Habis!</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Notifikasi Waktu Pemesanan -->
  </div>
@endsection

@push('scripts')
<script src="{{asset('plugin/moment-js/moment-js.js')}}"></script>
<script src="{{asset('plugin/jquery.countdown-2.2.0/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/script-halaman-checkout.js')}}"></script>
<script>
  $("#time-countdown")
    .countdown("{{$ordertimelimit}}", function (
        event
    ) {
        $(this).html(
            `<span class="border border-dark rounded p-1">${event.strftime(
                "%H"
            )}</span> : <span class="border border-dark rounded p-1">${event.strftime(
                "%M"
            )}</span> : </span><span class="border border-dark rounded p-1">${event.strftime(
                "%S"
            )}</span>`
        );
    })
    .on("finish.countdown", function () {
        $("#modalNotifikasi").modal("show");
    });
</script>
@endpush