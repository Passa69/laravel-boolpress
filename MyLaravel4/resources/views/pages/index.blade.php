@extends('mylayouts.main-layout')
@section('content')
    
    <div>
        <h1>{{ $post -> title }}</h1>
        <h4>Author: {{ $post -> author }}</h4>
        <h4>Category: {{ $post -> category -> title }}</h4>
        <h4>Tag: {{ $tag -> tag -> name }}</h4>
        <span>Rating: {{ $post -> rating }}</span>
    </div>

    <div>
        <p>{{ $post -> description ?? "--no description--" }}</p>
    </div>

    <a href="{{ route('delete', $post -> id) }}">DELETE</a><br><br>

    <a href="{{ route('home') }}">TORNA ALLA HOME</a>
@endsection