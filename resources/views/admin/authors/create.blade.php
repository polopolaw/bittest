
@extends('layouts.app')

@section('content')
<h1>Create an author</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'admin/authors')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the author!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@endsection