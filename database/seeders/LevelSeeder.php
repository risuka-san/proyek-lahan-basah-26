<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            [
                'kode' => 'KL',
                'judul' => 'Konsep & Tipologi Lahan Basah',
                'deskripsi' => 'Kenali dasar dan ragam lahan basah.',
                'warna' => '#F4C430',
                'urutan' => 1,
            ],
            [
                'kode' => 'PS',
                'judul' => 'Ekosistem Rawa Pasang Surut',
                'deskripsi' => 'Mengikuti irama air laut.',
                'warna' => '#85A98F',
                'urutan' => 2,
            ],
            [
                'kode' => 'RL',
                'judul' => 'Rawa Lebak',
                'deskripsi' => 'Tergenang saat musim hujan.',
                'warna' => '#B8D4B8',
                'urutan' => 3,
            ],
            [
                'kode' => 'RG',
                'judul' => 'Rawa Gambut',
                'deskripsi' => 'Penyimpan karbon raksasa.',
                'warna' => '#8B5A2B',
                'urutan' => 4,
            ],
            [
                'kode' => 'MG',
                'judul' => 'Lahan Mangrove',
                'deskripsi' => 'Pelindung alami pesisir.',
                'warna' => '#4A7C59',
                'urutan' => 5,
            ],
        ];

        foreach ($levels as $level) {
            Level::updateOrCreate(
                ['kode' => $level['kode']],
                $level
            );
        }
    }
}
