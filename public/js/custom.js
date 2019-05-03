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

$("#login-button").on('click', function(e) {
    $(e.target.firstElementChild).show();
    $(e.target.lastElementChild).html("Loading...");
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
                $(e.target.firstElementChild).hide();
                $(e.target.lastElementChild).html("Login");
                $("input").addClass("is-invalid");
                $(".invalid-feedback").html(res.message);
            }
        },
        error: function error(err) {
            console.target.log(err);
        }
    });
});