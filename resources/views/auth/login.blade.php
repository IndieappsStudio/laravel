@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="auth-form">
                <div class="row">
                    <div class="col">
                        <div class="logo-box"><a href="#" class="logo-text">{{config('app.name')}}</a></div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('Email Address') }}" required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password"placeholder="{{ __('Password') }}" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="auth-options">
                                <div class="custom-control custom-checkbox form-group m-0">
                                    <input id="remember" name="remember" type="checkbox" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-link m-0">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-submit">{{ __('Login') }}</button>
                            @if (Route::has('register'))
                                <p class="mt-3">Don't have an account yet? <a href="{{ route('register') }}" class="forgot-link m-0">{{ __('Register now') }}</a></p>
                            @endif
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block d-xl-block">
            <div class="auth-image"></div>
        </div>
    </div>
@endsection
