<div class="modal fade" id="manage-user-modal" tabindex="-1" role="dialog" aria-labelledby="manage-user-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="manage-user-modal-title">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form onsubmit="return false" method="post" id="user-profile-form">
                        <input type="hidden" name="user_id" id="user-id-editor">
                        <button type="button" class="btn btn-primary btn-block mb-3" id="change-username">Change Username</button>
                        <div class="form-row mb-3 change-username" style="display: none">
                            <div class="col">
                                <label>Username</label>
                                <input type="text" class="form-control" id="current-username" value="" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="username-editor">New Username</label>
                                <input type="text" class="form-control" id="username-editor" name="username-editor">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block mb-3" id="change-password">Change Password</button>
                        <div class="change-password" style="display: none">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="password-editor">New Password</label>
                                    <input type="password" class="form-control" id="password-editor" name="password-editor">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col">
                                    <label for="confpassword-editor">Confirm Password</label>
                                    <input type="password" class="form-control" id="confpassword-editor" name="confpassword-editor">
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
                        <button type="button" class="btn btn-primary btn-block mb-3" id="change-user-type">Change User Type</button>
                        <div class="change-user-type" style="display: none">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="user-type">User Type</label><br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="user-type" id="user-editor" value="User">
                                        <label class="form-check-label" for="user">User</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="user-type" id="admin-editor" value="Admin">
                                        <label class="form-check-label" for="admin">Admin</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="update-user-profile" style="display: none;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var changeUsername = false,
        changeUserType = false,
        changePassword = false;
    jQuery(document).ready(function($) {
        $("#manage-user-modal").on('show.bs.modal', function(e) {
            $("#user-id-editor").val($(e.relatedTarget).data("id"));
            $.ajax({
                url: baseUrl + "userapi/getusereditor",
                type: "POST",
                dataType: "JSON",
                data: {
                    user_id: $(e.relatedTarget).data("id")
                },
                success: function success(res) {
                    $("#manage-user-modal-title").html("Edit: " + res.users.username);
                    $("#current-username").val(res.users.username);
                    if (res.users.user_type == "1") {
                        $("#admin-editor").prop("checked", true);
                    } else {
                        $("#user-editor").prop("checked", true);
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        });

        $("#manage-user-modal").on('hidden.bs.modal', function(e) {
            $("input").removeClass("is-invalid");
            $("#update-user-profile").hide();

            if (changeUsername) {
                changeUsername = false;
                $("#change-username").show();
                $(".change-username").hide();
            }

            if (changePassword) {
                changePassword = false;
                $("#change-password").show();
                $(".change-password").hide();
            }

            if (changeUserType) {
                changeUserType = false;
                $("#change-user-type").show();
                $(".change-user-type").hide();
            }
        });

        $("#change-user-type").on('click', function() {
            swal({
                title: "Change User Type?",
                text: "You will be changing your User Type?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((proceed) => {
                if (proceed) {
                    changeUserType = true;
                    $("#change-user-type").hide();
                    $(".change-user-type").fadeIn();
                    $("#update-user-profile").fadeIn();
                }
            })
        });

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
                    user_id: $("#user-id-editor").val(),
                    username: $("#username-editor").val(),
                    password: $("#password-editor").val(),
                    confirm_password: $("#confpassword-editor").val(),
                    user_type: $("#user-editor").prop("checked") ? 0 : 1,
                    passwordChange: changePassword ? "1" : "0",
                    usernameChange: changeUsername ? "1" : "0",
                    usertypeChange: changeUserType ? "1" : "0",
                },
                success: function success(res) {
                    if (res.response) {
                        $(".modal").modal("hide");
                        showSnackbar("Successfully Updated!");

                        $("#update-user-profile").hide();

                        if (changeUsername) {
                            changeUsername = false;
                            $("#change-username").show();
                            $(".change-username").hide();
                        }

                        if (changePassword) {
                            changePassword = false;
                            $("#change-password").show();
                            $(".change-password").hide();
                        }
                    } else {
                        if (res.username) {
                            $("#username-editor").addClass("is-invalid");
                            $("#username-editor+.invalid-feedback").html(res.username);
                        }
                        if (res.password) {
                            $("#password-editor").addClass("is-invalid");
                            $("#password-editor+.invalid-feedback").html(res.password);
                        }
                        if (res.confirm_password) {
                            $("#confpassword-editor").addClass("is-invalid");
                            $("#confpassword-editor+.invalid-feedback").html(res.confirm_password);
                        }
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        });

        $("#password-editor").on("input", function() {
            this.value = this.value.replace(/\s/, '');
        });

        $("#password-editor").on("keyup", function() {
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