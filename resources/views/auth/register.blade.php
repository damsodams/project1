@extends('layouts.templateAuth')

@section('content')

  <form method="POST" action="{{ route('register') }}">
    @csrf


    <span class="login100-form-logo">
      <i class="zmdi zmdi-landscape"></i>
    </span>

    <span class="login100-form-title p-b-34 p-t-27">
      Register
    </span>
    <div class="wrap-input100 validate-input" data-validate = "Enter username">
      <input class="input100" placeholder="Username" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        <span class="focus-input100" data-placeholder="&#xf207;"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Enteremail">
        <input class="input100" placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror

          <span class="focus-input100" data-placeholder="&#xf15a;"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Enter password">
          <input class="input100" placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Confirm password">
            <input class="input100" placeholder="Confirm password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <span class="focus-input100" data-placeholder="&#xf190;"></span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" class="btn btn-primary">
              {{ __('Register') }}
            </button>
          </div>
        </form>
      @endsection
