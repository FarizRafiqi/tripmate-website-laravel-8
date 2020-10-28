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
          <div class="card card-login">
            <div class="card-body p-0">
              <h4 class="card-title text-center">Login</h4>
              <div class="text-welcome my-4">
                Selamat datang kembali, silakan login untuk melanjutkan
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Input-->
                <div class="form-group mb-0">
                  <input type="email" class="form-control floating-input @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
                  
                  <label for="email" class="floating-label" data-content="Email">
                    <span class="hidden-visually">Email</span>
                  </label>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <!-- End of Email Input -->

                <!-- Password Input -->
                <div class="form-group mb-0">
                  <input type="password" class="form-control floating-input @error('password') is-invalid @enderror" id="password" placeholder="Kata sandi" name="password">
                  <label for="password" class="floating-label" data-content="Kata sandi">
                    <span class="hidden-visually">Kata sandi</span>
                  </label>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <!-- End of Password Input -->
                @if (Route::has('password.request'))
                  <div class="form-group text-right">
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa Password?</a>
                  </div>
                @endif
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