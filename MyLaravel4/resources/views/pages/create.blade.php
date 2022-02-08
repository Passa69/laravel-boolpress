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

        <label for="title">Title:</label><br>
        <input type="text" name="title" placeholder="title"><br>
        <label for="author">Author:</label><br>
        <input type="text" name="author" placeholder="author"><br>
        <label for="subtitle">Subtitle:</label><br>
        <input type="text" name="title" placeholder="subtitle"><br>
        <label for="description">Description:</label><br>
        <textarea type="text" cols="30" rows="10" name="description"></textarea><br>
        <label for="date">Date:</label><br>
        <input type="date" name="date"><br>
        <label for="rating">Rating:</label><br>
        <input type="number" name="rating"><br>
        <label for="category">Category:</label><br>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category -> id }}">{{ $category -> title }}</option> 
            @endforeach
        </select><br><br>
        <input type="submit" value="CREATE">

    </form>
@endsection