<?php

namespace Database\Seeders;

use App\Models\KeyFeature;
use Illuminate\Database\Seeder;

class KeyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'icon' => 'ri-bar-chart-box-ai-line',
                'title' => 'Customizable Dashboard',
                'description' => 'Design your own workspace with drag-and-drop widgets, charts, and KPIs.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'ri-pie-chart-line',
                'title' => 'Real-Time Data Monitoring',
                'description' => 'Track metrics as they happen with live dashboards.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'ri-brain-2-line',
                'title' => 'AI-Powered Insights',
                'description' => 'Automatically detect trends, anomalies, and opportunities.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => 'ri-line-chart-line',
                'title' => 'Predictive Analytics',
                'description' => 'Forecast future trends and performance with confidence using tools.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($features as $feature) {
            KeyFeature::query()->updateOrCreate(
                ['title' => $feature['title']],
                $feature,
            );
        }
    }
}

