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
                            <?= form_open_multipart('admin/product/edit/'.$data['product_id'], ['class'=>'form-horizontal']) ?>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="_name_" class="col-sm-3 col-form-label text-right">Category</label>
                                        <div class="col-sm-6">
                                            <select name="_category_" class="form-control select2bs4">
                                                <?php foreach ($category as $key => $value) { ?>
                                                    <option value="<?= $value['category_id'] ?>"><?= $value['category_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_name_" class="col-sm-3 col-form-label text-right">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_name_" class="form-control" id="_name_" placeholder="Name" value="<?= old('_name_') ? old('_name_') : $data['product_name'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_description_" class="col-sm-3 col-form-label text-right">Description</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_description_" class="form-control" id="_description_" placeholder="Description" value="<?= old('_description_') ? old('_description_') : $data['product_description'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_stock_" class="col-sm-3 col-form-label text-right">Stock</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_stock_" class="form-control" id="_stock_" placeholder="Stock" value="<?= old('_stock_') ? old('_stock_') : $data['product_stock'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_capital_" class="col-sm-3 col-form-label text-right">Capital</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_capital_" class="form-control" id="_capital_" placeholder="Capital" value="<?= old('_capital_') ? old('_capital_') : $data['product_capital'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_price_" class="col-sm-3 col-form-label text-right">Price</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="_price_" class="form-control" id="_price_" placeholder="Price" value="<?= old('_price_') ? old('_price_') : $data['product_price'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="_image_" class="col-sm-3 col-form-label text-right">Image</label>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <?php
                                                        if (strpos($data['product_image'], 'default') || empty($data['product_image'])) {
                                                            $url = base_url('images/product/default.png');
                                                        } else {
                                                            $url = site_url('uploads/product/'.$data['product_image']);
                                                        }
                                                    ?>
                                                    <img src="<?= $url ?>" id="img-preview" alt="Preview Image" class="img-thumbnail">
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

            $("#_stock_, #_capital_, #_price_").inputmask({
                alias: "numeric",
                rightAlign: false,
                showMaskOnHover: false
            });
        });
    </script>
<?= $this->endSection() ?>
