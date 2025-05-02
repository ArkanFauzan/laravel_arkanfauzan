<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/rumah-sakit');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
  Route::resource('rumah-sakit', RumahSakitController::class);
  Route::resource('pasien', PasienController::class);

  Route::get('/filter-pasien/{rumah_sakit_id}', [PasienController::class, 'filter']);

  Route::get('/ajax/rumah-sakit/search', [RumahSakitController::class, 'ajaxSearch']);
});

require __DIR__.'/auth.php';
