<?php

namespace App\Http\Controllers;

use App\Event\CommentPosted;
use App\Http\Requests\StoreUserRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {

        $attributes = request()->validate([
            'body' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();


        $post->comments()->create($attributes);

//        CommentPosted::dispatch($attributes);
        $user=User::firstWhere('id',auth()->id());
        $user->notify(new \App\Notifications\CommentPosted($attributes));

        return back()->with('success', "Comment posted!");
    }

}


