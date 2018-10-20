<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title'])}}
</div>
<div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', null, ['id'=> 'article-ckeditor', 'class' => 'form-control'])}}
</div> 
{{-- {{Form::hidden('_method', 'PUT')}} --}}
{{Form::submit($formBtn, ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}