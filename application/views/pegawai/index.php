<div class="d-flex align-items-end flex-column mb-3">
	<a href="<?php echo site_url('pegawai/add'); ?>" class="btn btn-success ">Add</a>
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
						<th>Kode Pegawai</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Bagian</th>
						<th>pegawai</th>
						<th>User</th>
						<th>Alamat</th>
						<th>Foto</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Kode Pegawai</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Bagian</th>
						<th>pegawai</th>
						<th>User</th>
						<th>Alamat</th>
						<th>Foto</th>
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($tbl_pegawai as $t) { ?>
						<tr>
							<td><?php echo $t['kode_pegawai']; ?></td>
							<td><?php echo $t['nama_pegawai']; ?></td>
							<td><?php echo $t['tmp_lahir']; ?></td>
							<td><?php echo $t['tgl_lahir']; ?></td>
							<td><?php echo $t['jk'] == 'p' ? 'Perempuan' : 'Laki-laki'; ?></td>
							<td><?php echo $t['nama_bagian']; ?></td>
							<td><?php echo $t['nama_jabatan']; ?></td>
							<td><?php echo $t['email']; ?></td>
							<td><?php echo $t['alamat']; ?></td>
							<td>
								<img src="<?= base_url('./assets/img/profile/' . $t['foto']) ?>" class="rounded-circle img-thumbnail" alt="logo" width="50" height="50">
							</td>
							<td>
								<a href="<?php echo site_url('pegawai/edit/' . $t['kode_pegawai']); ?>" class="btn btn btn-warning btn-circle mr-2 btn-sm"><i class=" fas fa-edit "></i>
									<a href="<?php echo site_url('pegawai/remove/' . $t['kode_pegawai']); ?>" class="btn btn btn-danger btn-circle mr-2 btn-sm"><i class=" fas fa-trash "></i>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>