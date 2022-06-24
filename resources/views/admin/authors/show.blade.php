
@extends('layouts.app')

@section('content')
<h1>Showing {{ $author->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $author->name }}</h2>
    </div>


@endsection