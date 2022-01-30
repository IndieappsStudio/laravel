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
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('Email Address') }}" required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-submit">{{ __('Send Password Reset Link') }}</button>
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
