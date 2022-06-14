            
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= isset($title) ? $title : '' ?></h1>
                    </div><!-- /.col -->
                    
                    <?php if(isset($breadcrumb)){ ?>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <?php $keys = array_keys($breadcrumb); foreach ($breadcrumb as $key => $value) { 
                                if ($key != end($keys)) {?>
                                <li class="breadcrumb-item"><a href="<?= $value ?>"><?= $key ?></a></li>
                            <?php } else { ?>
                                <li class="breadcrumb-item active"><?= $key ?></li>
                            <?php }} ?>
                        </ol>
                    </div><!-- /.col -->
                    <?php } ?>

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>