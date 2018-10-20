@extends('layouts.app')

@section('content')
    <h1>This is Edit post page</h1>
    {!! Form::model($postData, ['action' => ['PostsController@update', $postData->id], 'method' => 'PUT']) !!}
    @include('posts.form', ['formBtn' => 'Update Post' ])
    {{!! Form::close() !!}}
@endsection