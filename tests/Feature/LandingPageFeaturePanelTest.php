<?php

namespace Tests\Feature;

use App\Models\FeaturePanel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageFeaturePanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_displays_only_active_feature_panels(): void
    {
        $activePanel = FeaturePanel::factory()->create([
            'headline' => 'Active Feature Panel',
            'is_active' => true,
        ]);

        $inactivePanel = FeaturePanel::factory()->inactive()->create([
            'headline' => 'Inactive Feature Panel',
        ]);

        $response = $this->get(route('landing'));

        $response->assertOk();
        $response->assertSee($activePanel->headline);
        $response->assertDontSee($inactivePanel->headline);
    }
}

