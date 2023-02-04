@extends('layout')

@section('content')
    <h3>author id :{{$author->id}}</h3>
    <b>name:</b> {{$author->name}} <br>
    <b>data:</b> {{$author->data}} <br>
    <b>country:</b> {{$author->country}} <br>

    @if ($author->books->count())
        <b>BOOKS:</b>
        <ul>
            @foreach ($author->books as $book)
                <h3>book id : {{$book->id}}</h3>
                <a href="/books/{{$book->id}}">{{$book->title}}</a>
                <form action="/books/{{$book->id}}/edit" method="get">
                    <input type="submit" value="Edit/Delete"> <br><br>
                </form>
            @endforeach
        </ul>
    @endif
    <br>

    <form action="/authors/{{$author->id}}/edit" method="get">
        <input type="submit" value="Edit/Delete author"> <br><br>
    </form>

    <form action="/books/create" method="post">
        @csrf
        <input type="hidden" name="author_id" id="author_id" value="{{$author->id}}">
        <input type="submit" value="Create book in this author">
    </form>
@endsection
