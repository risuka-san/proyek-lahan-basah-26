
@extends('layouts.app')

@section('content')

<style>
    .quiz-page {
        min-height: calc(100vh - 75px);
        padding: 42px 20px 65px;
        background:
            radial-gradient(circle at 8% 10%, rgba(184, 212, 184, .2), transparent 25%),
            radial-gradient(circle at 92% 85%, rgba(201, 183, 139, .15), transparent 25%),
            #F7F7F0;
        font-family: 'Nunito', sans-serif;
    }

    .quiz-container {
        width: 100%;
        max-width: 850px;
        margin: 0 auto;
    }

    .quiz-back {
        display: inline-flex;
        color: #496B55;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        margin-bottom: 25px;
        transition: .2s;
    }

    .quiz-back:hover {
        color: #183D2B;
        transform: translateX(-3px);
    }

    .quiz-header {
        text-align: center;
        margin-bottom: 28px;
    }

    .quiz-eyebrow {
        display: inline-block;
        padding: 8px 16px;
        margin-bottom: 14px;
        border-radius: 30px;
        background: #E6EFE3;
        border: 1px solid #DCE7D9;
        color: #52765B;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 1.5px;
    }

    .quiz-header h2 {
        color: #284A35;
        font-family: 'Playfair Display', serif;
        font-size: clamp(27px, 4vw, 38px);
        font-weight: 700;
        margin: 0 0 10px;
    }

    .quiz-header p {
        color: #788477;
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
    }

    .quiz-info {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 20px;
        padding: 14px 20px;
        background: #FFFFFF;
        border: 1px solid #E5EBDD;
        border-radius: 13px;
        color: #647568;
        font-size: 13px;
    }

    .quiz-info strong {
        color: #315C42;
    }

    .quiz-alert {
        padding: 14px 17px;
        margin-bottom: 18px;
        background: #FEE2E2;
        border: 1px solid #FECACA;
        border-radius: 12px;
        color: #991B1B;
        font-size: 13px;
    }

    .quiz-question-card {
        padding: 23px;
        margin-bottom: 20px;
        background: #FFFFFF;
        border: 1px solid #E5EBDD;
        border-radius: 18px;
        box-shadow: 0 7px 24px rgba(43, 76, 52, .045);
        transition: .2s ease;
    }

    .quiz-question-card:hover {
        border-color: #C7D9C4;
        box-shadow: 0 9px 26px rgba(43, 76, 52, .07);
    }

    .quiz-number {
        display: inline-block;
        padding: 6px 13px;
        margin-bottom: 12px;
        background: #E6EFE3;
        color: #315C42;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 900;
    }

    .quiz-question-card h3 {
        color: #344B3B;
        font-size: 16px;
        font-weight: 800;
        line-height: 1.7;
        margin: 0 0 18px;
    }

    .quiz-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .quiz-option {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 15px;
        background: #FAFBF8;
        border: 1.5px solid #E3E9DF;
        border-radius: 12px;
        cursor: pointer;
        transition: .2s ease;
    }

    .quiz-option:hover {
        background: #F0F5ED;
        border-color: #91B194;
    }

    .quiz-option:has(input:checked) {
        background: #EAF2E8;
        border-color: #54805D;
    }

    .quiz-option input {
        flex-shrink: 0;
        accent-color: #2D6A4F;
        transform: scale(1.2);
        margin-top: 4px;
    }

    .quiz-option span {
        color: #46584A;
        font-size: 14px;
        line-height: 1.6;
    }

    .quiz-submit {
        display: block;
        width: 100%;
        padding: 15px 20px;
        border: none;
        border-radius: 13px;
        background: #28583D;
        color: #FFFFFF;
        font-family: 'Nunito', sans-serif;
        font-size: 14px;
        font-weight: 900;
        cursor: pointer;
        box-shadow: 0 6px 16px rgba(45, 90, 63, .15);
        transition: .25s ease;
    }

    .quiz-submit:hover {
        background: #183D2B;
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .quiz-page {
            padding: 25px 13px 45px;
        }

        .quiz-question-card {
            padding: 18px;
        }

        .quiz-info {
            gap: 8px;
        }
    }
</style>

<div class="quiz-page">
    <div class="quiz-container">

        <a href="{{ route('peta.game') }}" class="quiz-back">
            ← Kembali ke Peta Petualangan
        </a>

        <header class="quiz-header">

            <div class="quiz-eyebrow">
                ✦ SIFARA LEARNING CHALLENGE
            </div>

            <h2>Tantangan {{ $level->judul }}</h2>

            <p>
                Jawab seluruh pertanyaan untuk menguji pemahamanmu
                tentang ekosistem lahan basah.
            </p>

            <div class="quiz-info">
                <span>📝 <strong>{{ $totalQuestions }} Soal</strong></span>
                <span>|</span>
                <span>🎯 Nilai minimum kelulusan:
                    <strong>{{ $passingScore }}</strong>
                </span>
            </div>

        </header>

        @if(session('error'))
            <div class="quiz-alert">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="quiz-alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('kuis.submit', $level->id) }}"
              method="POST">

            @csrf

            @foreach($questions as $index => $question)

                <div class="quiz-question-card">

                    <span class="quiz-number">
                        SOAL {{ $index + 1 }}
                    </span>

                    <h3>
                        {{ $question->pertanyaan }}
                    </h3>

                    <div class="quiz-options">

                        @foreach($question->options->sortBy('opsi') as $option)

                            <label class="quiz-option">

                                <input
                                    type="radio"
                                    name="jawaban[{{ $question->id }}]"
                                    value="{{ $option->id }}"
                                    {{ old('jawaban.' . $question->id) == $option->id ? 'checked' : '' }}
                                    required
                                >

                                <span>
                                    <strong>{{ $option->opsi }}.</strong>
                                    {{ $option->teks_jawaban }}
                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>

            @endforeach

            <button type="submit" class="quiz-submit">
                Selesaikan Kuis 🚀
            </button>

        </form>

    </div>
</div>

@endsection
