<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $instructor_id = Instructor::inRandomOrder()->pluck('id')->first();
        $created_by_user_id = Instructor::find($instructor_id)->created_by_user_id;
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(0, 100),
            'instructor_id' => $instructor_id,
            'created_by_user_id' => $created_by_user_id
        ];
    }
}
