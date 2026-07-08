<?php

namespace Tests\Feature;

use App\Models\KeyFeature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KeyFeatureCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_key_feature_management(): void
    {
        $response = $this->get(route('admin.key-features.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_update_and_delete_key_feature(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.key-features.store'), [
                'icon' => 'ri-line-chart-line',
                'title' => 'Advanced Insights',
                'description' => 'Fitur analitik lanjutan untuk kebutuhan bisnis.',
                'sort_order' => 1,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.key-features.index'));

        $keyFeature = KeyFeature::query()->first();

        $this->assertNotNull($keyFeature);
        $this->assertSame('Advanced Insights', $keyFeature->title);

        $this->actingAs($user)
            ->put(route('admin.key-features.update', $keyFeature), [
                'icon' => 'ri-brain-2-line',
                'title' => 'Advanced Insights Updated',
                'description' => 'Fitur analitik lanjutan yang sudah diperbarui.',
                'sort_order' => 2,
            ])
            ->assertRedirect(route('admin.key-features.index'));

        $keyFeature->refresh();

        $this->assertSame('Advanced Insights Updated', $keyFeature->title);
        $this->assertFalse($keyFeature->is_active);

        $this->actingAs($user)
            ->delete(route('admin.key-features.destroy', $keyFeature))
            ->assertRedirect(route('admin.key-features.index'));

        $this->assertDatabaseMissing('key_features', [
            'id' => $keyFeature->id,
        ]);
    }
}

