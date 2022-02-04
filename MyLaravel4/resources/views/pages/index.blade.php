@extends('mylayouts.main-layout')
@section('content')
    
    <div>
        <h1>{{ $post -> title }}</h1>
        <h4>Author: {{ $post -> author }}</h4>
        <span>Rating: {{ $post -> rating }}</span>
    </div>

    <div>
        <p>{{ $post -> description ?? "--no description--" }}</p>
    </div>

    <a href="{{ route('home') }}">TORNA ALLA HOME</a>
@endsection