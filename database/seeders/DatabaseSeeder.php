<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "JonathanRixhon",
            'username' => "jonathanrixhon",
            'email' => "jonathan.rixhon@hotmail.com",
            'password' => bcrypt('password'),
        ]);

        User::factory(4)->create();
        Category::factory(10)->create();
        Post::factory(200)->create();
        Comment::factory(1000)->create();
    }
}
