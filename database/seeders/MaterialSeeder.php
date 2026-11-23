<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Material;
use RuntimeException;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        $materi = [

            // =====================================================
            // LEVEL 1 - BIOSFER DAN KEHIDUPAN DI BUMI
            // ID: 1, 7, 8, 9, 10
            // =====================================================

            [
                'id' => 1,
                'level_id' => 1,
                'kode' => 'BIO-01',
                'judul' => 'Pengertian dan Karakteristik Biosfer',
                'sub_judul' => 'Mengenal ruang kehidupan di Bumi',
                'deskripsi_singkat' => 'Memahami pengertian biosfer serta wilayah yang mendukung kehidupan.',
                'konten' => <<<'TEXT'
Biosfer merupakan bagian dari Bumi dan atmosfer yang menjadi tempat organisme hidup dan melangsungkan kehidupannya. Istilah biosfer berasal dari kata bio yang berarti hidup dan sphaira yang berarti tempat atau lapisan. Kehidupan dapat ditemukan di berbagai lingkungan, seperti daratan, perairan, tanah, dan udara pada ketinggian tertentu.

Biosfer mencakup wilayah yang memiliki kondisi untuk mendukung kehidupan. Gurun yang kering, wilayah kutub yang dingin, hingga lingkungan laut tetap dapat menjadi tempat hidup organisme yang mampu menyesuaikan diri.

Keberadaan biosfer menunjukkan bahwa kehidupan tersebar di berbagai bagian Bumi. Setiap organisme membutuhkan lingkungan yang menyediakan kebutuhan untuk bertahan hidup dan berkembang.
TEXT,
                'fakta_angka' => 'Lapisan kehidupan',
                'fakta_teks' => 'Biosfer menjadi jenjang kehidupan tertinggi di Bumi.',
            ],

            [
                'id' => 7,
                'level_id' => 1,
                'kode' => 'BIO-02',
                'judul' => 'Jenjang Kehidupan dalam Biosfer',
                'sub_judul' => 'Dari individu hingga biosfer',
                'deskripsi_singkat' => 'Mengenal tingkatan organisasi kehidupan dalam biosfer.',
                'konten' => <<<'TEXT'
Kehidupan dalam biosfer tersusun atas beberapa jenjang organisasi. Setiap jenjang memiliki cakupan dan hubungan yang berbeda, mulai dari organisme tunggal hingga keseluruhan wilayah kehidupan di Bumi.

1. Individu
Individu merupakan satu organisme dari spesies tertentu, misalnya seekor ayam, seekor kucing, atau sebatang pohon kelapa.

2. Populasi
Populasi adalah kumpulan individu sejenis yang hidup di suatu daerah dan waktu tertentu. Contohnya populasi ayam di sebuah desa.

3. Komunitas
Komunitas merupakan kumpulan berbagai populasi yang hidup dan saling berinteraksi di suatu kawasan.

4. Ekosistem
Ekosistem adalah kesatuan komunitas dengan lingkungan tempat hidupnya yang saling memengaruhi. Komponennya meliputi produsen, konsumen, dan pengurai.

5. Bioma
Bioma merupakan kumpulan ekosistem pada wilayah geografis dengan iklim dan kondisi yang relatif sama. Berbagai bioma di Bumi membentuk biosfer.
TEXT,
                'fakta_angka' => '5 jenjang kehidupan',
                'fakta_teks' => 'Individu, populasi, komunitas, ekosistem, dan bioma.',
            ],

            [
                'id' => 8,
                'level_id' => 1,
                'kode' => 'BIO-03',
                'judul' => 'Faktor yang Memengaruhi Persebaran Flora dan Fauna',
                'sub_judul' => 'Mengapa makhluk hidup tersebar berbeda?',
                'deskripsi_singkat' => 'Mempelajari faktor iklim, tanah, relief, air, dan makhluk hidup.',
                'konten' => <<<'TEXT'
Persebaran flora dan fauna di permukaan Bumi tidak berlangsung secara merata. Keberadaan suatu organisme dipengaruhi oleh kondisi lingkungan dan kemampuannya untuk menyesuaikan diri.

Beberapa faktor yang memengaruhi persebaran flora dan fauna adalah:

1. Iklim
Unsur iklim seperti suhu, kelembapan udara, curah hujan, angin, dan penyinaran matahari memengaruhi pertumbuhan tumbuhan serta kehidupan hewan.

2. Tanah
Tanah menyediakan unsur hara, air, dan media tumbuh bagi tanaman. Perbedaan kandungan dan kesuburan tanah menyebabkan perbedaan vegetasi.

3. Relief atau kondisi fisik muka Bumi
Ketinggian tempat, bentuk permukaan, dan kemiringan wilayah memengaruhi kondisi lingkungan organisme.

4. Air
Ketersediaan air menjadi salah satu kebutuhan penting bagi kehidupan dan pertumbuhan organisme.

5. Faktor biotik
Hubungan antarmakhluk hidup, termasuk aktivitas manusia, dapat memengaruhi keberadaan dan persebaran flora serta fauna.
TEXT,
                'fakta_angka' => '5 faktor utama',
                'fakta_teks' => 'Iklim, tanah, relief, air, dan faktor biotik.',
            ],

            [
                'id' => 9,
                'level_id' => 1,
                'kode' => 'BIO-04',
                'judul' => 'Hubungan Kondisi Fisik dengan Kehidupan',
                'sub_judul' => 'Lingkungan membentuk persebaran organisme',
                'deskripsi_singkat' => 'Memahami pengaruh kondisi lingkungan terhadap kehidupan flora dan fauna.',
                'konten' => <<<'TEXT'
Kondisi fisik suatu wilayah memiliki hubungan erat dengan jenis flora dan fauna yang dapat hidup di dalamnya. Perbedaan suhu, kelembapan, curah hujan, tanah, dan ketinggian menyebabkan setiap wilayah memiliki karakteristik kehidupan yang berbeda.

Suhu dan kelembapan memengaruhi pertumbuhan tumbuhan. Curah hujan menentukan ketersediaan air, sedangkan sinar matahari diperlukan tumbuhan hijau untuk melakukan fotosintesis. Angin juga dapat membantu proses penyerbukan dan penyebaran biji.

Contohnya, wilayah tropis dengan curah hujan tinggi mendukung pertumbuhan hutan yang lebat. Sebaliknya, wilayah gurun memiliki vegetasi yang lebih terbatas. Kaktus dapat bertahan di lingkungan kering karena mampu menyimpan air pada batangnya.

Perbedaan kondisi lingkungan tersebut membuat organisme memiliki bentuk adaptasi dan persebaran yang beragam.
TEXT,
                'fakta_angka' => 'Beragam kondisi fisik',
                'fakta_teks' => 'Iklim, tanah, air, dan ketinggian memengaruhi kehidupan.',
            ],

            [
                'id' => 10,
                'level_id' => 1,
                'kode' => 'BIO-05',
                'judul' => 'Interaksi Makhluk Hidup dan Lingkungannya',
                'sub_judul' => 'Memahami hubungan dalam ekosistem',
                'deskripsi_singkat' => 'Mengenal komponen biotik dan abiotik serta interaksinya.',
                'konten' => <<<'TEXT'
Ekosistem terbentuk melalui hubungan timbal balik antara makhluk hidup dan lingkungan tempat tinggalnya. Komponen ekosistem saling berinteraksi sehingga membentuk suatu kesatuan yang mendukung kehidupan.

Komponen biotik merupakan seluruh makhluk hidup yang terdapat dalam lingkungan. Berdasarkan fungsinya, komponen biotik dapat dibedakan menjadi:

1. Produsen, yaitu organisme yang dapat menghasilkan makanan sendiri, seperti tumbuhan hijau.
2. Konsumen, yaitu organisme yang memperoleh makanan dari organisme lain, seperti hewan dan manusia.
3. Pengurai, yaitu organisme yang menguraikan sisa makhluk hidup, seperti bakteri dan jamur.

Komponen abiotik merupakan unsur tidak hidup yang memengaruhi kehidupan, seperti udara, tanah, air, dan sinar matahari.

Keseimbangan ekosistem bergantung pada hubungan antara komponen biotik dan abiotik. Perubahan pada salah satu komponen dapat memengaruhi komponen lainnya.
TEXT,
                'fakta_angka' => '2 komponen utama',
                'fakta_teks' => 'Ekosistem tersusun atas komponen biotik dan abiotik.',
            ],

            // =====================================================
            // LEVEL 2 - BIOMA DAN PERSEBARAN FLORA FAUNA DUNIA
            // ID: 11, 12, 13, 14, 15
            // =====================================================

            [
                'id' => 11,
                'level_id' => 2,
                'kode' => 'BMD-01',
                'judul' => 'Pengertian dan Karakteristik Bioma',
                'sub_judul' => 'Mengenal wilayah kehidupan berskala luas',
                'deskripsi_singkat' => 'Memahami pembentukan dan ciri-ciri bioma di permukaan Bumi.',
                'konten' => <<<'TEXT'
Bioma merupakan kumpulan ekosistem yang terdapat pada suatu wilayah geografis dengan iklim dan kondisi lingkungan yang relatif sama. Setiap bioma memiliki karakteristik vegetasi serta kehidupan hewan yang khas.

Pembentukan bioma dipengaruhi oleh interaksi berbagai unsur lingkungan, seperti air, iklim, tanah, dan organisme yang hidup di suatu daerah. Kondisi tersebut membentuk komunitas tumbuhan dan hewan yang mampu menyesuaikan diri dengan lingkungannya.

Bioma umumnya memiliki wilayah yang luas. Komunitas di dalamnya dapat berada dalam kondisi relatif stabil, tetapi dapat mengalami perubahan akibat bencana alam, wabah penyakit, atau gangguan aktivitas manusia.

Perbedaan iklim dan kondisi geografis menyebabkan bioma di dunia memiliki karakteristik yang beragam.
TEXT,
                'fakta_angka' => 'Wilayah geografis luas',
                'fakta_teks' => 'Bioma terbentuk dari interaksi iklim, tanah, air, dan organisme.',
            ],

            [
                'id' => 12,
                'level_id' => 2,
                'kode' => 'BMD-02',
                'judul' => 'Jenis-Jenis Bioma di Dunia',
                'sub_judul' => 'Mengenal ragam ekosistem daratan',
                'deskripsi_singkat' => 'Mempelajari karakteristik berbagai bioma di dunia.',
                'konten' => <<<'TEXT'
Perbedaan iklim dan kondisi geografis menyebabkan terbentuknya berbagai jenis bioma di dunia. Setiap bioma memiliki ciri vegetasi dan organisme yang berbeda.

Beberapa jenis bioma yang dikenal antara lain:

1. Hutan hujan tropis
Memiliki curah hujan tinggi, vegetasi lebat, dan keanekaragaman hayati yang besar.

2. Hutan musim tropis
Memiliki perbedaan musim hujan dan kemarau yang memengaruhi kondisi vegetasinya.

3. Hutan gugur
Memiliki pepohonan yang menggugurkan daun pada musim tertentu.

4. Taiga
Didominasi tumbuhan berdaun jarum dan banyak ditemukan di wilayah beriklim dingin.

5. Tundra
Memiliki suhu sangat rendah dan vegetasi berupa lumut serta tumbuhan pendek.

6. Gurun
Memiliki curah hujan sangat rendah sehingga tumbuhan dan hewannya harus beradaptasi terhadap kekurangan air.

7. Padang rumput
Didominasi rerumputan dengan jumlah pepohonan yang relatif sedikit.
TEXT,
                'fakta_angka' => '7 jenis bioma',
                'fakta_teks' => 'Hutan tropis, hutan musim, hutan gugur, taiga, tundra, gurun, dan padang rumput.',
            ],

            [
                'id' => 13,
                'level_id' => 2,
                'kode' => 'BMD-03',
                'judul' => 'Faktor Persebaran Flora dan Fauna Dunia',
                'sub_judul' => 'Kondisi lingkungan dan kemampuan adaptasi',
                'deskripsi_singkat' => 'Menganalisis faktor yang menyebabkan persebaran makhluk hidup berbeda.',
                'konten' => <<<'TEXT'
Persebaran flora dan fauna di dunia dipengaruhi oleh kondisi lingkungan yang berbeda pada setiap wilayah. Iklim menjadi salah satu faktor dominan karena menentukan suhu, kelembapan, curah hujan, dan intensitas cahaya.

Selain iklim, kondisi tanah memengaruhi ketersediaan unsur hara bagi tumbuhan. Bentuk permukaan Bumi dan ketinggian tempat juga menyebabkan perbedaan suhu serta kondisi habitat.

Ketersediaan air menjadi faktor penting bagi kelangsungan hidup organisme. Sementara itu, hubungan antarmakhluk hidup dan aktivitas manusia dapat mengubah kondisi suatu ekosistem.

Kemampuan adaptasi turut menentukan organisme yang mampu bertahan di suatu wilayah. Contohnya, kaktus memiliki kemampuan menyimpan air sehingga dapat hidup di lingkungan gurun.
TEXT,
                'fakta_angka' => 'Faktor lingkungan',
                'fakta_teks' => 'Persebaran organisme dipengaruhi iklim, tanah, air, relief, dan faktor biotik.',
            ],

            [
                'id' => 14,
                'level_id' => 2,
                'kode' => 'BMD-04',
                'judul' => 'Zona Persebaran Fauna Dunia',
                'sub_judul' => 'Mengenal kawasan zoogeografi',
                'deskripsi_singkat' => 'Mempelajari pembagian wilayah persebaran fauna di dunia.',
                'konten' => <<<'TEXT'
Persebaran fauna dunia dapat dikelompokkan ke dalam beberapa kawasan zoogeografi. Pembagian ini menunjukkan wilayah yang memiliki karakteristik dan jenis hewan tertentu.

Enam kawasan persebaran fauna dunia meliputi:

1. Neartik, meliputi wilayah Amerika Utara.
2. Neotropik, meliputi wilayah Amerika Tengah dan Amerika Selatan.
3. Australia, meliputi Australia dan wilayah sekitarnya.
4. Oriental, meliputi kawasan Asia Selatan dan Asia Tenggara.
5. Paleartik, meliputi sebagian besar Eropa, Asia bagian utara, dan Afrika bagian utara.
6. Ethiopia, meliputi sebagian besar wilayah Afrika di selatan Gurun Sahara.

Setiap kawasan memiliki kondisi lingkungan dan keanekaragaman fauna yang berbeda. Pembagian kawasan tersebut membantu menjelaskan pola persebaran hewan di permukaan Bumi.
TEXT,
                'fakta_angka' => '6 kawasan fauna',
                'fakta_teks' => 'Neartik, Neotropik, Australia, Oriental, Paleartik, dan Ethiopia.',
            ],

            [
                'id' => 15,
                'level_id' => 2,
                'kode' => 'BMD-05',
                'judul' => 'Contoh Flora dan Fauna pada Berbagai Bioma',
                'sub_judul' => 'Mengenali kehidupan berdasarkan habitat',
                'deskripsi_singkat' => 'Menghubungkan karakteristik bioma dengan organisme yang hidup di dalamnya.',
                'konten' => <<<'TEXT'
Setiap bioma memiliki karakteristik lingkungan yang menentukan jenis flora dan fauna yang dapat hidup di dalamnya. Organisme yang tinggal di suatu bioma memiliki kemampuan menyesuaikan diri terhadap kondisi wilayah tersebut.

Pada hutan hujan tropis, vegetasi tumbuh lebat karena ketersediaan air dan curah hujan yang tinggi. Berbagai jenis pohon, tumbuhan merambat, dan tumbuhan yang menempel dapat ditemukan pada lingkungan ini.

Di wilayah gurun, tumbuhan seperti kaktus mampu bertahan dalam kondisi kekurangan air. Pada wilayah tundra, tumbuhan yang mampu bertahan umumnya berukuran pendek dan sesuai dengan suhu yang sangat dingin.

Padang rumput didominasi rerumputan dan menjadi habitat berbagai hewan pemakan tumbuhan serta pemangsanya. Contoh tersebut menunjukkan hubungan antara kondisi bioma dan karakteristik organisme yang hidup di dalamnya.
TEXT,
                'fakta_angka' => 'Adaptasi organisme',
                'fakta_teks' => 'Karakteristik flora dan fauna berkaitan dengan kondisi habitatnya.',
            ],

            // =====================================================
            // LEVEL 3 - PERSEBARAN FLORA DAN FAUNA INDONESIA
            // ID: 2, 3, 4, 5, 6
            // =====================================================

            [
                'id' => 2,
                'level_id' => 3,
                'kode' => 'FFI-01',
                'judul' => 'Karakteristik Flora dan Fauna Indonesia',
                'sub_judul' => 'Mengenal kekayaan keanekaragaman hayati Nusantara',
                'deskripsi_singkat' => 'Memahami karakteristik dan pembagian wilayah persebaran flora-fauna Indonesia.',
                'konten' => <<<'TEXT'
Indonesia memiliki keanekaragaman flora dan fauna yang tinggi karena kondisi geografis dan lingkungannya beragam. Iklim tropis, curah hujan, suhu, serta kondisi wilayah turut memengaruhi jenis organisme yang hidup di Indonesia.

Persebaran fauna Indonesia secara umum dibagi menjadi tiga kawasan, yaitu:

1. Kawasan Asiatis atau Indonesia bagian barat.
2. Kawasan Peralihan atau Indonesia bagian tengah.
3. Kawasan Australis atau Indonesia bagian timur.

Pembagian tersebut berkaitan dengan perbedaan karakteristik fauna di setiap wilayah. Garis Wallace menjadi batas antara kawasan Asiatis dan kawasan Peralihan, sedangkan garis Weber digunakan untuk menunjukkan batas kawasan Peralihan dan kawasan Australis.

Keanekaragaman flora dan fauna tersebut merupakan kekayaan alam yang perlu dijaga melalui pemanfaatan dan konservasi yang bertanggung jawab.
TEXT,
                'fakta_angka' => '3 kawasan persebaran',
                'fakta_teks' => 'Asiatis, Peralihan, dan Australis.',
            ],

            [
                'id' => 3,
                'level_id' => 3,
                'kode' => 'FFI-02',
                'judul' => 'Persebaran Fauna Kawasan Asiatis',
                'sub_judul' => 'Fauna Indonesia bagian barat',
                'deskripsi_singkat' => 'Mengenal wilayah dan contoh fauna bercorak Asiatis.',
                'konten' => <<<'TEXT'
Fauna kawasan Asiatis tersebar di Indonesia bagian barat, terutama Sumatera, Jawa, Kalimantan, dan Bali. Kawasan ini memiliki karakteristik fauna yang memiliki kemiripan dengan fauna di wilayah Asia.

Berbagai jenis mamalia dapat ditemukan di kawasan ini. Contohnya adalah gajah, harimau, badak, orangutan, tapir, dan berbagai jenis primata.

Selain mamalia, kawasan Asiatis juga memiliki beragam jenis burung, reptil, dan hewan lainnya. Keberadaan fauna tersebut berkaitan dengan kondisi habitat dan sejarah persebaran makhluk hidup di kawasan barat Indonesia.

Kelestarian fauna Asiatis menghadapi ancaman seperti kerusakan habitat, perburuan, dan perubahan fungsi lahan. Perlindungan habitat menjadi salah satu langkah penting untuk menjaga keberadaan satwa tersebut.
TEXT,
                'fakta_angka' => '4 wilayah utama',
                'fakta_teks' => 'Sumatera, Jawa, Kalimantan, dan Bali.',
            ],

            [
                'id' => 4,
                'level_id' => 3,
                'kode' => 'FFI-03',
                'judul' => 'Persebaran Fauna Kawasan Peralihan dan Australis',
                'sub_judul' => 'Keunikan fauna Indonesia bagian tengah dan timur',
                'deskripsi_singkat' => 'Mengenal ciri dan contoh fauna kawasan Peralihan serta Australis.',
                'konten' => <<<'TEXT'
Fauna Indonesia dibedakan menjadi kawasan Peralihan dan kawasan Australis selain kawasan Asiatis. Kedua kawasan tersebut memiliki karakteristik fauna yang berbeda.

Kawasan Peralihan meliputi Sulawesi, Nusa Tenggara, dan sebagian wilayah Maluku. Contoh faunanya adalah anoa, babirusa, komodo, tarsius, dan burung maleo.

Kawasan Australis terdapat di wilayah Indonesia bagian timur, terutama Papua dan pulau-pulau sekitarnya. Fauna yang menjadi ciri kawasan ini antara lain burung cenderawasih dan kasuari, serta berbagai jenis hewan berkantung.

Garis Wallace memisahkan kawasan Asiatis dan Peralihan. Garis Weber digunakan sebagai batas antara kawasan Peralihan dan Australis dalam pembagian persebaran fauna Indonesia.
TEXT,
                'fakta_angka' => '2 kawasan fauna',
                'fakta_teks' => 'Peralihan dan Australis memiliki karakteristik fauna yang khas.',
            ],

            [
                'id' => 5,
                'level_id' => 3,
                'kode' => 'FFI-04',
                'judul' => 'Persebaran Flora dan Tumbuhan Khas Indonesia',
                'sub_judul' => 'Keanekaragaman vegetasi di berbagai wilayah',
                'deskripsi_singkat' => 'Mempelajari persebaran vegetasi dan contoh tumbuhan khas Indonesia.',
                'konten' => <<<'TEXT'
Persebaran flora Indonesia dipengaruhi oleh kondisi iklim, terutama curah hujan dan suhu udara. Wilayah Indonesia yang beriklim tropis memiliki berbagai jenis vegetasi dengan karakteristik yang berbeda.

Kawasan Indonesia bagian barat, seperti Sumatera dan Kalimantan, banyak memiliki hutan hujan tropis. Vegetasinya didominasi pepohonan besar dengan tajuk berlapis dan kondisi yang relatif hijau sepanjang tahun. Contoh tumbuhan khas yang dikenal dari kawasan ini adalah Rafflesia arnoldii dan berbagai jenis anggrek.

Kawasan Peralihan, seperti Sulawesi dan Nusa Tenggara, memiliki kondisi iklim yang cenderung lebih kering pada wilayah tertentu. Sabana dan stepa dapat dijumpai di kawasan ini.

Perbedaan kondisi lingkungan menyebabkan jenis vegetasi yang tumbuh di setiap wilayah Indonesia tidak selalu sama.
TEXT,
                'fakta_angka' => 'Beragam vegetasi',
                'fakta_teks' => 'Curah hujan dan suhu menjadi faktor penting persebaran flora Indonesia.',
            ],

            [
                'id' => 6,
                'level_id' => 3,
                'kode' => 'FFI-05',
                'judul' => 'Kerusakan dan Konservasi Flora Fauna',
                'sub_judul' => 'Menjaga keanekaragaman hayati Indonesia',
                'deskripsi_singkat' => 'Mengenal ancaman terhadap flora-fauna dan upaya pelestariannya.',
                'konten' => <<<'TEXT'
Keanekaragaman flora dan fauna memiliki manfaat bagi kehidupan manusia, baik dari segi ekonomi, wisata, ilmu pengetahuan, sosial budaya, maupun ekologis.

Namun, keberadaan flora dan fauna dapat terancam oleh kerusakan habitat, perubahan fungsi lahan, pencemaran, dan aktivitas manusia yang tidak terkendali. Kerusakan lingkungan dapat mengganggu keseimbangan ekosistem dan mengurangi populasi organisme.

Konservasi merupakan upaya untuk menjaga kelestarian sumber daya alam dan keanekaragaman hayati. Beberapa bentuk kawasan konservasi yang dikenal antara lain:

1. Hutan lindung, kawasan yang berfungsi melindungi sistem penyangga kehidupan.
2. Cagar alam, kawasan yang memiliki kekhasan tumbuhan, satwa, dan ekosistem tertentu.
3. Suaka margasatwa, kawasan untuk melindungi satwa liar beserta habitatnya.
4. Taman nasional, kawasan pelestarian alam yang memiliki ekosistem asli dan dikelola dengan sistem zonasi.

Pelestarian juga dapat dilakukan melalui perlindungan habitat, pemanfaatan sumber daya secara bijaksana, dan keterlibatan masyarakat.
TEXT,
                'fakta_angka' => '4 bentuk kawasan',
                'fakta_teks' => 'Hutan lindung, cagar alam, suaka margasatwa, dan taman nasional.',
            ],

            // =====================================================
            // LEVEL 4 - SUMBER DAYA ALAM DAN PERSEBARANNYA
            // ID: 16, 17, 18, 19, 20
            // =====================================================

            [
                'id' => 16,
                'level_id' => 4,
                'kode' => 'SDA-01',
                'judul' => 'Pengertian dan Klasifikasi Sumber Daya Alam',
                'sub_judul' => 'Mengenal potensi kekayaan alam',
                'deskripsi_singkat' => 'Memahami pengertian dan penggolongan sumber daya alam.',
                'konten' => <<<'TEXT'
Sumber daya alam merupakan kekayaan berupa benda hidup maupun benda mati yang terdapat di alam dan dapat dimanfaatkan untuk memenuhi kebutuhan hidup manusia. Potensi sumber daya alam menunjukkan kemampuan sumber daya tersebut untuk dikembangkan bagi kelangsungan kehidupan.

Sumber daya alam dapat diklasifikasikan berdasarkan beberapa kriteria.

1. Berdasarkan sifatnya
Sumber daya alam hayati atau biotik berasal dari makhluk hidup. Sumber daya alam nonhayati atau abiotik berasal dari benda mati dan unsur fisik lingkungan.

2. Berdasarkan potensi penggunaannya
Sumber daya alam materi dimanfaatkan bentuk fisiknya, sumber daya alam energi dimanfaatkan energinya, sedangkan sumber daya alam ruang dimanfaatkan sebagai tempat atau ruang kehidupan.

3. Berdasarkan jenis dan ketersediaannya
Sumber daya alam dapat dibedakan menurut karakteristik serta kemampuan alam untuk memperbaruinya.

Penggolongan tersebut membantu manusia memahami karakteristik sumber daya alam dan menentukan cara pemanfaatannya secara tepat.
TEXT,
                'fakta_angka' => '3 potensi penggunaan',
                'fakta_teks' => 'Materi, energi, dan ruang merupakan klasifikasi berdasarkan potensi penggunaan.',
            ],

            [
                'id' => 17,
                'level_id' => 4,
                'kode' => 'SDA-02',
                'judul' => 'Potensi dan Persebaran Sumber Daya Kehutanan',
                'sub_judul' => 'Hutan sebagai kekayaan alam Indonesia',
                'deskripsi_singkat' => 'Mengenal jenis hutan, manfaat, dan persebarannya di Indonesia.',
                'konten' => <<<'TEXT'
Indonesia memiliki berbagai jenis hutan yang memberikan manfaat bagi kehidupan manusia dan lingkungan. Sumber daya kehutanan berperan dalam menyediakan hasil hutan, menjaga tata air, menjadi habitat makhluk hidup, dan menghasilkan oksigen.

Beberapa jenis hutan di Indonesia antara lain:

1. Hutan hujan tropis, memiliki vegetasi lebat dan keanekaragaman hayati tinggi.
2. Hutan musim, mengalami perubahan kondisi vegetasi sesuai pergantian musim.
3. Hutan sabana, memiliki dominasi rerumputan dengan pepohonan yang tersebar.
4. Hutan bakau atau mangrove, tumbuh di wilayah pesisir yang dipengaruhi kondisi perairan.

Persebaran jenis hutan di Indonesia tidak merata karena dipengaruhi kondisi iklim dan geografis. Setiap jenis hutan memiliki potensi dan fungsi yang berbeda.

Pemanfaatan sumber daya kehutanan perlu memperhatikan kelestarian ekosistem agar manfaatnya tetap dapat dirasakan dalam jangka panjang.
TEXT,
                'fakta_angka' => '4 jenis hutan',
                'fakta_teks' => 'Hutan hujan tropis, hutan musim, sabana, dan mangrove.',
            ],

            [
                'id' => 18,
                'level_id' => 4,
                'kode' => 'SDA-03',
                'judul' => 'Potensi dan Persebaran Sumber Daya Pertambangan',
                'sub_judul' => 'Mengenal kekayaan mineral dan energi',
                'deskripsi_singkat' => 'Mempelajari potensi bahan tambang dan persebarannya di Indonesia.',
                'konten' => <<<'TEXT'
Sumber daya pertambangan merupakan salah satu potensi sumber daya alam Indonesia. Hasil pertambangan dapat dimanfaatkan sebagai bahan baku industri, sumber energi, dan kebutuhan pembangunan.

Indonesia memiliki berbagai komoditas pertambangan yang tersebar di sejumlah wilayah. Contohnya:

1. Emas dan perak ditemukan di berbagai pulau besar Indonesia.
2. Tembaga terdapat antara lain di Papua, Jawa Barat, Sulawesi Utara, dan Sulawesi Selatan.
3. Bauksit terdapat di wilayah Kepulauan Riau, Bangka, Sumatera, dan Kalimantan.
4. Nikel terdapat di Sulawesi, Kalimantan bagian tenggara, Maluku, dan Papua.
5. Timah banyak ditemukan di Bangka Belitung dan wilayah sekitarnya.
6. Intan dikenal terdapat di Martapura, Kalimantan Selatan.
7. Pasir besi ditemukan di beberapa wilayah, antara lain Sumatera dan Nusa Tenggara.

Kegiatan pertambangan perlu dikelola dengan memperhatikan dampak lingkungan dan sosial. Pengelolaan yang bertanggung jawab diperlukan sejak tahap eksplorasi hingga pascatambang.
TEXT,
                'fakta_angka' => '7 contoh komoditas',
                'fakta_teks' => 'Emas, perak, tembaga, bauksit, nikel, timah, dan intan.',
            ],

            [
                'id' => 19,
                'level_id' => 4,
                'kode' => 'SDA-04',
                'judul' => 'Potensi dan Persebaran Sumber Daya Kelautan',
                'sub_judul' => 'Memahami kekayaan wilayah perairan Indonesia',
                'deskripsi_singkat' => 'Mengenal potensi laut dan pemanfaatannya bagi kehidupan masyarakat.',
                'konten' => <<<'TEXT'
Wilayah laut Indonesia memiliki potensi sumber daya alam yang dapat dimanfaatkan untuk memenuhi kebutuhan masyarakat. Sumber daya kelautan mencakup berbagai kekayaan hayati dan nonhayati yang terdapat di lingkungan perairan.

Potensi kelautan dapat mendukung kegiatan perikanan, budi daya perairan, transportasi laut, serta kegiatan ekonomi masyarakat pesisir. Wilayah pesisir juga memiliki ekosistem penting seperti mangrove dan terumbu karang.

Pemanfaatan sumber daya kelautan perlu memperhatikan kondisi ekosistem. Penangkapan ikan yang tidak terkendali, pencemaran, dan kerusakan habitat dapat mengurangi potensi sumber daya laut.

Pengelolaan yang bertanggung jawab dapat dilakukan melalui pemanfaatan sumber daya sesuai daya dukung lingkungan, perlindungan habitat, dan pengurangan pencemaran perairan.
TEXT,
                'fakta_angka' => 'Potensi hayati dan nonhayati',
                'fakta_teks' => 'Sumber daya kelautan mendukung perikanan dan kehidupan masyarakat pesisir.',
            ],

            [
                'id' => 20,
                'level_id' => 4,
                'kode' => 'SDA-05',
                'judul' => 'Sumber Daya Pertanian, Perkebunan, dan Pariwisata',
                'sub_judul' => 'Potensi alam untuk kegiatan ekonomi',
                'deskripsi_singkat' => 'Memahami potensi pertanian, perkebunan, dan pariwisata Indonesia.',
                'konten' => <<<'TEXT'
Sumber daya alam Indonesia juga mendukung kegiatan pertanian, perkebunan, dan pariwisata. Potensi tersebut dapat dikembangkan untuk memenuhi kebutuhan masyarakat dan meningkatkan kegiatan ekonomi.

Pertanian memanfaatkan tanah, air, iklim, dan unsur lingkungan lainnya untuk menghasilkan bahan pangan. Perkebunan mengembangkan tanaman tertentu yang memiliki nilai ekonomi, seperti komoditas perkebunan yang sesuai dengan kondisi wilayah.

Kegiatan pertanian berkelanjutan memperhatikan kesuburan tanah, keanekaragaman genetik, kualitas hasil produksi, dan pengurangan pencemaran. Upaya tersebut diperlukan agar kegiatan pertanian tetap mendukung kehidupan dalam jangka panjang.

Potensi pariwisata dapat dikelompokkan menjadi:

1. Wisata alam, memanfaatkan potensi sumber daya alam.
2. Wisata budaya, memanfaatkan kebiasaan, adat istiadat, seni, dan kebudayaan masyarakat.
3. Wisata buatan, memanfaatkan objek wisata yang dibentuk melalui aktivitas manusia.

Pengembangan seluruh potensi tersebut perlu memperhatikan kondisi lingkungan dan manfaat bagi masyarakat.
TEXT,
                'fakta_angka' => '3 jenis wisata',
                'fakta_teks' => 'Wisata alam, wisata budaya, dan wisata buatan.',
            ],

            // =====================================================
            // LEVEL 5 - PENGELOLAAN LINGKUNGAN DAN PEMBANGUNAN
            // ID: 21, 22, 23, 24, 25
            // =====================================================

            [
                'id' => 21,
                'level_id' => 5,
                'kode' => 'PL-01',
                'judul' => 'Prinsip Pengelolaan Sumber Daya Alam',
                'sub_judul' => 'Memanfaatkan kekayaan alam secara bertanggung jawab',
                'deskripsi_singkat' => 'Memahami pentingnya pengelolaan sumber daya alam secara bijaksana.',
                'konten' => <<<'TEXT'
Sumber daya alam memiliki peran penting dalam memenuhi kebutuhan hidup manusia. Pemanfaatannya perlu direncanakan dan dikelola agar tidak menimbulkan kerusakan lingkungan.

Pengelolaan sumber daya alam harus mempertimbangkan potensi, ketersediaan, kebutuhan manusia, serta kemampuan lingkungan dalam mendukung kehidupan. Pemanfaatan yang berlebihan dapat menyebabkan berkurangnya sumber daya dan terganggunya keseimbangan ekosistem.

Pengelolaan yang bertanggung jawab dapat dilakukan melalui penghematan penggunaan sumber daya, perlindungan kawasan penting, pengendalian pencemaran, dan pemulihan lingkungan yang mengalami kerusakan.

Kegiatan ekonomi seperti kehutanan, pertanian, dan pertambangan juga perlu memperhatikan dampak sosial dan lingkungan. Tujuannya agar sumber daya alam tetap memberikan manfaat bagi generasi sekarang dan mendatang.
TEXT,
                'fakta_angka' => 'Pengelolaan berkelanjutan',
                'fakta_teks' => 'Pemanfaatan SDA perlu mempertimbangkan daya dukung lingkungan.',
            ],

            [
                'id' => 22,
                'level_id' => 5,
                'kode' => 'PL-02',
                'judul' => 'Pemanfaatan Sumber Daya Alam Berkelanjutan',
                'sub_judul' => 'Menjaga manfaat alam untuk masa depan',
                'deskripsi_singkat' => 'Mempelajari pemanfaatan SDA yang memperhatikan kelestarian lingkungan.',
                'konten' => <<<'TEXT'
Pemanfaatan sumber daya alam secara berkelanjutan merupakan upaya memenuhi kebutuhan manusia dengan tetap memperhatikan kelestarian lingkungan. Penggunaan sumber daya tidak boleh mengabaikan kemampuan alam untuk mempertahankan keseimbangan ekosistem.

Dalam kegiatan pertanian, prinsip berkelanjutan dapat diterapkan melalui budi daya tanaman secara alami, pemeliharaan kesuburan tanah, dan pengurangan pencemaran akibat kegiatan produksi.

Dalam kegiatan pertambangan, pengelolaan berkelanjutan perlu memperhatikan seluruh tahapan kegiatan, mulai dari eksplorasi, eksploitasi, pengolahan, hingga pascatambang.

Pemanfaatan sumber daya secara bijaksana juga membutuhkan partisipasi masyarakat dan pihak-pihak yang berkepentingan. Setiap kegiatan perlu mempertimbangkan dampak sosial, ekonomi, kesehatan, dan lingkungan.
TEXT,
                'fakta_angka' => '4 tahapan pertambangan',
                'fakta_teks' => 'Eksplorasi, eksploitasi, pengolahan, dan pascatambang.',
            ],

            [
                'id' => 23,
                'level_id' => 5,
                'kode' => 'PL-03',
                'judul' => 'Lingkungan Hidup dan Pembangunan Berkelanjutan',
                'sub_judul' => 'Menyeimbangkan kebutuhan manusia dan alam',
                'deskripsi_singkat' => 'Memahami komponen lingkungan hidup dan pentingnya pembangunan berkelanjutan.',
                'konten' => <<<'TEXT'
Lingkungan hidup merupakan keseluruhan unsur yang berada di sekitar individu dan memengaruhi kehidupan serta perkembangannya. Lingkungan hidup tersusun atas komponen yang saling berhubungan.

Komponen lingkungan hidup dapat dibedakan menjadi:

1. Lingkungan biotik
Merupakan seluruh makhluk hidup, seperti tumbuhan, hewan, dan manusia. Berdasarkan fungsinya, komponen biotik dapat berupa produsen, konsumen, dan pengurai.

2. Lingkungan abiotik
Merupakan unsur tidak hidup yang memengaruhi kehidupan, seperti udara, tanah, air, dan sinar matahari.

3. Lingkungan sosial budaya
Merupakan lingkungan yang terbentuk dari sistem nilai, gagasan, keyakinan, norma, dan perilaku manusia dalam kehidupan bermasyarakat.

Pembangunan berkelanjutan perlu memperhatikan hubungan antara lingkungan alam dan kehidupan sosial ekonomi. Kegiatan pembangunan sebaiknya memberikan manfaat tanpa mengabaikan kelestarian lingkungan.
TEXT,
                'fakta_angka' => '3 komponen lingkungan',
                'fakta_teks' => 'Biotik, abiotik, dan sosial budaya.',
            ],

            [
                'id' => 24,
                'level_id' => 5,
                'kode' => 'PL-04',
                'judul' => 'Analisis Mengenai Dampak Lingkungan (AMDAL)',
                'sub_judul' => 'Menilai dampak kegiatan terhadap lingkungan',
                'deskripsi_singkat' => 'Memahami peran AMDAL dalam perencanaan pembangunan.',
                'konten' => <<<'TEXT'
Analisis Mengenai Dampak Lingkungan atau AMDAL merupakan kajian mengenai dampak penting suatu usaha atau kegiatan yang direncanakan terhadap lingkungan hidup. AMDAL menjadi salah satu instrumen untuk mempertimbangkan kelayakan lingkungan dalam kegiatan pembangunan.

AMDAL memiliki beberapa fungsi, antara lain:

1. Menjadi bahan bagi perencanaan pembangunan wilayah.
2. Membantu pengambilan keputusan mengenai kelayakan lingkungan suatu rencana usaha atau kegiatan.
3. Memberikan masukan untuk penyusunan desain teknis kegiatan.
4. Memberikan masukan untuk penyusunan rencana pengelolaan dan pemantauan lingkungan hidup.
5. Menjadi pedoman bagi pelaksanaan kegiatan agar memperhatikan kondisi lingkungan.

AMDAL membantu mengidentifikasi potensi dampak yang dapat muncul dari suatu kegiatan. Dampak tersebut dapat berkaitan dengan pencemaran air, pencemaran udara, kebisingan, dan perubahan kondisi lingkungan lainnya.

Melalui AMDAL, perencanaan pembangunan diharapkan dapat mempertimbangkan aspek lingkungan sejak tahap awal.
TEXT,
                'fakta_angka' => '5 fungsi AMDAL',
                'fakta_teks' => 'AMDAL mendukung perencanaan dan pengambilan keputusan pembangunan.',
            ],

            [
                'id' => 25,
                'level_id' => 5,
                'kode' => 'PL-05',
                'judul' => 'Pelestarian Lingkungan dan Upaya Konservasi',
                'sub_judul' => 'Menjaga keseimbangan ekosistem',
                'deskripsi_singkat' => 'Mengenal tindakan pelestarian dan konservasi lingkungan hidup.',
                'konten' => <<<'TEXT'
Pelestarian lingkungan merupakan upaya menjaga kualitas lingkungan agar tetap mampu mendukung kehidupan. Kegiatan manusia yang tidak memperhatikan keseimbangan alam dapat menimbulkan kerusakan ekosistem dan mengurangi keanekaragaman hayati.

Konservasi dilakukan untuk melindungi sumber daya alam dan mempertahankan keberadaan flora serta fauna. Bentuk upayanya antara lain perlindungan kawasan hutan, cagar alam, suaka margasatwa, dan taman nasional.

Selain perlindungan kawasan, pelestarian lingkungan dapat dilakukan melalui pengurangan pencemaran, pemanfaatan sumber daya secara bijaksana, rehabilitasi lingkungan yang rusak, dan peningkatan kesadaran masyarakat.

Keterlibatan masyarakat memiliki peran penting dalam menjaga kelestarian lingkungan. Tindakan sederhana seperti mengurangi sampah, menghemat air, dan menjaga habitat di sekitar tempat tinggal dapat mendukung upaya pelestarian.

Lingkungan yang terjaga akan memberikan manfaat bagi kehidupan manusia dan makhluk hidup lainnya.
TEXT,
                'fakta_angka' => 'Upaya konservasi',
                'fakta_teks' => 'Perlindungan kawasan dan keterlibatan masyarakat mendukung kelestarian lingkungan.',
            ],
        ];

        DB::transaction(function () use ($materi) {
            if (count($materi) !== 25) {
                throw new RuntimeException(
                    'Jumlah materi harus tepat 25. Proses dibatalkan.'
                );
            }

            foreach ($materi as $data) {
                $id = $data['id'];
                unset($data['id']);

                $record = Material::find($id);

                if (!$record) {
                    throw new RuntimeException(
                        "Materi dengan ID {$id} tidak ditemukan. Proses dibatalkan."
                    );
                }

                // Mengosongkan gambar lama agar ilustrasi lahan basah
                // tidak muncul pada materi Geografi yang baru.
                $data['gambar'] = null;
                $data['gambar_caption'] = null;
                $data['gambar_sumber'] = null;

                $record->fill($data);
                $record->save();
            }
        });

        $this->command->info(
            'Berhasil memperbarui 25 materi Geografi kelas XI tanpa membuat ID baru.'
        );
    }
}
