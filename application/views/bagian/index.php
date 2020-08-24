<div class="d-flex align-items-end flex-column mb-3">
	<a href="<?php echo site_url('bagian/add'); ?>" class="btn btn-success ">Add</a>
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
						<th>Id Bagian</th>
						<th>Nama Bagian</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Id Bagian</th>
						<th>Nama Bagian</th>
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($tbl_bagian as $t) { ?>
						<tr>
							<td><?php echo $t['id_bagian']; ?></td>
							<td><?php echo $t['nama_bagian']; ?></td>
							<td>
								<a href="<?php echo site_url('bagian/edit/' . $t['id_bagian']); ?>" class="btn btn btn-warning btn-circle btn-sm mr-2">
									<i class=" fas fa-edit "></i>
									<a href="<?php echo site_url('bagian/remove/' . $t['id_bagian']); ?>" class="btn btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['nama_bagian']; ?>?');">
										<i class=" fas fa-trash "></i>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>