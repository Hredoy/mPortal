@extends('backend.layout.app')

@push('custom-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('main_section')
<div id="content-page" class="content-page">
    <div class="container-fluid" id="app">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">{{$page_title}}</h4>
                   </div>

                </div>
                <div class="iq-card-body" >
                   <div id="table" class="table-editable">
                      <span class="table-add float-right mb-3 mr-2">
                      <a href="{{Route('public.upload')}}" class="btn btn-sm iq-bg-success"><i
                         class="ri-add-fill"><span class="pl-1">Add New</span></i>
                      </a>
                      </span>
                      <table class="table table-bordered table-responsive-md table-striped text-center">

                         <thead>
                            <tr>
                              <th>{!! trans('SL') !!}</th>
                              <th>{!! trans('Name') !!}</th>
                              <th class="hidden-xs">{!! trans('Category') !!}</th>
                              <th class="hidden-xs">{!! trans('Status') !!}</th>
                              <th class="hidden-xs">{!! trans('Thumbnail') !!}</th>
                              <th class="">{!! trans('Sort') !!}</th>
                              <th colspan="5">{!! trans('Action') !!}</th>

                            </tr>
                         </thead>
                         <tbody >
                            <tr v-for="upload in uploads" :key="upload.id">
                                <td v-text="upload.id"></td>
                                <td v-text="upload.name"></td>
                                <td v-text="upload.category_id"></td>
                                <td v-text="upload.status"></td>
                                <td ><img :src="upload.thumbnail_image" class="msg-photo" alt="" style="width: 100px; height:60px;" /></td>
                                <td>
                                    <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                    <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                                 </td>
                                 {{-- <td>
                                    <a  :href="'admin/upload-edit/' +upload.id"
                                    class="btn btn-light btn-rounded btn-sm px-2 my-0"> Edit  </a>
                                 <span class="table-remove">
                                    <a  href="{{route('public.upload.destroy',1)}}"
                                    class="btn btn-primary btn-rounded btn-sm my-0">Remove</a>
                                 </span>
                              </td> --}}
                            </tr>
                         </tbody>

                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
@push('custom-script')
<script src="{{mix("js/app.js")}}"></script>
<script>
  const app = new Vue({
 el: '#app',
 data: {
      uploads:[],


 },
  methods:{
     alluploads(){
         axios.get('/api/upload/')
         .then(({data})=> this.uploads = data)
         .catch()
     },

  },
  created() {
     this.alluploads()
  },
});


 </script>
@endpush
