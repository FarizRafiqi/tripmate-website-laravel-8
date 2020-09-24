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
              <form method="POST" action="/register">
                <!-- Email Input-->
                <div class="form-group mb-0">
                  <input type="email" class="form-control floating-input" id="email" placeholder="Email">
                  <small id="emailHelp" class="form-text text-muted mt-0">We'll never share your email with anyone else.</small>
                  <label for="email" class="floating-label" data-content="Email">
                    <span class="hidden-visually">Email</span>
                  </label>
                </div>
                <!-- End of Email Input -->

                <!-- Title Input -->
                <div class="form-group mb-0">
                  <select class="form-control floating-input" id="selectBoxTitle">
                    <option>Tuan</option>
                  </select>
                  <label for="selectBoxTitle" class="floating-label" data-content="Title">
                    <span class="hidden-visually">Title</span>
                  </label>
                </div>
                <!-- End of Title Input -->

                <!-- First Name Input -->
                <div class="form-group mb-0">
                  <input type="text" class="form-control floating-input" id="namadepan" placeholder="Nama depan">
                  <label for="namadepan" class="floating-label" data-content="Nama depan">
                    <span class="hidden-visually">Nama depan</span>
                  </label>
                </div>
                <!-- End of First Name Input -->

                <!-- Last Name Input -->
                <div class="form-group mb-0">
                  <input type="text" class="form-control floating-input" id="namabelakang" placeholder="Nama belakang">
                  <label for="namabelakang" class="floating-label" data-content="Nama belakang">
                    <span class="hidden-visually">Nama belakang</span>
                  </label>
                </div>
                <!-- End of Last Name Input -->

                <!-- Mobile Number Input -->
                <div class="form-group mb-0">
                  <input type="tel" class="form-control floating-input" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" id="nomorponsel" placeholder="Nomor Ponsel">
                  <label for="nomorponsel" class="floating-label" data-content="Nomor Ponsel">
                    <span class="hidden-visually">Nomor Ponsel</span>
                  </label>
                </div>
                <!-- End of Mobile Number Input -->

                <!-- Password Input -->
                <div class="form-group mb-0">
                  <input type="password" class="form-control floating-input" id="password" placeholder="Kata sandi">
                  <label for="password" class="floating-label" data-content="Kata sandi">
                    <span class="hidden-visually">Kata sandi</span>
                  </label>
                </div>
                <!-- End of Password Input -->

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