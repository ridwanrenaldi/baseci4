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
                        <div class="card card-info card-outline">

                            
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <?php
                                        if (empty($data['account_image']) || strpos($data['account_image'], 'default')) {
                                            $url = base_url('images/account/default.png');
                                        } else {
                                            $url = site_url('uploads/account/'.$data['account_image']);
                                        }
                                    ?>
                                    <img class="profile-user-img img-fluid img-circle elevation-2" src="<?= $url ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $data['account_name'] ?></h3>

                                <p class="text-muted text-center">My Profile</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Username</b> <a class="float-right"><?= $data['account_username'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right"><?= $data['account_email'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Role</b> <a class="float-right"><?= $data['account_role'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Is Active</b> <a class="float-right"><?php if($data['account_isactive']){echo 'True';}else{echo 'False';} ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Modified</b> <a class="float-right"><?= $data['account_modified'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Created</b> <a class="float-right"><?= $data['account_created'] ?></a>
                                    </li>
                                </ul>

                                <a href="<?= site_url('admin/profile/edit') ?>" class="btn btn-info btn-block"><b>Edit Profile</b></a>
                            </div>
                            <!-- /.card-body -->

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

