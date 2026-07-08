<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->string('search'));

        $teamMembers = TeamMember::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($nestedQuery) use ($search) {
                    $nestedQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('position', 'like', "%{$search}%");
                });
            })
            ->ordered()
            ->paginate(10)
            ->withQueryString();

        return view('admin.team-members.index', compact('teamMembers', 'search'));
    }

    public function create(): View
    {
        return view('admin.team-members.create', [
            'teamMember' => new TeamMember(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        TeamMember::query()->create($this->validatedData($request));

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $teamMember->update($this->validatedData($request));

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Anggota tim berhasil diperbarui.');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $photo = $teamMember->getRawOriginal('photo_url');

        if ($photo && ! str_starts_with($photo, 'http') && Storage::disk('public')->exists($photo)) {
            Storage::disk('public')->delete($photo);
        }

        $teamMember->delete();

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Anggota tim berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'photo_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'facebook_url' => ['nullable', 'url', 'max:2048'],
            'twitter_url' => ['nullable', 'url', 'max:2048'],
            'whatsapp_url' => ['nullable', 'url', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('photo_url')) {
            $existingPhoto = $request->route('teamMember')?->getRawOriginal('photo_url');

            if ($existingPhoto && ! str_starts_with($existingPhoto, 'http') && Storage::disk('public')->exists($existingPhoto)) {
                Storage::disk('public')->delete($existingPhoto);
            }

            $validated['photo_url'] = $request->file('photo_url')->store('team-members', 'public');
        } elseif ($request->route('teamMember')) {
            unset($validated['photo_url']);
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}

