<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\CommentPosted;

it('has send a mail', function ()
{
    $post = Post::create([
        [
            'user_id' => 1,
            'category_id' => 1,
        ]
    ]);

    $user = User::create([
        'name' => "JonathanRixhon",
        'username' => "JonathanRixhon",
        'email' => "jonathan.rixhon@hotmail.com",
        'password' => bcrypt('password'),
    ]);

    $this->actingAs($user)->post('/posts/' . $post->id . '/comments')
        ->assertStatus(200);

});

