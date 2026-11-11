<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Question;
use App\Models\QuestionOption;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $quizData = [

            // LEVEL 1 - KONSEP & TIPOLOGI LAHAN BASAH
            'KL' => [
                [
                    'pertanyaan' => 'Apa yang dimaksud dengan lahan basah?',
                    'jawaban' => [
                        'A' => 'Wilayah daratan yang selalu kering sepanjang tahun.',
                        'B' => 'Ekosistem yang keberadaannya dipengaruhi oleh air, baik tergenang permanen maupun musiman.',
                        'C' => 'Wilayah yang hanya terdiri atas perairan laut dalam.',
                        'D' => 'Kawasan yang seluruh permukaannya tertutup bangunan.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Salah satu karakteristik utama ekosistem lahan basah adalah...',
                    'jawaban' => [
                        'A' => 'Tidak memiliki hubungan dengan kondisi air.',
                        'B' => 'Selalu memiliki tanah yang kering dan keras.',
                        'C' => 'Tanahnya dapat jenuh air atau mengalami genangan secara permanen maupun musiman.',
                        'D' => 'Hanya dapat ditemukan di wilayah pegunungan.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Apa perbedaan utama rawa lebak dan rawa pasang surut?',
                    'jawaban' => [
                        'A' => 'Rawa lebak terutama dipengaruhi curah hujan dan luapan sungai.',
                        'B' => 'Rawa lebak selalu dipengaruhi langsung oleh pasang surut air laut.',
                        'C' => 'Rawa lebak hanya ditemukan di kawasan pesisir.',
                        'D' => 'Rawa lebak tidak pernah mengalami genangan air.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Bagaimana lahan basah dapat membantu mengurangi risiko banjir?',
                    'jawaban' => [
                        'A' => 'Mempercepat seluruh air hujan mengalir ke laut.',
                        'B' => 'Menghilangkan seluruh air dari lingkungan.',
                        'C' => 'Menghambat semua aliran sungai secara permanen.',
                        'D' => 'Menampung dan menyimpan kelebihan air ketika hujan atau terjadi luapan sungai.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Mengapa pengeringan lahan gambut secara berlebihan perlu dicegah?',
                    'jawaban' => [
                        'A' => 'Agar seluruh tumbuhan gambut dapat diganti dengan tanaman perkebunan.',
                        'B' => 'Karena pengeringan dapat meningkatkan kerentanan gambut terhadap kebakaran dan mengganggu fungsi hidrologisnya.',
                        'C' => 'Karena gambut tidak dapat menyimpan air.',
                        'D' => 'Agar tanah gambut berubah menjadi tanah berbatu.',
                    ],
                    'benar' => 'B',
                ],
            ],

            // LEVEL 2 - EKOSISTEM RAWA PASANG SURUT
            'PS' => [
                [
                    'pertanyaan' => 'Apa faktor utama yang memengaruhi perubahan tinggi muka air pada rawa pasang surut?',
                    'jawaban' => [
                        'A' => 'Aktivitas gunung berapi.',
                        'B' => 'Perubahan suhu udara saja.',
                        'C' => 'Pasang dan surut air laut.',
                        'D' => 'Pergerakan angin darat saja.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Apa yang terjadi pada kawasan rawa pasang surut ketika air laut mengalami pasang?',
                    'jawaban' => [
                        'A' => 'Muka air dapat meningkat dan air bergerak memasuki kawasan rawa melalui saluran yang terhubung.',
                        'B' => 'Seluruh air rawa langsung menghilang.',
                        'C' => 'Tanah rawa berubah menjadi tanah kering.',
                        'D' => 'Vegetasi rawa berhenti tumbuh secara permanen.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Mengapa kondisi air pada rawa pasang surut dapat berbeda antara satu kawasan dan kawasan lainnya?',
                    'jawaban' => [
                        'A' => 'Karena semua rawa memiliki jenis tanah yang sama.',
                        'B' => 'Karena rawa tidak dipengaruhi lingkungan sekitarnya.',
                        'C' => 'Karena air rawa selalu memiliki kadar garam yang sama.',
                        'D' => 'Karena pengaruh pasang surut, hubungan dengan laut, dan kondisi air setempat dapat berbeda.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Salah satu jenis vegetasi yang dapat ditemukan pada kawasan rawa pasang surut tertentu adalah...',
                    'jawaban' => [
                        'A' => 'Kaktus gurun.',
                        'B' => 'Nipah.',
                        'C' => 'Edelweis.',
                        'D' => 'Pinus pegunungan.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Jika saluran air yang menghubungkan rawa dengan sungai atau kawasan pasang surut terganggu, apa dampak yang mungkin terjadi?',
                    'jawaban' => [
                        'A' => 'Seluruh ekosistem otomatis menjadi lebih subur.',
                        'B' => 'Tidak ada perubahan pada kondisi air.',
                        'C' => 'Sirkulasi air dan kondisi hidrologis rawa dapat terganggu.',
                        'D' => 'Rawa berubah menjadi laut dalam.',
                    ],
                    'benar' => 'C',
                ],
            ],

            // LEVEL 3 - RAWA LEBAK
            'RL' => [
                [
                    'pertanyaan' => 'Apa yang terutama memengaruhi terjadinya genangan pada rawa lebak?',
                    'jawaban' => [
                        'A' => 'Gelombang laut dalam.',
                        'B' => 'Aktivitas pasang surut laut secara langsung.',
                        'C' => 'Salju yang mencair.',
                        'D' => 'Curah hujan dan luapan sungai.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Kapan genangan pada rawa lebak umumnya meningkat?',
                    'jawaban' => [
                        'A' => 'Ketika musim hujan dan terjadi peningkatan debit sungai.',
                        'B' => 'Ketika tidak terjadi hujan sepanjang tahun.',
                        'C' => 'Ketika seluruh aliran sungai mengering.',
                        'D' => 'Ketika suhu udara selalu rendah.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Apa yang membedakan lebak dangkal dengan lebak dalam?',
                    'jawaban' => [
                        'A' => 'Jenis hewan yang hidup di dalamnya saja.',
                        'B' => 'Kedalaman dan kondisi genangan air.',
                        'C' => 'Warna langit di atas kawasan rawa.',
                        'D' => 'Jarak kawasan terhadap pegunungan saja.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Mengapa masyarakat perlu memperhatikan pola musim ketika memanfaatkan rawa lebak?',
                    'jawaban' => [
                        'A' => 'Agar genangan air selalu dihilangkan.',
                        'B' => 'Agar sungai tidak mengalami aliran air.',
                        'C' => 'Karena tinggi dan lama genangan dapat memengaruhi kegiatan pertanian serta aktivitas masyarakat.',
                        'D' => 'Karena musim tidak memiliki pengaruh terhadap rawa lebak.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Jika curah hujan meningkat dan sungai meluap, apa yang kemungkinan terjadi pada rawa lebak?',
                    'jawaban' => [
                        'A' => 'Seluruh kawasan berubah menjadi daratan kering.',
                        'B' => 'Kadar air langsung menjadi nol.',
                        'C' => 'Genangan air pasti menghilang.',
                        'D' => 'Luas dan kedalaman genangan dapat meningkat.',
                    ],
                    'benar' => 'D',
                ],
            ],

            // LEVEL 4 - RAWA GAMBUT
            'RG' => [
                [
                    'pertanyaan' => 'Bagaimana tanah gambut terbentuk?',
                    'jawaban' => [
                        'A' => 'Dari tumpukan batuan yang mengalami pembekuan.',
                        'B' => 'Dari akumulasi sisa tumbuhan yang mengalami penguraian tidak sempurna dalam kondisi basah.',
                        'C' => 'Dari pasir pantai yang mengering.',
                        'D' => 'Dari endapan logam di dalam tanah.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Mengapa rawa gambut memiliki kemampuan menyimpan karbon?',
                    'jawaban' => [
                        'A' => 'Karena seluruh karbon berubah menjadi batu.',
                        'B' => 'Karena gambut tidak mengandung bahan organik.',
                        'C' => 'Karena akumulasi bahan organik menyimpan karbon dalam jumlah besar.',
                        'D' => 'Karena gambut selalu berada di wilayah laut.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Apa dampak pengeringan lahan gambut secara berlebihan?',
                    'jawaban' => [
                        'A' => 'Meningkatkan risiko kebakaran dan mengganggu keseimbangan air.',
                        'B' => 'Meningkatkan kemampuan gambut menyimpan air tanpa batas.',
                        'C' => 'Menghilangkan seluruh risiko kebakaran.',
                        'D' => 'Membuat gambut tidak mengalami perubahan.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Mengapa kebakaran pada lahan gambut sulit dipadamkan?',
                    'jawaban' => [
                        'A' => 'Karena gambut tidak dapat terbakar.',
                        'B' => 'Karena api hanya berada di permukaan air.',
                        'C' => 'Karena gambut seluruhnya tersusun dari batu.',
                        'D' => 'Karena api dapat membakar lapisan bahan organik di bawah permukaan tanah.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Salah satu tindakan yang tepat untuk menjaga ekosistem rawa gambut adalah...',
                    'jawaban' => [
                        'A' => 'Membuat saluran drainase sebanyak mungkin.',
                        'B' => 'Menjaga kelembapan gambut dan mencegah pengeringan berlebihan.',
                        'C' => 'Membakar vegetasi untuk membuka lahan.',
                        'D' => 'Menghilangkan seluruh tumbuhan asli.',
                    ],
                    'benar' => 'B',
                ],
            ],

            // LEVEL 5 - LAHAN MANGROVE
            'MG' => [
                [
                    'pertanyaan' => 'Di wilayah seperti apa ekosistem mangrove umumnya tumbuh?',
                    'jawaban' => [
                        'A' => 'Padang pasir yang sangat kering.',
                        'B' => 'Puncak gunung bersalju.',
                        'C' => 'Wilayah pesisir yang dipengaruhi pasang surut.',
                        'D' => 'Kawasan gurun tanpa sumber air.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Apa fungsi akar tunjang pada beberapa jenis tumbuhan mangrove?',
                    'jawaban' => [
                        'A' => 'Membantu menopang tumbuhan pada substrat berlumpur.',
                        'B' => 'Menghasilkan cahaya matahari.',
                        'C' => 'Mengubah air laut menjadi batu.',
                        'D' => 'Menghentikan seluruh proses pasang surut.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Apa fungsi akar napas pada beberapa jenis mangrove?',
                    'jawaban' => [
                        'A' => 'Menghasilkan air hujan.',
                        'B' => 'Menyerap seluruh garam dari laut.',
                        'C' => 'Mengubah lumpur menjadi pasir.',
                        'D' => 'Membantu pertukaran gas pada lingkungan tanah yang miskin oksigen.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Mengapa kawasan mangrove disebut sebagai tempat asuhan bagi berbagai biota laut?',
                    'jawaban' => [
                        'A' => 'Karena tidak terdapat organisme lain di dalamnya.',
                        'B' => 'Karena menyediakan tempat berlindung dan mencari makan bagi berbagai organisme muda.',
                        'C' => 'Karena seluruh ikan hidup di akar mangrove sepanjang hidupnya.',
                        'D' => 'Karena mangrove tidak memiliki hubungan dengan kehidupan laut.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Apa tindakan yang tepat untuk menjaga kelestarian ekosistem mangrove?',
                    'jawaban' => [
                        'A' => 'Menebang seluruh pohon mangrove.',
                        'B' => 'Mengubah kawasan mangrove menjadi permukiman tanpa perencanaan.',
                        'C' => 'Melindungi kawasan mangrove dan melakukan rehabilitasi pada area yang rusak.',
                        'D' => 'Membuang limbah ke kawasan pesisir.',
                    ],
                    'benar' => 'C',
                ],
            ],
        ];

        foreach ($quizData as $kodeLevel => $questions) {

            $level = Level::where('kode', $kodeLevel)->first();

            if (!$level) {
                $this->command->warn(
                    "Level {$kodeLevel} tidak ditemukan. Dilewati."
                );
                continue;
            }

            foreach ($questions as $index => $data) {

                $question = Question::updateOrCreate(
                    [
                        'level_id' => $level->id,
                        'urutan' => $index + 1,
                    ],
                    [
                        'pertanyaan' => $data['pertanyaan'],
                    ]
                );

                foreach ($data['jawaban'] as $opsi => $teks) {

                    QuestionOption::updateOrCreate(
                        [
                            'question_id' => $question->id,
                            'opsi' => $opsi,
                        ],
                        [
                            'teks_jawaban' => $teks,
                            'is_correct' => ($opsi === $data['benar']),
                        ]
                    );
                }
            }

            $this->command->info(
                "Soal Level {$kodeLevel} berhasil diproses."
            );
        }

        $this->command->info('Seeder kuis Level 1–5 selesai.');
    }
}
