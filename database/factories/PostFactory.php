<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            // 'title' => $this->faker->text(10),
            // 'body' => $this->faker->text(100)
            'title' => 'My Title',
            'body' => 'My Body',
            'user_id' => User::where('id' , rand(1 ,5))->first()->id,
        ];
    }
}
