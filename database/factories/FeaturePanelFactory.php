<?php

namespace Database\Factories;

use App\Models\FeaturePanel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FeaturePanel>
 */
class FeaturePanelFactory extends Factory
{
    protected $model = FeaturePanel::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eyebrow' => fake()->randomElement(['Track', 'Optimized', 'Zoom']),
            'headline' => fake()->sentence(6),
            'description' => fake()->paragraph(),
            'image' => fake()->randomElement([
                'features/feature1.jpg',
                'features/feature2.jpg',
                'features/feature3.jpg',
            ]),
            'big_label' => fake()->randomElement(['Track', 'Optimize', 'Zoom']),
            'sort_order' => fake()->numberBetween(1, 20),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}

