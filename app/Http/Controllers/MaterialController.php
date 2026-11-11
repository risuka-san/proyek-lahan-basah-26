<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Menampilkan materi berdasarkan level.
     *
     * Jika material_id tidak diberikan,
     * sistem akan membuka materi pertama.
     */
    public function show($level_id, $material_id = null)
    {
        // Ambil data level beserta seluruh materinya.
        $level = Level::with(['materials' => function ($query) {
            $query->orderBy('id');
        }])->findOrFail($level_id);

        // Daftar materi hanya dari level yang sedang dibuka.
        $materials = $level->materials;

        // Periksa apakah level sudah memiliki materi.
        if ($materials->isEmpty()) {
            return view('materi.empty', compact('level'));
        }

        // Jika ID materi tidak diberikan, buka materi pertama.
        if ($material_id === null) {
            $material = $materials->first();
        } else {
            // Pastikan materi memang termasuk level tersebut.
            $material = $materials->firstWhere('id', (int) $material_id);

            if (!$material) {
                abort(404, 'Materi tidak ditemukan pada level ini.');
            }
        }

        // Tentukan posisi materi aktif.
        $currentIndex = $materials->search(
            fn ($item) => $item->id === $material->id
        );

        // Materi sebelumnya dan berikutnya.
        $previousMaterial = $currentIndex > 0
            ? $materials[$currentIndex - 1]
            : null;

        $nextMaterial = $currentIndex < $materials->count() - 1
            ? $materials[$currentIndex + 1]
            : null;

        return view('materi.show', compact(
            'level',
            'materials',
            'material',
            'currentIndex',
            'previousMaterial',
            'nextMaterial'
        ));
    }
}
