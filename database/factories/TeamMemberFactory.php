<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    protected $model = TeamMember::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->randomElement([
                'Managing Partner',
                'Senior Associate',
                'Legal Consultant',
                'Litigation Specialist',
                'Corporate Counsel',
            ]),
            'bio' => fake()->paragraph(),
            'photo_url' => 'https://images.unsplash.com/photo-'.fake()->numberBetween(1500000000000, 1700000000000).'?auto=format&fit=crop&w=600&q=80',
            'facebook_url' => fake()->optional()->url(),
            'twitter_url' => fake()->optional()->url(),
            'whatsapp_url' => fake()->optional()->url(),
            'sort_order' => fake()->numberBetween(1, 20),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}

