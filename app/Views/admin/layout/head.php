        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BaseCI4</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template/dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">


    <?php if(isset($daterange) && $daterange) { ?>
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?= base_url('template/plugins/daterangepicker/daterangepicker.css') ?>">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="<?= base_url('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <?php } ?>

    
    <?php if(isset($icheck) && $icheck) { ?>
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?= base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <?php } ?>
    

    <?php if(isset($colorpicker) && $colorpicker) { ?>
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="<?= base_url('template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') ?>">
    <?php } ?>
        

    <?php if(isset($select2) && $select2) { ?>
        <!-- Select2 -->
        <link rel="stylesheet" href="<?= base_url('template/plugins/select2/css/select2.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <?php } ?>
    
    
    <?php if(isset($summernote) && $summernote) { ?>
        <!-- summernote -->
        <link rel="stylesheet" href="<?= base_url('template/plugins/summernote/summernote-bs4.min.css') ?>">
    <?php } ?>


    <?php if(isset($datatables) && $datatables) { ?>
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <?php } ?>
