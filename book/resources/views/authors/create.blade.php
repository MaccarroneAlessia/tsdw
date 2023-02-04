@extends('layout')

@section('content')
    <h1>Create author</h1>
    <form action="/authors" method="post">
        @csrf
        <label for="name">name :</label> <br>
        <input type="text" name="name" id="name"> <br><br>
        <label for="data">data :</label> <br>
        <input type="text" name="data" id="data"> <br><br>
        <label for="country">country :</label> <br>
        <input type="text" name="country" id="country"> <br><br>
        <input type="submit" value="Create">
    </form>
@endsection
