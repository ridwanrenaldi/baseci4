<?= $this->extend('auth/layout/base') ?>

<?= $this->section('content') ?>
<div class="<?= isset($box) ? $box : '' ?>">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= site_url('') ?>" class="h1"><b>Base</b>CI4</a>
        </div>

        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <?= form_open('auth/register') ?>
                <div class="input-group mb-3">
                    <input type="text" name="_name_" class="form-control" placeholder="Full name" value="<?= old('_name_') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="_username_" class="form-control" placeholder="Username" value="<?= old('_username_') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="_email_" class="form-control" placeholder="Email" value="<?= old('_email_') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
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

                <div class="input-group mb-3">
                    <input type="password" name="_passconf_" class="form-control" placeholder="Retype password" value="<?= old('_passconf_') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?= form_close() ?>

            <a href="<?= site_url('auth/login') ?>" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?= $this->endSection() ?>
