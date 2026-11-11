<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function show($level_id)
    {
        // Dummy Soal (Nanti bisa diambil dari database tabel questions)
        $soal = [
            'pertanyaan' => 'Berapa persen permukaan Bumi yang berupa lahan basah?',
            'pilihan' => [
                'A' => '10%',
                'B' => '6%',
                'C' => '25%',
                'D' => '50%'
            ],
            'jawaban_benar' => 'B'
        ];

        return view('kuis.show', compact('soal', 'level_id'));
    }

    public function submit(Request $request, $level_id)
    {
        // Logika pengecekan jawaban
        $jawabanUser = $request->input('jawaban');
        
        if ($jawabanUser == 'B') {
            // Jika benar, simpan progres (Sama seperti tombol Selesai Dibaca)
            \App\Models\UserProgress::updateOrCreate(
                ['user_id' => \Illuminate\Support\Facades\Auth::id(), 'level_id' => $level_id],
                ['is_completed' => true]
            );
            return redirect()->route('peta.game')->with('success', 'Hebat! Jawabanmu benar. Level selanjutnya terbuka!');
        } else {
            // Jika salah, kembalikan ke halaman kuis dengan pesan error
            return redirect()->back()->with('error', 'Yah, jawabanmu kurang tepat. Coba baca materinya lagi ya!');
        }
    }
}