<?php

namespace Tests\Feature;

use App\Models\FaqItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqItemCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_faq_management(): void
    {
        $response = $this->get(route('admin.faq-items.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_update_and_delete_faq_item(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.faq-items.store'), [
                'question' => 'Bagaimana cara konsultasi?',
                'answer' => 'Anda dapat menghubungi kami melalui form kontak atau WhatsApp resmi kami.',
                'sort_order' => 1,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.faq-items.index'));

        $faqItem = FaqItem::query()->first();

        $this->assertNotNull($faqItem);
        $this->assertSame('Bagaimana cara konsultasi?', $faqItem->question);

        $this->actingAs($user)
            ->put(route('admin.faq-items.update', $faqItem), [
                'question' => 'Bagaimana cara konsultasi online?',
                'answer' => 'Konsultasi dapat dijadwalkan secara online melalui admin kami.',
                'sort_order' => 2,
            ])
            ->assertRedirect(route('admin.faq-items.index'));

        $faqItem->refresh();

        $this->assertSame('Bagaimana cara konsultasi online?', $faqItem->question);
        $this->assertFalse($faqItem->is_active);

        $this->actingAs($user)
            ->delete(route('admin.faq-items.destroy', $faqItem))
            ->assertRedirect(route('admin.faq-items.index'));

        $this->assertDatabaseMissing('faq_items', [
            'id' => $faqItem->id,
        ]);
    }
}

