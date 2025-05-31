<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdoptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landingPage', function () {
    return view('landingPage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
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

require __DIR__.'/auth.php';