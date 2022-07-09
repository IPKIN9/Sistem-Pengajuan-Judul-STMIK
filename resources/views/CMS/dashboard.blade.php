@extends('Layout.TemplateDash')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/stmik.jpg') }}" alt="Los Angeles" style="width: 100%; height:50%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/stmik1.jpg') }}" alt="Los Angeles" style="width: 100%;">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <div class="accordion mt-3" id="accordionExample">
            <div class="card accordion-item active">
                <h2 class="accordion-header" id="headingOne">
                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                        data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                        Sejarah
                    </button>
                </h2>

                <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample"
                    style="">
                    <div class="accordion-body pull-right" style="text-align: justify; text-indent: 0.5in;">
                        STMIK Adhi Guna mempunyai sejarah perjalanan yang panjang. Pada tahun 1999, diawali dengan
                        pendirian sebuah lembaga kursus komputer yang didirikan oleh Alm. Bapak Katimin Nirboyo, SE,MM
                        dengan nama Lembaga Pendidikan dan Pembinaan Manajemen (LPPM) Adhi Guna dengan membukan dua
                        jurusan yaitu Jurusan Teknik Komputer dan Komputer Akuntansi dan yang berlokasi di kota Palu.
                        Karena kegigihannya dalam membuka dan menciptakan peluang pasar serta ketahanannya dalam
                        menghadapi berbagai rintangan, LPPM Adhi Guna berhasil tumbuh dan berkembang di kota di Palu.
                        <br>

                        <p style="text-align: justify; text-indent: 0.5in;">
                            Kemudia pada tahun 2001 dari LPPM Adhi Guna berubah status menjadi Sekolah Tinggi Manajemen
                            Informatika dan Komputer (STMIK) Adhi Guna yang mendapatkan status Terdaftar berdasarkan
                            Surat
                            Keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia No. 16/D/0/2001 tanggal 14
                            Pebruari 2001 tentang Pemberian Izin Penyelenggaraan Program-program Studi dan Pendirian
                            Sekolah
                            Tinggi Manajemen Informatika dan Komputer (STMIK) Adhi Guna, dengan menyelenggarakan dua
                            program
                            studi, yaitu Sistem Informasi (S1) dan Program Studi Teknik Informatika (S1). Berdasarkan
                            atas
                            dasar Akte Notaris Anand Umar Adnan, SH momor 16 tanggal 17 Maret 1999.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                        data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                        Visi
                    </button>
                </h2>
                <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        Menjadi STMIK Adhi Guna Terdepan Dalam Mutu dan Unggul Dalam Penerapan Rekayasa Sistem dan
                        Komputer Jaringan Berlandaskan Spirit Inovasi di kawasan Timur Indonesia pada Tahun 2025.
                    </div>
                </div>
            </div>
            <div class="card accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                        data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                        Misi
                    </button>
                </h2>
                <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        STMIK ADHI GUNA memiliki misi sebagai berikut :
                        <ol type="1">
                            <li>Menyelenggarakan pendidikan akademik profesional untuk menghasilkan lulusan yang
                                berkualitas serta memiliki keahlian akademik dan kompetensi di bidang rekayasa sistem
                                dan komputer jaringan.</li>
                            <li>Menyelenggarakan penelitian dan pengembangan ilmu pengetahuan, teknologi, dan seni yang
                                berbasis teknologi informasi dan komunikasi.</li>
                            <li>Menyelenggarakan pengabdian kepada masyarakat dan penerapan Teknologi Informasi dan
                                Komunikasi sesuai dengan bidang keahlian.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection