<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        $data=[
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'excerpt' => $this->faker->sentence(),
            'published_at'=>now(),
            'slug' => $this->faker->slug(),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            ];
//        $data['slug']=Str::slug($data['title']);
        return $data;
    }
}
