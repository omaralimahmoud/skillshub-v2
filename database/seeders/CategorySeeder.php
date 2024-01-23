<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(5)->has(
            Skill::factory()->has(
                Exam::factory()->has(
                    Question::factory()->count(15),
                )->count(2)
            )->count(8)
        )->create();
    }
}
