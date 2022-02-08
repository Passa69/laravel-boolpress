<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\Tag;

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
        $tags = Tag::all();

        return view('pages.create', compact('categories', 'tags'));
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

        $post = Post::make($data);
        $category = Category::findOrFail($request -> get('category'));

        $post -> category() -> associate($category);
        $post -> save();

        $tag = Tag::findOrFail($request -> get('tag'));
        $post -> tag() -> attach($tags);
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
