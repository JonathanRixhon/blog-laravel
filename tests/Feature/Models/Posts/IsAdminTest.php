<?php

use App\Models\User;
use Illuminate\Support\Str;

it('prevents an admin user to access admin of posts', function ()
{

    $response = $this->get('admin/posts');

    $response->assertStatus(403);
    $response->assertSee("This action is unauthorized.");


});

it('allows an admin user to access admin of posts', function ()
{
    //JonathanRixhon
    $user = User::create([
        'name' => "JonathanRixhon",
        'username' => "JonathanRixhon",
        'email' => "jonathan.rixhon@hotmail.com",
        'password' => bcrypt('password'),
    ]);

    actingAs($user)->get("/admin/posts")
        ->assertStatus(200)
        ->assertSee('Manage Post');
});
