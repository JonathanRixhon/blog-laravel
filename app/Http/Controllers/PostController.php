<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $page_title = "My Blog";


        return view('posts.index', [
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->simplePaginate(6)->withQueryString(),
            "page_title" => $page_title,
            "categories" => Category::whereHas('posts')->orderBy('name')->get(),
            "authors" => User::whereHas('posts')->orderBy('name')->get(),
        ]);
    }

    public function show(Post $post)
    {
        $post->load('category','author');
        return view('posts.show', compact(['post']));
    }
}
