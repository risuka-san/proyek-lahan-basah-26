
@extends('layouts.app')

@section('title', 'SIFARA - Wetland Learning Platform')

@section('content')

<style>
    .landing-sifara {
        --forest: #214E38;
        --forest-dark: #183D2B;
        --green: #477653;
        --sage: #A8C6A0;
        --mint: #E4EFE3;
        --cream: #F7F7F0;
        --gold: #EFC94C;
        --text: #314B39;
        --muted: #718174;

        background: var(--cream);
        color: var(--text);
        font-family: 'Nunito', sans-serif;
        overflow: hidden;
    }

    .landing-sifara * {
        box-sizing: border-box;
    }

    .landing-container {
        width: min(1160px, calc(100% - 60px));
        margin: 0 auto;
    }

    /* HERO */

    .landing-hero {
        padding: 65px 0 55px;
        background:
            radial-gradient(circle at 85% 20%, rgba(168,198,160,.20), transparent 28%),
            linear-gradient(180deg, #F7F7F0 0%, #F0F3E8 100%);
    }

    .landing-hero-inner {
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        align-items: center;
        gap: 55px;
        min-height: 390px;
    }

    .landing-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 9px 16px;
        border-radius: 30px;
        background: #E6EFE2;
        border: 1px solid #D5E5D1;
        color: #477653;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 1.4px;
        margin-bottom: 22px;
    }

    .landing-title {
        color: var(--forest-dark);
        font-family: 'Playfair Display', serif;
        font-size: clamp(38px, 5vw, 59px);
        line-height: 1.16;
        font-weight: 700;
        margin: 0 0 20px;
        letter-spacing: -.8px;
    }

    .landing-title span {
        color: #6B946F;
        font-style: italic;
    }

    .landing-description {
        max-width: 520px;
        color: var(--muted);
        font-size: 15px;
        line-height: 1.9;
        margin-bottom: 28px;
    }

    .landing-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 14px 24px;
        background: var(--forest);
        color: white !important;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 900;
        text-decoration: none !important;
        box-shadow: 0 7px 18px rgba(33,78,56,.16);
        transition: .25s ease;
    }

    .landing-button:hover {
        background: var(--forest-dark);
        transform: translateY(-3px);
        box-shadow: 0 12px 22px rgba(33,78,56,.20);
    }

    .landing-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 340px;
    }

    .landing-visual-circle {
        position: absolute;
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: linear-gradient(145deg, #D9E9D6, #B8D2B6);
        border: 1px solid #C4D9C0;
    }

    .landing-visual-circle::before {
        content: "";
        position: absolute;
        inset: 22px;
        border: 1px dashed rgba(45,90,63,.25);
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
    }

    .landing-visual-content img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 12px 12px rgba(33,78,56,.12));
    }

    .landing-fallback {
        text-align: center;
        color: var(--forest);
    }

    .landing-fallback .big-leaf {
        font-size: 115px;
        line-height: 1.2;
        filter: drop-shadow(0 10px 10px rgba(33,78,56,.12));
    }

    .landing-fallback p {
        color: #54745A;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .floating-leaf {
        position: absolute;
        z-index: 3;
        font-size: 34px;
    }

    .floating-one {
        top: 20px;
        right: 15px;
        transform: rotate(25deg);
    }

    .floating-two {
        bottom: 25px;
        left: 0;
        transform: rotate(-30deg);
    }

    .floating-three {
        top: 50%;
        left: 0;
        font-size: 25px;
    }

    /* DECORATIVE DIVIDER */

    .landing-divider {
        height: 1px;
        width: min(1160px, calc(100% - 60px));
        margin: 0 auto;
        background: linear-gradient(90deg, transparent, #D6E2D1, transparent);
    }

    /* FEATURES */

    .landing-features {
        padding: 35px 0 75px;
    }

    .features-heading {
        text-align: center;
        margin-bottom: 30px;
    }

    .features-heading span {
        color: #789579;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 2px;
    }

    .features-heading h2 {
        color: var(--forest-dark);
        font-family: 'Playfair Display', serif;
        font-size: 29px;
        margin: 8px 0;
        font-weight: 700;
    }

    .features-heading p {
        color: var(--muted);
        font-size: 13px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .feature-item {
        position: relative;
        padding: 25px 23px;
        min-height: 155px;
        display: flex;
        align-items: flex-start;
        gap: 17px;
        background: rgba(255,255,255,.78);
        border: 1px solid #E3EBDD;
        border-radius: 18px;
        box-shadow: 0 6px 20px rgba(33,78,56,.035);
        transition: .25s ease;
    }

    .feature-item:hover {
        transform: translateY(-5px);
        border-color: #C6D9C2;
        box-shadow: 0 12px 25px rgba(33,78,56,.08);
    }

    .feature-icon {
        width: 49px;
        height: 49px;
        flex-shrink: 0;
        display: grid;
        place-items: center;
        border-radius: 15px;
        background: #E8F1E5;
        font-size: 23px;
    }

    .feature-item:nth-child(2) .feature-icon {
        background: #F3EFD9;
    }

    .feature-item:nth-child(3) .feature-icon {
        background: #E1EEE8;
    }

    .feature-item h3 {
        color: var(--forest);
        font-size: 15px;
        font-weight: 900;
        margin: 2px 0 8px;
        line-height: 1.5;
    }

    .feature-item p {
        color: #819083;
        font-size: 12px;
        line-height: 1.7;
        margin: 0;
    }

    /* BOTTOM NOTE */

    .landing-note {
        padding: 0 0 55px;
        text-align: center;
    }

    .landing-note p {
        color: #829080;
        font-size: 12px;
        letter-spacing: .3px;
    }

    .landing-note strong {
        color: var(--forest);
    }

    /* RESPONSIVE */

    @media (max-width: 850px) {
        .landing-hero-inner {
            grid-template-columns: 1fr;
            gap: 20px;
            text-align: center;
        }

        .landing-description {
            margin-left: auto;
            margin-right: auto;
        }

        .landing-visual {
            min-height: 290px;
        }

        .landing-visual-circle {
            width: 270px;
            height: 270px;
        }

        .landing-visual-content {
            width: 240px;
            height: 260px;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .feature-item {
            min-height: 120px;
        }
    }

    @media (max-width: 500px) {
        .landing-container {
            width: calc(100% - 36px);
        }

        .landing-hero {
            padding: 40px 0 35px;
        }

        .landing-title {
            font-size: 37px;
        }

        .landing-description {
            font-size: 13px;
        }

        .landing-visual {
            min-height: 240px;
        }

        .landing-visual-circle {
            width: 220px;
            height: 220px;
        }

        .landing-visual-content {
            width: 200px;
            height: 220px;
        }

        .landing-features {
            padding-bottom: 45px;
        }

        .features-heading h2 {
            font-size: 25px;
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
                        🌿 PETUALANGAN BELAJAR DIMULAI DI SINI
                    </div>

                    <h1 class="landing-title">
                        Jelajah & Pelajari
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
                        <span>→</span>
                    </a>

                </div>

                <div class="landing-visual">

                    <div class="landing-visual-circle"></div>

                    <span class="floating-leaf floating-one">🍃</span>
                    <span class="floating-leaf floating-two">🌱</span>
                    <span class="floating-leaf floating-three">✦</span>

                    <div class="landing-visual-content">

                        @if(file_exists(public_path('images/rani-character.png')))
                            <img
                                src="{{ asset('images/rani-character.png') }}"
                                alt="Rani, pemandu petualangan SIFARA"
                            >
                        @else
                            <div class="landing-fallback">
                                <div class="big-leaf">🌿</div>
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
                    <div class="feature-icon">📖</div>
                    <div>
                        <h3>6 Modul Materi Lengkap</h3>
                        <p>Pelajari ekosistem lahan basah melalui materi yang ringkas dan mudah dipahami.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">🎮</div>
                    <div>
                        <h3>2D Game Interaktif</h3>
                        <p>Kenali karakteristik ekosistem melalui permainan dan tantangan edukatif.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">✅</div>
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
                Explore, Learn, and Protect —
                <strong>SIFARA Wetland Learning Platform</strong>
            </p>
        </div>
    </section>

</div>

@endsection
