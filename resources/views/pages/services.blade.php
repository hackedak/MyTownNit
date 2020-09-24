@extends('layout.app')
@section('content')
<pre>




    <h1>{{$title}}</h1>
    </pre>
@if (count($services)>0)
@foreach ($services as $service)
    <ul>
        <li>{{$service}}</li>
    </ul>
@endforeach
    
@endif           
@endsection
       

