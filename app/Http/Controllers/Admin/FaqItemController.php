<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqItemController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->string('search'));

        $faqItems = FaqItem::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('question', 'like', "%{$search}%");
            })
            ->ordered()
            ->paginate(10)
            ->withQueryString();

        return view('admin.faq-items.index', compact('faqItems', 'search'));
    }

    public function create(): View
    {
        return view('admin.faq-items.create', [
            'faqItem' => new FaqItem(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        FaqItem::query()->create($this->validatedData($request));

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(FaqItem $faqItem): View
    {
        return view('admin.faq-items.edit', compact('faqItem'));
    }

    public function update(Request $request, FaqItem $faqItem): RedirectResponse
    {
        $faqItem->update($this->validatedData($request));

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(FaqItem $faqItem): RedirectResponse
    {
        $faqItem->delete();

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}

