<div class="d-flex align-items-end flex-column mb-3">
	<a href="<?php echo site_url('user/add'); ?>" class="btn btn-success ">Add</a>
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
						<th>Id User</th>
						<!-- <th>Password</th> -->
						<th>Email</th>
						<th>Role</th>
						<th>Aktif</th>
						<th>Last Login</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Id User</th>
						<!-- <th>Password</th> -->
						<th>Email</th>
						<th>Role</th>
						<th>Aktif</th>
						<th>Last Login</th>
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($users as $t) { ?>
						<tr>
							<td><?php echo $t['id_user']; ?></td>
							<!-- <td><?php echo $t['password']; ?></td> -->
							<td><?php echo $t['email']; ?></td>
							<td><?php echo ($t['role'] == 1) ? 'Admin' : (($t['role'] == 2) ? 'Pegawai' : 'Mahasiswa') ?></td>
							<td><?php echo $t['aktif'] == 't' ? 'Aktif' : 'Tidak aktif'; ?></td>
							<td><?php echo $t['last_login']; ?></td>
							<td>
								<a href="<?php echo site_url('user/edit/' . $t['id_user']); ?>" class="btn btn btn-warning btn-circle btn-sm mr-2">
									<i class=" fas fa-edit "></i>
								</a>
								<a href="<?php echo site_url('user/remove/' . $t['id_user']); ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $t['email']; ?>?');">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>