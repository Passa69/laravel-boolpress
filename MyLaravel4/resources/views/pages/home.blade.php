@extends('mylayouts.main-layout')
@section('content')
    
    @auth

        <h1>Posts:</h1>

        <h4>
            <a class="btn btn-secondary" href="{{ route('create') }}">ADD A POST</a>
        </h4>

        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('index', $post -> id) }}">
                        {{ $post -> title }}
                    </a>
                    - {{ $post -> category -> title }}
                    - {{ $post -> date }}
                </li>
            @endforeach
        </ul>
    @endauth
@endsection