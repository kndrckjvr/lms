function showSnackbar(message, type) {
    $("#snackbar").html(message);
    switch(type) {
        case "error":
            $("#snackbar").css("background-color", "#e74a3b");
        break;
        default:
            $("#snackbar").css("background-color", "#1cc88a");
        break
    }
    $("#snackbar").addClass("show");
    setTimeout(function(){ $("#snackbar").removeClass("show"); }, 3000);
}

$("#login-button").on('click', function() {
    $("input").removeClass("is-invalid");
    $.ajax({
        url: baseUrl + "userapi/login",
        type: "POST",
        dataType: "JSON",
        data: {
            username: $("#username").val(),
            password: $("#password").val()
        },
        success: function success(res) {
            if(res.response) {
                window.location = baseUrl + "user";
            } else {
                $("input").addClass("is-invalid");
                $(".invalid-feedback").html(res.message);
            }
        },
        error: function error(err) {
            console.log(err);
        }
    });
});

$("#create-user").on('click', function() {
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
            console.log(res);
            if(res.response) {
                $("#user-create-form").trigger("reset");
                showSnackbar("Successfully Added!");
            } else {
                $("input").addClass("is-invalid");
                $("#username + .invalid-feedback").html(res.username);
                $("#password + .invalid-feedback").html(res.password);
            }
        },
        error: function error(err) {
            console.log(err);
        }
    });
});