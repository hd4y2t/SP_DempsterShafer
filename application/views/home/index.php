<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade mt-5" data-bs-ride="carousel" data-bs-interval="5000">

        <!-- Slide 1 -->
        <div class="carousel-item active mt-5">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang Di <span>Sistem Diagnosa Semangka</span></h2>
                <p class="animate__animated animate__fadeInUp">Pada beberapa tahun belakangan ini jumlah hasil panen semangka mengalami sedikit penurunan terutama di Kabupaten Nganjuk. Salah satu faktor yang mempengaruhi turunnya hasil panen adalah serangan dari hama dan penyakit tanaman semangka yang mengganggu pertumbuhan tanaman</p>
                <a href="<?= base_url('home/diagnosa') ?>" class="btn-get-started animate__animated animate__fadeInUp">Diagnosa Penyakit</a>
            </div>
        </div>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-3 align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Banyak Jenis Penyakit</a></h4>
                        <p class="description"><?= $penyakit ?></p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3  align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box icon-box-cyan">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Banyak Jenis Gejala</a></h4>
                        <p class="description"><?= $gejala ?></p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-green">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Banyak Rule</a></h4>
                        <p class="description"><?= $rules ?></p>
                    </div>
                </div>



            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
        <div class="container">

            <div class="row">

                <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="<?php echo base_url('home/penyakit')  ?>">Daftar Jenis Penyakit</a></h4>
                        <p class="description">Jenis Penyakit yang terdaftar disistem menurut pakar</p>
                    </div>
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-edit"></i></div>
                        <h4 class="title"><a href="<?= base_url('home/diagnosa'); ?>">Diagnosa Penyakit</a></h4>
                        <p class="description">Cek penyakit yang dialami tanaman semangka</p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->

</main><!-- End #main -->