@extends('layout.app')
@section('content')

    <div class="container">
        <h1>post</h1>
    </div>
    <section class="cards-wrapper">
            @if (count($posts) >= 1)
                @foreach ($posts as $post)
                    <div class="card-grid-space">
                        <div class="card">
                            <div class="container">
                                <h1><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
                                <div class="card-img-overlay d-flex align-items-end flex-column">
                                   <div class="card-text mt-auto">Written on {{$post->created_at}}</div>
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

