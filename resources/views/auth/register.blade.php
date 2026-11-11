@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-modal">
        <a href="/" style="position: absolute; top: 20px; left: 20px; text-decoration: none; color: #333; font-size: 1.5rem;">←</a>
        
        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 30px;">
            <div style="background: #E8F5E9; padding: 15px; border-radius: 15px; font-size: 1.5rem;">🍃</div>
            <div>
                <span style="font-size: 0.7rem; font-weight: bold; color: #666; letter-spacing: 1px;">MULAI PETUALANGANMU</span>
                <h2 style="font-size: 1.8rem; color: var(--primary-green);">Daftar Akun Baru</h2>
                <p style="font-size: 0.9rem; color: #666;">Buat akun untuk menyimpan progres belajar dan game.</p>
            </div>
        </div>

        @if ($errors->any())
            <div style="background: #FEE2E2; color: #991B1B; padding: 10px; border-radius: 10px; margin-bottom: 15px; font-size: 0.9rem;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf 
            
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama lengkapmu" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Minimal 8 karakter" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
            </div>
            
            <button type="submit" class="btn-submit" style="margin-top: 20px;">Daftar Akun ➔</button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; font-size: 0.9rem;">
            Sudah punya akun? <a href="{{ route('login') }}" style="color: var(--primary-green); font-weight: bold; text-decoration: none;">Masuk</a>
        </p>
    </div>
</div>
@endsection