@extends('mylayouts.main-layout')
@section('content')
    
    <h1>New Post:</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="POST">

        @method("POST")
        @csrf

        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title"><br>
        <label for="author">Author:</label>
        <input type="text" name="author" placeholder="author"><br>
        <label for="subtitle">Subtitle:</label>
        <input type="text" name="title" placeholder="subtitle"><br>
        <label for="description">Description:</label>
        <input type="text" name="description"><br>
        <label for="date">Date:</label>
        <input type="date" name="date"><br>
        <label for="rating">Rating:</label>
        <input type="number" name="rating"><br>
        <input type="submit" value="CREATE">

    </form>
@endsection