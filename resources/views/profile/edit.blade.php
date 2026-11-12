
@extends('layouts.app')

@section('content')

<style>
    .profile-page {
        min-height: calc(100vh - 75px);
        padding: 42px 20px 65px;
        background:
            radial-gradient(circle at 8% 10%, rgba(184,212,184,.2), transparent 25%),
            radial-gradient(circle at 92% 85%, rgba(201,183,139,.15), transparent 25%),
            #F7F7F0;
        font-family: 'Nunito', sans-serif;
    }

    .profile-container {
        width: 100%;
        max-width: 950px;
        margin: 0 auto;
    }

    .profile-back {
        display: inline-flex;
        margin-bottom: 25px;
        color: #496B55;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s;
    }

    .profile-back:hover {
        color: #183D2B;
        transform: translateX(-3px);
    }

    .profile-identity {
        display: flex;
        align-items: center;
        gap: 22px;
        padding: 30px;
        margin-bottom: 25px;
        background: #FFFFFF;
        border: 1px solid #E5EBDD;
        border-radius: 22px;
        box-shadow: 0 8px 25px rgba(43,76,52,.05);
    }

    .profile-avatar {
        width: 78px;
        height: 78px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #EFC94C;
        color: #183D2B;
        border-radius: 22px;
        font-family: 'Playfair Display', serif;
        font-size: 34px;
        font-weight: 700;
    }

    .profile-identity h1 {
        margin: 0 0 5px;
        color: #214E38;
        font-family: 'Playfair Display', serif;
        font-size: 28px;
    }

    .profile-identity p {
        margin: 0;
        color: #718477;
        font-size: 14px;
        word-break: break-word;
    }

    .profile-eyebrow {
        color: #819083;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 1.5px;
        margin-bottom: 5px;
    }

    /* PROGRESS CARD */

    .profile-progress {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 30px 34px;
        margin-bottom: 28px;
        background:
            radial-gradient(circle at 90% 15%, rgba(168,198,160,.2), transparent 35%),
            #214E38;
        border-radius: 22px;
        box-shadow: 0 10px 28px rgba(33,78,56,.12);
    }

    .progress-content {
        position: relative;
        z-index: 1;
        flex: 1;
    }

    .progress-label {
        color: #D9EBDD;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 1.5px;
    }

    .progress-content h2 {
        margin: 8px 0 14px;
        color: #FFFFFF;
        font-family: 'Playfair Display', serif;
        font-size: clamp(25px, 4vw, 34px);
        line-height: 1.35;
    }

    .progress-content p {
        color: #D9EBDD;
        font-size: 13px;
        margin: 0 0 17px;
    }

    .progress-track {
        width: 100%;
        max-width: 430px;
        height: 9px;
        overflow: hidden;
        background: rgba(255,255,255,.2);
        border-radius: 20px;
    }

    .progress-fill {
        height: 100%;
        background: #EFC94C;
        border-radius: 20px;
        transition: width .4s ease;
    }

    .progress-percentage {
        display: block;
        margin-top: 8px;
        color: #EFC94C;
        font-size: 12px;
        font-weight: 900;
    }

    .progress-icon {
        flex-shrink: 0;
        width: 105px;
        height: 105px;
        display: grid;
        place-items: center;
        background: rgba(255,255,255,.1);
        border: 1px solid rgba(255,255,255,.15);
        border-radius: 25px;
        font-size: 55px;
    }

    /* FORM CARDS */

    .profile-form-card {
        padding: 30px;
        margin-bottom: 25px;
        background: #FFFFFF;
        border: 1px solid #E5EBDD;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(43,76,52,.045);
    }

    .profile-form-header {
        margin-bottom: 24px;
        padding-bottom: 18px;
        border-bottom: 1px solid #E9EEE5;
    }

    .profile-form-header h3 {
        margin: 0 0 6px;
        color: #284A35;
        font-family: 'Playfair Display', serif;
        font-size: 23px;
    }

    .profile-form-header p {
        margin: 0;
        color: #829080;
        font-size: 13px;
        line-height: 1.6;
    }

    .profile-form-group {
        margin-bottom: 19px;
    }

    .profile-form-group label {
        display: block;
        margin-bottom: 8px;
        color: #405B47;
        font-size: 13px;
        font-weight: 800;
    }

    .profile-form-group input {
        display: block;
        width: 100%;
        padding: 13px 15px;
        background: #FAFBF8;
        border: 1.5px solid #E1E9DE;
        border-radius: 11px;
        outline: none;
        color: #344B3B;
        font-family: 'Nunito', sans-serif;
        font-size: 14px;
        transition: .2s;
    }

    .profile-form-group input:focus {
        background: #FFFFFF;
        border-color: #6C9974;
        box-shadow: 0 0 0 3px rgba(108,153,116,.12);
    }

    .profile-error {
        display: block;
        margin-top: 6px;
        color: #C24141;
        font-size: 12px;
    }

    .profile-alert-success {
        padding: 13px 16px;
        margin-bottom: 20px;
        background: #EAF3E8;
        border: 1px solid #CFE2CA;
        border-radius: 11px;
        color: #315C42;
        font-size: 13px;
        font-weight: 800;
    }

    .profile-button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        padding: 13px 23px;
        background: #28583D;
        border: none;
        border-radius: 11px;
        color: #FFFFFF;
        font-family: 'Nunito', sans-serif;
        font-size: 13px;
        font-weight: 900;
        cursor: pointer;
        transition: .25s;
    }

    .profile-button:hover {
        background: #183D2B;
        transform: translateY(-2px);
    }

    .password-heading {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .password-icon {
        width: 43px;
        height: 43px;
        display: grid;
        place-items: center;
        background: #EAF2E8;
        border-radius: 12px;
        font-size: 20px;
    }

    @media (max-width: 600px) {
        .profile-page {
            padding: 25px 13px 45px;
        }

        .profile-identity {
            padding: 22px;
            gap: 15px;
        }

        .profile-avatar {
            width: 62px;
            height: 62px;
            font-size: 27px;
        }

        .profile-identity h1 {
            font-size: 23px;
        }

        .profile-progress {
            padding: 24px 20px;
        }

        .progress-icon {
            width: 65px;
            height: 65px;
            font-size: 34px;
            border-radius: 17px;
        }

        .profile-form-card {
            padding: 22px 18px;
        }

        .profile-button {
            width: 100%;
        }
    }

    @media (max-width: 380px) {
        .progress-icon {
            display: none;
        }
    }
</style>

<div class="profile-page">
    <div class="profile-container">

        <a href="{{ route('dashboard') }}" class="profile-back">
            ← Kembali ke Dashboard
        </a>

        <!-- IDENTITAS PENGGUNA -->
        <section class="profile-identity">

            <div class="profile-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <div>
                <div class="profile-eyebrow">
                    SIFARA LEARNING MEMBER
                </div>

                <h1>{{ $user->name }}</h1>

                <p>{{ $user->email }}</p>
            </div>

        </section>

        <!-- PROGRES BELAJAR -->
        @php
            $progressPercentage = $totalLevels > 0
                ? round(($completedCount / $totalLevels) * 100)
                : 0;
        @endphp

        <section class="profile-progress">

            <div class="progress-content">

                <div class="progress-label">
                    TOTAL PROGRES BELAJAR
                </div>

                <h2>
                    {{ $completedCount }} dari {{ $totalLevels }} Level
                    Berhasil Diselesaikan!
                </h2>

                <p>
                    Terus lanjutkan petualanganmu menjelajahi ekosistem
                    lahan basah bersama SIFARA.
                </p>

                <div class="progress-track">
                    <div class="progress-fill"
                         style="width: {{ $progressPercentage }}%;">
                    </div>
                </div>

                <span class="progress-percentage">
                    {{ $progressPercentage }}% perjalanan pembelajaran
                </span>

            </div>

            <div class="progress-icon">
                🏆
            </div>

        </section>

        <!-- EDIT PROFIL -->
        <section class="profile-form-card">

            <div class="profile-form-header">
                <h3>Edit Informasi Profil</h3>
                <p>Perbarui nama dan alamat email akun SIFARA milikmu.</p>
            </div>

            @if (session('status') === 'profile-updated')
                <div class="profile-alert-success">
                    ✓ Profil berhasil diperbarui!
                </div>
            @endif

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="profile-form-group">
                    <label for="name">Nama Lengkap</label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        autofocus
                        autocomplete="name"
                    >

                    @error('name')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-form-group">
                    <label for="email">Alamat Email</label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="username"
                    >

                    @error('email')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="profile-button">
                    Simpan Perubahan →
                </button>

            </form>

        </section>

        <!-- UBAH PASSWORD -->
        <section class="profile-form-card">

            <div class="profile-form-header">

                <div class="password-heading">
                    <div class="password-icon">🔐</div>

                    <div>
                        <h3>Ubah Password</h3>
                        <p>Pastikan akunmu tetap aman dengan password yang kuat.</p>
                    </div>
                </div>

            </div>

            @if (session('status') === 'password-updated')
                <div class="profile-alert-success">
                    ✓ Password berhasil diubah!
                </div>
            @endif

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="profile-form-group">
                    <label for="current_password">Password Saat Ini</label>

                    <input
                        id="current_password"
                        type="password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                    >

                    @error('current_password', 'updatePassword')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-form-group">
                    <label for="password">Password Baru</label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >

                    @error('password', 'updatePassword')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-form-group">
                    <label for="password_confirmation">
                        Konfirmasi Password Baru
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="profile-button">
                    Perbarui Password →
                </button>

            </form>

        </section>

    </div>
</div>

@endsection
