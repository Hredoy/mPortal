@extends('frontend.layout.app')
@section('second_navbar')
@include('frontend.partials.second_navbar')
@endsection
@section('main_section')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Duration</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{asset($upload->thumbnail_image)}}" style="height: 50px; height:auto alt="">
                                </td>
                                <td>
                                    {{$upload->name}}
                                </td>
                                <td>
                                    {{$upload->upload_duration}}
                                </td>
                                <td>${{$upload->price}}</td>
                        </tbody>
                    </table>
                    <form action="{{route('user.buynow.store', $upload->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="upload_id" value="{{$upload->id}}">
                        <input type="hidden" name="seller_id" value="{{$upload->user_id}}">
                        <input type="hidden" name="price" value="{{$upload->price}}">

                        <button class="btn btn-primary"> Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
