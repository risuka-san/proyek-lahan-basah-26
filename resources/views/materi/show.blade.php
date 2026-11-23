@extends('layouts.app')

@section('title', 'Materi Pembelajaran - SIFARA')

@section('content')

    @php
        $totalMaterials = $materials->count();
        $materialNumber = $currentIndex + 1;

        $progress = $totalMaterials > 0
            ? round(($materialNumber / $totalMaterials) * 100)
            : 0;

        // Ilustrasi vektor flat 2D berdasarkan kelompok materi Geografi.
        $levelIllustrations = [
            'BIO' => '<svg viewBox="0 0 64 64" role="img" aria-label="Biosfer"><circle cx="32" cy="32" r="27" fill="#B8DDBB"/><path d="M12 25l12-9 9 5-3 12-13 4zM37 13l12 8 5 12-10 5-7-8zM23 43l10-7 12 5-3 11-13-1z" fill="#4F9665"/><path d="M32 5v54M5 32h54" stroke="#2E7D4F" stroke-width="1.5" opacity=".35"/></svg>',
            'BMD' => '<svg viewBox="0 0 64 64" role="img" aria-label="Bioma"><path d="M32 5L14 34h10L16 47h32L40 34h10L32 5z" fill="#4F9665"/><path d="M32 43v15" stroke="#8B6345" stroke-width="5" stroke-linecap="round"/><circle cx="51" cy="12" r="6" fill="#FFD66B"/></svg>',
            'FFI' => '<svg viewBox="0 0 64 64" role="img" aria-label="Flora dan fauna Indonesia"><path d="M29 57V25" stroke="#548B58" stroke-width="4" stroke-linecap="round"/><path d="M29 39C13 39 9 27 12 17c13-2 21 8 17 22z" fill="#83B77F"/><path d="M29 30C29 16 40 9 52 13c0 13-10 21-23 17z" fill="#4F9665"/><circle cx="45" cy="47" r="8" fill="#E6B66C"/><path d="M40 44l-4-7 9 3 8-3-4 9" fill="#B77D45"/></svg>',
            'SDA' => '<svg viewBox="0 0 64 64" role="img" aria-label="Sumber daya alam"><path d="M5 48L23 17l12 20 10-15 14 26H5z" fill="#8BAF8B"/><path d="M23 17l7 12-7-2-5 4 5-14z" fill="#F5F0E3"/><path d="M7 54h50" stroke="#8B9B72" stroke-width="3" stroke-linecap="round"/></svg>',
            'PL' => '<svg viewBox="0 0 64 64" role="img" aria-label="Pelestarian lingkungan"><path d="M31 57V25" stroke="#548B58" stroke-width="4" stroke-linecap="round"/><path d="M31 40C15 41 10 29 13 18c13-2 21 8 18 22z" fill="#83B77F"/><path d="M31 31C31 17 42 10 54 14c0 13-10 21-23 17z" fill="#4F9665"/><path d="M13 50l9 8 24-25" fill="none" stroke="#2E7D4F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        ];
        $levelIllustration = $levelIllustrations[$level->kode] ?? $levelIllustrations['BIO'];
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

        .material-breadcrumb .breadcrumb-separator {
            display: inline-flex;
            align-items: center;
            color: #A0ADA1;
        }

        .material-breadcrumb .breadcrumb-separator svg {
            width: 13px;
            height: 13px;
            display: block;
        }

        .sidebar-back svg,
        .material-nav-btn svg {
            width: 17px;
            height: 17px;
            flex: 0 0 auto;
            display: block;
        }

        /* MAIN LAYOUT */

        .material-layout {
            display: grid;
            grid-template-columns: 285px minmax(0, 1fr);
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
            box-shadow: 0 8px 25px rgba(33, 78, 56, .055);
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

        .sidebar-level-illustration {
            display: inline-flex;
            width: 38px;
            height: 38px;
            vertical-align: middle;
            margin-right: 5px;
        }

        .sidebar-level-illustration svg {
            width: 100%;
            height: 100%;
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
            background: rgba(255, 255, 255, .8);
            font-size: .7rem;
        }

        /* MAIN CONTENT */

        .material-main {
            min-width: 0;
            padding: 35px;
            background: #FFFFFF;
            border: 1px solid #E9EDE5;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(33, 78, 56, .055);
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
                    rgba(204, 229, 183, .2), transparent 32%),
                linear-gradient(125deg, #183D2B, #285E43 65%, #527F60);
            border-radius: 20px;
        }

        .material-hero::after {
            content: "";
            position: absolute;
            right: 25px;
            bottom: -85px;
            width: 210px;
            height: 210px;
            border: 2px dashed rgba(255, 255, 255, .13);
            border-radius: 50%;
            pointer-events: none;
        }

        .material-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            color: #E8F1E4;
            background: rgba(255, 255, 255, .13);
            border: 1px solid rgba(255, 255, 255, .18);
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
            font-size: clamp(2rem, 4vw, 2.9rem);
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
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 50%;
            background: rgba(255, 255, 255, .10);
        }

        .material-hero-icon svg {
            width: 66px;
            height: 66px;
            display: block;
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

        /* MATERIAL IMAGE */

        .material-image {
            margin: 28px 0 32px;
            overflow: hidden;
            background: #F1F5EE;
            border: 1px solid #E2EADF;
            border-radius: 18px;
        }

        .material-image img {
            display: block;
            width: 100%;
            max-height: 430px;
            object-fit: cover;
        }

        .material-image figcaption {
            padding: 13px 17px;
            color: #718477;
            font-size: .78rem;
            line-height: 1.6;
        }

        .material-image figcaption a {
            color: #285E43;
            font-weight: 800;
            text-decoration: none;
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
            background: linear-gradient(120deg, #E2F0E1, #D0E6D1);
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
            border: 1px solid rgba(45, 106, 79, .12);
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
            width: 76px;
            height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fact-icon svg {
            width: 68px;
            height: 68px;
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

        .material-nav-btn {
            white-space: normal;
        }

        /* RESPONSIVE */

        @media(max-width: 1000px) {
            .sifara-material {
                padding: 30px 25px 55px;
            }

            .material-layout {
                grid-template-columns: 240px minmax(0, 1fr);
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
                width: 54px;
                height: 54px;
            }

            .fact-icon svg {
                width: 50px;
                height: 50px;
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
            <span class="breadcrumb-separator" aria-hidden="true">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 3L11 8L6 13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span>Materi</span>
            <span class="breadcrumb-separator" aria-hidden="true">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 3L11 8L6 13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span>{{ $level->kode }}</span>
        </div>


        <div class="material-layout">

            <!-- SIDEBAR -->

            <aside class="material-sidebar">

                <a href="{{ route('dashboard') }}" class="sidebar-back">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12H5M5 12L11 6M5 12L11 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Kembali ke Dashboard
                </a>

                <span class="sidebar-caption">
                    RUANG PEMBELAJARAN
                </span>

                <h2 class="sidebar-level-title">
                    <span class="sidebar-level-illustration">{!! $levelIllustration !!}</span>
                    {{ $level->judul }}
                </h2>


                <!-- PROGRESS MATERI -->

                <div class="sidebar-progress">

                    <div class="sidebar-progress-info">
                        <span>Progres Materi</span>
                        <span>{{ $materialNumber }}/{{ $totalMaterials }}</span>
                    </div>

                    <div class="progress-track">
                        <div class="progress-fill" style="width: {{ $progress }}%">
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

                                        <a href="{{ route('materi.show', [
                            'level_id' => $level->id,
                            'material_id' => $item->id
                        ]) }}" class="{{ $material->id == $item->id ? 'active' : '' }}"
                                            @if($material->id == $item->id) aria-current="page" @endif>

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
                        <svg viewBox="0 0 8 8" width="8" height="8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="4" cy="4" r="3" fill="#F0D77B"/>
                        </svg>
                        MATERI {{ $materialNumber }}
                    </span>

                    <div class="material-hero-icon">
                        {!! $levelIllustration !!}
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

                {{-- MATERIAL IMAGE --}}
                @if($material->gambar)
                    <figure class="material-image">

                        <img src="{{ asset($material->gambar) }}" alt="{{ $material->judul }}" loading="lazy">

                        @if($material->gambar_caption || $material->gambar_sumber)
                            <figcaption>
                                @if($material->gambar_caption)
                                    {{ $material->gambar_caption }}
                                @endif

                                @if($material->gambar_sumber)
                                    <br>
                                    Sumber:
                                    {{ $material->gambar_sumber }}
                                @endif
                            </figcaption>
                        @endif

                    </figure>
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
                                FAKTA MENARIK
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

                        <div class="fact-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="32" cy="32" r="28" fill="#B8DDBB"/>
                                <path d="M32 53V28" stroke="#548B58" stroke-width="4" stroke-linecap="round"/>
                                <path d="M32 38C18 39 13 28 16 18C28 16 36 25 32 38Z" fill="#83B77F"/>
                                <path d="M32 30C32 17 43 11 53 15C53 27 44 34 32 30Z" fill="#4F9665"/>
                            </svg>
                        </div>

                    </section>

                @endif


                <!-- MATERIAL NAVIGATION -->

                <nav class="material-navigation">

                    @if($previousMaterial)

                                    <a href="{{ route('materi.show', [
                            'level_id' => $level->id,
                            'material_id' => $previousMaterial->id
                        ]) }}" class="material-nav-btn">
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 12H5M5 12L11 6M5 12L11 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        Materi Sebelumnya
                                    </a>

                    @else

                        <span></span>

                    @endif


                    @if($nextMaterial)

                                    <a href="{{ route('materi.show', [
                            'level_id' => $level->id,
                            'material_id' => $nextMaterial->id
                        ]) }}" class="material-nav-btn primary">
                                        Materi Selanjutnya
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>

                    @else

                        <a href="{{ route('peta.game') }}" class="material-nav-btn primary">
                            Selesai & Uji Kemampuan
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>

                    @endif

                </nav>

            </article>

        </div>

    </div>

@endsection