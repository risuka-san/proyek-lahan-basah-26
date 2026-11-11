<nav class="navbar">
    <div class="logo">
        <div style="background: #F4C430; padding: 5px 10px; border-radius: 10px; font-size: 1.5rem;">🍃</div>
        <div class="logo-text">
            <h1>RawaRia</h1>
            <span>BELAJAR • JELAJAH • LINDUNGI</span>
        </div>
    </div>
    
    <div class="nav-links">
        <a href="/">Beranda</a>
        <a href="{{ url('/dashboard') }}">Materi</a>
        <a href="{{ url('/dashboard') }}">Peta Game</a>
    </div>
    
    <div class="nav-auth">
        @auth
            {{-- Jika sudah login --}}
            <a href="{{ url('/dashboard') }}" class="btn-outline">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-primary" style="border: none; cursor: pointer; font-family: inherit; font-size: inherit; font-weight: bold;">Keluar</button>
            </form>
        @else
            {{-- Jika belum login --}}
            <a href="{{ route('login') }}" class="btn-outline">Masuk</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
            @endif
        @endauth
    </div>
</nav>