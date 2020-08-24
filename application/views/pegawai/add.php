<?php echo form_open_multipart('pegawai/add', array("class" => "form-horizontal")); ?>
<div class="form-group">
	<label for="id_user" class="col-md-4 control-label"><span class="text-danger">*</span>User</label>
	<div class="col-md-8">
		<select name="id_user" class="form-control">
			<option value="">select user</option>
			<?php
			foreach ($all_users as $user) {
				$selected = ($user['id_user'] == $this->input->post('id_user')) ? ' selected="selected"' : "";

				echo '<option value="' . $user['id_user'] . '" ' . $selected . '>' . $user['email'] . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('id_user'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="nama_pegawai" class="col-md-4 control-label"><span class="text-danger">*</span>Nama</label>
	<div class="col-md-8">
		<input type="text" name="nama_pegawai" value="<?php echo $this->input->post('nama_pegawai'); ?>" class="form-control" id="nama_pegawai" />
		<span class="text-danger"><?php echo form_error('nama_pegawai'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="jk" class="col-md-4 control-label"><span class="text-danger">*</span>Jenis Kelamin</label>
	<div class="col-md-8">
		<select name="jk" class="form-control">
			<option value="">select</option>
			<?php
			$jk_values = array(
				'l' => 'Laki-laki',
				'p' => 'Perempuan',
			);

			foreach ($jk_values as $value => $display_text) {
				$selected = ($value == $this->input->post('jk')) ? ' selected="selected"' : "";

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
		<input type="text" name="tmp_lahir" value="<?php echo $this->input->post('tmp_lahir'); ?>" class="form-control" id="tmp_lahir" />
		<span class="text-danger"><?php echo form_error('tmp_lahir'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="tgl_lahir" class="col-md-4 control-label"><span class="text-danger">*</span>Tanggal Lahir</label>
	<div class="col-md-8">
		<input type="date" name="tgl_lahir" value="<?php echo $this->input->post('tgl_lahir'); ?>" class="form-control" id="tgl_lahir" />
		<span class="text-danger"><?php echo form_error('tgl_lahir'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="alamat" class="col-md-4 control-label"><span class="text-danger">*</span>Alamat</label>
	<div class="col-md-8">
		<input type="text" name="alamat" value="<?php echo $this->input->post('alamat'); ?>" class="form-control" id="alamat" />
		<span class="text-danger"><?php echo form_error('alamat'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="id_bagian" class="col-md-4 control-label"><span class="text-danger">*</span>Bagian</label>
	<div class="col-md-8">
		<select name="id_bagian" class="form-control">
			<option value="">Pilih bagian</option>
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
	<label for="id_jabatan" class="col-md-4 control-label"><span class="text-danger">*</span>Jabatan</label>
	<div class="col-md-8">
		<select name="id_jabatan" class="form-control">
			<option value="">Pilih jabatan</option>
			<?php
			foreach ($all_tbl_jabatan as $jabatan) {
				$selected = ($jabatan['id_jabatan'] == $this->input->post('id_jabatan')) ? ' selected="selected"' : "";

				echo '<option value="' . $jabatan['id_jabatan'] . '" ' . $selected . '>' . $jabatan['nama_jabatan'] . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('id_jabatan'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="foto" class="col-md-4 control-label"><span class="text-danger">*</span>Foto</label>
	<div class="col-md-8">
		<input type="file" name="foto" value="<?php echo $this->input->post('foto'); ?>" class="form-control " id="foto" />
		<span class="text-danger"><?php echo form_error('foto'); ?></span>
	</div>
</div>




<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?php echo form_close(); ?>