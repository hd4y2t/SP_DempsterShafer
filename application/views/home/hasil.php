<section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">

        <div class="row">

            <div class="col-lg-6 mt-5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <i class="bx bx-atom"></i>
                            <h3>Sistem Diagnosa</h3>
                            <p>Diagnosa Penyakit Tanaman Semangka Anda !!</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg mt-2">
                <form class="php-email-form">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tanaman Anda Terdeteksi Penyakit</h5>
                        </div>
                        <img class="card-img-top" src="<?= base_url('assets/img/opt/') . $penyakit['idpenyakit'] ?>.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="card-title"><?= $penyakit['namapenyakit'] ?></h5>
                            </div>
                            <p class="card-text">Jenis : <?= $penyakit['jenis'] ?></p>
                            <div class="text-center">
                                <h6 class="card-text">Penanganan</h6>
                            </div>
                            <h6 class="card-text">Non-Kimiawi</h6>
                            <p class="card-text"><?= $penyakit['nonkimiawi'] ?></p>
                            <h6 class="card-text">Kimiawi</h6>
                            <p class="card-text"><?= $penyakit['kimiawi'] ?></p>
                            <a href="<?= base_url('home/diagnosa') ?>" class="btn btn-outline-success">Diagnosa Ulang</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>

    </div>

    </div>
</section><!-- End Contact Section -->