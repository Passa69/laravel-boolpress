<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class GuestController extends Controller
{
    public function home() {

        $posts = Post::all();

        return view('pages.home', compact('posts'));
    }
    public function index($id) {

        $post = Post::findOrFail($id);

        return view('pages.index', compact('post'));
    }

    public function create() {

        return view('pages.create');
    }
    public function store(Request $request, $id) {

        $data = $request -> validate([
            'title' => 'required|string|max:255|unique:series,title,' . $id,
            'author' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255|unique:series,title,' . $id,
            'description' =>'nullable|string|max:255',
            'date' => 'required|date',
            'rating' => 'required|integer|min:0|max:5'
        ]);

        $post = Post::create($data);

        return redirect() -> route('index', $post -> id);
    }
}
