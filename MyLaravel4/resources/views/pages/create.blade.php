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
        <input type="text" name="title" placeholder="title"><br><br>

        <label for="author">Author:</label><br>
        <input type="text" name="author" placeholder="author"><br><br>

        <label for="subtitle">Subtitle:</label><br>
        <input type="text" name="subtitle" placeholder="subtitle"><br><br>

        <label for="description">Description:</label><br>
        <textarea type="text" cols="30" rows="10" name="description"></textarea><br><br>

        <label for="date">Date:</label><br>
        <input type="date" name="date"><br><br>

        <label for="rating">Rating:</label><br>
        <input type="number" name="rating"><br><br>

        <label for="category">Category:</label><br>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category -> id }}">{{ $category -> title }}</option> 
            @endforeach
        </select><br><br>

        <label for="tag">Tags:</label><br>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag -> id }}"> {{ $tag -> name }} <br>
        @endforeach
        <br>
        
        <input type="submit" value="CREATE">

    </form>
@endsection