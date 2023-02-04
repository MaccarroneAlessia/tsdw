@extends('layout')

@php
    use App\Models\Author;

    $author = Author::findOrFail($book->author_id);
@endphp

@section('content')
    <h1>book id : {{$book->id}}</h1>
    <b>TITLE :</b> {{$book->title}} <br>
    <b>DESCRIPTION :</b> {{$book->description}} <br>
    <b>FROM author :</b> <a href="/authors/{{$author->id}}">{{$author->name}}</a> <br><br>
    <form action="/books/{{$book->id}}/edit" method="get">
        <input type="submit" value="Edit/Delete book">
    </form>
@endsection
