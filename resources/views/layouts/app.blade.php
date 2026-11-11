<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RawaRia - Media Belajar Lahan Basah</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS DESAIN RAWARIA -->
    <style>
        :root {
            --bg-color: #F5F0E1;
            --primary-green: #2D5A3F;
            --accent-green: #8FBC8F;
            --accent-orange: #E76F51;
            --accent-yellow: #F4C430;
            --text-dark: #1F2937;
            --card-bg: #FFFFFF;
            --border-radius: 20px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Nunito', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-dark); }

        /* NAVBAR */
        .navbar { display: flex; justify-content: space-between; align-items: center; padding: 20px 50px; }
        .logo { display: flex; align-items: center; gap: 10px; }
        .logo-text h1 { font-size: 1.2rem; color: var(--primary-green); }
        .logo-text span { font-size: 0.6rem; color: #666; letter-spacing: 1px; }
        .nav-links a { margin: 0 15px; text-decoration: none; color: var(--text-dark); font-weight: 600; }
        .nav-auth { display: flex; gap: 10px; align-items: center; }
        .btn-outline { border: 2px solid var(--primary-green); padding: 8px 20px; border-radius: 8px; text-decoration: none; color: var(--primary-green); font-weight: bold; background: transparent; }
        .btn-primary { background-color: var(--accent-yellow); padding: 8px 20px; border-radius: 8px; text-decoration: none; color: var(--text-dark); font-weight: bold; border: none; cursor: pointer; }

        /* HERO SECTION */
        .hero-section { display: flex; padding: 80px 50px; align-items: center; justify-content: space-between; background: linear-gradient(to bottom, #4A7C59 0%, #85A98F 100%); color: white; border-radius: 0 0 40px 40px; }
        .hero-title { font-size: 4rem; line-height: 1.1; margin: 20px 0; font-weight: 800; }
        .text-orange { color: var(--accent-yellow); }
        .badge { background: rgba(255,255,255,0.2); padding: 8px 15px; border-radius: 50px; font-size: 0.9rem; font-weight: bold; }
        .btn-hero { background-color: var(--accent-yellow); color: var(--text-dark); padding: 15px 30px; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 1.1rem; display: inline-block; margin-top: 20px; }

        /* FITUR CARD */
        .features-container { display: flex; gap: 20px; padding: 0 50px 50px; justify-content: center; margin-top: -30px; }
        .feature-card { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 15px; flex: 1; max-width: 300px; }

        /* DASHBOARD */
        .dashboard-container { padding: 40px 50px; }
        .dashboard-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .progress-card { background: var(--primary-green); color: white; padding: 25px; border-radius: 20px; width: 350px; }
        .level-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
        .level-card { background: white; padding: 20px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; border: 1px solid #E5E7EB; }
        .level-card.locked { opacity: 0.6; background: #F9FAFB; }
        .level-number { background: #F3F4F6; padding: 5px 10px; border-radius: 5px; font-size: 0.8rem; margin-right: 15px; }
        .level-badge { background: #E0F2FE; color: #0284C7; padding: 5px 10px; border-radius: 5px; font-weight: bold; }

        /* AUTH (Login/Register) */
        .auth-wrapper { display: flex; justify-content: center; align-items: center; min-height: 80vh; padding: 20px; }
        .auth-modal { background: white; padding: 40px; border-radius: 20px; width: 100%; max-width: 500px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); position: relative; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; font-size: 0.9rem; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #D1D5DB; border-radius: 10px; font-family: inherit; }
        .btn-submit { width: 100%; background: var(--primary-green); color: white; padding: 15px; border: none; border-radius: 10px; font-size: 1rem; font-weight: bold; cursor: pointer; margin-top: 10px; }

        /* MATERI */
        .materi-layout { display: flex; padding: 40px; gap: 40px; }
        .sidebar { width: 300px; }
        .materi-list { list-style: none; margin-top: 20px; }
        .materi-list li { padding: 15px; border-radius: 10px; margin-bottom: 10px; background: white; cursor: pointer; }
        .materi-list li.active { background: #E8F5E9; color: var(--primary-green); font-weight: bold; }
        .materi-content { flex: 1; background: white; padding: 40px; border-radius: 20px; }
        .stats-card { background: #D1E8D1; padding: 40px; border-radius: 20px; text-align: center; margin: 30px 0; }
        .materi-points { display: flex; gap: 20px; }
        .point-card { background: #FAFAFA; padding: 20px; border-radius: 15px; flex: 1; border: 1px solid #EEE; }
        .materi-footer { margin-top: 40px; background: var(--primary-green); padding: 20px; border-radius: 15px; text-align: right; }
        .btn-selesai { background: #D1E8D1; color: var(--primary-green); padding: 10px 20px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; }

        
    </style>
</head>
<body>
    @include('partials.navbar')

    <main>
        {{-- Mendukung @yield('content') DAN {{ $slot }} dari Breeze --}}
        @hasSection('content')
            @yield('content')
        @else
            {{ $slot ?? '' }}
        @endif
    </main>
</body>
</html>