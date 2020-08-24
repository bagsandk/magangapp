<!-- DataTales Example -->
<?= $this->session->flashdata('message') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $tittle . ' ' . $mhs['nama']; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
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
                    foreach ($kegiatan as $t) { ?>

                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $t['nama_kegiatan']; ?></td>
                            <td><?php echo $t['deskripsi']; ?></td>
                            <td><?php echo $t['tgl_kegiatan']; ?></td>
                            <td><?php echo $t['alat']; ?></td>
                            <td><?php echo $t['bahan']; ?></td>
                            <td><?php echo $t['verif']  == 'p' ? 'Pending' : ($t['verif'] == 't' ? 'Diterima' : 'Ditolak');  ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Verifikasi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?php echo site_url('kegiatan_magang/verif/' . $t['id_magang'] . '/' . $t['id_kegiatan'] . '/t'); ?>">Diterima</a>
                                        <a class="dropdown-item" href="<?php echo site_url('kegiatan_magang/verif/' . $t['id_magang'] . '/' . $t['id_kegiatan'] . '/p'); ?>">Pending</a>
                                        <a class="dropdown-item" href="<?php echo site_url('kegiatan_magang/verif/' . $t['id_magang'] . '/' . $t['id_kegiatan'] . '/f'); ?>">Ditolak</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>