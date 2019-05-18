<div id="content-wrapper" class="d-flex flex-column" style="height: 100vh;">
    <div class="text-center mt-4">
        <div class="d-flex align-items-center justify-content-center" style="font-size: 2.5rem;">
            <div class="rotate-n-15">
                <i class="fas fa-swatchbook"></i>
            </div>
            <div class="mx-3">LMS</div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card shadow mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Reset Password</h6>
                </div>
                
                <div class="card-body">
                    <form onsubmit="return false" method="post">
                    <!-- <form action="<?= base_url("userapi/login") ?>" method="post"> -->
                        <div class="row">
                            <div class="col mb-4">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4">
                                <label for="confirm_new_password">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirm_new_password">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="button" id="new-password-button">
                            <span class="spinner-border spinner-border-sm" style="display: none;" role="status"></span>
                            <span class="button-text">
                                Submit
                            </span>
                        </button>
                        <!-- <input type="submit" value="Login" class="btn btn-primary btn-block"> -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>