@extends('web.frontend.layouts.auth_layout')

@section("title", "Login")

@section('content')
<div class="container-fluid login-wrapper">
    <div class="container mt-4">
      <div class="row mx-n4 align-items-center justify-content-center">
        <div class="d-none d-lg-inline-block col-lg-7 col-xl-8 pl-md-0 text-md-center text-xl-left ">
          <img src="{{ url('img/tripmate-illustration.png') }}" class="img-fluid ml-xl-n3" width="80%" height="80%">
        </div>
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 pl-lg-0">
          <div class="card card-signup">
            <div class="card-body p-0">
              <h4 class="card-title text-center">Login</h4>
              <div class="text-welcome my-4">
                Selamat datang kembali, silakan login untuk melanjutkan
              </div>
              <form method="POST" action="/login">
                @csrf
                <!-- Email Input-->
                <div class="form-group mb-0">
                  <input type="email" class="form-control floating-input" id="email" placeholder="Email">
                  <small id="emailHelp" class="form-text text-muted mt-0">We'll never share your email with anyone else.</small>
                  <label for="email" class="floating-label" data-content="Email">
                    <span class="hidden-visually">Email</span>
                  </label>
                </div>
                <!-- End of Email Input -->

                <!-- Password Input -->
                <div class="form-group mb-0">
                  <input type="password" class="form-control floating-input" id="password" placeholder="Kata sandi">
                  <label for="password" class="floating-label" data-content="Kata sandi">
                    <span class="hidden-visually">Kata sandi</span>
                  </label>
                </div>
                <!-- End of Password Input -->
                <div class="form-group text-right">
                  <a href="#" class="text-decoration-none">Lupa Password?</a>
                </div>
                <!-- Submit Button -->
                <div class="form-row px-1 mb-4">
                  <button type="submit" class="btn btn-orange col" id="btnRegister">Login</button>
                </div>
                <!-- End of Submit Button -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection