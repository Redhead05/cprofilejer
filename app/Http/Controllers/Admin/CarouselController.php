<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreCarouselRequest;
use App\Http\Requests\Admin\UpdateCarouselRequest;
use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CarouselController extends Controller
{
    public function index(): View
    {
        $carousels = Carousel::query()
            ->ordered()
            ->get();

        return view('admin.carousel.index', compact('carousels'));
    }

    public function create(): View
    {
        return view('admin.carousel.create', [
            'carousel' => new Carousel(),
        ]);
    }

    public function store(StoreCarouselRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('carousels', $filename, 'public');
            $data['image'] = $path;
        }

        Carousel::create($data);

        return redirect()
            ->route('admin.carousel.index')
            ->with('success', 'Carousel berhasil ditambahkan.');
    }

    public function edit(Carousel $carousel): View
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(UpdateCarouselRequest $request, Carousel $carousel): RedirectResponse
    {
        $data = $request->validated();
        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $oldImage = $carousel->getRawOriginal('image');

            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('carousels', $filename, 'public');
            $data['image'] = $path;
        }

        $carousel->update($data);

        return redirect()
            ->route('admin.carousel.index')
            ->with('success', 'Carousel berhasil diperbarui.');
    }

    public function destroy(Carousel $carousel): RedirectResponse
    {
        $image = $carousel->getRawOriginal('image');

        if ($image && Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }

        $carousel->delete();

        return redirect()
            ->route('admin.carousel.index')
            ->with('success', 'Carousel berhasil dihapus.');
    }
}
