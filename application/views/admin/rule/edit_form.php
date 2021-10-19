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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/rules/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $rules['idrule'] ?>" />

							<div class="form-group">
								<label for="name">Nilai</label>
								<select name="penyakit" id="penyakit" class="form-control">
									<option value="">Pilih penyakit</option>
									<?php foreach ($penyakit as $b) : ?>
										<?php if ($rules['penyakit_id'] == $b['id']) : ?>
											<option value="<?= $b['id']; ?>" selected><?= $b['namapenyakit']; ?></option>
										<?php else : ?>
											<option value="<?= $b['id']; ?>"><?= $b['namapenyakit']; ?></option>
										<?php endif; ?>

									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="name">Gejala</label>
								<select name="gejala" id="gejala" class="form-control">
									<option value="">Pilih gejala</option>
									<?php foreach ($gejala as $b) : ?>
										<?php if ($rules['gejala_id'] == $b['id']) : ?>
											<option value="<?= $b['id']; ?>" selected><?= $b['namagejala']; ?></option>
										<?php else : ?>
											<option value="<?= $b['id']; ?>"><?= $b['namagejala']; ?></option>
										<?php endif; ?>

									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="name">Nilai</label>
								<input class="form-control" type="text" name="nilai" placeholder="Nilai Belief" value="<?= $rules['nilai'] ?>">
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