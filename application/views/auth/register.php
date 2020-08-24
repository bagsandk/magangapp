<div class="row">
    <div class="col-lg">
        <div class="p-5">
            <div class="text-center">
                <img src="<?= base_url('./assets/img/logo_ptpn7.png') ?>" alt="logo" width="125" height="60" class="mb-4">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <?php echo form_open('auth/register', array("class" => "user")); ?>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama lengkap" name="nama" value="<?php echo $this->input->post('nama'); ?>">
                <span class="text-danger"><?php echo form_error('nama'); ?></span>
            </div>
            <div class="form-group pl-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="" checked>
                    <label class="form-check-label" for="jk1">
                        -
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="l">
                    <label class="form-check-label" for="jk1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="jk2" value="p">
                    <label class="form-check-label" for="jk2">
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="tmp_lahir" placeholder="Tempat lahir" name="tmp_lahir" value="<?php echo $this->input->post('tmp_lahir'); ?>">
                    <span class="text-danger"><?php echo form_error('tmp_lahir'); ?></span>
                </div>
                <div class="col-sm-6">
                    <input onfocus="(this.type='date')" class="form-control form-control-user" id="tgl_lahir" placeholder="Tanggal lahir" name="tgl_lahir" value="<?php echo $this->input->post('tgl_lahir'); ?>">
                    <span class="text-danger"><?php echo form_error('tgl_lahir'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" value="<?php echo $this->input->post('email'); ?>" name="email">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="no_hp" placeholder="No HP" name="no_hp" value="<?php echo $this->input->post('no_hp'); ?>">
                <span class="text-danger"><?php echo form_error('no_hp'); ?></span>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="<?php echo $this->input->post('password1'); ?>" name="password1">
                    <span class="text-danger"><?php echo form_error('password1'); ?></span>
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" value="<?php echo $this->input->post('password2'); ?>" name="password2">
                    <span class="text-danger"><?php echo form_error('password2'); ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-user btn-block"> Daftar </button>
            <?php echo form_close(); ?>
            <div class="text-center">
                <a class="small text-success" href="<?= base_url() ?>auth">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>