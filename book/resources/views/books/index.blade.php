@extends('layout')

@section('content')
    <h1>books</h1>
    <ul>
        @foreach ($books as $book)
            <li> <a href="/books/{{$book->id}}">{{$book->title}}</a> </li>
        @endforeach
    </ul>
@endsection
