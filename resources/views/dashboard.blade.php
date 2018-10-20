@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{url('/posts/create')}}" class="btn btn-primary">Create Post</a>
                    <hr>
                    <h3>Your Blogs</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Post</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td></td>
                                <td><a href="{{url('/posts/'.$post->id.'/edit')}}" class="btn btn-primary">Edit Post</a>
                                {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'list-inline-item'])}}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
