
@extends('layouts.app')

@section('content')
<div class="dashboard-container" style="padding: 50px 30px;">

    <div style="background: white; padding: 40px; border-radius: 20px; text-align: center;">

        <div style="font-size: 4rem;">📚</div>

        <h1 style="color: var(--primary-green); margin: 20px 0;">
            {{ $level->judul }}
        </h1>

        <p style="color: #666; margin-bottom: 25px;">
            Materi untuk level ini belum tersedia.
            Silakan kembali lagi setelah materi ditambahkan.
        </p>

        <a href="{{ route('dashboard') }}"
           class="btn-primary"
           style="text-decoration: none;">
            Kembali ke Dashboard
        </a>

    </div>
</div>
@endsection
