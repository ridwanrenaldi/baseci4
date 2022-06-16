  
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
    <!-- Sweet Alert -->
    <script src="<?= base_url('template/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>


    <?php if(isset($daterange) && $daterange) { ?>
        <!-- date-range-picker -->
        <script src="<?= base_url('template/plugins/daterangepicker/daterangepicker.js') ?>"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?= base_url('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
    <?php } ?>
    

    <?php if(isset($colorpicker) && $colorpicker) { ?>
        <!-- bootstrap color picker -->
        <script src="<?= base_url('template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ?>"></script>
    <?php } ?>


    <?php if(isset($select2) && $select2) { ?>
        <!-- Select2 -->
        <script src="<?= base_url('template/plugins/select2/js/select2.full.min.js') ?>"></script>
        <script>
            //Initialize Select2 Elements
            $(function () { $('.select2bs4').select2({ theme: 'bootstrap4' }); })
        </script>
    <?php } ?>

    
    <?php if(isset($inputmask) && $inputmask) { ?>
        <!-- InputMask -->
        <script src="<?= base_url('template/plugins/moment/moment.min.js') ?>"></script>
        <script src="<?= base_url('template/plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
    <?php } ?>
        
    <?php if(isset($switch) && $switch) { ?>
        <!-- Bootstrap Switch -->
        <script src="<?= base_url('template/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"></script>
    <?php } ?>
    

    <?php if(isset($summernote) && $summernote) { ?>
        <!-- Summernote -->
        <script src="<?= base_url('template/plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <?php } ?>


    <?php if(isset($datatables) && $datatables) { ?>
        <!-- DataTables  & Plugins -->
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


    <?php if(session()->has('notif')) { ?>
        <!-- Display Notification -->
        <script src="<?= base_url('dist/js/notif.js') ?>"></script>
        <script>
            $(document).ready(function(){
                notif(
                    "<?= isset(session()->getFlashdata('notif')['status']) ? session()->getFlashdata('notif')['status'] : '' ?>",
                    "<?= isset(session()->getFlashdata('notif')['title']) ? session()->getFlashdata('notif')['title'] : '' ?>",
                    "<?= isset(session()->getFlashdata('notif')['message']) ? session()->getFlashdata('notif')['message'] : '' ?>",
                    "<?= isset(session()->getFlashdata('notif')['redirect']) ? session()->getFlashdata('notif')['redirect'] : '' ?>"
                );
            });
        </script>
    <?php } ?>

    <script>
        var csrfName = '<?= csrf_token() ?>';
        var csrfHash = '<?= csrf_hash() ?>';
    </script>