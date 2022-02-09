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

        $tags = [];
        try {

            $tag = Tag::findOrFail($request -> get('tag'));
        } catch (\Exception $e) {}

        $post -> tag() -> attach($tags);
        $post -> save();

        // dd($post);

        return redirect() -> route('index', $post -> id);
    }

    public function edit($id) {

        $categories = Category::all();
        $tags = Tag::all();

        $post = Post::findOrFail($id);

        return view('pages.edit', compact('categories', 'tags', 'post'));
    }
    public function update(Request $request, $id) {

        $data = $request -> validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' =>'nullable|string|max:255',
            'date' => 'required|date',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $post = Post::findOrFail($id);
        $post -> update($data);

        $category = Category::findOrFail($request -> get('category'));
        $post -> category() -> associate($category);
        $post -> save();

        // metodo 1
        $tags = [];
        try {

            $tag = Tag::findOrFail($request -> get('tag'));
        } catch (\Exception $e) {}

        // metodo 2
        // if ($request -> has('tags'))
        //     $tag = Tag::findOrFail($request -> get('tag'));

        $post -> tag() -> sync($tags);
        $post -> save();

        return redirect() -> route('index', $post -> id);
    }

    public function delete($id) {

        $post = Post::findOrFail($id);
        $post -> tags() -> sync([]);
        $post -> save();

        $post -> delete();

        return redirect() -> route('home');
    }
}
