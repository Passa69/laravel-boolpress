@extends('mylayouts.main-layout')
@section('content')
    
    <h1>Posts:</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('index', $post -> id) }}">{{ $post -> title }}</a>
                - {{ $post -> date }}
            </li>
        @endforeach
    </ul>
@endsection