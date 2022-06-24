
@extends('layouts.app')

@section('content')

<h1>Edit {{ $book->name }}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($book, array('route' => array('books.update', $book->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Name') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
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

    {{ Form::submit('Edit the book!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@endsection