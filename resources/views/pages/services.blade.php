@extends('layout.app')
@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    @if (count($services)>0)
    @foreach ($services as $service)
        <ul>
            <li>{{$service}}</li>
        </ul>
    @endforeach

    @endif
</div>
@endsection


