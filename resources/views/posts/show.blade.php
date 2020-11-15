@extends('layout.app')
@section('content')
<div class="container">
    <div class="container">
        <a href="/posts" class="btn-btn default">Go Back</a>
        <h1>{{$post->title}}</h1>
        <img class="card-img-top" style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">

    </div>
        <div class="well">
            {!!$post->body!!}
        </div>
        <hr>
        <div>
        <small>Written on {{$post->created_at}}</small>
        </div>
    </div>

    @auth
    <div class="container">
    <hr>
    @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
        {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
    </div>
    @endauth
</div>
@endsection

