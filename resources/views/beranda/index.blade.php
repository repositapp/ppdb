@extends('layouts.first')
@section('title')
    Beranda
@endsection
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 text-center">
                        <h2>SMAN 2 BATAUGA</h2>
                        <p>SMA Negeri 2 Batauga berkomitmen untuk mencetak generasi yang cerdas, berkarakter, dan berdaya
                            saing global melalui pendidikan yang bermutu dan berwawasan lingkungan. Dengan semangat
                            “Belajar, Berkarakter, Berprestasi”, kami hadir membimbing siswa menuju masa depan gemilang demi
                            terwujudnya masyarakat Buton Selatan yang cerdas, unggul, dan berbudaya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item">
                <img src="{{ URL::asset('dist/img/images/slider/3.png') }}" alt="">
            </div>
            <div class="carousel-item active">
                <img src="{{ URL::asset('dist/img/images/slider/1.png') }}" alt="">
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('dist/img/images/slider/2.png') }}" alt="">
            </div>
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators">
                <li data-bs-target="#hero-carousel" data-bs-slide-to="0" class=""></li>
                <li data-bs-target="#hero-carousel" data-bs-slide-to="1" class="active" aria-current="true"></li>
                <li data-bs-target="#hero-carousel" data-bs-slide-to="2" class=""></li>
            </ol>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row position-relative">
                <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
                    <a href="https://www.youtube.com/watch?v=1zpXguvs2hk" class="glightbox stretched-link">
                        <div class="video-play"></div>
                    </a>
                    <img src="{{ URL::asset('dist/img/images/tentang/about.jpg') }}">
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="inner-title">Tentang Kami</h2>
                    <div class="our-story">
                        <p>SMA Negeri 2 Batauga merupakan salah satu institusi pendidikan menengah atas negeri yang terletak
                            di Kecamatan Batauga, Kabupaten Buton Selatan, Provinsi Sulawesi Tenggara. Didirikan untuk
                            memenuhi kebutuhan pendidikan masyarakat di wilayah ini, SMAN 2 Batauga terus berkembang menjadi
                            sekolah yang unggul, baik dalam bidang akademik maupun non-akademik. Dengan tenaga pendidik yang
                            profesional dan berkomitmen, serta lingkungan belajar yang kondusif, sekolah ini telah menjadi
                            tempat yang aman dan inspiratif bagi para siswa dalam mengembangkan potensi diri.</p>

                        <p>Mengusung visi “Unggul dalam Prestasi, Luhur dalam Budi Pekerti”, SMAN 2 Batauga bertekad
                            mencetak generasi yang cerdas, berkarakter, serta mampu bersaing di era global. Berbagai program
                            unggulan seperti kelas digital, program Adiwiyata, dan pembinaan prestasi menjadi bagian dari
                            upaya sekolah dalam membentuk siswa yang tidak hanya cakap secara intelektual, tetapi juga
                            memiliki kepedulian sosial dan lingkungan. Dengan dukungan sarana prasarana yang memadai serta
                            semangat gotong royong warga sekolah, SMAN 2 Batauga siap melahirkan lulusan yang membanggakan
                            daerah dan bangsa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- Announcement Section -->
    <section id="services" class="services section light-background">
        <div class="container section-title position-relative d-flex align-items-center justify-content-between">
            <h3 class="inner-title">Pengumuman</h3>
            <a href="{{ url('/pengumuman') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="container">
            <div class="row gy-4">
                @foreach ($pengumumans as $pengumuman)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('pengumuman.show', $pengumuman->slug) }}">
                            <div class="service-item  position-relative">
                                <h3>{{ $pengumuman->judul }}</h3>
                                <p>{!! implode(' ', array_slice(explode(' ', $pengumuman->body), 0, 20)) !!}...</p>
                                <p class="mt-2 muted">{{ $pengumuman->created_at->translatedFormat('d F Y, h:s') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Announcement Section -->
@endsection
