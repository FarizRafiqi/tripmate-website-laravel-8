@extends('web.backend.layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Ubah Pesawat {{$plane->model}}</h1>
   </div>

   
   <div class="card shadow">
     <div class="card-body">
       <div class="container" style="max-width:600px;">
         <form action="{{ route('plane.store') }}" method="POST" class="form-row justify-content-center">
           @csrf
           <div class="form-group col-12">
            <label for="maskapai">Maskapai</label>
            <select id="maskapai" class="form-control @error('maskapai') is-invalid @enderror" name="maskapai">
              <option selected>Pilih Maskapai</option>
              @foreach($airlines as $airline)
                <option value="{{$airline->id}}" {{($plane->id_maskapai == $airline->id) ? 'selected' : ''}}>{{$airline->nama}}</option>
              @endforeach
            </select>
            @error('maskapai')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <div class="form-group col-12">
             <label for="modelPesawat">Model Pesawat</label>
             <input type="text" class="form-control @error('model_pesawat') is-invalid @enderror" id="modelPesawat" name="model_pesawat" value="{{ $plane->model }}" placeholder="Masukkan model pesawat">
             @error('model_pesawat')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <div class="form-group col-12">
             <label for="jumlahKursi">Jumlah Kursi</label>
             <input type="number" class="form-control @error('jumlah_kursi') is-invalid @enderror" id="jumlahKursi" name="jumlah_kursi" min="0" max="200" value="{{ $plane->jumlah_kursi }}">
             @error('jumlah_kursi')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <div class="form-group col-12">
            <label for="deskripsi">Deskripsi Pesawat</label>
            <textarea class="form-control d-block w-100 @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi Pesawat" rows="10" name="deskripsi_pesawat">
              {{ $plane->deskripsi }}
            </textarea>
            @error('deskripsi')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <div class="form-group col-12">
            <img src="{{Storage::url($plane->gambar)}}" alt="" class="img-fluid" width="200px">
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('gambar_pesawat') is-invalid @enderror" id="gambarPesawat" name="gambar_pesawat">
              <label class="custom-file-label" for="gambarPesawat">Pilih Gambar Pesawat</label>
            </div>

            @error('gambar_pesawat')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <button class="btn btn-primary btn-block col-12" type="submit">Submit</button>
         </form>
       </div>
     </div>
   </div>
   

   </div>
   <!-- /.container-fluid -->
@endsection