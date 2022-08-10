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
                      <h4 class="card-title">Site Settings </h4>
                   </div>
                </div>
                <div class="iq-card-body">
                 <form method="POST" action="{{ route('site.settings.store') }}" enctype="multipart/form-data" >
                       @csrf
                      <div class="row">
                         <div class="col-lg-7">
                            <div class="row">
                               <div class="col-12 form-group">
                                    <label  for="app_name">App Name</label>
                                  <input type="text" name="app_name" class="form-control" placeholder="App Name" value="{{$setting ? $setting->app_name: '' }}"
                                   required>
                                  @if ($errors->has('app_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('app_name') }}</strong>
                                </span>
                                @endif
                               </div>
                               <div class="col-12 form_gallery form-group">
                                  <label id="gallery2" for="form_gallery-upload">Upload Logo</label>

                                  <input data-name="#gallery2" id="form_gallery-upload" name="logo" class="form_gallery-upload"
                                     type="file" accept="image/*" >
                                     @if ($errors->has('logo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                                @endif
                               </div>
                               <div class="col-12 form-group">
                                <label id="gallery2" for="form_gallery-upload">Description</label>
                                  <textarea id="text" name="description" rows="5" class="form-control"
                                     placeholder="Description" required>{{$setting ? $setting->description: '' }}</textarea>
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
                                  <input type="file" name="favicon" accept="image/*" >
                                  <p>Upload Fevicon</p>
                               </div>
                               @if ($errors->has('favicon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('favicon') }}</strong>
                                </span>
                                @endif
                            </div>
                         </div>
                      </div>
                      <div class="row">
                        <input type="hidden" name="old_logo" value="{{$setting ? $setting->logo: '' }}">
                        <input type="hidden" name="old_fevicon" value="{{$setting ? $setting->favicon: '' }}">

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
