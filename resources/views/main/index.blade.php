<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <a href="/admin">To admin</a>
    <div>
<table>
    <tr>
        <th>Book</th>
        <th>Book description</th>
        <th>Book year</th>
        <th>Author</th>
    </tr>
    @foreach($context as $value)

    <tr>
        <td>{{$value->title}}</td><td>{{$value->desc}}</td><td>{{$value->year}}</td><td>{{$value->name}}</td>
    </tr>
    @endforeach
    </div>
    </table>
</body>
</html>