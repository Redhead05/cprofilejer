<?php

namespace Database\Factories;

use App\Models\Carousel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Carousel>
 */
class CarouselFactory extends Factory
{
    protected $model = Carousel::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'description' => fake()->paragraph(),
            'image' => 'assets/images/analytics/banner.png',
            'link' => fake()->optional()->url(),
            'order' => fake()->numberBetween(0, 20),
            'is_active' => true,
        ];
    }
}

