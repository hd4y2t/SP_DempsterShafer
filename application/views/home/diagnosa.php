<section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box">
                            <i class="bx bx-atom"></i>
                            <h3>Sistem Diagnosa Semangka</h3>
                            <p>Diagnosa Penyakit Tanaman Semangka Anda !!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg mt-2">
                <form action="<?= base_url('home/diagnosa') ?>" method="POST" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda" required>
                        </div>
                        <div class="col-md-6 form-group mt-md-0">
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Tempat tinggal" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Pilih Gejala yang dialami (Minimal 2 gejala)</label>
                            <?php foreach ($gejala as $g) : ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="gejala[]" aria-label="Checkbox for following text input" value="<?= $g['id']; ?>">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $g['namagejala']; ?>" disabled>
                                    <br>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="text-center">
                            <button type="submit">Cek Gejala</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->