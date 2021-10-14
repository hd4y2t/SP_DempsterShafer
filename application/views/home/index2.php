<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagnosa Gejala</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <div class="card border-primary mb-3">
                    <h1 class="h2">Sistem Pakar Dempster Shafer</h1>
                    <div class="">
                        <a href="<?= site_url('admin/overview') ?>" class="btn btn-light">Login Admin</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto my-auto mt-5">
                <div class="card border-primary mb-3">
                    <form action="" method="POST">
                        <div class="card-header">Sistem Pakar</div>
                        <div class="card-body">
                            <div class="form-group">
                                <!-- <label for="name">Identitas Anda</label> -->
                                <div class="checkbox text-left">
                                    <input type="text" class="form-control" name="ktp" placeholder="Masukkan Nomor KTP Anda " required />
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label for="name">Nama Anda</label> -->
                                <div class="checkbox text-left">
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Sesuai KTP Anda " required />
                                </div>
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
                                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $g['idgejala'] ?> | <?= $g['namagejala']; ?>" disabled>
                                        <br>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-12 mt-2 mb-2">
                            <button type="submit" class="btn btn-primary">Cek Hasil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>