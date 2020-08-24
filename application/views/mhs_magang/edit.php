<?php echo form_open('mhs_magang/edit/' . $mhs_magang['id_mhs'], array("class" => "form-horizontal")); ?>

<div class="form-group">
	<label for="id_user" class="col-md-4 control-label">User</label>
	<div class="col-md-8">
		<select name="id_user" class="form-control">
			<option value="">Pilih user</option>
			<?php
			foreach ($all_users as $user) {
				$selected = ($user['id_user'] == $mhs_magang['id_user']) ? ' selected="selected"' : "";

				echo '<option value="' . $user['id_user'] . '" ' . $selected . '>' . $user['email'] . '</option>';
			}
			?>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="nama" class="col-md-4 control-label"><span class="text-danger">*</span>Nama</label>
	<div class="col-md-8">
		<input type="text" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $mhs_magang['nama']); ?>" class="form-control" id="nama" />
		<span class="text-danger"><?php echo form_error('nama'); ?></span>
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
				$selected = ($value == $mhs_magang['jk']) ? ' selected="selected"' : "";

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
		<input type="text" name="tmp_lahir" value="<?php echo ($this->input->post('tmp_lahir') ? $this->input->post('tmp_lahir') : $mhs_magang['tmp_lahir']); ?>" class="form-control" id="tmp_lahir" />
		<span class="text-danger"><?php echo form_error('tmp_lahir'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="tgl_lahir" class="col-md-4 control-label"><span class="text-danger">*</span>Tanggal Lahir</label>
	<div class="col-md-8">
		<input type="text" name="tgl_lahir" value="<?php echo ($this->input->post('tgl_lahir') ? $this->input->post('tgl_lahir') : $mhs_magang['tgl_lahir']); ?>" class="form-control" id="tgl_lahir" />
		<span class="text-danger"><?php echo form_error('tgl_lahir'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="alamat" class="col-md-4 control-label"><span class="text-danger">*</span>Alamat</label>
	<div class="col-md-8">
		<input type="text" name="alamat" value="<?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $mhs_magang['alamat']); ?>" class="form-control" id="alamat" />
		<span class="text-danger"><?php echo form_error('alamat'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="no_hp" class="col-md-4 control-label">No Hp</label>
	<div class="col-md-8">
		<input type="text" name="no_hp" value="<?php echo ($this->input->post('no_hp') ? $this->input->post('no_hp') : $mhs_magang['no_hp']); ?>" class="form-control" id="no_hp" />
		<span class="text-danger"><?php echo form_error('no_hp'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="asal_ptn" class="col-md-4 control-label"><span class="text-danger">*</span>Asal PTN</label>
	<div class="col-md-8">
		<input type="text" name="asal_ptn" value="<?php echo ($this->input->post('asal_ptn') ? $this->input->post('asal_ptn') : $mhs_magang['asal_ptn']); ?>" class="form-control" id="asal_ptn" />
		<span class="text-danger"><?php echo form_error('asal_ptn'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="npm" class="col-md-4 control-label"><span class="text-danger">*</span>NPM</label>
	<div class="col-md-8">
		<input type="text" name="npm" value="<?php echo ($this->input->post('npm') ? $this->input->post('npm') : $mhs_magang['npm']); ?>" class="form-control" id="npm" />
		<span class="text-danger"><?php echo form_error('npm'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="surat_tugas" class="col-md-4 control-label">Surat Tugas</label>
	<div class="col-md-8">
		<input type="text" name="surat_tugas" value="<?php echo ($this->input->post('surat_tugas') ? $this->input->post('surat_tugas') : $mhs_magang['surat_tugas']); ?>" class="form-control" id="surat_tugas" />
		<span class="text-danger"><?php echo form_error('surat_tugas'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Status</label>
	<div class="col-md-8">
		<select name="status" class="form-control">
			<option value="">Status</option>
			<?php
			$status_values = array(
				'p' => 'Panding',
				't' => 'Diterima',
				'f' => 'Ditolak',
			);

			foreach ($status_values as $value => $display_text) {
				$selected = ($value == $mhs_magang['status']) ? ' selected="selected"' : "";

				echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('status'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="foto" class="col-md-4 control-label"><span class="text-danger">*</span>Foto</label>
	<div class="col-md-8">
		<input type="text" name="foto" value="<?php echo ($this->input->post('foto') ? $this->input->post('foto') : $mhs_magang['foto']); ?>" class="form-control" id="foto" />
		<span class="text-danger"><?php echo form_error('foto'); ?></span>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?php echo form_close(); ?>