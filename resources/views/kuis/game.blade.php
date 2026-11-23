@extends('layouts.app')

@section('title', 'Permainan Geografi - SIFARA')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Data permainan Geografi
    |--------------------------------------------------------------------------
    | Setiap level memiliki empat kategori dan empat kartu yang dicocokkan.
    | ID level mengikuti data levels yang sudah ada di database.
    */
    $gameData = [
        1 => [
            'judul' => 'Misi: Jelajahi Biosfer!',
            'deskripsi' => 'Cocokkan konsep kehidupan dan komponen penyusun biosfer dengan kategori yang tepat.',
            'tema' => '#F1F4E9',
            'warna' => '#2D5A3F',
            'kategori' => [
                ['nama' => 'INDIVIDU', 'kode' => 'individu', 'warna' => 0x527D61, 'ikon' => 'person'],
                ['nama' => 'POPULASI', 'kode' => 'populasi', 'warna' => 0x6B8EAD, 'ikon' => 'group'],
                ['nama' => 'KOMUNITAS', 'kode' => 'komunitas', 'warna' => 0xA68A5B, 'ikon' => 'community'],
                ['nama' => 'EKOSISTEM', 'kode' => 'ekosistem', 'warna' => 0x397C68, 'ikon' => 'ecosystem'],
            ],
            'kartu' => [
                ['teks' => 'Seekor harimau yang hidup di hutan', 'jawaban' => 'individu'],
                ['teks' => 'Sekumpulan rusa dari spesies yang sama', 'jawaban' => 'populasi'],
                ['teks' => 'Berbagai populasi makhluk hidup yang tinggal bersama', 'jawaban' => 'komunitas'],
                ['teks' => 'Hubungan makhluk hidup dengan air, tanah, dan udara', 'jawaban' => 'ekosistem'],
            ],
        ],

        2 => [
            'judul' => 'Misi: Kenali Bioma Dunia!',
            'deskripsi' => 'Kelompokkan karakteristik lingkungan berdasarkan jenis bioma yang sesuai.',
            'tema' => '#F1F4E9',
            'warna' => '#245A43',
            'kategori' => [
                ['nama' => 'HUTAN HUJAN TROPIS', 'kode' => 'hutan', 'warna' => 0x397C68, 'ikon' => 'forest'],
                ['nama' => 'GURUN', 'kode' => 'gurun', 'warna' => 0xB58A55, 'ikon' => 'desert'],
                ['nama' => 'TAIGA', 'kode' => 'taiga', 'warna' => 0x527D78, 'ikon' => 'pine'],
                ['nama' => 'TUNDRA', 'kode' => 'tundra', 'warna' => 0x7897A8, 'ikon' => 'snow'],
            ],
            'kartu' => [
                ['teks' => 'Curah hujan tinggi dengan vegetasi lebat dan berlapis', 'jawaban' => 'hutan'],
                ['teks' => 'Curah hujan sangat rendah dan tumbuhan beradaptasi menyimpan air', 'jawaban' => 'gurun'],
                ['teks' => 'Didominasi pohon konifer berdaun jarum', 'jawaban' => 'taiga'],
                ['teks' => 'Wilayah dingin dengan vegetasi rendah seperti lumut', 'jawaban' => 'tundra'],
            ],
        ],

        3 => [
            'judul' => 'Misi: Jelajahi Fauna Indonesia!',
            'deskripsi' => 'Temukan kawasan persebaran fauna Indonesia berdasarkan ciri dan contohnya.',
            'tema' => '#F1F4E9',
            'warna' => '#365B79',
            'kategori' => [
                ['nama' => 'ASIATIS', 'kode' => 'asiatis', 'warna' => 0x527D61, 'ikon' => 'elephant'],
                ['nama' => 'PERALIHAN', 'kode' => 'peralihan', 'warna' => 0xA68A5B, 'ikon' => 'komodo'],
                ['nama' => 'AUSTRALIS', 'kode' => 'australis', 'warna' => 0x6B8EAD, 'ikon' => 'bird'],
                ['nama' => 'KONSERVASI', 'kode' => 'konservasi', 'warna' => 0x397C68, 'ikon' => 'leaf'],
            ],
            'kartu' => [
                ['teks' => 'Kawasan Indonesia bagian barat dengan fauna seperti gajah dan harimau', 'jawaban' => 'asiatis'],
                ['teks' => 'Kawasan yang memiliki fauna khas seperti anoa dan babirusa', 'jawaban' => 'peralihan'],
                ['teks' => 'Kawasan Papua dengan fauna seperti kasuari dan kanguru pohon', 'jawaban' => 'australis'],
                ['teks' => 'Perlindungan habitat dan satwa agar tetap lestari', 'jawaban' => 'konservasi'],
            ],
        ],

        4 => [
            'judul' => 'Misi: Kenali Sumber Daya Alam!',
            'deskripsi' => 'Cocokkan contoh potensi sumber daya alam dengan jenis pemanfaatannya.',
            'tema' => '#F1F4E9',
            'warna' => '#704C32',
            'kategori' => [
                ['nama' => 'KEHUTANAN', 'kode' => 'hutan', 'warna' => 0x527D61, 'ikon' => 'forest'],
                ['nama' => 'PERTAMBANGAN', 'kode' => 'tambang', 'warna' => 0x8B7650, 'ikon' => 'mining'],
                ['nama' => 'KELAUTAN', 'kode' => 'laut', 'warna' => 0x4F8295, 'ikon' => 'ocean'],
                ['nama' => 'PERTANIAN', 'kode' => 'pertanian', 'warna' => 0x78945D, 'ikon' => 'crop'],
            ],
            'kartu' => [
                ['teks' => 'Pemanfaatan hasil hutan kayu dan nonkayu secara terencana', 'jawaban' => 'hutan'],
                ['teks' => 'Pengolahan potensi nikel, timah, emas, dan batu bara', 'jawaban' => 'tambang'],
                ['teks' => 'Pemanfaatan perikanan dan hasil ekosistem pesisir', 'jawaban' => 'laut'],
                ['teks' => 'Budidaya tanaman pangan dan komoditas perkebunan', 'jawaban' => 'pertanian'],
            ],
        ],

        5 => [
            'judul' => 'Misi: Jaga Lingkungan Berkelanjutan!',
            'deskripsi' => 'Kenali prinsip pengelolaan lingkungan dan tindakan pembangunan berkelanjutan.',
            'tema' => '#F1F4E9',
            'warna' => '#315C48',
            'kategori' => [
                ['nama' => 'KONSERVASI', 'kode' => 'konservasi', 'warna' => 0x527D61, 'ikon' => 'leaf'],
                ['nama' => 'AMDAL', 'kode' => 'amdal', 'warna' => 0x6B8EAD, 'ikon' => 'document'],
                ['nama' => 'BIOTIK', 'kode' => 'biotik', 'warna' => 0x78945D, 'ikon' => 'plant'],
                ['nama' => 'ABIOTIK', 'kode' => 'abiotik', 'warna' => 0x8B7650, 'ikon' => 'mountain'],
            ],
            'kartu' => [
                ['teks' => 'Perlindungan dan pemulihan kawasan alam yang mengalami kerusakan', 'jawaban' => 'konservasi'],
                ['teks' => 'Kajian untuk menilai dampak penting suatu rencana usaha atau kegiatan', 'jawaban' => 'amdal'],
                ['teks' => 'Komponen lingkungan berupa tumbuhan, hewan, dan manusia', 'jawaban' => 'biotik'],
                ['teks' => 'Komponen lingkungan berupa air, tanah, udara, dan cahaya matahari', 'jawaban' => 'abiotik'],
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

    .instruction-illustration {
        flex-shrink: 0;
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        background: #EAF2E8;
        border-radius: 14px;
    }

    .instruction-illustration svg {
        width: 34px;
        height: 34px;
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

    .completion-illustration {
        width: 76px;
        height: 76px;
        margin: 0 auto 12px;
    }

    .completion-illustration svg {
        width: 100%;
        height: 100%;
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

    .error-illustration {
        width: 76px;
        height: 76px;
        margin: 0 auto 12px;
    }

    .error-illustration svg {
        width: 100%;
        height: 100%;
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
            <span aria-hidden="true">←</span> Kembali ke Peta Petualangan
        </a>

        @if($currentGame)

            <header class="game-heading">
                <div class="game-eyebrow">
                    SIFARA · PETUALANGAN GEOGRAFI
                </div>

                <h1>{{ $currentGame['judul'] }}</h1>

                <p>{{ $currentGame['deskripsi'] }}</p>

                <div class="game-level-pill">
                    LEVEL {{ $level_id }}
                </div>
            </header>

            <div class="game-instruction">
                <div class="instruction-illustration" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="5" y="8" width="17" height="17" rx="4" fill="#A8C99A"/>
                        <rect x="26" y="8" width="17" height="17" rx="4" fill="#D7B879"/>
                        <rect x="5" y="29" width="17" height="11" rx="4" fill="#7EA68A"/>
                        <rect x="26" y="29" width="17" height="11" rx="4" fill="#8EABC1"/>
                        <path d="M19 16.5H29M24 12L29 16.5L24 21" stroke="#315C42" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
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
                <div class="completion-illustration" aria-hidden="true">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="46" fill="#DCEBD5"/>
                        <path d="M50 76V46" stroke="#477A55" stroke-width="5" stroke-linecap="round"/>
                        <path d="M50 57C29 57 25 43 27 32C43 31 53 39 50 57Z" fill="#77A878"/>
                        <path d="M51 48C51 30 63 22 77 24C78 39 68 49 51 48Z" fill="#A7C98E"/>
                        <path d="M50 76C42 68 35 67 28 69" stroke="#477A55" stroke-width="4" stroke-linecap="round"/>
                        <path d="M50 76C59 66 67 65 74 67" stroke="#477A55" stroke-width="4" stroke-linecap="round"/>
                        <path d="M20 19L24 13M78 17L82 11M83 77L89 81" stroke="#D1A85E" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>Petualangan Berhasil!</h3>
                <p>Hebat! Kamu berhasil mencocokkan seluruh kategori dengan benar. Sekarang, saatnya menguji pemahamanmu melalui kuis.</p>

                <a href="{{ route('kuis.show', $level_id) }}" class="game-next-button">
                    Lanjut ke Kuis <span aria-hidden="true">→</span>
                </a>
            </div>

        @else

            <div class="game-error">
                <div class="error-illustration" aria-hidden="true">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="45" fill="#EDF3E9"/>
                        <path d="M25 69L43 36L57 57L67 43L80 69H25Z" fill="#91B49A"/>
                        <path d="M43 36L49 47L55 43L57 57" fill="#DCE9D6"/>
                        <circle cx="70" cy="29" r="8" fill="#D8B875"/>
                        <path d="M19 76H82" stroke="#52765B" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
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

    // Judul area permainan.
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

    // Ilustrasi vektor sederhana untuk setiap kategori.
    function gambarIlustrasi(x, y, jenis) {
        const g = scene.add.graphics();
        g.setDepth(2);

        const hijau = 0xD9E9D2;
        const hijauTua = 0x477A55;
        const krem = 0xE8D6AD;
        const biru = 0xBBD4DF;

        if (jenis === 'person') {
            g.fillStyle(krem, 1);
            g.fillCircle(x, y - 8, 9);
            g.fillStyle(hijauTua, 1);
            g.fillRoundedRect(x - 13, y + 2, 26, 17, 8);
        } else if (jenis === 'group' || jenis === 'community') {
            [-13, 0, 13].forEach((offset, index) => {
                g.fillStyle(index === 1 ? krem : hijau, 1);
                g.fillCircle(x + offset, y - 7 + (index === 1 ? -3 : 0), 6);
                g.fillStyle(index === 1 ? hijauTua : 0x6B8EAD, 1);
                g.fillRoundedRect(x + offset - 7, y + 1, 14, 12, 5);
            });
        } else if (jenis === 'ecosystem') {
            g.fillStyle(biru, 1);
            g.fillEllipse(x, y + 4, 38, 13);
            g.fillStyle(hijauTua, 1);
            g.fillRoundedRect(x - 3, y - 13, 6, 21, 3);
            g.fillStyle(0x83A989, 1);
            g.fillEllipse(x - 8, y - 10, 17, 10);
            g.fillEllipse(x + 8, y - 15, 17, 10);
        } else if (jenis === 'forest' || jenis === 'pine') {
            g.fillStyle(hijauTua, 1);
            g.fillTriangle(x, y - 21, x - 15, y + 5, x + 15, y + 5);
            g.fillTriangle(x, y - 10, x - 18, y + 13, x + 18, y + 13);
            g.fillStyle(0x8B7650, 1);
            g.fillRect(x - 3, y + 10, 6, 9);
        } else if (jenis === 'desert') {
            g.fillStyle(0xD8B875, 1);
            g.fillEllipse(x, y + 8, 42, 15);
            g.fillStyle(0xE8D6AD, 1);
            g.fillCircle(x + 9, y - 8, 9);
            g.fillStyle(0x78945D, 1);
            g.fillRect(x - 3, y - 2, 6, 17);
            g.fillRect(x - 10, y + 2, 7, 4);
            g.fillRect(x + 3, y + 4, 7, 4);
        } else if (jenis === 'snow' || jenis === 'mountain') {
            g.fillStyle(0x7897A8, 1);
            g.fillTriangle(x - 22, y + 15, x - 3, y - 17, x + 15, y + 15);
            g.fillStyle(0xEAF2F4, 1);
            g.fillTriangle(x - 10, y + 3, x - 3, y - 17, x + 5, y + 1);
            g.fillStyle(0xA8C4CF, 1);
            g.fillTriangle(x - 2, y + 15, x + 14, y - 10, x + 28, y + 15);
        } else if (jenis === 'elephant' || jenis === 'komodo' || jenis === 'bird') {
            g.fillStyle(jenis === 'elephant' ? 0x8EABC1 : (jenis === 'komodo' ? 0xA7B77A : 0xD8B875), 1);
            g.fillEllipse(x, y, 29, 17);
            g.fillCircle(x + 12, y - 7, 7);
            g.fillRoundedRect(x + 13, y - 2, 5, 13, 2);
            g.fillRect(x - 9, y + 5, 5, 10);
            g.fillRect(x + 4, y + 5, 5, 10);
            if (jenis === 'bird') {
                g.fillTriangle(x - 3, y - 2, x - 16, y - 13, x + 3, y - 10);
            }
        } else if (jenis === 'leaf' || jenis === 'plant' || jenis === 'crop') {
            g.lineStyle(3, hijauTua, 1);
            g.lineBetween(x, y + 17, x, y - 8);
            g.fillStyle(0x83A989, 1);
            g.fillEllipse(x - 9, y - 7, 18, 10);
            g.fillEllipse(x + 9, y - 15, 18, 10);
            g.fillEllipse(x + 10, y + 2, 15, 9);
            if (jenis === 'crop') {
                g.lineBetween(x - 12, y + 17, x + 12, y + 17);
                g.lineBetween(x - 8, y + 20, x + 8, y + 20);
            }
        } else if (jenis === 'mining') {
            g.fillStyle(0xA68A5B, 1);
            g.fillTriangle(x - 20, y + 15, x - 5, y - 13, x + 9, y + 15);
            g.fillStyle(0xC6A66A, 1);
            g.fillTriangle(x - 3, y + 15, x + 13, y - 19, x + 25, y + 15);
            g.fillStyle(0xE8D6AD, 1);
            g.fillCircle(x + 7, y - 3, 5);
        } else if (jenis === 'ocean') {
            g.lineStyle(4, 0x4F8295, 1);
            g.beginPath();
            g.moveTo(x - 22, y - 7);
            g.lineTo(x - 10, y - 13);
            g.lineTo(x + 2, y - 7);
            g.lineTo(x + 14, y - 13);
            g.lineTo(x + 24, y - 7);
            g.strokePath();
            g.lineStyle(4, 0x78AFC0, 1);
            g.beginPath();
            g.moveTo(x - 22, y + 8);
            g.lineTo(x - 10, y + 2);
            g.lineTo(x + 2, y + 8);
            g.lineTo(x + 14, y + 2);
            g.lineTo(x + 24, y + 8);
            g.strokePath();
        } else if (jenis === 'document') {
            g.fillStyle(0xFFFFFF, 1);
            g.fillRoundedRect(x - 13, y - 18, 26, 36, 4);
            g.lineStyle(2, 0x6B8EAD, 1);
            g.strokeRoundedRect(x - 13, y - 18, 26, 36, 4);
            g.lineBetween(x - 7, y - 7, x + 7, y - 7);
            g.lineBetween(x - 7, y, x + 7, y);
            g.lineBetween(x - 7, y + 7, x + 3, y + 7);
        }
    }

    // Membuat zona kategori.
    const zona = [];

    gameData.kategori.forEach((item, index) => {
        const x = index % 2 === 0 ? 200 : 600;
        const y = index < 2 ? 165 : 345;

        const kotak = scene.add.rectangle(
            x,
            y,
            330,
            125,
            item.warna,
            0.96
        ).setStrokeStyle(4, 0xFFFFFF);

        gambarIlustrasi(x, y - 25, item.ikon);

        scene.add.text(x, y + 34, item.nama, {
            fontSize: '17px',
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

    // Mengacak kartu.
    const kartuData = Phaser.Utils.Array.Shuffle([...gameData.kartu]);
    const kartu = [];

    kartuData.forEach((item, index) => {
        const x = index % 2 === 0 ? 200 : 600;
        const y = 515 + Math.floor(index / 2) * 95;

        const container = scene.add.container(x, y);

        const bg = scene.add.rectangle(
            0,
            0,
            330,
            75,
            0xFFFFFF
        ).setStrokeStyle(3, 0xC5D2C0);

        const aksen = scene.add.rectangle(-151, 0, 7, 57, 0x83A989);
        aksen.setOrigin(0.5);

        const teks = scene.add.text(
            5,
            0,
            item.teks,
            {
                fontSize: '14px',
                color: '#345641',
                align: 'center',
                wordWrap: { width: 285 },
                fontStyle: 'bold',
                fontFamily: 'Arial'
            }
        ).setOrigin(0.5);

        container.add([bg, aksen, teks]);
        container.setSize(330, 75);
        container.setInteractive({ useHandCursor: true });

        container.setData('jawaban', item.jawaban);
        container.setData('posisiAwal', { x, y });

        scene.input.setDraggable(container);
        kartu.push(container);
    });

    // Proses drag.
    scene.input.on('drag', function(pointer, object, dragX, dragY) {
        if (!gameSelesai && object.input) {
            object.x = dragX;
            object.y = dragY;
        }
    });

    // Proses drop.
    scene.input.on('dragend', function(pointer, object) {
        if (gameSelesai || !object.input) return;

        const target = zona.find(item =>
            item.bounds.contains(object.x, object.y)
        );

        if (target && target.kode === object.getData('jawaban')) {
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

            if (jumlahBenar === 4) {
                selesaikanGame();
            }
        } else {
            const awal = object.getData('posisiAwal');
            object.setPosition(awal.x, awal.y);
        }
    });

    // Game selesai.
    function selesaikanGame() {
        gameSelesai = true;

        scene.add.rectangle(
            400,
            65,
            620,
            70,
            0x2D5A3F,
            0.96
        );

        scene.add.text(
            400,
            65,
            'SEMUA TANTANGAN BERHASIL!',
            {
                fontSize: '23px',
                color: '#F4D77A',
                fontStyle: 'bold',
                fontFamily: 'Arial'
            }
        ).setOrigin(0.5);

        document.getElementById('status-game').innerText =
            'Hebat! Kamu berhasil menyelesaikan seluruh tantangan.';

        document.getElementById('status-progress').innerText =
            'Misi permainan selesai!';

        document.getElementById('game-completion').style.display = 'block';

        document.getElementById('game-completion').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }
}
</script>

@endif

@endsection