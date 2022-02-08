@extends('mylayouts.main-layout')
@section('content')
    
    @auth
        <br>
        <h4>
            <a class="btn btn-primary" href="{{ route('create') }}">ADD A POST</a>
        </h4>
    
    @endauth
    
    <h1>Posts:</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('index', $post -> id) }}">
                    {{ $post -> title }}
                </a>
                - {{ $post -> category -> title }} -
                @foreach ($post -> reactions as $reaction)
                    - {{ $reaction -> name }} -
                @endforeach
                - {{ $post -> date }}
            </li>
        @endforeach
    </ul>
@endsection