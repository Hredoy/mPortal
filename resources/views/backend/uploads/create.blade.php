@extends('backend.layout.app')

@push('custom-css')
@endpush

@section('main_section')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Add Content</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('public.upload.store') }}" enctype="multipart/form-data" id="uplodFrom">
                            @csrf
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Title" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-12 form_gallery form-group">
                                            <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                            <input data-name="#gallery2" id="form_gallery-upload" name="thumbnail_image" class="form_gallery-upload" type="file" accept=".png,.jpg,.jpeg,.gif,.svg" required>
                                            @if ($errors->has('thumbnail_image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('thumbnail_image') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                                                <option selected disabled="">Category</option>
                                                <option value="1">Music</option>
                                                <option value="2">Comedy</option>
                                                <option value="3">Talent</option>

                                                {{-- dynamic category --}}
                                                {{-- @foreach ($categories as $cate)
                                     <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                                @endforeach --}}
                                            </select>
                                            @if ($errors->has('category_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <select class="form-control" name="region" id="exampleFormControlSelect3" required>
                                                <option selected disabled="">Choose Region</option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('region'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('region') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea id="text" name="description" rows="5" class="form-control" placeholder="Description"></textarea>
                                            @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="d-block position-relative">
                                        <div class="form_video-upload">
                                            <input type="file" name="upload" accept=".mp3,.mp4,.3gp,.mkev,.mkv,.amv,.avi">
                                            <p>Upload Audio/Video</p>
                                        </div>
                                        @if ($errors->has('upload'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('upload') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <small> <strong>Note</strong> : For upload premium content, you have to reach minimum 10,000 Followers.</small>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <Label for="contentType">Content Type: </Label>
                                    <select name="sell" id="contentType" class="form-control">
                                        <option value="0" selected>Free</option>
                                        <option value="1" @if(auth()->user()->followers->count() < 10000) disabled @endif>Premium</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group" id="inputPrice" style="display: none">
                                    <Label for="priceID">Price: </Label>
                                    <input type="number" name="price" id="priceID" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-sm-12 form-group">
                            <input type="date" class="form-control" name="release_date" placeholder="Release Date">
                            @if ($errors->has('release_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('release_date') }}</strong>
                                </span>
                                @endif
                            </div> --}}

                            {{-- <div class="col-sm-12 form-group">
                           <input type="time" class="form-control" name="upload_duration" placeholder="Movie Duration">
                        </div> --}}
                            <div class="col-12 form-group ">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">cancel</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('custom-script')
<script>
    $(document).ready(function() {
        let contenttype = $('select[name="sell"]');
        $(document).on('change', 'select[name="sell"]', function() {
            let data = $(this).val();
            if (data == 1) {
                $('#inputPrice').css('display', 'block');
            } else if (data == 0) {
                $('#inputPrice').css('display', 'none');
            }
            // console.log(data);
        });
    });
</script>

@endpush
