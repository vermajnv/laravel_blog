@extends('layouts.app')
@section('content')
<h3></h3>
<div class="jumbotron text-center">
    <h1 class="display-4">This is the first laravel Project!</h1>
    <p class="lead">All we need to do is stick with this and progress will appear soon</p>
    <hr class="my-4">
    <p>Do Login or Register if you want to add a blog here..</p>
    <a class="btn btn-primary btn-lg" href="{{url('/login')}}" role="button">Login</a>
    <a class="btn btn-secondary btn-lg" href="{{url('/register')}}" role="button">Register</a>
</div>
@endsection
