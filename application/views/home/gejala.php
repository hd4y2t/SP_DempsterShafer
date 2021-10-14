<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
    <div class="container mt-5">

        <div class="row">

            <div class="col-lg mt-5 d-flex flex-column justify-content-center p-5">

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a>Daftar Jenis Gejala</a></h4>
                    <p class="description">Jenis Gejala yang terdaftar disistem menurut pakar</p>
                </div>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Gejala </th>
                            <th scope="col">Organ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($gejala as $g) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $g['namagejala']; ?></td>
                                <td><?= $g['organ']; ?></td>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section><!-- End Why Us Section -->