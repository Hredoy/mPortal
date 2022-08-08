@extends('frontend.layout.app')
@push('custom_css')
    <style>
        .login-wraper .login-window {
            top: 25%;
            left: 30%;
            margin-top: 0px;
        }

        @media screen and (max-width:767px) {
            .login-wraper .login-window {
                left: 0%;
            }
        }
    </style>
@endpush
@section('main_section')
    <div class="login-wraper text-center">
        <div class="hidden-xs">
            <img src="{{ asset('assets/frontend/images/login.jpg') }}" alt="">
        </div>
        <div class="login-window">
            <div class="l-head">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="l-form">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required autofocus placeholder="sample@gmail.com">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Send Reset Link</button></div>
                        <div class="hidden-xs">
                            <div class="col-lg-1 ortext">or</div>
                            <div class="col-lg-4 signuptext"><a href="{{ route('login') }}">Sign In</a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
