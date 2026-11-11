@extends('layouts.app')

@section('content')
<div class="auth-wrapper" style="min-height: 70vh;">
    <div class="auth-modal" style="max-width: 700px;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <a href="{{ route('peta.game') }}" style="text-decoration: none; color: #333; font-weight: bold;">← Kembali ke Peta</a>
            <span class="badge" style="background: var(--accent-yellow); color: #333;">LEVEL {{ $level_id }} GAME</span>
        </div>

        <h2 style="font-size: 1.5rem; color: var(--primary-green); margin-bottom: 20px;">
            {{ $soal['pertanyaan'] }}
        </h2>

        <!-- Notifikasi Error / Sukses -->
        @if(session('error'))
            <div style="background: #FEE2E2; color: #991B1B; padding: 10px; border-radius: 10px; margin-bottom: 15px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('kuis.submit', $level_id) }}" method="POST">
            @csrf
            
            <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 30px;">
                @foreach($soal['pilihan'] as $key => $value)
                    <label style="display: flex; align-items: center; gap: 15px; padding: 15px; border: 2px solid #E5E7EB; border-radius: 10px; cursor: pointer; transition: 0.2s;">
                        <input type="radio" name="jawaban" value="{{ $key }}" required style="transform: scale(1.5);">
                        <span style="font-size: 1.1rem;"><strong>{{ $key }}.</strong> {{ $value }}</span>
                    </label>
                @endforeach
            </div>

            <button type="submit" class="btn-submit">Kirim Jawaban 🚀</button>
        </form>

    </div>
</div>
@endsection