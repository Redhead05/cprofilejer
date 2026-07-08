<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturePanel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FeaturePanelController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->string('search'));

        $featurePanels = FeaturePanel::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('headline', 'like', "%{$search}%")
                    ->orWhere('eyebrow', 'like', "%{$search}%");
            })
            ->ordered()
            ->paginate(10)
            ->withQueryString();

        return view('admin.feature-panels.index', compact('featurePanels', 'search'));
    }

    public function create(): View
    {
        return view('admin.feature-panels.create', [
            'featurePanel' => new FeaturePanel(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        FeaturePanel::query()->create($this->validatedData($request));

        return redirect()
            ->route('admin.feature-panels.index')
            ->with('success', 'Feature panel berhasil ditambahkan.');
    }

    public function edit(FeaturePanel $featurePanel): View
    {
        return view('admin.feature-panels.edit', compact('featurePanel'));
    }

    public function update(Request $request, FeaturePanel $featurePanel): RedirectResponse
    {
        $featurePanel->update($this->validatedData($request));

        return redirect()
            ->route('admin.feature-panels.index')
            ->with('success', 'Feature panel berhasil diperbarui.');
    }

    public function destroy(FeaturePanel $featurePanel): RedirectResponse
    {
        $image = $featurePanel->getRawOriginal('image');

        if ($image && ! str_starts_with($image, 'features/') && ! str_starts_with($image, 'http') && Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }

        $featurePanel->delete();

        return redirect()
            ->route('admin.feature-panels.index')
            ->with('success', 'Feature panel berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'eyebrow' => ['required', 'string', 'max:255'],
            'headline' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => [$request->route('featurePanel') ? 'nullable' : 'required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'big_label' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $existingImage = $request->route('featurePanel')?->getRawOriginal('image');

            if ($existingImage && ! str_starts_with($existingImage, 'features/') && ! str_starts_with($existingImage, 'http') && Storage::disk('public')->exists($existingImage)) {
                Storage::disk('public')->delete($existingImage);
            }

            $validated['image'] = $request->file('image')->store('feature-panels', 'public');
        } elseif ($request->route('featurePanel')) {
            unset($validated['image']);
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}

