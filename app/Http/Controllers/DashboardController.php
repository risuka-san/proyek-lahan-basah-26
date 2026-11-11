<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Mengambil data level beserta status pembelajaran pengguna.
     */
    private function getLevels()
    {
        $userId = Auth::id();

        // Ambil ID level yang sudah diselesaikan pengguna.
        $completedLevels = UserProgress::where('user_id', $userId)
            ->where('is_completed', true)
            ->pluck('level_id')
            ->toArray();

        // Ambil data level langsung dari database.
        $levels = Level::orderBy('urutan')
            ->get();

        // Tentukan status setiap level.
        foreach ($levels as $index => $level) {
            if (in_array($level->id, $completedLevels)) {
                $level->status = 'Selesai';
            } elseif (
                $index === 0 ||
                in_array($levels[$index - 1]->id, $completedLevels)
            ) {
                $level->status = 'Terbuka';
            } else {
                $level->status = 'Terkunci';
            }

            // URL menuju halaman materi.
            $level->url = url('/materi/' . $level->id);

            // Samakan nama atribut dengan yang mungkin digunakan Blade.
            $level->desc = $level->deskripsi;
            $level->bg = $level->warna;
        }

        return $levels;
    }

    /**
     * Menampilkan dashboard pengguna.
     */
    public function index()
    {
        $levels = $this->getLevels();

        return view('dashboard', compact('levels'));
    }

    /**
     * Menampilkan peta game pembelajaran.
     */
    public function petaGame()
    {
        $levels = $this->getLevels();

        return view('peta-game', compact('levels'));
    }
}
