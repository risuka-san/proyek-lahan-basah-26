@extends('layouts.app')

@section('content')
<div class="dashboard-container" style="padding-top: 40px; max-width: 800px; margin: 0 auto;">
    
    <!-- Tombol Kembali -->
    <a href="/dashboard" style="text-decoration: none; color: #333; font-weight: bold; display: inline-block; margin-bottom: 20px;">← Kembali ke Dashboard</a>

    <!-- Header Profil -->
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-bottom: 30px; display: flex; align-items: center; gap: 20px;">
        <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: bold; color: var(--primary-green);">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
            <h1 style="font-size: 2rem; color: var(--primary-green); margin: 0;">{{ $user->name }}</h1>
            <p style="color: #666; margin: 5px 0 0 0;">{{ $user->email }}</p>
        </div>
    </div>

    <!-- Kartu Progres -->
    <div style="background: var(--primary-green); color: white; padding: 30px; border-radius: 20px; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="font-size: 0.8rem; font-weight: bold; letter-spacing: 1px; opacity: 0.8;">TOTAL PROGRES BELAJAR</span>
            <h2 style="font-size: 2rem; margin: 5px 0;">Kamu sudah menyelesaikan <br> {{ $completedCount }} dari {{ $totalLevels }} level!</h2>
        </div>
        <div style="font-size: 4rem;">🏆</div>
    </div>

    <!-- Form Edit Profil -->
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h3 style="color: var(--primary-green); margin-bottom: 20px;">Edit Informasi Profil</h3>
        
        <!-- Notifikasi Sukses -->
        @if (session('status') === 'profile-updated')
            <div style="background: #E8F5E9; color: #2D5A3F; padding: 10px; border-radius: 10px; margin-bottom: 15px; font-weight: bold;">
                ✅ Profil berhasil diperbarui!
            </div>
        @endif

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Form Ubah Password -->
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-top: 30px;">
        <h3 style="color: var(--primary-green); margin-bottom: 20px;">Ubah Password</h3>

        @if (session('status') === 'password-updated')
            <div style="background: #E8F5E9; color: #2D5A3F; padding: 10px; border-radius: 10px; margin-bottom: 15px; font-weight: bold;">
                ✅ Password berhasil diubah!
            </div>
        @endif

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Password Saat Ini</label>
                <input type="password" name="current_password" required>
                @error('current_password', 'updatePassword') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password" required>
                @error('password', 'updatePassword') <span style="color: red; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-submit">Ubah Password</button>
        </form>
    </div>

</div>
@endsection