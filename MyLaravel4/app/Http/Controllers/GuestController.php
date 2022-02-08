<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

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

        $categories = Category::all();

        return view('pages.create', compact('categories'));
    }
    public function store(Request $request) {

        $data = $request -> validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' =>'nullable|string|max:255',
            'date' => 'required|date',
            'rating' => 'required|integer|min:0|max:5',
        ]);
        $data['author'] = Auth::user() -> name;

        $post = Post::make($data);
        $category = Category::findOrFail($request -> get('category'));

        $post -> category() -> associate($category);
        $post -> save();

        // dd($post);

        return redirect() -> route('index', $post -> id);
    }

    public function delete($id) {

        $post = Post::findOrFail($id);

        $post -> delete();

        return redirect() -> route('home');
    }
}
