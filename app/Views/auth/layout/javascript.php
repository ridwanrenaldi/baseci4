<!-- jQuery -->
<script src="<?= base_url('template/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
<!-- Sweet Alert -->
<script src="<?= base_url('template/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>

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