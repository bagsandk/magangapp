<div class="row">
    <div class="col-lg">
        <div class="p-5">
            <div class="text-center">
                <img src="<?= base_url('./assets/img/logo_ptpn7.png') ?>" alt="logo" width="125" height="60" class="mb-4">
                <h1 class="h4 text-gray-900 mb-2">Selamat datang <?= $mhs['nama']; ?></h1>
                <h4 class="h6 mb-4">Lanjutkan pendaftaran magang PTPN-7 </h4>
                <hr>
                </hr>
            </div>
            <?php echo form_open_multipart('complete', array("class" => "user")); ?>

            <div class="form-group">
                <label for="asal_ptn" class="col-md-4 control-label"><span class="text-danger">*</span>Asal PTN</label>
                <div class="col-md-12">
                    <input type="text" name="asal_ptn" value="<?php echo $this->input->post('asal_ptn'); ?>" class="form-control" id="asal_ptn" />
                    <span class="text-danger"><?php echo form_error('asal_ptn'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="npm" class="col-md-4 control-label"><span class="text-danger">*</span>NPM</label>
                <div class="col-md-12">
                    <input type="text" name="npm" value="<?php echo $this->input->post('npm'); ?>" class="form-control" id="npm" />
                    <span class="text-danger"><?php echo form_error('npm'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="surat_tugas" class="col-md-4 control-label"><span class="text-danger">*</span>Surat Tugas</label>
                <div class="col-md-12">
                    <input type="file" name="surat_tugas" value="<?php echo $this->input->post('surat_tugas'); ?>" class="form-control" id="surat_tugas" />
                    <span class="text-danger"><?php echo form_error('surat_tugas'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-md-4 control-label"><span class="text-danger">*</span>Alamat</label>
                <div class="col-md-12">
                    <input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" required />
                    <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="foto" class="col-md-4 fi"><span class="text-danger">*</span>Foto</label>
                <div class="col-md-12 ">
                    <input type="file" name="foto" value="<?php echo $this->input->post('foto'); ?>" class=" form-control " id="foto" required />
                    <span class="text-danger"><?php echo form_error('foto'); ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-user btn-block mt-5"> Daftar </button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>