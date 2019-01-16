@include('layouts.html')
<div class="container">
    {!! Form::open(['route' => 'admin.login', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('User Name', 'username')}}
        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'username'] )}}
    </div>
    <div class="form-group">
        {{ Form::label('Password', 'password')}}
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'username'] )}}
        {{-- {{Form::password('password', ['class' => 'awesome'])}} --}}
    </div>
    {{Form::submit('Login', ['class' => 'btn, btn-primary'])}}
    {!! Form::close() !!}
</div>