<div id="content-wrapper" class="d-flex flex-column" style="height: 100vh;">
    <div class="text-center mt-4">
        <div class="d-flex align-items-center justify-content-center" style="font-size: 2.5rem;">
            <div class="rotate-n-15">
                <i class="fas fa-swatchbook"></i>
            </div>
            <div class="mx-3">LMS</div>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card shadow mt-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Register</h6>
                </div>
                
                <div class="card-body">
                    <form onsubmit="return false" method="post">
                    <!-- <form action="<?= base_url("userapi/login") ?>" method="post"> -->
                        <div class="row">
                            <div class="col mb-4">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="confirm-password" class="form-control" id="confirm-password">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="button" disabled>
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            <span class="sr-only">Loading...</span>
                        </button>
                        <input type="submit" value="Register" class="btn btn-primary btn-block" id="register-button">
                        <a href="<?= base_url("login") ?>" role="button" class="btn btn-primary btn-block">Login</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>