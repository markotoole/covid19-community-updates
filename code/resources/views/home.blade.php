@extends('layouts.app')

@section('content')
    <div class="main-info">
        <div class="page-header">
            <div class="container">
                <div class="title">
                    Service Statuses
                </div>
            </div>
            <div class="flex-center mt-5"><a class="btn btn-primary btn-lg" href="/submit">Submit an Update</a></div>
        </div>

    </div>
    {{--<div class="links">--}}
    {{--<a href="https://laravel.com/docs">Docs</a>--}}
    {{--<a href="https://laracasts.com">Laracasts</a>--}}
    {{--<a href="https://laravel-news.com">News</a>--}}
    {{--<a href="https://blog.laravel.com">Blog</a>--}}
    {{--<a href="https://nova.laravel.com">Nova</a>--}}
    {{--<a href="https://forge.laravel.com">Forge</a>--}}
    {{--<a href="https://vapor.laravel.com">Vapor</a>--}}
    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
    {{--</div>--}}
    <div class="table-service">
        <table id="table-service" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Status</th>
                <th>Delivery</th>
                <th>Collection</th>
                <th>Contact No.</th>
                <th> Website/Social Media Link</th>
                <th>Notes</th>
                {{--<th>Hot Food Collection/Takeaway ?</th>--}}
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
                    {{--<td>No</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection