<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .Kop {
            border: 2px solid #965e15;
            background-color: maroon;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        .box {
            font-size: small;
            align-items: center;
            margin: 0.1em;
            padding: 0.1em;
            text-align: center;
            line-height: 40px;
            color: white;
        }

        .box img {
            width: 50px;
            height: 50px;
        }

        .container {
            padding: 0, 20px;
            text-align: start;
            width: 100%;
            font-size: 11px;
        }

        .identitas {
            text-align: start;
            width: 100%;
        }

        .box-1,
        .box-2 {
            padding-left: 10px;
            font-size: 10px;
            align-items: center;
            text-align: start;
            width: 50%;
            /* Lebar kolom sama untuk kedua tabel */
        }

        .identitas .box-1 {
            padding-top: 20px;
        }

        .identitas {
            width: 100%;
            table-layout: fixed;
            /* Tetapkan lebar tabel */
            border-collapse: collapse;
        }

        .ttd {
            width: 100%;
            table-layout: fixed;
            /* Tetapkan lebar tabel */
            border-collapse: collapse;
        }

        .ttd-1 {
            padding-left: 20px;
            padding-bottom: 30px;
            font-size: 10px;
            align-items: center;
            width: 65%;
            /* Lebar kolom sama untuk kedua tabel */
        }

        .ttd-2 {
            font-size: 10px;
        }

        .informasiTambahan {
            width: 100%;
            table-layout: fixed;
            /* Tetapkan lebar tabel */
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table class="Kop">
        <tr>
            <td class="box"><img src="{{public_path('img/logo.png')}}" alt="" height="50px"></td>
            <td class="box" style="font-size: medium; font-weight: bold;">SURAT KETERANGAN PENDAMPING IJAZAH <br> FAKULTAS TEKNIK <br> UNIVERSITAS SULAWESI BARAT</td>
            <td class="box qr-code"><img src="{{public_path('img/kodeQR/qr_code.png')}}" alt=""></td>
        </tr>
    </table>
    <div class="container">
        <p>
            Surat Keterangan Pendamping Ijazah (SKPI) sebagai pelengkap ijazah yang menerangkan capaian pembelajaran dan prestasi dari pemegang ijazah selama masa studi
            The Diploma Supplement is the certificate complement which provide the graduate learning outcome include the attitude, knowledge, and general and specific skills of
            graduate competency standards
        </p>

        1. IDENTITAS PEMEGANG SURAT KETERANGAN PENDAMPING IJAZAH

        <table class="identitas">
            <tr>
                <td class="box-1">
                    NAMA LENGKAP
                </td>
                <td class="box-1">
                    TAHUN LULUS
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    {{$user->biodata->nama}}
                </td>
                <td class="box-2">
                    {{$user->biodata->tahun_lulus}}
                </td>
            </tr>
            <tr>
                <td class="box-1">
                    TEMPAT, TANGGAL LAHIR
                </td>
                <td class="box-1">
                    NOMOR SERI IJAZAH
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    {{$user->biodata->tempat_lahir}},
                    {{$user->biodata->tanggal_lahir}}
                </td>
                <td class="box-2">
                    {{$user->biodata->no_ijazah}}
                </td>
            </tr>
            <tr>
                <td class="box-1">
                    GELAR YANG DIPEROLEH
                </td>
                <td class="box-1">
                    TAHUN MASUK
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    {{$user->biodata->gelar}}
                </td>
                <td class="box-2">
                    {{$user->biodata->tahun_masuk}}
                </td>
            </tr>
        </table>
        <hr>
        2. IDENTITAS PENYELENGGARA PROGRAM PENDIDIKAN
        <table class="identitas">
            <tr>
                <td class="box-1">
                    SK PENDIRIAN PERGURUAN TINGGi </td>
                <td class="box-1">
                    PERSYARATAN PENERIMAAN
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    Nomor: 229/D/0/2007
                </td>
                <td class="box-2">
                    LULUS PENDIDIKAN MENENGAH ATASATAU SEDERAJAT
                </td>
            </tr>
            <tr>
                <td class="box-1">
                    PROGRAM STUDI DAN AKREDITASI
                </td>
                <td class="box-1">
                    BAHASA PENGANTAR DALAM PERKULIAHAN
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    TEKNIK INFORMATIKA
                </td>
                <td class="box-2">
                    INDONESIA
                </td>
            </tr>
            <tr>
                <td class="box-1">
                    JENIS PENDIDIKAN
                </td>
                <td class="box-1">
                    SISTEM PENILAIAN
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    AKADEMIK DAN SARJANA
                </td>
                <td class="box-2">
                    Skala 1-4; A=4, B=3, C=2, D=1
                </td>
            </tr>
            <tr>
                <td class="box-1">
                    PROGRAM PENDIDIKAN
                </td>
                <td class="box-1">
                    LAMA STUDI REGULER
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    ST
                </td>
                <td class="box-2">
                    8 SEMESTER
                </td>
            </tr>
            <tr>
                <td class="box-1">
                    JENJANG KUALIFIKASI SESUAI KKNI
                </td>
                <td class="box-1">
                    JENIS DAN JENJANG STUDI LANJUTAN
                </td>
            </tr>
            <tr>
                <td class="box-2">
                    TINGKAT 6
                </td>
                <td class="box-2">
                    PROGRAM MAGISTER DAN DOKTORA
                </td>
            </tr>
        </table>
        <hr>
        3. KUALIFIKASI DAN HASIL CAPAIAN PEMBELAJARAN
        <br>
        <br>
        A. CAPAIAN PEMBELAJARAN
        <br>
        <br>
        PENGUASAAN PENGETAHUAN

        <ol>
            <li>
                Mampu memahami prinsip-prinsip dasar dalam pengembangan perangkat lunak dan sistem komputer sesuai dengan standar dan praktik terkini.
            </li>
            <li>
                Mampu mengambil keputusan yang tepat berdasarkan analisis informasi dan data, serta mampu merancang solusi perangkat lunak dalam berbagai konteks, baik secara individu maupun dalam tim.
            </li>
            <li>
                Mampu berkolaborasi dalam tim pengembangan perangkat lunak, mengintegrasikan prinsip-prinsip rekayasa perangkat lunak dengan kebutuhan pengguna, dan beradaptasi terhadap perkembangan teknologi informatika.
            </li>
            <li>
                Mampu memanfaatkan teknologi komputer dan sistem informatika untuk meningkatkan keterampilan dalam analisis data, pengembangan perangkat lunak, dan pemecahan masalah teknis.
            </li>
            <li>
                Menguasai metode matematis, probabilitas, teknik statistik, dan algoritma serta mampu mengaplikasikannya dalam pengembangan solusi teknologi informatika.
            </li>
        </ol>
        SIKAP DAN TATA NILAI
        <ol>
            <li>
                Bertaqwa kepada Tuhan Yang Maha Esa.
            </li>
            <li>
                Memiliki moral, etika dan kepribadian yang baik di dalam menyelesaikan tugasnya.
            </li>
            <li>

                Berperan sebagai warga negara yang bangga dan cinta tanah air serta mendukung
                perdamaian dunia.
            </li>
            <li>
                Mampu bekerja sama dan memiliki kepekaan sosial dan kepedulian yang tinggi terhadap
                masyarakat dan lingkungannya.
            </li>
            <li>
                Menghargai keanekaragaman budaya, pandangan, kepercayaan, dan agama serta
                pendapat/temuan original orang lain.
            </li>
            <li>
                Menjunjung tinggi penegakan hukum serta memiliki semangat untuk mendahulukan
                kepentingan bangsa serta masyarakat luas.
            </li>
            <li>
                Mampu menginternalisasi nilai dan norma akademik yang benar terkait dengan
                kejujuran, etika, atribusi, hakcipta, kerahasiaan dan kepemilikan data
            </li>
            <li>
                Mampu menginternalisasi semangat kewirausahaan
            </li>
        </ol>
        KETRAMPILAN UMUM
        <ol>
            <li>
                Mampu merencanakan, merancang, melaksanakan, mengoperasikan, memelihara dan
                membongkar bangunan teknik sipil dengan mempertimbangkan aspek keselamatan,
                kesehatan kerja dan berwawasan lingkungan,
            </li>
            <li>
                Menghasilkan karya dan penemuan baru bidang teknik sipil yang bermanfaat bagi
                peningkatan pendapatan dan kesejahteraan masyarakat.
            </li>
        </ol>
        <div class="test" style="padding-top: 20px;">
            KETRAMPILAN KHUSUS
        </div>
        <br>
        Mampu mengelola proyek secara profesional dan bertanggung jawab
        <hr>

        <div class="title" style="padding-top: 20px;">
            B. INFORMASI TAMBAHAN
        </div>
        <br>
        <?php
        // Kelompokkan data sesuai dengan kategorinya
        $kategoriPelatihan = [];
        $kategoriPenhargaan = [];
        $kategoriOrganisasi = [];
        $kategoriMagang = [];
        $kategoriSeminar = [];
        $kategoriSkripsi = [];

        foreach ($buktis as $bukti) {
            switch ($bukti->kategori) {
                case 'Pelatihan':
                    $kategoriPelatihan[] = $bukti->nama_prestasi;
                    break;
                case 'Penhargaan':
                    $kategoriPenhargaan[] = $bukti->nama_prestasi;
                    break;
                case 'organisasi':
                    $kategoriOrganisasi[] = $bukti->nama_prestasi;
                    break;
                case 'magang':
                    $kategoriMagang[] = $bukti->nama_prestasi;
                    break;
                case 'seminar':
                    $kategoriSeminar[] = $bukti->nama_prestasi;
                    break;
                case 'skripsi':
                    $kategoriSkripsi[] = $bukti->nama_prestasi;
                    break;
            }
        }

        ?>
        <table class="informasiTambahan">
            <tr>
                <td class="box-1" style="padding-bottom: 10px;">
                    PELATIHAN
                </td>
                <td class="box-1" style="padding-bottom: 10px;">
                    PENHARGAAN
                </td>
            </tr>
            @foreach ($kategoriPelatihan as $index => $namaPrestasi)
            <tr>
                <td class="box-2" style="padding-bottom: 10px;">
                    {{$namaPrestasi}}
                </td>
                <td class="box-2" style="padding-bottom: 10px;">
                    @if (isset($kategoriPenhargaan[$index]))
                    {{$kategoriPenhargaan[$index]}}
                    @endif
                </td>
            </tr>
            @endforeach

            <tr>
                <td class="box-1" style="padding-bottom: 10px;">
                    ORGANISASI
                </td>
                <td class="box-1" style="padding-bottom: 10px;">
                    MAGANG
                </td>
            </tr>
            @foreach ($kategoriOrganisasi as $index => $namaPrestasi)
            <tr>
                <td class="box-2" style="padding-bottom: 10px;">
                    {{$namaPrestasi}}
                </td>
                <td class="box-2" style="padding-bottom: 10px;">
                    @if (isset($kategoriMagang[$index]))
                    {{$kategoriMagang[$index]}}
                    @endif
                </td>
            </tr>
            @endforeach

            <tr>
                <td class="box-1" style="padding-bottom: 10px;">
                    SEMINAR
                </td>
                <td class="box-1" style="padding-bottom: 10px;">
                    SKRIPSI
                </td>
            </tr>
            @foreach ($kategoriSeminar as $index => $namaPrestasi)
            <tr>
                <td class="box-2" style="padding-bottom: 10px;">
                    {{$namaPrestasi}}
                </td>
                <td class="box-2" style="padding-bottom: 10px;">
                    @if (isset($kategoriSkripsi[$index]))
                    {{$kategoriSkripsi[$index]}}
                    @endif
                </td>
            </tr>
            @endforeach
        </table>

        <hr>
        4. INFORMASI TENTANG SISTEM PENDIDIKAN TINGGI DI INDONESIA
        <br>
        <br>
        SISTEM PENDIDIKAN TINGGI DI INDONESIA
        <br>
        <p>
            Pendidikan tinggi terdiri dari (1) pendidikan akademik yang memiliki fokus dalam penguasaan
            ilmu pengetahuan dan (2) pendidikan vokasi yang menitikberatkan pada persiapan lulusan untuk
            mengaplikasikan keahliannya.
        </p>
        <p>
            Institusi Pendidikan Tinggi yang menawarkan pendidikan akademik dan vokasi dapat dibedakan
            berdasarkan jenjang dan program studi yang ditawarkan seperti universitas, institut, sekolah tinggi,
            politeknik, akademi dan akademi komunitas.
        </p>
        <p>
            <b>
                Jenjang Pendidikan dan Syarat Belajar
            </b>
            <br>
            Institusi pendidikan tinggi menawarkan berbagai jenjang pendidikan baik berupa pendidikan
            akademis maupun pendidikan vokasi. Perguruan tinggi yang memberikan pendidikan akademis
            dapat menawarkan jenjang pendidikan Sarjana (S1), Program Profesi, Magister (S2), Program
            Spesialis (SP) dan Program Doktoral (S3). Sedangkan pendidikan vokasi menawarkan program
            Diploma I, II, II dan IV
        </p>
        <hr>
        5. KERANGKA KUALIFIKASI NASIONAL INDONESIA (KKNI)
        <br>
        <p>
            Kerangka Kualifikasi Nasional Indonesia (KKNI) adalah kerangka penjenjangan kualifikasi dan
            kompetensi tenaga kerja Indonesia yang menyandingkan, menyetarakan, dan mengintegrasikan
            sektor pendidikann di sektor pelatihan dan pengalaman kerja dalam suatu skema pengakuan
            kemampuan kerja yang disesuaikan dengan struktur di berbagai sektor pekerjaan. KKNI
            merupakan perwujudan mutu dan jati diri Bangsa Indonesia terkait dengan sistem pendidikan
            nasional, sistem pelatihan kerja nasional serta sistem penilaian kesetaraan capaian pembelajaran
            (learning outcomes) nasional, yang dimiliki Indonesia untuk menghasilkan sumberdaya manusia
            yang bermutu dan produktif.
        </p>
        <p>
            KKNI merupakan sistem yang berdiri sendiri dan merupakan jembatan antara sektor pendidikan
            dan pelatihan untuk membentuk SDM nasional berkualitas dan bersertifikat melalui skema
            pendidikan formal, non formal, in formal, pelatihan kerja atau pengalaman kerja. Jenjang
            kualifikasi adalah tingkat capaian pembelajaran yang disepakati secara nasional, disusun
            berdasarkan ukuran hasil pendidikan dan/atau pelatihan yang diperoleh melalui pendidikan
            formal, nonformal, informal, atau pengalaman kerja seperti yang ditunjukkan pada Gambar 1.
            KKNI terdiri dari 9 (sembilan) jenjang kualifikasi, dimulai dari kualifiaksi 1 sebagai kualifiaksi
            terendah hingga kualifikasi 9 sebagai kualifikasi tertinggi.
        </p>
        <hr>
        6. PENGESAHAN SKPI
        <br>
        <br>
        <table class="ttd">
            <tr>
                <td class="ttd-1">

                </td>
                <td class="ttd-2" style="padding-bottom: 70px;">
                    Majene,
                </td>
            </tr>
            <tr>
                <td class="ttd-1">

                </td>
                <td class="ttd-2">
                    <hr style="width: 80%; 
            text-align: start;">
                    Dekan Fakultas : Dr.Ir. Hafsah Nirwana, M.T.
                    <br>
                    NIP : 19640405 199003 2 002
                </td>
            </tr>
        </table>

    </div>

</body>

tml