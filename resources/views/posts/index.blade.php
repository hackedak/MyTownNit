@extends('layout.app')
@section('content')
<pre>



    <h1>post</h1>
</pre>

 @if (count($posts) >= 1)
     @foreach ($posts as $post)
         <div class="card border-light mb-3">
             <div class="container">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}}</small>
             </div>
         </div>
     @endforeach
     <hr class="">
     <div class="container">
        {{ $posts->links("pagination::bootstrap-4") }}
     </div>
@else
    <p>No posts found</p>         
@endif        
@endsection
    