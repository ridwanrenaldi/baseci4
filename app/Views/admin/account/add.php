<?= $this->extend('admin/layout/base') ?>

<?= $this->section('content') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?= $this->include('admin/layout/contentheader') ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <!-- Card Header -->
                            <?= $this->include('admin/layout/cardheader') ?>
                            <!-- /.card-header -->
                            
                            <!-- form start -->
                            <?= form_open_multipart('admin/account/add', ['class'=>'form-horizontal']) ?>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="_name_" class="col-sm-3 col-form-label text-right">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_name_" class="form-control" id="_name_" placeholder="Name" value="<?= old('_name_') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_username_" class="col-sm-3 col-form-label text-right">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_username_" class="form-control" id="_username_" placeholder="Username" value="<?= old('_username_') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_email_" class="col-sm-3 col-form-label text-right">Email</label>
                                        <div class="col-sm-6">
                                            <input type="email" name="_email_" class="form-control" id="_email_" placeholder="Email" value="<?= old('_email_') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_password_" class="col-sm-3 col-form-label text-right">Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="_password_" class="form-control" id="_password_" placeholder="Password" value="<?= old('_password_') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_passconf_" class="col-sm-3 col-form-label text-right">Confirm Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="_passconf_" class="form-control" id="_passconf_" placeholder="Confirm Password" value="<?= old('_passconf_') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_role_" class="col-sm-3 col-form-label text-right">Role</label>
                                        <div class="col-sm-6">
                                            <select name="_role_" class="form-control select2bs4">
                                                <option selected hidden disabled>- Choose Role -</option>
                                                <option value="root" <?= old('_role_')=='root' ? 'selected' : ''?>>Root</option>
                                                <option value="admin" <?= old('_role_')=='admin' ? 'selected' : ''?>>Admin</option>
                                                <option value="user" <?= old('_role_')=='user' ? 'selected' : ''?>>User</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_image_" class="col-sm-3 col-form-label text-right">Image</label>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img src="<?= base_url('images/account/default.png')?>" id="img-preview" alt="Preview Image" class="img-thumbnail">
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="_image_" name="_image_" accept="image/*">
                                                        <label class="custom-file-label" for="customFile" id="_filename_" style="overflow: hidden;">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="button" class="btn btn-warning" onclick="javascript:window.history.back();">Cancel</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            <?= form_close() ?>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script>
        $(document).ready(function(){
            $('#_image_').on('change', function() {
                $('#_filename_').text($(this).get(0).files[0].name);
                $('#img-preview')[0].src = (window.URL ? URL : webkitURL).createObjectURL($(this).get(0).files[0]);
            });
        });
    </script>
<?= $this->endSection() ?>

