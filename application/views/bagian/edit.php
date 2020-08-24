<?php echo form_open('bagian/edit/'.$bagian['id_bagian'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nama_bagian" class="col-md-4 control-label"><span class="text-danger">*</span>Nama Bagian</label>
		<div class="col-md-8">
			<input type="text" name="nama_bagian" value="<?php echo ($this->input->post('nama_bagian') ? $this->input->post('nama_bagian') : $bagian['nama_bagian']); ?>" class="form-control" id="nama_bagian" />
			<span class="text-danger"><?php echo form_error('nama_bagian');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>