@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-modal">
        <a href="/" style="position: absolute; top: 20px; left: 20px; text-decoration: none; color: #333; font-size: 1.5rem;">←</a>
        
        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 30px;">
            <div style="background: #E8F5E9; padding: 15px; border-radius: 15px; font-size: 1.5rem;">👤</div>
            <div>
                <span style="font-size: 0.7rem; font-weight: bold; color: #666; letter-spacing: 1px;">SELAMAT DATANG KEMBALI</span>
                <h2 style="font-size: 1.8rem; color: var(--primary-green);">Masuk ke Akunmu</h2>
                <p style="font-size: 0.9rem; color: #666;">Lanjutkan perjalanan belajarmu dari tempat terakhir.</p>
            </div>
        </div>

        {{-- Menampilkan pesan error jika login gagal --}}
        @if ($errors->any())
            <div style="background: #FEE2E2; color: #991B1B; padding: 10px; border-radius: 10px; margin-bottom: 15px; font-size: 0.9rem;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf 
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; font-size: 0.9rem;">
                <label style="display: flex; align-items: center; gap: 5px;">
                    <input type="checkbox" name="remember"> Ingat Saya
                </label>
                {{-- Link lupa password ini hanya muncul jika route-nya ada --}}
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--primary-green); text-decoration: none; font-weight: bold;">Lupa Password?</a>
                @endif
            </div>
            
            <button type="submit" class="btn-submit">Masuk ➔</button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; font-size: 0.9rem;">
            Belum punya akun? <a href="{{ route('register') }}" style="color: var(--primary-green); font-weight: bold; text-decoration: none;">Daftar Sekarang</a>
        </p>
    </div>
</div>
@endsection