<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        // Materi Level 1: tetap dipertahankan
        Material::updateOrCreate(
            [
                'level_id' => 1,
                'kode' => 'KL',
            ],
            [
                'judul' => 'Konsep Lahan Basah',
                'sub_judul' => 'Ekosistem air dengan manfaat besar',
                'deskripsi_singkat' => 'Kenali ciri, fungsi, dan peran penting lahan basah bagi kehidupan.',
                'konten' => 'Kenali ciri, fungsi, dan peran penting lahan basah bagi kehidupan. Setiap jenis lahan basah memiliki aliran air, tumbuhan, dan satwa khas yang saling terhubung.',
                'fakta_angka' => '6%',
                'fakta_teks' => 'Permukaan Bumi berupa lahan basah',
            ]
        );

        // Materi Level 3: Rawa Lebak
        $materiRawaLebak = [
            [
                'kode' => 'RL-01',
                'judul' => 'Mengenal Ekosistem Rawa Lebak',
                'sub_judul' => 'Pengertian dan karakteristik rawa lebak',
                'deskripsi_singkat' => 'Mengenal pengertian, ciri, dan proses terbentuknya ekosistem rawa lebak.',
                'konten' => <<<'TEXT'
Rawa lebak merupakan ekosistem lahan basah yang terbentuk pada wilayah dataran rendah dan mengalami genangan air secara musiman. Genangan tersebut terutama berasal dari luapan sungai, curah hujan, serta aliran air dari wilayah sekitarnya.

Berbeda dengan rawa pasang surut yang dipengaruhi oleh naik turunnya air laut, rawa lebak umumnya memiliki pola genangan yang mengikuti perubahan musim dan kondisi hidrologi sungai.

Salah satu ciri utama rawa lebak adalah perubahan kondisi lingkungan antara musim hujan dan musim kemarau. Pada musim hujan, sebagian wilayah dapat tergenang cukup luas. Ketika musim kemarau tiba, air berangsur surut sehingga beberapa bagian lahan dapat dimanfaatkan untuk kegiatan pertanian.

Rawa lebak memiliki peran ekologis yang penting, antara lain sebagai tempat hidup berbagai organisme, tempat penyimpanan air, serta kawasan yang membantu menjaga keseimbangan lingkungan.
TEXT,
                'fakta_angka' => 'Musiman',
                'fakta_teks' => 'Genangan air berubah mengikuti kondisi musim',
            ],
            [
                'kode' => 'RL-02',
                'judul' => 'Pola Genangan Air Rawa Lebak',
                'sub_judul' => 'Perubahan kondisi air sepanjang musim',
                'deskripsi_singkat' => 'Memahami hubungan musim hujan, musim kemarau, dan perubahan genangan air.',
                'konten' => <<<'TEXT'
Air merupakan unsur utama yang membentuk karakteristik ekosistem rawa lebak. Ketinggian dan luas genangan air dapat berubah sesuai curah hujan, luapan sungai, serta kondisi wilayah di sekitarnya.

Pada musim hujan, air sungai dapat meluap menuju dataran rendah dan menyebabkan wilayah rawa lebak tergenang. Genangan ini dapat menyediakan habitat bagi ikan, amfibi, burung air, dan berbagai organisme lainnya.

Ketika musim kemarau berlangsung, pasokan air berkurang dan genangan mulai menyusut. Beberapa bagian rawa bahkan dapat mengering sementara, sehingga memungkinkan masyarakat memanfaatkan lahan untuk kegiatan pertanian.

Perubahan genangan tersebut memengaruhi kehidupan tumbuhan, hewan, dan aktivitas masyarakat. Oleh karena itu, pemahaman terhadap pola air sangat penting dalam pengelolaan rawa lebak.
TEXT,
                'fakta_angka' => '2 musim',
                'fakta_teks' => 'Musim hujan dan kemarau memengaruhi pola genangan',
            ],
            [
                'kode' => 'RL-03',
                'judul' => 'Tipe-Tipe Rawa Lebak',
                'sub_judul' => 'Lebak dangkal, tengahan, dan dalam',
                'deskripsi_singkat' => 'Mengenal pembagian rawa lebak berdasarkan kedalaman dan lama genangan.',
                'konten' => <<<'TEXT'
Rawa lebak dapat dibedakan berdasarkan kedalaman genangan dan lama waktu wilayah tersebut terendam air. Secara umum, dikenal tiga kelompok, yaitu lebak dangkal, lebak tengahan, dan lebak dalam.

1. Lebak Dangkal

Lebak dangkal merupakan wilayah rawa yang relatif rendah kedalaman genangannya dan biasanya lebih cepat mengalami pengeringan ketika musim kemarau. Wilayah ini umumnya lebih mudah dimanfaatkan untuk kegiatan pertanian setelah air surut.

2. Lebak Tengahan

Lebak tengahan memiliki kondisi genangan yang lebih dalam atau berlangsung lebih lama dibandingkan lebak dangkal. Pemanfaatannya perlu menyesuaikan waktu surutnya air dan kondisi lahan.

3. Lebak Dalam

Lebak dalam merupakan bagian rawa yang memiliki genangan relatif lebih dalam dan dapat bertahan lebih lama. Wilayah ini sering menjadi habitat penting bagi berbagai organisme perairan.

Pembagian tersebut membantu masyarakat memahami karakteristik lahan dan menentukan bentuk pemanfaatan yang sesuai. Kondisi kedalaman serta lama genangan dapat berbeda-beda pada setiap wilayah.
TEXT,
                'fakta_angka' => '3 tipe',
                'fakta_teks' => 'Lebak dangkal, tengahan, dan dalam',
            ],
            [
                'kode' => 'RL-04',
                'judul' => 'Keanekaragaman Hayati Rawa Lebak',
                'sub_judul' => 'Flora dan fauna penghuni rawa lebak',
                'deskripsi_singkat' => 'Mengenal tumbuhan dan hewan yang hidup serta beradaptasi di rawa lebak.',
                'konten' => <<<'TEXT'
Rawa lebak memiliki keanekaragaman hayati yang dipengaruhi oleh kondisi air, tanah, dan perubahan musim. Berbagai tumbuhan dan hewan hidup serta beradaptasi terhadap perubahan lingkungan tersebut.

Flora rawa lebak antara lain tumbuhan air seperti eceng gondok, teratai, dan berbagai jenis rumput rawa. Pada bagian yang tidak selalu tergenang, dapat ditemukan tumbuhan yang mampu bertahan pada kondisi tanah basah maupun kering secara bergantian.

Fauna yang dapat ditemukan di ekosistem rawa lebak antara lain ikan gabus, ikan betok, ikan sepat, katak, ular air, serta berbagai jenis burung air. Organisme tersebut memiliki peran masing-masing dalam menjaga keseimbangan ekosistem.

Tumbuhan menyediakan sumber makanan dan tempat berlindung bagi hewan. Sementara itu, berbagai hewan berperan dalam rantai makanan dan membantu menjaga keseimbangan populasi organisme.

Keanekaragaman hayati rawa lebak perlu dijaga melalui perlindungan habitat, pemanfaatan sumber daya secara bijak, dan pencegahan pencemaran.
TEXT,
                'fakta_angka' => 'Flora & fauna',
                'fakta_teks' => 'Habitat bagi beragam organisme perairan dan daratan',
            ],
            [
                'kode' => 'RL-05',
                'judul' => 'Manfaat dan Pelestarian Rawa Lebak',
                'sub_judul' => 'Peran rawa lebak bagi alam dan masyarakat',
                'deskripsi_singkat' => 'Memahami manfaat ekologis, ekonomi, serta upaya menjaga kelestarian rawa lebak.',
                'konten' => <<<'TEXT'
Rawa lebak memberikan berbagai manfaat bagi lingkungan dan kehidupan masyarakat. Ekosistem ini berperan sebagai tempat hidup organisme, penyimpan air, serta kawasan yang membantu mengurangi dampak genangan di wilayah sekitarnya.

Bagi masyarakat, rawa lebak dapat dimanfaatkan untuk kegiatan perikanan, pertanian, dan sumber mata pencaharian lainnya. Ketika air mulai surut, sebagian wilayah dapat dimanfaatkan untuk menanam tanaman pertanian yang sesuai dengan kondisi lahan.

Di Kalimantan Selatan, rawa lebak merupakan bagian penting dari kehidupan masyarakat. Salah satu bentuk pemanfaatannya adalah pertanian lahan rawa yang menyesuaikan waktu tanam dengan pola genangan air.

Meskipun memiliki banyak manfaat, rawa lebak menghadapi berbagai ancaman, seperti pencemaran air, pembukaan lahan yang tidak terkendali, kebakaran lahan saat musim kering, dan kerusakan habitat.

Upaya pelestarian dapat dilakukan melalui pengelolaan air yang bijak, penggunaan lahan sesuai karakteristiknya, perlindungan tumbuhan dan satwa, serta pengurangan sampah dan pencemaran.

Melestarikan rawa lebak berarti menjaga keseimbangan lingkungan sekaligus mempertahankan sumber kehidupan bagi masyarakat di sekitarnya.
TEXT,
                'fakta_angka' => 'Ekologi & ekonomi',
                'fakta_teks' => 'Mendukung keseimbangan alam dan kehidupan masyarakat',
            ],
        ];

        foreach ($materiRawaLebak as $materi) {
            Material::updateOrCreate(
                [
                    'level_id' => 3,
                    'kode' => $materi['kode'],
                ],
                array_merge($materi, [
                    'level_id' => 3,
                ])
            );
        }
    }
}
