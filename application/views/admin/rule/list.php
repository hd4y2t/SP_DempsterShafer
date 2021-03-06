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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/rules/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						<?php if ($this->session->flashdata('success') == TRUE) : ?>
							<div class="alert alert-success">
								<span><?= $this->session->flashdata('success'); ?></span>
							</div>
						<?php endif; ?>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>ID Rule</th>
										<th>Nama Penyakit</th>
										<th>Nama Gejala</th>
										<th>Nilai</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($rules as $rule) : ?>
										<tr>
											<td width="50">
												<?php echo  $i++ ?>
											</td>
											<td width="150">
												<?php echo $rule['idrule'] ?>
											</td>
											<td width="150">
												<?php echo $rule['namapenyakit'] ?>
											</td>
											<td width="150">
												<?php echo $rule['namagejala'] ?>
											</td>
											<td width="150">
												<?php echo $rule['nilai'] ?>
											</td>
											<td width="250">
												<a href="<?php echo base_url('admin/rules/edit/') . $rule['id'] ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/rules/delete/' . $rule['idrule']) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
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

	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>

</html>