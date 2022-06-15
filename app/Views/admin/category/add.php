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
                            <?= form_open('admin/category/add', ['class'=>'form-horizontal']) ?>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="_name_" class="col-sm-3 col-form-label text-right">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_name_" class="form-control" id="_name_" placeholder="Name" value="<?= old('_name_') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_description_" class="col-sm-3 col-form-label text-right">Description</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_description_" class="form-control" id="_description_" placeholder="Description" value="<?= old('_description_') ?>">
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

