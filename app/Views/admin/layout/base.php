<!DOCTYPE html>
<html lang="en">
<head>

    <?= $this->include('admin/layout/head') ?>
    <?= $this->renderSection('head') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?= $this->include('admin/layout/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->include('admin/layout/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content') ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <?= $this->include('admin/layout/control') ?>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?= $this->include('admin/layout/footer') ?>
        
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?= $this->include('admin/layout/javascript') ?>
    
    <?= $this->renderSection('javascript') ?>
    
</body>
</html>
