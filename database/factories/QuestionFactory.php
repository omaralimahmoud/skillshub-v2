<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'option_1' => fake()->sentence(5, true),
            'option_2' => fake()->sentence(5, true),
            'option_3' => fake()->sentence(5, true),
            'option_4' => fake()->sentence(5, true),
            'right_answer' => fake()->numberBetween(1, 4),
        ];
    }
}
