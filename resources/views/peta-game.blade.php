@extends('layouts.app')

@section('content')
<style>
    /* CSS Khusus Peta Game */
    .level-card-game {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        position: relative;
        transition: all 0.3s ease; /* Animasi halus */
        border: 2px solid transparent;
    }
    .level-card-game:hover {
        transform: translateY(-10px); /* Kartu naik saat di-hover */
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        border-color: var(--accent-yellow);
    }
    
    /* Efek Mengkilap saat Hover */
    .level-card-game::before {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 50%; height: 100%;
        background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 100%);
        transform: skewX(-25deg);
        transition: 0.5s;
        z-index: 1;
    }
    .level-card-game:hover::before {
        left: 125%;
    }
</style>

<div class="dashboard-container" style="padding-top: 40px;">
    
    <!-- Header Peta -->
    <div style="margin-bottom: 40px;">
        <a href="/dashboard" style="text-decoration: none; color: #333; font-weight: bold; display: inline-block; margin-bottom: 15px;">← Kembali ke Dashboard</a>
        <span class="badge" style="background: #F4C430; color: #333; display: inline-block; margin-bottom: 10px;">PETA PETUALANGAN</span>
        <h1 style="font-size: 2.5rem; color: var(--primary-green);">Uji Nyali & Ilmumu!</h1>
        <p style="color: #666; margin-top: 10px;">Selesaikan misi dan jawab tantangan di setiap habitat untuk membuka level baru.</p>
    </div>

    <!-- Grid Kartu Level -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px;">
        @foreach($levels as $level)
            <div class="level-card-game">
                
                <!-- BAGIAN ATAS: ILUSTRASI CSS -->
                <div style="height: 180px; background-color: {{ $level['bg'] }}; position: relative; overflow: hidden;">
                    <!-- Angka Level -->
                    <div style="position: absolute; top: 15px; left: 15px; background: white; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.9rem; z-index: 2; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
                        {{ str_pad($level['id'], 2, '0', STR_PAD_LEFT) }}
                    </div>
                    
                    <!-- Badge Status -->
                    <div style="position: absolute; top: 15px; right: 15px; background: rgba(0,0,0,0.4); color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.7rem; font-weight: bold; z-index: 2; backdrop-filter: blur(4px);">
                        {{ strtoupper($level['status']) }}
                    </div>

                    <!-- Ilustrasi Lanskap CSS (Gunung & Air) -->
                    <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 100%;">
                        <!-- Matahari/Awan -->
                        <div style="position: absolute; top: 20px; right: 40px; width: 50px; height: 50px; background: rgba(255,255,255,0.4); border-radius: 50%; filter: blur(2px);"></div>
                        
                        <!-- Bukit Belakang -->
                        <div style="position: absolute; bottom: 20px; left: -20px; width: 120%; height: 90px; background: rgba(0,0,0,0.1); border-radius: 50% 50% 0 0;"></div>
                        <!-- Bukit Depan -->
                        <div style="position: absolute; bottom: 0; left: -50px; width: 150%; height: 110px; background: rgba(0,0,0,0.2); border-radius: 50% 50% 0 0;"></div>
                        <!-- Air -->
                        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 50px; background: rgba(255,255,255,0.25);"></div>
                        
                        <!-- Pohon -->
                        <div style="position: absolute; bottom: 40px; right: 40px; width: 0; height: 0; border-left: 20px solid transparent; border-right: 20px solid transparent; border-bottom: 40px solid rgba(0,0,0,0.2);"></div>
                        <div style="position: absolute; bottom: 30px; right: 15px; width: 0; height: 0; border-left: 15px solid transparent; border-right: 15px solid transparent; border-bottom: 30px solid rgba(0,0,0,0.2);"></div>
                    </div>
                </div>

                <!-- BAGIAN BAWAH: INFO -->
                <div style="padding: 25px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <span style="background: #F3F4F6; color: #333; padding: 5px 10px; border-radius: 8px; font-weight: bold; font-size: 0.8rem;">{{ $level['kode'] }}</span>
                        <h3 style="font-size: 1.1rem; color: var(--text-dark); font-weight: 800;">{{ $level['judul'] }}</h3>
                    </div>
                    <p style="font-size: 0.85rem; color: #666; margin-bottom: 20px; line-height: 1.4;">{{ $level['desc'] }}</p>

                    <!-- Tombol Aksi -->
                    @if($level['status'] == 'Selesai')
                        <a href="/kuis/{{ $level['id'] }}/game" style="display: block; text-align: center; background: #E8F5E9; color: #2D5A3F; padding: 12px; border-radius: 12px; text-decoration: none; font-weight: bold; transition: 0.2s;">Main Lagi 🎮</a>
                    @elseif($level['status'] == 'Terbuka')
                        <a href="/kuis/{{ $level['id'] }}/game" style="display: block; text-align: center; background: var(--accent-orange); color: white; padding: 12px; border-radius: 12px; text-decoration: none; font-weight: bold; transition: 0.2s; box-shadow: 0 4px 10px rgba(231, 111, 81, 0.3);">Mulai Tantangan ➔</a>
                    @else
                        <button disabled style="display: block; width: 100%; text-align: center; background: #E5E7EB; color: #9CA3AF; padding: 12px; border-radius: 12px; border: none; font-weight: bold;">Terkunci 🔒</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection