@extends('layouts.templateAuth')

@section('content')
  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="login100-form-title p-b-34 p-t-27">{{ __('Reset Password') }}</div>
    <div class=class="login100-form-title p-b-34 p-t-27">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <div class="wrap-input100 validate-input" data-validate = "Enter email">
        <input class="input100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <span class="focus-input100" data-placeholder="&#xf15a;"></span>
        </div>

        <div class="container-login100-form-btn">
          <button type="submit" class="login100-form-btn">
            {{ __('Send Password Reset Link') }}
          </button>
        </div>


      </form>
    @endsection
