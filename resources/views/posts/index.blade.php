@extends('layouts.app')
@section('content') 
    <h1>Post Page</h1>
    @if(count($postsData) > 0)
        <div class="row">
            @foreach($postsData as $postData) 
            <div class="col-sm-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/Cover-image/{{$postData->cover_image}}" alt="">
                        <a href="{{url('posts/'.$postData->id)}}"><h3 class="card-title">{{$postData->title}}</h3></a>
                        <small>Created at {{$postData->created_at}}</small>
                        <small>Written by {{$postData->user->name}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$postsData->links()}}
    @else 
    <p>No Post is found</p>
    @endif

@endsection