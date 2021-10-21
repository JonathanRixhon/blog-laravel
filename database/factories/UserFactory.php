<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique->name();
        $data = [
            'name' => $name,
            'username' => Str::slug($name),
            'email' => $this->faker->safeEmail(),
            'password' => bcrypt('password'),
        ];
        //$data['slug'] = Str::slug($data['name'] . Str::random());
        return $data;
    }
}
