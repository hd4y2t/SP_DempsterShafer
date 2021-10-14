<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Pakar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('') ?>/assets/img/favicon1.jpg" rel="icon">
    <link href="<?= base_url('') ?>/assets/img/favicon1.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('') ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="<?= base_url('') ?>/css/style.css" rel="stylesheet">

</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 class="text-light"><a href="<?= base_url(); ?>"><span>Sistem Diagnosa</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active " href="<?= base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('home/penyakit')  ?>">Daftar Penyakit</a></li>
                    <li><a href="<?= base_url('home/diagnosa') ?>">Diagnosa</a></li>
                    <li><a href="<?= base_url('admin/login') ?> " target="blank">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->