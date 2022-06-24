<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

</head>
<body>
@auth

<div class="container">

<nav class="navbar navbar-inverse">

    <ul class="nav navbar-nav">
        <li>    <div class="navbar-header">
        <a class="navbar-brand" href="/admin">Admin</a>
    </div></li>
        <li><a href="{{ URL::to('admin/authors') }}">View All authors</a></li>
        <li><a href="{{ URL::to('admin/books') }}">View All books</a></li>
        <li><a href="{{ URL::to('admin/authors/create') }}">Create an author</a>
        <li><a href="{{ URL::to('admin/books/create') }}">Create a book</a>
        <li><a href="{{ URL::to('admin/books/list') }}">List of book</a>
        <li><a href="{{ URL::to('admin/authors/list') }}">List of author</a>
@endauth
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                
            </li>
        @endguest
@auth                    
    </ul>
</nav>
           
@endauth
@yield('content')

  
</div>
</body>
</html>
