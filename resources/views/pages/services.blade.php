@extends('layouts.app')
@section('content')
<h1>This is the first laravel Project</h1>
<h3>This is the Services Page </h3>
@if(count($services) > 0)
    <ul class="list-group"> 
        @foreach($services as $service) 
            <li class="list-group-item">{{$service}}</li>
        @endforeach
    </ul>
@endif
    
@endsection
