    </div>
</div>
</div>
<div id="snackbar"></div>
    <script src="<?= base_url("js/popper.min.js") ?>"></script>
    <script src="<?= base_url("js/jquery.easing.js") ?>"></script>
    <script src="<?= base_url("js/bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("js/bootstrap-select.min.js") ?>"></script>
    <script src="<?= base_url("js/ajax-bootstrap-select.min.js") ?>"></script>
    <script src="<?= base_url("js/template.js") ?>"></script>
    <script src="<?= base_url("js/sweetalert.min.js") ?>"></script>
    <script src="<?= base_url("js/custom.js") ?>"></script>
    <?php if(!empty($this->session->userdata("user_type"))) if($this->session->userdata("user_type") == 1) ?>
    <script src="<?= base_url("js/custom-admin.js") ?>"></script>
    <!-- <script src="../public/js/custom.js"></script> -->
</body>
</html>