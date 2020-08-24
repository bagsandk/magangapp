<?php echo form_open('magang/nilai/' . $magang['id_magang'], array("class" => "form-horizontal")); ?>

<div class="form-group ml-3">
    <h4>Nilai Untuk <?= $mhs['nama'] ?></h4>
</div>

<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Kedisiplinan</label>
    <div class="col-md-3">
        <input type="text" name="n_kedis" value="<?php echo ($this->input->post('n_kedis') ? $this->input->post('n_kedis') : $magang['n_kedis']); ?>" class="form-control" id="n_kedis" />
        <span class="text-danger"><?php echo form_error('n_kedis'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Keaktifan</label>
    <div class="col-md-3">
        <input type="text" name="n_keakt" value="<?php echo ($this->input->post('n_keakt') ? $this->input->post('n_keakt') : $magang['n_keakt']); ?>" class="form-control" id="n_keakt" />
        <span class="text-danger"><?php echo form_error('n_keakt'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Motivasi dan Kreativitas</label>
    <div class="col-md-3">
        <input type="text" name="n_motiv" value="<?php echo ($this->input->post('n_motiv') ? $this->input->post('n_motiv') : $magang['n_motiv']); ?>" class="form-control" id="n_motiv" />
        <span class="text-danger"><?php echo form_error('n_motiv'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Kemampuan Kerja</label>
    <div class="col-md-3">
        <input type="text" name="n_kemam" value="<?php echo ($this->input->post('n_kemam') ? $this->input->post('n_kemam') : $magang['n_kemam']); ?>" class="form-control" id="n_kemam" />
        <span class="text-danger"><?php echo form_error('n_kemam'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Kerja Sama</label>
    <div class="col-md-3">
        <input type="text" name="n_kerja" value="<?php echo ($this->input->post('n_kerja') ? $this->input->post('n_kerja') : $magang['n_kerja']); ?>" class="form-control" id="n_kerja" />
        <span class="text-danger"><?php echo form_error('n_kerja'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Kehadiran</label>
    <div class="col-md-3">
        <input type="text" name="n_kehad" value="<?php echo ($this->input->post('n_kehad') ? $this->input->post('n_kehad') : $magang['n_kehad']); ?>" class="form-control" id="n_kehad" />
        <span class="text-danger"><?php echo form_error('n_kehad'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Kesopanan</label>
    <div class="col-md-3">
        <input type="text" name="n_kesop" value="<?php echo ($this->input->post('n_kesop') ? $this->input->post('n_kesop') : $magang['n_kesop']); ?>" class="form-control" id="n_kesop" />
        <span class="text-danger"><?php echo form_error('n_kesop'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Nilai Kerapihan</label>
    <div class="col-md-3">
        <input type="text" name="n_kerap" value="<?php echo ($this->input->post('n_kerap') ? $this->input->post('n_kerap') : $magang['n_kerap']); ?>" class="form-control" id="n_kerap" />
        <span class="text-danger"><?php echo form_error('n_kerap'); ?></span>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>

<?php echo form_close(); ?>