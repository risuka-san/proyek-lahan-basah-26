<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProgress; // Tambahkan model ini

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Ambil semua level yang sudah diselesaikan user ini
        $completedLevels = UserProgress::where('user_id', $userId)
                            ->where('is_completed', true)
                            ->pluck('level_id')
                            ->toArray();

        // Daftar Level Master
        $masterLevels = [
                        ['id' => 1, 'kode' => 'KL', 'judul' => 'Konsep & Tipologi Lahan Basah', 'desc' => 'Kenali dasar dan ragamnya', 'bg' => '#F4C430', 'url' => '/materi/1'],
            ['id' => 2, 'kode' => 'PS', 'judul' => 'Ekosistem Rawa Pasang Surut', 'desc' => 'Mengikuti irama air laut', 'bg' => '#85A98F', 'url' => '/materi/2'],
            ['id' => 3, 'kode' => 'RL', 'judul' => 'Rawa Lebak', 'desc' => 'Tergenang saat musim hujan', 'bg' => '#B8D4B8', 'url' => '/materi/3'],
            ['id' => 4, 'kode' => 'RG', 'judul' => 'Rawa Gambut', 'desc' => 'Penyimpan karbon raksasa', 'bg' => '#8B5A2B', 'url' => '/materi/4'],
            ['id' => 5, 'kode' => 'MG', 'judul' => 'Lahan Mangrove', 'desc' => 'Pelindung alami pesisir', 'bg' => '#4A7C59', 'url' => '/materi/5'],
        ];

        // Tentukan status setiap level
        foreach ($masterLevels as $key => &$level) {
            if (in_array($level['id'], $completedLevels)) {
                $level['status'] = 'Selesai';
            } elseif ($level['id'] == 1 || in_array($level['id'] - 1, $completedLevels)) {
                // Jika level 1, ATAU level sebelumnya sudah selesai -> TERBUKA
                $level['status'] = 'Terbuka';
            } else {
                $level['status'] = 'Terkunci';
            }
        }

        return view('dashboard', ['levels' => $masterLevels]);
    }

        public function petaGame()
    {
        $userId = Auth::id();

        // Ambil level yang sudah selesai
        $completedLevels = UserProgress::where('user_id', $userId)
                            ->where('is_completed', true)
                            ->pluck('level_id')
                            ->toArray();

        // Data Level dengan warna latar belakang (untuk ilustrasi CSS)
        $levels = [
            ['id' => 1, 'kode' => 'KL', 'judul' => 'Konsep & Tipologi Lahan Basah', 'desc' => 'Kenali dasar dan ragamnya', 'bg' => '#F4C430', 'url' => '/materi/1'],
            ['id' => 2, 'kode' => 'PS', 'judul' => 'Ekosistem Rawa Pasang Surut', 'desc' => 'Mengikuti irama air laut', 'bg' => '#85A98F', 'url' => '/materi/2'],
            ['id' => 3, 'kode' => 'RL', 'judul' => 'Rawa Lebak', 'desc' => 'Tergenang saat musim hujan', 'bg' => '#B8D4B8', 'url' => '/materi/3'],
            ['id' => 4, 'kode' => 'RG', 'judul' => 'Rawa Gambut', 'desc' => 'Penyimpan karbon raksasa', 'bg' => '#8B5A2B', 'url' => '/materi/4'],
            ['id' => 5, 'kode' => 'MG', 'judul' => 'Lahan Mangrove', 'desc' => 'Pelindung alami pesisir', 'bg' => '#4A7C59', 'url' => '/materi/5'],
        ];

        // Tentukan Status
        foreach ($levels as &$level) {
            if (in_array($level['id'], $completedLevels)) {
                $level['status'] = 'Selesai';
            } elseif ($level['id'] == 1 || in_array($level['id'] - 1, $completedLevels)) {
                $level['status'] = 'Terbuka';
            } else {
                $level['status'] = 'Terkunci';
            }
        }

        return view('peta-game', ['levels' => $levels]);
    }
}