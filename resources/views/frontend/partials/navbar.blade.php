<div class="container-fluid">
   <div class="row">
       <div class="btn-color-toggle">
           <img src="{{asset('assets/frontend/images/icon_bulb_light.png')}}" alt="">
       </div>
       <div class="navbar-container">
           <div class="container">
               <div class="row">
                   <div class="col-xs-3 visible-xs">
                       <a href="{{route('home')}}" class="btn-menu-toggle"><i class="cv cvicon-cv-menu"></i></a>
                   </div>
                   <div class="col-lg-1 col-sm-2 col-xs-6">
                       <a class="navbar-brand" href="{{route('home')}}">
                           <img src="{{asset('assets/frontend/images/logo.svg')}}" alt="Project name" class="logo" />
                           <span>{{config('app.name')}}</span>
                       </a>
                   </div>
                   <div class="col-lg-3 col-sm-10 hidden-xs">
                       <ul class="list-inline menu">
                           <li class="{{Request::is('music') ? 'color-active': null}}"><a href="{{route('music')}}">Music</a></li>
                           <li class="{{Request::is('comedy') ? 'color-active': null}}"><a href="{{route('comedy')}}">Comedy</a></li>
                           <li class="{{Request::is('talent') ? 'color-active': null}}"><a href="{{route('talent')}}">Talents</a></li>
                       </ul>
                   </div>
                   <div class="col-lg-6 col-sm-8 col-xs-3">
                       <form action="search.html" method="post">
                           <div class="topsearch">
                               <i class="cv cvicon-cv-cancel topsearch-close"></i>
                               <div class="input-group">
                                   <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                                   <input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
                                   <div class="input-group-btn">
                                       <div type="text" class="btn btn-default"><i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;{{--<span class="caret"></span>--}}</div>
                                       {{-- <ul class="dropdown-menu">
                                           <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                           <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                           <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                           <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                           <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                       </ul> --}}
                                   </div><!-- /btn-group -->
                               </div>
                           </div>
                       </form>
                   </div>
                   <div class="col-lg-2 col-sm-4 hidden-xs">
                       <div class="avatar pull-left">
                        @guest
                            <img src="{{asset('assets/frontend/images/avatar.png')}}" alt="avatar" />
                        @endguest
                        @auth
                           <img src="@if (Auth::user()->profile && Auth::user()->profile->avatar_status == 1) {{ Auth::user()->profile->avatar }} @else {{ Gravatar::get(Auth::user()->email) }} @endif" alt="{{ Auth::user()->name }}" height="44px" width="100%" class="user-logo"/>
                        @endauth
                           <span class="status"></span>
                       </div>
                       <div class="selectuser pull-left">
                           <div class="btn-group pull-right dropdown">
                               <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                @auth
                                    {{Auth::user()->name}}
                                @endauth
                               
                                   <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu">
                                @guest
                                   <li><a href="{{route('login')}}">Sign In</a></li>
                                   <li><a href="{{route('register')}}">Sign up</a></li>
                                @endguest
                                @auth
                                    <li><a href="{{route('public.home')}}">Dashboard</a></li>
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth
                               </ul>
                           </div>
                       </div>
                       <div class="clearfix"></div>
                   </div>
               </div>
               <div class="hidden-xs">
                   <a href="{{Route('public.upload')}}">
                       <div class="upload-button">
                           <i class="cv cvicon-cv-upload-video"></i>
                       </div>
                   </a>
               </div>
           </div>
       </div>
   </div>
</div>