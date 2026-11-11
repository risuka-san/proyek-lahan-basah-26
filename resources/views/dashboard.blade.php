@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Bagian Atas: Sapaan & Card Petualangan -->
    <div class="dashboard-header">
        <div>
            <span class="badge" style="background: #F4C430; color: #333; margin-bottom: 15px; display: inline-block;">2 LEVEL SELESAI • LEVEL 3 TERBUKA</span>
            <h1 style="font-size: 2.5rem; color: var(--primary-green); line-height: 1.2;">Halo, {{ Auth::user()->name }}! Siap <br><span style="color: var(--accent-orange);">menjelajah?</span></h1>
            <p style="margin-top: 10px; color: #555; max-width: 500px;">Lanjutkan belajar dan temukan bagaimana lahan basah menjaga bumi tetap sehat.</p>
        </div>
        
        <!-- Card Petualangan Hari Ini -->
        <div class="progress-card">
            <span style="font-size: 0.7rem; font-weight: bold; letter-spacing: 1px; opacity: 0.8;">PETUALANGAN HARI INI</span>
            <h3 style="font-size: 1.5rem; margin: 10px 0;">Rawa Pasang Surut</h3>
            <a href="#" style="background: var(--accent-yellow); color: #333; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-weight: bold; display: inline-block; margin-top: 10px;">Buka Peta ➔</a>
        </div>
    </div>

    <!-- Judul List Materi -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--primary-green);">Topik Ekosistem Lahan Basah</h2>
        <a href="#" style="color: var(--primary-green); text-decoration: none; font-weight: bold;">Lihat materi</a>
    </div>

    <!-- List Materi / Level Grid -->
    <div class="level-grid">
        @foreach($levels as $level)
            <div class="level-card {{ $level['status'] == 'Terkunci' ? 'locked' : '' }}">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span class="level-number">{{ str_pad($level['id'], 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="level-badge">{{ $level['kode'] }}</div>
                    <div>
                        <h4 style="margin-bottom: 3px;">{{ $level['judul'] }}</h4>
                        <p style="font-size: 0.8rem; color: #666;">{{ $level['desc'] }}</p>
                    </div>
                </div>
                <div>
                    @if($level['status'] == 'Selesai')
                        <span style="background: #E8F5E9; color: #2D5A3F; padding: 5px 10px; border-radius: 50%; font-size: 0.8rem;">✅</span>
                    @elseif($level['status'] == 'Terbuka')
                        <span style="background: #F4C430; color: #333; padding: 5px 10px; border-radius: 50%; font-size: 0.8rem;">➔</span>
                    @else
                        <span style="background: #F3F4F6; color: #9CA3AF; padding: 5px 10px; border-radius: 50%; font-size: 0.8rem;">🔒</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection