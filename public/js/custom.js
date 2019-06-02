function showSnackbar(message, type) {
    $("#snackbar").html(message);
    switch (type) {
        case "error":
            $("#snackbar").css("background-color", "#e74a3b");
            break;
        default:
            $("#snackbar").css("background-color", "#1cc88a");
            break
    }
    $("#snackbar").addClass("show");
    setTimeout(function () { $("#snackbar").removeClass("show"); }, 3000);
}

$("#login-button").on('click', function (e) {
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

            if (res.response) {
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


$("#submit-button").on('click', function (e) {
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
            console.target.log(err);
        }
    });
});

$("#new-password-button").on('click', function (e) {
    $(e.target.firstElementChild).show();
    $(e.target.lastElementChild).html("Loading...");
    $("input").removeClass("is-invalid");
    var getthisURL = window.location;
    var code = getthisURL.pathname.split('/')[5];
    $.ajax({
        url: baseUrl + "userapi/reset_password_confirm",
        type: "POST",
        dataType: "JSON",
        data: {
            new_password: $("#new_password").val(),
            confirm_new_password: $("#confirm_new_password").val(),
            code: code

        },
        success: function success(res) {
            // console.log(res);
            if (res.response) {
                window.location = baseUrl + "login";
            } else {
                $(e.target.firstElementChild).hide();
                $(e.target.lastElementChild).html("Submit");
                if (res.new_password) {
                    $("#new_password + .invalid-feedback").html(res.new_password);
                    $("#new_password").addClass("is-invalid");
                }
                if (res.confirm_new_password) {
                    $("#confirm_new_password + .invalid-feedback").html(res.confirm_new_password);
                    $("#confirm_new_password").addClass("is-invalid");
                }
            }
        },
        error: function error(err) {
            // console.target.log(err);
            console.log(err);
        }
    });
});

function pageHandler(currentPage, pages) {
    if (currentPage == 1) {
        $(".page-item.prev").addClass("disabled");
    } else {
        $(".page-item.prev").removeClass("disabled");
    }

    if (currentPage == pages || pages == 0) {
        $(".page-item.next").addClass("disabled");
    } else {
        $(".page-item.next").removeClass("disabled");
    }
}

;
(function ($) {
    $.fn.extend({
        donetyping: function (callback, timeout) {
            timeout = timeout || 1e3;
            var timeoutReference,
                doneTyping = function (el) {
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function (i, el) {
                var $el = $(el);
                $el.is(':input') && $el.on('keyup keypress paste', function (e) {
                    if (e.type == 'keyup' && e.keyCode != 8) return;
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function () {
                        doneTyping(el);
                    }, timeout);
                }).on('blur', function () {
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);
// document.getElementById("book-search-field").onkeyup = function(){
//   var name_value = $("#book-search-field").val().toLowerCase();
//   $(".book-class").each(function () {
//     $(this).toggle($(this).text().toLowerCase().includes(name_value));
//   });
// }