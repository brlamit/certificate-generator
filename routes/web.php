<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CertificateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/test-signature', [App\Http\Controllers\CertificateController::class, 'testSignature']);
  Route::get('/certificates/form', [CertificateController::class, 'showForm'])->name('certificate.form');
Route::post('/certificates/generate', [CertificateController::class, 'generate'])->name('certificate.generate');
Route::post('/certificates/generate-multiple', [CertificateController::class, 'generateMultiple'])->name('certificate.generateMultiple');
});

require __DIR__.'/auth.php';
