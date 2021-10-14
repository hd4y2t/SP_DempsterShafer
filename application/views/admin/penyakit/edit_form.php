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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/penyakits/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/penyakits/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $penyakit['idpenyakit']?>" />

							<div class="form-group">
								<label for="name">Nama OPT</label>
								<input class="form-control <?php echo form_error('namapenyakit') ? 'is-invalid':'' ?>"
								 type="text" name="namapenyakit" placeholder="Nama Penyakit" value="<?php echo $penyakit['namapenyakit'] ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jenis OPT</label>
								<input class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>"
								 type="text" name="jenis" placeholder="Jenis OPT" value="<?php echo $penyakit['jenis'] ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Penanganan Non-Kimiawi</label>
								<input class="form-control <?php echo form_error('nonkimiawi') ? 'is-invalid':'' ?>"
								 type="text" name="nonkimiawi" placeholder="Penanganan Non-Kimiawi" value="<?php echo $penyakit['nonkimiawi'] ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Penanganan Kimiawi</label>
								<input class="form-control <?php echo form_error('kimiawi') ? 'is-invalid':'' ?>"
								 type="text" name="kimiawi" placeholder="Penanganan Kimiawi" value="<?php echo $penyakit['kimiawi'] ?>" />
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
