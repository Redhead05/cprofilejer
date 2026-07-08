<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Aulia Pratama',
                'position' => 'Managing Partner',
                'bio' => 'Memimpin strategi hukum perusahaan dengan fokus pada perkara perdata, bisnis, dan litigasi bernilai tinggi.',
                'photo_url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                'facebook_url' => 'https://facebook.com/',
                'twitter_url' => 'https://x.com/',
                'whatsapp_url' => 'https://wa.me/6281234567890',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Nadia Rahma',
                'position' => 'Senior Legal Associate',
                'bio' => 'Berpengalaman menangani sengketa korporasi dan memberikan pendampingan hukum yang cepat serta terukur.',
                'photo_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=600&q=80',
                'facebook_url' => 'https://facebook.com/',
                'twitter_url' => 'https://x.com/',
                'whatsapp_url' => 'https://wa.me/6281234567891',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Rizky Mahendra',
                'position' => 'Litigation Specialist',
                'bio' => 'Fokus pada strategi sidang, negosiasi, dan penyelesaian sengketa untuk kebutuhan individu maupun korporasi.',
                'photo_url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=600&q=80',
                'facebook_url' => 'https://facebook.com/',
                'twitter_url' => 'https://x.com/',
                'whatsapp_url' => 'https://wa.me/6281234567892',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::query()->updateOrCreate(
                ['name' => $member['name']],
                $member,
            );
        }
    }
}

