@extends('layouts.app')
@section('content')
<h1>Post Page</h1>
    <div class="row"> 
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{$postData->title}}</h3>
                    <h4>{!! $postData->body !!}</h4>
                    <small>Created at {{$postData->created_at}}</small>
                    <small>Written by {{$postData->user->name}}</small>
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $postData->user_id)
                            <hr>
                            <a href="{{url('/posts/'.$postData->id.'/edit')}}" class="btn btn-primary">Edit Post</a>
                            {{Form::open(['action' => ['PostsController@destroy', $postData->id], 'method' => 'POST', 'class' => 'list-inline-item'])}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {{Form::close()}}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>
<a class="btn btn-primary" href="{{url('/posts')}}">Go Back</a>
<a class="btn btn-secondary" href="{{url('/posts/create')}}">Create Post</a>
@endsection
