<?php echo form_open('mhs_magang/verif/' . $idmhs, array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="id_bagian" class="col-md-4 control-label"><span class="text-danger">*</span>Bagian</label>
    <div class="col-md-8">
        <select name="id_bagian" class="form-control">
            <option value="">Pilih Bagian</option>
            <?php
            foreach ($all_tbl_bagian as $bagian) {
                $selected = ($bagian['id_bagian'] == $this->input->post('id_bagian')) ? ' selected="selected"' : "";

                echo '<option value="' . $bagian['id_bagian'] . '" ' . $selected . '>' . $bagian['nama_bagian'] . '</option>';
            }
            ?>
        </select>
        <span class="text-danger"><?php echo form_error('id_bagian'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="kode_pegawai" class="col-md-4 control-label"><span class="text-danger">*</span>Pegawai</label>
    <div class="col-md-8">
        <select name="kode_pegawai" class="form-control">
            <option value="">Pilih Pegawai</option>
            <?php
            foreach ($all_tbl_pegawai as $pegawai) {
                $selected = ($pegawai['kode_pegawai'] == $this->input->post('kode_pegawai')) ? ' selected="selected"' : "";

                echo '<option value="' . $pegawai['kode_pegawai'] . '" ' . $selected . '>' . $pegawai['nama_pegawai'] . '</option>';
            }
            ?>
        </select>
        <span class="text-danger"><?php echo form_error('kode_pegawai'); ?></span>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>

<?php echo form_close(); ?>