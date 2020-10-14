@extends('web.frontend.layouts.auth_layout')

@section("title", "Register")

@section('content')
  <div class="container-fluid signup-wrapper">
    <div class="container mt-4">
      <div class="row mx-n4 align-items-center justify-content-center">
        <div class="d-none d-lg-inline-block col-lg-7 col-xl-8 pl-md-0 text-md-center text-xl-left ">
          <img src="{{ url('img/tripmate-illustration.png') }}" class="img-fluid ml-xl-n3" width="80%" height="80%">
        </div>
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 pl-lg-0">
          <div class="card card-signup">
            <div class="card-body p-0">
              <h4 class="card-title text-center">Daftar</h4>
              <form method="POST" action="{{route('register')}}">
                @csrf
                <!-- Email Input-->
                <div class="form-group mb-0">
                  <input type="email" class="form-control floating-input @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                  <label for="email" class="floating-label" data-content="Email">
                    <span class="hidden-visually">Email</span>
                  </label>
                </div>
                <!-- End of Email Input -->

                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Title Input -->
                <div class="form-group mb-0">
                  <select class="form-control floating-input" name="title" id="selectBoxTitle">
                    <option>Tuan</option>
                    <option>Nyonya</option>
                    <option>Nona</option>
                  </select>
                  <label for="selectBoxTitle" class="floating-label" data-content="Title">
                    <span class="hidden-visually">Title</span>
                  </label>
                </div>
                <!-- End of Title Input -->

                <!-- First Name Input -->
                <div class="form-group mb-0">
                  <input type="text" class="form-control floating-input @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama" value="{{ old('nama') }}">
                  <label for="nama" class="floating-label" data-content="Nama">
                    <span class="hidden-visually">Nama</span>
                  </label>
                </div>
                @error('nama')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!-- End of First Name Input -->

                <!-- Last Name Input -->
                <!-- <div class="form-group mb-0">
                  <input type="text" class="form-control floating-input @error('nama_belakang') is-invalid @enderror" name="nama_belakang" id="namabelakang" placeholder="Nama belakang" value="{{ old('nama_belakang') }}">
                  <label for="namabelakang" class="floating-label" data-content="Nama belakang">
                    <span class="hidden-visually">Nama belakang</span>
                  </label>
                </div> -->
                <!-- End of Last Name Input -->
                <!-- @error('nama_belakang')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror -->

                <!-- Mobile Number Input -->
                <div class="form-group mb-0">
                  <input type="tel" class="form-control floating-input @error('no_telp') is-invalid @enderror" name="no_telp" id="nomorponsel" placeholder="Nomor Ponsel">
                  <label for="nomorponsel" class="floating-label" data-content="Nomor Ponsel">
                    <span class="hidden-visually">Nomor Ponsel</span>
                  </label>
                </div>
                <!-- End of Mobile Number Input -->

                @error('no_telp')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Password Input -->
                <div class="form-group mb-0">
                  <input type="password" class="form-control floating-input" name="password" id="password" placeholder="Kata sandi">
                  <label for="password" class="floating-label" data-content="Kata sandi">
                    <span class="hidden-visually">Kata sandi</span>
                  </label>
                </div>
                <!-- End of Password Input -->

                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Submit Button -->
                <div class="form-row px-1 mb-4">
                  <button type="submit" class="btn btn-orange col" id="btnRegister">Buat Akun</button>
                </div>
                <!-- End of Submit Button -->

                <!-- Privacy Policy and Term & Conditions -->
                <div class="agree-signup text-center">
                  Dengan mendaftar kamu menyetujui
                  <div>
                    <a href="#" class="text-decoration-none">Kebijakan Privasi</a> dan <a href="#" class="text-decoration-none">Syarat & Ketentuan kami</a>
                  </div>
                </div>
                <!-- End of Privacy Policy and Term & Conditions -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection