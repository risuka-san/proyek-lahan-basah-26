@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <span class="badge">🍃 PETUALANGAN BELAJAR DIMULAI DI SINI</span>
        <h1 class="hero-title">Jelajah & Pelajari <br> <span class="text-orange">Ekosistem Lahan Basah</span></h1>
        <p>Temukan keajaiban rawa, gambut, dan mangrove melalui materi singkat serta game petualangan 2D yang seru.</p>
        <a href="/register" class="btn-hero">Mulai Petualangan</a>
    </div>
    <div class="hero-image">
        <!-- Ganti dengan ilustrasi karakter Rani -->
        <img src="{{ asset('images/rani-character.png') }}" alt="Rani Pemandu">
    </div>
</div>

<!-- Fitur Card Bawah -->
<div class="features-container">
    <div class="feature-card">
        <div class="icon">📖</div>
        <div>
            <h3>6 Modul Materi Lengkap</h3>
            <p>Ringkas dan mudah dipahami</p>
        </div>
    </div>
    <div class="feature-card">
        <div class="icon">🎮</div>
        <div>
            <h3>2D Game Interaktif</h3>
            <p>Belajar melalui petualangan</p>
        </div>
    </div>
    <div class="feature-card">
        <div class="icon">✅</div>
        <div>
            <h3>Simpan Progres Belajar</h3>
            <p>Lanjutkan kapan saja</p>
        </div>
    </div>
</div>
@endsection