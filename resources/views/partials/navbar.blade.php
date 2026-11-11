
<nav class="sifara-navbar">

    <div class="sifara-nav-inner">

        <!-- BRAND -->
        <a href="{{ Auth::check() ? route('dashboard') : url('/') }}"
           class="sifara-brand">

            <span class="sifara-brand-icon">🍃</span>

            <span class="sifara-brand-text">
                <strong>SIFARA</strong>
                <small>WETLAND LEARNING PLATFORM</small>
            </span>

        </a>


        <!-- NAVIGATION -->
        <div class="sifara-nav-links">

            @auth

                <a href="{{ route('dashboard') }}">
                    Beranda
                </a>

                <a href="{{ url('/materi/1') }}">
                    Materi
                </a>

                <a href="{{ route('peta.game') }}">
                    Peta Game
                </a>

            @else

                <a href="{{ url('/') }}">
                    Beranda
                </a>

                <a href="{{ url('/#tentang') }}">
                    Tentang
                </a>

            @endauth

        </div>


        <!-- USER ACTIONS -->
        <div class="sifara-nav-actions">

            @auth

                <a href="{{ route('profile.edit') }}"
                   class="sifara-profile-link">
                    Profil
                </a>

                <form method="POST"
                      action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="sifara-logout">
                        Keluar
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}"
                   class="sifara-profile-link">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                   class="sifara-logout">
                    Daftar
                </a>

            @endauth

        </div>

    </div>

</nav>


<style>
.sifara-navbar {
    position: relative;
    z-index: 100;
    background: #183D2B;
    color: white;
    padding: 0 50px;
    box-shadow: 0 3px 15px rgba(0,0,0,.08);
}

.sifara-nav-inner {
    max-width: 1440px;
    min-height: 78px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 25px;
}

.sifara-brand {
    display: flex;
    align-items: center;
    gap: 11px;
    color: white;
    text-decoration: none;
}

.sifara-brand:hover {
    color: #D9EBDD;
}

.sifara-brand-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border-radius: 13px;
    background: #EFC94C;
    font-size: 1.5rem;
}

.sifara-brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.sifara-brand-text strong {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    letter-spacing: .5px;
}

.sifara-brand-text small {
    margin-top: 5px;
    color: #C6D9C8;
    font-size: .59rem;
    letter-spacing: 1px;
}

.sifara-nav-links {
    display: flex;
    align-items: center;
    gap: 30px;
}

.sifara-nav-links a {
    position: relative;
    padding: 28px 0;
    color: #F5F7F2;
    text-decoration: none;
    font-size: .95rem;
    font-weight: 700;
    transition: .2s;
}

.sifara-nav-links a:hover {
    color: #EFC94C;
}

.sifara-nav-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}

.sifara-nav-actions form {
    margin: 0;
}

.sifara-profile-link {
    padding: 9px 17px;
    border: 1px solid rgba(255,255,255,.6);
    border-radius: 10px;
    color: white;
    text-decoration: none;
    font-weight: 700;
}

.sifara-profile-link:hover {
    background: rgba(255,255,255,.1);
    color: white;
}

.sifara-logout {
    padding: 10px 19px;
    border: 0;
    border-radius: 10px;
    background: #EFC94C;
    color: #183D2B;
    font-weight: 800;
    cursor: pointer;
    text-decoration: none;
}

.sifara-logout:hover {
    background: #F7D967;
    color: #183D2B;
}

@media(max-width: 850px) {
    .sifara-navbar {
        padding: 0 20px;
    }

    .sifara-nav-inner {
        flex-wrap: wrap;
        padding: 13px 0;
        gap: 14px;
    }

    .sifara-nav-links {
        order: 3;
        width: 100%;
        justify-content: center;
        gap: 22px;
    }

    .sifara-nav-links a {
        padding: 8px 0;
        font-size: .85rem;
    }
}

@media(max-width: 480px) {
    .sifara-brand-text small {
        font-size: .5rem;
    }

    .sifara-nav-links {
        gap: 13px;
    }

    .sifara-nav-actions {
        gap: 7px;
    }

    .sifara-profile-link,
    .sifara-logout {
        padding: 8px 11px;
        font-size: .8rem;
    }
}
</style>
