  
    <!-- jQuery -->
    <script src="<?= base_url('template/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('template/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>

    <!-- DataTables  & Plugins -->
    <?php if(isset($datatables) && $datatables) { ?>
    <script src="<?= base_url('template/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/jszip/jszip.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/pdfmake/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/pdfmake/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('template/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
    <?php } ?>
