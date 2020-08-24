<?php echo form_open('user/editprofile/', array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="nama" class="col-md-4 control-label"><span class="text-danger">*</span>Nama</label>
    <div class="col-md-8">
        <?php if ($this->session->userdata('role') == 2) { ?>
            <input type="text" name="nama_pegawai" value="<?php echo ($this->input->post('nama_pegawai') ? $this->input->post('nama_pegawai') : $profil['nama_pegawai']); ?>" class="form-control" id="nama_pegawai" />
            <span class="text-danger"><?php echo form_error('nama_pegawai'); ?></span>
        <?php } else { ?>
            <input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $profil['nama']); ?>" class="form-control" id="nama" />
            <span class="text-danger"><?php echo form_error('nama'); ?></span>
        <?php } ?>
    </div>
</div>
<div class="form-group">
    <label for="jk" class="col-md-4 control-label">Jenis Kelamin</label>
    <div class="col-md-8">
        <select name="jk" class="form-control">
            <option value="">select</option>
            <?php
            $jk_values = array(
                'l' => 'Laki-laki',
                'p' => 'Perempuan',
            );

            foreach ($jk_values as $value => $display_text) {
                $selected = ($value == $profil['jk']) ? ' selected="selected"' : "";

                echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
            }
            ?>
        </select>
        <span class="text-danger"><?php echo form_error('jk'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="tmp_lahir" class="col-md-4 control-label"><span class="text-danger">*</span>Tempat Lahir</label>
    <div class="col-md-8">
        <input type="text" name="tmp_lahir" value="<?php echo ($this->input->post('tmp_lahir') ? $this->input->post('tmp_lahir') : $profil['tmp_lahir']); ?>" class="form-control" id="tmp_lahir" />
        <span class="text-danger"><?php echo form_error('tmp_lahir'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="tgl_lahir" class="col-md-4 control-label"><span class="text-danger">*</span>Tanggal Lahir</label>
    <div class="col-md-8">
        <input type="date" name="tgl_lahir" value="<?php echo ($this->input->post('tgl_lahir') ? $this->input->post('tgl_lahir') : $profil['tgl_lahir']); ?>" class="form-control" id="tgl_lahir" />
        <span class="text-danger"><?php echo form_error('tgl_lahir'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="alamat" class="col-md-4 control-label"><span class="text-danger">*</span>Alamat</label>
    <div class="col-md-8">
        <input type="text" name="alamat" value="<?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $profil['alamat']); ?>" class="form-control" id="alamat" />
        <span class="text-danger"><?php echo form_error('alamat'); ?></span>
    </div>
</div>
<?php if ($this->session->userdata('role') == 3) { ?>

    <div class="form-group">
        <label for="no_hp" class="col-md-4 control-label">No Hp</label>
        <div class="col-md-8">
            <input type="text" name="no_hp" value="<?php echo ($this->input->post('no_hp') ? $this->input->post('no_hp') : $profil['no_hp']); ?>" class="form-control" id="no_hp" />
            <span class="text-danger"><?php echo form_error('no_hp'); ?></span>
        </div>
    </div>
<?php } ?>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>

<?php echo form_close(); ?>