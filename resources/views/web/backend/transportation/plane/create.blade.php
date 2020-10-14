@extends('web.backend.layouts.admin')

@section('content')
   <!-- Begin Page Content -->
   <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Tambah Pesawat</h1>
   </div>
   
   <div class="card shadow">
     <div class="card-body">
       <div class="container" style="max-width:600px;">
         <form action="{{ route('plane.store') }}" method="POST" class="form-row justify-content-center" enctype="multipart/form-data">
           @csrf
           <div class="form-group col-12">
            <label for="maskapai">Maskapai</label>
            <select id="maskapai" class="form-control @error('maskapai') is-invalid @enderror" name="id_maskapai">
              <option selected>Pilih Maskapai</option>
              @foreach($airlines as $airline)
                <option value="{{$airline->id}}">{{$airline->nama}}</option>
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
             <input type="text" class="form-control @error('model') is-invalid @enderror" id="modelPesawat" name="model" value="{{ old('model') }}" placeholder="Masukkan model pesawat">
             @error('model')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <div class="form-group col-12">
             <label for="jumlahKursi">Jumlah Kursi</label>
             <input type="number" class="form-control @error('jumlah_kursi') is-invalid @enderror" id="jumlahKursi" name="jumlah_kursi" min="0" max="200" value="{{ old('jumlah_kursi') }}">
             @error('jumlah_kursi')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <div class="form-group col-12">
            <label for="deskripsi">Deskripsi Pesawat</label>
            <textarea class="form-control d-block w-100  @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi Pesawat" rows="10" name="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
           </div>
           <div class="form-group col-12">
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambarPesawat" name="gambar">
              <label class="custom-file-label" for="gambarPesawat">Pilih Gambar Pesawat</label>
            </div>
            @error('gambar')
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