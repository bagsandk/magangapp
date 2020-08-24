<?php echo form_open('user/edit/' . $user['id_user'], array("class" => "form-horizontal")); ?>

<div class="form-group">
	<label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password</label>
	<div class="col-md-8">
		<input type="password" name="password" class="form-control" id="password" />
		<span class="text-danger"><?php echo form_error('password'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
	<div class="col-md-8">
		<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
		<span class="text-danger"><?php echo form_error('email'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="role" class="col-md-4 control-label"><span class="text-danger">*</span>Role</label>
	<div class="col-md-8">
		<select name="role" class="form-control">
			<option value="">select</option>
			<?php
			$role_values = array(
				'1' => 'Admin',
				'2' => 'Pegawai',
				'3' => 'Mahasiswa Magang',
			);

			foreach ($role_values as $value => $display_text) {
				$selected = ($value == $user['role']) ? ' selected="selected"' : "";

				echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('role'); ?></span>
	</div>
</div>
<div class="form-group">
	<label for="aktif" class="col-md-4 control-label"><span class="text-danger">*</span>Aktif</label>
	<div class="col-md-8">
		<select name="aktif" class="form-control">
			<option value="">select</option>
			<?php
			$aktif_values = array(
				'f' => 'Tidak Aktif',
				't' => 'AKtif',
			);

			foreach ($aktif_values as $value => $display_text) {
				$selected = ($value == $user['aktif']) ? ' selected="selected"' : "";

				echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
			}
			?>
		</select>
		<span class="text-danger"><?php echo form_error('aktif'); ?></span>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>

<?php echo form_close(); ?>