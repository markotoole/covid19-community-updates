@extends('layouts.app')

@section('content')
    <div class="tint-gray">
        <div class="page-header pt-4 pb-4">
            <div class="">
                <div class="title text-white">
                    {{ $category['title'] }}
                </div>

            </div>
            @if(isset($category['description']) && !is_null($category['description']))
            <div class="bg-white p-3" style="max-width: 547px;     border-radius: .25rem;">
                {!! $category['description'] !!}
            </div>
            @endif
        </div>

    </div>
    <div>
        <div class="blog">
            @foreach( $posts as $post)
                <div class="card mb-3" data-link="/posts/{{$post->id}}">
                    <div class="card-body">
                        <a href="/posts/{{$post->id}}" style="text-decoration: none"><h5
                                    class="card-title">{{ $post->title}}</h5>
                        </a>
                        <h6 class="card-subtitle mb-2 text-muted">{{ date('M, d Y', strtotime($post->created_at)) }}</h6>
                        <p class="card-text">{!! $post->summary !!}</p>

                    </div>
                    <div class="card-img-body">
                        <img class="card-img card-img-right img-fluid img-thumbnail"
                             src="/uploads/{{$post->title_image}}">
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
