<div class="d-flex align-items-end flex-column mb-3">
	<a href="<?php echo site_url('jabatan/add'); ?>" class="btn btn-success ">Add</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tabel <?= $tittle; ?></h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Id Jabatan</th>
						<th>Nama Jabatan</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Id Jabatan</th>
						<th>Nama Jabatan</th>
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($tbl_jabatan as $t) { ?>
						<tr>
							<td><?php echo $t['id_jabatan']; ?></td>
							<td><?php echo $t['nama_jabatan']; ?></td>
							<td>
								<a href="<?php echo site_url('jabatan/edit/' . $t['id_jabatan']); ?>" class="btn btn btn-warning btn-circle mr-2 btn-sm">
									<i class=" fas fa-edit "></i>
									<a href="<?php echo site_url('jabatan/remove/' . $t['id_jabatan']); ?>" class="btn btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['nama_jabatan']; ?>?');">
										<i class=" fas fa-trash "></i>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>