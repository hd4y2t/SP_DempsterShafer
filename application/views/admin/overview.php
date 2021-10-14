<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
				<?php //$this->load->view("admin/_partials/breadcrumb.php") 
				?>
				<div>
					<h2 id="judul">SISTEM PAKAR DIAGNOSA HAMA & PENYAKIT SEMANGKA
						<hr align="left">
					</h2>
				</div>
				<div>
					<div class="card mb-3">
						<div class="card-header">
							<p align=justify>Pada beberapa tahun belakangan ini jumlah hasil panen semangka mengalami sedikit
								penurunan terutama di Kabupaten Nganjuk. Salah satu faktor yang mempengaruhi turunnya hasil
								panen adalah serangan dari hama dan penyakit tanaman semangka yang mengganggu
								pertumbuhan tanaman. Banyak petani yang kesulitan dalam mendiagnosa hama dan penyakit yang
								menyerang tanaman mereka, dan semua itu berujung pada kesalahan dalam pemberian pestisida
								yang kurang tepat dan membuat petani harus merugi karena telah mengeluarkan banyak biaya
								untuk membeli pestisida tersebut. Oleh karena itu diperlukan sebuah aplikasi yang mampu
								membantu seorang petani untuk mendiagnosa hama dan penyakit yang menyerang tanaman
								semangka. Untuk mengatasi permasalahan tersebut penelitian ini akan membuat sebuah aplikasi
								sistem yang mampu melakukan diagnosa hama dan penyakit yang menyerang tanaman semangka.
							</p>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>
		<?php $this->load->view("admin/_partials/modal.php") ?>
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>