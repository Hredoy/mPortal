@extends('layouts.app')

@section('template_title')
{!! trans($page_title) !!}
@endsection

@section('template_linked_css')
@if(config('videosmanagement.enabledDatatablesJs'))
<link rel="stylesheet" type="text/css" href="{{ config('videosmanagement.datatablesCssCDN') }}">
@endif
<style type="text/css" media="screen">
    .videos-table {
        border: 0;
    }

    .videos-table tr td:first-child {
        padding-left: 15px;
    }

    .videos-table tr td:last-child {
        padding-right: 15px;
    }

    .videos-table.table-responsive,
    .videos-table.table-responsive table {
        margin-bottom: 0;
    }

</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {!! trans($page_title) !!}
                        </span>

                        <div class="btn-group pull-right btn-group-xs">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                <span class="sr-only">
                                    Hello</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('videos.create') }}">
                                    <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                    {!! trans('Add New Video') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    @if(config('videosmanagement.enableSearchvideos'))
                    @include('partials.search-videos-form')
                    @endif

                    <div class="table-responsive videos-table">
                        <table class="table table-striped table-sm data-table">
                            <caption id="video_count">
                                {{ trans_choice('videosmanagement.videos-table.caption', 1, ['videoscount' => $videos->count()]) }}
                            </caption>
                            <thead class="thead">
                                <tr>
                                    <th>{!! trans('SL') !!}</th>
                                    <th>{!! trans('Name') !!}</th>
                                    <th class="hidden-xs">{!! trans('Category') !!}</th>
                                    <th class="hidden-xs">{!! trans('Status') !!}</th>
                                    <th class="hidden-xs">{!! trans('Thumbnail') !!}</th>
                                    <th class="">{!! trans('Video') !!}</th>
                                    <th>{!! trans('Created') !!}</th>
                                    <th>{!! trans('Updated') !!}</th>
                                    <th colspan="5">{!! trans('Action') !!}</th>
                                    <th class="no-search no-sort"></th>
                                    <th class="no-search no-sort"></th>
                                </tr>
                            </thead>
                            <tbody id="videos_table">
                                @forelse($videos as $video)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$video->name}}</td>
                                    <td class="hidden-xs">{{$video->categories->category_name}}</td>
                                    <td class="hidden-xs">
                                        @if($video->status == '1')
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-warning">Deactive</span>
                                        @endif

                                    </td>

                                    <td class="hidden-sm hidden-xs hidden-md"><img src="{{ asset('/video-audio/'.Auth::user()->name.'/images/'.$video->thumbnail_image) }}" class="msg-photo" alt="" style="width: 100px; height:60px;" /></td>
                                    </td>
                                    <td class="hidden-sm hidden-xs hidden-md">
                                        <video width="320" height="100" controls>
                                            <source src="{{ asset('/video-audio/'.Auth::user()->name.'/video/'.$video->video_audio) }}" type="video/mp4"> </video>
                                    </td>
                                    <td class="hidden-sm hidden-xs hidden-md">{{$video->created_at}}</td>
                                    <td class="hidden-sm hidden-xs hidden-md">{{$video->updated_at}}</td>
                                    <td><a href="{{route('videos.edit',$video->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-secondary btn-block"><span class="hidden-xs hidden-sm">Edit </span></a>
                                        <form action="{{route('video.destroy',$video->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <button class="btn btn-block btn-outline-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                        {{-- <button type="button" data-toggle="modal" data- id="{{$video->id}} " data-target="#confirmDelete" data-title="Delete the Video" data-message="Are you sure you want to delete this video?" class="btn btn-block btn-outline-danger btn-sm" style="width: 100%;"><span class="hidden-xs hidden-sm">Delete </span></button> --}}

                                    </td>
                                </tr>
                            <tbody>
                                @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">
                                        {{ trans($empty_message) }}</td>
                                </tr>
                            </tbody>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.modal-delete')

@endsection

@section('footer_scripts')
@if ((count($videos) > config('videosmanagement.datatablesJsStartCount')) && config('videosmanagement.enabledDatatablesJs'))
@include('scripts.datatables')
@endif
@include('scripts.delete-modal-script')
@include('scripts.save-modal-script')
@if(config('videosmanagement.tooltipsEnabled'))
@include('scripts.tooltips')
@endif
@if(config('videosmanagement.enableSearchvideos'))
@include('scripts.search-videos')
@endif
@endsection
