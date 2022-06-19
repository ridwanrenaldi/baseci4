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

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>IsActive</th>
                                        <th>Image</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $value['account_name'] ?></td>
                                        <td><?= $value['account_username'] ?></td>
                                        <td><?= $value['account_email'] ?></td>
                                        <td><?= $value['account_level'] ?></td>
                                        <td><?= $value['account_isactive'] ?></td>
                                        <td>
                                            <?php
                                                if (strpos($value['account_image'], 'default') || empty($value['account_image'])) {
                                                    $url = base_url('images/account/default.png');
                                                } else {
                                                    $url = site_url('uploads/account/'.$value['account_image']);
                                                }
                                            ?>
                                            <img src="<?= $url ?>" id="img-preview" alt="Preview Image" class="img-thumbnail" width="100">
                                        </td>
                                        <td><?= $value['account_created'] ?></td>
                                        <td><?= $value['account_modified'] ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/account/edit/'.$value['account_id'])?>" data-toggle="tooltip" title="Edit">
                                                <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                            </a>

                                            <?= form_open('admin/account/delete/'.$value['account_id'], ['class'=>'d-inline']) ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btndelete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                                            <?= form_close() ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                                </table>
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


<?= $this->section('javascript') ?>
<script>
    $(document).ready(function(){
        $(function () {
            $("#example1").DataTable({
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                dom: "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-6'B><'col-sm-12 col-md-3'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            });
        });

        $('.btndelete').on('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parents('form').submit();
                }
            });

        });
    });
</script>
<?= $this->endSection() ?>