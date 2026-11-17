
@extends('layouts.app')

@section('content')

<div class="about-page">

    <!-- HERO SECTION -->
    <section class="about-hero">
        <div class="about-hero-content">
            <span class="about-label">WETLAND LEARNING PLATFORM</span>

            <h1>
                Menjelajahi Keajaiban
                <span>Ekosistem Lahan Basah</span>
            </h1>

            <p>
                SIFARA merupakan media pembelajaran interaktif
                berbasis website yang dirancang untuk membantu
                siswa mengenal, memahami, dan mengeksplorasi
                keanekaragaman ekosistem lahan basah melalui
                pengalaman belajar digital.
            </p>

            <a href="{{ route('dashboard') }}" class="about-button">
                Mulai Belajar <span>→</span>
            </a>
        </div>

        <div class="about-hero-decoration">
            <span>🌿</span>
            <span>🍃</span>
            <span>🌱</span>
        </div>
    </section>


    <!-- ABOUT SECTION -->
    <section class="about-section">
        <div class="about-heading">
            <span class="about-label">ABOUT SIFARA</span>
            <h2>Tentang SIFARA</h2>
            <p>
                Mengenal lebih dekat media pembelajaran
                ekosistem lahan basah.
            </p>
        </div>

        <div class="about-description">
            <div class="about-icon">🌏</div>

            <div>
                <h3>Belajar Mengenal Lahan Basah</h3>

                <p>
                    SIFARA dikembangkan sebagai media pembelajaran
                    interaktif berbasis website yang ditujukan
                    untuk siswa SMP kelas VII. Platform ini
                    menyajikan pembelajaran mengenai ekosistem
                    lahan basah, mulai dari konsep dan tipologi
                    lahan basah, ekosistem rawa pasang surut,
                    rawa lebak, rawa gambut, hingga lahan mangrove.
                </p>

                <p>
                    Melalui penyajian materi, permainan edukatif,
                    dan kuis interaktif, siswa dapat mempelajari
                    karakteristik setiap ekosistem serta mengenali
                    keanekaragaman hayati yang terdapat di dalamnya.
                    SIFARA diharapkan dapat memberikan pengalaman
                    belajar yang lebih menarik, mudah dipahami,
                    dan mendorong kepedulian terhadap kelestarian
                    lingkungan lahan basah.
                </p>
            </div>
        </div>
    </section>


    <!-- OBJECTIVES SECTION -->
    <section class="about-objectives">
        <div class="about-heading">
            <span class="about-label">LEARNING OBJECTIVES</span>
            <h2>Tujuan Pembelajaran</h2>
            <p>
                Tujuan yang ingin dicapai melalui penggunaan
                media pembelajaran SIFARA.
            </p>
        </div>

        <div class="objective-grid">

            <div class="objective-card">
                <span class="objective-number">01</span>
                <div class="objective-icon">📖</div>
                <h3>Memahami Konsep</h3>
                <p>
                    Mengenal pengertian, karakteristik, dan
                    tipologi ekosistem lahan basah.
                </p>
            </div>

            <div class="objective-card">
                <span class="objective-number">02</span>
                <div class="objective-icon">🌳</div>
                <h3>Mengenali Ekosistem</h3>
                <p>
                    Memahami berbagai jenis ekosistem lahan basah,
                    seperti rawa pasang surut, rawa lebak,
                    rawa gambut, dan mangrove.
                </p>
            </div>

            <div class="objective-card">
                <span class="objective-number">03</span>
                <div class="objective-icon">🦋</div>
                <h3>Mengenal Keanekaragaman Hayati</h3>
                <p>
                    Mengidentifikasi flora dan fauna yang hidup
                    serta beradaptasi di lingkungan lahan basah.
                </p>
            </div>

            <div class="objective-card">
                <span class="objective-number">04</span>
                <div class="objective-icon">🌱</div>
                <h3>Menumbuhkan Kepedulian</h3>
                <p>
                    Meningkatkan kesadaran mengenai pentingnya
                    menjaga dan melestarikan ekosistem lahan basah.
                </p>
            </div>

        </div>
    </section>


    <!-- DEVELOPER SECTION -->
    <section class="about-developers">

        <div class="about-heading">
            <span class="about-label">OUR DEVELOPMENT TEAM</span>
            <h2>Tim Pengembang</h2>
            <p>
                SIFARA dikembangkan sebagai media pembelajaran
                interaktif berbasis website oleh mahasiswa
                Program Studi Pendidikan Komputer.
            </p>
        </div>

        <div class="developer-grid">

            <div class="developer-card">
                <div class="developer-avatar">🌿</div>
                <span class="developer-number">DEVELOPER 01</span>

                <h3>Rizqa Aulia Faiha</h3>

                <p>Program Studi Pendidikan Komputer</p>
            </div>

            <div class="developer-card">
                <div class="developer-avatar">🍃</div>
                <span class="developer-number">DEVELOPER 02</span>

                <h3>Siti Noor Hayati</h3>

                <p>Program Studi Pendidikan Komputer</p>
            </div>

        </div>


        <!-- DOSEN PENGAMPU -->
        <div class="supervisor-card">

            <div class="supervisor-icon">🎓</div>

            <span class="developer-number">
                DOSEN PENGAMPU
            </span>

            <h3>Prof. Dr. Deasy Arisanty, M.Sc.</h3>

            <p>
                Dosen Pengampu
            </p>

        </div>


    </section>


    <!-- REFERENCES SECTION -->
    <section class="about-references">

        <div class="about-heading">
            <span class="about-label">LEARNING RESOURCES</span>
            <h2>Daftar Pustaka</h2>
            <p>
                Referensi buku, dokumen, dan sumber informasi
                yang berkaitan dengan pembelajaran ekosistem
                lahan basah.
            </p>
        </div>


        <div class="reference-list">

            <!-- REFERENCE 1 -->
            <div class="reference-item">
                <span class="reference-index">01</span>

                <div class="reference-detail">
                    <h3>Pengetahuan Lingkungan Lahan Basah</h3>

                    <p>
                        Komari, N., Haryanti, N. H., Kadarsah, A.,
                        & Afandi, P. (2026).
                        <i>
                            Buku Ajar Pengetahuan Lingkungan
                            Lahan Basah (Wetlands): Indonesia.
                        </i>
                        Lambung Mangkurat University Press.
                    </p>

                    <a href="https://bukuvirtual.ulm.ac.id/omp/index.php/lmupress/catalog/book/416"
                       target="_blank"
                       rel="noopener noreferrer">
                        Lihat sumber buku →
                    </a>
                </div>
            </div>


            <!-- REFERENCE 2 -->
            <div class="reference-item">
                <span class="reference-index">02</span>

                <div class="reference-detail">
                    <h3>Pedoman Teknis Pengembangan Lahan Rawa</h3>

                    <p>
                        Kementerian Pertanian Republik Indonesia.
                        (2017).
                        <i>
                            Pedoman Teknis Pengembangan Pemanfaatan
                            Lahan Rawa/Gambut Terpadu TA. 2017.
                        </i>
                        Direktorat Jenderal Prasarana dan
                        Sarana Pertanian.
                    </p>

                    <a href="https://psp.pertanian.go.id/storage/158/PEDOMAN_TEKNIS_PENGEMBANGAN_PEMANFAATAN_LAHAN_RAWA_TERPADU_2017.pdf"
                       target="_blank"
                       rel="noopener noreferrer">
                        Baca dokumen PDF →
                    </a>
                </div>
            </div>


            <!-- REFERENCE 3 -->
            <div class="reference-item">
                <span class="reference-index">03</span>

                <div class="reference-detail">
                    <h3>Perlindungan dan Pengelolaan Ekosistem Gambut</h3>

                    <p>
                        Suryadiputera, N. (2022).
                        <i>
                            Bahan Pelatihan untuk Penguatan Kapasitas
                            Parapihak dalam Upaya Perlindungan dan
                            Pengelolaan Gambut.
                        </i>
                        Deutsche Gesellschaft für Internationale
                        Zusammenarbeit (GIZ) GmbH, PROPEAT.
                    </p>

                    <a href="https://pkgppkl.menlhk.go.id/v0/wp-content/uploads/2023/08/06-Bahan-Pelatihan-Pengelolaan-Gambut-Berkelanjutan.pdf"
                       target="_blank"
                       rel="noopener noreferrer">
                        Baca dokumen PDF →
                    </a>
                </div>
            </div>


            <!-- REFERENCE 4 -->
            <div class="reference-item">
                <span class="reference-index">04</span>

                <div class="reference-detail">
                    <h3>Ekosistem Gambut dan Mangrove Indonesia</h3>

                    <p>
                        Lusiana, S., & Rembonita, T. (2023).
                        <i>
                            Mengalunkan Kisah Lahan Basah Gambut
                            dan Mangrove.
                        </i>
                        Yayasan Konservasi Cakrawala Indonesia.
                        ISBN 978-623-10-3576-9.
                    </p>

                    <a href="https://konservasi-id.org/wp-content/uploads/2025/03/BUKUMENGALUNKANKISAHLAHANBASAH_ID.pdf"
                       target="_blank"
                       rel="noopener noreferrer">
                        Baca dokumen PDF →
                    </a>
                </div>
            </div>


            <!-- REFERENCE 5 -->
            <div class="reference-item">
                <span class="reference-index">05</span>

                <div class="reference-detail">
                    <h3>The Importance of Wetlands</h3>

                    <p>
                        Convention on Wetlands. (n.d.).
                        <i>The Importance of Wetlands.</i>
                        Ramsar Convention Secretariat.
                    </p>

                    <a href="https://www.ramsar.org/about/our-mission/importance-wetlands"
                       target="_blank"
                       rel="noopener noreferrer">
                        Kunjungi sumber resmi →
                    </a>
                </div>
            </div>


            <!-- REFERENCE 6 -->
            <div class="reference-item">
                <span class="reference-index">06</span>

                <div class="reference-detail">
                    <h3>Classification System for Wetland Types</h3>

                    <p>
                        Convention on Wetlands. (n.d.).
                        <i>
                            Convention on Wetlands' Classification
                            System for Wetland Types.
                        </i>
                        Ramsar Convention Secretariat.
                    </p>

                    <a href="https://www.ramsar.org/convention-wetlands-classification-system-wetland-types"
                       target="_blank"
                       rel="noopener noreferrer">
                        Kunjungi sumber resmi →
                    </a>
                </div>
            </div>

        </div>


        <div class="reference-note">
            <strong>Catatan Referensi</strong>

            <p>
                Referensi di atas merupakan sumber awal yang
                relevan untuk mendukung pembelajaran ekosistem
                lahan basah. Penggunaan setiap sumber perlu
                disesuaikan dengan materi dan informasi yang
                benar-benar dikutip atau diadaptasi dalam SIFARA.
            </p>
        </div>

    </section>


    <!-- CLOSING SECTION -->
    <section class="about-closing">

        <span>🌿</span>

        <h2>Mengenal Alam, Menjaga Masa Depan</h2>

        <p>
            Mari belajar memahami ekosistem lahan basah
            dan meningkatkan kepedulian terhadap lingkungan.
        </p>

        <a href="{{ route('dashboard') }}" class="about-button">
            Jelajahi SIFARA →
        </a>

    </section>

</div>


<style>

/* GENERAL */
.about-page {
    background: #FAF9F4;
    color: #263F32;
    padding-bottom: 50px;
}

.about-label {
    display: inline-block;
    color: #64816A;
    font-size: .75rem;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 15px;
}


/* HERO */
.about-hero {
    position: relative;
    overflow: hidden;
    min-height: 400px;
    padding: 85px 9%;
    display: flex;
    align-items: center;
    background: linear-gradient(120deg, #E8F0E5, #F5F2E7);
}

.about-hero-content {
    max-width: 720px;
    position: relative;
    z-index: 2;
}

.about-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.3rem, 5vw, 3.6rem);
    line-height: 1.2;
    color: #244832;
    margin-bottom: 22px;
}

.about-hero h1 span {
    display: block;
    color: #78966C;
}

.about-hero p {
    max-width: 620px;
    color: #596D5C;
    line-height: 1.9;
}

.about-hero-decoration {
    position: absolute;
    right: 9%;
    top: 20%;
    font-size: 5rem;
    opacity: .65;
    display: flex;
    flex-direction: column;
    transform: rotate(-12deg);
}

.about-button {
    display: inline-block;
    margin-top: 18px;
    padding: 13px 24px;
    border-radius: 10px;
    background: #244832;
    color: white;
    text-decoration: none;
    font-weight: 800;
    transition: .2s;
}

.about-button:hover {
    background: #527858;
    color: white;
    transform: translateY(-2px);
}


/* SECTION HEADING */
.about-section,
.about-objectives,
.about-developers,
.about-references {
    padding: 75px 9%;
}

.about-heading {
    text-align: center;
    max-width: 650px;
    margin: 0 auto 40px;
}

.about-heading h2 {
    font-family: 'Playfair Display', serif;
    color: #244832;
    font-size: 2.3rem;
    margin-bottom: 12px;
}

.about-heading p {
    color: #718073;
    line-height: 1.7;
}


/* ABOUT DESCRIPTION */
.about-description {
    max-width: 950px;
    margin: auto;
    display: flex;
    gap: 25px;
    padding: 35px;
    border-radius: 20px;
    background: white;
    box-shadow: 0 8px 30px rgba(30,60,40,.06);
}

.about-icon {
    flex-shrink: 0;
    width: 65px;
    height: 65px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #E8F0E5;
    font-size: 2rem;
}

.about-description h3 {
    font-family: 'Playfair Display', serif;
    color: #31583D;
    font-size: 1.4rem;
}

.about-description p {
    color: #66766A;
    line-height: 1.9;
    text-align: justify;
}


/* OBJECTIVES */
.about-objectives {
    background: #EDF2E9;
}

.objective-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.objective-card {
    padding: 28px 22px;
    background: white;
    border-radius: 17px;
    box-shadow: 0 5px 20px rgba(30,60,40,.04);
}

.objective-number {
    color: #A3B69C;
    font-weight: 900;
    font-size: .8rem;
}

.objective-icon {
    font-size: 2rem;
    margin: 17px 0;
}

.objective-card h3 {
    color: #31583D;
    font-size: 1.05rem;
    margin-bottom: 12px;
}

.objective-card p {
    color: #718073;
    font-size: .9rem;
    line-height: 1.8;
}


/* DEVELOPERS */
.developer-grid {
    max-width: 750px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.developer-card {
    text-align: center;
    background: white;
    padding: 35px 20px;
    border-radius: 20px;
    border: 1px solid #E6EDE3;
    box-shadow: 0 8px 25px rgba(30,60,40,.05);
}

.developer-avatar {
    width: 85px;
    height: 85px;
    margin: 0 auto 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #E8F0E5;
    font-size: 2.5rem;
}

.developer-number {
    color: #81977B;
    font-size: .7rem;
    letter-spacing: 1.5px;
    font-weight: 800;
}

.developer-card h3 {
    color: #31583D;
    font-family: 'Playfair Display', serif;
    margin: 12px 0;
    font-size: 1.35rem;
}

.developer-card p {
    color: #788679;
    font-size: .9rem;
}


/* DOSEN PENGAMPU */
.supervisor-card {
    max-width: 550px;
    margin: 35px auto 0;
    padding: 30px;
    text-align: center;
    background: #E8F0E5;
    border: 1px solid #D5E3D1;
    border-radius: 20px;
}

.supervisor-icon {
    font-size: 2.5rem;
    margin: 15px 0;
}

.supervisor-card h3 {
    color: #31583D;
    font-family: 'Playfair Display', serif;
    font-size: 1.35rem;
    margin-bottom: 10px;
}

.supervisor-card p {
    color: #527858;
    font-weight: 800;
    margin-bottom: 0;
}


/* INSTITUTION */
.developer-institution {
    margin: 30px auto 0;
    text-align: center;
    display: flex;
    flex-direction: column;
    gap: 7px;
    color: #718073;
    font-size: .9rem;
}

.developer-institution strong {
    color: #31583D;
    font-size: 1.05rem;
}


/* REFERENCES */
.about-references {
    background: #EDF2E9;
}

.reference-list {
    max-width: 900px;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.reference-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 25px;
    background: white;
    border: 1px solid #E4EBDD;
    border-radius: 15px;
    box-shadow: 0 5px 18px rgba(30,60,40,.04);
}

.reference-index {
    flex-shrink: 0;
    width: 38px;
    height: 38px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    background: #E8F0E5;
    color: #31583D;
    font-weight: 800;
}

.reference-detail {
    flex: 1;
}

.reference-detail h3 {
    color: #31583D;
    font-size: 1.05rem;
    margin-bottom: 10px;
}

.reference-detail p {
    color: #718073;
    line-height: 1.8;
    font-size: .9rem;
}

.reference-detail a {
    color: #527858;
    text-decoration: none;
    font-weight: 800;
    font-size: .88rem;
}

.reference-detail a:hover {
    color: #244832;
    text-decoration: underline;
}

.reference-note {
    max-width: 900px;
    margin: 25px auto 0;
    padding: 20px;
    border-radius: 12px;
    background: #F3F5ED;
    color: #60745E;
    font-size: .9rem;
    line-height: 1.8;
}

.reference-note strong {
    display: block;
    margin-bottom: 5px;
}

.reference-note p {
    margin-bottom: 0;
}


/* CLOSING */
.about-closing {
    margin: 30px 9% 0;
    padding: 55px 25px;
    border-radius: 22px;
    text-align: center;
    background: #244832;
    color: white;
}

.about-closing > span {
    font-size: 2.5rem;
}

.about-closing h2 {
    font-family: 'Playfair Display', serif;
    margin: 15px 0;
    font-size: 2rem;
}

.about-closing p {
    color: #D4E0D3;
    line-height: 1.7;
}

.about-closing .about-button {
    background: #EFC94C;
    color: #244832;
}


/* RESPONSIVE */
@media(max-width: 900px) {
    .objective-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .about-hero-decoration {
        opacity: .2;
        right: 3%;
    }
}

@media(max-width: 600px) {

    .about-hero {
        padding: 65px 7%;
    }

    .about-section,
    .about-objectives,
    .about-developers,
    .about-references {
        padding: 55px 7%;
    }

    .about-description {
        flex-direction: column;
        padding: 25px;
    }

    .objective-grid,
    .developer-grid {
        grid-template-columns: 1fr;
    }

    .about-heading h2 {
        font-size: 1.9rem;
    }

    .about-closing {
        margin: 20px 5% 0;
    }

    .about-closing h2 {
        font-size: 1.6rem;
    }

    .reference-item {
        gap: 12px;
        padding: 18px;
    }

    .reference-detail h3 {
        font-size: .98rem;
    }

    .supervisor-card {
        padding: 25px 18px;
    }
}

</style>

@endsection
