@extends('layouts.app')

@section('content')
    <div class="main-info tint-gray">
        <div class="page-header">
            <div class="container">
                <div class="title text-white">
                    {{config('variables.home_title')}}
                </div>
            </div>
            <div class="flex-center mt-5"><a class="btn btn-primary btn-lg" href="/submit">Submit an Update</a></div>
        </div>


    </div>


    <ul class="nav nav-tabs" id="myTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-businesses-tab" data-toggle="tab" href="#home-businesses" role="tab"
               aria-controls="home-businesses" aria-selected="true">Businesses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="home-community-tab" data-toggle="tab" href="#home-community" role="tab"
               aria-controls="home-community" aria-selected="false">Community groups</a>
        </li>
    </ul>
    <div class="tab-content bg-white " id="myTabContent">
        <div class="tab-pane fade show active" id="home-businesses" role="tabpanel"
             aria-labelledby="home-businesses-tab">
            @include('sections.home_table', ['statuses' => $statuses, 'classes' => 'table-business'])
        </div>
        <div class="tab-pane fade" id="home-community" role="tabpanel" aria-labelledby="home-community-tab">
            @include('sections.home_table', ['statuses' => $community, 'type' => 'com', 'classes' => 'table-community'])
        </div>

    </div>
@endsection
