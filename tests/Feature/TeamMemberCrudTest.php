<?php

namespace Tests\Feature;

use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamMemberCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_team_member_management(): void
    {
        $response = $this->get(route('admin.team-members.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_update_and_delete_team_member(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.team-members.store'), [
                'name' => 'Siti Hidayah',
                'position' => 'Associate Lawyer',
                'bio' => 'Berpengalaman menangani perkara perdata dan korporasi.',
                'photo_url' => 'https://example.com/photo.jpg',
                'facebook_url' => 'https://facebook.com/siti',
                'twitter_url' => 'https://x.com/siti',
                'whatsapp_url' => 'https://wa.me/6281234567000',
                'sort_order' => 1,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.team-members.index'));

        $teamMember = TeamMember::query()->first();

        $this->assertNotNull($teamMember);
        $this->assertSame('Siti Hidayah', $teamMember->name);

        $this->actingAs($user)
            ->put(route('admin.team-members.update', $teamMember), [
                'name' => 'Siti Hidayah Updated',
                'position' => 'Senior Associate Lawyer',
                'bio' => 'Data profil telah diperbarui.',
                'photo_url' => 'https://example.com/photo-updated.jpg',
                'facebook_url' => 'https://facebook.com/siti-updated',
                'twitter_url' => 'https://x.com/siti-updated',
                'whatsapp_url' => 'https://wa.me/6281234567001',
                'sort_order' => 2,
            ])
            ->assertRedirect(route('admin.team-members.index'));

        $teamMember->refresh();

        $this->assertSame('Siti Hidayah Updated', $teamMember->name);
        $this->assertSame('Senior Associate Lawyer', $teamMember->position);
        $this->assertFalse($teamMember->is_active);

        $this->actingAs($user)
            ->delete(route('admin.team-members.destroy', $teamMember))
            ->assertRedirect(route('admin.team-members.index'));

        $this->assertDatabaseMissing('team_members', [
            'id' => $teamMember->id,
        ]);
    }
}

