<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | LEVEL 1 - KONSEP & TIPOLOGI LAHAN BASAH
        |--------------------------------------------------------------------------
        */

        $level1 = [
            [
                'kode' => 'KL',
                'judul' => 'Konsep Lahan Basah',
                'sub_judul' => 'Ekosistem air dengan manfaat besar',
                'deskripsi_singkat' => 'Kenali ciri, fungsi, dan peran penting lahan basah bagi kehidupan.',
                'konten' => <<<'TEXT'
Lahan basah merupakan wilayah yang memiliki karakteristik tanah jenuh air atau tergenang air, baik secara permanen maupun musiman. Keberadaan air menjadi faktor penting yang membentuk kondisi tanah, tumbuhan, dan hewan yang hidup di dalamnya.

Lahan basah dapat ditemukan dalam berbagai bentuk, seperti rawa, danau, sungai, hutan gambut, dan kawasan mangrove. Setiap jenis memiliki karakteristik lingkungan yang berbeda.

Ekosistem ini memiliki peran penting sebagai habitat berbagai organisme, penyimpan air, pengatur tata air, serta pendukung kehidupan masyarakat.

Melalui pembelajaran ini, kita akan mengenal berbagai jenis lahan basah dan memahami pentingnya menjaga kelestariannya.
TEXT,
                'fakta_angka' => 'Beragam tipe',
                'fakta_teks' => 'Lahan basah memiliki bentuk dan karakteristik yang berbeda.',
            ],
            [
                'kode' => 'KL-02',
                'judul' => 'Ciri-Ciri Ekosistem Lahan Basah',
                'sub_judul' => 'Mengenali lingkungan yang dipengaruhi air',
                'deskripsi_singkat' => 'Memahami karakteristik air, tanah, dan organisme lahan basah.',
                'konten' => <<<'TEXT'
Ekosistem lahan basah memiliki beberapa karakteristik yang membedakannya dari ekosistem daratan biasa.

1. Kondisi air
Wilayah lahan basah memiliki air yang menggenang atau tanah yang jenuh air dalam waktu tertentu.

2. Kondisi tanah
Tanahnya dapat memiliki kandungan air tinggi dan pada kondisi tertentu mengalami kekurangan oksigen.

3. Tumbuhan khas
Tumbuhan yang hidup di lahan basah memiliki kemampuan beradaptasi terhadap kondisi tanah basah atau genangan.

4. Keanekaragaman hayati
Lahan basah menjadi tempat hidup berbagai jenis ikan, burung, amfibi, serangga, dan tumbuhan.

Karakteristik tersebut saling berkaitan dan membentuk ekosistem yang khas.
TEXT,
                'fakta_angka' => '4 karakteristik',
                'fakta_teks' => 'Air, tanah, tumbuhan, dan keanekaragaman hayati.',
            ],
            [
                'kode' => 'KL-03',
                'judul' => 'Tipologi dan Klasifikasi Lahan Basah',
                'sub_judul' => 'Mengenal berbagai jenis lahan basah',
                'deskripsi_singkat' => 'Mempelajari pengelompokan lahan basah berdasarkan karakteristiknya.',
                'konten' => <<<'TEXT'
Lahan basah memiliki berbagai tipe yang dapat dibedakan berdasarkan sumber air, kondisi lingkungan, vegetasi, dan karakteristik wilayahnya.

Beberapa contoh lahan basah antara lain:

1. Rawa
Wilayah rendah yang mengalami genangan air secara permanen atau musiman.

2. Rawa gambut
Ekosistem yang memiliki lapisan tanah organik atau gambut dari akumulasi sisa tumbuhan.

3. Mangrove
Ekosistem pesisir yang dipengaruhi pasang surut dan menjadi habitat tumbuhan yang toleran terhadap kondisi air payau atau asin.

4. Lahan basah sungai dan danau
Wilayah perairan yang memiliki hubungan dengan sistem sungai dan danau.

Setiap tipe memiliki kondisi hidrologi, tumbuhan, dan organisme yang berbeda.
TEXT,
                'fakta_angka' => '4 contoh',
                'fakta_teks' => 'Rawa, gambut, mangrove, sungai dan danau.',
            ],
            [
                'kode' => 'KL-04',
                'judul' => 'Fungsi dan Manfaat Lahan Basah',
                'sub_judul' => 'Peran lahan basah bagi alam dan manusia',
                'deskripsi_singkat' => 'Mengenal manfaat ekologis, sosial, dan ekonomi lahan basah.',
                'konten' => <<<'TEXT'
Lahan basah memberikan manfaat yang besar bagi lingkungan dan kehidupan manusia.

1. Habitat organisme
Lahan basah menjadi tempat hidup dan berkembang biak berbagai tumbuhan dan hewan.

2. Penyimpanan air
Beberapa lahan basah dapat menampung air dan membantu menjaga kondisi hidrologi wilayah.

3. Pengendalian banjir
Lahan basah tertentu dapat menahan dan menyimpan sebagian air ketika terjadi peningkatan aliran air.

4. Sumber penghidupan
Masyarakat memanfaatkan lahan basah untuk perikanan, pertanian, dan kegiatan ekonomi lainnya.

5. Penyimpanan karbon
Ekosistem seperti gambut dan mangrove dapat menyimpan karbon dalam biomassa dan tanahnya.

Manfaat tersebut menjadikan lahan basah sebagai ekosistem yang perlu dilindungi.
TEXT,
                'fakta_angka' => '5 manfaat',
                'fakta_teks' => 'Mendukung lingkungan dan kehidupan masyarakat.',
            ],
            [
                'kode' => 'KL-05',
                'judul' => 'Persebaran Lahan Basah di Indonesia',
                'sub_judul' => 'Mengenal kekayaan lahan basah Nusantara',
                'deskripsi_singkat' => 'Mengetahui keberadaan ekosistem lahan basah di berbagai wilayah Indonesia.',
                'konten' => <<<'TEXT'
Indonesia memiliki beragam ekosistem lahan basah karena kondisi geografis, iklim tropis, dan wilayah perairannya.

Lahan basah dapat ditemukan di Sumatra, Kalimantan, Sulawesi, Papua, dan berbagai pulau lainnya.

Di Kalimantan Selatan, terdapat kawasan rawa yang memiliki hubungan erat dengan sungai dan kehidupan masyarakat. Wilayah seperti ini dimanfaatkan untuk kegiatan perikanan dan pertanian sesuai kondisi lingkungannya.

Di pesisir Indonesia, ekosistem mangrove tumbuh pada kawasan yang dipengaruhi pasang surut. Sementara itu, hutan rawa gambut banyak dijumpai di beberapa wilayah Sumatra, Kalimantan, dan Papua.

Persebaran tersebut menunjukkan bahwa lahan basah merupakan bagian penting dari kekayaan ekosistem Indonesia.
TEXT,
                'fakta_angka' => 'Indonesia',
                'fakta_teks' => 'Lahan basah tersebar di berbagai pulau Nusantara.',
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | LEVEL 2 - EKOSISTEM RAWA PASANG SURUT
        |--------------------------------------------------------------------------
        */

        $level2 = [
            [
                'kode' => 'PS-01',
                'judul' => 'Pengertian dan Karakteristik Rawa Pasang Surut',
                'sub_judul' => 'Ekosistem rawa yang dipengaruhi pasang surut',
                'deskripsi_singkat' => 'Mengenal pengertian, lokasi, dan karakteristik rawa pasang surut.',
                'konten' => <<<'TEXT'
Rawa pasang surut merupakan lahan basah yang kondisi airnya dipengaruhi oleh perubahan pasang dan surut, terutama di wilayah yang memiliki hubungan hidrologis dengan laut.

Ketika air laut mengalami pasang, air dapat masuk melalui sungai atau saluran menuju kawasan rawa. Ketika surut, permukaan air mengalami penurunan.

Karakteristik rawa pasang surut dipengaruhi oleh kondisi perairan, tanah, salinitas, dan hubungan wilayah dengan laut.

Ekosistem ini dapat ditemukan di sejumlah wilayah pesisir Indonesia, termasuk sebagian kawasan Sumatra dan Kalimantan.
TEXT,
                'fakta_angka' => 'Pasang surut',
                'fakta_teks' => 'Kondisi air dipengaruhi perubahan muka air.',
            ],
            [
                'kode' => 'PS-02',
                'judul' => 'Pengaruh Pasang Surut Air',
                'sub_judul' => 'Perubahan muka air dan pengaruhnya terhadap rawa',
                'deskripsi_singkat' => 'Memahami hubungan pasang surut dengan kondisi perairan rawa.',
                'konten' => <<<'TEXT'
Pasang surut merupakan perubahan naik dan turunnya permukaan air laut yang terjadi secara berkala.

Di kawasan rawa yang terhubung dengan laut, perubahan tersebut dapat memengaruhi ketinggian air, aliran air, dan kondisi lingkungan.

Pada saat pasang, air dapat bergerak masuk ke wilayah rawa melalui sungai dan saluran. Ketika surut, air bergerak kembali menuju wilayah perairan yang lebih rendah.

Perubahan ini memengaruhi organisme yang hidup di rawa. Tumbuhan dan hewan harus mampu menyesuaikan diri terhadap perubahan kondisi air.

Pasang surut juga perlu diperhatikan dalam kegiatan pertanian, perikanan, dan pengelolaan tata air.
TEXT,
                'fakta_angka' => 'Berkala',
                'fakta_teks' => 'Pasang dan surut terjadi secara berulang.',
            ],
            [
                'kode' => 'PS-03',
                'judul' => 'Jenis dan Kondisi Tanah Rawa Pasang Surut',
                'sub_judul' => 'Mengenal kondisi tanah dan wilayah rawa',
                'deskripsi_singkat' => 'Memahami variasi kondisi tanah dan lingkungan rawa pasang surut.',
                'konten' => <<<'TEXT'
Kondisi tanah rawa pasang surut dapat berbeda-beda sesuai bahan pembentuk tanah, pengaruh air, dan kondisi wilayahnya.

Sebagian kawasan memiliki tanah mineral, sedangkan kawasan lainnya dapat memiliki lapisan bahan organik.

Kondisi keasaman tanah dan kandungan unsur tertentu juga dapat memengaruhi kesesuaian lahan untuk pertanian.

Karena itu, pemanfaatan rawa pasang surut memerlukan pemahaman terhadap karakteristik tanah dan pengelolaan air yang sesuai.

Pengelolaan yang tidak tepat dapat menyebabkan perubahan kondisi tanah dan menimbulkan masalah lingkungan.
TEXT,
                'fakta_angka' => 'Tanah & air',
                'fakta_teks' => 'Kondisi tanah dipengaruhi lingkungan hidrologis.',
            ],
            [
                'kode' => 'PS-04',
                'judul' => 'Flora dan Fauna Rawa Pasang Surut',
                'sub_judul' => 'Keanekaragaman hayati penghuni rawa',
                'deskripsi_singkat' => 'Mengenal tumbuhan dan hewan yang hidup di rawa pasang surut.',
                'konten' => <<<'TEXT'
Rawa pasang surut menjadi habitat bagi berbagai organisme yang mampu beradaptasi terhadap perubahan kondisi air.

Jenis tumbuhan yang dijumpai bergantung pada tingkat genangan, kondisi tanah, dan kadar garam. Pada kawasan yang dipengaruhi air payau, dapat ditemukan tumbuhan mangrove.

Fauna yang dapat ditemukan di lingkungan rawa antara lain ikan, udang, kepiting, burung air, dan berbagai jenis serangga.

Setiap organisme memiliki peran dalam rantai makanan dan keseimbangan ekosistem.

Keanekaragaman hayati perlu dilindungi melalui pemeliharaan habitat dan pengendalian pencemaran.
TEXT,
                'fakta_angka' => 'Flora & fauna',
                'fakta_teks' => 'Habitat berbagai organisme perairan dan daratan.',
            ],
            [
                'kode' => 'PS-05',
                'judul' => 'Pemanfaatan dan Pengelolaan Rawa Pasang Surut',
                'sub_judul' => 'Mengelola rawa secara bijaksana',
                'deskripsi_singkat' => 'Mempelajari pemanfaatan dan upaya menjaga rawa pasang surut.',
                'konten' => <<<'TEXT'
Rawa pasang surut dapat dimanfaatkan masyarakat untuk kegiatan pertanian, perikanan, dan sumber mata pencaharian lainnya.

Namun, pemanfaatannya harus memperhatikan kondisi air, tanah, dan lingkungan sekitar.

Pengelolaan tata air diperlukan agar perubahan pasang surut tidak menimbulkan dampak yang merugikan.

Beberapa ancaman yang dapat terjadi adalah pencemaran, kerusakan habitat, perubahan aliran air, dan pembukaan lahan yang tidak sesuai.

Pelestarian dapat dilakukan melalui pengelolaan air yang tepat, perlindungan vegetasi, pengurangan pencemaran, serta pemanfaatan lahan sesuai karakteristiknya.
TEXT,
                'fakta_angka' => 'Berkelanjutan',
                'fakta_teks' => 'Pemanfaatan harus memperhatikan keseimbangan lingkungan.',
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | LEVEL 3 - RAWA LEBAK
        |--------------------------------------------------------------------------
        | Lima materi RL yang sudah dibuat sebelumnya dipertahankan.
        */

        $level3 = [
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
                'fakta_teks' => 'Genangan air berubah mengikuti kondisi musim.',
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
                'fakta_teks' => 'Musim hujan dan kemarau memengaruhi pola genangan.',
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
                'fakta_teks' => 'Lebak dangkal, tengahan, dan dalam.',
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
                'fakta_teks' => 'Habitat bagi beragam organisme perairan dan daratan.',
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
                'fakta_teks' => 'Mendukung keseimbangan alam dan kehidupan masyarakat.',
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | LEVEL 4 - RAWA GAMBUT
        |--------------------------------------------------------------------------
        */

        $level4 = [
            [
                'kode' => 'RG-01',
                'judul' => 'Pengertian dan Pembentukan Gambut',
                'sub_judul' => 'Mengenal proses terbentuknya tanah gambut',
                'deskripsi_singkat' => 'Memahami pengertian gambut dan proses penumpukan bahan organik.',
                'konten' => <<<'TEXT'
Gambut merupakan jenis tanah atau bahan organik yang terbentuk dari sisa-sisa tumbuhan yang mengalami proses penguraian tidak sempurna dalam kondisi lingkungan yang basah.

Ketika tumbuhan mati dan jatuh ke permukaan tanah, sisa-sisanya dapat menumpuk. Pada kondisi jenuh air dan kekurangan oksigen, proses penguraian berlangsung lebih lambat.

Penumpukan bahan organik tersebut dalam waktu yang panjang dapat membentuk lapisan gambut.

Ekosistem gambut banyak ditemukan di wilayah tropis, termasuk Sumatra, Kalimantan, dan Papua.

Pembentukan gambut berlangsung dalam waktu lama sehingga kerusakan lapisannya sulit dipulihkan dalam waktu singkat.
TEXT,
                'fakta_angka' => 'Jangka panjang',
                'fakta_teks' => 'Gambut terbentuk melalui akumulasi bahan organik.',
            ],
            [
                'kode' => 'RG-02',
                'judul' => 'Karakteristik Ekosistem Rawa Gambut',
                'sub_judul' => 'Ciri khas tanah, air, dan vegetasi gambut',
                'deskripsi_singkat' => 'Mengenali karakteristik lingkungan rawa gambut.',
                'konten' => <<<'TEXT'
Ekosistem rawa gambut memiliki karakteristik yang berbeda dari lahan mineral biasa.

Tanah gambut terbentuk dari akumulasi bahan organik. Warnanya dapat cokelat tua hingga kehitaman karena kandungan bahan organik yang tinggi.

Ekosistem ini umumnya memiliki kondisi tanah yang basah dan dipengaruhi oleh tinggi muka air.

Beberapa kawasan gambut memiliki air yang bersifat asam dan miskin unsur hara. Tumbuhan yang hidup di dalamnya memiliki kemampuan beradaptasi terhadap kondisi tersebut.

Kondisi air sangat penting untuk menjaga kestabilan ekosistem gambut. Penurunan muka air secara berlebihan dapat meningkatkan risiko kerusakan dan kebakaran.
TEXT,
                'fakta_angka' => 'Organik',
                'fakta_teks' => 'Tanah gambut berasal dari akumulasi sisa tumbuhan.',
            ],
            [
                'kode' => 'RG-03',
                'judul' => 'Flora dan Fauna Rawa Gambut',
                'sub_judul' => 'Keanekaragaman hayati hutan gambut',
                'deskripsi_singkat' => 'Mengenal tumbuhan dan hewan yang hidup di ekosistem gambut.',
                'konten' => <<<'TEXT'
Hutan rawa gambut merupakan habitat bagi berbagai tumbuhan dan hewan yang telah beradaptasi terhadap kondisi tanah basah.

Beberapa tumbuhan yang dapat dijumpai antara lain ramin, jelutung, meranti rawa, dan berbagai jenis tumbuhan bawah.

Satwa yang hidup di kawasan gambut antara lain orangutan, bekantan di wilayah persebarannya, berbagai burung, reptil, dan mamalia lainnya.

Keberadaan tumbuhan dan hewan tersebut membentuk hubungan ekologis yang saling berkaitan.

Kerusakan hutan gambut dapat mengurangi luas habitat dan mengancam kelangsungan hidup satwa. Karena itu, perlindungan kawasan gambut juga berarti melindungi keanekaragaman hayati.
TEXT,
                'fakta_angka' => 'Flora & fauna',
                'fakta_teks' => 'Menjadi habitat berbagai tumbuhan dan satwa.',
            ],
            [
                'kode' => 'RG-04',
                'judul' => 'Fungsi Gambut bagi Lingkungan',
                'sub_judul' => 'Peran gambut dalam menjaga keseimbangan alam',
                'deskripsi_singkat' => 'Memahami fungsi penyimpanan air, karbon, dan habitat.',
                'konten' => <<<'TEXT'
Ekosistem gambut memiliki fungsi penting dalam menjaga keseimbangan lingkungan.

1. Penyimpan karbon
Lapisan gambut menyimpan karbon dalam jumlah besar karena terbentuk dari akumulasi bahan organik.

2. Penyimpan air
Gambut yang berada dalam kondisi alami dapat menyimpan air dan membantu menjaga kondisi hidrologi kawasan.

3. Habitat keanekaragaman hayati
Hutan rawa gambut menyediakan tempat hidup bagi berbagai tumbuhan dan satwa.

4. Pengatur lingkungan
Kondisi hidrologi gambut berhubungan dengan keseimbangan air di wilayah sekitarnya.

Fungsi tersebut dapat terganggu apabila gambut mengalami pengeringan, pembakaran, dan perubahan penggunaan lahan.
TEXT,
                'fakta_angka' => '4 fungsi',
                'fakta_teks' => 'Penyimpan karbon, air, habitat, dan pengatur lingkungan.',
            ],
            [
                'kode' => 'RG-05',
                'judul' => 'Ancaman dan Pelestarian Gambut',
                'sub_judul' => 'Menjaga ekosistem gambut dari kerusakan',
                'deskripsi_singkat' => 'Mengenal ancaman dan tindakan pelestarian gambut.',
                'konten' => <<<'TEXT'
Ekosistem gambut menghadapi berbagai ancaman akibat aktivitas manusia dan perubahan lingkungan.

Salah satu ancaman utama adalah pengeringan lahan melalui saluran drainase yang dapat menurunkan muka air gambut.

Gambut yang mengering menjadi lebih rentan terhadap kebakaran. Kebakaran gambut dapat menimbulkan kerusakan lingkungan dan asap yang mengganggu kesehatan.

Ancaman lainnya meliputi pembukaan lahan yang tidak sesuai, penebangan, dan pencemaran.

Upaya pelestarian dapat dilakukan melalui pembasahan kembali gambut, perlindungan vegetasi, pencegahan kebakaran, dan pemulihan kawasan yang rusak.

Menjaga gambut berarti menjaga cadangan karbon, air, dan habitat berbagai organisme.
TEXT,
                'fakta_angka' => 'Pencegahan',
                'fakta_teks' => 'Menjaga kelembapan gambut membantu mengurangi risiko kebakaran.',
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | LEVEL 5 - LAHAN MANGROVE
        |--------------------------------------------------------------------------
        */

        $level5 = [
            [
                'kode' => 'MG-01',
                'judul' => 'Pengertian dan Karakteristik Mangrove',
                'sub_judul' => 'Mengenal hutan mangrove di wilayah pesisir',
                'deskripsi_singkat' => 'Memahami pengertian dan kondisi lingkungan ekosistem mangrove.',
                'konten' => <<<'TEXT'
Mangrove merupakan kelompok tumbuhan yang hidup di wilayah pesisir tropis dan subtropis yang dipengaruhi oleh pasang surut.

Ekosistem mangrove umumnya berkembang pada kawasan berlumpur, muara sungai, dan pesisir yang terlindung dari gelombang besar.

Tumbuhan mangrove memiliki kemampuan beradaptasi terhadap kondisi lingkungan yang dipengaruhi air asin atau payau.

Akar mangrove memiliki bentuk yang beragam. Sebagian jenis memiliki akar tunjang, sedangkan jenis lainnya memiliki akar napas yang membantu pertukaran gas.

Ekosistem ini menjadi salah satu kawasan penting bagi perlindungan pesisir dan keanekaragaman hayati.
TEXT,
                'fakta_angka' => 'Pesisir',
                'fakta_teks' => 'Mangrove tumbuh pada wilayah yang dipengaruhi pasang surut.',
            ],
            [
                'kode' => 'MG-02',
                'judul' => 'Adaptasi Tumbuhan Mangrove',
                'sub_judul' => 'Kemampuan tumbuhan bertahan di lingkungan pesisir',
                'deskripsi_singkat' => 'Mengenal bentuk akar dan cara mangrove menghadapi kadar garam.',
                'konten' => <<<'TEXT'
Tumbuhan mangrove memiliki berbagai bentuk adaptasi untuk bertahan hidup di lingkungan pesisir yang berlumpur dan dipengaruhi air asin.

1. Akar tunjang
Akar ini membantu menopang tumbuhan pada tanah berlumpur.

2. Akar napas
Beberapa mangrove memiliki akar yang muncul di atas permukaan tanah untuk membantu pertukaran gas.

3. Adaptasi terhadap garam
Beberapa jenis mangrove dapat membatasi masuknya garam melalui akar atau mengeluarkan garam melalui bagian tertentu tumbuhan.

4. Adaptasi biji
Sebagian mangrove memiliki perkecambahan biji ketika masih melekat pada pohon induknya. Proses ini dikenal sebagai vivipari.

Adaptasi tersebut memungkinkan mangrove bertahan pada lingkungan pesisir yang dinamis.
TEXT,
                'fakta_angka' => '4 adaptasi',
                'fakta_teks' => 'Akar, garam, dan perkecambahan menjadi bagian adaptasi mangrove.',
            ],
            [
                'kode' => 'MG-03',
                'judul' => 'Keanekaragaman Hayati Mangrove',
                'sub_judul' => 'Flora dan fauna penghuni hutan mangrove',
                'deskripsi_singkat' => 'Mengenal berbagai tumbuhan dan satwa di kawasan mangrove.',
                'konten' => <<<'TEXT'
Ekosistem mangrove menjadi habitat bagi berbagai jenis tumbuhan, ikan, kepiting, moluska, burung, dan organisme lainnya.

Tumbuhan mangrove memiliki beberapa kelompok jenis, seperti Rhizophora, Avicennia, Sonneratia, dan Bruguiera.

Di antara akar mangrove dapat ditemukan kepiting, udang, ikan kecil, dan berbagai organisme yang memanfaatkan kawasan tersebut sebagai tempat mencari makan dan berlindung.

Beberapa burung juga memanfaatkan kawasan mangrove untuk mencari makanan dan beristirahat.

Keanekaragaman organisme ini membentuk hubungan yang saling mendukung dalam ekosistem pesisir.
TEXT,
                'fakta_angka' => 'Beragam organisme',
                'fakta_teks' => 'Mangrove menjadi habitat flora dan fauna pesisir.',
            ],
            [
                'kode' => 'MG-04',
                'judul' => 'Manfaat Ekosistem Mangrove',
                'sub_judul' => 'Pelindung pesisir dan sumber kehidupan',
                'deskripsi_singkat' => 'Memahami manfaat mangrove bagi lingkungan dan masyarakat.',
                'konten' => <<<'TEXT'
Mangrove memberikan berbagai manfaat bagi lingkungan pesisir dan masyarakat.

1. Melindungi pesisir
Vegetasi mangrove dapat membantu mengurangi energi gelombang dan menahan sedimen.

2. Menjadi habitat
Mangrove menyediakan tempat hidup, mencari makan, dan berkembang biak bagi berbagai organisme.

3. Mendukung perikanan
Kawasan mangrove dapat menjadi tempat pembesaran bagi sejumlah jenis ikan dan udang.

4. Menyimpan karbon
Mangrove menyimpan karbon pada tumbuhan dan sedimen.

5. Mendukung kehidupan masyarakat
Mangrove dapat memberikan manfaat ekonomi melalui perikanan dan pemanfaatan sumber daya secara berkelanjutan.
TEXT,
                'fakta_angka' => '5 manfaat',
                'fakta_teks' => 'Mendukung perlindungan pesisir dan kehidupan masyarakat.',
            ],
            [
                'kode' => 'MG-05',
                'judul' => 'Ancaman dan Pelestarian Mangrove',
                'sub_judul' => 'Menjaga hutan mangrove untuk masa depan',
                'deskripsi_singkat' => 'Mengenal kerusakan mangrove dan cara menjaga kelestariannya.',
                'konten' => <<<'TEXT'
Ekosistem mangrove menghadapi berbagai ancaman, seperti alih fungsi lahan, pencemaran, penebangan, dan pembangunan pesisir yang tidak memperhatikan keseimbangan lingkungan.

Kerusakan mangrove dapat menyebabkan hilangnya habitat satwa, berkurangnya perlindungan pesisir, dan terganggunya fungsi ekologis kawasan.

Pelestarian mangrove dapat dilakukan melalui beberapa tindakan.

1. Melindungi kawasan mangrove yang masih alami.
2. Melakukan rehabilitasi pada kawasan yang rusak dengan jenis tumbuhan yang sesuai.
3. Mengurangi sampah dan pencemaran pesisir.
4. Mengelola pemanfaatan sumber daya secara berkelanjutan.
5. Melibatkan masyarakat dalam kegiatan perlindungan mangrove.

Menjaga mangrove merupakan salah satu cara untuk melindungi lingkungan pesisir dan kehidupan masyarakat di sekitarnya.
TEXT,
                'fakta_angka' => '5 tindakan',
                'fakta_teks' => 'Perlindungan, rehabilitasi, dan pemanfaatan berkelanjutan.',
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | SIMPAN SEMUA MATERI
        |--------------------------------------------------------------------------
        */

        $seluruhMateri = [
            1 => $level1,
            2 => $level2,
            3 => $level3,
            4 => $level4,
            5 => $level5,
        ];

        foreach ($seluruhMateri as $levelId => $daftarMateri) {
            foreach ($daftarMateri as $materi) {

                Material::updateOrCreate(
                    [
                        'level_id' => $levelId,
                        'kode' => $materi['kode'],
                    ],
                    array_merge($materi, [
                        'level_id' => $levelId,
                    ])
                );
            }
        }
    }
}
