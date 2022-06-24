
@extends('layouts.app')

@section('content')
<h1>Edit {{ $author->name }}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($author, array('route' => array('authors.update', $author->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the author!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@endsection