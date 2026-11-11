<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    /**
     * Memeriksa apakah level dapat diakses pengguna.
     */
    private function checkLevelAccess($level)
    {
        $levels = Level::orderBy('urutan')->get();

        $currentIndex = $levels->search(
            fn ($item) => $item->id == $level->id
        );

        // Level pertama selalu terbuka.
        if ($currentIndex === 0) {
            return true;
        }

        // Level tidak ditemukan.
        if ($currentIndex === false) {
            return false;
        }

        // Periksa apakah level sebelumnya sudah selesai.
        $previousLevel = $levels[$currentIndex - 1];

        return UserProgress::where('user_id', Auth::id())
            ->where('level_id', $previousLevel->id)
            ->where('is_completed', true)
            ->exists();
    }

    /**
     * Menampilkan soal kuis berdasarkan level.
     */
    public function show($level_id)
    {
        $level = Level::findOrFail($level_id);

        // Periksa akses level.
        if (!$this->checkLevelAccess($level)) {
            return redirect()->route('peta.game')
                ->with('error', 'Level ini masih terkunci.');
        }

        // Ambil soal beserta pilihan jawaban dari database.
        $questions = Question::with('options')
            ->where('level_id', $level->id)
            ->orderBy('urutan')
            ->get();

        // Periksa ketersediaan soal.
        if ($questions->isEmpty()) {
            return redirect()->route('peta.game')
                ->with('error', 'Soal untuk level ini belum tersedia.');
        }

        $totalQuestions = $questions->count();
        $passingScore = 80;

        return view('kuis.show', compact(
            'level',
            'questions',
            'totalQuestions',
            'passingScore'
        ));
    }

    /**
     * Memeriksa jawaban dan menghitung nilai kuis.
     */
    public function submit(Request $request, $level_id)
    {
        $level = Level::findOrFail($level_id);

        // Periksa kembali akses level saat jawaban dikirim.
        if (!$this->checkLevelAccess($level)) {
            return redirect()->route('peta.game')
                ->with('error', 'Level ini masih terkunci.');
        }

        // Validasi format jawaban.
        $validated = $request->validate([
            'jawaban' => 'required|array',
            'jawaban.*' => 'required|integer',
        ]);

        // Ambil seluruh soal level.
        $questions = Question::with('options')
            ->where('level_id', $level->id)
            ->orderBy('urutan')
            ->get();

        if ($questions->isEmpty()) {
            return redirect()->route('peta.game')
                ->with('error', 'Soal untuk level ini belum tersedia.');
        }

        $answers = $validated['jawaban'];

        // Pastikan jumlah jawaban sesuai jumlah soal.
        if (count($answers) !== $questions->count()) {
            return back()
                ->withInput()
                ->withErrors([
                    'jawaban' => 'Semua soal wajib dijawab.',
                ]);
        }

        $correctCount = 0;

        // Periksa setiap jawaban.
        foreach ($questions as $question) {

            if (!array_key_exists($question->id, $answers)) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'jawaban' => 'Semua soal wajib dijawab.',
                    ]);
            }

            $selectedOption = $question->options
                ->firstWhere('id', (int) $answers[$question->id]);

            // Pastikan pilihan memang milik soal tersebut.
            if (!$selectedOption) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'jawaban' => 'Pilihan jawaban tidak valid.',
                    ]);
            }

            // Hitung jawaban benar.
            if ($selectedOption->is_correct) {
                $correctCount++;
            }
        }

        // Hitung nilai akhir.
        $totalQuestions = $questions->count();

        $score = round(
            ($correctCount / $totalQuestions) * 100
        );

        $passingScore = 80;

        // Jika nilai memenuhi batas kelulusan.
        if ($score >= $passingScore) {

            UserProgress::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'level_id' => $level->id,
                ],
                [
                    'is_completed' => true,
                ]
            );

            return redirect()->route('peta.game')
                ->with(
                    'success',
                    "Hebat! Nilaimu {$score}. Kamu menjawab {$correctCount} dari {$totalQuestions} soal dengan benar. Level selanjutnya terbuka!"
                );
        }

        // Jika belum lulus, progres tidak diubah.
        return redirect()->route('peta.game')
            ->with(
                'error',
                "Nilaimu {$score}. Kamu menjawab {$correctCount} dari {$totalQuestions} soal dengan benar. Nilai minimal kelulusan adalah {$passingScore}. Silakan coba lagi!"
            );
    }
}
