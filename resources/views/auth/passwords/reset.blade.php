@extends('frontend.layout.app')
@push('custom_css')
    <style>
        .login-wraper .login-window {
            top: 15%;
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
    <div class="container-fluid bg-image">
        <div class="row">
            <div class="login-wraper">
                <div class="hidden-xs">
                    <img src="{{ asset('assets/frontend/images/login.jpg') }}" alt="">
                </div>
                <div class="login-window">
                    <div class="l-head">
                        Reset Your Password
                    </div>
                    <div class="l-form">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
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
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required placeholder="**********">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password"
                                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                    name="password_confirmation" required placeholder="**********">

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Reset Password</button>
                                </div>
                                <div class="hidden-xs">
                                    <div class="col-lg-1 ortext">or</div>
                                    <div class="col-lg-4 signuptext"><a href="{{ route('login') }}">Sign In</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
