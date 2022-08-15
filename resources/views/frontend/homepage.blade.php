@extends('frontend.layout.app')
@section('second_navbar')
    @include('frontend.partials.second_navbar')
@endsection
@section('main_section')
<div class="content-wrapper">
    
    <div class="ls_banner ls_d-flex ls_align-center" style="background-image: url({{ asset('assets/frontend/images/banner.jpg') }});">
        <div class="ls_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center ls_text-white">
                    <h2 class="ls_title-big">
                        Let the World Hear You <br>
                        Music, Comedy, Dance, All Forms of Arts and Talents
                    </h2>
                    <div class="clearfix ls_d-flex ls_justify-center ls_py-20">
                        <p class="col-lg-8 ls_fz-18">
                            Happiness is the center of all human endeavor. Good entertainment melts away stiffen sorrow to lift souls. This is why we are here. We want to stretch the limit. <br>
                            SpiceArt is a place for all latent musical talents, comedy, and other forms of arts and entertainment to be seen, enjoyed, and rewarded. <br>
                            We reward artistes (upcoming and established) with 2spice tokens just for uploading their work on our website for the listening/viewing pleasure of our beloved community people. Get paid per like on your post.
                        </p>
                    </div>
                    <div class="clearfix">
                        <a href="{{ route('register') }}" class="ls_btn ls_btn-big">SIGN UP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            @forelse ($uploads->where('featured', 1) as $item)
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
                                        <div class="pull-right">
                                        @if ($item->user_id == Auth::id())
                                            <a href="#" disabled class="btn "><i class="fa fa-thumbs-o-up" style="font-size: 1.2em"></i></a>
                                        @else
                                            @if (!$item->likes()->where('user_id', Auth::id())->first() )
                                                <a href="{{Route('like', $item->id)}}" class="btn "><i class="fa fa-thumbs-o-up" style="font-size: 1.2em"></i></a>
                                            @endif
                                            <div class="pull-right">
                                                @if ( $likeChecks->upload_id == $item->id && $likeChecks->user_id == Auth::id() )
                                                <a href="{{Route('like', $item->id)}}" class="btn "><i class="fa fa-thumbs-o-up" style="font-size: 1.2em"></i></a>
                                                @else
                                                    <a href="{{Route('unlike', $item->id)}}" class="btn"><i class="fa fa-thumbs-o-down  " style="font-size: 1.2em"></i></a>
                                                @endif
                                                <small> {{$item->likes->count('count')}} Likes</small>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-lg-3 col-sm-6 videoitem mx-2">
                                <div class="b-video">
                                    <p><strong>No Video Available for this Region</strong></p>
                                </div>
                            </div>
                            @endforelse
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
            </div>
        </div>
    </div>
</div>
@endsection
