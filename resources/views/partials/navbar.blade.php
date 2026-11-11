<nav class="navbar">
    <div class="logo">
        <!-- Jika logo diklik, arahkan ke dashboard jika sudah login, atau ke home jika belum -->
        <a href="{{ Auth::check() ? '/dashboard' : '/' }}" style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
            <div style="background: #F4C430; padding: 5px 10px; border-radius: 10px; font-size: 1.5rem;">🍃</div>
            <div class="logo-text">
                <h1>RawaRia</h1>
                <span>BELAJAR • JELAJAH • LINDUNGI</span>
            </div>
        </a>
    </div>
    
    <div class="nav-links">
        @auth
            <!-- NAVBAR JIKA SUDAH LOGIN -->
            <a href="/dashboard">Beranda</a>
            <a href="/materi/1">Materi</a>
            <a href="{{ route('peta.game') }}">Peta Game</a>
        @else
            <!-- NAVBAR JIKA BELUM LOGIN (Tamu) -->
            <a href="/">Beranda</a>
            <a href="#tentang">Tentang</a>
        @endauth
    </div>
    
    <div class="nav-auth">
        @auth
            <!-- TAMBAHAN: Tombol Profil -->
            <a href="{{ route('profile.edit') }}" class="btn-outline" style="margin-right: 10px;">Profil</a>

            <!-- JIKA SUDAH LOGIN: Tampilkan tombol Keluar -->
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-primary" style="cursor: pointer;">Keluar</button>
            </form>
        @else
            <!-- JIKA BELUM LOGIN: Tampilkan Masuk & Daftar -->
            <a href="{{ route('login') }}" class="btn-outline">Masuk</a>
            <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
        @endauth
    </div>
</nav>