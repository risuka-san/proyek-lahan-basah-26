@extends('layouts.app')

@section('title', 'Dashboard - SIFARA')

@section('content')

@php
    $completedCount = $levels->where('status', 'Selesai')->count();
    $openLevel = $levels->firstWhere('status', 'Terbuka');
    $totalLevels = $levels->count();

    $progressPercentage = $totalLevels > 0
        ? round(($completedCount / $totalLevels) * 100)
        : 0;
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap');

    .sifara-dashboard {
        --forest: #2E7D4F;
        --forest-dark: #1B5E3A;
        --green: #4CAF7A;
        --sage: #A8D5B5;
        --mint: #E8F8EE;
        --cream: #FBFCF5;
        --gold: #FFD54F;
        --sky: #B3E5FC;
        --text: #2D4A3A;
        --muted: #6B8A76;

        max-width: 1440px;
        margin: auto;
        padding: 30px 50px 70px;
        color: var(--text);
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(180deg, #FBFCF5 0%, #F0F9EC 100%);
    }

    .sifara-dashboard * { box-sizing: border-box; }
    .sifara-dashboard svg { display: block; }

    /* =========================================
       HERO
    ========================================= */
    .sifara-hero {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 35px;
        min-height: 300px;
        padding: 45px 50px;
        border-radius: 30px;
        color: white;
        background:
            radial-gradient(circle at 85% 15%, rgba(255,213,79,.2), transparent 30%),
            linear-gradient(120deg, var(--forest-dark) 0%, var(--forest) 55%, var(--green) 100%);
        box-shadow: 0 15px 35px rgba(46,125,79,.25);
        border: 3px solid #C8E6C9;
    }

    .sifara-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        right: 130px;
        top: -150px;
        border-radius: 50%;
        border: 2px dashed rgba(255,255,255,.2);
        pointer-events: none;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 620px;
    }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        background: rgba(255,255,255,.15);
        border: 2px solid rgba(255,255,255,.3);
        border-radius: 50px;
        color: #FFF9E0;
        font-size: .8rem;
        font-weight: 900;
        letter-spacing: .5px;
    }

    .hero-eyebrow svg {
        width: 16px;
        height: 16px;
        fill: var(--gold);
    }

    .hero-content h1 {
        color: #FFFFFF;
        font-family: 'Baloo 2', cursive, sans-serif;
        font-size: clamp(2.1rem, 4vw, 3.4rem);
        line-height: 1.15;
        font-weight: 800;
        letter-spacing: -.5px;
        margin: 22px 0 14px;
    }

    .hero-content h1 span {
        color: var(--gold);
        font-style: italic;
    }

    .hero-content p {
        color: #E8F8EE;
        max-width: 490px;
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.8;
    }

    .hero-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 25px;
        padding: 14px 26px;
        background: linear-gradient(135deg, var(--gold), #FFCA28);
        color: var(--forest-dark) !important;
        border-radius: 30px;
        text-decoration: none !important;
        font-weight: 900;
        font-size: 15px;
        box-shadow: 0 6px 15px rgba(255, 213, 79, .3);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
    }

    .hero-button:hover {
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 12px 25px rgba(255, 213, 79, .5);
    }

    .hero-button svg {
        width: 18px;
        height: 18px;
        transition: transform .3s;
    }

    .hero-button:hover svg {
        transform: translateX(4px);
    }

    .hero-decoration {
        position: relative;
        z-index: 1;
        width: 290px;
        height: 220px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: float-bob 4s ease-in-out infinite;
    }

    @keyframes float-bob {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .leaf-circle {
        width: 190px;
        height: 190px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255,255,255,.1);
        border: 3px dashed rgba(255,255,255,.3);
        transform: rotate(-10deg);
    }

    .leaf-circle svg {
        width: 100px;
        height: 100px;
    }

    /* =========================================
       STATISTICS
    ========================================= */
    .sifara-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
        margin: 35px 0 45px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 25px;
        border-radius: 24px;
        border: 2px solid transparent;
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
        box-shadow: 0 8px 24px rgba(76, 175, 122, .05);
    }

    .stat-card:nth-child(1) { background: linear-gradient(135deg, #E8F8EE, #C8E6C9); border-color: #A5D6A7; }
    .stat-card:nth-child(2) { background: linear-gradient(135deg, #FFF9E0, #FFE082); border-color: #FFCA28; }
    .stat-card:nth-child(3) { background: linear-gradient(135deg, #E3F2FD, #B3E5FC); border-color: #81D4FA; }

    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(76, 175, 122, .15);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: rgba(255,255,255,.7);
        box-shadow: 0 4px 10px rgba(0,0,0,.05);
    }

    .stat-icon svg { width: 32px; height: 32px; }
    .stat-card:nth-child(1) svg { stroke: var(--forest); }
    .stat-card:nth-child(2) svg { stroke: #F9A825; }
    .stat-card:nth-child(3) svg { stroke: #0288D1; }

    .stat-info span {
        display: block;
        color: var(--muted);
        font-size: .8rem;
        font-weight: 800;
        margin-bottom: 4px;
    }

    .stat-info h3 {
        color: var(--forest-dark);
        font-family: 'Baloo 2', cursive, sans-serif;
        font-size: 1.8rem;
        font-weight: 800;
        line-height: 1.1;
        margin: 0;
    }

    /* =========================================
       SECTION HEADING
    ========================================= */
    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 15px;
        margin-bottom: 25px;
    }

    .section-heading h2 {
        color: var(--forest-dark);
        font-family: 'Baloo 2', cursive, sans-serif;
        font-size: 1.8rem;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .section-heading p {
        color: var(--muted);
        font-size: .95rem;
        font-weight: 600;
        margin: 0;
    }

    .section-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--forest);
        font-size: .95rem;
        font-weight: 900;
        text-decoration: none !important;
        transition: .2s;
    }

    .section-link:hover { color: var(--forest-dark); }
    .section-link svg { width: 16px; height: 16px; }

    /* =========================================
       ECOSYSTEM CARDS
    ========================================= */
    .sifara-level-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
    }

    .sifara-level-card {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 230px;
        padding: 25px;
        background: linear-gradient(145deg, var(--card-bg), var(--card-bottom));
        border: 2px solid var(--card-border);
        border-top: 6px solid var(--card-accent);
        border-radius: 24px;
        text-decoration: none !important;
        color: inherit;
        box-shadow: 0 8px 20px rgba(33, 78, 56, .05);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
    }

    /* Dekorasi Lingkaran */
    .sifara-level-card::before {
        content: "";
        position: absolute;
        z-index: -1;
        width: 160px;
        height: 160px;
        right: -50px;
        top: 40px;
        border-radius: 50%;
        background: var(--card-decoration);
        opacity: .6;
    }

    .sifara-level-card:not(.locked):hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 16px 36px rgba(33, 78, 56, .15);
        border-color: var(--card-accent);
    }

    /* Tema Warna Tiap Ekosistem */
    .sifara-level-card.kl { --card-bg: #FBF9E9; --card-bottom: #F2F0D4; --card-accent: #D4AF37; --card-border: #E9E2B7; --card-decoration: #E8E9B9; }
    .sifara-level-card.ps { --card-bg: #EAF5EB; --card-bottom: #D5EADB; --card-accent: #4CAF7A; --card-border: #C7E1CC; --card-decoration: #BFDCC5; }
    .sifara-level-card.rl { --card-bg: #E8F3E9; --card-bottom: #D5E8D5; --card-accent: #83AE8B; --card-border: #C9DEC9; --card-decoration: #BCDABF; }
    .sifara-level-card.rg { --card-bg: #F2EBDD; --card-bottom: #E8DCC8; --card-accent: #A77B52; --card-border: #E1D0B7; --card-decoration: #DCC9AA; }
    .sifara-level-card.mg { --card-bg: #E1F0E4; --card-bottom: #CDE5D3; --card-accent: #2E7D4F; --card-border: #C2DDC8; --card-decoration: #B5D9BE; }

    /* Top Card */
    .level-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .level-identity { display: flex; align-items: center; gap: 10px; }

    .level-number-badge {
        display: inline-flex; align-items: center; justify-content: center;
        min-width: 40px; height: 38px;
        border-radius: 12px;
        background: rgba(255,255,255,.8);
        color: var(--forest-dark);
        font-size: .85rem; font-weight: 900;
        border: 1px solid rgba(0,0,0,.05);
    }

    .level-code-badge {
        display: inline-flex; align-items: center; justify-content: center;
        min-width: 45px; height: 38px;
        border-radius: 12px;
        background: rgba(255,255,255,.8);
        color: var(--forest);
        font-size: .9rem; font-weight: 900;
        border: 1px solid rgba(0,0,0,.05);
    }

    .level-status {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 8px 14px;
        border-radius: 50px;
        font-size: .75rem; font-weight: 900;
        white-space: nowrap;
    }

    .level-status.completed { background: #C8E6C9; color: #1B5E3A; }
    .level-status.open { background: #FFE082; color: #8F6D00; }
    .level-status.locked-status { background: #E0E0E0; color: #757575; }

    .level-status svg { width: 14px; height: 14px; }

    /* Content */
    .level-card-content { margin-top: 20px; position: relative; z-index: 1; }

    .level-card-content h3 {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--forest-dark);
        font-family: 'Baloo 2', cursive, sans-serif;
        font-size: 1.2rem; font-weight: 800;
        line-height: 1.4;
        margin-bottom: 8px;
    }
    
    .level-card-content h3 svg { width: 22px; height: 22px; flex-shrink: 0; }

    .level-card-content p {
        color: var(--muted);
        font-size: .9rem; font-weight: 600;
        line-height: 1.65;
        max-width: 95%;
    }

    /* Footer */
    .level-card-footer {
        display: flex; justify-content: space-between; align-items: center;
        margin-top: 20px; padding-top: 15px;
        border-top: 1px dashed rgba(45,90,63,.2);
        position: relative; z-index: 1;
    }

    .level-footer-text {
        color: var(--muted); font-size: .8rem; font-weight: 700;
    }

    .level-arrow {
        width: 36px; height: 36px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%;
        background: rgba(255,255,255,.85);
        color: var(--forest);
        box-shadow: 0 2px 6px rgba(0,0,0,.05);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
    }

    .level-arrow svg { width: 18px; height: 18px; }

    .sifara-level-card:not(.locked):hover .level-arrow {
        transform: translateX(4px);
        background: var(--forest);
        color: white;
    }

    /* Locked */
    .sifara-level-card.locked {
        filter: saturate(.3);
        opacity: .7;
        cursor: not-allowed;
        border-top-color: #9E9E9E;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */
    @media (max-width: 1050px) {
        .sifara-dashboard { padding-left: 30px; padding-right: 30px; }
        .sifara-level-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .hero-decoration { width: 220px; }
        .leaf-circle { width: 160px; height: 160px; }
    }

    @media (max-width: 700px) {
        .sifara-dashboard { padding: 22px 18px 45px; }
        .sifara-hero { flex-direction: column; align-items: flex-start; padding: 30px 25px; gap: 15px; text-align: center; }
        .hero-content { display: flex; flex-direction: column; align-items: center; }
        .hero-decoration { align-self: center; height: 150px; }
        .leaf-circle { width: 130px; height: 130px; }
        .leaf-circle svg { width: 70px; height: 70px; }
        
        .sifara-stats { grid-template-columns: 1fr; gap: 15px; margin: 25px 0 35px; }
        .sifara-level-grid { grid-template-columns: 1fr; gap: 18px; }
        
        .section-heading { align-items: flex-start; flex-direction: column; gap: 8px; }
        .section-heading h2 { font-size: 1.5rem; }
    }
</style>


<div class="sifara-dashboard">

    <!-- HERO SECTION -->
    <section class="sifara-hero">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <!-- Ikon Daun SVG -->
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 19C5 19 7 9 19 5C19 5 21 17 11 19C8 19.6 5 19 5 19Z" fill="currentColor"/>
                </svg>
                {{ $completedCount }} DARI {{ $totalLevels }} LEVEL SELESAI
            </div>

            <h1>
                Halo, {{ Auth::user()->name }}!
                <br>
                Mari <span>jelajahi alam.</span>
            </h1>

            <p>
                Temukan keunikan ekosistem lahan basah,
                pelajari perannya bagi lingkungan, dan
                jadilah bagian dari upaya pelestariannya.
            </p>

            <a href="{{ url('/peta-game') }}" class="hero-button">
                Mulai Petualangan
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="hero-decoration">
            <div class="leaf-circle">
                <!-- Ilustrasi Daun Besar -->
                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 56C8 56 12 18 56 8C56 8 60 52 20 56C12 57.5 8 56 8 56Z" fill="#A5D6A7" stroke="#E8F8EE" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M8 56L32 32" stroke="#1B5E3A" stroke-width="2" stroke-linecap="round"/>
                    <path d="M20 44L28 40M14 50L22 46M26 36L34 32M32 30L40 26M38 24L46 20" stroke="#1B5E3A" stroke-width="1.4" stroke-linecap="round" opacity="0.6"/>
                </svg>
            </div>
        </div>
    </section>


    <!-- STATISTICS -->
    <section class="sifara-stats">
        <!-- Card 1 -->
        <div class="stat-card">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 12L11 15L16 9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Level Selesai</span>
                <h3>{{ $completedCount }} / {{ $totalLevels }}</h3>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="stat-card">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 6V12L16 14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Progres Pembelajaran</span>
                <h3>{{ $progressPercentage }}%</h3>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="stat-card">
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 5.58172 6.58172 2 11 2H13C17.4183 2 21 5.58172 21 10Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="12" cy="10" r="3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="stat-info">
                <span>Level Selanjutnya</span>
                <h3 style="font-size:1.3rem;">
                    @if($openLevel)
                        Level {{ $openLevel->urutan }}
                    @else
                        Semua Selesai!
                    @endif
                </h3>
            </div>
        </div>
    </section>


    <!-- ECOSYSTEM SECTION -->
    <section class="level-section">
        <div class="section-heading">
            <div>
                <h2>Jelajahi Ekosistem</h2>
                <p>Kenali lima ekosistem lahan basah melalui perjalanan belajar.</p>
            </div>
            <a href="{{ url('/peta-game') }}" class="section-link">
                Lihat Peta
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="sifara-level-grid">
            @foreach($levels as $level)
                @php
                    $isCompleted = $level->status == 'Selesai';
                    $isOpen = $level->status == 'Terbuka';
                    $isLocked = $level->status == 'Terkunci';
                    $cardClass = strtolower($level->kode);
                @endphp

                <a href="{{ $isLocked ? '#' : $level->url }}"
                   class="sifara-level-card {{ $cardClass }} {{ $isLocked ? 'locked' : '' }}"
                   @if($isLocked) aria-disabled="true" onclick="return false;" @endif>

                    <div class="level-card-top">
                        <div class="level-identity">
                            <span class="level-number-badge">{{ str_pad($level->urutan, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="level-code-badge">{{ $level->kode }}</span>
                        </div>

                        @if($isCompleted)
                            <span class="level-status completed">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Selesai
                            </span>
                        @elseif($isOpen)
                            <span class="level-status open">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="6" fill="currentColor"/></svg>
                                Terbuka
                            </span>
                        @else
                            <span class="level-status locked-status">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 11V7C7 4.23858 9.23858 2 12 2C14.7614 2 17 4.23858 17 7V11" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Terkunci
                            </span>
                        @endif
                    </div>

                    <div class="level-card-content">
                        <h3>
                            <!-- IKON EKOSISTEM (Menggunakan SVG) -->
                            @if($level->kode == 'KL')
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 22V8M12 8C12 8 8 7 7 3C7 3 11 2 13 5C13.5 5.8 13 7 12 8Z" fill="#81C784" stroke="#4CAF7A" stroke-width="1.5" stroke-linejoin="round"/><path d="M12 13C12 13 16 12 17 8C17 8 13 7 11 10C10.5 10.8 11 12 12 13Z" fill="#81C784" stroke="#4CAF7A" stroke-width="1.5" stroke-linejoin="round"/></svg>
                            @elseif($level->kode == 'PS')
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 12H22M2 17H22M2 7H22" stroke="#0288D1" stroke-width="2" stroke-linecap="round"/></svg>
                            @elseif($level->kode == 'RL')
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 7C12 7 13.5 4 16 4C18.5 4 20 6.5 20 9C20 14 12 20 12 20C12 20 4 14 4 9C4 6.5 5.5 4 8 4C10.5 4 12 7 12 7Z" fill="#B39DDB" stroke="#7E57C2" stroke-width="1.5" stroke-linejoin="round"/></svg>
                            @elseif($level->kode == 'RG')
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21V11M12 11C12 11 8 10 7 6C7 6 11 5 13 8C13.5 8.8 13 10 12 11Z" fill="#A1887F" stroke="#795548" stroke-width="1.5" stroke-linejoin="round"/><path d="M12 15C12 15 16 14 17 10C17 10 13 9 11 12C10.5 12.8 11 14 12 15Z" fill="#A1887F" stroke="#795548" stroke-width="1.5" stroke-linejoin="round"/></svg>
                            @elseif($level->kode == 'MG')
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 22V12M12 12C12 12 8 13 6 10C6 10 9 7 12 12Z" fill="#66BB6A" stroke="#388E3C" stroke-width="1.5" stroke-linejoin="round"/><path d="M12 16C12 16 16 17 18 14C18 14 15 11 12 16Z" fill="#66BB6A" stroke="#388E3C" stroke-width="1.5" stroke-linejoin="round"/></svg>
                            @else
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 19C5 19 7 9 19 5C19 5 21 17 11 19C8 19.6 5 19 5 19Z" fill="#81C784" stroke="#4CAF7A" stroke-width="1.5" stroke-linejoin="round"/></svg>
                            @endif
                            {{ $level->judul }}
                        </h3>
                        <p>{{ $level->deskripsi }}</p>
                    </div>

                    <div class="level-card-footer">
                        <span class="level-footer-text">
                            @if($isCompleted)
                                Materi telah diselesaikan
                            @elseif($isOpen)
                                Lanjutkan pembelajaran
                            @else
                                Selesaikan level sebelumnya
                            @endif
                        </span>

                        <span class="level-arrow">
                            @if($isCompleted)
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @elseif($isOpen)
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @else
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 11V7C7 4.23858 9.23858 2 12 2C14.7614 2 17 4.23858 17 7V11" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            @endif
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

</div>

@endsection