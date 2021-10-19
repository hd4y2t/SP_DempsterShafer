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
						<a href="<?php echo site_url('admin/gejalas/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/gejala/add') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Nama Gejala</label>
								<input class="form-control <?php echo form_error('namagejala') ? 'is-invalid' : '' ?>" type="text" name="namagejala" placeholder="Nama gejala" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Organ</label>
								<select class="form-control" id="organ" name="organ">
									<option value="Daun">Daun</option>
									<option value="Akar">Akar</option>
									<option value="Batang">Batang</option>
									<option value="Buah">Buah</option>
									<option value="Bunga">Bunga</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('organ') ?>
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