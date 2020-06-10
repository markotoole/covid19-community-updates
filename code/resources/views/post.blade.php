@extends('layouts.app')

@section('og-title'){!! $post->title !!} @stop
@section('og-image'){!! app()->make('url')->to('/uploads/' . $post->title_image) !!} @stop
@section('og-image-secure'){!! app()->make('url')->to('/uploads/' . $post->title_image) !!} @stop

@section('content')
    <div class="post">
        <div class="tint-gray">
            <h1 class="title pl-2 pt-4 mb-0 pb-2 text-white">{{ $post->title}}</h1>
        </div>
        <img class="w-100" src="/uploads/{{$post->title_image}}">
        <div>
            <div class="container bg-white p-4">


                {!! $post->content!!}
            </div>
        </div>
    </div>
@endsection
