<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KeyFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KeyFeatureController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->string('search'));

        $keyFeatures = KeyFeature::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->ordered()
            ->paginate(10)
            ->withQueryString();

        return view('admin.key-features.index', compact('keyFeatures', 'search'));
    }

    public function create(): View
    {
        return view('admin.key-features.create', [
            'keyFeature' => new KeyFeature(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        KeyFeature::query()->create($this->validatedData($request));

        return redirect()
            ->route('admin.key-features.index')
            ->with('success', 'Key feature berhasil ditambahkan.');
    }

    public function edit(KeyFeature $keyFeature): View
    {
        return view('admin.key-features.edit', compact('keyFeature'));
    }

    public function update(Request $request, KeyFeature $keyFeature): RedirectResponse
    {
        $keyFeature->update($this->validatedData($request));

        return redirect()
            ->route('admin.key-features.index')
            ->with('success', 'Key feature berhasil diperbarui.');
    }

    public function destroy(KeyFeature $keyFeature): RedirectResponse
    {
        $keyFeature->delete();

        return redirect()
            ->route('admin.key-features.index')
            ->with('success', 'Key feature berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'icon' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}

