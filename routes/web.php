<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdoptController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Dashboard (hanya bisa diakses kalau sudah login & verifikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route yang butuh login
Route::middleware('auth')->group(function () {
    // === Profile ===
    Route::get('/profile', [ProfileController::class, 'home'])->name('profile.home');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/adopt', [AdoptController::class, 'showAllCategories'])
         ->name('adopt.index');

    // 2. Adoption Category
    Route::get('/adopt/category', [AdoptController::class, 'showAllCategories'])
         ->name('adopt.category.index');

    Route::get('/adopt/category/{type}', [AdoptController::class, 'category'])
         ->whereIn('type', ['cat', 'dog', 'bird', 'rabbit'])
         ->name('adopt.category.show');

    Route::get('/adopt/search', [AdoptController::class, 'search'])
         ->name('adopt.search');

    // 3. Adoption Status
    Route::get('/adopt/status', [AdoptController::class, 'adoptionStatus'])
         ->name('adopt.status');

    // 4. Help Me Find a Home
    Route::get('/adopt/help-me-find-home', [AdoptController::class, 'helpMeAFindHome'])
         ->name('adopt.help');

    // 5. Detail Hewan
    Route::get('/adopt/detail/{id}', [AdoptController::class, 'show'])
         ->name('adopt.detail');
     Route::get('/adopt/form', [AdoptController::class, 'showGeneralForm'])
         ->name('adopt.form');
     Route::post('/adopt/form', [AdoptController::class, 'submitGeneralForm'])
         ->name('adopt.form.submit');
     Route::get('/adopt/thankyou', [AdoptController::class, 'thankYou'])
         ->name('adopt.thankyou');
});

// === DONASI ===
// Tampilkan form donasi
Route::get('/donasi', [DonationController::class, 'showForm'])->name('donation.form');

// Submit form donasi
Route::post('/donasi', [DonationController::class, 'submitDonation'])->name('donation.submit');

// Tampilkan instruksi pembayaran (berdasarkan ID donasi)
Route::get('/donasi/instruksi/{id}', [DonationController::class, 'showInstructions'])->name('donation.instructions');

// Callback/payment notification dari payment gateway
Route::post('/donasi/notify', [DonationController::class, 'paymentNotification'])->name('donation.notify');

// Halaman pembayaran sukses
Route::get('/donasi/sukses/{id}', [DonationController::class, 'success'])->name('donation.success');

// Route untuk testing - Simulasi pembayaran sukses
Route::get('/donasi/test-payment/{id}', [DonationController::class, 'simulatePayment'])->name('donation.test-payment');


require __DIR__.'/auth.php';
