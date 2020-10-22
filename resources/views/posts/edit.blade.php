@extends('layout.app')
@section('content')

<div class="container">
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method'=>'POST', 'class'=> 'form', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title,['class'=> 'form-control', 'placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body,['id' => 'article-ckeditor','class'=> 'form-control', 'placeholder'=>'Body Text'])}}
        </div>
        <div class="form-group">
            {{!! Form::file('cover_image') !!}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

@endsection
