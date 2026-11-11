@extends('layouts.app')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 80vh; background: #F5F0E1;">
    
    <!-- Header Game -->
    <div style="width: 100%; max-width: 800px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <a href="{{ route('peta.game') }}" style="text-decoration: none; color: #333; font-weight: bold;">← Kembali ke Peta</a>
        <h2 style="color: var(--primary-green); margin: 0;">Misi: Susun Ekosistem!</h2>
        <div></div> <!-- Spacer -->
    </div>

    <!-- Container Game Phaser -->
    <div id="game-container" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);"></div>

    <!-- Form Tersembunyi untuk menyimpan progres ke Laravel -->
    <form id="form-selesai" action="{{ route('kuis.submit', $level_id) }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="jawaban" value="B"> <!-- Anggap selalu benar untuk demo game -->
    </form>

</div>

<!-- Panggil Phaser.js dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/phaser@3.55.2/dist/phaser.min.js"></script>

<!-- Logika Game -->
<script>
    const levelId = "{{ $level_id }}";
    
    // Konfigurasi Phaser
    const config = {
        type: Phaser.AUTO,
        width: 800,
        height: 500,
        parent: 'game-container',
        backgroundColor: '#85A98F', // Warna hijau rawa
        scene: {
            preload: preload,
            create: create
        }
    };

    const game = new Phaser.Game(config);

    function preload() {
        // Kita tidak pakai gambar asli, pakai teks emoji saja nanti
    }

    function create() {
        // 1. TAMPILKAN KOTAK HABITAT
        // Habitat 1: Rawa (Kiri)
        this.add.rectangle(200, 350, 250, 150, 0x4A7C59).setStrokeStyle(4, 0xFFFFFF);
        this.add.text(200, 400, 'HABITAT RAWA', { fontSize: '20px', fill: '#fff', fontStyle: 'bold' }).setOrigin(0.5);
        
        // Habitat 2: Gambut (Kanan)
        this.add.rectangle(600, 350, 250, 150, 0x8B5A2B).setStrokeStyle(4, 0xFFFFFF);
        this.add.text(600, 400, 'HABITAT GAMBUT', { fontSize: '20px', fill: '#fff', fontStyle: 'bold' }).setOrigin(0.5);

        // 2. TAMPILKAN HEWAN YANG BISA DI-DRAG
        // Hewan 1: Ikan (Untuk Rawa)
        const ikan = this.add.text(400, 100, '🐟', { fontSize: '60px' }).setInteractive({ useHandCursor: true });
        this.input.setDraggable(ikan);
        
        // Hewan 2: Orangutan (Untuk Gambut)
        const orangutan = this.add.text(400, 200, '🦧', { fontSize: '60px' }).setInteractive({ useHandCursor: true });
        this.input.setDraggable(orangutan);

        // 3. LOGIKA DRAG & DROP
        this.input.on('drag', function (pointer, gameObject, dragX, dragY) {
            gameObject.x = dragX;
            gameObject.y = dragY;
        });

        // 4. LOGIKA SAAT LEPAS DRAG (DROP)
        this.input.on('dragend', function (pointer, gameObject) {
            let x = gameObject.x;
            let y = gameObject.y;

            // Cek Hewan 1 (Ikan) ke Rawa (Kiri)
            if (gameObject.text === '🐟' && x > 75 && x < 325 && y > 275 && y < 425) {
                gameObject.x = 200; // Snap ke tengah kotak
                gameObject.y = 350;
                gameObject.disableInteractive(); // Kunci posisi
                selesaikanGame();
            } 
            // Cek Hewan 2 (Orangutan) ke Gambut (Kanan)
            else if (gameObject.text === '🦧' && x > 475 && x < 725 && y > 275 && y < 425) {
                gameObject.x = 600; // Snap ke tengah kotak
                gameObject.y = 350;
                gameObject.disableInteractive();
                selesaikanGame();
            } 
            // Jika salah tempat
            else {
                // Balikin ke posisi semula
                if (gameObject.text === '🐟') { gameObject.x = 400; gameObject.y = 100; }
                if (gameObject.text === '🦧') { gameObject.x = 400; gameObject.y = 200; }
            }
        });

        // Fungsi untuk menyelesaikan game
        function selesaikanGame() {
            // Cek jika semua hewan sudah di tempatnya (opsional)
            // Untuk demo ini, kita anggap 1 hewan masuk ke kotak yang benar = selesai
            const teksSukses = this.add.text(400, 50, '🎉 HEBAT! MISI SELESAI 🎉', { 
                fontSize: '32px', 
                fill: '#F4C430', 
                fontStyle: 'bold',
                backgroundColor: '#2D5A3F',
                padding: { x: 20, y: 10 }
            }).setOrigin(0.5);

            // Tunggu 2 detik, lalu kirim form ke Laravel
            setTimeout(() => {
                document.getElementById('form-selesai').submit();
            }, 2000);
        }
    }
</script>
@endsection