@extends('layout')

@section('content')
    <h1>Edit/Delete book</h1>
    <form action="/books/{{$book->id}}" method="post">
        @csrf
        @method('PATCH')
        <label for="title">Title :</label> <br>
        <input type="text" name="title" id="title" value="{{$book->title}}"> <br><br>
        <label for="description">Description :</label> <br>
        <textarea name="description" id="description" cols="30" rows="10">{{$book->description}}</textarea> <br><br>
        <label for="author_id">Author ID :</label> <br>
        <input type="number" name="author_id" id="author_id" value="{{$book->author_id}}"> <br><br>
        <input type="submit" value="Save book"> <br><br>
    </form>
    <form action="/books/{{$book->id}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete book">
    </form>
@endsection
