@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="auth-form">
                <div class="row">
                    <div class="col">
                        <div class="logo-box"><a href="#" class="logo-text">{{config('app.name')}}</a></div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{ old('name') }}" autocomplete="name" autofocus required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" autocomplete="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" autocomplete="new-password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}" autocomplete="new-password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-submit">{{ __('Register') }}</button>
                            @if (Route::has('register'))
                                <div class="auth-options">
                                    <a href="{{ route('login') }}" class="forgot-link">{{ __('Already have an account?') }}</a>
                                </div>
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
