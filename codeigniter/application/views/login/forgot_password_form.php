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
                        <div class="row">
                            <div class="col mb-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="button" id="submit-button">
                            <span class="spinner-border spinner-border-sm" style="display: none;" role="status"></span>
                            <span class="button-text">
                                Submit
                            </span>
                        </button>
                        <!-- <input type="submit" value="Login" class="btn btn-primary btn-block"> -->
                        <a href="<?= base_url("login") ?>" role="button" class="btn btn-primary btn-block">Login</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $("#submit-button").on('click', function(e) {
            $(e.target.firstElementChild).show();
            $(e.target.lastElementChild).html("Loading...");
            $("input").removeClass("is-invalid");
            $.ajax({
                url: baseUrl + "userapi/reset_password",
                type: "POST",
                dataType: "JSON",
                data: {
                    email: $("#email").val()
                },
                success: function success(res) {
                    console.log(res);
                    if (res.response) {
                        window.location = baseUrl + "login";
                    } else {
                        $(e.target.firstElementChild).hide();
                        $(e.target.lastElementChild).html("Submit");
                        $("input").addClass("is-invalid");
                        // $(".invalid-feedback").html(res.message);
                        console.log(res);
                    }
                },
                error: function error(err) {
                    console.log(err.responseText);
                }
            });
        });
    });
</script>