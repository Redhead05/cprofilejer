<?php

use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\FaqItemController;
use App\Http\Controllers\Admin\FeaturePanelController;
use App\Http\Controllers\Admin\KeyFeatureController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard.dashboard')->name('dashboard');
    Route::resource('team-members', TeamMemberController::class)->except('show');
    Route::resource('faq-items', FaqItemController::class)->except('show');
    Route::resource('key-features', KeyFeatureController::class)->except('show');
    Route::resource('feature-panels', FeaturePanelController::class)->except('show');
    Route::resource('carousel', CarouselController::class)->except('show');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
