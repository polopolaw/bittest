
@extends('layouts.app')

@section('content')
<h1>Showing {{ $book->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $book->title }}</h2>
    </div>


@endsection