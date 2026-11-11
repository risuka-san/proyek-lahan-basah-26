
@extends('layouts.app')

@section('content')

@php
    $completedCount = $levels->where('status', 'Selesai')->count();
    $openLevel = $levels->firstWhere('status', 'Terbuka');
    $totalLevels = $levels->count();

    $progressPercentage = $totalLevels > 0
        ? round(($completedCount / $totalLevels) * 100)
        : 0;

    $ecosystemIcons = [
        'KL' => '🌾',
        'PS' => '🌊',
        'RL' => '🪷',
        'RG' => '🌱',
        'MG' => '🌳',
    ];
@endphp

<style>
/* =========================================
   SIFARA BOTANICAL DASHBOARD
========================================= */

.sifara-dashboard {
    --forest: #214E38;
    --forest-light: #2D6A4F;
    --sage: #A8C6A0;
    --mint: #D9EBDD;
    --olive: #B5BD79;
    --gold: #EFC94C;

    max-width: 1440px;
    margin: auto;
    padding: 30px 50px 70px;
    color: #263D30;
}

.sifara-dashboard * {
    box-sizing: border-box;
}

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
    border-radius: 28px;
    color: white;
    background:
        radial-gradient(circle at 85% 15%, rgba(190,220,174,.22), transparent 28%),
        linear-gradient(120deg, #183D2B 0%, #285E43 55%, #4B805D 100%);
    box-shadow: 0 15px 35px rgba(33,78,56,.13);
}

.sifara-hero::before,
.sifara-hero::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(255,255,255,.13);
    border-radius: 50%;
    pointer-events: none;
}

.sifara-hero::before {
    width: 280px;
    height: 280px;
    right: 170px;
    top: -170px;
}

.sifara-hero::after {
    width: 220px;
    height: 220px;
    right: 90px;
    bottom: -155px;
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
    padding: 9px 16px;
    background: rgba(255,255,255,.13);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 50px;
    color: #E7F0D9;
    font-size: .78rem;
    font-weight: 800;
}

.hero-content h1 {
    color: #FFFFFF;
    font-size: clamp(2.1rem,4vw,3.1rem);
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: -1.5px;
    margin: 22px 0 14px;
}

.hero-content h1 span {
    color: #F0D77B;
}

.hero-content p {
    color: #DFEBDD;
    max-width: 490px;
    font-size: 1rem;
    line-height: 1.8;
}

.hero-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-top: 25px;
    padding: 13px 23px;
    background: #EFC94C;
    color: #263D30;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 800;
    transition: .25s ease;
}

.hero-button:hover {
    background: #F7D967;
    color: #263D30;
    transform: translateY(-3px);
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
}

.leaf-circle {
    width: 190px;
    height: 190px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.22);
    font-size: 6rem;
    transform: rotate(-12deg);
}

.leaf-decoration {
    position: absolute;
    font-size: 2.5rem;
    opacity: .8;
}

.leaf-one {
    top: 12px;
    right: 25px;
    transform: rotate(35deg);
}

.leaf-two {
    bottom: 12px;
    left: 15px;
    transform: rotate(-40deg);
}

/* =========================================
   STATISTICS - GREEN COLORFUL CARDS
========================================= */

.sifara-stats {
    display: grid;
    grid-template-columns: repeat(3,minmax(0,1fr));
    gap: 18px;
    margin: 30px 0 45px;
}

.stat-card {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 17px;
    padding: 24px;
    border: 1px solid transparent;
    border-radius: 22px;
    transition: .25s ease;
}

.stat-card:nth-child(1) {
    background: linear-gradient(135deg,#E1EFE0,#C8DFC9);
    border-color: #C1DCC3;
}

.stat-card:nth-child(2) {
    background: linear-gradient(135deg,#F0F3D9,#E1E9B9);
    border-color: #DCE5B3;
}

.stat-card:nth-child(3) {
    background: linear-gradient(135deg,#E0EEE5,#C4DDD0);
    border-color: #C4DDD0;
}

.stat-card::after {
    content: "";
    position: absolute;
    width: 125px;
    height: 125px;
    right: -42px;
    bottom: -65px;
    border-radius: 50%;
    background: rgba(255,255,255,.28);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(33,78,56,.09);
}

.stat-icon {
    position: relative;
    z-index: 1;
    width: 58px;
    height: 58px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    font-size: 1.7rem;
    background: rgba(255,255,255,.65);
}

.stat-info {
    position: relative;
    z-index: 1;
}

.stat-info span {
    display: block;
    color: #54705A;
    font-size: .78rem;
    font-weight: 700;
    margin-bottom: 4px;
}

.stat-info h3 {
    color: #214E38;
    font-size: 1.7rem;
    font-weight: 800;
    line-height: 1.2;
}

/* =========================================
   SECTION HEADING
========================================= */

.section-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 22px;
}

.section-heading h2 {
    color: #214E38;
    font-size: 1.45rem;
    font-weight: 800;
    margin-bottom: 4px;
}

.section-heading p {
    color: #718477;
    font-size: .88rem;
    line-height: 1.6;
}

.section-link {
    color: #2D6A4F;
    font-size: .9rem;
    font-weight: 800;
    text-decoration: none;
    white-space: nowrap;
}

.section-link:hover {
    color: #183D2B;
}

/* =========================================
   ECOSYSTEM CARDS
========================================= */

.sifara-level-grid {
    display: grid;
    grid-template-columns: repeat(3,minmax(0,1fr));
    gap: 22px;
}

.sifara-level-card {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 220px;
    padding: 24px;

    background:
        linear-gradient(145deg,var(--card-bg),var(--card-bottom));

    border: 1px solid var(--card-border);
    border-top: 5px solid var(--card-accent);
    border-radius: 22px;

    text-decoration: none;
    color: inherit;
    box-shadow: 0 5px 18px rgba(33,78,56,.04);
    transition: .25s ease;
}

/* Dekorasi lingkaran hijau */

.sifara-level-card::before {
    content: "";
    position: absolute;
    z-index: -1;
    width: 155px;
    height: 155px;
    right: -55px;
    top: 60px;
    border-radius: 50%;
    background: var(--card-decoration);
    opacity: .8;
}

.sifara-level-card::after {
    content: "✦";
    position: absolute;
    z-index: -1;
    right: 25px;
    bottom: 30px;
    font-size: 2rem;
    color: var(--card-accent);
    opacity: .20;
}

.sifara-level-card:not(.locked):hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(33,78,56,.11);
}

/* Warna per ekosistem */

.sifara-level-card.kl {
    --card-bg: #FBF9E9;
    --card-bottom: #F2F0D4;
    --card-accent: #C9AD38;
    --card-border: #E9E2B7;
    --card-decoration: #E8E9B9;
}

.sifara-level-card.ps {
    --card-bg: #EAF5EB;
    --card-bottom: #D5EADB;
    --card-accent: #69A780;
    --card-border: #C7E1CC;
    --card-decoration: #BFDCC5;
}

.sifara-level-card.rl {
    --card-bg: #E8F3E9;
    --card-bottom: #D5E8D5;
    --card-accent: #83AE8B;
    --card-border: #C9DEC9;
    --card-decoration: #BCDABF;
}

.sifara-level-card.rg {
    --card-bg: #F2EBDD;
    --card-bottom: #E8DCC8;
    --card-accent: #A77B52;
    --card-border: #E1D0B7;
    --card-decoration: #DCC9AA;
}

.sifara-level-card.mg {
    --card-bg: #E1F0E4;
    --card-bottom: #CDE5D3;
    --card-accent: #43845E;
    --card-border: #C2DDC8;
    --card-decoration: #B5D9BE;
}

/* Identitas level */

.level-card-top {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
}

.level-identity {
    display: flex;
    align-items: center;
    gap: 10px;
}

.level-number-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    height: 35px;
    border-radius: 9px;
    background: rgba(255,255,255,.72);
    color: #587260;
    font-size: .78rem;
    font-weight: 800;
}

.level-code-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 43px;
    height: 35px;
    border-radius: 9px;
    background: rgba(255,255,255,.68);
    color: #286044;
    font-size: .85rem;
    font-weight: 800;
}

.level-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 8px 12px;
    border-radius: 50px;
    font-size: .69rem;
    font-weight: 800;
    white-space: nowrap;
}

.level-status.completed {
    background: #C9E8CF;
    color: #286044;
}

.level-status.open {
    background: #FFF0BD;
    color: #886718;
}

.level-status.locked-status {
    background: #E4E9E3;
    color: #768078;
}

/* Isi kartu */

.level-card-content {
    position: relative;
    z-index: 1;
    margin-top: 20px;
}

.level-card-content h3 {
    color: #214E38;
    font-size: 1.08rem;
    font-weight: 800;
    line-height: 1.5;
    margin-bottom: 7px;
}

.level-card-content p {
    color: #637D69;
    font-size: .82rem;
    line-height: 1.6;
    max-width: 90%;
}

.level-card-footer {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 18px;
    padding-top: 13px;
    border-top: 1px solid rgba(45,90,63,.13);
}

.level-footer-text {
    color: #66806B;
    font-size: .75rem;
    font-weight: 700;
}

.level-arrow {
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255,255,255,.75);
    color: #285E43;
    font-weight: 800;
    transition: .25s ease;
}

.sifara-level-card:not(.locked):hover .level-arrow {
    transform: translateX(4px);
    background: #FFFFFF;
}

/* Level terkunci */

.sifara-level-card.locked {
    filter: saturate(.65);
    opacity: .72;
    cursor: not-allowed;
}

/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 1050px) {
    .sifara-dashboard {
        padding-left: 30px;
        padding-right: 30px;
    }

    .sifara-level-grid {
        grid-template-columns: repeat(2,minmax(0,1fr));
    }

    .hero-decoration {
        width: 220px;
    }

    .leaf-circle {
        width: 160px;
        height: 160px;
        font-size: 5rem;
    }
}

@media (max-width: 700px) {
    .sifara-dashboard {
        padding: 22px 18px 45px;
    }

    .sifara-hero {
        flex-direction: column;
        align-items: flex-start;
        padding: 30px 25px;
        gap: 10px;
    }

    .hero-content h1 {
        font-size: 2.1rem;
    }

    .hero-content p {
        font-size: .9rem;
    }

    .hero-decoration {
        align-self: center;
        height: 150px;
    }

    .leaf-circle {
        width: 125px;
        height: 125px;
        font-size: 4rem;
    }

    .sifara-stats {
        grid-template-columns: 1fr;
        gap: 12px;
        margin: 22px 0 35px;
    }

    .stat-card {
        padding: 18px;
    }

    .sifara-level-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .sifara-level-card {
        min-height: 200px;
        padding: 20px;
    }

    .section-heading {
        align-items: flex-start;
    }

    .section-heading h2 {
        font-size: 1.2rem;
    }

    .section-heading p {
        font-size: .8rem;
    }
}
</style>


<div class="sifara-dashboard">

    <!-- HERO SECTION -->

    <section class="sifara-hero">

        <div class="hero-content">

            <div class="hero-eyebrow">
                🌿 {{ $completedCount }} DARI {{ $totalLevels }} LEVEL SELESAI
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
                Mulai Petualangan →
            </a>

        </div>

        <div class="hero-decoration">

            <div class="leaf-circle">🌿</div>

            <span class="leaf-decoration leaf-one">🍃</span>
            <span class="leaf-decoration leaf-two">🌱</span>

        </div>

    </section>


    <!-- STATISTICS -->

    <section class="sifara-stats">

        <div class="stat-card">
            <div class="stat-icon">🌱</div>

            <div class="stat-info">
                <span>Level Selesai</span>
                <h3>{{ $completedCount }} / {{ $totalLevels }}</h3>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">🎯</div>

            <div class="stat-info">
                <span>Progres Pembelajaran</span>
                <h3>{{ $progressPercentage }}%</h3>
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">🗺️</div>

            <div class="stat-info">
                <span>Level Selanjutnya</span>

                <h3 style="font-size:1.15rem;">
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

                <p>
                    Kenali lima ekosistem lahan basah melalui perjalanan belajar.
                </p>
            </div>

            <a href="{{ url('/peta-game') }}" class="section-link">
                Lihat Peta →
            </a>

        </div>


        <!-- LEVEL CARDS -->

        <div class="sifara-level-grid">

            @foreach($levels as $level)

                @php
                    $isCompleted = $level->status == 'Selesai';
                    $isOpen = $level->status == 'Terbuka';
                    $isLocked = $level->status == 'Terkunci';

                    $cardClass = strtolower($level->kode);

                    $ecosystemIcon = $ecosystemIcons[$level->kode] ?? '🌿';
                @endphp

                <a
                    href="{{ $isLocked ? '#' : $level->url }}"
                    class="sifara-level-card {{ $cardClass }} {{ $isLocked ? 'locked' : '' }}"

                    @if($isLocked)
                        aria-disabled="true"
                        onclick="return false;"
                    @endif
                >

                    <div class="level-card-top">

                        <div class="level-identity">

                            <span class="level-number-badge">
                                {{ str_pad($level->urutan, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <span class="level-code-badge">
                                {{ $level->kode }}
                            </span>

                        </div>

                        @if($isCompleted)

                            <span class="level-status completed">
                                ✓ Selesai
                            </span>

                        @elseif($isOpen)

                            <span class="level-status open">
                                ● Terbuka
                            </span>

                        @else

                            <span class="level-status locked-status">
                                🔒 Terkunci
                            </span>

                        @endif

                    </div>


                    <div class="level-card-content">

                        <h3>
                            {{ $ecosystemIcon }}
                            {{ $level->judul }}
                        </h3>

                        <p>
                            {{ $level->deskripsi }}
                        </p>

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
                                ✓
                            @elseif($isOpen)
                                →
                            @else
                                🔒
                            @endif

                        </span>

                    </div>

                </a>

            @endforeach

        </div>

    </section>

</div>

@endsection
