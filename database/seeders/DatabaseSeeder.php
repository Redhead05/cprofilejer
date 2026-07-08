<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')],
        );

        $this->call(TeamMemberSeeder::class);
        $this->call(FaqItemSeeder::class);
        $this->call(KeyFeatureSeeder::class);
        $this->call(FeaturePanelSeeder::class);
        $this->call(CarouselSeeder::class);
    }
}
