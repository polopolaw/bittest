
@extends('layouts.app')

@section('content')
<h1>Create an book</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'admin/books')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('desc', 'Decsription') }}
        {{ Form::text('desc', Input::old('desc'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('year', 'Year') }}
        {{ Form::number('year', Input::old('year'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('author_id', 'Author') }}
        <select class="form-control" name="author_id">

        <option>Select author</option>

        @foreach ($authors as $author)
            <option value="{{ $author->id }}"> {{ $author->name }} </option>
        @endforeach    </select>

    </div>

    {{ Form::submit('Create the book!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@endsection