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
                - CATEGORY: {{ $post -> category -> title }} -
                @foreach ($post -> tags as $tag)
                    - TAG: {{ $tag -> name }} -
                @endforeach
                - {{ $post -> date }}
            </li>
        @endforeach
    </ul>
@endsection