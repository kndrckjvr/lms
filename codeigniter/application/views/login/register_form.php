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
                    <h6 class="m-0 font-weight-bold text-primary">Register</h6>
                </div>
                
                <div class="card-body">
                    <form onsubmit="return false" method="post">
                        <div class="row">
                            <div class="col mb-4">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4">
                                <label for="username">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <div class="invalid-feedback"></div>
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
                                <input type="password" name="confirm-password" class="form-control" id="confirm_password">
                                <div class="invalid-feedback"></div>
                                <br>
                                <span>Password strength: <strong id="str"></strong></span>
                                <ul>
                                  <li>Use minimum of 6 Characters</li>
                                  <li>Besides letters, include at least a number or symbol (!@#$%^&*+=._-)</li>
                                  <li>Password is case sensitive</li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="button" id="register-button">
                            <span class="spinner-border spinner-border-sm" style="display: none;" role="status"></span>
                            <span class="button-text">
                                Register
                            </span>
                        </button>
                        <a href="<?= base_url("login") ?>" role="button" class="btn btn-primary btn-block">Login</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<script>
$("#password").on("input",function(){
  this.value = this.value.replace(/\s/, '');
});

$("#password").on("keyup", function(){
    var passval = this.value;

    var bad_regex = /^[a-z][^A-Z]\S{5,}$/;
    var bad_regex2 = /^[A-Z][^a-z]\S{5,}$/;
    var weak_regex = /^(?=.*[a-z])(?=.*[A-Z])\S{5,}$/;
    var weak_regex2 = /^(?=.*[A-Z])(?=.*[0-9])\S{5,}$/;
    var good_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])\S{5,}$/;
    var strong_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^\&*+=._-])\S{5,}$/;

    
    if (passval.length < 6) {
        $("#str").css("color", "#e74a3b").html("Too Short");
    }
    if (bad_regex.test(passval) || bad_regex2.test(passval)) {
        $("#str").css("color", "#f6c23e").html("Bad");
    }
    if (weak_regex.test(passval) || weak_regex2.test(passval)) {
        $("#str").css("color", "#36b9cc").html("Weak");
    }
    if (good_regex.test(passval)) {
        $("#str").css("color", "#lcc88a").html("Good");
    }
    if (strong_regex.test(passval)) {
        $("#str").css("color", "#4e73df").html("Strong");
    }
});

$("#register-button").on('click', function (e) {
    $(e.target.firstElementChild).show();
    $(e.target.lastElementChild).html("Loading...");
    $("input").removeClass("is-invalid");
    $.ajax({
        url: baseUrl + "userapi/register",
        type: "POST",
        dataType: "JSON",
        data: {
            username: $("#username").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            confirm_password: $("#confirm_password").val()
        },
        success: function success(res) {
            if (res.response) {
                window.location = baseUrl + "login";
            } else {
                $(e.target.firstElementChild).hide();
                $(e.target.lastElementChild).html("Register");
                if (res.username) {
                    $("#username + .invalid-feedback").html(res.username);
                    $("#username").addClass("is-invalid");
                }
                if (res.email) {
                    $("#email + .invalid-feedback").html(res.email);
                    $("#email").addClass("is-invalid");
                }
                if (res.password) {
                    $("#password + .invalid-feedback").html(res.password);
                    $("#password").addClass("is-invalid");
                }
                if (res.confirm_password) {
                    $("#confirm_password + .invalid-feedback").html(res.confirm_password);
                    $("#confirm_password").addClass("is-invalid");
                }
            }
        },
        error: function error(err) {
            console.target.log(err);
        }
    });
});
</script>