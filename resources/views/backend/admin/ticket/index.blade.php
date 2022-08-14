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
                            <h4 class="card-title">Ticket List</h4>
                        </div>

                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="{{Route('public.upload')}}" class="btn btn-sm iq-bg-success"><i class="ri-add-fill"><span class="pl-1">Add New</span></i>
                                </a>
                            </span>
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>T.Number</th>
                                        <th>title</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$ticket->ticket_number}}</td>
                                        <td>{{$ticket->title}}</td>
                                        <td>{{$ticket->created_at}}</td>
                                        <td>
                                            <a href="{{route('ticket.show', $ticket->id)}}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
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
