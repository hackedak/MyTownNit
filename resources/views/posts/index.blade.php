@extends('layout.app')
@section('content')

    <div class="container">
        <h1>post</h1>
    </div>
    <section class="cards-wrapper">
            @if (count($posts) >= 1)
                @foreach ($posts as $post)
                    <div class="card-grid-space">
                        <div class="card img-fluid">
                           <img class="card-img-top" style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
                            <div class="card-img-overlay">
                                <h1><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                                <div class="card-text">
                                   <div class="date">Written on {{$post->created_at->format('d.m.Y')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
    </section>
                <div class="container">
                    {{ $posts->links("pagination::bootstrap-4") }}
                </div>
            @else
                <p>No posts found</p>
            @endif
        </div>
@endsection

