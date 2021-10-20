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

				<?php //$this->load->view("admin/_partials/breadcrumb.php") 
				?>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/penyakits/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Nama OPT*</label>
								<input class="form-control <?php echo form_error('namapenyakit') ? 'is-invalid' : '' ?>" type="text" name="nama" value="<?= $penyakit['namapenyakit'] ?>" placeholder="Masukkan Nama OPT" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">

								<label for="name">Jenis OPT*</label>
								<select name="jenis" id="jenis" class="form-control">
									<option value="Hama" <?= $penyakit['jenis'] == 'Hama' ? 'selected="true"' : '' ?>>Hama</option>
									<option value="Penyakit" <?= $penyakit['jenis'] == 'Penyakit' ? 'selected="true"' : '' ?>>Penyakit</option>

								</select>
							</div>
							<div class="form-group">
								<label for="name">Cara Penanganan Non-Kimiawi*</label>
								<input class="form-control <?php echo form_error('nonkimiawi') ? 'is-invalid' : '' ?>" type="text" name="nkimia" value="<?= $penyakit['nonkimiawi'] ?>" placeholder="Masukkan Cara Penanganan Non-Kimiawi" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Cara Penanganan Kimiawi*</label>
								<input class="form-control <?php echo form_error('kimiawi') ? 'is-invalid' : '' ?>" type="text" name="kimia" value="<?= $penyakit['kimiawi'] ?>" placeholder="Masukkan Cara Penanganan Kimiawi" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<div class=" form-group row">
									<div class="col-sm">
										<label for="name">Foto*</label>
										<div class="custom-file">
											<input type="file" id="foto" name="foto" value="<?= $penyakit['foto'] ?>" aria-describedby="inputGroupFileAddon01">
											<label id="pilih" for="foto">Choose file</label>

											<!-- <input type="file" class="custom-file-input" id="foto" name="foto">
													<label class=" btn btn-outline-success btn-sm" id="pilih" for="foto"><i class="material-icons">search</i></label> -->
										</div>
										<div class="col-sm-3">
											<img id="gambar" src="<?= base_url('/assets/img/opt/') . $penyakit['foto'] ?> " class="img-thumbnail">
										</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ml-3">
								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card-footer small text-muted">
		* required fields
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

	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
<script type="text/javascript">
	var tm_pilih = document.getElementById('pilih');
	var file = document.getElementById('foto');
	tm_pilih.addEventListener('click', function() {
		file.click();
	})
	file.addEventListener('change', function() {
		gambar(this);
	})

	function gambar(a) {
		if (a.files && a.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				document.getElementById('gambar').src = e.target.result;
			}
			reader.readAsDataURL(a.files[0]);
		}

	}
</script>