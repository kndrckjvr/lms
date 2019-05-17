<div id="content-wrapper" class="d-flex flex-column">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card shadow mt-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
                </div>
                
                <div class="card-body">
                    <form onsubmit="return false" method="post" id="user-create-form">
                    <!-- <form action="<?= base_url("userapi/create") ?>" method="post"> -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username here">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password here">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="user-type">User Type</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="user-type" id="user" value="User" checked>
                                    <label class="form-check-label" for="user">User</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="user-type" id="admin" value="Admin">
                                    <label class="form-check-label" for="admin">Admin</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="create-user">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    

$("#create-user").on('click', function () {
    $("input").removeClass("is-invalid");
        isLoading(true);
        $.ajax({
            url: baseUrl + "userapi/create",
            type: "POST",
            dataType: "JSON",
            data: {
                username: $("#username").val(),
                password: $("#password").val(),
                user_type: $("#user").prop("checked") ? 0 : 1
            },
            success: function success(res) {
                if (res.response) {
                    $("#user-create-form").trigger("reset");
                    showSnackbar("Successfully Added!");
                } else {
                    if (res.username) {
                        $("#username + .invalid-feedback").html(res.username);
                        $("#username").addClass("is-invalid");
                    }
                    if (res.password) {
                        $("#password + .invalid-feedback").html(res.password);
                        $("#password").addClass("is-invalid");
                    }
                }
            },
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
            },
            complete: complete()
        });
    });
});
</script>