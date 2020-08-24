<div class="card shadow mb-4">
    <div class="card-header py-4">
        <h5 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 border-right">
                <img src="<?= base_url('assets/img/profile/' . $mhs['foto']) ?>" alt="profile" class="rounded-circle" width="300">
            </div>
            <div class="col-lg-8">
                <h2 class="mt-4 border-bottom mb-3"><?= $mhs['nama']; ?></h2>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Jenis Kelamin</h6>
                        <h6>Tanggal Lahir</h6>
                        <h6>Tempat Lahir</h6>
                        <h6>Alamat</h6>
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-3">
                        <h6><?= $mhs['jk'] == 'p' ? 'Perempuan' : 'Laki-laki'; ?></h6>
                        <h6><?= $mhs['tgl_lahir']; ?></h6>
                        <h6><?= $mhs['tmp_lahir']; ?></h6>
                        <h6><?= $mhs['alamat']; ?></h6>
                        <h6><?= $mhs['email']; ?></h6>
                    </div>
                </div>
                <h4 class="mt-4 border-top mt-3"><?= $mhs['asal_ptn']; ?></h4>
                <h7 class="mt-7 mt-3"> NPM : <?= $mhs['npm']; ?></h7>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-4">
        <h5 class="m-0 font-weight-bold text-primary">Data Pegawai</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 border-right">
                <img src="<?= base_url('assets/img/profile/' . $pegawai['foto']) ?>" alt="profile" class="rounded-circle" width="300">
            </div>
            <div class="col-lg-8">
                <h2 class=" "><?= $pegawai['nama_pegawai']; ?></h2>
                <h6 class=" "><?= $pegawai['nama_jabatan']; ?></h6>
                <h6 class="border-bottom mb-3"><?= $pegawai['nama_bagian']; ?></h6>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Jenis Kelamin</h6>
                        <h6>Tanggal Lahir</h6>
                        <h6>Tempat Lahir</h6>
                        <h6>Alamat</h6>
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-3">
                        <h6><?= $pegawai['jk'] == 'p' ? 'Perempuan' : 'Laki-laki'; ?></h6>
                        <h6><?= $pegawai['tgl_lahir']; ?></h6>
                        <h6><?= $pegawai['tmp_lahir']; ?></h6>
                        <h6><?= $pegawai['alamat']; ?></h6>
                        <h6><?= $pegawai['email']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>