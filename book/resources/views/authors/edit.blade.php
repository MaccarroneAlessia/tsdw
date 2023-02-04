@extends('layout')

@section('content')
    <h1>Edit/Delete author</h1>
    <form action="/authors/{{$author->id}}" method="post">
        @csrf
        @method('PATCH')
        <label for="name">name</label> <br>
        <input type="text" name="name" id="name" value="{{$author->name}}"> <br><br>
        <label for="data">data</label> <br>
        <input type="text" name="data" id="data" value="{{$author->data}}"> <br><br>
        <label for="country">country</label> <br>
        <input type="text" name="country" id="country" value="{{$author->country}}"> <br><br>
        <label for="author_id">author ID</label> <br>
        <input type="number" name="author_id" id="author_id" value="{{$author->id}}"> <br><br>
        <input type="submit" value="Save author"> <br><br>
    </form>

    <form action="/authors/{{$author->id}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete author">
    </form>

    <a href="/authors/{{$author->id}}"><h1> Edit/Delete delete books </h1></a><BR><!-- lista dei libri che ha fatto l'autore -->
@endsection
