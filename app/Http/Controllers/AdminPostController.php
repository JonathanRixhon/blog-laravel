<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),

        ]);
    }

    public function create(Post $post)
    {
        return view('admin.posts.create');
    }


    public function store()
    {
        $post = new Post();

        $attributes = $this->validatePost($post);

        $attributes['thumbnail_path'] = request()->file('thumbnail')?->store('thumbnails');

        unset($attributes['thumbnail']);

        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = now('Europe/Brussels');


        $post = Post::create($attributes);
        return redirect('/posts/' . $post->slug)->with('success', "Post as been created and published");
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);


        if (isset($attributes['thumbnail']))
        {
            unset($attributes['thumbnail']);
            $attributes['thumbnail_path'] = request()->file('thumbnail')?->store('thumbnails');
        }

        $post->update($attributes);
        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }

    /**
     * @param Post $post
     * @return array
     */
    public function validatePost(Post $post): array
    {
        return request()->validate([
            'title' => 'required|max:255',
            'thumbnail' => $post->exists ? ['image'] : ['required|image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }

}
