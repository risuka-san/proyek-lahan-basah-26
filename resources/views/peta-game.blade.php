
@extends('layouts.app')

@section('title', 'Peta Petualangan - SIFARA')

@section('content')

@php
    $completedCount = collect($levels)->where('status', 'Selesai')->count();
    $openLevel = collect($levels)->firstWhere('status', 'Terbuka');
    $totalLevels = count($levels);

    $progress = $totalLevels > 0
        ? round(($completedCount / $totalLevels) * 100)
        : 0;

    $ecosystemIcons = [
        'KL' => '🌾',
        'PS' => '🌊',
        'RL' => '🪷',
        'RG' => '🌱',
        'MG' => '🌳',
    ];

    $ecosystemDescriptions = [
        'KL' => 'Kenali konsep dasar, karakteristik, dan berbagai tipe ekosistem lahan basah.',
        'PS' => 'Jelajahi kawasan rawa yang dipengaruhi oleh perubahan pasang dan surut air.',
        'RL' => 'Pelajari rawa lebak dan dinamika genangan yang dipengaruhi hujan serta luapan sungai.',
        'RG' => 'Temukan keunikan tanah gambut, penyimpanan karbon, dan pentingnya menjaga kelembapannya.',
        'MG' => 'Kenali ekosistem mangrove, akar khasnya, dan perannya menjaga kawasan pesisir.',
    ];
@endphp

<style>
/* =========================================
   SIFARA BOTANICAL ADVENTURE MAP
========================================= */

.sifara-map {
    --forest: #183D2B;
    --green: #285E43;
    --sage: #A8C6A0;
    --mint: #D9EBDD;
    --cream: #F6F3E9;
    --gold: #EFC94C;
    --muted: #718477;

    max-width: 1440px;
    margin: auto;
    padding: 35px 50px 75px;
    color: #263D30;
}

.sifara-map * {
    box-sizing: border-box;
}

/* HEADER */

.map-header {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 42px 45px;
    margin-bottom: 30px;
    border-radius: 26px;
    color: white;
    background:
        radial-gradient(circle at 85% 10%, rgba(199,225,182,.2), transparent 30%),
        linear-gradient(120deg, #183D2B, #285E43 65%, #60836A);
    box-shadow: 0 12px 30px rgba(33,78,56,.12);
}

.map-header::after {
    content: "🌿";
    position: absolute;
    right: 45px;
    bottom: -25px;
    font-size: 10rem;
    opacity: .14;
    transform: rotate(-20deg);
}

.map-header-content {
    position: relative;
    z-index: 1;
    max-width: 680px;
}

.map-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 22px;
    color: #D9EBDD;
    font-size: .85rem;
    font-weight: 700;
    text-decoration: none;
}

.map-back:hover {
    color: white;
}

.map-eyebrow {
    display: inline-flex;
    padding: 8px 14px;
    background: rgba(255,255,255,.13);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 30px;
    color: #E7F0D9;
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: 1px;
}

.map-header h1 {
    margin: 18px 0 12px;
    color: white;
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem,4vw,3rem);
    line-height: 1.2;
}

.map-header h1 span {
    color: #F0D77B;
}

.map-header p {
    max-width: 550px;
    margin: 0;
    color: #DFEBDD;
    font-size: .95rem;
    line-height: 1.8;
}

.map-header-decoration {
    position: relative;
    z-index: 1;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 175px;
    height: 175px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 50%;
    background: rgba(255,255,255,.09);
    font-size: 5.5rem;
}

/* NOTIFICATIONS */

.map-alert {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 18px 22px;
    margin-bottom: 22px;
    border-radius: 16px;
    line-height: 1.7;
}

.map-alert.success {
    color: #285E43;
    background: #E1F1E3;
    border: 1px solid #BBDCC0;
}

.map-alert.error {
    color: #925144;
    background: #FCEBE5;
    border: 1px solid #EECBC0;
}

.alert-icon {
    flex-shrink: 0;
    font-size: 1.5rem;
}

.alert-title {
    display: block;
    margin-bottom: 3px;
    font-weight: 800;
}

.map-alert p {
    margin: 0;
    font-size: .87rem;
}

/* PROGRESS */

.map-progress-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 24px 28px;
    margin-bottom: 38px;
    background: linear-gradient(110deg,#E4F0E2,#D5E8D6);
    border: 1px solid #C9DEC9;
    border-radius: 20px;
}

.map-progress-content {
    flex: 1;
}

.map-progress-title {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 11px;
    color: #285E43;
    font-size: .85rem;
    font-weight: 800;
}

.map-progress-track {
    overflow: hidden;
    height: 10px;
    background: rgba(255,255,255,.65);
    border-radius: 20px;
}

.map-progress-fill {
    height: 100%;
    background: linear-gradient(90deg,#4B805D,#86B38C);
    border-radius: 20px;
}

.map-progress-count {
    min-width: 80px;
    color: #214E38;
    text-align: center;
}

.map-progress-count strong {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
}

/* SECTION TITLE */

.map-section-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 15px;
    margin-bottom: 23px;
}

.map-section-heading h2 {
    margin: 0 0 7px;
    color: #214E38;
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
}

.map-section-heading p {
    margin: 0;
    color: #718477;
    font-size: .88rem;
    line-height: 1.6;
}

/* LEVEL GRID */

.map-level-grid {
    display: grid;
    grid-template-columns: repeat(3,minmax(0,1fr));
    gap: 23px;
}

.level-card-game {
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    background: white;
    border: 1px solid #E4EADF;
    border-radius: 21px;
    box-shadow: 0 7px 22px rgba(33,78,56,.05);
    transition: .25s ease;
}

.level-card-game:not(.locked):hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(33,78,56,.12);
}

.level-card-game.locked {
    filter: saturate(.65);
    opacity: .76;
}

/* ECOSYSTEM COLOR THEMES */

.level-card-game.kl {
    --card-bg: #F1EBCB;
    --card-dark: #B7A34D;
    --card-light: #DCD49D;
}

.level-card-game.ps {
    --card-bg: #D8E9D8;
    --card-dark: #477C5C;
    --card-light: #9DBFA0;
}

.level-card-game.rl {
    --card-bg: #E0EEDC;
    --card-dark: #68946D;
    --card-light: #B5D1B0;
}

.level-card-game.rg {
    --card-bg: #E9DDC9;
    --card-dark: #8A6849;
    --card-light: #C7A985;
}

.level-card-game.mg {
    --card-bg: #D5E9D9;
    --card-dark: #34724D;
    --card-light: #9CC7A5;
}

/* LANDSCAPE */

.level-landscape {
    position: relative;
    overflow: hidden;
    height: 185px;
    background: var(--card-bg);
}

.landscape-sun {
    position: absolute;
    top: 24px;
    right: 38px;
    width: 53px;
    height: 53px;
    border-radius: 50%;
    background: rgba(255,255,255,.65);
    box-shadow: 0 0 30px rgba(255,255,255,.25);
}

.landscape-hill-back {
    position: absolute;
    left: -10%;
    bottom: 15px;
    width: 120%;
    height: 105px;
    background: var(--card-light);
    border-radius: 50% 50% 0 0;
}

.landscape-hill-front {
    position: absolute;
    left: -20%;
    bottom: -35px;
    width: 145%;
    height: 115px;
    background: var(--card-dark);
    border-radius: 50% 50% 0 0;
}

.landscape-water {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 34px;
    background: rgba(255,255,255,.27);
}

.landscape-icon {
    position: absolute;
    z-index: 2;
    right: 30px;
    bottom: 30px;
    font-size: 3.8rem;
    filter: drop-shadow(0 4px 4px rgba(0,0,0,.08));
}

.level-number {
    position: absolute;
    z-index: 3;
    top: 16px;
    left: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    background: rgba(255,255,255,.9);
    color: #214E38;
    border-radius: 50%;
    font-size: .8rem;
    font-weight: 800;
}

.level-status {
    position: absolute;
    z-index: 3;
    top: 18px;
    right: 15px;
    padding: 7px 12px;
    border-radius: 30px;
    background: rgba(24,61,43,.82);
    color: white;
    font-size: .68rem;
    font-weight: 800;
    backdrop-filter: blur(5px);
}

/* CARD CONTENT */

.level-card-content {
    display: flex;
    flex-direction: column;
    flex: 1;
    padding: 23px;
}

.level-code {
    display: inline-flex;
    align-self: flex-start;
    margin-bottom: 12px;
    padding: 6px 11px;
    border-radius: 8px;
    background: #EDF4EB;
    color: #285E43;
    font-size: .72rem;
    font-weight: 800;
}

.level-card-content h3 {
    margin: 0 0 10px;
    color: #214E38;
    font-family: 'Playfair Display', serif;
    font-size: 1.22rem;
    line-height: 1.4;
}

.level-card-content p {
    flex: 1;
    margin: 0 0 20px;
    color: #718477;
    font-size: .83rem;
    line-height: 1.7;
}

/* BUTTONS */

.level-action {
    display: block;
    width: 100%;
    padding: 12px 15px;
    border: 1px solid transparent;
    border-radius: 11px;
    text-align: center;
    text-decoration: none;
    font-size: .84rem;
    font-weight: 800;
    transition: .2s ease;
}

.level-action.completed {
    background: #E1F0E3;
    color: #285E43;
    border-color: #C8E0CB;
}

.level-action.open {
    background: #EFC94C;
    color: #263D30;
}

.level-action.locked {
    background: #EDF0EA;
    color: #89938B;
    cursor: not-allowed;
}

.level-action:not(.locked):hover {
    filter: brightness(.96);
    transform: translateY(-2px);
}

/* RESPONSIVE */

@media(max-width: 1050px) {
    .sifara-map {
        padding-left: 30px;
        padding-right: 30px;
    }

    .map-level-grid {
        grid-template-columns: repeat(2,minmax(0,1fr));
    }
}

@media(max-width: 700px) {
    .sifara-map {
        padding: 22px 18px 45px;
    }

    .map-header {
        padding: 28px 25px;
    }

    .map-header-decoration {
        display: none;
    }

    .map-header h1 {
        font-size: 2.15rem;
    }

    .map-progress-card {
        align-items: flex-start;
        padding: 20px;
    }

    .map-progress-count {
        min-width: 60px;
    }

    .map-level-grid {
        grid-template-columns: 1fr;
        gap: 17px;
    }

    .map-section-heading {
        align-items: flex-start;
    }

    .map-section-heading h2 {
        font-size: 1.5rem;
    }
}
</style>

<div class="sifara-map">

    <!-- NOTIFIKASI BERHASIL -->

    @if(session('success'))
        <div class="map-alert success">

            <div class="alert-icon">🌿</div>

            <div>
                <strong class="alert-title">
                    Selamat! Tantangan Berhasil Diselesaikan
                </strong>

                <p>{{ session('success') }}</p>
            </div>

        </div>
    @endif

    <!-- NOTIFIKASI GAGAL -->

    @if(session('error'))
        <div class="map-alert error">

            <div class="alert-icon">🍂</div>

            <div>
                <strong class="alert-title">
                    Tantangan Belum Berhasil
                </strong>

                <p>{{ session('error') }}</p>
            </div>

        </div>
    @endif

    <!-- HEADER -->

    <header class="map-header">

        <div class="map-header-content">

            <a href="{{ route('dashboard') }}" class="map-back">
                ← Kembali ke Dashboard
            </a>

            <span class="map-eyebrow">
                🌿 PETA PETUALANGAN SIFARA
            </span>

            <h1>
                Jelajahi Dunia <span>Lahan Basah.</span>
            </h1>

            <p>
                Setiap ekosistem menyimpan keunikan dan cerita tersendiri.
                Selesaikan setiap tantangan, temukan pengetahuan baru,
                dan jadilah bagian dari pelestarian lahan basah.
            </p>

        </div>

        <div class="map-header-decoration">
            🌳
        </div>

    </header>

    <!-- PROGRESS -->

    <section class="map-progress-card">

        <div class="map-progress-content">

            <div class="map-progress-title">
                <span>PROGRES PETUALANGANMU</span>
                <span>{{ $progress }}%</span>
            </div>

            <div class="map-progress-track">
                <div class="map-progress-fill"
                     style="width: {{ $progress }}%">
                </div>
            </div>

        </div>

        <div class="map-progress-count">
            <strong>{{ $completedCount }}/{{ $totalLevels }}</strong>
            <span style="font-size:.72rem;color:#54705A;">
                Level selesai
            </span>
        </div>

    </section>

    <!-- LEVEL SECTION -->

    <section class="map-level-section">

        <div class="map-section-heading">

            <div>
                <h2>Destinasi Pembelajaran</h2>

                <p>
                    Pilih ekosistem dan mulai perjalanan belajarmu.
                </p>
            </div>

        </div>

        <!-- LEVEL GRID -->

        <div class="map-level-grid">

            @foreach($levels as $level)

                @php
                    $status = $level['status'];

                    $isCompleted = $status == 'Selesai';
                    $isOpen = $status == 'Terbuka';
                    $isLocked = $status == 'Terkunci';

                    $levelCode = $level['kode'];

                    $icon = $ecosystemIcons[$levelCode] ?? '🌿';

                    $description = $ecosystemDescriptions[$levelCode]
                        ?? $level['desc'];
                @endphp

                <article class="level-card-game
                    {{ strtolower($levelCode) }}
                    {{ $isLocked ? 'locked' : '' }}">

                    <!-- ILUSTRASI -->

                    <div class="level-landscape">

                        <div class="landscape-sun"></div>

                        <div class="landscape-hill-back"></div>

                        <div class="landscape-hill-front"></div>

                        <div class="landscape-water"></div>

                        <span class="landscape-icon">
                            {{ $icon }}
                        </span>

                        <span class="level-number">
                            {{ str_pad($level['id'], 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <span class="level-status">

                            @if($isCompleted)
                                ✓ SELESAI
                            @elseif($isOpen)
                                ● TERBUKA
                            @else
                                🔒 TERKUNCI
                            @endif

                        </span>

                    </div>

                    <!-- INFORMASI -->

                    <div class="level-card-content">

                        <span class="level-code">
                            EKOSISTEM {{ $levelCode }}
                        </span>

                        <h3>
                            {{ $level['judul'] }}
                        </h3>

                        <p>
                            {{ $description }}
                        </p>

                        <!-- AKSI -->

                        @if($isCompleted)

                            <a
                                href="{{ url('/kuis/' . $level['id'] . '/game') }}"
                                class="level-action completed"
                            >
                                Main Lagi
                                <span>↗</span>
                            </a>

                        @elseif($isOpen)

                            <a
                                href="{{ url('/kuis/' . $level['id'] . '/game') }}"
                                class="level-action open"
                            >
                                Mulai Tantangan
                                <span>→</span>
                            </a>

                        @else

                            <button
                                type="button"
                                class="level-action locked"
                                disabled
                            >
                                🔒 Selesaikan Level Sebelumnya
                            </button>

                        @endif

                    </div>

                </article>

            @endforeach

        </div>

    </section>

</div>

@endsection