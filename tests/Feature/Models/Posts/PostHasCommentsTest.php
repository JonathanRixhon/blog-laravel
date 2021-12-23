<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

it('allows posts to have comments', function ()
{
    //Arrange
    $comment = Comment::factory()->count(1);
    $post = Post::factory()
        ->has($comment)
        ->create();


    //Act

    //Assert
    $this->assertModelExists($post);
    $this->assertCount(1, $post->comments);
    $this->assertTrue($post->hasComments());

    expect($post->hasComments())->toBe(true);
});
