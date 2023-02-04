@extends('layout')

@section('content')
    <h1>Create book</h1>
    <form action="/books" method="post">
        @csrf
        <label for="title">Title</label> <br>
        <input type="text" name="title" id="title"> <br><br>
        <label for="description">Description</label> <br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea> <br><br>
        <label for="author_id">Project ID</label> <br>
        <input type="number" name="author_id" id="author_id" value="{{$author_id}}"> <br><br>
        <input type="submit" value="Create book">
    </form>
@endsection
