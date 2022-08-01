@extends('layouts.app')

@section('template_title')
{!! trans($page_title) !!}
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        {!! trans($page_title) !!}
                        <div class="pull-right">
                            <a href="{{ route('videos') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                                <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                {!! trans('Back to Videos') !!}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('videos.store') }}" accept-charset="UTF-8" role="form" enctype="multipart/form-data" class="needs-validation" file="true">
                        @csrf
                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Video Title</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="name" placeholder="Video Name" name="name" type="text" class="form-control"></div>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback row"><label for="last_name" class="col-md-3 control-label">Thumbnail Image</label>
                            <div class="col-md-9">
                                <input class="form-control form-control-sm" id="thumbnail_image" type="file" name="thumbnail_image"> @if ($errors->has('thumbnail_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('thumbnail_image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback row"><label for="role" class="col-md-3 control-label">Category</label>
                            <div class="col-md-9">
                                <div class="input-group"><select name="category_id" id="category_id" class="custom-select form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $cate)
                                        <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select></div>
                                @if ($errors->has('category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group has-feedback row"><label for="last_name" class="col-md-3 control-label">Upload Video/Audio</label>
                            <div class="col-md-9">
                                <input class="form-control form-control-sm" id="video" type="file" name="video">
                                @if ($errors->has('video'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Relese Date</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input id="" placeholder="Release Date" name="release_date" type="date" class="form-control"></div>
                                @if ($errors->has('release_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('release_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row"><label for="role" class="col-md-3 control-label">Region</label>
                            <div class="col-md-5">
                                <div class="input-group"><select name="region_id" id="region_id" class="custom-select form-control">
                                        <option value="">Select Region</option>
                                        @foreach ($countries as $ctn)
                                        <option value="{{$ctn->id}}">{{$ctn->iso3}} || {{ $ctn->nicename }}</option>
                                        @endforeach
                                    </select></div>
                                @if ($errors->has('region_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('region_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Video/Audio Duration</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input id="" placeholder="Video/Audio Duration" name="video_duration" type="time" class="form-control"></div>
                                @if ($errors->has('video_duration'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('video_duration') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>









                        <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">Create a Video</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@endsection
