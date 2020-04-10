@extends('layouts.app')

@section('content')
    <div class="main-info tint-gray">
        <div class="page-header">
            <div class="container">
                <div class="title text-white">
                    Celbridge Businesses - Updates
                </div>
            </div>
            <div class="flex-center mt-5"><a class="btn btn-primary btn-lg" href="/submit">Submit an Update</a></div>
        </div>

    </div>
    <div class="bg-white">
        <div class="table-service p-md-4 p-1">
            <table id="table-service" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th data-priority="1" rowspan="1" colspan="1" class="all">Category</th>
                    <th data-priority="1" rowspan="1" colspan="1" class="all">Name</th>
                    <th>Status</th>
                    <th>Delivery</th>
                    <th>Collection</th>
                    <th>Contact No.</th>
                    <th> Website/Social Media Link</th>
                    <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $statuses as $status)
                    <tr>
                        <td>{{$status->category->name}}</td>
                        <td>{{ $status->name }}</td>
                        <td>{{ $status->status}}</td>
                        <td>{{ $status->delivery ? 'Yes' : 'No'}}</td>
                        <td>{{ $status->service_offered ? 'Yes' : 'No'}}</td>
                        <td>{{ $status->phone}}</td>
                        <td>{{ $status->link}}</td>
                        <td>{{ $status->notes}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection