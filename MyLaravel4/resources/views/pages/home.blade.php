@extends('mylayouts.main-layout')
@section('content')
    
    <h1>Posts:</h1>

    <h4>
        <a href="{{ route('create') }}">ADD A POST</a>
    </h4>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('index', $post -> id) }}">
                    {{ $post -> title }}
                </a>
                - {{ $post -> date }}
            </li>
        @endforeach
    </ul>
@endsection