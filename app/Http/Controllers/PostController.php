<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $page_title = "My Blog";


        return view('posts.index', [
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->simplePaginate(6)->withQueryString(),
            "page_title" => $page_title,
            "categories" => Category::whereHas('posts')->orderBy('name')->get(),
            "authors" => User::whereHas('posts')->orderBy('name')->get(),
        ]);
    }

    public function show(Post $post)
    {
        $post->load('category', 'author', 'comments');
        return view('posts.show', compact(['post']));
    }

    public function create(Post $post)
    {
        return view('posts.create');
    }

    public function store()
    {
        
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id']=auth()->id();
        $attributes['slug']=Str::slug($attributes['title']);
        $attributes['published_at']=now('Europe/Brussels');



        $post=Post::create($attributes);
        return redirect('/posts/'.$post->slug)->with('success',"Post as been created and published");
    }
}
