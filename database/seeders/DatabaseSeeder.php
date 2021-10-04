<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Post::factory(10)->create();
        //USER//
//        User::create([
//            'name' => 'Jonathan',
//            'slug' => 'jonathan',
//            'email' => 'jonathan.rixhon@hotmail.com',
//            'password' => bcrypt('Jonathan'),
//        ]);
//        User::create([
//            'name' => 'Grégori',
//            'slug' => 'gregori',
//            'email' => 'gregori.rixhon@hotmail.com',
//            'password' => bcrypt('Gregori'),
//        ]);

        //CATEGORY//
//        $home = Category::create([
//            'name' => 'Home',
//            'slug' => 'home'
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);

        //POST//
//        Post::create([
//            'title' => 'Mon premier post',
//            'body' => 'un super contenu',
//            'excerpt' => 'description du post',
//            'slug' => 'mon-post-1',
//            'published_at' => now(),
//            'category_id' => $work->id,
//            'user_id' => User::where('email', 'gregori.rixhon@hotmail.com')->first()->id,
//        ]);
//        Post::create([
//            'title' => 'Mon Deuxième post',
//            'body' => 'un super contenu',
//            'excerpt' => 'description du post',
//            'slug' => 'mon-post-2',
//            'published_at' => now(),
//            'category_id' => $home->id,
//            'user_id' => User::where('email', 'jonathan.rixhon@hotmail.com')->first()->id,
//
//        ]);
//        Post::create([
//            'title' => 'Mon troisième post',
//            'body' => 'un super contenu',
//            'excerpt' => 'description du post',
//            'slug' => 'mon-post-3',
//            'published_at' => now(),
//            'category_id' => $family->id,
//            'user_id' => User::where('email', 'jonathan.rixhon@hotmail.com')->first()->id,
//        ]);
//        Post::create([
//            'title' => 'Mon quatrième post',
//            'body' => 'un super contenu',
//            'excerpt' => 'description du post',
//            'slug' => 'mon-post-4',
//            'published_at' => now(),
//            'category_id' => $home->id,
//            'user_id' => User::where('email', 'jonathan.rixhon@hotmail.com')->first()->id,
//        ]);
//        Post::create([
//            'title' => 'Mon cinquème post',
//            'body' => 'un super contenu',
//            'excerpt' => 'description du post',
//            'slug' => 'mon-post-5',
//            'published_at' => now(),
//            'category_id' => $home->id,
//            'user_id' => User::where('email', 'gregori.rixhon@hotmail.com')->first()->id,
//        ]);
//        Post::create([
//            'title' => 'Un post sur la famille',
//            'body' => 'un super contenu',
//            'excerpt' => 'description du post',
//            'slug' => 'mon-post-6',
//            'published_at' => now(),
//            'category_id' => $family->id,
//            'user_id' => User::where('email', 'jonathan.rixhon@hotmail.com')->first()->id,
//        ]);
//        Post::create([
//            'title' => 'Un post sur le travail',
//            'body' => 'un super contenu',
//            'excerpt' => 'description du post',
//            'slug' => 'mon-post-7',
//            'published_at' => now(),
//            'category_id' => $work->id,
//            'user_id' => User::where('email', 'gregori.rixhon@hotmail.com')->first()->id,
//        ]);


    }
}
