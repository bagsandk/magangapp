<?php if ($this->session->userdata('role') == 1) { ?>
	<div class="d-flex align-items-end flex-column mb-3">
		<a href="<?php echo site_url('magang/add'); ?>" class="btn btn-success ">Add</a>
	</div>
<?php } ?>
<!-- DataTales Example -->
<?= $this->session->flashdata('message') ?>

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
						<th>Nama Mahasiswa</th>
						<th>Bagian</th>
						<th>Nama Pembimbing</th>
						<th>Nilai</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nama Mahasiswa</th>
						<th>Bagian</th>
						<th>Nama Pembimbing</th>
						<th>Nilai</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</tfoot>
				<tbody>
					<?php $n = 1;
					foreach ($tbl_magang as $t) { ?>
						<tr>
							<td><?php echo $n++; ?></td>
							<td><?php echo $t['nama']; ?></td>
							<td><?php echo $t['nama_bagian']; ?></td>
							<td><?php echo $t['nama_pegawai']; ?></td>
							<td>
								<p>Kedisiplinan : <?php echo $t['n_kedis']; ?></p>
								<p>Keaktifan : <?php echo $t['n_keakt']; ?></p>
								<p>Motivasi dan Kreativitas : <?php echo $t['n_motiv']; ?></p>
								<p>Kemampuan : <?php echo $t['n_kemam']; ?></p>
								<p>Kerjasama : <?php echo $t['n_kerja']; ?></p>
								<p>Kehadiran : <?php echo $t['n_kehad']; ?></p>
								<p>Kesopanan : <?php echo $t['n_kesop']; ?></p>
								<p>Kerapihan : <?php echo $t['n_kerap']; ?></p>
							</td>
							<td><?php echo $t['status_magang'] == 'f' ? 'Magang' : 'Lulus'; ?></td>
							<td>
								<a href="<?php echo site_url('magang/info/' . $t['id_magang']); ?>" class="btn btn btn-primary btn-circle mr-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Info mahasiswa magang">
									<i class=" fas fa-info "></i>
									<?php if ($this->session->userdata('role') == 1) { ?>
										<a href="<?php echo site_url('magang/edit/' . $t['id_magang']); ?>" class="btn btn btn-warning btn-circle mr-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Edit item">
											<i class=" fas fa-edit "></i>
											<a href="<?php echo site_url('magang/remove/' . $t['id_magang']); ?>" class="btn btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?');" data-toggle="tooltip" data-placement="top" title="Hapus item">
												<i class=" fas fa-trash "></i>
											<?php } else { ?>
												<?php if ($this->session->userdata('role') == 3 and $t['status_magang'] == 't') { ?>
													<a href="<?php echo site_url('Laporan_pdf/cetaknilai/' . $t['id_mhs']); ?>" class="btn btn btn-success btn-circle btn-sm mr-2 " data-toggle="tooltip" data-placement="top" title="Download form nilai">
														<i class=" fas fa-download "></i>
													<?php } ?>
													<?php if ($this->session->userdata('role') == 2) { ?>
														<a href="<?php echo site_url('magang/nilai/' . $t['id_magang']); ?>" class="btn btn btn-success btn-circle btn-sm mr-2 " data-toggle="tooltip" data-placement="top" title="Input nilai">
															<i class=" fas fa-keyboard "></i>
															<a href="<?php echo site_url('magang/kegiatan/' . $t['id_magang']); ?>" class="btn btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Kegiatan magang">
																<i class=" fas fa-network-wired "></i>
															<?php } ?>
							</td>
						<?php }; ?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>