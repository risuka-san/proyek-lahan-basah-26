
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Beranda
Route::get('/', function () {
    return view('home');
});

// 2. Halaman yang membutuhkan login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Halaman Materi
    Route::get('/materi/{level_id}/{material_id?}', [
        MaterialController::class,
        'show'
    ])->name('materi.show');

    // Peta Game
    Route::get('/peta-game', [DashboardController::class, 'petaGame'])
        ->name('peta.game');

    // Halaman Kuis
    Route::get('/kuis/{level_id}', [KuisController::class, 'show'])
        ->name('kuis.show');

    // Proses Jawaban Kuis
    Route::post('/kuis/{level_id}/submit', [KuisController::class, 'submit'])
        ->name('kuis.submit');

    // Profile Laravel Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Game 2D
    Route::get('/kuis/{level_id}/game', function ($level_id) {
        return view('kuis.game', ['level_id' => $level_id]);
    })->name('kuis.game');
});

// 3. Route Autentikasi Laravel Breeze
require __DIR__ . '/auth.php';
