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

    $geographyDescriptions = [
        'BIO' => 'Mengenal biosfer, jenjang kehidupan, serta hubungan makhluk hidup dengan lingkungannya.',
        'BMD' => 'Mempelajari karakteristik bioma dan persebaran flora serta fauna di berbagai wilayah dunia.',
        'FFI' => 'Menjelajahi kekayaan flora dan fauna Indonesia serta kawasan persebarannya.',
        'SDA' => 'Mengenal potensi, jenis, dan persebaran sumber daya alam di Indonesia.',
        'PL' => 'Memahami pengelolaan lingkungan, konservasi, dan prinsip pembangunan berkelanjutan.',
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
    content: "";
    position: absolute;
    right: 55px;
    bottom: -85px;
    width: 250px;
    height: 250px;
    border: 2px solid rgba(225, 239, 220, .18);
    border-radius: 50%;
    box-shadow: 0 0 0 24px rgba(225, 239, 220, .06), 0 0 0 52px rgba(225, 239, 220, .04);
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

.map-back svg,
.level-action svg,
.level-status svg {
    width: 16px;
    height: 16px;
    flex: 0 0 auto;
    display: inline-block;
    vertical-align: middle;
}

.level-action {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
}

.level-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
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
}
.map-header-decoration svg {
    width: 132px;
    height: 132px;
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
    width: 38px;
    height: 38px;
    display: grid;
    place-items: center;
    border-radius: 12px;
    background: rgba(255,255,255,.65);
    font-size: 0;
}
.alert-icon svg {
    width: 25px;
    height: 25px;
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

/* GEOGRAPHY LEVEL COLOR THEMES */

.level-card-game.bio {
    --card-bg: #F1EBCB;
    --card-dark: #B7A34D;
    --card-light: #DCD49D;
}

.level-card-game.bmd {
    --card-bg: #D8E9D8;
    --card-dark: #477C5C;
    --card-light: #9DBFA0;
}

.level-card-game.ffi {
    --card-bg: #E0EEDC;
    --card-dark: #68946D;
    --card-light: #B5D1B0;
}

.level-card-game.sda {
    --card-bg: #E9DDC9;
    --card-dark: #8A6849;
    --card-light: #C7A985;
}

.level-card-game.pl {
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
    right: 28px;
    bottom: 20px;
    width: 116px;
    height: 116px;
    filter: drop-shadow(0 5px 5px rgba(0,0,0,.08));
}
.landscape-icon svg {
    display: block;
    width: 100%;
    height: 100%;
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

            <div class="alert-icon" aria-hidden="true">
                <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 27V15" stroke="#477A55" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M16 19C7 19 6 12 7 7C14 7 18 11 16 19Z" fill="#83A989"/>
                    <path d="M16 15C16 7 22 4 28 5C28 12 23 16 16 15Z" fill="#A8C6A0"/>
                </svg>
            </div>

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

            <div class="alert-icon" aria-hidden="true">
                <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 4L28 26H4L16 4Z" fill="#D9A18C"/>
                    <path d="M16 11V18" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round"/>
                    <circle cx="16" cy="22" r="1.4" fill="#FFFFFF"/>
                </svg>
            </div>

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
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M5 12L11 6M5 12L11 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Kembali ke Dashboard
            </a>

            <span class="map-eyebrow">
                PETA PETUALANGAN SIFARA · GEOGRAFI
            </span>

            <h1>
                Jelajahi Dunia <span>Geografi.</span>
            </h1>

            <p>
                Temukan keunikan biosfer, bioma, flora dan fauna, serta sumber daya alam.
                Selesaikan setiap tantangan, perluas pengetahuan geografimu,
                dan pelajari cara menjaga lingkungan secara berkelanjutan.
            </p>

        </div>

        <div class="map-header-decoration" aria-hidden="true">
            <svg viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="80" cy="80" r="68" fill="#DCEBD5" fill-opacity=".13" stroke="#E6F0DF" stroke-opacity=".55" stroke-width="2"/>
                <path d="M80 119V77" stroke="#DCEBD5" stroke-width="7" stroke-linecap="round"/>
                <path d="M80 91C47 91 40 68 43 49C69 48 86 63 80 91Z" fill="#A8C6A0"/>
                <path d="M81 76C81 47 103 34 125 38C126 62 108 79 81 76Z" fill="#D4E6C9"/>
                <path d="M80 118C67 104 54 104 43 108M80 118C94 102 108 101 120 106" stroke="#E6F0DF" stroke-width="5" stroke-linecap="round"/>
                <circle cx="37" cy="35" r="5" fill="#EFC94C"/>
                <circle cx="124" cy="119" r="4" fill="#EFC94C"/>
            </svg>
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
                    Pilih topik Geografi dan mulai perjalanan belajarmu.
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

                    $description = $geographyDescriptions[$levelCode]
                        ?? $level['desc'];

                    $levelClass = strtolower($levelCode);
                @endphp

                <article class="level-card-game
                    {{ $levelClass }}
                    {{ $isLocked ? 'locked' : '' }}">

                    <!-- ILUSTRASI -->

                    <div class="level-landscape">

                        <div class="landscape-sun" aria-hidden="true"></div>

                        <div class="landscape-hill-back"></div>

                        <div class="landscape-hill-front"></div>

                        <div class="landscape-water"></div>

                        <span class="landscape-icon" aria-hidden="true">
                            @switch($levelCode)
                                @case('BIO')
                                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="60" cy="60" r="48" fill="#FFFFFF" fill-opacity=".48"/>
                                        <path d="M60 94V49" stroke="#315C42" stroke-width="5" stroke-linecap="round"/>
                                        <path d="M60 67C32 67 27 47 30 31C52 30 68 42 60 67Z" fill="#477A55"/>
                                        <path d="M61 54C61 30 79 19 98 22C99 42 84 57 61 54Z" fill="#A8C6A0"/>
                                        <path d="M60 93C49 81 39 81 29 85M60 93C72 79 83 79 94 83" stroke="#315C42" stroke-width="4" stroke-linecap="round"/>
                                        <circle cx="28" cy="25" r="5" fill="#EFC94C"/>
                                    </svg>
                                    @break
                                @case('BMD')
                                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="60" cy="60" r="48" fill="#FFFFFF" fill-opacity=".48"/>
                                        <circle cx="85" cy="34" r="13" fill="#EFC94C"/>
                                        <path d="M12 82C29 62 43 65 58 81C73 59 91 62 109 79V101H12V82Z" fill="#6F9675"/>
                                        <path d="M12 91C34 75 50 83 64 94C81 79 96 82 109 91V105H12V91Z" fill="#315C42"/>
                                        <path d="M42 76L55 45L68 76H42Z" fill="#477A55"/>
                                        <path d="M49 61L55 45L62 61H49Z" fill="#DCEBD5"/>
                                        <path d="M55 76V88" stroke="#8B7650" stroke-width="4"/>
                                    </svg>
                                    @break
                                @case('FFI')
                                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="60" cy="60" r="48" fill="#FFFFFF" fill-opacity=".48"/>
                                        <path d="M24 83C34 78 42 78 51 83C61 88 70 88 80 82C87 78 95 78 102 82" stroke="#477A55" stroke-width="4" stroke-linecap="round"/>
                                        <path d="M35 64C44 52 58 47 70 51C79 54 84 63 81 70C77 78 61 79 48 74L35 70C31 69 32 66 35 64Z" fill="#477A55"/>
                                        <path d="M68 52L84 39L91 42L81 58" fill="#6F9675"/>
                                        <path d="M84 39L96 34L91 46L84 47" fill="#315C42"/>
                                        <path d="M48 74L43 87M70 75L72 88" stroke="#315C42" stroke-width="3.5" stroke-linecap="round"/>
                                        <circle cx="45" cy="63" r="2" fill="#F6F3E9"/>
                                        <path d="M26 34C33 27 42 27 49 32" stroke="#8B7650" stroke-width="3" stroke-linecap="round"/>
                                        <circle cx="88" cy="24" r="6" fill="#EFC94C"/>
                                    </svg>
                                    @break
                                @case('SDA')
                                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="60" cy="60" r="48" fill="#FFFFFF" fill-opacity=".48"/>
                                        <path d="M16 84L42 48L58 70L76 39L105 84H16Z" fill="#8B7650"/>
                                        <path d="M42 48L51 60L58 70L66 56L76 39L86 57L76 51L69 62L58 70L51 60Z" fill="#F5EBD5"/>
                                        <path d="M19 91H102" stroke="#315C42" stroke-width="5" stroke-linecap="round"/>
                                        <path d="M32 98H88" stroke="#6F9675" stroke-width="4" stroke-linecap="round"/>
                                        <circle cx="88" cy="28" r="9" fill="#EFC94C"/>
                                    </svg>
                                    @break
                                @case('PL')
                                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="60" cy="60" r="48" fill="#FFFFFF" fill-opacity=".48"/>
                                        <path d="M60 96V53" stroke="#315C42" stroke-width="5" stroke-linecap="round"/>
                                        <path d="M60 70C34 70 28 50 31 34C52 32 68 45 60 70Z" fill="#477A55"/>
                                        <path d="M61 56C61 32 80 21 99 24C100 44 84 59 61 56Z" fill="#A8C6A0"/>
                                        <path d="M60 95C48 83 39 83 29 87M60 95C72 82 83 82 94 86" stroke="#315C42" stroke-width="4" stroke-linecap="round"/>
                                        <path d="M22 30L27 23M96 91L102 96" stroke="#EFC94C" stroke-width="4" stroke-linecap="round"/>
                                    </svg>
                                    @break
                            @endswitch
                        </span>

                        <span class="level-number">
                            {{ str_pad($level['id'], 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <span class="level-status">

                            @if($isCompleted)
                                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="8" fill="#D9EBDD"/>
                                    <path d="M6 10.2L8.6 12.7L14.2 7.4" stroke="#285E43" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                SELESAI
                            @elseif($isOpen)
                                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="7" fill="#A8C6A0"/>
                                    <circle cx="10" cy="10" r="3" fill="#285E43"/>
                                </svg>
                                TERBUKA
                            @else
                                TERKUNCI
                            @endif

                        </span>

                    </div>

                    <!-- INFORMASI -->

                    <div class="level-card-content">

                        <span class="level-code">
                            GEOGRAFI {{ $levelCode }}
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
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M8 7H17V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>

                        @elseif($isOpen)

                            <a
                                href="{{ url('/kuis/' . $level['id'] . '/game') }}"
                                class="level-action open"
                            >
                                Mulai Tantangan
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>

                        @else

                            <button
                                type="button"
                                class="level-action locked"
                                disabled
                            >
                                Selesaikan Level Sebelumnya
                            </button>

                        @endif

                    </div>

                </article>

            @endforeach

        </div>

    </section>

</div>

@endsection