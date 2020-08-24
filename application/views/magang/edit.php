<?php echo form_open('magang/edit/' . $magang['id_magang'], array("class" => "form-horizontal")); ?>

<div class="form-group">
	<label for="id_mhs" class="col-md-4 control-label"><span class="text-danger">*</span>Mahasiswa Magang</label>
	<div class="col-md-8">
		<select name="id_mhs" class="form-control">
			<option value="">Pilih mahasiswa magang</option>
			<?php
			foreach ($all_tbl_mhs_magang as $mhs_magang) {
				$selected = ($mhs_magang['id_mhs'] == $magang['id_mhs']) ? ' selected="selected"' : "";

				echo '<option value="' . $mhs_magang['id_mhs'] . '" ' . $selected . '>' . $mhs_magang['nama'] . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('id_mhs'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="id_bagian" class="col-md-4 control-label"><span class="text-danger">*</span>Bagian</label>
	<div class="col-md-8">
		<select name="id_bagian" class="form-control">
			<option value="">Pilih bagian</option>
			<?php
			foreach ($all_tbl_bagian as $bagian) {
				$selected = ($bagian['id_bagian'] == $magang['id_bagian']) ? ' selected="selected"' : "";

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
			<option value="">Pilih pegawai</option>
			<?php
			foreach ($all_tbl_pegawai as $pegawai) {
				$selected = ($pegawai['kode_pegawai'] == $magang['kode_pegawai']) ? ' selected="selected"' : "";

				echo '<option value="' . $pegawai['kode_pegawai'] . '" ' . $selected . '>' . $pegawai['nama_pegawai'] . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('kode_pegawai'); ?></span>
	</div>
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
	<label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Status</label>
	<div class="col-md-8">
		<select name="status_magang" class="form-control">
			<option value="">Status magang</option>
			<?php
			$status_magang_values = array(
				'f' => 'Magang',
				't' => 'Selesai',
			);

			foreach ($status_magang_values as $value => $display_text) {
				$selected = ($value == $magang['status_magang']) ? ' selected="selected"' : "";

				echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('status_magang'); ?></span>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?php echo form_close(); ?>