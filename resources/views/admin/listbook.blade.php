@extends('layouts.app')

@section('content')
<div>
<table>
<tr>
    <th>Book</th>
    <th>Author</th>
</tr>
@foreach($context as $value)

<tr>
    <td>{{$value->title}}</td><td>{{$value->name}}</td>
</tr>
@endforeach
</div>
</table>
@endsection