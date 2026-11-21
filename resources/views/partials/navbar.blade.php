<nav class="sifara-navbar">
    <div class="sifara-nav-inner">

        <!-- BRAND -->
        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}"
           class="sifara-brand">
            
            <!-- LOGO BERBENTUK KOTAK DENGAN BORDER KUNING -->
            <div class="sifara-brand-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo SIFARA">
            </div>
            
            <!-- TEKS DI SEBELAH LOGO (DIKEMBALIKAN) -->
            <span class="sifara-brand-text">
                <strong>SIFARA</strong>
                <small>WETLAND LEARNING PLATFORM</small>
            </span>
        </a>

        <!-- NAVIGATION -->
        <div class="sifara-nav-links">

            @auth
                <a href="{{ route('dashboard') }}">Beranda</a>
                <a href="{{ url('/materi/1') }}">Materi</a>
                <a href="{{ url('/latihan') }}">Latihan</a>
                <a href="{{ url('/tentang') }}">Tentang</a>
            @else
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/#tentang') }}">Tentang</a>
            @endauth

        </div>

        <!-- USER ACTIONS -->
        <div class="sifara-nav-actions">

            @auth
                <a href="{{ route('profile.edit') }}" class="sifara-profile-link">
                    Profil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sifara-logout">
                        Keluar
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="sifara-profile-link">
                    Masuk
                </a>

                <a href="{{ route('register') }}" class="sifara-logout">
                    Daftar
                </a>
            @endauth

        </div>
    </div>
</nav>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap');

    .sifara-navbar {
        position: relative;
        z-index: 100;
        background: linear-gradient(90deg, #1B5E3A, #2E7D4F);
        color: white;
        padding: 0 50px;
        box-shadow: 0 4px 20px rgba(33, 78, 56, .15);
        font-family: 'Nunito', sans-serif;
    }

    .sifara-nav-inner {
        max-width: 1440px;
        min-height: 85px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
    }

    /* ============ BRAND / LOGO & TEXT ============ */
    .sifara-brand {
        display: flex;
        align-items: center;
        gap: 14px; /* Jarak antara logo kotak dan teks */
        text-decoration: none !important;
        transition: transform .3s cubic-bezier(.34, 1.56, .64, 1);
    }

    .sifara-brand:hover {
        transform: scale(1.02);
    }

    /* LOGO KOTAK */
    .sifara-brand-logo {
        width: 60px;  
        height: 60px;
        border-radius: 16px; /* Membuat sudutnya membulat (kotak) */
        background: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden; 
        border: 3px solid #FFD54F; /* Border kuning */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: transform .3s ease;
    }

    .sifara-brand:hover .sifara-brand-logo {
        transform: rotate(-5deg) scale(1.05);
    }

    .sifara-brand-logo img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
    }

    /* TEKS SIFARA */
    .sifara-brand-text {
        display: flex;
        flex-direction: column;
        line-height: 1.1;
    }

    .sifara-brand-text strong {
        color: white;
        font-family: 'Baloo 2', cursive, sans-serif;
        font-size: 1.6rem;
        letter-spacing: 1px;
        font-weight: 800;
    }

    .sifara-brand-text small {
        margin-top: 4px;
        color: #C8E6C9;
        font-size: .65rem;
        letter-spacing: 1.5px;
        font-weight: 700;
    }

    /* ============ NAV LINKS ============ */
    .sifara-nav-links {
        display: flex;
        align-items: center;
        gap: 35px;
    }

    .sifara-nav-links a {
        position: relative;
        padding: 30px 0;
        color: #F5F7F2 !important;
        text-decoration: none !important;
        font-size: 1rem;
        font-weight: 800;
        transition: .2s;
    }

    /* Garis bawah animasi saat hover */
    .sifara-nav-links a::after {
        content: '';
        position: absolute;
        bottom: 24px;
        left: 50%;
        width: 0;
        height: 3px;
        background: #FFD54F;
        border-radius: 3px;
        transition: all .3s ease;
        transform: translateX(-50%);
    }

    .sifara-nav-links a:hover {
        color: #FFD54F !important;
    }

    .sifara-nav-links a:hover::after {
        width: 100%;
    }

    /* ============ NAV ACTIONS ============ */
    .sifara-nav-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sifara-nav-actions form {
        margin: 0;
    }

    .sifara-profile-link {
        padding: 10px 22px;
        border: 2px solid rgba(255,255,255,.4);
        border-radius: 20px;
        color: white !important;
        text-decoration: none !important;
        font-weight: 800;
        font-size: .9rem;
        transition: .3s ease;
    }

    .sifara-profile-link:hover {
        background: rgba(255,255,255,.15);
        border-color: white;
    }

    .sifara-logout {
        padding: 10px 24px;
        border: 0;
        border-radius: 20px;
        background: linear-gradient(135deg, #FFD54F, #FFCA28);
        color: #1B5E3A !important;
        font-weight: 900;
        font-size: .9rem;
        cursor: pointer;
        text-decoration: none !important;
        box-shadow: 0 4px 12px rgba(255, 213, 79, .3);
        transition: .3s ease;
    }

    .sifara-logout:hover {
        background: linear-gradient(135deg, #FFCA28, #FFB300);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(255, 213, 79, .5);
    }

    /* ============ RESPONSIVE ============ */
    @media(max-width: 850px) {
        .sifara-navbar {
            padding: 0 20px;
        }

        .sifara-nav-inner {
            flex-wrap: wrap;
            padding: 15px 0;
            gap: 14px;
            justify-content: center;
        }

        .sifara-brand-logo {
            width: 50px;
            height: 50px;
            border-radius: 12px;
        }
        
        .sifara-brand-text strong {
            font-size: 1.4rem;
        }

        .sifara-nav-links {
            order: 3;
            width: 100%;
            justify-content: center;
            gap: 25px;
        }

        .sifara-nav-links a {
            padding: 8px 0;
            font-size: .9rem;
        }

        .sifara-nav-links a::after {
            bottom: 2px;
        }
    }

    @media(max-width: 480px) {
        .sifara-nav-links {
            gap: 15px;
        }

        .sifara-nav-actions {
            gap: 8px;
        }

        .sifara-profile-link,
        .sifara-logout {
            padding: 8px 14px;
            font-size: .8rem;
        }
        
        .sifara-brand-text small {
            font-size: .55rem;
        }
    }
</style>