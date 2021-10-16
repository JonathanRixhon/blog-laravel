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


        return view('posts', [
            "posts" => Post::latest()->filter(request(['search']))->get(),
            "page_title" => $page_title,
            "categories" => Category::whereHas('posts')->orderBy('name')->get(),
            "authors" => User::whereHas('posts')->orderBy('name')->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', compact(['post']));

    }
}
