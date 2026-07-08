<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\FaqItem;
use App\Models\FeaturePanel;
use App\Models\KeyFeature;
use App\Models\TeamMember;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        return view('pages.analytics.index', [
            'carousels' => $this->carousels(),
            'keyFeatures' => $this->keyFeatures(),
            'featurePanels' => $this->featurePanels(),
            'teamMembers' => $this->teamMembers(),
            'faqItems' => $this->faqItems(),
        ]);
    }

    /**
     * @return Collection<int, Carousel>
     */
    private function carousels(): Collection
    {
        try {
            if (! Schema::hasTable('carousels')) {
                return collect();
            }

            return Carousel::query()
                ->where('is_active', true)
                ->ordered()
                ->get();
        } catch (\Throwable) {
            return collect();
        }
    }

    /**
     * @return Collection<int, KeyFeature>
     */
    private function keyFeatures(): Collection
    {
        try {
            if (! Schema::hasTable('key_features')) {
                return collect();
            }

            return KeyFeature::query()
                ->where('is_active', true)
                ->ordered()
                ->get();
        } catch (\Throwable) {
            return collect();
        }
    }

    /**
     * @return Collection<int, FeaturePanel>
     */
    private function featurePanels(): Collection
    {
        try {
            if (! Schema::hasTable('feature_panels')) {
                return collect();
            }

            return FeaturePanel::query()
                ->where('is_active', true)
                ->ordered()
                ->get();
        } catch (\Throwable) {
            return collect();
        }
    }

    /**
     * @return Collection<int, TeamMember>
     */
    private function teamMembers(): Collection
    {
        try {
            if (! Schema::hasTable('team_members')) {
                return collect();
            }

            return TeamMember::query()
                ->where('is_active', true)
                ->ordered()
                ->get();
        } catch (\Throwable) {
            return collect();
        }
    }

    /**
     * @return Collection<int, FaqItem>
     */
    private function faqItems(): Collection
    {
        try {
            if (! Schema::hasTable('faq_items')) {
                return collect();
            }

            return FaqItem::query()
                ->where('is_active', true)
                ->ordered()
                ->get();
        } catch (\Throwable) {
            return collect();
        }
    }
}


