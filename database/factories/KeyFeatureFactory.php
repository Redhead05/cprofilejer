<?php

namespace Database\Factories;

use App\Models\KeyFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<KeyFeature>
 */
class KeyFeatureFactory extends Factory
{
    protected $model = KeyFeature::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => fake()->randomElement([
                'ri-bar-chart-box-ai-line',
                'ri-pie-chart-line',
                'ri-brain-2-line',
                'ri-line-chart-line',
            ]),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'sort_order' => fake()->numberBetween(1, 20),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}

