@extends('frontend.layout.app')
@section('main_section')
    <div class="container-fluid bg-image">
        <div class="row">
            <div class="login-wraper">
                <div class="hidden-xs">
                    <img src="{{ asset('assets/frontend/images/login.jpg') }}" alt="">
                </div>
                <div class="banner-text hidden-xs">
                    <div class="line"></div>
                    <div class="b-text">
                        Watch <span class="color-active">millions<br> of</span> <span class="color-b1">v</span><span
                            class="color-b2">i</span><span class="color-b3">de</span><span class="color-active">os</span>
                        for free.
                    </div>
                    <div class="overtext">
                        Over 6000 videos uploaded Daily.
                    </div>
                </div>
                <div class="login-window">
                    <div class="l-head">
                        Log Into Your Account
                    </div>
                    <div class="l-form">
                        <form method="POST" action="{{ route('login') }}">
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
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="arrow"></span>
                                    </label> <span>Remember me on this computer</span>
                                    <span class="text2">(not recomended on public or shared computers)</span>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Login</button></div>
                                <div class="hidden-xs">
                                    <div class="col-lg-1 ortext">or</div>
                                    <div class="col-lg-4 signuptext"><a href="{{ route('register') }}">Sign Up</a></div>
                                </div>
                            </div>
                            <div class="row hidden-xs">
                                <div class="col-lg-12 forgottext">
                                    <a href="{{ route('password.request') }}">Forgot Username or Password?</a>
                                </div>
                            </div>
                            <div class="row visible-xs">
                                <div class="col-xs-6">
                                    <div class="forgottext"><a href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="signuptext text-right"><a href="{{ route('register') }}">Sign Up</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
