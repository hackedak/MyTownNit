@extends('layout.app')
@section('content')
<pre>






    
<a href="/posts" class="btn-btn default">Go Back</a>
    <h1>{{$post->title}}</h1>
</pre>
<div>
    <div class="container">
        {{$post->body}}
    </div>
    <hr>
    <div>
    <small>Written on {{$post->created_at}}</small>
    </div>    
</div>    
@endsection
    