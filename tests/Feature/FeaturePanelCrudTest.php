<?php

namespace Tests\Feature;

use App\Models\FeaturePanel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeaturePanelCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_feature_panel_management(): void
    {
        $response = $this->get(route('admin.feature-panels.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_update_and_delete_feature_panel(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.feature-panels.store'), [
                'eyebrow' => 'Track',
                'headline' => 'Track The Right Metrics With Zero Setup',
                'description' => 'Deskripsi awal feature panel.',
                'image' => 'features/feature1.jpg',
                'big_label' => 'Track',
                'sort_order' => 1,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.feature-panels.index'));

        $featurePanel = FeaturePanel::query()->first();

        $this->assertNotNull($featurePanel);
        $this->assertSame('Track The Right Metrics With Zero Setup', $featurePanel->headline);

        $this->actingAs($user)
            ->put(route('admin.feature-panels.update', $featurePanel), [
                'eyebrow' => 'Zoom',
                'headline' => 'Zoom Into Your Metrics At A Time',
                'description' => 'Deskripsi panel telah diperbarui.',
                'image' => 'features/feature3.jpg',
                'big_label' => 'Zoom',
                'sort_order' => 2,
            ])
            ->assertRedirect(route('admin.feature-panels.index'));

        $featurePanel->refresh();

        $this->assertSame('Zoom', $featurePanel->eyebrow);
        $this->assertSame('Zoom Into Your Metrics At A Time', $featurePanel->headline);
        $this->assertFalse($featurePanel->is_active);

        $this->actingAs($user)
            ->delete(route('admin.feature-panels.destroy', $featurePanel))
            ->assertRedirect(route('admin.feature-panels.index'));

        $this->assertDatabaseMissing('feature_panels', [
            'id' => $featurePanel->id,
        ]);
    }
}

