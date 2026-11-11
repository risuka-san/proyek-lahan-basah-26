<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        // Gunakan updateOrCreate agar tidak error jika dijalankan 2x
        Material::updateOrCreate(
            ['level_id' => 1], // Cari berdasarkan level_id
            [
                'kode' => 'KL',
                'judul' => 'Konsep Lahan Basah',
                'sub_judul' => 'Ekosistem air dengan manfaat besar',
                'deskripsi_singkat' => 'Kenali ciri, fungsi, dan peran penting lahan basah bagi kehidupan.',
                'konten' => 'Kenali ciri, fungsi, dan peran penting lahan basah bagi kehidupan. Setiap jenis lahan basah memiliki aliran air, tumbuhan, dan satwa khas yang saling terhubung.',
                'fakta_angka' => '6%',
                'fakta_teks' => 'Permukaan Bumi berupa lahan basah',
            ]
        );
    }
}