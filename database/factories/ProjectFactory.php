<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->name(30);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraph(),
            'image' => fake()->imageUrl(250, 250, 'animals', true),
        ];
    }
}
