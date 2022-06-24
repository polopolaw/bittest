
@extends('layouts.app')

@section('content')
<h1>All the authors</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($authors as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the author (uses the destroy method DESTROY /authors/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the author (uses the show method found at GET /authors/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/authors/' . $value->id) }}">Show this author</a>

                <!-- edit this author (uses the edit method found at GET /authors/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/authors/' . $value->id . '/edit') }}">Edit this author</a>
                {{ Form::open(array('url' => 'admin/authors/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this author', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection