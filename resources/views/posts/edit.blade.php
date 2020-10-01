@extends('layout.app')
@section('content')
<h1>Edit Post</h1>
{!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method'=>'POST', 'class'=> 'form']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title,['class'=> 'form-control', 'placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $post->body,['id' => 'article-ckeditor','class'=> 'form-control', 'placeholder'=>'Body Text'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
    
@endsection