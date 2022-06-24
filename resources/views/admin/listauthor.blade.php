
@extends('layouts.app')

@section('content')
<div>
<table>
<tr>
    <th>Author</th>
    <th>Count of book</th>
</tr>
@foreach($context as $key => $value)

<tr>
    <td>{{$key}}</td><td>{{$value}}</td>
</tr>
@endforeach
</div>
</table>
@endsection