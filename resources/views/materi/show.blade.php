@extends('layouts.app')

@section('content')
<div class="materi-layout" style="display: flex; gap: 30px; padding: 40px 50px; align-items: flex-start;">
    
    <!-- SIDEBAR KIRI -->
    <aside class="sidebar" style="width: 300px; position: sticky; top: 30px; background: white; padding: 25px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <a href="/dashboard" style="text-decoration: none; color: #333; font-weight: bold; display: block; margin-bottom: 20px;">← Kembali ke Dashboard</a>
        
        <span style="font-size: 0.7rem; font-weight: bold; color: #666; letter-spacing: 1px;">PILIH MATERI BELAJAR</span>
        <h2 style="color: var(--primary-green); margin: 10px 0 20px 0; font-size: 1.3rem;">Modul Ekosistem Lahan Basah</h2>
        
        <!-- Daftar Navigasi Sidebar -->
        <ul class="materi-list" style="list-style: none; padding: 0; margin: 0;">
            @foreach($materiList as $id => $item)
                <li style="margin-bottom: 10px;">
                    <a href="/materi/{{ $id }}" class="sidebar-link {{ $currentId == $id ? 'active' : '' }}">
                        {{ $id }}. {{ $item['judul'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- KONTEN KANAN -->
    <article class="materi-content" style="flex: 1; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        
        <span style="font-size: 0.7rem; font-weight: bold; color: #666; letter-spacing: 1px;">DASAR EKOSISTEM • BAB {{ $currentId }}</span>
        <h1 style="font-size: 2.5rem; color: var(--primary-green); line-height: 1.2; margin-top: 10px;">
            {{ $material['judul'] }}
        </h1>
        <h2 style="color: var(--accent-orange); margin-bottom: 20px; font-size: 1.5rem;">
            {{ $material['sub_judul'] }}
        </h2>
        
        <p style="margin-top: 15px; color: #555; font-size: 1.1rem; line-height: 1.6;">
            {{ $material['konten'] }}
        </p>

        <!-- Kotak Fakta -->
        <div class="stats-card" style="background: #D1E8D1; padding: 30px; border-radius: 20px; margin: 30px 0; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 style="font-size: 3rem; color: var(--primary-green); margin: 0;">{{ $material['fakta_angka'] }}</h2>
                <p style="font-size: 0.8rem; font-weight: bold; color: #333; margin: 5px 0;">FAKTA PENTING</p>
                <p style="font-size: 0.9rem; color: #555;">{{ $material['fakta_teks'] }}</p>
            </div>
            <div style="font-size: 4rem;">🌱🌊</div>
        </div>

        <!-- Navigasi Bawah (Next / Prev) -->
        <div style="display: flex; justify-content: space-between; margin-top: 40px; padding-top: 20px; border-top: 1px solid #EEE;">
            @if($currentId > 1)
                <a href="/materi/{{ $currentId - 1 }}" class="btn-outline" style="text-decoration: none;">← Bab Sebelumnya</a>
            @else
                <div></div> <!-- Spacer -->
            @endif

            @if($currentId < count($materiList))
                <a href="/materi/{{ $currentId + 1 }}" class="btn-primary" style="text-decoration: none;">Bab Selanjutnya →</a>
            @else
                <a href="{{ route('peta.game') }}" class="btn-primary" style="text-decoration: none;">Selesai & Uji Kemampuan →</a>
            @endif
        </div>

    </article>
</div>

<!-- CSS Tambahan untuk Sidebar -->
<style>
    .sidebar-link {
        display: block;
        padding: 12px 15px;
        color: #333;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.2s;
    }
    .sidebar-link:hover {
        background: #F5F0E1;
        color: var(--primary-green);
    }
    .sidebar-link.active {
        background: #E8F5E9; /* Warna hijau muda untuk menu aktif */
        color: var(--primary-green);
        font-weight: bold;
    }
</style>
@endsection