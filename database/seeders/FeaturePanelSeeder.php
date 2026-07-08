<?php

namespace Database\Seeders;

use App\Models\FeaturePanel;
use Illuminate\Database\Seeder;

class FeaturePanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $panels = [
            [
                'eyebrow' => 'Track',
                'headline' => 'Track The Right Metrics With Zero Setup',
                'description' => 'Start measuring what matters from day one—no configuration needed. Our intelligent platform auto-detects key metrics tailored to your business.',
                'image' => 'features/feature1.jpg',
                'big_label' => 'Track',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'eyebrow' => 'OPTIMIZED',
                'headline' => 'Optimized To Measure Companies',
                'description' => 'Purpose-built for companies of all sizes, our analytics platform adapts to your unique needs. Effortlessly measure performance, optimize workflows, and gain actionable insights—no manual setup required.',
                'image' => 'features/feature2.jpg',
                'big_label' => 'Optimize',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'eyebrow' => 'Zoom',
                'headline' => 'Zoom Into Your Metrics At A Time',
                'description' => 'Dive deep into your analytics with interactive charts and filters. Instantly focus on the data that matters most to your business, at any time.',
                'image' => 'features/feature3.jpg',
                'big_label' => 'Zoom',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($panels as $panel) {
            FeaturePanel::query()->updateOrCreate(
                ['headline' => $panel['headline']],
                $panel,
            );
        }
    }
}

