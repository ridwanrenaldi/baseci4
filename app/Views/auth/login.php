<?= $this->extend('auth/layout/base') ?>

<?= $this->section('content') ?>
<div class="<?= isset($box) ? $box : '' ?>">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= site_url('') ?>" class="h1"><b>Base</b>CI4</a>
        </div>

        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?= form_open('auth/login') ?>
                <div class="input-group mb-3">
                    <input type="text" name="_username_" class="form-control" placeholder="Username" value="<?= old('_username_') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="_password_" class="form-control" placeholder="Password" value="<?= old('_password_') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?= form_close() ?>

            <p class="mb-1">
                <a href="<?= site_url('auth/forgot') ?>">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="<?= site_url('auth/register') ?>" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
<?= $this->endSection() ?>

