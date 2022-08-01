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
                    <form method="POST" action="{{ route('videos.update',$category->id) }}" accept-charset="UTF-8" role="form" enctype="multipart/form-data" class="needs-validation" file="true">
                        @csrf
                        @method('PUT')
                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Video Title</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="name" placeholder="Video Name" name="name" type="text" class="form-control" value="{{ old('name', $category->category_name) }}"></div>
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
                                <div class="col-md-9">
                                    <img src="{{ asset('/category/'.Auth::user()->name.'/images/'.$category->thumbnail_image) }}" class="msg-photo" alt="" style="width: 150px; height:100px;" />
                                </div>
                            </div>
                           
                        </div>
                        









                        <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">Update Video</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@endsection
