@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="auth-form">
                <div class="row">
                    <div class="col">
                        <div class="logo-box"><a href="#" class="logo-text">{{config('app.name')}}</a></div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" autocomplete="email" placeholder="{{ __('Email Address') }}" required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" placeholder="{{ __('Password') }}" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-submit">{{ __('Reset Password') }}</button>
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
