<?php echo form_open('user/changepass/', array("class" => "form-horizontal")); ?>

<div class="form-group">
    <label for="email" class="col-md-4 control-label"><span class="text-danger">*</span>Email</label>
    <div class="col-md-8">
        <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $profil['email']); ?>" class="form-control" id="email" />
        <span class="text-danger"><?php echo form_error('email'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password Lama</label>
    <div class="col-md-8">
        <input type="password" name="password" class="form-control" id="password" />
        <span class="text-danger"><?php echo form_error('password'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-md-4 control-label"><span class="text-danger">*</span>Password Baru</label>
    <div class="col-md-8">
        <input type="password" name="newpass" class="form-control" id="newpass" />
        <span class="text-danger"><?php echo form_error('newpass'); ?></span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>

<?php echo form_close(); ?>