<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $quizData = [

            // LEVEL 1 - BIOSFER DAN KEHIDUPAN DI BUMI
            'BIO' => [
                [
                    'pertanyaan' => 'Apa yang dimaksud dengan biosfer?',
                    'jawaban' => [
                        'A' => 'Seluruh wilayah bumi yang hanya terdiri atas batuan dan mineral.',
                        'B' => 'Bagian bumi yang menjadi tempat berlangsungnya kehidupan makhluk hidup.',
                        'C' => 'Lapisan atmosfer yang tidak dapat ditembus cahaya matahari.',
                        'D' => 'Wilayah perairan laut dalam yang tidak memiliki organisme.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Urutan jenjang kehidupan dari tingkat paling sederhana hingga paling luas adalah ...',
                    'jawaban' => [
                        'A' => 'Individu, populasi, komunitas, ekosistem, bioma, biosfer.',
                        'B' => 'Populasi, individu, ekosistem, komunitas, biosfer, bioma.',
                        'C' => 'Individu, komunitas, populasi, bioma, ekosistem, biosfer.',
                        'D' => 'Bioma, ekosistem, komunitas, populasi, individu, biosfer.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Berikut ini yang termasuk faktor iklim yang memengaruhi persebaran flora dan fauna adalah ...',
                    'jawaban' => [
                        'A' => 'Jenis batuan, kemiringan lereng, dan struktur tanah saja.',
                        'B' => 'Kepadatan penduduk dan kegiatan perdagangan.',
                        'C' => 'Suhu, kelembapan, curah hujan, angin, dan sinar matahari.',
                        'D' => 'Jarak antarnegara dan batas administrasi wilayah.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Kaktus dapat bertahan hidup di lingkungan gurun karena memiliki kemampuan untuk ...',
                    'jawaban' => [
                        'A' => 'Menyerap air laut melalui permukaan daun.',
                        'B' => 'Menghasilkan air dari batuan di sekitarnya.',
                        'C' => 'Menghentikan seluruh proses penguapan.',
                        'D' => 'Menyimpan air pada bagian tubuhnya.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Dalam suatu ekosistem, organisme yang berperan menghasilkan bahan organik melalui fotosintesis disebut ...',
                    'jawaban' => [
                        'A' => 'Produsen.',
                        'B' => 'Konsumen tingkat akhir.',
                        'C' => 'Pengurai.',
                        'D' => 'Detritivor.',
                    ],
                    'benar' => 'A',
                ],
            ],

            // LEVEL 2 - BIOMA DAN PERSEBARAN FLORA FAUNA DUNIA
            'BMD' => [
                [
                    'pertanyaan' => 'Apa yang menjadi ciri utama suatu bioma?',
                    'jawaban' => [
                        'A' => 'Kesamaan batas administrasi negara.',
                        'B' => 'Kesamaan jenis kegiatan ekonomi penduduk.',
                        'C' => 'Karakteristik iklim serta vegetasi dan kehidupan hewan yang khas.',
                        'D' => 'Kesamaan jumlah penduduk di seluruh wilayah.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Bioma yang memiliki curah hujan sangat rendah dan vegetasi yang mampu beradaptasi terhadap kekurangan air adalah ...',
                    'jawaban' => [
                        'A' => 'Hutan gugur.',
                        'B' => 'Gurun.',
                        'C' => 'Taiga.',
                        'D' => 'Hutan hujan tropis.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Bioma taiga umumnya didominasi oleh vegetasi ...',
                    'jawaban' => [
                        'A' => 'Kaktus dan semak berduri.',
                        'B' => 'Rumput pendek tanpa pepohonan.',
                        'C' => 'Pohon berdaun lebar yang selalu hijau.',
                        'D' => 'Hutan konifer seperti pinus dan jenis pohon berdaun jarum.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Wilayah persebaran fauna Neotropik terutama meliputi ...',
                    'jawaban' => [
                        'A' => 'Amerika Tengah dan Amerika Selatan.',
                        'B' => 'Eropa dan sebagian besar Asia.',
                        'C' => 'Afrika bagian selatan Gurun Sahara.',
                        'D' => 'Australia dan Papua.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Bioma hutan hujan tropis umumnya memiliki karakteristik ...',
                    'jawaban' => [
                        'A' => 'Curah hujan sangat rendah dan suhu ekstrem.',
                        'B' => 'Musim dingin panjang dengan tanah membeku.',
                        'C' => 'Curah hujan tinggi, udara lembap, dan vegetasi lebat.',
                        'D' => 'Didominasi padang rumput tanpa pepohonan.',
                    ],
                    'benar' => 'C',
                ],
            ],

            // LEVEL 3 - PERSEBARAN FLORA DAN FAUNA INDONESIA
            'FFI' => [
                [
                    'pertanyaan' => 'Persebaran fauna Indonesia secara umum dibagi menjadi tiga kawasan, yaitu ...',
                    'jawaban' => [
                        'A' => 'Nearktik, Neotropik, dan Paleartik.',
                        'B' => 'Asiatis, Peralihan, dan Australis.',
                        'C' => 'Oriental, Ethiopian, dan Neotropik.',
                        'D' => 'Barat, Utara, dan Selatan.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Garis Wallace dikenal sebagai batas antara kawasan fauna ...',
                    'jawaban' => [
                        'A' => 'Asiatis dan Peralihan.',
                        'B' => 'Peralihan dan Australis.',
                        'C' => 'Australis dan Paleartik.',
                        'D' => 'Neotropik dan Nearktik.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Hewan berikut yang merupakan contoh fauna khas kawasan Peralihan Indonesia adalah ...',
                    'jawaban' => [
                        'A' => 'Gajah dan harimau.',
                        'B' => 'Kanguru dan kasuari.',
                        'C' => 'Anoa dan babirusa.',
                        'D' => 'Beruang kutub dan karibu.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Salah satu karakteristik vegetasi di wilayah Nusa Tenggara adalah ...',
                    'jawaban' => [
                        'A' => 'Hutan tundra yang didominasi lumut.',
                        'B' => 'Hutan konifer yang selalu tertutup salju.',
                        'C' => 'Hutan hujan tropis yang selalu sangat basah di seluruh wilayah.',
                        'D' => 'Vegetasi sabana dan stepa yang menyesuaikan kondisi relatif kering.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Upaya yang tepat untuk menjaga kelestarian flora dan fauna Indonesia adalah ...',
                    'jawaban' => [
                        'A' => 'Melakukan perburuan satwa liar tanpa batas.',
                        'B' => 'Melindungi habitat dan melakukan konservasi flora serta fauna.',
                        'C' => 'Mengubah seluruh kawasan hutan menjadi permukiman.',
                        'D' => 'Memperjualbelikan satwa dilindungi secara bebas.',
                    ],
                    'benar' => 'B',
                ],
            ],

            // LEVEL 4 - SUMBER DAYA ALAM DAN PERSEBARANNYA
            'SDA' => [
                [
                    'pertanyaan' => 'Berdasarkan potensinya, sumber daya alam dapat dikelompokkan menjadi ...',
                    'jawaban' => [
                        'A' => 'Sumber daya alam material, energi, dan ruang.',
                        'B' => 'Sumber daya alam lokal, nasional, dan internasional.',
                        'C' => 'Sumber daya alam darat, kota, dan desa.',
                        'D' => 'Sumber daya alam tetap, sementara, dan buatan.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Salah satu contoh potensi sumber daya pertambangan di Kalimantan Selatan adalah ...',
                    'jawaban' => [
                        'A' => 'Timah di Kepulauan Bangka Belitung.',
                        'B' => 'Nikel di Sulawesi.',
                        'C' => 'Intan di Martapura.',
                        'D' => 'Tembaga di Papua.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Daerah yang dikenal memiliki potensi sumber daya nikel di Indonesia adalah ...',
                    'jawaban' => [
                        'A' => 'Pulau Jawa bagian barat saja.',
                        'B' => 'Sulawesi dan beberapa wilayah Indonesia timur.',
                        'C' => 'Kepulauan Seribu.',
                        'D' => 'Pulau Bali bagian selatan saja.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Pemanfaatan sumber daya kelautan yang sesuai dengan prinsip pengelolaan berkelanjutan adalah ...',
                    'jawaban' => [
                        'A' => 'Menangkap ikan menggunakan bahan peledak.',
                        'B' => 'Mengambil seluruh biota laut tanpa memperhatikan kelestariannya.',
                        'C' => 'Membuang limbah industri ke laut.',
                        'D' => 'Memanfaatkan hasil laut dengan memperhatikan daya dukung ekosistem.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Contoh pemanfaatan sumber daya alam di bidang perkebunan adalah ...',
                    'jawaban' => [
                        'A' => 'Budidaya tanaman kelapa sawit dan karet.',
                        'B' => 'Penambangan bijih nikel.',
                        'C' => 'Pengeboran minyak bumi.',
                        'D' => 'Penangkapan ikan di laut lepas.',
                    ],
                    'benar' => 'A',
                ],
            ],

            // LEVEL 5 - PENGELOLAAN LINGKUNGAN DAN PEMBANGUNAN BERKELANJUTAN
            'PL' => [
                [
                    'pertanyaan' => 'Apa prinsip utama pengelolaan sumber daya alam secara berkelanjutan?',
                    'jawaban' => [
                        'A' => 'Mengutamakan pemanfaatan sebanyak-banyaknya dalam waktu singkat.',
                        'B' => 'Menghentikan seluruh kegiatan pemanfaatan sumber daya alam.',
                        'C' => 'Memenuhi kebutuhan saat ini tanpa mengurangi kemampuan generasi mendatang memenuhi kebutuhannya.',
                        'D' => 'Menggunakan sumber daya alam tanpa mempertimbangkan dampak lingkungan.',
                    ],
                    'benar' => 'C',
                ],
                [
                    'pertanyaan' => 'Komponen lingkungan hidup yang termasuk komponen biotik adalah ...',
                    'jawaban' => [
                        'A' => 'Air, tanah, dan udara.',
                        'B' => 'Tumbuhan, hewan, dan manusia.',
                        'C' => 'Suhu, cahaya matahari, dan kelembapan.',
                        'D' => 'Batuan, mineral, dan air.',
                    ],
                    'benar' => 'B',
                ],
                [
                    'pertanyaan' => 'Pembangunan berkelanjutan perlu memperhatikan keseimbangan antara ...',
                    'jawaban' => [
                        'A' => 'Kepentingan ekonomi, sosial, dan kelestarian lingkungan.',
                        'B' => 'Pembangunan gedung dan perluasan jalan saja.',
                        'C' => 'Pemanfaatan sumber daya alam dan peningkatan konsumsi saja.',
                        'D' => 'Kegiatan industri tanpa pengendalian lingkungan.',
                    ],
                    'benar' => 'A',
                ],
                [
                    'pertanyaan' => 'Apa salah satu fungsi AMDAL dalam kegiatan pembangunan?',
                    'jawaban' => [
                        'A' => 'Menentukan jumlah penduduk suatu wilayah.',
                        'B' => 'Menggantikan seluruh peraturan tata ruang.',
                        'C' => 'Menghilangkan kebutuhan pemantauan lingkungan.',
                        'D' => 'Menjadi bahan pertimbangan dalam pengambilan keputusan terkait dampak lingkungan.',
                    ],
                    'benar' => 'D',
                ],
                [
                    'pertanyaan' => 'Tindakan yang mencerminkan upaya konservasi lingkungan adalah ...',
                    'jawaban' => [
                        'A' => 'Menebang hutan lindung tanpa perencanaan.',
                        'B' => 'Membuang sampah ke sungai.',
                        'C' => 'Melindungi kawasan alami dan memulihkan lingkungan yang mengalami kerusakan.',
                        'D' => 'Mengambil sumber daya alam melebihi kemampuan pemulihannya.',
                    ],
                    'benar' => 'C',
                ],
            ],
        ];

        DB::transaction(function () use ($quizData) {
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
                    "5 soal Level {$kodeLevel} berhasil diproses."
                );
            }
        });

        $this->command->info('Seeder kuis Geografi Level 1–5 selesai.');
    }
}