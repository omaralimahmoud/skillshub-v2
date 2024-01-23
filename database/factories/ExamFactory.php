<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $i = 0;
        $i++;

        return [
            'name' => [
                'en' => fake()->word(),
                'ar' => fake()->word(),
            ],

            'description' => [
                'en' => fake()->text(5000),
                'ar' => fake()->text(5000),
            ],
            'image' => "exams/$i.png",
            'question_number' => 15,
            'difficulty' => fake()->numberBetween(1, 5),
            'duration_minutes' => fake()->numberBetween(1, 3) * 30,

        ];
    }
}
