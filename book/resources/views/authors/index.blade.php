@extends('layout')

@section('content')
    <h1>authors</h1>
    <ul>
        @foreach ($authors as $author)
            <li> <a href="/authors/{{$author->id}}">{{$author->name}}</a> </li>
        @endforeach
    </ul>
@endsection
