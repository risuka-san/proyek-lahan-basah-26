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
                'kode' => 'BIO',
                'judul' => 'Biosfer dan Kehidupan di Bumi',
                'deskripsi' => 'Mengenal biosfer serta hubungan kehidupan dengan lingkungan.',
                'warna' => '#6F9675',
                'urutan' => 1,
            ],
            [
                'kode' => 'BMD',
                'judul' => 'Bioma dan Persebaran Flora Fauna Dunia',
                'deskripsi' => 'Mempelajari berbagai bioma dan persebaran makhluk hidup dunia.',
                'warna' => '#85A98F',
                'urutan' => 2,
            ],
            [
                'kode' => 'FFI',
                'judul' => 'Persebaran Flora dan Fauna Indonesia',
                'deskripsi' => 'Mengenal kekayaan flora dan fauna di wilayah Indonesia.',
                'warna' => '#B8A879',
                'urutan' => 3,
            ],
            [
                'kode' => 'SDA',
                'judul' => 'Sumber Daya Alam dan Persebarannya',
                'deskripsi' => 'Memahami potensi dan persebaran sumber daya alam Indonesia.',
                'warna' => '#8B9B72',
                'urutan' => 4,
            ],
            [
                'kode' => 'PL',
                'judul' => 'Pengelolaan Lingkungan dan Pembangunan Berkelanjutan',
                'deskripsi' => 'Mempelajari pengelolaan sumber daya alam dan pelestarian lingkungan.',
                'warna' => '#4A7C59',
                'urutan' => 5,
            ],
        ];

        foreach ($levels as $index => $level) {
            Level::updateOrCreate(
                ['id' => $index + 1],
                $level
            );
        }

        // Memulai kembali progres pembelajaran Geografi.
        \App\Models\UserProgress::query()->update([
            'is_completed' => false,
        ]);
    }
}
