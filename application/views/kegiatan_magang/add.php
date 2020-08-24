<?php echo form_open('kegiatan_magang/add', array("class" => "form-horizontal")); ?>

<?php if ($this->session->userdata('role') == 1) { ?>
	<div class="form-group">
		<label for="id_magang" class="col-md-4 control-label"><span class="text-danger">*</span>Magang</label>
		<div class="col-md-8">
			<select name="id_magang" class="form-control">
				<option value="">Pilih data magang</option>
				<?php
				foreach ($all_tbl_magang as $magang) {
					$selected = ($magang['id_magang'] == $this->input->post('id_magang')) ? ' selected="selected"' : "";

					echo '<option value="' . $magang['id_magang'] . '" ' . $selected . '>' . $magang['nama'] . '</option>';
				}
				?>
			</select>
			<span class="text-danger"><?php echo form_error('id_magang'); ?></span>
		</div>
	</div>
<?php } ?>
<div class="form-group">
	<label for="nama_kegiatan" class="col-md-4 control-label"><span class="text-danger">*</span>Nama Kegiatan</label>
	<div class="col-md-8">
		<input type="text" name="nama_kegiatan" value="<?php echo $this->input->post('nama_kegiatan'); ?>" class="form-control" id="nama_kegiatan" />
		<span class="text-danger"><?php echo form_error('nama_kegiatan'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="deskripsi" class="col-md-4 control-label"><span class="text-danger">*</span>Deskripsi</label>
	<div class="col-md-8">
		<input type="text" name="deskripsi" value="<?php echo $this->input->post('deskripsi'); ?>" class="form-control" id="deskripsi" />
		<span class="text-danger"><?php echo form_error('deskripsi'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="tgl_kegiatan" class="col-md-4 control-label">Tanggal Kegiatan </label>
	<div class="col-md-8">
		<input type="date" name="tgl_kegiatan" value="<?php echo $this->input->post('tgl_kegiatan'); ?>" class="form-control" id="tgl_kegiatan" />
		<span class="text-danger"><?php echo form_error('tgl_kegiatan'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="alat" class="col-md-4 control-label">Alat</label>
	<div class="col-md-8">
		<input type="text" name="alat" value="<?php echo $this->input->post('alat'); ?>" class="form-control" id="alat" />
		<span class="text-danger"><?php echo form_error('alat'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="bahan" class="col-md-4 control-label">Bahan</label>
	<div class="col-md-8">
		<input type="text" name="bahan" value="<?php echo $this->input->post('bahan'); ?>" class="form-control" id="bahan" />
		<span class="text-danger"><?php echo form_error('bahan'); ?></span>
	</div>
</div>
<?php if ($this->session->userdata('role') == 1) { ?>
	<div class="form-group">
		<label for="nilai" class="col-md-4 control-label"><span class="text-danger">*</span>Status</label>
		<div class="col-md-8">
			<select name="verif" class="form-control">
				<option value="">Status</option>
				<?php
				$verif_values = array(
					't' => 'Diterima',
					'f' => 'Ditolak',
					'p' => 'Pending'
				);

				foreach ($verif_values as $value => $display_text) {
					$selected = ($value == $this->input->post('verif')) ? ' selected="selected"' : "";

					echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
				}
				?>
			</select>
			<span class="text-danger"><?php echo form_error('verif'); ?></span>
		</div>
	</div>
<?php } ?>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?php echo form_close(); ?>