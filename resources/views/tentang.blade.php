@extends('layouts.app')

@section('title', 'Tentang SIFARA - Wetland Learning Platform')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap');

    .about-page {
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

        background: linear-gradient(180deg, #FBFCF5 0%, #F0F9EC 100%);
        color: var(--text);
        font-family: 'Nunito', sans-serif;
        padding-bottom: 60px;
        overflow: hidden;
    }

    .about-page * { box-sizing: border-box; }
    .about-page svg { display: block; }

    .about-container {
        width: min(1160px, calc(100% - 60px));
        margin: 0 auto;
    }

    .about-label {
        display: inline-block;
        color: var(--forest);
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 2px;
        background: linear-gradient(135deg, #FFF9E0, #E8F8EE);
        padding: 8px 18px;
        border-radius: 20px;
        border: 2px solid #FFE082;
        margin-bottom: 20px;
    }

    /* ============ HERO ============ */
    .about-hero {
        position: relative;
        overflow: hidden;
        min-height: 400px;
        padding: 80px 0;
        background:
            radial-gradient(circle at 85% 15%, rgba(255,213,79,.25), transparent 30%),
            radial-gradient(circle at 10% 80%, rgba(179,229,252,.35), transparent 35%),
            linear-gradient(180deg, #FBFCF5 0%, #EAF6E5 100%);
    }

    .about-hero-content {
        max-width: 720px;
        position: relative;
        z-index: 2;
    }

    .about-hero h1 {
        font-family: 'Baloo 2', 'Nunito', cursive;
        font-size: clamp(2.3rem, 5vw, 3.8rem);
        line-height: 1.15;
        color: var(--forest-dark);
        margin-bottom: 22px;
        font-weight: 800;
    }

    .about-hero h1 span {
        display: block;
        background: linear-gradient(90deg, var(--green), var(--forest));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-style: italic;
    }

    .about-hero p {
        max-width: 620px;
        color: var(--muted);
        line-height: 1.9;
        font-size: 16px;
        font-weight: 600;
    }

    .about-hero-decoration {
        position: absolute;
        right: 10%;
        top: 25%;
        width: 250px;
        height: 250px;
        opacity: .15;
        pointer-events: none;
    }

    .about-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 25px;
        padding: 15px 28px;
        border-radius: 30px;
        background: linear-gradient(135deg, var(--green), var(--forest));
        color: white !important;
        text-decoration: none !important;
        font-weight: 900;
        font-size: 15px;
        box-shadow: 0 8px 20px rgba(76, 175, 122, .35);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
    }

    .about-button:hover {
        background: linear-gradient(135deg, var(--forest), var(--forest-dark));
        transform: translateY(-4px) scale(1.03);
        box-shadow: 0 14px 28px rgba(76, 175, 122, .45);
    }

    .about-button svg {
        width: 18px;
        height: 18px;
        transition: transform .3s ease;
    }

    .about-button:hover svg {
        transform: translateX(5px);
    }

    /* ============ SECTION HEADING ============ */
    .about-section, .about-objectives, .about-developers, .about-references {
        padding: 75px 0;
    }

    .about-objectives, .about-references {
        background: linear-gradient(180deg, #F0F9EC 0%, #E8F4E3 100%);
    }

    .about-heading {
        text-align: center;
        max-width: 650px;
        margin: 0 auto 45px;
    }

    .about-heading h2 {
        font-family: 'Baloo 2', 'Nunito', cursive;
        color: var(--forest-dark);
        font-size: 2.3rem;
        margin-bottom: 12px;
        font-weight: 800;
    }

    .about-heading p {
        color: var(--muted);
        line-height: 1.7;
        font-size: 15px;
        font-weight: 600;
    }

    /* ============ ABOUT DESCRIPTION ============ */
    .about-description {
        max-width: 950px;
        margin: auto;
        display: flex;
        gap: 25px;
        padding: 40px;
        border-radius: 24px;
        background: linear-gradient(145deg, #FFFFFF, #FAFFF7);
        border: 2px solid #E3F0DD;
        box-shadow: 0 8px 30px rgba(76, 175, 122, .08);
    }

    .about-icon {
        flex-shrink: 0;
        width: 65px;
        height: 65px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #E8F8EE, #C8E6C9);
    }

    .about-icon svg {
        width: 35px;
        height: 35px;
    }

    .about-description h3 {
        font-family: 'Baloo 2', 'Nunito', cursive;
        color: var(--forest-dark);
        font-size: 1.5rem;
        font-weight: 800;
        margin-top: 0;
        margin-bottom: 15px;
    }

    .about-description p {
        color: var(--muted);
        line-height: 1.85;
        text-align: justify;
        font-size: 14.5px;
        margin-bottom: 15px;
    }
    .about-description p:last-child { margin-bottom: 0; }

    /* ============ OBJECTIVES ============ */
    .objective-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .objective-card {
        padding: 30px 24px;
        background: linear-gradient(145deg, #FFFFFF, #FAFFF7);
        border: 2px solid #E3F0DD;
        border-radius: 24px;
        box-shadow: 0 8px 24px rgba(76, 175, 122, .08);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
        position: relative;
        overflow: hidden;
    }

    .objective-card:hover {
        transform: translateY(-6px);
        border-color: #A5D6A7;
        box-shadow: 0 12px 30px rgba(76, 175, 122, .15);
    }

    .objective-number {
        position: absolute;
        top: 20px;
        right: 20px;
        color: #C8E6C9;
        font-weight: 900;
        font-size: 1.2rem;
    }

    .objective-icon {
        width: 55px;
        height: 55px;
        border-radius: 16px;
        background: linear-gradient(135deg, #E8F8EE, #C8E6C9);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .objective-icon svg { width: 30px; height: 30px; }

    .objective-card h3 {
        color: var(--forest-dark);
        font-family: 'Baloo 2', 'Nunito', cursive;
        font-size: 1.15rem;
        margin-bottom: 12px;
        font-weight: 800;
    }

    .objective-card p {
        color: var(--muted);
        font-size: .9rem;
        line-height: 1.7;
        font-weight: 600;
    }

    /* ============ DEVELOPERS & SUPERVISOR (FOTO) ============ */
    .developer-grid {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 40px;
    }

    .developer-card, .supervisor-card {
        background: linear-gradient(145deg, #FFFFFF, #FAFFF7);
        border: 2px solid #E3F0DD;
        border-radius: 24px;
        box-shadow: 0 8px 24px rgba(76, 175, 122, .08);
        text-align: center;
        padding: 35px 30px;
        transition: .3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .developer-card { width: 100%; max-width: 320px; }

    .developer-card:hover, .supervisor-card:hover {
        transform: translateY(-8px);
        border-color: #A5D6A7;
        box-shadow: 0 16px 36px rgba(76, 175, 122, .18);
    }

    /* Foto Container */
    .profile-image-wrapper {
        width: 120px;
        height: 120px;
        margin: 0 auto 20px;
        border-radius: 50%;
        padding: 5px;
        background: linear-gradient(135deg, var(--green), var(--forest));
        position: relative;
    }

    .profile-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid white;
        background-color: #FFF;
    }

    .profile-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: #E8F8EE;
        border: 3px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #A5D6A7;
    }
    
    .profile-placeholder svg { width: 60px; height: 60px; }

    .developer-number {
        color: #81977B;
        font-size: .75rem;
        letter-spacing: 1.5px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .developer-card h3, .supervisor-card h3 {
        color: var(--forest-dark);
        font-family: 'Baloo 2', 'Nunito', cursive;
        margin: 12px 0 5px;
        font-size: 1.4rem;
        font-weight: 800;
    }

    .developer-card p, .supervisor-card p {
        color: var(--muted);
        font-size: .95rem;
        font-weight: 600;
        margin: 0;
    }

    /* ============ NIM & SOSMED BARU ============ */
    .dev-nim {
        display: inline-block;
        margin-top: 5px;
        padding: 4px 12px;
        background: #F0F9EC;
        color: var(--forest);
        font-size: .8rem;
        font-weight: 800;
        border-radius: 20px;
        border: 1px solid #C8E6C9;
    }

    .dev-socials {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .dev-socials a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #F8FCF5;
        color: var(--muted);
        border: 1px solid #E3F0DD;
        transition: .3s ease;
        text-decoration: none;
    }

    .dev-socials a:hover {
        background: var(--forest);
        color: white;
        transform: translateY(-3px);
        border-color: var(--forest);
    }

    .dev-socials svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }

    /* Dosen Card */
    .supervisor-card {
        max-width: 400px;
        margin: 0 auto;
        background: linear-gradient(145deg, #FFF9E0, #FFFFFF);
        border-color: #FFE082;
    }

    .supervisor-card:hover {
        border-color: #FFCA28;
        box-shadow: 0 16px 36px rgba(255, 213, 79, .25);
    }

    .supervisor-card .profile-image-wrapper {
        width: 140px;
        height: 140px;
        background: linear-gradient(135deg, #FFD54F, #F9A825);
    }

    .supervisor-card .profile-placeholder {
        background: #FFF9E0;
        color: #FFCA28;
    }

    .supervisor-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 15px;
        padding: 8px 16px;
        background: #FFFFFF;
        border: 1px solid #FFE082;
        border-radius: 20px;
        color: #8F7A1F;
        font-size: .85rem;
        font-weight: 800;
        text-decoration: none;
        transition: .3s ease;
    }

    .supervisor-link:hover {
        background: #FFF9E0;
        border-color: #FFCA28;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(255, 213, 79, .2);
    }

    .supervisor-link svg {
        width: 16px;
        height: 16px;
    }

    /* ============ REFERENCES ============ */
    .reference-list {
        max-width: 950px;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .reference-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 25px;
        background: #FFFFFF;
        border: 2px solid #E3F0DD;
        border-radius: 20px;
        box-shadow: 0 5px 18px rgba(76, 175, 122, .05);
        transition: .2s ease;
    }

    .reference-item:hover {
        border-color: #C8E6C9;
        transform: translateX(5px);
    }

    .reference-index {
        flex-shrink: 0;
        width: 45px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 12px;
        background: linear-gradient(135deg, #E8F8EE, #C8E6C9);
        color: var(--forest-dark);
        font-weight: 900;
        font-size: 1.1rem;
    }

    .reference-detail { flex: 1; }

    .reference-detail h3 {
        color: var(--forest-dark);
        font-family: 'Baloo 2', 'Nunito', cursive;
        font-size: 1.15rem;
        margin-bottom: 8px;
        font-weight: 800;
    }

    .reference-detail p {
        color: var(--muted);
        line-height: 1.8;
        font-size: .92rem;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .reference-detail a {
        color: var(--green);
        text-decoration: none;
        font-weight: 800;
        font-size: .9rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .reference-detail a:hover {
        color: var(--forest-dark);
        text-decoration: underline;
    }

    .reference-note {
        max-width: 950px;
        margin: 30px auto 0;
        padding: 25px;
        border-radius: 16px;
        background: #FFF9E0;
        border: 2px solid #FFE082;
        color: #6B5A1E;
        font-size: .95rem;
        line-height: 1.8;
        font-weight: 600;
    }

    .reference-note strong { display: block; margin-bottom: 5px; font-weight: 900; color: #8F7A1F; }
    .reference-note p { margin-bottom: 0; }

    /* ============ CLOSING ============ */
    .about-closing {
        max-width: 900px;
        margin: 40px auto 0;
        padding: 60px 30px;
        border-radius: 30px;
        text-align: center;
        background: linear-gradient(135deg, var(--forest-dark), var(--forest));
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(27, 94, 58, .3);
    }

    .about-closing::before {
        content: "";
        position: absolute;
        top: -50%; left: -20%;
        width: 60%; height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,.1), transparent 60%);
        transform: rotate(30deg);
    }

    .about-closing svg.leaf-icon {
        width: 50px;
        height: 50px;
        margin: 0 auto 15px;
    }

    .about-closing h2 {
        font-family: 'Baloo 2', 'Nunito', cursive;
        margin: 0 0 15px;
        font-size: 2.2rem;
        font-weight: 800;
        position: relative;
        z-index: 2;
    }

    .about-closing p {
        color: #C8E6C9;
        line-height: 1.7;
        font-size: 1.05rem;
        font-weight: 600;
        max-width: 600px;
        margin: 0 auto 25px;
        position: relative;
        z-index: 2;
    }

    .about-closing .about-button {
        background: var(--gold);
        color: var(--forest-dark) !important;
        box-shadow: 0 8px 20px rgba(255, 213, 79, .3);
        position: relative;
        z-index: 2;
    }

    .about-closing .about-button:hover {
        background: #FFCA28;
        box-shadow: 0 12px 25px rgba(255, 213, 79, .5);
    }

    /* ============ RESPONSIVE ============ */
    @media(max-width: 1024px) {
        .objective-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media(max-width: 850px) {
        .about-hero-decoration { display: none; }
        .about-hero { padding: 60px 0; text-align: center; }
        .about-hero p { margin: 0 auto; }
    }

    @media(max-width: 600px) {
        .about-container { width: calc(100% - 36px); }
        .about-section, .about-objectives, .about-developers, .about-references { padding: 50px 0; }
        
        .about-description { flex-direction: column; padding: 25px; }
        
        .objective-grid { grid-template-columns: 1fr; }
        
        .developer-card { max-width: 100%; }
        .developer-grid { gap: 20px; }

        .about-heading h2 { font-size: 1.9rem; }
        .about-closing { margin: 30px 0 0; padding: 40px 20px; }
        .about-closing h2 { font-size: 1.7rem; }

        .reference-item { flex-direction: column; gap: 15px; padding: 20px; }
    }
</style>

<div class="about-page">

    <!-- HERO SECTION -->
    <section class="about-hero">
        <div class="about-container">
            <div class="about-hero-content">
                <span class="about-label">WETLAND LEARNING PLATFORM</span>

                <h1>
                    Menjelajahi Keajaiban
                    <span>Ekosistem Lahan Basah</span>
                </h1>

                <p>
                    SIFARA merupakan media pembelajaran interaktif
                    berbasis website yang dirancang untuk membantu
                    siswa mengenal, memahami, dan mengeksplorasi
                    keanekaragaman ekosistem lahan basah melalui
                    pengalaman belajar digital.
                </p>

                <a href="{{ route('dashboard') }}" class="about-button">
                    Mulai Belajar 
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Dekorasi SVG Melayang -->
        <div class="about-hero-decoration">
            <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 180C20 180 40 80 180 20C180 20 200 160 80 180C40 186 20 180 20 180Z" fill="#2E7D4F"/>
                <path d="M20 180L90 110" stroke="#1B5E3A" stroke-width="4" stroke-linecap="round"/>
            </svg>
        </div>
    </section>


    <!-- ABOUT SECTION -->
    <section class="about-section">
        <div class="about-container">
            <div class="about-heading">
                <span class="about-label">ABOUT SIFARA</span>
                <h2>Tentang SIFARA</h2>
                <p>Mengenal lebih dekat media pembelajaran ekosistem lahan basah.</p>
            </div>

            <div class="about-description">
                <div class="about-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#2E7D4F" stroke-width="1.8"/>
                        <path d="M3.6 9H20.4M3.6 15H20.4" stroke="#2E7D4F" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M12 3C14.5 5.5 15.5 8.5 15.5 12C15.5 15.5 14.5 18.5 12 21C9.5 18.5 8.5 15.5 8.5 12C8.5 8.5 9.5 5.5 12 3Z" stroke="#2E7D4F" stroke-width="1.8"/>
                    </svg>
                </div>

                <div>
                    <h3>Belajar Mengenal Lahan Basah</h3>
                    <p>
                        SIFARA adalah media pembelajaran Geografi interaktif berbasis website untuk siswa SMA kelas XI yang berfokus pada ekosistem lahan basah di Indonesia. Materi di dalamnya disusun selaras dengan pembahasan Biosfer mengenai persebaran flora dan fauna pada hutan bakau dan hutan rawa gambut, serta Pengelolaan Sumber Daya Alam, yang mengulas pemanfaatan rawa pasang surut dan rawa lebak sebagai lahan pertanian.
                    </p>
                    <p>
                        Dilengkapi dengan materi interaktif, permainan edukatif, dan kuis, SIFARA membantu siswa memahami karakteristik tiap ekosistem beserta keanekaragaman hayatinya dengan cara yang seru, mudah dipahami, sekaligus mendorong kepedulian terhadap kelestarian lingkungan.
                </div>
            </div>
        </div>
    </section>


    <!-- OBJECTIVES SECTION -->
    <section class="about-objectives">
        <div class="about-container">
            <div class="about-heading">
                <span class="about-label">LEARNING OBJECTIVES</span>
                <h2>Tujuan Pembelajaran</h2>
                <p>Tujuan yang ingin dicapai melalui penggunaan media pembelajaran SIFARA.</p>
            </div>

            <div class="objective-grid">
                <div class="objective-card">
                    <span class="objective-number">01</span>
                    <div class="objective-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 19.5A2.5 2.5 0 016.5 17H20" stroke="#2E7D4F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.5 2H20V22H6.5A2.5 2.5 0 014 19.5V4.5A2.5 2.5 0 016.5 2Z" stroke="#2E7D4F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 7H16M8 11H13" stroke="#2E7D4F" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3>Memahami Konsep Lahan Basah</h3>
                    <p>Mengenal pengertian, karakteristik fisik, serta klasifikasi (tipologi) ekosistem lahan basah yang ada di Indonesia.</p>
                </div>

                <div class="objective-card">
                    <span class="objective-number">02</span>
                    <div class="objective-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22V12" stroke="#2E7D4F" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 14C12 14 8 13 7 9C7 9 11 8 13 11C13.5 11.8 13 13 12 14Z" fill="#A5D6A7" stroke="#2E7D4F" stroke-width="1.5" stroke-linejoin="round"/>
                            <path d="M12 16C12 16 16 15 17 11C17 11 13 10 11 13C10.5 13.8 11 15 12 16Z" fill="#C8E6C9" stroke="#2E7D4F" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Menganalisis Persebaran Biosfer</h3>
                    <p>Mengidentifikasi persebaran flora dan fauna khas beserta bentuk adaptasinya pada ekosistem hutan bakau (mangrove) dan hutan rawa gambut di Indonesia.</p>
                </div>

                <div class="objective-card">
                    <span class="objective-number">03</span>
                    <div class="objective-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 7C12 7 13.5 4 16 4C18.5 4 20 6.5 20 9C20 14 12 20 12 20C12 20 4 14 4 9C4 6.5 5.5 4 8 4C10.5 4 12 7 12 7Z" stroke="#2E7D4F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="9" cy="9" r="1.5" fill="#FFD54F"/>
                            <circle cx="15" cy="9" r="1.5" fill="#FFD54F"/>
                        </svg>
                    </div>
                    <h3>Mengkaji Pengelolaan Sumber Daya Alam</h3>
                    <p>Memahami bentuk pemanfaatan lahan basah secara berkelanjutan di sektor pertanian, khususnya pengelolaan sawah pasang surut dan sawah lebak.</p>
                </div>

                <div class="objective-card">
                    <span class="objective-number">04</span>
                    <div class="objective-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#2E7D4F" stroke-width="1.8"/>
                            <path d="M8 12L11 15L16 9" stroke="#2E7D4F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Menumbuhkan Kepedulian Lingkungan</h3>
                    <p>Meningkatkan kesadaran siswa akan pentingnya menjaga keseimbangan dan kelestarian ekosistem lahan basah dari ancaman kerusakan lingkungan.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- DEVELOPER SECTION -->
    <section class="about-developers">
        <div class="about-container">
            <div class="about-heading">
                <span class="about-label">OUR DEVELOPMENT TEAM</span>
                <h2>Tim Pengembang</h2>
                <p>SIFARA dikembangkan oleh mahasiswa Program Studi Pendidikan Komputer.</p>
            </div>

            <div class="developer-grid">

                <!-- DEVELOPER 1 -->
                <div class="developer-card">
                    <div class="profile-image-wrapper">
                        @if(file_exists(public_path('images/rizqa.jpg')))
                            <img src="{{ asset('images/rizqa.jpg') }}" alt="Foto Rizqa Aulia Faiha">
                        @else
                            <div class="profile-placeholder">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <span class="developer-number">DEVELOPER 01</span>
                    <h3>Rizqa Aulia Faiha</h3>
                    <p>Program Studi Pendidikan Komputer</p>
                    <span class="dev-nim">NIM. 2410131220008</span> <!-- GANTI NIM -->
                    
                    <!-- Sosmed (Ganti # dengan link IG/LinkedIn) -->
                    <div class="dev-socials">
                        <a href="https://www.instagram.com/ra.faiha411_/" target="_blank" title="Instagram Rizqa">
                            <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- DEVELOPER 2 -->
                <div class="developer-card">
                    <div class="profile-image-wrapper">
                        @if(file_exists(public_path('images/siti.jpeg')))
                            <img src="{{ asset('images/siti.jpeg') }}" alt="Foto Siti Noor Hayati">
                        @else
                            <div class="profile-placeholder">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <span class="developer-number">DEVELOPER 02</span>
                    <h3>Siti Noor Hayati</h3>
                    <p>Program Studi Pendidikan Komputer</p>
                    <span class="dev-nim">NIM. 2410131120012</span> <!-- GANTI NIM -->
                    
                    <!-- Sosmed (Ganti # dengan link IG/LinkedIn) -->
                    <div class="dev-socials">
                        <a href="https://www.instagram.com/_sinohaa/" target="_blank" title="Instagram Siti">
                            <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                    </div>
                </div>

            </div>

            <!-- DOSEN PENGAMPU -->
            <div class="supervisor-card">
                <div class="profile-image-wrapper">
                    @if(file_exists(public_path('images/dosen.webp')))
                        <img src="{{ asset('images/dosen.webp') }}" alt="Foto Prof. Dr. Deasy Arisanty, M.Sc.">
                    @else
                        <div class="profile-placeholder">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 11L18 13L22 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <span class="developer-number">DOSEN PENGAMPU</span>
                <h3>Prof. Dr. Deasy Arisanty, M.Sc.</h3>
                <p>Dosen Pengampu</p>
                
                <!-- Tautan Profil Dosen (Ganti # dengan link Google Scholar / SINTA) -->
                <a href="https://pendgeografi.ulm.ac.id/profil/dosen/deasy-arisanty" target="_blank" class="supervisor-link">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 5.58172 6.58172 2 11 2H13C17.4183 2 21 5.58172 21 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Profil Lengkap
                </a>
            </div>
        </div>
    </section>


    <!-- REFERENCES SECTION -->
    <section class="about-references">
        <div class="about-container">
            <div class="about-heading">
                <span class="about-label">LEARNING RESOURCES</span>
                <h2>Daftar Pustaka</h2>
                <p>Referensi buku, dokumen, dan sumber informasi yang berkaitan dengan pembelajaran ekosistem lahan basah.</p>
            </div>

            <div class="reference-list">
                <!-- REFERENCE 1 -->
                <div class="reference-item">
                    <span class="reference-index">01</span>
                    <div class="reference-detail">
                        <h3>Pengetahuan Lingkungan Lahan Basah</h3>
                        <p>
                            Komari, N., Haryanti, N. H., Kadarsah, A., & Afandi, P. (2026).
                            <i>Buku Ajar Pengetahuan Lingkungan Lahan Basah (Wetlands): Indonesia.</i>
                            Lambung Mangkurat University Press.
                        </p>
                        <a href="https://bukuvirtual.ulm.ac.id/omp/index.php/lmupress/catalog/book/416" target="_blank" rel="noopener noreferrer">
                            Lihat sumber buku 
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                <!-- REFERENCE 2 -->
                <div class="reference-item">
                    <span class="reference-index">02</span>
                    <div class="reference-detail">
                        <h3>Pedoman Teknis Pengembangan Lahan Rawa</h3>
                        <p>
                            Kementerian Pertanian Republik Indonesia. (2017).
                            <i>Pedoman Teknis Pengembangan Pemanfaatan Lahan Rawa/Gambut Terpadu TA. 2017.</i>
                            Direktorat Jenderal Prasarana dan Sarana Pertanian.
                        </p>
                        <a href="https://psp.pertanian.go.id/storage/158/PEDOMAN_TEKNIS_PENGEMBANGAN_PEMANFAATAN_LAHAN_RAWA_TERPADU_2017.pdf" target="_blank" rel="noopener noreferrer">
                            Baca dokumen PDF
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                <!-- REFERENCE 3 -->
                <div class="reference-item">
                    <span class="reference-index">03</span>
                    <div class="reference-detail">
                        <h3>Perlindungan dan Pengelolaan Ekosistem Gambut</h3>
                        <p>
                            Suryadiputera, N. (2022).
                            <i>Bahan Pelatihan untuk Penguatan Kapasitas Parapihak dalam Upaya Perlindungan dan Pengelolaan Gambut.</i>
                            Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ) GmbH, PROPEAT.
                        </p>
                        <a href="https://pkgppkl.menlhk.go.id/v0/wp-content/uploads/2023/08/06-Bahan-Pelatihan-Pengelolaan-Gambut-Berkelanjutan.pdf" target="_blank" rel="noopener noreferrer">
                            Baca dokumen PDF
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>

                <!-- REFERENCE 4 -->
                <div class="reference-item">
                    <span class="reference-index">04</span>
                    <div class="reference-detail">
                        <h3>Ekosistem Gambut dan Mangrove Indonesia</h3>
                        <p>
                            Lusiana, S., & Rembonita, T. (2023).
                            <i>Mengalunkan Kisah Lahan Basah Gambut dan Mangrove.</i>
                            Yayasan Konservasi Cakrawala Indonesia. ISBN 978-623-10-3576-9.
                        </p>
                        <a href="https://konservasi-id.org/wp-content/uploads/2025/03/BUKUMENGALUNKANKISAHLAHANBASAH_ID.pdf" target="_blank" rel="noopener noreferrer">
                            Baca dokumen PDF
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="reference-note">
                <strong>Catatan Referensi</strong>
                <p>Referensi di atas merupakan sumber awal yang relevan untuk mendukung pembelajaran ekosistem lahan basah. Penggunaan setiap sumber perlu disesuaikan dengan materi dan informasi yang benar-benar dikutip atau diadaptasi dalam SIFARA.</p>
            </div>
        </div>
    </section>


    <!-- CLOSING SECTION -->
    <section class="about-closing">
        <svg class="leaf-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 19C5 19 7 9 19 5C19 5 21 17 11 19C8 19.6 5 19 5 19Z" fill="#FFD54F" stroke="#FFD54F" stroke-width="1.4" stroke-linejoin="round"/>
            <path d="M5 19L11 13" stroke="#1B5E3A" stroke-width="1.4" stroke-linecap="round"/>
        </svg>
        <h2>Mengenal Alam, Menjaga Masa Depan</h2>
        <p>Mari belajar memahami ekosistem lahan basah dan meningkatkan kepedulian terhadap lingkungan.</p>
        <a href="{{ route('dashboard') }}" class="about-button">
            Jelajahi SIFARA
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="#1B5E3A" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </section>

</div>

@endsection