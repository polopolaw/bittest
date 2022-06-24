
@extends('layouts.app')

@section('content')
<h1>All the books</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Year</td>
            <td>Author</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->desc }}</td>
            <td>{{ $value->year }}</td>
            <td>{{ $value->author_id }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the book (uses the destroy method DESTROY /books/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the book (uses the show method found at GET /books/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/books/' . $value->id) }}">Show this book</a>

                <!-- edit this book (uses the edit method found at GET /books/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/books/' . $value->id . '/edit') }}">Edit this book</a>
                {{ Form::open(array('url' => 'admin/books/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this book', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection