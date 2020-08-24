<div class="row">
    <div class="col-lg">
        <div class="p-5">
            <div class="text-center">
                <img src="<?= base_url('./assets/img/logo_ptpn7.png') ?>" alt="logo" width="125" height="60" class="mb-4">
                <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <form class="user" method="POST" action="<?= base_url(); ?>auth/login">
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email atau Username" name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" minlength="8">
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block"> Login </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small text-success" href="<?= base_url(); ?>auth/register">Create an Account!</a>
            </div>
        </div>
    </div>
</div>