<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
            </div>

            <div class="card-body">
                <form onsubmit="return false" method="post" id="user-profile-form">
                    <button type="button" class="btn btn-primary btn-block mb-3" id="change-username">Change Username</button>
                    <div class="form-row mb-3 change-username" style="display: none">
                        <div class="col">
                            <label>Username</label>
                            <input type="text" class="form-control" id="current-username" value="<?= $username ?>" disabled>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label for="username">New Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-block mb-3" id="change-password">Change Password</button>
                    <div class="change-password" style="display: none">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="confpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confpassword" name="password">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Password strength: <strong id="str"></strong></p><br>
                        </div>
                        <div class="row">
                            <ul>
                                <li>Use minimum of 6 Characters</li>
                                <li>Besides letters, include at least a number or symbol (!@#$%^&*+=._-)</li>
                                <li>Password is case sensitive</li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="update-user-profile" style="display: none;">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>

<script>
    var changeUsername = false,
        changePassword = false;
    jQuery(document).ready(function($) {
        $("#change-password").on('click', function() {
            swal({
                title: "Change Password?",
                text: "You will be changing your password?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((proceed) => {
                if (proceed) {
                    changePassword = true;
                    $("#change-password").hide();
                    $(".change-password").fadeIn();
                    $("#update-user-profile").fadeIn();
                }
            })
        });

        $("#change-username").on('click', function() {
            swal({
                title: "Change Username?",
                text: "You will be changing your Username?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((proceed) => {
                if (proceed) {
                    changeUsername = true;
                    $("#change-username").hide();
                    $(".change-username").fadeIn();
                    $("#update-user-profile").fadeIn();
                }
            })
        });

        $("#user-profile-form").submit(function() {
            $("input").removeClass("is-invalid");
            isLoading(true);
            $.ajax({
                url: baseUrl + "userapi/update",
                type: "POST",
                dataType: "JSON",
                data: {
                    username: $("#username").val(),
                    password: $("#password").val(),
                    confirm_password: $("#confpassword").val(),
                    passwordChange: changePassword ? "1" : "0",
                    usernameChange: changeUsername ? "1" : "0"
                },
                success: function success(res) {
                    if (res.response) {
                        showSnackbar("Successfully Updated!");

                        $("#current-username").val($("#username").val());
                        $("#username").val("");
                        $("#update-user-profile").hide();
                        
                        if (changeUsername) {
                            changeUsername = false;
                            $("#change-username").fadeIn();
                            $(".change-username").hide();
                        }
                        
                        if (changePassword) {
                            changePassword = false;
                            $("#change-password").fadeIn();
                            $(".change-password").hide();
                        }
                    } else {
                        if (res.username) {
                            $("#username").addClass("is-invalid");
                            $("#username+.invalid-feedback").html(res.username);
                        }
                        if (res.password) {
                            $("#password").addClass("is-invalid");
                            $("#password+.invalid-feedback").html(res.password);
                        }
                        if (res.confirm_password) {
                            $("#confpassword").addClass("is-invalid");
                            $("#confpassword+.invalid-feedback").html(res.confirm_password);
                        }
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        });

        $("#password").on("input", function() {
            this.value = this.value.replace(/\s/, '');
        });

        $("#password").on("keyup", function() {
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
    });
</script>