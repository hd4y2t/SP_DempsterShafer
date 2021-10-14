<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg d-flex flex-column justify-content-center p-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Penyakit</h5>
                    </div>
                    <img class="card-img-top" src="<?= base_url('assets/img/opt/') . "P" . $penyakit['id'] ?>.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title"><?= $penyakit['namapenyakit'] ?></h5>
                        </div>
                        <p class="card-text">Jenis : <?= $penyakit['jenis'] ?></p>
                        <h6 class="card-text">Gejala yang dimiliki</h6>
                        <?php
                        foreach ($rules as $r) : ?>
                            <p class="card-text"> - <?= $r['namagejala'] ?></p>
                        <?php endforeach; ?>
                        <div class="text-center">
                            <h6 class="card-text">Penanganan</h6>
                        </div>
                        <h6 class="card-text">Non-Kimiawi</h6>
                        <p class="card-text"><?= $penyakit['nonkimiawi'] ?></p>
                        <h6 class="card-text">Kimiawi</h6>
                        <p class="card-text"><?= $penyakit['kimiawi'] ?></p>
                        <a href="<?= base_url('home/penyakit') ?>" class="btn btn-outline-success">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Why Us Section -->