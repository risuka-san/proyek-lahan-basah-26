@extends('layouts.app')

@section('title', 'Daftar Akun - SIFARA')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap');

    .sifara-auth {
        --auth-forest: #315D46;
        --auth-deep: #244936;
        --auth-sage: #8EAA91;
        --auth-mint: #EAF1E8;
        --auth-cream: #F8F7EF;
        --auth-paper: #FFFEFA;
        --auth-olive: #B6A875;
        --auth-ink: #34483A;
        --auth-muted: #788579;
        min-height: calc(100vh - 85px);
        padding: 38px 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background:
            radial-gradient(ellipse at 12% 18%, rgba(182, 168, 117, .16), transparent 27%),
            radial-gradient(ellipse at 90% 82%, rgba(142, 170, 145, .20), transparent 30%),
            linear-gradient(135deg, #F8F7EF 0%, #EEF3E9 52%, #F7F5EA 100%);
        color: var(--auth-ink);
        font-family: 'Nunito', sans-serif;
    }

    .sifara-auth *,
    .sifara-auth *::before,
    .sifara-auth *::after { box-sizing: border-box; }

    .auth-orbit {
        position: absolute;
        border: 1px solid rgba(74, 111, 79, .13);
        border-radius: 50%;
        pointer-events: none;
        z-index: -1;
    }
    .auth-orbit-one { width: 390px; height: 390px; top: -205px; right: -115px; }
    .auth-orbit-two { width: 290px; height: 290px; bottom: -175px; left: -95px; }

    .auth-shell {
        width: min(100%, 980px);
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: stretch;
        gap: 18px;
        position: relative;
        z-index: 1;
    }

    .auth-story,
    .auth-card {
        border: 1px solid rgba(76, 105, 77, .15);
        border-radius: 26px;
        box-shadow: 0 18px 50px rgba(48, 76, 53, .08);
        overflow: hidden;
    }

    .auth-story {
        min-height: 610px;
        padding: 42px 38px 34px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        background: linear-gradient(155deg, #E8F0E5 0%, #F7F6ED 72%, #F1EEDC 100%);
    }

    .auth-story::before {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        border: 1px solid rgba(70, 105, 73, .13);
        right: -100px;
        top: 95px;
    }

    .auth-brand {
        display: flex;
        align-items: center;
        gap: 11px;
        position: relative;
        z-index: 1;
    }

    .auth-brand-mark {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: var(--auth-forest);
        box-shadow: 0 7px 16px rgba(49, 93, 70, .18);
    }
    .auth-brand-mark svg { width: 25px; height: 25px; }
    .auth-brand-name {
        color: var(--auth-deep);
        font-size: 1.05rem;
        font-weight: 900;
        letter-spacing: .13em;
    }
    .auth-brand-caption {
        display: block;
        margin-top: 1px;
        color: var(--auth-muted);
        font-size: .62rem;
        font-weight: 800;
        letter-spacing: .12em;
    }

    .auth-story-main {
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 12px 0;
    }

    .auth-art {
        width: min(100%, 270px);
        height: 235px;
        margin: 0 auto 20px;
        display: block;
    }

    .auth-eyebrow {
        margin: 0 0 9px;
        color: #71856D;
        font-size: .69rem;
        font-weight: 900;
        letter-spacing: .19em;
        text-transform: uppercase;
    }

    .auth-story h1 {
        margin: 0 auto 12px;
        max-width: 360px;
        color: var(--auth-deep);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(2rem, 3.2vw, 2.65rem);
        font-weight: 700;
        line-height: 1.12;
    }

    .auth-story-copy {
        max-width: 330px;
        margin: 0 auto;
        color: #6E7E70;
        font-size: .91rem;
        font-weight: 600;
        line-height: 1.8;
    }

    .auth-story-foot {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        color: #788879;
        font-size: .72rem;
        font-weight: 700;
        position: relative;
        z-index: 1;
    }
    .auth-story-foot svg { width: 16px; height: 16px; flex: 0 0 auto; }

    .auth-card {
        min-height: 610px;
        padding: 38px 44px 32px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: rgba(255, 254, 250, .96);
    }

    .auth-card-heading { margin-bottom: 21px; }
    .auth-card-kicker {
        margin: 0 0 7px;
        color: #8A9A83;
        font-size: .68rem;
        font-weight: 900;
        letter-spacing: .16em;
        text-transform: uppercase;
    }
    .auth-card h2 {
        margin: 0 0 7px;
        color: var(--auth-deep);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 2rem;
        line-height: 1.2;
    }
    .auth-card-intro {
        margin: 0;
        color: var(--auth-muted);
        font-size: .86rem;
        font-weight: 600;
        line-height: 1.65;
    }

    .auth-tabs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5px;
        padding: 5px;
        margin-bottom: 19px;
        border-radius: 13px;
        background: #F0F2EB;
    }
    .auth-tabs a {
        padding: 10px 12px;
        border-radius: 10px;
        color: #778477;
        text-align: center;
        text-decoration: none;
        font-size: .83rem;
        font-weight: 900;
        transition: background .2s ease, color .2s ease, box-shadow .2s ease;
    }
    .auth-tabs a.active {
        background: var(--auth-forest);
        color: #fff;
        box-shadow: 0 4px 10px rgba(49, 93, 70, .17);
    }
    .auth-tabs a:not(.active):hover { background: rgba(255,255,255,.75); color: var(--auth-deep); }

    .auth-alert {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        padding: 10px 12px;
        margin: 0 0 14px;
        border: 1px solid #E8C7BE;
        border-radius: 11px;
        background: #FBF0EC;
        color: #985448;
        font-size: .75rem;
        font-weight: 700;
        line-height: 1.5;
    }
    .auth-alert svg { width: 17px; height: 17px; flex: 0 0 auto; margin-top: 1px; }
    .auth-alert ul { margin: 0; padding-left: 17px; }
    .auth-alert li + li { margin-top: 3px; }

    .auth-field { margin-bottom: 13px; }
    .auth-field label {
        display: block;
        margin-bottom: 6px;
        color: #425B48;
        font-size: .78rem;
        font-weight: 900;
    }
    .auth-input-wrap { position: relative; }
    .auth-field input {
        display: block;
        width: 100%;
        min-height: 45px;
        padding: 10px 14px;
        border: 1px solid #DCE4D8;
        border-radius: 11px;
        outline: none;
        background: #FBFCF8;
        color: var(--auth-ink);
        font-family: 'Nunito', sans-serif;
        font-size: .84rem;
        font-weight: 700;
        transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
    }
    .auth-field input::placeholder { color: #A0AA9D; font-weight: 600; }
    .auth-field input:focus {
        border-color: #77977A;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(119, 151, 122, .15);
    }
    .auth-field input.is-invalid { border-color: #C77E70; }
    .auth-field-error {
        margin: 5px 0 0;
        color: #A35448;
        font-size: .71rem;
        font-weight: 700;
    }

    .auth-password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        display: inline-grid;
        place-items: center;
        width: 30px;
        height: 30px;
        padding: 0;
        border: 0;
        border-radius: 8px;
        background: transparent;
        color: #788879;
        cursor: pointer;
    }
    .auth-password-toggle:hover { background: #EDF2E9; color: var(--auth-deep); }
    .auth-password-toggle svg { width: 18px; height: 18px; }

    .auth-submit {
        width: 100%;
        min-height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 0;
        border-radius: 12px;
        background: linear-gradient(135deg, #527B5B, #315D46);
        color: #fff;
        font-family: 'Nunito', sans-serif;
        font-size: .88rem;
        font-weight: 900;
        cursor: pointer;
        box-shadow: 0 7px 16px rgba(49, 93, 70, .18);
        transition: transform .2s ease, box-shadow .2s ease, filter .2s ease;
        margin-top: 5px;
    }
    .auth-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(49, 93, 70, .23);
        filter: brightness(1.04);
    }
    .auth-submit:active { transform: translateY(0); }
    .auth-submit svg { width: 18px; height: 18px; }

    .auth-bottom {
        margin: 18px 0 0;
        color: #7B887C;
        text-align: center;
        font-size: .78rem;
        font-weight: 700;
    }
    .auth-bottom a {
        color: var(--auth-forest);
        font-weight: 900;
        text-decoration: none;
    }
    .auth-bottom a:hover { text-decoration: underline; }

    @media (max-width: 820px) {
        .sifara-auth { padding: 28px 16px; }
        .auth-shell { max-width: 520px; grid-template-columns: 1fr; }
        .auth-story { min-height: auto; padding: 25px 26px 22px; }
        .auth-story-main { padding: 18px 0 10px; }
        .auth-art { width: 170px; height: 145px; margin-bottom: 12px; }
        .auth-story h1 { font-size: 2rem; }
        .auth-story-copy { font-size: .82rem; }
        .auth-story-foot { display: none; }
        .auth-card { min-height: auto; padding: 30px 28px; }
    }

    @media (max-width: 420px) {
        .auth-card { padding: 26px 20px; border-radius: 21px; }
        .auth-story { border-radius: 21px; }
        .auth-card h2 { font-size: 1.75rem; }
    }

    @media (prefers-reduced-motion: reduce) {
        .sifara-auth *, .sifara-auth *::before, .sifara-auth *::after {
            scroll-behavior: auto !important;
            transition-duration: .01ms !important;
        }
    }
</style>

<div class="sifara-auth">
    <div class="auth-orbit auth-orbit-one" aria-hidden="true"></div>
    <div class="auth-orbit auth-orbit-two" aria-hidden="true"></div>

    <main class="auth-shell">
        <section class="auth-story" aria-label="Pengenalan SIFARA">
            <div class="auth-brand">
                <div class="auth-brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.8 5.8C17.2 5.8 8.1 9.2 7 17.1c-.6 4.2 2.4 7.4 6.4 7.4 8.2 0 12.4-8.9 12.4-18.7Z" fill="#DCE9D7"/>
                        <path d="M6.2 26.2c4.4-6.1 9.1-10.4 16.2-15.1" stroke="#DCE9D7" stroke-width="2" stroke-linecap="round"/>
                        <path d="M13 20.1 12 14.7M17.2 16.1l5.1.1" stroke="#78977A" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <div>
                    <div class="auth-brand-name">SIFARA</div>
                    <span class="auth-brand-caption">GEOGRAPHY LEARNING PLATFORM</span>
                </div>
            </div>

            <div class="auth-story-main">
                <svg class="auth-art" viewBox="0 0 300 250" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustrasi bumi, buku, dan tanaman">
                    <ellipse cx="151" cy="222" rx="105" ry="13" fill="#D8E2D1"/>
                    <circle cx="151" cy="101" r="66" fill="#A8C5A4"/>
                    <circle cx="151" cy="101" r="66" stroke="#527B5B" stroke-width="2"/>
                    <path d="M108 69c11-11 25-15 39-13l8 11-8 12-17 4-8 16-18-3-8-13 12-14Z" fill="#527B5B"/>
                    <path d="m164 43 17 8 8 16-9 13-15-3-8-14 7-20Z" fill="#527B5B"/>
                    <path d="m172 105 18-8 14 9-5 16-15 9-16-8 4-18Z" fill="#527B5B"/>
                    <path d="M82 101h138M151 35v132" stroke="#F7F7ED" stroke-width="2" stroke-dasharray="4 7" opacity=".8"/>
                    <path d="M92 175c15-9 34-11 55-2 19-9 39-7 59 2v29c-20-9-40-10-59-1-21-9-40-8-55 1v-29Z" fill="#FDFCF4" stroke="#527B5B" stroke-width="2.5" stroke-linejoin="round"/>
                    <path d="M147 174v30M104 185c12-5 24-4 35 1M160 185c11-5 23-5 35 0" stroke="#A8B99F" stroke-width="2" stroke-linecap="round"/>
                    <path d="M151 174c-2-19-1-31 7-45" stroke="#527B5B" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M158 143c-1-17 9-27 25-30-1 16-9 26-25 30Z" fill="#6E9871" stroke="#426A4C" stroke-width="2"/>
                    <path d="M154 153c-2-15-12-23-27-24 1 15 10 23 27 24Z" fill="#8EAA91" stroke="#527B5B" stroke-width="2"/>
                    <path d="M158 145 177 116M154 153l-22-21" stroke="#426A4C" stroke-width="1.8" stroke-linecap="round"/>
                    <circle cx="226" cy="55" r="11" fill="#D2B978"/>
                    <path d="M226 36v-7M245 55h7M212 41l-5-5M240 41l5-5" stroke="#B6A875" stroke-width="2" stroke-linecap="round"/>
                    <path d="M62 151c-8-7-7-17 2-24 9 7 10 17 2 24Z" fill="#8EAA91"/>
                    <path d="M64 150v14" stroke="#527B5B" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="244" cy="157" r="5" fill="#D2B978"/>
                    <circle cx="58" cy="53" r="4" fill="#B6A875"/>
                </svg>

                <p class="auth-eyebrow">Mulai perjalanan belajarmu</p>
                <h1>Selamat Datang di SIFARA</h1>
                <p class="auth-story-copy">
                    Buat akun dan jelajahi pengetahuan Geografi melalui materi, kuis, serta aktivitas belajar yang interaktif.
                </p>
            </div>

            <div class="auth-story-foot">
                <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M10 17s-6-3.7-6-9a3.2 3.2 0 0 1 6-1.5A3.2 3.2 0 0 1 16 8c0 5.3-6 9-6 9Z" stroke="#78977A" stroke-width="1.5" stroke-linejoin="round"/>
                </svg>
                <span>Ruang belajar Geografi yang interaktif</span>
            </div>
        </section>

        <section class="auth-card" aria-labelledby="auth-title">
            <div class="auth-card-heading">
                <p class="auth-card-kicker">Bergabung bersama SIFARA</p>
                <h2>Buat Akun Baru</h2>
                <p class="auth-card-intro">Lengkapi data berikut untuk memulai perjalanan belajar Geografimu.</p>
            </div>

            <nav class="auth-tabs" aria-label="Navigasi autentikasi">
                <a href="{{ route('login') }}">Masuk</a>
                <a href="{{ route('register') }}" class="active" aria-current="page">Daftar</a>
            </nav>

            @if ($errors->any())
                <div class="auth-alert" role="alert">
                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="10" cy="10" r="7.5" stroke="#A85F52" stroke-width="1.5"/>
                        <path d="M10 6v4.5M10 13.5v.1" stroke="#A85F52" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="auth-field">
                    <label for="name">Nama Lengkap</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        required
                        autofocus
                        class="@error('name') is-invalid @enderror"
                        aria-describedby="@error('name') name-error @enderror"
                    >
                    @error('name')
                        <p class="auth-field-error" id="name-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        autocomplete="email"
                        required
                        class="@error('email') is-invalid @enderror"
                        aria-describedby="@error('email') email-error @enderror"
                    >
                    @error('email')
                        <p class="auth-field-error" id="email-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password">Password</label>
                    <div class="auth-input-wrap">
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            required
                            style="padding-right: 48px;"
                            class="@error('password') is-invalid @enderror"
                        >
                        <button class="auth-password-toggle" type="button" aria-label="Tampilkan password" aria-pressed="false" data-password-toggle="password">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2.5 12s3.3-6 9.5-6 9.5 6 9.5 6-3.3 6-9.5 6-9.5-6-9.5-6Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="2.7" stroke="currentColor" stroke-width="1.7"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="auth-field-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="auth-input-wrap">
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            required
                            style="padding-right: 48px;"
                        >
                        <button class="auth-password-toggle" type="button" aria-label="Tampilkan konfirmasi password" aria-pressed="false" data-password-toggle="password_confirmation">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2.5 12s3.3-6 9.5-6 9.5 6 9.5 6-3.3 6-9.5 6-9.5-6-9.5-6Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="2.7" stroke="currentColor" stroke-width="1.7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    <span>Daftar Sekarang</span>
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M4.5 12h14M13 6.5l5.5 5.5-5.5 5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>

            <p class="auth-bottom">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </p>
        </section>
    </main>
</div>

<script>
    document.querySelectorAll('[data-password-toggle]').forEach(function (button) {
        button.addEventListener('click', function () {
            const inputId = button.getAttribute('data-password-toggle');
            const passwordInput = document.getElementById(inputId);
            const isPasswordHidden = passwordInput.type === 'password';

            passwordInput.type = isPasswordHidden ? 'text' : 'password';
            button.setAttribute('aria-pressed', isPasswordHidden ? 'true' : 'false');

            if (inputId === 'password_confirmation') {
                button.setAttribute('aria-label', isPasswordHidden ? 'Sembunyikan konfirmasi password' : 'Tampilkan konfirmasi password');
            } else {
                button.setAttribute('aria-label', isPasswordHidden ? 'Sembunyikan password' : 'Tampilkan password');
            }
        });
    });
</script>

@endsection