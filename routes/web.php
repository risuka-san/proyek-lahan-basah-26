<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuisController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

// 1. Halaman Beranda (Landing Page)
Route::get('/', function () {
    return view('home'); 
});

// 2. Halaman yang butuh Login (Auth)
Route::middleware(['auth'])->group(function () {
    
    // Halaman Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Halaman Materi (Buku Digital per Sub-bab)
    Route::get('/materi/{level_id}', function ($level_id) {
        // Data Materi (Bisa dipindah ke database nanti)
        $materiList = [
            '1' => [
                'judul' => 'Konsep Lahan Basah',
                'sub_judul' => 'Ekosistem air dengan manfaat besar',
                'deskripsi_singkat' => 'Kenali ciri, fungsi, dan peran penting lahan basah bagi kehidupan.',
                'konten' => 'Kenali ciri, fungsi, dan peran penting lahan basah bagi kehidupan. Setiap jenis lahan basah memiliki aliran air, tumbuhan, dan satwa khas yang saling terhubung.',
                'fakta_angka' => '6%',
                'fakta_teks' => 'Permukaan Bumi berupa lahan basah',
            ],
            '2' => [
                'judul' => 'Rawa Pasang Surut',
                'sub_judul' => 'Mengikuti irama air laut',
                'deskripsi_singkat' => 'Lahan basah yang dipengaruhi oleh pasang surut air laut.',
                'konten' => 'Rawa pasang surut adalah lahan basah yang dipengaruhi oleh pasang surut air laut. Ekosistem ini memiliki keanekaragaman hayati yang unik dan berperan penting dalam menahan abrasi pantai.',
                'fakta_angka' => '13 Juta',
                'fakta_teks' => 'Hektar luas rawa pasang surut di Indonesia',
            ],
            '3' => [
                'judul' => 'Rawa Lebak',
                'sub_judul' => 'Tergenang saat musim hujan',
                'deskripsi_singkat' => 'Lahan basah yang tergenang air tawar pada musim hujan.',
                'konten' => 'Rawa lebak adalah lahan basah yang tergenang air tawar pada musim hujan dan mengering pada musim kemarau. Lahan ini sangat cocok untuk pertanian.',
                'fakta_angka' => 'Musiman',
                'fakta_teks' => 'Siklus genangan air rawa lebak',
            ],
            '4' => [
                'judul' => 'Rawa Gambut',
                'sub_judul' => 'Penyimpan karbon raksasa',
                'deskripsi_singkat' => 'Ekosistem penyimpan karbon yang sangat penting.',
                'konten' => 'Rawa gambut adalah ekosistem lahan basah yang terbentuk dari tumpukan bahan organik yang membusuk selama ribuan tahun. Menyimpan cadangan karbon yang sangat besar.',
                'fakta_angka' => '15%',
                'fakta_teks' => 'Karbon dunia tersimpan di lahan gambut',
            ],
            '5' => [
                'judul' => 'Lahan Mangrove',
                'sub_judul' => 'Pelindung alami pesisir',
                'deskripsi_singkat' => 'Hutan bakau yang melindungi pesisir dari abrasi.',
                'konten' => 'Lahan mangrove adalah hutan yang tumbuh di air payau, dipengaruhi oleh pasang surut air laut. Berfungsi sebagai pelindung alami pesisir dari gelombang dan abrasi.',
                'fakta_angka' => '3 Juta',
                'fakta_teks' => 'Hektar luas hutan mangrove di Indonesia',
            ]
        ];

        if (!isset($materiList[$level_id])) {
            return redirect('/materi/1');
        }

        $material = $materiList[$level_id];
        $currentId = (int)$level_id;

        return view('materi.show', compact('material', 'currentId', 'materiList'));
    })->name('materi.show');

    // Proses Selesai Baca Materi
    Route::post('/materi/selesai', function (Illuminate\Http\Request $request) {
        \App\Models\UserProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'level_id' => $request->level_id],
            ['is_completed' => true]
        );
        return redirect()->route('dashboard')->with('success', 'Level berhasil diselesaikan!');
    })->name('materi.selesai');

    // Halaman Peta Game
    Route::get('/peta-game', [DashboardController::class, 'petaGame'])->name('peta.game');

    // === ROUTE KUIS ===
    Route::get('/kuis/{level_id}', [KuisController::class, 'show'])->name('kuis.show');
    Route::post('/kuis/{level_id}/submit', [KuisController::class, 'submit'])->name('kuis.submit');

    // Route Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
        // Halaman Game 2D
    Route::get('/kuis/{level_id}/game', function ($level_id) {
        return view('kuis.game', ['level_id' => $level_id]);
    })->name('kuis.game');
}); 

// 3. Route Autentikasi Bawaan Breeze
require __DIR__.'/auth.php';