<!-- base:js -->
<script src="<?= base_url('assets/public/') ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= base_url('assets/public/') ?>vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('assets/public/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/public/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/public/') ?>js/template.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="<?= base_url('assets/public/') ?>js/dashboard.js"></script>
<!-- End custom js for this page-->
<!-- PLUGINS -->
<script src="<?= base_url('assets/public/') ?>vendors/datatables/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/public/') ?>vendors/datatables/js/jquery.dataTables.js"></script>

<!-- PRIVATE JS INCLUDE -->
<?php if (url(3) != null) : ?>
    <script src="<?= base_url('assets/private/') . url(3) ?>/script.js"></script>
<?php elseif (url(2) != null) : ?>
    <script src=" <?= base_url('assets/private/js/') . url(2) ?>/script.js"> </script>
<?php elseif (url(1) != null) : ?>
    <script src="<?= base_url('assets/private/js/') . url(1) ?>/script.js"></script>
<?php endif; ?>

<script src="<?= base_url('assets/private/js') ?>/script.js"></script>

<!-- CDN -->
<!-- <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
<!-- <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> -->