<?php echo form_open('jabatan/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nama_jabatan" class="col-md-4 control-label"><span class="text-danger">*</span>Nama Jabatan</label>
		<div class="col-md-8">
			<input type="text" name="nama_jabatan" value="<?php echo $this->input->post('nama_jabatan'); ?>" class="form-control" id="nama_jabatan" />
			<span class="text-danger"><?php echo form_error('nama_jabatan');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>