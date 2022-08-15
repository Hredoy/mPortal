@php
use Monarobase\CountryList\CountryListl;
$countries = Countries::getList('en', 'json');

@endphp
<footer class="ls_bg-dark ls_py-40">
    <div style="display: none">
    <div class="container-fluid">
        <div class="row">
            <div class="container padding-def">
                <div class="col-lg-1  col-sm-2 col-xs-12 footer-logo">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ $settings->logo }}" alt="{{ $settings->app_name }}" class="logo" />
                        <span>{{($settings->app_name)? $settings->app_name : config('app.name')}}</span>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-6 col-xs-12">
                    <div class="f-links">
                        <ul class="list-inline">
                            @foreach ($contents->where('type', 2)->where('status', 1) as $content)
                                <li>
                                    <a href="{{ $content->link }}">{{ $content->name }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="delimiter"></div>
                </div>
                <div class="col-lg-7 col-sm-6 col-xs-12">
                    <div class="f-copy">
                        <ul class="list-inline">
                            <li>{{ $settings->footer_text }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-3 col-sm-4 col-xs-12">
                    <div class="f-last-line">
                        <div class="f-icon pull-left">
                            @foreach ($contents->where('type', 2)->where('status', 1) as $content)
                                <a
                                    href="{{ $content->link }}">{{ $content->icon ? $content->icon : $content->name }}</a>
                            @endforeach
                        </div>
                        <div class="f-lang pull-right">
                            <!-- Small button group -->
                            <div class="btn-group dropup pull-right">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Library <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="cv cvicon-cv-calender"></i> Latest</a></li>
                                    <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Mostly Viewed</a></li>
                                    <li><a href="#"><i class="cv cvicon-cv-star"></i> Mostly Liked</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="f-last-line">
                        <div class="f-lang pull-right">
                            <!-- Small button group -->
                            <form action="{{ route('getlocation') }}" method="get">
                                <label for="forCountry">Region</label>
                                <select class="form-control" name="country" style="padding: 0;" id="forCountry"
                                    onchange="this.form.submit()">
                                    <option value="">All</option>
                                    @foreach (json_decode($countries) as $key => $val)
                                        <option value="{{ $val }}"
                                            @if (getLocation() && $val == getLocation()) selected @endif>{{ $val }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="delimiter visible-xs"></div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ls_mb-20">
                    <img src="{{ $settings->logo }}" alt="{{ $settings->app_name }}"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div>
                    <p class="ls_text-white">I had a good experience while using this app, what fascinated me was the live tracking feature There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <nav class="ls_footer-nav">
                    <ul>
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Account</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Media Center</a></li>
                        <li><a href="#">Cookie Preferences</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-2 ls_d-flex ls_justify-center">
                <!-- Small button group -->
                <form action="{{ route('getlocation') }}" method="get">
                    <label for="forCountry" class="ls_text-white">Region</label>
                    <select class="form-control ls_btn-select " name="country" style="padding: 0;" id="forCountry"
                        onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach (json_decode($countries) as $key => $val)
                            <option value="{{ $val }}"
                                @if (getLocation() && $val == getLocation()) selected @endif>{{ $val }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
</footer>
