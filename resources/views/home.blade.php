@extends('layouts.app')

@section('title', 'SIFARA - Wetland Learning Platform')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap');

    .landing-sifara {
        --forest: #2E7D4F;
        --forest-dark: #1B5E3A;
        --green: #4CAF7A;
        --sage: #A8D5B5;
        --mint: #E8F8EE;
        --cream: #FBFCF5;
        --gold: #FFD54F;
        --sky: #B3E5FC;
        --coral: #FF8A80;
        --text: #2D4A3A;
        --muted: #6B8A76;

        background: linear-gradient(180deg, #FBFCF5 0%, #F0F9EC 100%);
        color: var(--text);
        font-family: 'Nunito', sans-serif;
        overflow: hidden;
    }

    .landing-sifara * { box-sizing: border-box; }
    .landing-sifara svg { display: block; }

    .landing-container {
        width: min(1160px, calc(100% - 60px));
        margin: 0 auto;
    }

    /* ============ HERO ============ */
    .landing-hero {
        padding: 70px 0 60px;
        background:
            radial-gradient(circle at 85% 15%, rgba(255,213,79,.25), transparent 30%),
            radial-gradient(circle at 10% 80%, rgba(179,229,252,.35), transparent 35%),
            linear-gradient(180deg, #FBFCF5 0%, #EAF6E5 100%);
        position: relative;
    }

    .landing-hero-inner {
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        align-items: center;
        gap: 55px;
        min-height: 400px;
    }

    .landing-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        border-radius: 30px;
        background: linear-gradient(135deg, #FFF9E0, #E8F8EE);
        border: 2px solid #FFE082;
        color: var(--forest);
        font-size: 12px;
        font-weight: 900;
        letter-spacing: 1.2px;
        margin-bottom: 22px;
        box-shadow: 0 4px 12px rgba(255, 213, 79, .2);
        animation: gentle-bounce 3s ease-in-out infinite;
    }

    .landing-eyebrow svg {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    @keyframes gentle-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-4px); }
    }

    .landing-title {
        color: var(--forest-dark);
        font-family: 'Baloo 2', 'Nunito', cursive;
        font-size: clamp(38px, 5vw, 62px);
        line-height: 1.15;
        font-weight: 800;
        margin: 0 0 22px;
        letter-spacing: -.5px;
    }

    .landing-title span {
        background: linear-gradient(90deg, var(--green), var(--forest));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-style: italic;
    }

    .landing-description {
        max-width: 520px;
        color: var(--muted);
        font-size: 16px;
        line-height: 1.85;
        margin-bottom: 30px;
        font-weight: 600;
    }

    .landing-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 30px;
        background: linear-gradient(135deg, var(--green), var(--forest));
        color: white !important;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 900;
        text-decoration: none !important;
        box-shadow: 0 8px 20px rgba(76, 175, 122, .35);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
        letter-spacing: .3px;
    }

    .landing-button:hover {
        background: linear-gradient(135deg, var(--forest), var(--forest-dark));
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 14px 28px rgba(76, 175, 122, .45);
    }

    .landing-button svg {
        width: 20px;
        height: 20px;
        transition: transform .3s ease;
    }

    .landing-button:hover svg {
        transform: translateX(5px);
    }

    /* ============ VISUAL ============ */
    .landing-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 360px;
    }

    .landing-visual-circle {
        position: absolute;
        width: 330px;
        height: 330px;
        border-radius: 50%;
        background: linear-gradient(145deg, #C8E6C9, #A5D6A7, #81C784);
        border: 3px dashed rgba(255,255,255,.6);
        box-shadow:
            0 20px 40px rgba(76, 175, 122, .25),
            inset 0 -10px 30px rgba(46, 125, 79, .15);
        animation: slow-spin 25s linear infinite;
    }

    @keyframes slow-spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .landing-visual-circle::before {
        content: "";
        position: absolute;
        inset: 30px;
        border: 2px dashed rgba(255,255,255,.5);
        border-radius: 50%;
    }

    .landing-visual-content {
        position: relative;
        z-index: 2;
        width: 280px;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: float-bob 4s ease-in-out infinite;
    }

    @keyframes float-bob {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }

    .landing-visual-content img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 15px 15px rgba(33, 78, 56, .2));
    }

    .landing-fallback {
        text-align: center;
        color: var(--forest);
    }

    .landing-fallback svg {
        width: 130px;
        height: 130px;
        margin: 0 auto;
        animation: leaf-sway 3s ease-in-out infinite;
    }

    @keyframes leaf-sway {
        0%, 100% { transform: rotate(-5deg); }
        50% { transform: rotate(5deg); }
    }

    .landing-fallback p {
        color: var(--green);
        font-size: 13px;
        font-weight: 900;
        letter-spacing: 1.5px;
        margin-top: 14px;
    }

    .floating-deco {
        position: absolute;
        z-index: 3;
        filter: drop-shadow(0 6px 6px rgba(0,0,0,.08));
    }

    .floating-deco svg { width: 100%; height: 100%; }

    .floating-one {
        width: 42px;
        height: 42px;
        top: 15px;
        right: 25px;
        animation: float-1 5s ease-in-out infinite;
    }

    .floating-two {
        width: 38px;
        height: 38px;
        bottom: 30px;
        left: 10px;
        animation: float-2 6s ease-in-out infinite;
    }

    .floating-three {
        width: 30px;
        height: 30px;
        top: 45%;
        left: -5px;
        animation: float-3 4s ease-in-out infinite;
    }

    @keyframes float-1 {
        0%, 100% { transform: translate(0, 0) rotate(25deg); }
        50% { transform: translate(-8px, -12px) rotate(15deg); }
    }

    @keyframes float-2 {
        0%, 100% { transform: translate(0, 0) rotate(-30deg); }
        50% { transform: translate(10px, -10px) rotate(-20deg); }
    }

    @keyframes float-3 {
        0%, 100% { transform: translateY(0) scale(1); opacity: .7; }
        50% { transform: translateY(-15px) scale(1.2); opacity: 1; }
    }

    /* ============ DIVIDER ============ */
    .landing-divider {
        height: 2px;
        width: min(1160px, calc(100% - 60px));
        margin: 0 auto;
        background: linear-gradient(90deg, transparent, #C8E6C9, var(--gold), #C8E6C9, transparent);
        border-radius: 2px;
    }

    /* ============ FEATURES ============ */
    .landing-features {
        padding: 50px 0 85px;
        background: linear-gradient(180deg, #F0F9EC 0%, #FBFCF5 100%);
    }

    .features-heading {
        text-align: center;
        margin-bottom: 40px;
    }

    .features-heading span {
        display: inline-block;
        color: var(--forest);
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 2.5px;
        background: linear-gradient(135deg, #FFF9E0, #E8F8EE);
        padding: 8px 18px;
        border-radius: 20px;
        border: 2px solid #FFE082;
    }

    .features-heading h2 {
        color: var(--forest-dark);
        font-family: 'Baloo 2', 'Nunito', cursive;
        font-size: 34px;
        margin: 14px 0 10px;
        font-weight: 800;
    }

    .features-heading p {
        color: var(--muted);
        font-size: 14px;
        font-weight: 600;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
    }

    .feature-item {
        position: relative;
        padding: 28px 25px;
        min-height: 175px;
        display: flex;
        align-items: flex-start;
        gap: 18px;
        background: linear-gradient(145deg, #FFFFFF, #FAFFF7);
        border: 2px solid #E3F0DD;
        border-radius: 24px;
        box-shadow: 0 8px 24px rgba(76, 175, 122, .08);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
        overflow: hidden;
    }

    .feature-item::before {
        content: "";
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255,213,79,.15), transparent 70%);
        opacity: 0;
        transition: opacity .3s ease;
    }

    .feature-item:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: #A5D6A7;
        box-shadow: 0 16px 36px rgba(76, 175, 122, .18);
    }

    .feature-item:hover::before {
        opacity: 1;
    }

    .feature-icon {
        width: 58px;
        height: 58px;
        flex-shrink: 0;
        display: grid;
        place-items: center;
        border-radius: 18px;
        background: linear-gradient(135deg, #E8F8EE, #C8E6C9);
        box-shadow: 0 4px 10px rgba(76, 175, 122, .15);
        transition: transform .3s ease;
    }

    .feature-icon svg {
        width: 32px;
        height: 32px;
    }

    .feature-item:hover .feature-icon {
        transform: rotate(-8deg) scale(1.1);
    }

    .feature-item:nth-child(2) .feature-icon {
        background: linear-gradient(135deg, #FFF9E0, #FFE082);
        box-shadow: 0 4px 10px rgba(255, 213, 79, .25);
    }

    .feature-item:nth-child(3) .feature-icon {
        background: linear-gradient(135deg, #E3F2FD, #B3E5FC);
        box-shadow: 0 4px 10px rgba(179, 229, 252, .3);
    }

    .feature-item h3 {
        color: var(--forest-dark);
        font-family: 'Baloo 2', 'Nunito', cursive;
        font-size: 17px;
        font-weight: 800;
        margin: 4px 0 8px;
        line-height: 1.4;
    }

    .feature-item p {
        color: var(--muted);
        font-size: 13px;
        line-height: 1.65;
        margin: 0;
        font-weight: 600;
    }

    /* ============ BOTTOM NOTE ============ */
    .landing-note {
        padding: 0 0 60px;
        text-align: center;
    }

    .landing-note p {
        color: var(--muted);
        font-size: 13px;
        letter-spacing: .3px;
        font-weight: 600;
    }

    .landing-note strong {
        color: var(--forest);
        font-weight: 900;
        background: linear-gradient(90deg, var(--forest), var(--green));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 850px) {
        .landing-hero-inner {
            grid-template-columns: 1fr;
            gap: 30px;
            text-align: center;
        }

        .landing-description {
            margin-left: auto;
            margin-right: auto;
        }

        .landing-visual { min-height: 300px; }
        .landing-visual-circle { width: 280px; height: 280px; }
        .landing-visual-content { width: 240px; height: 260px; }

        .features-grid { grid-template-columns: 1fr; }
        .feature-item { min-height: 130px; }
        .features-heading h2 { font-size: 28px; }
    }

    @media (max-width: 500px) {
        .landing-container { width: calc(100% - 36px); }
        .landing-hero { padding: 45px 0 40px; }
        .landing-title { font-size: 36px; }
        .landing-description { font-size: 14px; }
        .landing-button { padding: 14px 26px; font-size: 14px; }

        .landing-visual { min-height: 250px; }
        .landing-visual-circle { width: 230px; height: 230px; }
        .landing-visual-content { width: 200px; height: 220px; }

        .landing-features { padding-bottom: 50px; }
        .features-heading h2 { font-size: 24px; }

        .feature-item {
            padding: 22px 20px;
            border-radius: 20px;
        }
    }

    /* Aksesibilitas */
    @media (prefers-reduced-motion: reduce) {
        .landing-sifara *, .landing-sifara *::before, .landing-sifara *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>

<div class="landing-sifara">

    <!-- HERO SECTION -->
    <section class="landing-hero">
        <div class="landing-container">
            <div class="landing-hero-inner">

                <div class="landing-copy">
                    <div class="landing-eyebrow">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 19C5 19 7 9 19 5C19 5 21 17 11 19C8 19.6 5 19 5 19Z" fill="#4CAF7A" stroke="#2E7D4F" stroke-width="1.4" stroke-linejoin="round"/>
                            <path d="M5 19L11 13" stroke="#2E7D4F" stroke-width="1.4" stroke-linecap="round"/>
                        </svg>
                        PETUALANGAN BELAJAR DIMULAI DI SINI
                    </div>

                    <h1 class="landing-title">
                        Jelajah &amp; Pelajari
                        <br>
                        <span>Ekosistem Lahan Basah</span>
                    </h1>

                    <p class="landing-description">
                        Temukan keajaiban rawa, gambut, dan mangrove
                        melalui materi pembelajaran yang menarik serta
                        permainan petualangan interaktif.
                    </p>

                    <a href="{{ route('register') }}" class="landing-button">
                        Mulai Petualangan
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="landing-visual">
                    <div class="landing-visual-circle"></div>

                    <span class="floating-deco floating-one">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 20C4 20 6 8 20 4C20 4 22 18 10 20C7 20.8 4 20 4 20Z" fill="#81C784" stroke="#2E7D4F" stroke-width="1.3" stroke-linejoin="round"/>
                            <path d="M4 20L11 13" stroke="#2E7D4F" stroke-width="1.3" stroke-linecap="round"/>
                        </svg>
                    </span>

                    <span class="floating-deco floating-two">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 21V11" stroke="#4CAF7A" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M12 12C12 12 8 11 7 7C7 7 11 6 13 9C13.5 9.8 13 11 12 12Z" fill="#A5D6A7" stroke="#2E7D4F" stroke-width="1.2" stroke-linejoin="round"/>
                            <path d="M12 14C12 14 16 13 17 9C17 9 13 8 11 11C10.5 11.8 11 13 12 14Z" fill="#C8E6C9" stroke="#2E7D4F" stroke-width="1.2" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <span class="floating-deco floating-three">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L13.8 9.2L21 11L13.8 12.8L12 20L10.2 12.8L3 11L10.2 9.2L12 2Z" fill="#FFD54F" stroke="#F9A825" stroke-width="1" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <div class="landing-visual-content">
                        @if(file_exists(public_path('images/rani-character.png')))
                            <img src="{{ asset('images/rani-character.png') }}" alt="Rani, pemandu petualangan SIFARA">
                        @else
                            <div class="landing-fallback">
                                <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 56C8 56 12 18 56 8C56 8 60 52 20 56C12 57.5 8 56 8 56Z" fill="#A5D6A7" stroke="#2E7D4F" stroke-width="2" stroke-linejoin="round"/>
                                    <path d="M8 56L32 32" stroke="#2E7D4F" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M20 44L28 40M14 50L22 46M26 36L34 32M32 30L40 26M38 24L46 20" stroke="#2E7D4F" stroke-width="1.4" stroke-linecap="round" opacity="0.6"/>
                                </svg>
                                <p>EXPLORE THE WETLAND</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="landing-divider"></div>

    <!-- FEATURES SECTION -->
    <section class="landing-features">
        <div class="landing-container">
            <div class="features-heading">
                <span>APA YANG BISA KAMU TEMUKAN?</span>
                <h2>Belajar Jadi Lebih Menyenangkan</h2>
                <p>Jelajahi lahan basah melalui pengalaman belajar interaktif.</p>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 8C16 8 12 6 6 6V25C12 25 16 27 16 27V8Z" fill="#FFFFFF" stroke="#2E7D4F" stroke-width="1.6" stroke-linejoin="round"/>
                            <path d="M16 8C16 8 20 6 26 6V25C20 25 16 27 16 27V8Z" fill="#FFFFFF" stroke="#2E7D4F" stroke-width="1.6" stroke-linejoin="round"/>
                            <path d="M16 8V27" stroke="#2E7D4F" stroke-width="1.6"/>
                            <path d="M9 11H13M9 15H13M9 19H13M19 11H23M19 15H23M19 19H23" stroke="#4CAF7A" stroke-width="1.4" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <h3>6 Modul Materi Lengkap</h3>
                        <p>Pelajari ekosistem lahan basah melalui materi yang ringkas dan mudah dipahami.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 11H23C25.8 11 28 13.2 28 16V18C28 21.3 25.3 24 22 24H21L19.5 22H12.5L11 24H10C6.7 24 4 21.3 4 18V16C4 13.2 6.2 11 9 11Z" fill="#FFFFFF" stroke="#2E7D4F" stroke-width="1.6" stroke-linejoin="round"/>
                            <circle cx="10.5" cy="17.5" r="2" fill="#4CAF7A"/>
                            <circle cx="21.5" cy="17.5" r="2" fill="#FFD54F"/>
                            <path d="M10.5 14.5V20.5M7.5 17.5H13.5" stroke="#2E7D4F" stroke-width="1.4" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <h3>2D Game Interaktif</h3>
                        <p>Kenali karakteristik ekosistem melalui permainan dan tantangan edukatif.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="16" r="11" fill="#FFFFFF" stroke="#2E7D4F" stroke-width="1.8"/>
                            <path d="M11 16.5L14.5 20L21 13" stroke="#4CAF7A" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div>
                        <h3>Simpan Progres Belajar</h3>
                        <p>Pantau perkembangan pembelajaran dan lanjutkan petualangan kapan saja.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-note">
        <div class="landing-container">
            <p>
                Explore, Learn, and Protect &mdash;
                <strong>SIFARA Wetland Learning Platform</strong>
            </p>
        </div>
    </section>

</div>

@endsection