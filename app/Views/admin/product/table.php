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
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Capital</th>
                                        <th>Price</th>
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
                                        <td><?= $value['product_code'] ?></td>
                                        <td><?= $value['product_name'] ?></td>
                                        <td><?= $value['product_description'] ?></td>
                                        <td><?= $value['product_stock'] ?></td>
                                        <td><?= $value['product_capital'] ?></td>
                                        <td><?= $value['product_price'] ?></td>
                                        <td><?= $value['product_image'] ?></td>
                                        <td><?= $value['product_created'] ?></td>
                                        <td><?= $value['product_modified'] ?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/product/edit/'.$value['product_id'])?>" data-toggle="tooltip" title="Edit">
                                                <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                            </a>

                                            <?= form_open('admin/product/delete/'.$value['product_id'], ['class'=>'d-inline']) ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
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
    });
</script>
<?= $this->endSection() ?>