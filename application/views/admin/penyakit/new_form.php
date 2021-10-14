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

				<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/penyakits/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/penyakit/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Nama OPT*</label>
								<input class="form-control <?php echo form_error('namapenyakit') ? 'is-invalid':'' ?>"
								 type="text" name="namapenyakit" placeholder="Masukkan Nama OPT" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Jenis OPT*</label>
								<select class="form-control" id="jenis" name="jenis">
                                <option value="Hama">Hama</option>
                                <option value="Penyakit">Penyakit</option>
                            </select>
								<div class="invalid-feedback">
									<?php echo form_error('jenis') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Cara Penanganan Non-Kimiawi*</label>
								<input class="form-control <?php echo form_error('nonkimiawi') ? 'is-invalid':'' ?>"
								 type="text" name="nonkimiawi" placeholder="Masukkan Cara Penanganan Non-Kimiawi" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Cara Penanganan Kimiawi*</label>
								<input class="form-control <?php echo form_error('kimiawi') ? 'is-invalid':'' ?>"
								 type="text" name="kimiawi" placeholder="Masukkan Cara Penanganan Kimiawi" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

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
