
@extends('layouts.app')

@section('content')
<div class="auth-wrapper" style="min-height: 70vh; padding: 30px 15px;">
    <div class="auth-modal" style="max-width: 700px; width: 100%;">

        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">

            <a href="{{ route('peta.game') }}"
               style="text-decoration: none; color: #333; font-weight: bold;">
                ← Kembali ke Peta
            </a>

            <span class="badge" style="background: var(--accent-yellow); color: #333;">
                LEVEL {{ $level->urutan }} GAME
            </span>
        </div>

        <!-- Judul Kuis -->
        <div style="margin-bottom: 25px;">
            <h2 style="font-size: 1.6rem; color: var(--primary-green); margin-bottom: 8px;">
                Tantangan {{ $level->judul }}
            </h2>

            <p style="color: #666; margin: 0;">
                Jawab semua pertanyaan untuk menyelesaikan level ini.
            </p>

            <div style="margin-top: 15px; padding: 12px; background: #F9F7ED; border-radius: 10px; color: #555;">
                <strong>{{ $totalQuestions }} Soal</strong>
                <span style="margin: 0 8px;">|</span>
                Nilai minimum kelulusan:
                <strong>{{ $passingScore }}</strong>
            </div>
        </div>

        <!-- Notifikasi Error -->
        @if(session('error'))
            <div style="background: #FEE2E2; color: #991B1B; padding: 12px; border-radius: 10px; margin-bottom: 15px;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Notifikasi Validasi -->
        @if($errors->any())
            <div style="background: #FEE2E2; color: #991B1B; padding: 12px; border-radius: 10px; margin-bottom: 15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form Kuis -->
        <form action="{{ route('kuis.submit', $level->id) }}" method="POST">
            @csrf

            @foreach($questions as $index => $question)

                <div style="margin-bottom: 25px; padding: 20px; border: 1px solid #E5E7EB; border-radius: 15px;">

                    <!-- Nomor dan Pertanyaan -->
                    <div style="margin-bottom: 18px;">
                        <span style="display: inline-block; background: var(--primary-green); color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; margin-bottom: 10px;">
                            Soal {{ $index + 1 }}
                        </span>

                        <h3 style="font-size: 1.1rem; color: #333; line-height: 1.6; margin: 0;">
                            {{ $question->pertanyaan }}
                        </h3>
                    </div>

                    <!-- Pilihan Jawaban -->
                    <div style="display: flex; flex-direction: column; gap: 10px;">

                        @foreach($question->options->sortBy('opsi') as $option)

                            <label style="display: flex; align-items: flex-start; gap: 12px; padding: 13px; border: 2px solid #E5E7EB; border-radius: 10px; cursor: pointer; transition: 0.2s;">

                                <input
                                    type="radio"
                                    name="jawaban[{{ $question->id }}]"
                                    value="{{ $option->id }}"
                                    {{ old('jawaban.' . $question->id) == $option->id ? 'checked' : '' }}
                                    required
                                    style="transform: scale(1.3); margin-top: 5px;"
                                >

                                <span style="font-size: 1rem; line-height: 1.5; color: #333;">
                                    <strong>{{ $option->opsi }}.</strong>
                                    {{ $option->teks_jawaban }}
                                </span>

                            </label>

                        @endforeach

                    </div>
                </div>

            @endforeach

            <!-- Tombol Kirim -->
            <button type="submit" class="btn-submit" style="width: 100%;">
                Selesaikan Kuis 🚀
            </button>

        </form>

    </div>
</div>
@endsection
