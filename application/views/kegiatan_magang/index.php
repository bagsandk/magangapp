<?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 3) { ?>
	<div class="d-flex align-items-end flex-column mb-3">
		<a href="<?php echo site_url('kegiatan_magang/add'); ?>" class="btn btn-success ">Add</a>
	</div>
<?php } ?>
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
						<th>No</th>
						<th>Id Magang</th>
						<th>Nama Kegiatan</th>
						<th>Deskripsi</th>
						<th>Tanggal Kegiatan</th>
						<th>Alat</th>
						<th>Bahan</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Id Magang</th>
						<th>Nama Kegiatan</th>
						<th>Deskripsi</th>
						<th>Tanggal Kegiatan</th>
						<th>Alat</th>
						<th>Bahan</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					<?php $n = 1;
					foreach ($tbl_kegiatan_magang as $t) { ?>
						<tr>
							<td><?php echo $n++; ?></td>
							<td><?php echo $t['nama']; ?></td>
							<td><?php echo $t['nama_kegiatan']; ?></td>
							<td><?php echo $t['deskripsi']; ?></td>
							<td><?php echo $t['tgl_kegiatan']; ?></td>
							<td><?php echo $t['alat']; ?></td>
							<td><?php echo $t['bahan']; ?></td>
							<?php if ($t['verif']  == 'p') {
								$m = 'Pending';
								$c = 'orange';
							} else if ($t['verif'] == 't') {
								$m = 'Diterima';
								$c = 'green';
							} else {
								$m = 'Ditolak';
								$c = 'red';
							} ?>
							<td style="color:<?= $c ?>;"><?php echo $m; ?></td>
							<td>
								<?php if (($this->session->userdata('role') == 3 and $t['verif'] !== 't') || ($this->session->userdata('role') == 1)) { ?>
									<a href="<?php echo site_url('kegiatan_magang/edit/' . $t['id_kegiatan']); ?>" class="btn btn btn-warning btn-circle mr-2 btn-sm">
										<i class=" fas fa-edit "></i>
										<a href="<?php echo site_url('kegiatan_magang/remove/' . $t['id_kegiatan']); ?>" class="btn btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['nama_kegiatan']; ?>?');">
											<i class=" fas fa-trash "></i>
										<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>