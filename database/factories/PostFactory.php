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
    public function definition(): array
    {
        $categoryRand=Category::all()->count();

        $data = [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'excerpt' => $this->faker->sentence(),
            'published_at' => now(),
            'category_id' => Category::where('id',rand(1,$categoryRand))->first(),
            'user_id' => User::where('id',rand(1,4))->first(),
        ];

        if (rand(0,100)>98){
            $data['category_id']=Category::factory();
        }

        $data['slug']=Str::slug($data['title']);
        return $data;
    }
}
