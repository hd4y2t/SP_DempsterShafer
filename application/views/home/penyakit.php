<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
    <div class="container mt-5">

        <div class="row">

            <div class="col-lg d-flex flex-column justify-content-center p-5">

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a>Daftar Jenis Penyakit</a></h4>
                    <p class="description">Jenis Penyakit yang terdaftar disistem menurut pakar</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama OPT</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($penyakit as $p) : ?>
                                <tr>
                                    <td width="150">
                                        <?php echo $i ?>
                                    </td>
                                    <td width="150">
                                        <?php echo $p['namapenyakit'] ?>
                                    </td>
                                    <td width="150">
                                        <a href="<?php echo base_url('home/detailPenyakit/' . $p['id']) ?>" class="btn btn-outline-success"><i class="bx bx-spreadsheet"></i></a>
                                    </td>
                                    <?php $i++; ?>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Why Us Section -->