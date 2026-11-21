@extends('layouts.app')

@section('title', 'Masuk Akun - SIFARA')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap');

    /* =========================================
       BACKGROUND & LAYOUT UTAMA
    ========================================= */
    .auth-wrapper {
        --forest: #2E7D4F;
        --forest-dark: #1B5E3A;
        --green: #4CAF7A;
        --sage: #A8D5B5;
        --mint: #E8F8EE;
        --cream: #FBFCF5;
        --gold: #FFD54F;
        --text: #2D4A3A;
        --muted: #6B8A76;

        /* Menyesuaikan background Beranda */
        min-height: calc(100vh - 85px); 
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px 20px;
        font-family: 'Nunito', sans-serif;
        
        background:
            radial-gradient(circle at 85% 15%, rgba(255,213,79,.25), transparent 30%),
            radial-gradient(circle at 10% 80%, rgba(179,229,252,.35), transparent 35%),
            linear-gradient(180deg, #FBFCF5 0%, #EAF6E5 100%);
        position: relative;
        overflow: hidden;
    }

    .auth-container {
        position: relative;
        z-index: 2;
        display: flex;
        width: 100%;
        max-width: 900px;
        gap: 20px;
        align-items: stretch;
    }

    /* =========================================
       PANEL KIRI (ILUSTRASI)
    ========================================= */
    .auth-left {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 30px 25px;
        background: linear-gradient(145deg, #FFFFFF, #FAFFF7);
        border: 2px solid #E3F0DD;
        border-radius: 24px;
        box-shadow: 0 8px 24px rgba(76, 175, 122, .08);
        position: relative;
        overflow: hidden;
    }

    .deco-box {
        position: absolute;
        width: 25px; height: 25px;
        border: 3px solid var(--green);
        border-radius: 6px;
    }
    .deco-box-1 { top: 10%; left: 15%; transform: rotate(20deg); border-color: #4CAF7A; }
    .deco-box-2 { top: 10%; right: 15%; transform: rotate(-15deg); border-color: #FFCA28; }

    .auth-illustration {
        width: 90px;
        height: 90px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: float-bob 4s ease-in-out infinite;
    }

    @keyframes float-bob {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    .auth-illustration svg { width: 100%; height: 100%; }

    .auth-left h2 {
        font-family: 'Baloo 2', cursive, sans-serif;
        font-size: 1.6rem;
        color: var(--forest-dark);
        font-weight: 800;
        margin-bottom: 8px;
        line-height: 1.2;
    }

    .auth-left p {
        font-size: 0.85rem;
        color: var(--muted);
        font-weight: 600;
        line-height: 1.5;
        max-width: 90%;
    }

    /* =========================================
       PANEL KANAN (FORM)
    ========================================= */
    .auth-right {
        flex: 1;
        background: linear-gradient(145deg, #FFFFFF, #FAFFF7);
        border: 2px solid #E3F0DD;
        border-radius: 24px;
        padding: 30px 35px;
        box-shadow: 0 8px 24px rgba(76, 175, 122, .08);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Tombol Toggle (Masuk / Daftar) */
    .auth-toggle {
        display: flex;
        background: #F3F4F6;
        border-radius: 12px;
        padding: 4px;
        margin-bottom: 15px;
    }

    .auth-toggle a {
        flex: 1;
        text-align: center;
        padding: 8px;
        font-size: .85rem;
        font-weight: 800;
        text-decoration: none;
        border-radius: 10px;
        color: var(--muted);
        transition: .3s ease;
    }

    .auth-toggle a.active {
        background: var(--forest);
        color: white;
        box-shadow: 0 3px 8px rgba(46, 125, 79, 0.3);
    }

    .auth-toggle a:not(.active):hover { background: #E5E7EB; }

    /* Error Validation */
    .auth-error {
        background: #FEE2E2;
        color: #991B1B;
        padding: 8px 10px;
        border-radius: 8px;
        border: 1px solid #FCA5A5;
        margin-bottom: 12px;
        font-size: .75rem;
        font-weight: 600;
    }
    .auth-error p { margin: 0 0 3px; }
    .auth-error p:last-child { margin: 0; }

    /* Form Group */
    .form-group { margin-bottom: 12px; }

    .form-group label {
        display: block;
        margin-bottom: 4px;
        color: var(--forest-dark);
        font-size: .8rem;
        font-weight: 800;
    }

    .form-group input {
        width: 100%;
        padding: 10px 14px;
        background: #F9FAFB;
        border: 2px solid #E5E7EB;
        border-radius: 10px;
        font-family: 'Nunito', sans-serif;
        font-size: .85rem;
        font-weight: 600;
        color: var(--text);
        outline: none;
        transition: .3s ease;
    }

    .form-group input::placeholder { color: #9CA3AF; font-weight: 500; }

    .form-group input:focus {
        border-color: var(--green);
        background: #FFFFFF;
        box-shadow: 0 0 0 3px rgba(76, 175, 122, .15);
    }

    /* Remember & Forgot Password */
    .auth-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        font-size: .8rem;
        font-weight: 600;
        color: var(--muted);
    }

    .auth-options label {
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
    }

    .auth-options input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: var(--forest);
        cursor: pointer;
    }

    .auth-options a {
        color: var(--forest-dark);
        text-decoration: none;
        font-weight: 800;
    }

    .auth-options a:hover { text-decoration: underline; }

    /* Submit Button */
    .btn-submit {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px;
        margin-top: 5px;
        background: linear-gradient(135deg, var(--green), var(--forest));
        border: none;
        border-radius: 12px;
        color: white;
        font-family: 'Nunito', sans-serif;
        font-size: .95rem;
        font-weight: 900;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(76, 175, 122, .3);
        transition: .3s cubic-bezier(.34, 1.56, .64, 1);
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, var(--forest), var(--forest-dark));
        transform: translateY(-2px) scale(1.01);
        box-shadow: 0 6px 15px rgba(46, 125, 79, .4);
    }

    /* Footer */
    .auth-footer {
        text-align: center;
        margin-top: 15px;
        font-size: .85rem;
        font-weight: 600;
        color: var(--muted);
    }

    .auth-footer a {
        color: var(--forest-dark);
        font-weight: 900;
        text-decoration: none;
    }
    .auth-footer a:hover { text-decoration: underline; }

    /* =========================================
       RESPONSIVE
    ========================================= */
    @media(max-width: 800px) {
        .auth-container {
            flex-direction: column;
            max-width: 450px;
        }
        .auth-left { display: none; }
        .auth-right { padding: 25px; }
    }
</style>

<div class="auth-wrapper">
    <div class="auth-container">

        <!-- PANEL KIRI (ILUSTRASI) -->
        <div class="auth-left">
            <div class="deco-box deco-box-1"></div>
            <div class="deco-box deco-box-2"></div>

            <div class="auth-illustration">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="50" r="48" stroke="#C8E6C9" stroke-width="4" stroke-dasharray="8 8"/>
                    <path d="M25 75C25 75 30 40 75 25C75 25 80 65 40 75C30 77.5 25 75 25 75Z" fill="#81C784" stroke="#2E7D4F" stroke-width="3" stroke-linejoin="round"/>
                    <path d="M25 75L50 50" stroke="#1B5E3A" stroke-width="3" stroke-linecap="round"/>
                    <path d="M35 60L45 55M28 68L38 63M45 45L55 40M55 35L65 30" stroke="#1B5E3A" stroke-width="2" stroke-linecap="round" opacity="0.6"/>
                    <circle cx="75" cy="25" r="6" fill="#FFD54F"/>
                    <circle cx="50" cy="50" r="6" fill="#FFD54F"/>
                </svg>
            </div>

            <h2>Selamat Datang<br>Kembali!</h2>
            <p>Lanjutkan perjalanan belajarmu dari tempat terakhir.</p>
        </div>

        <!-- PANEL KANAN (FORM LOGIN) -->
        <div class="auth-right">
            
            <div class="auth-toggle">
                <a href="{{ route('login') }}" class="active">Masuk</a>
                <a href="{{ route('register') }}">Daftar</a>
            </div>

            @if ($errors->any())
                <div class="auth-error">
                    @foreach ($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf 
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>
                
                <div class="auth-options">
                    <label>
                        <input type="checkbox" name="remember"> Ingat Saya
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Lupa Password?</a>
                    @endif
                </div>
                
                <button type="submit" class="btn-submit">
                    Masuk ke Akun
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18">
                        <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
            
            <p class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </p>
        </div>

    </div>
</div>

@endsection