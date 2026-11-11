
@extends('layouts.app')

@section('title', 'Materi Pembelajaran - SIFARA')

@section('content')

@php
    $totalMaterials = $materials->count();
    $materialNumber = $currentIndex + 1;

    $progress = $totalMaterials > 0
        ? round(($materialNumber / $totalMaterials) * 100)
        : 0;

    $ecosystemIcons = [
        'KL' => '🌾',
        'PS' => '🌊',
        'RL' => '🪷',
        'RG' => '🌱',
        'MG' => '🌳',
    ];

    $ecosystemIcon = $ecosystemIcons[$level->kode] ?? '🌿';
@endphp

<style>
/* ========================================
   SIFARA - BOTANICAL EDITORIAL MATERIAL
======================================== */

.sifara-material {
    --forest: #183D2B;
    --green: #285E43;
    --sage: #A8C6A0;
    --mint: #D9EBDD;
    --cream: #F6F3E9;
    --gold: #EFC94C;
    --coral: #E8876D;
    --muted: #718477;

    max-width: 1440px;
    margin: auto;
    padding: 38px 50px 75px;
    color: #263D30;
}

.sifara-material *,
.sifara-material *::before,
.sifara-material *::after {
    box-sizing: border-box;
}

/* BREADCRUMB */

.material-breadcrumb {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 25px;
    font-size: .85rem;
    color: var(--muted);
}

.material-breadcrumb a {
    color: var(--green);
    text-decoration: none;
    font-weight: 800;
}

.material-breadcrumb a:hover {
    color: var(--forest);
}

/* MAIN LAYOUT */

.material-layout {
    display: grid;
    grid-template-columns: 285px minmax(0,1fr);
    align-items: start;
    gap: 28px;
}

/* SIDEBAR */

.material-sidebar {
    position: sticky;
    top: 25px;
    padding: 25px;
    background: #FFFFFF;
    border: 1px solid #E4EADF;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(33,78,56,.055);
}

.sidebar-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 28px;
    color: var(--green);
    font-size: .85rem;
    font-weight: 800;
    text-decoration: none;
}

.sidebar-back:hover {
    color: var(--forest);
}

.sidebar-caption {
    display: block;
    margin-bottom: 10px;
    color: #87968A;
    font-size: .68rem;
    font-weight: 800;
    letter-spacing: 1.3px;
}

.sidebar-level-title {
    margin-bottom: 22px;
    color: var(--forest);
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    line-height: 1.4;
}

.sidebar-progress {
    margin-bottom: 25px;
    padding: 15px;
    background: #EDF4EB;
    border-radius: 14px;
}

.sidebar-progress-info {
    display: flex;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 10px;
    color: var(--green);
    font-size: .73rem;
    font-weight: 800;
}

.progress-track {
    height: 7px;
    overflow: hidden;
    background: #D6E4D5;
    border-radius: 20px;
}

.progress-fill {
    height: 100%;
    background: #60956D;
    border-radius: inherit;
    transition: width .3s ease;
}

.material-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.material-menu li {
    margin-bottom: 9px;
}

.material-menu a {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    padding: 13px;
    color: #607367;
    background: transparent;
    border: 1px solid transparent;
    border-radius: 12px;
    font-size: .82rem;
    font-weight: 700;
    line-height: 1.5;
    text-decoration: none;
    transition: .2s ease;
}

.material-menu a:hover {
    color: var(--forest);
    background: #F4F7F1;
}

.material-menu a.active {
    color: var(--forest);
    background: #E3F0E4;
    border-color: #D1E4D2;
}

.menu-number {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 25px;
    height: 25px;
    border-radius: 8px;
    background: rgba(255,255,255,.8);
    font-size: .7rem;
}

/* MAIN CONTENT */

.material-main {
    min-width: 0;
    padding: 35px;
    background: #FFFFFF;
    border: 1px solid #E9EDE5;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(33,78,56,.055);
}

/* EDITORIAL HEADER */

.material-hero {
    position: relative;
    overflow: hidden;
    padding: 35px;
    margin-bottom: 30px;
    color: white;
    background:
        radial-gradient(circle at 90% 10%,
            rgba(204,229,183,.2), transparent 32%),
        linear-gradient(125deg,#183D2B,#285E43 65%,#527F60);
    border-radius: 20px;
}

.material-hero::after {
    content: "✿";
    position: absolute;
    right: 25px;
    bottom: -60px;
    color: rgba(255,255,255,.12);
    font-size: 12rem;
    pointer-events: none;
}

.material-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 13px;
    color: #E8F1E4;
    background: rgba(255,255,255,.13);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 30px;
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: .7px;
}

.material-hero h1 {
    position: relative;
    z-index: 1;
    max-width: 700px;
    margin: 20px 0 10px;
    color: white;
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem,4vw,2.9rem);
    line-height: 1.2;
}

.material-hero h2 {
    position: relative;
    z-index: 1;
    margin: 0;
    color: #F0D77B;
    font-size: 1.05rem;
    font-weight: 700;
    line-height: 1.6;
}

.material-hero-icon {
    position: absolute;
    z-index: 1;
    top: 27px;
    right: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 90px;
    height: 90px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 50%;
    background: rgba(255,255,255,.10);
    font-size: 3rem;
}

/* CONTENT */

.material-description {
    margin-bottom: 28px;
    color: #718477;
    font-size: .9rem;
    font-weight: 700;
}

.material-body {
    color: #465B4B;
    font-size: 1rem;
    line-height: 2;
    overflow-wrap: anywhere;
}

.material-body p {
    margin-bottom: 18px;
}

.material-body h2,
.material-body h3 {
    margin-top: 25px;
    margin-bottom: 13px;
    color: var(--forest);
    font-family: 'Playfair Display', serif;
    line-height: 1.4;
}

.material-body ul,
.material-body ol {
    padding-left: 25px;
    margin-bottom: 20px;
}

.material-body li {
    margin-bottom: 9px;
}

/* FACT CARD */

.material-fact {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    margin: 32px 0;
    padding: 28px 32px;
    background: linear-gradient(120deg,#E2F0E1,#D0E6D1);
    border: 1px solid #C5DFC8;
    border-radius: 20px;
}

.material-fact::after {
    content: "";
    position: absolute;
    width: 170px;
    height: 170px;
    right: -60px;
    top: -80px;
    border: 1px solid rgba(45,106,79,.12);
    border-radius: 50%;
}

.fact-label {
    color: #52745B;
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: 1px;
}

.fact-number {
    margin: 8px 0;
    color: var(--forest);
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
}

.fact-description {
    color: #54705A;
    font-size: .9rem;
    line-height: 1.7;
}

.fact-icon {
    flex-shrink: 0;
    font-size: 4.5rem;
}

/* BOTTOM NAVIGATION */

.material-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-top: 40px;
    padding-top: 25px;
    border-top: 1px solid #E7ECE5;
}

.material-nav-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 45px;
    padding: 11px 18px;
    border: 1px solid #D8E5D8;
    border-radius: 11px;
    background: #FFFFFF;
    color: var(--green);
    font-size: .85rem;
    font-weight: 800;
    text-decoration: none;
    transition: .2s ease;
}

.material-nav-btn:hover {
    color: var(--forest);
    background: #EDF4EB;
    transform: translateY(-2px);
}

.material-nav-btn.primary {
    background: #EFC94C;
    border-color: #EFC94C;
    color: #263D30;
}

.material-nav-btn.primary:hover {
    background: #F5D96C;
}

/* RESPONSIVE */

@media(max-width: 1000px) {
    .sifara-material {
        padding: 30px 25px 55px;
    }

    .material-layout {
        grid-template-columns: 240px minmax(0,1fr);
        gap: 18px;
    }

    .material-main {
        padding: 25px;
    }
}

@media(max-width: 760px) {
    .sifara-material {
        padding: 22px 17px 45px;
    }

    .material-layout {
        grid-template-columns: 1fr;
    }

    .material-sidebar {
        position: static;
    }

    .material-main {
        padding: 20px;
    }

    .material-hero {
        padding: 27px 22px;
    }

    .material-hero-icon {
        width: 60px;
        height: 60px;
        top: 20px;
        right: 20px;
        font-size: 2rem;
    }

    .material-hero h1 {
        max-width: 85%;
        font-size: 2rem;
    }

    .material-fact {
        padding: 22px;
    }

    .fact-icon {
        font-size: 3rem;
    }
}

@media(max-width: 450px) {
    .material-hero-icon {
        display: none;
    }

    .material-hero h1 {
        max-width: 100%;
    }

    .material-navigation {
        flex-direction: column;
        align-items: stretch;
    }

    .material-nav-btn {
        width: 100%;
    }
}
</style>


<div class="sifara-material">

    <!-- BREADCRUMB -->

    <div class="material-breadcrumb">
        <a href="{{ route('dashboard') }}">Beranda</a>
        <span>›</span>
        <span>Materi</span>
        <span>›</span>
        <span>{{ $level->kode }}</span>
    </div>


    <div class="material-layout">

        <!-- SIDEBAR -->

        <aside class="material-sidebar">

            <a href="{{ route('dashboard') }}" class="sidebar-back">
                ← Kembali ke Dashboard
            </a>

            <span class="sidebar-caption">
                RUANG PEMBELAJARAN
            </span>

            <h2 class="sidebar-level-title">
                {{ $ecosystemIcon }}
                {{ $level->judul }}
            </h2>


            <!-- PROGRESS MATERI -->

            <div class="sidebar-progress">

                <div class="sidebar-progress-info">
                    <span>Progres Materi</span>
                    <span>{{ $materialNumber }}/{{ $totalMaterials }}</span>
                </div>

                <div class="progress-track">
                    <div class="progress-fill"
                         style="width: {{ $progress }}%">
                    </div>
                </div>

            </div>


            <!-- DAFTAR MATERI -->

            <span class="sidebar-caption">
                PILIH MATERI BELAJAR
            </span>

            <ul class="material-menu">

                @foreach($materials as $item)

                    <li>

                        <a
                            href="{{ route('materi.show', [
                                'level_id' => $level->id,
                                'material_id' => $item->id
                            ]) }}"
                            class="{{ $material->id == $item->id ? 'active' : '' }}"
                            @if($material->id == $item->id)
                                aria-current="page"
                            @endif
                        >

                            <span class="menu-number">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <span>
                                {{ $item->judul }}
                            </span>

                        </a>

                    </li>

                @endforeach

            </ul>

        </aside>


        <!-- MAIN CONTENT -->

        <article class="material-main">

            <!-- EDITORIAL HEADER -->

            <header class="material-hero">

                <span class="material-eyebrow">
                    {{ $level->kode }}
                    • MATERI {{ $materialNumber }}
                </span>

                <div class="material-hero-icon">
                    {{ $ecosystemIcon }}
                </div>

                <h1>
                    {{ $material->judul }}
                </h1>

                @if($material->sub_judul)
                    <h2>
                        {{ $material->sub_judul }}
                    </h2>
                @endif

            </header>


            <!-- SHORT DESCRIPTION -->

            @if($material->deskripsi_singkat)
                <p class="material-description">
                    {{ $material->deskripsi_singkat }}
                </p>
            @endif


            <!-- MATERIAL CONTENT -->

            <div class="material-body">

                {!! nl2br(e($material->konten)) !!}

            </div>


            <!-- IMPORTANT FACT -->

            @if($material->fakta_angka || $material->fakta_teks)

                <section class="material-fact">

                    <div>

                        <span class="fact-label">
                            ✦ FAKTA MENARIK
                        </span>

                        @if($material->fakta_angka)
                            <h2 class="fact-number">
                                {{ $material->fakta_angka }}
                            </h2>
                        @endif

                        @if($material->fakta_teks)
                            <p class="fact-description">
                                {{ $material->fakta_teks }}
                            </p>
                        @endif

                    </div>

                    <div class="fact-icon">
                        🌱
                    </div>

                </section>

            @endif


            <!-- MATERIAL NAVIGATION -->

            <nav class="material-navigation">

                @if($previousMaterial)

                    <a
                        href="{{ route('materi.show', [
                            'level_id' => $level->id,
                            'material_id' => $previousMaterial->id
                        ]) }}"
                        class="material-nav-btn"
                    >
                        ← Materi Sebelumnya
                    </a>

                @else

                    <span></span>

                @endif


                @if($nextMaterial)

                    <a
                        href="{{ route('materi.show', [
                            'level_id' => $level->id,
                            'material_id' => $nextMaterial->id
                        ]) }}"
                        class="material-nav-btn primary"
                    >
                        Materi Selanjutnya →
                    </a>

                @else

                    <a
                        href="{{ route('peta.game') }}"
                        class="material-nav-btn primary"
                    >
                        Selesai & Uji Kemampuan →
                    </a>

                @endif

            </nav>

        </article>

    </div>

</div>

@endsection
