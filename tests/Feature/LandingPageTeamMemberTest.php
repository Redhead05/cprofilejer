<?php

namespace Tests\Feature;

use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTeamMemberTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_displays_only_active_team_members(): void
    {
        $activeMember = TeamMember::factory()->create([
            'name' => 'Active Member',
            'is_active' => true,
        ]);

        $inactiveMember = TeamMember::factory()->inactive()->create([
            'name' => 'Inactive Member',
        ]);

        $response = $this->get(route('landing'));

        $response->assertOk();
        $response->assertSee($activeMember->name);
        $response->assertDontSee($inactiveMember->name);
    }
}

