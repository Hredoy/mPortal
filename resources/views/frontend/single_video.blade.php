@extends('frontend.layout.app')
@section('class', 'single-video')
@section('second_navbar')
@include('frontend.partials.second_navbar')
@endsection
@push('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link href="https://vjs.zencdn.net/7.20.2/video-js.css" rel="stylesheet" />
<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />
<link href="{{asset('assets/frontend/css/single-video.css')}}" rel="stylesheet" />

@endpush
@section('main_section')
{{-- For get upload for ajax like/unlike  --}}
<input type="hidden" name="upload_id" value="{{$upload->id}}">
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-sm-12">
                <div class="@if($upload->sell && !$is_purchased) ls_purchase-box @endif">
                    @if ($upload->sell && !$is_purchased && !$is_author)
                    <div class="sv-video">
                        <a href=""><img src="{{asset('images/premium.png')}}" alt="" width="auto" height="350px" class="ls_obj-cover"></a>
                    </div>
                    @else
                    @if($upload->upload)
                    <video id="my-video" class="video-js ls_video-container" controls preload="auto" poster="{{asset($upload->thumbnail_image)}}" data-setup="{}" @auth @if(auth()->user()->auto_play == false)
                        autoplay="false"
                        @else
                        muted autoplay
                        @endif
                        @endauth
                        @guest
                        muted autoplay
                        @endguest
                        >
                        <source src="{{asset($upload->upload)}}" type="video/mp4" />
                    </video>
                    @else
                    <a href=""><img src="{{asset($upload->thumbnail_image)}}" alt="" width="auto" height="350px" class="ls_obj-cover"></a>
                    @endif
                    {{-- For Next Link --}}
                    <input type="hidden" name="nextlink" value="{{route('singleVideo', $relatedUpload[0]['id'])}}">
                    @endif
                    <h1><a href="#">{{$upload->name}}</a></h1>
                    @if($upload->sell)
                    <div class="card">
                        <div class="card-body">
                            @if ($upload->sell && $is_purchased || $is_author)
                            <a href="{{route('user.download', $upload->id)}}" class="ls_btn ls_shadow-1 ls_mb-20 my-2">Download!</a>
                            @else
                            <a href="{{route('user.buynow', $upload->id)}}" class="ls_btn ls_shadow-1 ls_mb-20 my-2">Buy Now</a>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- <div class="acide-panel acide-panel-top">
                    <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                    <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                    <a href="#"><i class="cv cvicon-cv-flag" data-toggle="tooltip" data-placement="top" title="Flag"></i></a>
                </div> -->
                <div class="author clearfix">
                    <div class="author-head ls_avatar-img">
                        <a href="#"><img src="@if ($upload->user->profile && $upload->user->profile->avatar_status == 1) {{ $upload->user->profile->avatar }} @else {{ Gravatar::get($upload->user->email) }} @endif" alt="{{ $upload->user->name }}" class="sv-avatar"></a>
                        <div class="sv-name">
                            <div><a href="{{route('channelpage', $upload->user_id)}}">{{$upload->user->name}}</a> . {{ App\Models\Upload::where('user_id', $upload->user_id)->count() }} Videos</div>
                            <div class="c-sub hidden-xs">
                                @if ($upload->user_id == Auth::id())
                                <button disabled class="c-f">
                                    Follow
                                </button>
                                @else
                                @if (!$followCheck)
                                <a href="{{Route("public.follow", $upload->user_id)}}" class="c-f">
                                    Follow
                                </a>
                                @else
                                <a href="{{Route("public.unfollow", $upload->user_id)}}" class="c-f">
                                    Unfollow
                                </a>
                                @endif
                                @endif
                                <div class="c-s">
                                    {{$upload->user->followers()->get()->count()}}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                        <a href="#" class="author-btn-add"><i class="cv cvicon-cv-plus"></i></a>
                    </div>
                    <div class="author-border">
                    </div>
                    <div class="sv-views">
                        <div class="sv-views-count d-flex">
                            @if ( empty($likeCheck))
                                @auth
                                <span class="btn like-icon"><i class="fa fa-thumbs-up" style="font-size: 1.2em"></i></span>
                                @endauth
                                @guest
                                <a href="{{route('like', $upload->id)}}" class="btn"><i class="fa fa-thumbs-up" style="font-size: 1.2em"></i></a>
                                @endguest
                            @else
                            <span class="btn like-icon"><i class="fa fa-thumbs-down  " style="font-size: 1.2em"></i></span>
                            @endif
                            <small id="totalLikeshow"> {{$upload->likes->count('count')}} Likes</small>

                            <small> {{$upload->view}} views</small>
                        </div>
                        <div class="sv-views-progress">
                            <div class="sv-views-progress-bar ls_progress-bar"></div>
                        </div>
                        {{-- <div class="sv-views-stats">
                            <span class="percent">95%</span>
                            <span class="green"><span class="circle"></span> 39,852</span>
                            <span class="grey"><span class="circle"></span> 852</span>
                        </div> --}}
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    {{-- Social Share with jorenvanhocht/laravel-share pack --}}
                    <div class="social-btn-sp pull-right">
                        {!! $shareButtons !!}
                    </div>

                </div>
                <div class="info">
                    <div class="info-content">
                        {{-- <h4>Cast:</h4>
                        <p>Nathan Drake , Victor Sullivan , Sam Drake , Elena Fisher</p> --}}

                        <h4>Category </h4>
                        @switch($upload->category_id)
                        @case($upload->category_id == 1)
                        <p>Music</p>
                        @break
                        @case($upload->category_id == 2)
                        <p>Talent</p>
                        @break
                        @case($upload->category_id == 3)
                        <p>Comedy</p>
                        @break

                        @default
                        <p>No category Found</p>
                        @endswitch


                        <h4>About </h4>
                        <p>{!! $upload->description !!}</p>

                        {{-- <h4>Tags :</h4>
                        <p class="sv-tags">
                            <span><a href="#">Uncharted 4</a></span>
                            <span><a href="#">Playstation 4</a></span>
                            <span><a href="#">Gameplay</a></span>
                            <span><a href="#">1080P</a></span>
                            <span><a href="#">ps4Share</a></span>
                            <span><a href="#">+ 6</a></span>
                        </p> --}}

                        <div class="row date-lic">
                            <div class="col-xs-6">
                                <h4>Release Date:</h4>
                                <p>{{$upload->release_date}}</p>
                            </div>
                            <div class="col-xs-6 ta-r">
                                <h4>License:</h4>
                                <p>Standard</p>
                            </div>
                        </div>
                    </div>

                    <div class="showless hidden-xs">
                        <a>Tell Us What You Think</a>
                    </div>

                    <!-- <div class="content-block head-div head-arrow head-arrow-top visible-xs">
                        <div class="head-arrow-icon">
                            <i class="cv cvicon-cv-next"></i>
                        </div>
                    </div> -->

                    {{-- <div class="adblock2">
                        <div class="img">
                            <span class="hidden-xs">
                                Google AdSense<br>728 x 90
                            </span>
                            <span class="visible-xs">
                                Google AdSense 320 x 50
                            </span>
                        </div>
                    </div> --}}

                    <!-- similar videos -->
                    <div class="caption hidden-xs">
                        {{-- <div class="left">
                            <a href="#">Similar Videos</a>
                        </div> --}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-v-footer">
                        <!-- comments -->
                        <div class="comments">
                            <div class="reply-comment">
                                <div class="rc-header"><i class="cv cvicon-cv-comment"></i> <span class="semibold">{{$upload->comments->count()}}</span> Comments</div>
                                <div class="rc-ava"><a href="#"><img src="{{asset('assets/frontend/images/ava5.png')}}" alt=""></a></div>
                                <div class="rc-comment">
                                    <form action="{{ route('comment.add') }}" method="post">
                                        @csrf
                                        <textarea name="body" rows="3" placeholder="Share what you think?"></textarea>
                                        <input type="hidden" name="upload_id" value="{{$upload->id}}" id="">
                                        <button type="submit">
                                            <i class="cv cvicon-cv-add-comment"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="comments-list">
                                @foreach ($upload->comments as $comment)
                                <!-- comment -->
                                <div class="cl-comment">
                                    <div class="cl-avatar"><a href="#"><img src="{{asset('assets/frontend/images/ava8.png')}}" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">{{ $comment->user->name }}</a> . {{$comment->created_at->diffForHumans()}}</div>
                                        <div class="cl-text">{{ $comment->body }}</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 121</span> <span class="grey"><span class="circle"></span> 2</span> . <a href="#">Reply</a></div>
                                        <div class="cl-replies"><a href="#">View all {{$comment->replies->count()}} replies <i class="fa fa-chevron-down" aria-hidden="true"></i></a></div>
                                        <div class="cl-flag"><a href="#"><i class="cv cvicon-cv-flag"></i></a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <!-- END comment -->
                                <div class="reply-comment">
                                    <div class="rc-ava"><a href="#"><img src="{{asset('assets/frontend/images/ava5.png')}}" alt=""></a></div>
                                    <div class="rc-comment">
                                        <form action="{{ route('comment.add') }}" method="post">
                                            @csrf
                                            <textarea name="body" rows="3" placeholder="Share what you think?"></textarea>
                                            <input type="hidden" name="upload_id" value="{{ $upload->id }}" />
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                                            <button type="submit">
                                                <i class="cv cvicon-cv-add-comment"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @foreach ($comment->replies as $reply)
                                <!-- reply comment -->
                                <div class="cl-comment-reply">
                                    <div class="cl-avatar"><a href="#"><img src="{{asset('assets/frontend/images/ava7.png')}}" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#">{{ $reply->user->name }}</a> . {{$reply->created_at->diffForHumans()}}</div>
                                        <div class="cl-text">{{ $reply->body }}</div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 70</span> <span class="grey"><span class="circle"></span> 9</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END reply comment -->
                                @endforeach
                                @endforeach

                                {{-- <div class="row hidden-xs">
                                    <div class="col-lg-12">
                                        <div class="loadmore-comments">
                                            <form action="#" method="post">
                                                <button class="btn btn-default h-btn">Load more Comments</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- END comments -->
                    </div>
                </div>
                <div class="content-block head-div head-arrow visible-xs">
                    <!-- <div class="head-arrow-icon">
                        <i class="cv cvicon-cv-next"></i>
                    </div> -->
                    {{-- <div class="adblock2 adblock2-v2">
                        <div class="img">
                            <span>Google AdSense 300 x 250</span>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12 hidden-xs">

                <!-- up next -->
                <div class="caption">
                    <div class="left">
                        <a href="#">Up Next</a>
                    </div>
                    <div class="right" id="autoplayDiv">
                        {{-- <a href="#">Autoplay <i class="cv cvicon-cv-btn-off"></i></a> --}}
                        @auth
                        <label class="custom-control teleport-switch">
                            <span class="teleport-switch-control-description">Auto Play</span>
                            <input type="checkbox" name="autoplay" class="teleport-switch-control-input" @if(auth()->user()->auto_play) checked @endif>
                            <span class="teleport-switch-control-indicator"></span>
                        </label>
                        @endauth
                        @guest
                        <a href="{{route('login')}}">
                            <label class="custom-control teleport-switch">
                                <span class="teleport-switch-control-description">Auto Play</span>
                                <input type="checkbox" disabled class="teleport-switch-control-input" checked>
                                <span class="teleport-switch-control-indicator"></span>
                            </label>
                        </a>
                        @endguest
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list">
                    @forelse ($relatedUpload as $item )
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img ls_video-thumbnail">
                                <a href="{{route('singleVideo', $item->id)}}"><img src="{{asset($item->thumbnail_image)}}" alt=""></a>
                                <div class="time">{{$item->upload_duration}}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="{{route('singleVideo', $item->id)}}">{{$item->name}}</a>
                            </div>
                            <div class="v-views">
                                {{$upload->view}} views
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @empty
                    <div class="h-video row ">

                        <div class="col-lg-12 col-sm-12">
                            <div class="v-desc ">
                                <p class="text-center"><strong> No Video Available</strong></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    @endforelse
                    <!-- END up next -->
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('custom_script')
    {{-- Video Js Plugin --}}
    <script src="https://vjs.zencdn.net/7.20.2/video.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', 'input[name="autoplay"]', function() {
                // alert('welcome')
                $.ajax({
                    url: '/ajax/autoplay'
                    , type: 'GET'
                    , success: function(data) {
                        console.log(data);
                    }
                    , error: function(error) {
                        console.log(error)
                    }
                })
            });
            let myVideo = document.getElementById('my-video');
            myVideo.addEventListener('ended', videoCompleted, false);


            function videoCompleted(e) {
                let nextvideo = $('input[name="nextlink"]').val();
                window.location.href = nextvideo;
            }

            // Like Video
            $(document).on('click', '.like-icon', function() {
                let upload_id = $('input[name="upload_id"]').val();
                $.ajax({
                    url: `/video/like/${upload_id}`
                    , type: 'GET'
                    , success: function(data) {
                        // console.log(data);
                        if(data.data.click == 'like'){
                            $('.like-icon').html('<i class="fa fa-thumbs-down" style="font-size: 1.2em"></i>')
                        }else if(data.data.click == 'unlike'){
                            $('.like-icon').html('<i class="fa fa-thumbs-up" style="font-size: 1.2em"></i>')
                        }
                        $('#totalLikeshow').html(`${data.data.likecount} like`)

                    }
                    , error: function(error) {
                        console.log(error)
                    }
                })
            });


        });

    </script>
    @endpush
