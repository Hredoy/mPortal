@extends('frontend.layout.app')
@section('second_navbar')
    @include('frontend.partials.second_navbar')
@endsection
@section('main_section')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- Updates from Subscriptions -->
                {{-- <div class="content-block">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-10">
                                <ul class="list-inline">
                                    <li><a href="#">Updates from Subscriptions</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-2">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content avatars">
                        <div class="row">
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava2.png')}}" alt=""><div class="note">1</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava3.png')}}" alt=""><div class="note">03</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava4.png')}}" alt=""><div class="note">10</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava5.png')}}" alt=""><div class="note">56</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava6.png')}}" alt=""><div class="note">6</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava7.png')}}" alt=""><div class="note">25</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava8.png')}}" alt=""><div class="note">23</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava9.png')}}" alt=""><div class="note">16</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava10.png')}}" alt=""><div class="note">3</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava11.png')}}" alt=""><div class="note">6</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava12.png')}}" alt=""><div class="note">98</div></a></div>
                            <div class="col-lg-1 col-sm-2 col-xs-3"><a href="#"><img src="{{asset('assets/frontend/images/ava1.png')}}" alt=""><div class="note">125</div></a></div>
                        </div>
                    </div>
                </div> --}}
                <!-- /Updates from Subscriptions -->
                <!-- Featured Videos -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="visible-xs">Featured</span>
                                            <span class="hidden-xs">Featured Videos</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="glyphicon glyphicon-filter"></span>
                                      <span class="sr-only">Filters</span>
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{Route("home.latest")}}">Latest</a></li>
                                      <li><a href="{{Route("home.view")}}">Mostly View</a></li>
                                      <li><a href="{{Route("home.like")}}">Mostly Liked</a></li>
                                    </ul>
                                  </div>
                            </div>
                            {{-- <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            @foreach ($uploads->where('featured', 1) as $item)
                            <div class="col-lg-3 col-sm-6 videoitem mx-2">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', $item->id)}}"><img src="{{asset($item->thumbnail_image)}}" alt="" width="100%" height="215px"></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', $item->id)}}">{{$item->name}}</a>
                                    </div>
                                    <div class="v-views">
                                        {{$item->view}} views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                        {{-- <div class="pull-right">
                                            @if ( $likeChecks->upload_id == $item->id && $likeChecks->user_id == Auth::id() )
                                            <a href="{{Route('like', $item->id)}}" class="btn "><i class="fa fa-thumbs-o-up" style="font-size: 1.2em"></i></a>
                                            @else
                                            <a href="{{Route('unlike', $item->id)}}" class="btn"><i class="fa fa-thumbs-o-down  " style="font-size: 1.2em"></i></a>
                                            @endif
                                           <small> {{$item->likes->count('count')}} Likes</small>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- For Other Contnet --}}
                @if($others)
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="visible-xs">Others</span>
                                            <span class="hidden-xs">Others Videos</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="glyphicon glyphicon-filter"></span>
                                      <span class="sr-only">Filters</span>
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{Route("home.latest")}}">Latest</a></li>
                                      <li><a href="{{Route("home.view")}}">Mostly View</a></li>
                                      <li><a href="{{Route("home.like")}}">Mostly Liked</a></li>
                                    </ul>
                                  </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            @foreach ($others->where('featured', 1) as $item)
                            <div class="col-lg-3 col-sm-6 videoitem mx-2">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', $item->id)}}"><img src="{{asset($item->thumbnail_image)}}" alt="" width="100%" height="215px"></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', $item->id)}}">{{$item->name}}</a>
                                    </div>
                                    <div class="v-views">
                                        {{$item->view}} views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                        {{-- <div class="pull-right">
                                            @if ( $likeChecks->upload_id == $item->id && $likeChecks->user_id == Auth::id() )
                                            <a href="{{Route('like', $item->id)}}" class="btn "><i class="fa fa-thumbs-o-up" style="font-size: 1.2em"></i></a>
                                            @else
                                            <a href="{{Route('unlike', $item->id)}}" class="btn"><i class="fa fa-thumbs-o-down  " style="font-size: 1.2em"></i></a>
                                            @endif
                                           <small> {{$item->likes->count('count')}} Likes</small>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                <!-- /Featured Videos -->

                <!-- New Videos in Current Region -->
                {{-- <div class="content-block head-div head-arrow">
                    <div class="head-arrow-icon">
                        <i class="cv cvicon-cv-next"></i>
                    </div>
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="hidden-xs">New Videos in India</span>
                                            <span class="visible-xs">New in India</span>
                                        </a>
                                    </li>
                                    <li class="hidden-xs"><a href="#">Most Viewed</a></li>
                                    <li>
                                        <a href="#">
                                            <span class="hidden-xs">Featured This Week</span>
                                            <span class="visible-xs">Featured Videos</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">

                        <div class="row">
                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-1.png')}}" alt=""></a>
                                        <div class="time">54:23</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', 1)}}">There Can Only Be One! Introducing Tanc & Hercules</a>
                                    </div>
                                    <div class="v-views">
                                        127,548 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-2.png')}}" alt=""></a>
                                        <div class="time">47:12</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', 1)}}">Pokémon 3: The Movie - Spell Of The Unown: Entei HD...</a>
                                    </div>
                                    <div class="v-views">
                                        18,241,542 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-3.png')}}" alt=""></a>
                                        <div class="watched-mask"></div>
                                        <div class="watched">WATCHED</div>
                                        <div class="time">19:23</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', 1)}}">Bullet Trains and Octopus Balls in South Korea</a>
                                    </div>
                                    <div class="v-views">
                                        729,347 views . <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-4.png')}}" alt=""></a>
                                        <div class="time">21:18</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">Top 10 NEW 3DS Games Of 2016 that blew our mind</a>
                                    </div>
                                    <div class="v-views">
                                        79,239,852 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-5.png')}}" alt=""></a>
                                        <div class="time">1:23:57</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', 1)}}">Mirror's Edge Catalyst Beta: PS4 vs Xbox One Frame-Rate... </a>
                                    </div>
                                    <div class="v-views">
                                        519,130 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-6.png')}}" alt=""></a>
                                        <div class="time">8:27</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', 1)}}">THE MAGNIFICENT SEVEN - Teaser Trailer (HD)</a>
                                    </div>
                                    <div class="v-views">
                                        15,525 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-7.png')}}" alt=""></a>
                                        <div class="time">6:58</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', 1)}}">Game of Thrones Season 6: Event Promo (HBO)</a>
                                    </div>
                                    <div class="v-views">
                                        43,741 views. <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 videoitem">
                                <div class="b-video last-row">
                                    <div class="v-img">
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/video2-8.png')}}" alt=""></a>
                                        <div class="time">5:47</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="{{route('singleVideo', 1)}}">CHAPPIE Movie – Die Antwoord Featurette...</a>
                                    </div>
                                    <div class="v-views">
                                        3,202,513 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}
                <!-- /New Videos in Current Region -->

                <!-- Popular Playlists -->
                {{-- <div class="content-block head-div head-arrow">
                    <div class="head-arrow-icon">
                        <i class="cv cvicon-cv-next"></i>
                    </div>
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li><a href="#" class="color-active">Popular Playlists</a></li>
                                    <li><a href="#">Recently Featured</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sort by  <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content">
                        <div class="row">

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="{{asset('assets/frontend/images/video1-1.png')}}" alt="" class="l-1" />
                                        <img src="{{asset('assets/frontend/images/video1-2.png')}}" alt="" class="l-2" />
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/playlist-1.png')}}" alt="" class="l-3" /></a>
                                        <div class="items">20</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">There Can Only Be One! Introducing Tanc & Hercules</a>
                                    </div>
                                    <div class="v-views">
                                        127,548 views. <span class="v-percent"><span class="v-circle"></span> 78%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="{{asset('assets/frontend/images/video2-1.png')}}" alt="" class="l-1" />
                                        <img src="{{asset('assets/frontend/images/video2-2.png')}}" alt="" class="l-2" />
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/playlist-2.png')}}" alt="" class="l-3"></a>
                                        <div class="items">15</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">Pokémon 3: The Movie - Spell Of The Unown: Entei HD...</a>
                                    </div>
                                    <div class="v-views">
                                        18,241,542 views. <span class="v-percent"><span class="v-circle"></span> 93%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="{{asset('assets/frontend/images/video2-6.png')}}" alt="" class="l-1" />
                                        <img src="{{asset('assets/frontend/images/video2-4.png')}}" alt="" class="l-2" />
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/playlist-3.png')}}" alt="" class="l-3" ></a>
                                        <div class="items">7</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">Bullet Trains and Octopus Balls in South Korea</a>
                                    </div>
                                    <div class="v-views">
                                        729,347 views . <span class="v-percent"><span class="v-circle"></span> 95%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="b-playlist">
                                    <div class="v-img">
                                        <img src="{{asset('assets/frontend/images/video1-6.png')}}" alt="" class="l-1" />
                                        <img src="{{asset('assets/frontend/images/video1-4.png')}}" alt="" class="l-2" />
                                        <a href="{{route('singleVideo', 1)}}"><img src="{{asset('assets/frontend/images/playlist-4.png')}}" alt="" class="l-3"></a>
                                        <div class="items">27</div>
                                    </div>
                                    <div class="v-desc">
                                        <a href="#">Top 10 NEW 3DS Games Of 2016 that blew our mind</a>
                                    </div>
                                    <div class="v-views">
                                        79,239,852 views. <span class="v-percent"><span class="v-circle"></span> 84%</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <!-- /Popular Playlists -->

                <!-- Popular Channels -->
                {{-- <div class="content-block head-div head-arrow">
                    <div class="head-arrow-icon">
                        <i class="cv cvicon-cv-next"></i>
                    </div>
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li><a href="#" class="color-active">Popular Channels</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-xs-4">
                                <div class="btn-group pull-right bg-clean">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       More <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                        <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content chanels-row">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 col-xs-4">
                                <div class="b-chanel">
                                    <a href="#">
                                        <img src="{{asset('assets/frontend/images/chanel-1.png')}}" alt="">
                                        <div class="hover">
                                            <span>Ray Simpson</span>
                                            <span><i class="cv cvicon-cv-liked"></i> 5K</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-4">
                                <div class="b-chanel">
                                    <a href="#">
                                        <img src="{{asset('assets/frontend/images/chanel-2.png')}}" alt="">
                                        <div class="hover">
                                            <span>Ray</span>
                                            <span><i class="cv cvicon-cv-liked"></i> 215K</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-4">
                                <div class="b-chanel">
                                    <a href="#">
                                        <img src="{{asset('assets/frontend/images/chanel-3.png')}}" alt="">
                                        <div class="hover">
                                            <span>Simpson</span>
                                            <span><i class="cv cvicon-cv-liked"></i> 21</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-4">
                                <div class="b-chanel">
                                    <a href="#">
                                        <img src="{{asset('assets/frontend/images/chanel-4.png')}}" alt="">
                                        <div class="hover">
                                            <span>Ray Simpson</span>
                                            <span><i class="cv cvicon-cv-liked"></i> 134</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-4">
                                <div class="b-chanel">
                                    <a href="#">
                                        <img src="{{asset('assets/frontend/images/chanel-5.png')}}" alt="">
                                        <div class="hover">
                                            <span>Simpson</span>
                                            <span><i class="cv cvicon-cv-liked"></i> 1.6M</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-xs-4">
                                <div class="b-chanel">
                                    <a href="#">
                                        <img src="{{asset('assets/frontend/images/chanel-6.png')}}" alt="">
                                        <div class="hover">
                                            <apan>Ray</apan>
                                            <span><i class="cv cvicon-cv-liked"></i> 265K</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /Popular Channels -->

                <!-- pagination -->
                {{-- <div class="v-pagination">
                    <ul class="list-inline">
                        <li class="v-pagination-prev"><a href="#"><i class="cv cvicon-cv-previous"></i></a></li>
                        <li class="v-pagination-first"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">10</a></li>
                        <li class="v-pagination-skin visible-xs"><a href="#">Skip 5 Pages</a></li>
                        <li class="v-pagination-next"><a href="#"><i class="cv cvicon-cv-next"></i></a></li>
                    </ul>
                </div> --}}
                <!-- /pagination -->

            </div>
        </div>
    </div>
</div>
@endsection
