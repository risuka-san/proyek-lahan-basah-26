
@extends('layouts.app')

@section('title', 'Permainan - SIFARA')

@section('content')

@php
    $gameData = [
        1 => [
            'judul' => 'Misi: Kenali Jenis Lahan Basah!',
            'deskripsi' => 'Kelompokkan karakteristik ke jenis ekosistem lahan basah yang tepat.',
            'tema' => '#F1F4E9',
            'warna' => '#2D5A3F',
            'kategori' => [
                ['nama' => 'RAWA PASANG SURUT', 'kode' => 'pasang', 'warna' => 0x4A7C59],
                ['nama' => 'RAWA LEBAK', 'kode' => 'lebak', 'warna' => 0x6B8EAD],
                ['nama' => 'RAWA GAMBUT', 'kode' => 'gambut', 'warna' => 0x8B5A2B],
                ['nama' => 'MANGROVE', 'kode' => 'mangrove', 'warna' => 0x397C68],
            ],
            'kartu' => [
                ['teks' => 'Dipengaruhi pasang surut air laut', 'jawaban' => 'pasang'],
                ['teks' => 'Genangan musiman akibat hujan dan luapan sungai', 'jawaban' => 'lebak'],
                ['teks' => 'Terbentuk dari akumulasi bahan organik', 'jawaban' => 'gambut'],
                ['teks' => 'Vegetasi pesisir yang toleran terhadap salinitas', 'jawaban' => 'mangrove'],
            ],
        ],

        2 => [
            'judul' => 'Misi: Petualangan Rawa Pasang Surut!',
            'deskripsi' => 'Kenali dinamika air dan vegetasi pada ekosistem rawa pasang surut.',
            'tema' => '#F1F4E9',
            'warna' => '#245A43',
            'kategori' => [
                ['nama' => 'PASANG', 'kode' => 'pasang', 'warna' => 0x397D9B],
                ['nama' => 'SURUT', 'kode' => 'surut', 'warna' => 0x658B75],
                ['nama' => 'PASANG SURUT', 'kode' => 'proses', 'warna' => 0x397C68],
                ['nama' => 'VEGETASI NIPAH', 'kode' => 'nipah', 'warna' => 0x8B7650],
            ],
            'kartu' => [
                ['teks' => 'Air laut bergerak masuk menuju daratan', 'jawaban' => 'pasang'],
                ['teks' => 'Permukaan air laut mengalami penurunan', 'jawaban' => 'surut'],
                ['teks' => 'Perubahan tinggi muka air secara berkala', 'jawaban' => 'proses'],
                ['teks' => 'Tumbuhan palma yang dijumpai di kawasan pasang surut tertentu', 'jawaban' => 'nipah'],
            ],
        ],

        3 => [
            'judul' => 'Misi: Jelajahi Rawa Lebak!',
            'deskripsi' => 'Kenali karakteristik genangan dan pembagian wilayah rawa lebak.',
            'tema' => '#F1F4E9',
            'warna' => '#365B79',
            'kategori' => [
                ['nama' => 'LEBAK DANGKAL', 'kode' => 'dangkal', 'warna' => 0x6B9B78],
                ['nama' => 'LEBAK TENGAH', 'kode' => 'tengah', 'warna' => 0x4D819B],
                ['nama' => 'LEBAK DALAM', 'kode' => 'dalam', 'warna' => 0x365B79],
                ['nama' => 'SUMBER GENANGAN', 'kode' => 'sumber', 'warna' => 0x8B7650],
            ],
            'kartu' => [
                ['teks' => 'Wilayah rawa dengan genangan relatif dangkal', 'jawaban' => 'dangkal'],
                ['teks' => 'Wilayah rawa dengan genangan lebih dalam daripada lebak dangkal', 'jawaban' => 'tengah'],
                ['teks' => 'Wilayah rawa dengan genangan paling dalam dan relatif lama', 'jawaban' => 'dalam'],
                ['teks' => 'Genangan terutama berasal dari hujan dan luapan sungai', 'jawaban' => 'sumber'],
            ],
        ],

        4 => [
            'judul' => 'Misi: Penjelajah Rawa Gambut!',
            'deskripsi' => 'Temukan bahan pembentuk, fungsi, dan ancaman pada ekosistem gambut.',
            'tema' => '#F1F4E9',
            'warna' => '#704C32',
            'kategori' => [
                ['nama' => 'BAHAN ORGANIK', 'kode' => 'organik', 'warna' => 0x8B5A2B],
                ['nama' => 'KONDISI TANAH', 'kode' => 'tanah', 'warna' => 0x687C56],
                ['nama' => 'PENYIMPAN KARBON', 'kode' => 'karbon', 'warna' => 0x4C6658],
                ['nama' => 'ANCAMAN KEBAKARAN', 'kode' => 'api', 'warna' => 0xA45C3C],
            ],
            'kartu' => [
                ['teks' => 'Terbentuk dari sisa tumbuhan yang menumpuk dan terurai tidak sempurna', 'jawaban' => 'organik'],
                ['teks' => 'Secara alami memiliki kondisi tanah yang jenuh air', 'jawaban' => 'tanah'],
                ['teks' => 'Menyimpan karbon dalam jumlah besar pada lapisan tanahnya', 'jawaban' => 'karbon'],
                ['teks' => 'Pengeringan lahan meningkatkan kerentanan terhadap kebakaran', 'jawaban' => 'api'],
            ],
        ],

        5 => [
            'judul' => 'Misi: Penjaga Hutan Mangrove!',
            'deskripsi' => 'Kenali adaptasi akar dan fungsi ekosistem mangrove.',
            'tema' => '#F1F4E9',
            'warna' => '#315C48',
            'kategori' => [
                ['nama' => 'ZONA PASANG SURUT', 'kode' => 'zona', 'warna' => 0x4A7C68],
                ['nama' => 'AKAR TUNJANG', 'kode' => 'tunjang', 'warna' => 0x8B7650],
                ['nama' => 'AKAR NAPAS', 'kode' => 'napas', 'warna' => 0x527B68],
                ['nama' => 'TEMPAT ASUHAN', 'kode' => 'asuhan', 'warna' => 0x397D9B],
            ],
            'kartu' => [
                ['teks' => 'Kawasan pesisir yang dipengaruhi perubahan pasang dan surut', 'jawaban' => 'zona'],
                ['teks' => 'Akar yang membantu menopang pohon di tanah berlumpur', 'jawaban' => 'tunjang'],
                ['teks' => 'Akar yang tumbuh ke atas untuk membantu pertukaran gas', 'jawaban' => 'napas'],
                ['teks' => 'Ekosistem yang menjadi tempat berlindung dan tumbuh biota muda', 'jawaban' => 'asuhan'],
            ],
        ],
    ];

    $currentGame = $gameData[(int) $level_id] ?? null;
@endphp

<style>
    .game-page {
        min-height: calc(100vh - 75px);
        padding: 42px 20px 65px;
        background:
            radial-gradient(circle at 8% 10%, rgba(184, 212, 184, .25), transparent 25%),
            radial-gradient(circle at 92% 85%, rgba(201, 183, 139, .16), transparent 25%),
            #F7F7F0;
        font-family: 'Nunito', sans-serif;
    }

    .game-wrapper {
        max-width: 1050px;
        margin: 0 auto;
    }

    .game-back {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        color: #496B55;
        text-decoration: none;
        font-size: 14px;
        font-weight: 800;
        margin-bottom: 25px;
        transition: .2s;
    }

    .game-back:hover {
        color: #243F30;
        transform: translateX(-4px);
    }

    .game-heading {
        text-align: center;
        margin-bottom: 30px;
    }

    .game-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 15px;
        border: 1px solid #DCE7D9;
        border-radius: 30px;
        background: #EDF3E9;
        color: #52765B;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 1.8px;
        margin-bottom: 15px;
    }

    .game-heading h1 {
        color: #284A35;
        font-family: 'Playfair Display', serif;
        font-size: clamp(27px, 4vw, 39px);
        font-weight: 700;
        line-height: 1.25;
        margin: 0 0 12px;
    }

    .game-heading p {
        max-width: 590px;
        margin: 0 auto;
        color: #788477;
        font-size: 14px;
        line-height: 1.8;
    }

    .game-level-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #2D5A3F;
        color: #fff;
        border-radius: 30px;
        padding: 9px 18px;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: 1px;
        margin-top: 20px;
    }

    .game-instruction {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 17px 21px;
        background: #FFFFFF;
        border: 1px solid #E5EBDD;
        border-radius: 15px;
        margin-bottom: 18px;
        box-shadow: 0 5px 18px rgba(43, 76, 52, .04);
    }

    .instruction-icon {
        flex-shrink: 0;
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        background: #EAF2E8;
        border-radius: 12px;
        font-size: 21px;
    }

    .instruction-text strong {
        display: block;
        color: #345641;
        font-size: 13px;
        font-weight: 900;
        margin-bottom: 3px;
    }

    .instruction-text span {
        color: #849084;
        font-size: 12px;
        line-height: 1.6;
    }

    .game-board {
        padding: 15px;
        background: #FFFFFF;
        border: 1px solid #E5EBDD;
        border-radius: 22px;
        box-shadow: 0 12px 35px rgba(43, 76, 52, .07);
        overflow: hidden;
    }

    #game-container {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: 14px;
        background: #F1F4E9;
    }

    #game-container canvas {
        display: block;
        max-width: 100%;
        height: auto !important;
        margin: 0 auto;
        touch-action: none;
    }

    .game-status {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 18px 5px 5px;
    }

    .status-info {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #496B55;
        font-size: 13px;
        font-weight: 800;
    }

    .status-dot {
        width: 9px;
        height: 9px;
        background: #83A989;
        border-radius: 50%;
        box-shadow: 0 0 0 4px #EAF2E8;
    }

    .status-progress {
        color: #829080;
        font-size: 12px;
        font-weight: 800;
    }

    .game-completion {
        display: none;
        text-align: center;
        margin-top: 20px;
        padding: 27px 20px;
        background: #EDF4E9;
        border: 1px solid #D6E5D1;
        border-radius: 18px;
        animation: appear .4s ease;
    }

    .completion-icon {
        font-size: 35px;
        margin-bottom: 8px;
    }

    .game-completion h3 {
        color: #2D5A3F;
        font-family: 'Playfair Display', serif;
        font-size: 23px;
        margin: 0 0 8px;
    }

    .game-completion p {
        color: #778675;
        font-size: 13px;
        margin: 0 0 18px;
        line-height: 1.7;
    }

    .game-next-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 23px;
        border-radius: 30px;
        background: #2D5A3F;
        color: white;
        text-decoration: none;
        font-size: 13px;
        font-weight: 900;
        box-shadow: 0 5px 13px rgba(45, 90, 63, .18);
        transition: .2s;
    }

    .game-next-button:hover {
        background: #203F2C;
        color: white;
        transform: translateY(-2px);
    }

    .game-error {
        max-width: 600px;
        margin: 40px auto;
        padding: 35px;
        text-align: center;
        background: #FFFFFF;
        border: 1px solid #E8DCD4;
        border-radius: 20px;
    }

    .game-error h3 {
        color: #8A5143;
        font-family: 'Playfair Display', serif;
    }

    .game-error p {
        color: #897D76;
        font-size: 14px;
    }

    .game-error a {
        display: inline-block;
        margin-top: 12px;
        color: #2D5A3F;
        font-weight: 800;
        text-decoration: none;
    }

    @keyframes appear {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
        .game-page {
            padding: 25px 12px 45px;
        }

        .game-board {
            padding: 7px;
            border-radius: 15px;
        }

        .game-instruction {
            padding: 13px;
        }

        .game-status {
            padding: 15px 5px 5px;
        }
    }
</style>

<div class="game-page">
    <div class="game-wrapper">

        <a href="{{ route('peta.game') }}" class="game-back">
            <span>←</span> Kembali ke Peta Petualangan
        </a>

        @if($currentGame)

            <header class="game-heading">
                <div class="game-eyebrow">
                    <span>✦</span> SIFARA LEARNING ADVENTURE
                </div>

                <h1>{{ $currentGame['judul'] }}</h1>

                <p>{{ $currentGame['deskripsi'] }}</p>

                <div class="game-level-pill">
                    <span>🌿</span>
                    LEVEL {{ $level_id }}
                </div>
            </header>

            <div class="game-instruction">
                <div class="instruction-icon">🧩</div>
                <div class="instruction-text">
                    <strong>Petunjuk Permainan</strong>
                    <span>Tarik setiap kartu menuju kategori yang paling sesuai. Cocokkan seluruh kartu untuk membuka tantangan kuis berikutnya.</span>
                </div>
            </div>

            <div class="game-board">
                <div id="game-container"></div>

                <div class="game-status">
                    <div class="status-info">
                        <span class="status-dot"></span>
                        <span id="status-game">Jawaban benar: 0/4</span>
                    </div>

                    <span class="status-progress" id="status-progress">
                        Terus semangat menjelajah!
                    </span>
                </div>
            </div>

            <div class="game-completion" id="game-completion">
                <div class="completion-icon">🌱🎉</div>
                <h3>Petualangan Berhasil!</h3>
                <p>Hebat! Kamu berhasil mencocokkan seluruh kategori dengan benar. Sekarang, saatnya menguji pemahamanmu melalui kuis.</p>

                <a href="{{ route('kuis.show', $level_id) }}" class="game-next-button">
                    Lanjut ke Kuis <span>→</span>
                </a>
            </div>

        @else

            <div class="game-error">
                <div style="font-size: 40px; margin-bottom: 12px;">🌿</div>
                <h3>Permainan Belum Tersedia</h3>
                <p>Maaf, permainan untuk level ini belum tersedia. Silakan kembali ke peta petualangan.</p>
                <a href="{{ route('peta.game') }}">← Kembali ke Peta Petualangan</a>
            </div>

        @endif

    </div>
</div>

@if($currentGame)

<script src="https://cdn.jsdelivr.net/npm/phaser@3.55.2/dist/phaser.min.js"></script>

<script>
const gameData = @json($currentGame);

const config = {
    type: Phaser.AUTO,
    width: 800,
    height: 680,
    parent: 'game-container',
    backgroundColor: gameData.tema,
    scale: {
        mode: Phaser.Scale.FIT,
        autoCenter: Phaser.Scale.CENTER_BOTH
    },
    scene: {
        create: createGame
    }
};

const game = new Phaser.Game(config);

function createGame() {
    const scene = this;

    let jumlahBenar = 0;
    let gameSelesai = false;

    // Judul area permainan
    scene.add.text(400, 25, 'PILIH KATEGORI YANG TEPAT', {
        fontSize: '22px',
        color: gameData.warna,
        fontStyle: 'bold',
        fontFamily: 'Arial'
    }).setOrigin(0.5);

    scene.add.text(400, 60, 'Tarik kartu ke kotak kategori yang sesuai!', {
        fontSize: '16px',
        color: gameData.warna,
        fontFamily: 'Arial'
    }).setOrigin(0.5);

    // Membuat zona kategori
    const zona = [];

    gameData.kategori.forEach((item, index) => {

        const x = index % 2 === 0 ? 200 : 600;
        const y = index < 2 ? 165 : 345;

        // Latar zona kategori
        const kotak = scene.add.rectangle(
            x,
            y,
            330,
            125,
            item.warna,
            0.95
        ).setStrokeStyle(4, 0xFFFFFF);

        // Label kategori
        scene.add.text(x, y, item.nama, {
            fontSize: '19px',
            color: '#FFFFFF',
            fontStyle: 'bold',
            align: 'center',
            wordWrap: { width: 290 },
            fontFamily: 'Arial'
        }).setOrigin(0.5);

        zona.push({
            kode: item.kode,
            bounds: kotak.getBounds()
        });
    });

    // Mengacak kartu
    const kartuData = Phaser.Utils.Array.Shuffle(
        [...gameData.kartu]
    );

    const kartu = [];

    kartuData.forEach((item, index) => {

        const x = index % 2 === 0 ? 200 : 600;
        const y = 515 + Math.floor(index / 2) * 95;

        const container = scene.add.container(x, y);

        // Tampilan kartu
        const bg = scene.add.rectangle(
            0,
            0,
            330,
            75,
            0xFFFFFF
        ).setStrokeStyle(3, 0xC5D2C0);

        const teks = scene.add.text(
            0,
            0,
            item.teks,
            {
                fontSize: '15px',
                color: '#345641',
                align: 'center',
                wordWrap: { width: 295 },
                fontStyle: 'bold',
                fontFamily: 'Arial'
            }
        ).setOrigin(0.5);

        container.add([bg, teks]);

        container.setSize(330, 75);
        container.setInteractive({ useHandCursor: true });

        container.setData('jawaban', item.jawaban);
        container.setData('posisiAwal', { x, y });

        scene.input.setDraggable(container);

        kartu.push(container);
    });

    // Proses drag
    scene.input.on('drag', function(pointer, object, dragX, dragY) {

        if (!gameSelesai && object.input) {
            object.x = dragX;
            object.y = dragY;
        }

    });

    // Proses drop
    scene.input.on('dragend', function(pointer, object) {

        if (gameSelesai || !object.input) return;

        const target = zona.find(item =>
            item.bounds.contains(object.x, object.y)
        );

        if (target && target.kode === object.getData('jawaban')) {

            // Jawaban benar
            object.disableInteractive();

            object.setPosition(
                target.bounds.centerX,
                target.bounds.centerY
            );

            jumlahBenar++;

            document.getElementById('status-game').innerText =
                `Jawaban benar: ${jumlahBenar}/4`;

            document.getElementById('status-progress').innerText =
                jumlahBenar === 4
                    ? 'Semua kategori berhasil dicocokkan!'
                    : `${4 - jumlahBenar} kartu lagi untuk diselesaikan`;

            // Semua kartu berhasil
            if (jumlahBenar === 4) {
                selesaikanGame();
            }

        } else {

            // Jawaban salah, kartu kembali
            const awal = object.getData('posisiAwal');

            object.setPosition(awal.x, awal.y);
        }

    });

    // Game selesai
    function selesaikanGame() {

        gameSelesai = true;

        scene.add.rectangle(
            400,
            65,
            620,
            70,
            0x2D5A3F,
            0.95
        );

        scene.add.text(
            400,
            65,
            '🎉 SEMUA TANTANGAN BERHASIL!',
            {
                fontSize: '25px',
                color: '#F4D77A',
                fontStyle: 'bold',
                fontFamily: 'Arial'
            }
        ).setOrigin(0.5);

        document.getElementById('status-game').innerText =
            'Hebat! Kamu berhasil menyelesaikan seluruh tantangan.';

        document.getElementById('status-progress').innerText =
            'Misi permainan selesai!';

        document.getElementById('game-completion').style.display =
            'block';

        document.getElementById('game-completion').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }
}
</script>

@endif

@endsection