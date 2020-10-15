@extends('layout.app')
@section('content')
    <div class="container">
        <a href="/posts" class="btn-btn default">Go Back</a>
        <h1>{{$post->title}}</h1>

    <div>
        <div class="container">
            {!!$post->body!!}
        </div>
        <hr>
        <div>
        <small>Written on {{$post->created_at}}</small>
        </div>
    </div>
    <hr>

    @auth
    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
    {!!Form::open(['action'=>['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endauth
</div>
@endsection

