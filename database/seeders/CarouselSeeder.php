<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'title' => 'Turn Data Into Decisions: Unleash The Power Of Analytics With RFJ Law Firm',
                'description' => 'Unlock the full potential of your data with cutting-edge analytics tools. Make faster, smarter decisions backed by real-time insights and intuitive dashboards.',
                'image' => 'assets/images/analytics/banner.png',
                'link' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Track Business Performance With Real-Time Legal Insights',
                'description' => 'Monitor trends, uncover opportunities, and empower your team with interactive reporting that stays current across every key metric.',
                'image' => 'assets/images/analytics/customers.png',
                'link' => null,
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            Carousel::query()->updateOrCreate(
                ['title' => $slide['title']],
                $slide,
            );
        }
    }
}

