<?= $this->session->flashdata('message') ?>

<div class="d-flex align-items-end flex-column mb-3">
	<a href="<?php echo site_url('mhs_magang/add'); ?>" class="btn btn-success ">Add</a>
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
						<th>Id Mhs</th>
						<!-- <th>Id User</th> -->
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tanggal Lahir</th>
						<th>Asal PTN</th>
						<th>Surat tugas</th>
						<th>NPM</th>
						<th>Status</th>
						<!-- <th>Foto</th> -->
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Id Mhs</th>
						<!-- <th>Id User</th> -->
						<th>Nama</th>
						<th>Jeni Kelamin</th>
						<th>Tanggal Lahir</th>
						<th>Asal PTN</th>
						<th>Surat tugas</th>
						<th>NPM</th>
						<th>Status</th>
						<!-- <th>Foto</th> -->
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($tbl_mhs_magang as $t) { ?>
						<tr>
							<td><?php echo $t['id_mhs']; ?></td>
							<!-- <td><?php echo $t['id_user']; ?></td> -->
							<td><?php echo $t['nama']; ?></td>
							<td><?php echo $t['jk'] == 'l' ? 'Laki-laki' : ($t['jk'] == 'p' ? 'Perempuan' : 'belum di input'); ?></td>
							<td><?php echo $t['tgl_lahir']; ?></td>
							<td><?php echo $t['asal_ptn']; ?></td>
							<td><?php if ($t['surat_tugas'] !== null || "") { ?>
									<a href="<?= base_url('file/surat_tugas/' . $t['surat_tugas']) ?>" target="_blank" class="btn btn btn-info btn-circle data-toggle=" tooltip" data-placement="top" title="Lihat surat tugas">
										<i class=" fas fa-eye "></i>
									</a>
								<?php } else {
									echo "Tidak ada";
								} ?>
							</td>
							<td><?php echo $t['npm']; ?></td>
							<td><?php echo $t['status'] == 'p' ? 'Pending' : ($t['status'] == 't' ? 'Diterima' : 'Ditolak'); ?></td>
							<td>
								<a href="<?php echo site_url('mhs_magang/edit/' . $t['id_mhs']); ?>" class="btn btn btn-warning btn-circle mx-1 my-1 btn-sm">
									<i class=" fas fa-edit "></i>
									<a href="<?php echo site_url('mhs_magang/remove/' . $t['id_mhs']); ?>" class="btn btn btn-danger btn-circle  mx-1 my-1 btn-sm">
										<i class=" fas fa-trash "></i>
										<a href="<?php echo site_url('mhs_magang/info/' . $t['id_mhs']); ?>" class="btn btn btn-primary btn-circle  mx-1 my-1  btn-sm" data-toggle="tooltip" data-placement="top" title="Info mahasiswa magang">
											<i class=" fas fa-info "></i>
											<?php if ($t['status'] !== 't') { ?>
												<a href="<?php echo site_url('mhs_magang/verif/' . $t['id_mhs']); ?>" class="btn btn btn-success btn-circle  mx-1 my-1  btn-sm">
													<i class=" fas fa-user-check "></i>
												<?php } ?>

							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>