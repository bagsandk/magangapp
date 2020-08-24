<?= $this->session->flashdata('message') ?>

<?php if ($this->session->userdata('role') == 1) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-primary">Kamu Adalah Admin</h5>
        </div>
    </div>
<?php } else { ?>
    <div class="card shadow mb-4">
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-primary">Profil</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 border-right ">
                    <img src="<?= base_url('assets/img/profile/' . $profil['foto']) ?>" alt="profile" class="rounded-circle" width="250" height="250">
                    <?php echo form_open_multipart('user/profile/', array("class" => "form-horizontal",)); ?>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" value="upload">Upload</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <?php if ($this->session->userdata('role') == 3) { ?>
                    <div class="col-lg-8">
                        <h2 class="mt-4 border-bottom mb-3"><?= $profil['nama']; ?></h2>
                        <div class="row">
                            <div class="mx-3">
                                <h6>Jenis Kelamin</h6>
                                <h6>Tanggal Lahir</h6>
                                <h6>Tempat Lahir</h6>
                                <h6>Alamat</h6>
                                <h6>Email</h6>
                            </div>
                            <div class="">
                                <h6><?= $profil['jk'] == 'p' ? 'Perempuan' : 'Laki-laki'; ?></h6>
                                <h6><?= $profil['tgl_lahir']; ?></h6>
                                <h6><?= $profil['tmp_lahir']; ?></h6>
                                <h6><?= $profil['alamat']; ?></h6>
                                <h6><?= $profil['email']; ?></h6>
                            </div>
                        </div>
                        <h4 class="mt-4 border-top mt-3"><?= $profil['asal_ptn']; ?></h4>
                        <h7 class="mt-7 mt-3"> NPM : <?= $profil['npm']; ?></h7>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-8">
                        <h2 class=" "><?= $profil['nama_pegawai']; ?></h2>
                        <h6 class=" "><?= $profil['nama_jabatan']; ?></h6>
                        <h6 class="border-bottom mb-3"><?= $profil['nama_bagian']; ?></h6>
                        <div class="row">
                            <div class="col-md-3">
                                <h6>Jenis Kelamin</h6>
                                <h6>Tanggal Lahir</h6>
                                <h6>Tempat Lahir</h6>
                                <h6>Alamat</h6>
                                <h6>Email</h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?= $profil['jk'] == 'p' ? 'Perempuan' : 'Laki-laki'; ?></h6>
                                <h6><?= $profil['tgl_lahir']; ?></h6>
                                <h6><?= $profil['tmp_lahir']; ?></h6>
                                <h6><?= $profil['alamat']; ?></h6>
                                <h6><?= $profil['email']; ?></h6>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class=" row justify-content-end mt-5">
                <div class="mr-2">
                    <a href="<?php echo site_url('user/editprofile/'); ?>" class="btn btn-sm btn-secondary ">Edit Profil</a>
                </div>
                <div class="mr-2 ">
                    <a href="<?php echo site_url('user/changepass/'); ?>" class="btn btn-sm btn-warning ">Ganti Password</a>
                </div>
            </div>
        </div>
    <?php
} ?>