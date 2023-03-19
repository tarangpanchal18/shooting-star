<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exhibition>
 */
class ExhibitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(5),
            'category_id' => Category::factory()->create(),
            'short_description' => fake()->sentence(10),
            'description' => fake()->paragraph(100),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'status' => 'Active',
        ];
    }
}
