@extends('layouts.app')

@section('title', 'Masuk Akun - SIFARA')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800&display=swap');

    .sifara-auth {
        --forest: #315D46;
        --deep: #244936;
        --sage: #8EAA91;
        --cream: #F8F7EF;
        --ink: #34483A;
        --muted: #788579;
        min-height: calc(100vh - 85px);
        padding: 42px 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background: radial-gradient(ellipse at 12% 18%, rgba(182,168,117,.16), transparent 27%), radial-gradient(ellipse at 90% 82%, rgba(142,170,145,.2), transparent 30%), linear-gradient(135deg,#F8F7EF 0%,#EEF3E9 52%,#F7F5EA 100%);
        color: var(--ink);
        font-family: 'Nunito', sans-serif;
    }
    .sifara-auth *, .sifara-auth *::before, .sifara-auth *::after { box-sizing: border-box; }
    .auth-orbit { position:absolute; border:1px solid rgba(74,111,79,.13); border-radius:50%; pointer-events:none; z-index:-1; }
    .auth-orbit-one { width:390px; height:390px; top:-205px; right:-115px; }
    .auth-orbit-two { width:290px; height:290px; bottom:-175px; left:-95px; }
    .auth-shell { width:min(100%,980px); display:grid; grid-template-columns:1fr 1fr; align-items:stretch; gap:18px; position:relative; z-index:1; }
    .auth-story, .auth-card { border:1px solid rgba(76,105,77,.15); border-radius:26px; box-shadow:0 18px 50px rgba(48,76,53,.08); overflow:hidden; }
    .auth-story { min-height:570px; padding:42px 38px 34px; display:flex; flex-direction:column; justify-content:space-between; position:relative; background:linear-gradient(155deg,#E8F0E5 0%,#F7F6ED 72%,#F1EEDC 100%); }
    .auth-story::before { content:""; position:absolute; width:250px; height:250px; border-radius:50%; border:1px solid rgba(70,105,73,.13); right:-100px; top:95px; }
    .auth-brand { display:flex; align-items:center; gap:11px; position:relative; z-index:1; }
    .auth-brand-mark { width:42px; height:42px; border-radius:14px; display:grid; place-items:center; background:var(--forest); box-shadow:0 7px 16px rgba(49,93,70,.18); }
    .auth-brand-mark svg { width:25px; height:25px; }
    .auth-brand-name { color:var(--deep); font-size:1.05rem; font-weight:900; letter-spacing:.13em; }
    .auth-brand-caption { display:block; margin-top:1px; color:var(--muted); font-size:.62rem; font-weight:800; letter-spacing:.12em; }
    .auth-story-main { position:relative; z-index:1; text-align:center; padding:12px 0; }
    .auth-art { width:min(100%,270px); height:235px; margin:0 auto 20px; display:block; }
    .auth-eyebrow { margin:0 0 9px; color:#71856D; font-size:.69rem; font-weight:900; letter-spacing:.19em; text-transform:uppercase; }
    .auth-story h1 { margin:0 auto 12px; max-width:360px; color:var(--deep); font-family:'Playfair Display',Georgia,serif; font-size:clamp(2rem,3.2vw,2.65rem); font-weight:700; line-height:1.12; }
    .auth-story-copy { max-width:330px; margin:0 auto; color:#6E7E70; font-size:.91rem; font-weight:600; line-height:1.8; }
    .auth-story-foot { display:flex; align-items:center; justify-content:center; gap:9px; color:#788879; font-size:.72rem; font-weight:700; position:relative; z-index:1; }
    .auth-story-foot svg { width:16px; height:16px; flex:0 0 auto; }
    .auth-card { min-height:570px; padding:42px 44px 34px; display:flex; flex-direction:column; justify-content:center; background:rgba(255,254,250,.96); }
    .auth-card-heading { margin-bottom:25px; }
    .auth-card-kicker { margin:0 0 7px; color:#8A9A83; font-size:.68rem; font-weight:900; letter-spacing:.16em; text-transform:uppercase; }
    .auth-card h2 { margin:0 0 7px; color:var(--deep); font-family:'Playfair Display',Georgia,serif; font-size:2rem; line-height:1.2; }
    .auth-card-intro { margin:0; color:var(--muted); font-size:.86rem; font-weight:600; line-height:1.65; }
    .auth-tabs { display:grid; grid-template-columns:1fr 1fr; gap:5px; padding:5px; margin-bottom:22px; border-radius:13px; background:#F0F2EB; }
    .auth-tabs a { padding:10px 12px; border-radius:10px; color:#778477; text-align:center; text-decoration:none; font-size:.83rem; font-weight:900; transition:background .2s ease,color .2s ease,box-shadow .2s ease; }
    .auth-tabs a.active { background:var(--forest); color:#fff; box-shadow:0 4px 10px rgba(49,93,70,.17); }
    .auth-tabs a:not(.active):hover { background:rgba(255,255,255,.75); color:var(--deep); }
    .auth-alert { display:flex; align-items:flex-start; gap:9px; padding:11px 12px; margin:0 0 17px; border:1px solid #E8C7BE; border-radius:11px; background:#FBF0EC; color:#985448; font-size:.77rem; font-weight:700; line-height:1.5; }
    .auth-alert svg { width:17px; height:17px; flex:0 0 auto; margin-top:1px; }
    .auth-alert ul { margin:0; padding-left:17px; }
    .auth-alert li+li { margin-top:3px; }
    .auth-field { margin-bottom:17px; }
    .auth-field label { display:block; margin-bottom:7px; color:#425B48; font-size:.79rem; font-weight:900; }
    .auth-input-wrap { position:relative; }
    .auth-field input[type=email], .auth-field input[type=password], .auth-field input[type=text] { display:block; width:100%; min-height:48px; padding:12px 14px; border:1px solid #DCE4D8; border-radius:11px; outline:none; background:#FBFCF8; color:var(--ink); font-family:'Nunito',sans-serif; font-size:.86rem; font-weight:700; transition:border-color .2s ease,box-shadow .2s ease,background .2s ease; }
    .auth-field input::placeholder { color:#A0AA9D; font-weight:600; }
    .auth-field input:focus { border-color:#77977A; background:#fff; box-shadow:0 0 0 3px rgba(119,151,122,.15); }
    .auth-field input.is-invalid { border-color:#C77E70; }
    .auth-field-error { margin:6px 0 0; color:#A35448; font-size:.72rem; font-weight:700; }
    .auth-password-toggle { position:absolute; top:50%; right:11px; transform:translateY(-50%); display:inline-grid; place-items:center; width:30px; height:30px; padding:0; border:0; border-radius:8px; background:transparent; color:#788879; cursor:pointer; }
    .auth-password-toggle:hover { background:#EDF2E9; color:var(--deep); }
    .auth-password-toggle svg { width:18px; height:18px; }
    .auth-options { display:flex; align-items:center; justify-content:space-between; gap:12px; margin:2px 0 22px; color:#788579; font-size:.76rem; font-weight:700; }
    .auth-remember { display:inline-flex; align-items:center; gap:7px; cursor:pointer; }
    .auth-remember input { width:15px; height:15px; margin:0; accent-color:var(--forest); }
    .auth-forgot { color:var(--forest); font-weight:900; text-decoration:none; }
    .auth-forgot:hover { text-decoration:underline; }
    .auth-submit { width:100%; min-height:49px; display:flex; align-items:center; justify-content:center; gap:10px; border:0; border-radius:12px; background:linear-gradient(135deg,#527B5B,#315D46); color:#fff; font-family:'Nunito',sans-serif; font-size:.88rem; font-weight:900; cursor:pointer; box-shadow:0 7px 16px rgba(49,93,70,.18); transition:transform .2s ease,box-shadow .2s ease,filter .2s ease; }
    .auth-submit:hover { transform:translateY(-2px); box-shadow:0 10px 20px rgba(49,93,70,.23); filter:brightness(1.04); }
    .auth-submit:active { transform:translateY(0); }
    .auth-submit svg { width:18px; height:18px; }
    .auth-bottom { margin:22px 0 0; color:#7B887C; text-align:center; font-size:.78rem; font-weight:700; }
    .auth-bottom a { color:var(--forest); font-weight:900; text-decoration:none; }
    .auth-bottom a:hover { text-decoration:underline; }
    @media(max-width:820px) {
        .sifara-auth { padding:28px 16px; }
        .auth-shell { max-width:520px; grid-template-columns:1fr; }
        .auth-story { min-height:auto; padding:25px 26px 22px; }
        .auth-story-main { padding:18px 0 10px; }
        .auth-art { width:170px; height:145px; margin-bottom:12px; }
        .auth-story h1 { font-size:2rem; }
        .auth-story-copy { font-size:.82rem; }
        .auth-story-foot { display:none; }
        .auth-card { min-height:auto; padding:30px 28px; }
    }
    @media(max-width:420px) {
        .auth-card { padding:26px 20px; border-radius:21px; }
        .auth-story { border-radius:21px; }
        .auth-card h2 { font-size:1.75rem; }
        .auth-options { align-items:flex-start; flex-direction:column; gap:10px; }
    }
    @media(prefers-reduced-motion:reduce) {
        .sifara-auth *, .sifara-auth *::before, .sifara-auth *::after { scroll-behavior:auto!important; transition-duration:.01ms!important; }
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
                <svg class="auth-art" viewBox="0 0 300 250" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustrasi bumi dan tanaman">
                    <ellipse cx="151" cy="222" rx="105" ry="13" fill="#D8E2D1"/>
                    <circle cx="151" cy="111" r="83" fill="#E0EBDD"/>
                    <circle cx="151" cy="111" r="68" fill="#A8C5A4"/>
                    <path d="M103 74c12-12 27-17 43-15l9 12-9 13-18 4-8 17-19-3-9-14 11-14Z" fill="#527B5B"/>
                    <path d="m166 52 18 8 8 17-9 13-16-3-8-15 7-20Z" fill="#527B5B"/>
                    <path d="m174 113 19-8 15 9-5 17-16 10-17-8 4-20Z" fill="#527B5B"/>
                    <path d="m111 133 18-8 14 11-3 18-16 9-17-12 4-18Z" fill="#527B5B"/>
                    <path d="M151 43v136M83 111h136" stroke="#F7F7ED" stroke-width="2" stroke-dasharray="4 7" opacity=".8"/>
                    <path d="M74 186c15-15 31-18 47-10 12 6 20 6 31-1 15-9 31-8 45 1 13 8 26 8 39 1" stroke="#8EA98B" stroke-width="4" stroke-linecap="round"/>
                    <path d="M151 180c-2-24-1-39 7-55" stroke="#527B5B" stroke-width="5" stroke-linecap="round"/>
                    <path d="M158 137c-1-20 10-32 29-35-1 19-10 31-29 35Z" fill="#6E9871" stroke="#426A4C" stroke-width="2"/>
                    <path d="M154 151c-2-17-13-27-30-28 1 17 11 27 30 28Z" fill="#8EAA91" stroke="#527B5B" stroke-width="2"/>
                    <path d="M158 139 179 108M154 150l-22-24" stroke="#426A4C" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M70 92c-8-9-7-20 3-28 10 8 11 19 3 28" fill="#D2B978"/>
                    <path d="M73 91v15" stroke="#A58E55" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="226" cy="61" r="12" fill="#D2B978"/>
                    <path d="M225 40v-8M246 61h8M210 46l-6-6M240 46l6-6" stroke="#B6A875" stroke-width="2" stroke-linecap="round"/>
                    <path d="M49 160c-8-7-7-17 2-24 9 7 10 17 2 24" fill="#8EAA91"/>
                    <path d="M51 159v14" stroke="#527B5B" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="244" cy="157" r="5" fill="#D2B978"/>
                    <circle cx="58" cy="53" r="4" fill="#B6A875"/>
                </svg>
                <p class="auth-eyebrow">Belajar · Jelajahi · Pahami</p>
                <h1>Selamat Datang Kembali</h1>
                <p class="auth-story-copy">Lanjutkan perjalanan belajarmu dan jelajahi beragam pengetahuan Geografi bersama SIFARA.</p>
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
                <p class="auth-card-kicker">Akses pembelajaran</p>
                <h2 id="auth-title">Masuk ke Akun</h2>
                <p class="auth-card-intro">Masukkan email dan password untuk melanjutkan aktivitas belajarmu.</p>
            </div>

            <nav class="auth-tabs" aria-label="Navigasi autentikasi">
                <a href="{{ route('login') }}" class="active" aria-current="page">Masuk</a>
                <a href="{{ route('register') }}">Daftar</a>
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

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="auth-field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" autocomplete="username" required autofocus class="@error('email') is-invalid @enderror" @error('email') aria-describedby="email-error" @enderror>
                    @error('email')
                        <p class="auth-field-error" id="email-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password">Password</label>
                    <div class="auth-input-wrap">
                        <input id="password" type="password" name="password" placeholder="Masukkan password" autocomplete="current-password" required style="padding-right:48px;">
                        <button class="auth-password-toggle" type="button" aria-label="Tampilkan password" aria-pressed="false" data-password-toggle>
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2.5 12s3.3-6 9.5-6 9.5 6 9.5 6-3.3 6-9.5 6-9.5-6-9.5-6Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="2.7" stroke="currentColor" stroke-width="1.7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="auth-options">
                    <label class="auth-remember">
                        <input type="checkbox" name="remember" value="1">
                        <span>Ingat Saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="auth-forgot" href="{{ route('password.request') }}">Lupa Password?</a>
                    @endif
                </div>

                <button type="submit" class="auth-submit">
                    <span>Masuk ke Akun</span>
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M4.5 12h14M13 6.5l5.5 5.5-5.5 5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>

            <p class="auth-bottom">Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a></p>
        </section>
    </main>
</div>

<script>
    document.querySelectorAll('[data-password-toggle]').forEach(function (button) {
        button.addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const showPassword = passwordInput.type === 'password';
            passwordInput.type = showPassword ? 'text' : 'password';
            button.setAttribute('aria-pressed', showPassword ? 'true' : 'false');
            button.setAttribute('aria-label', showPassword ? 'Sembunyikan password' : 'Tampilkan password');
        });
    });
</script>
@endsection