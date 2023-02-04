@extends('layout')

@section('content')
    <h1>authors Operations</h1>

    <form action="/authors/create" method="get">
        <input type="submit" value="Create author"> <br><br>
    </form>

    <form action="/authors" method="get">
        <input type="submit" value="Show All authors"> <br><br>
    </form>

    <form action="/authors" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete All authors"> <br><br>
    </form>

    <h1>books Operations</h1>

    <form action="/books/create" method="get">
        <input type="submit" value="Create book"> <br><br>
    </form>

    <form action="/books" method="get">
        <input type="submit" value="Show All books"> <br><br>
    </form>

    <form action="/books" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete All books">
    </form>
    <br>
@endsection
