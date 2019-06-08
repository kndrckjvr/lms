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


//-----------------PASSWORD STRENGTH ANALYZER----------------------------------
var pass = document.getElementById("password");
var str = document.getElementById("str");
$("#password").on("input",function(){
  this.value = this.value.replace(/\s/, '');
});
pass.onkeyup = function(){
    var passval = pass.value;

    var bad_regex = /^[a-z][^A-Z]\S{5,}$/;
    var bad_regex2 = /^[A-Z][^a-z]\S{5,}$/;
    var weak_regex = /^(?=.*[a-z])(?=.*[A-Z])\S{5,}$/;
    var weak_regex2 = /^(?=.*[A-Z])(?=.*[0-9])\S{5,}$/;
    var good_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])\S{5,}$/;
    var strong_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^\&*+=._-])\S{5,}$/;

    
    if (passval.length < 6) {
        $(str).addClass("text-danger").html("Too Short");
    }
    if (bad_regex.test(passval) || bad_regex2.test(passval)) {
        $(str).addClass("text-warning").html("Bad");
    }
    if (weak_regex.test(passval) || weak_regex2.test(passval)) {
        $(str).addClass("text-info").html("Weak");
    }
    if (good_regex.test(passval)) {
        $(str).addClass("text-primary").html("Good");
    }
    if (strong_regex.test(passval)) {
        $(str).addClass("text-success").html("Strong");
    }
}

// document.getElementById("book-search-field").onkeyup = function(){
//   var name_value = $("#book-search-field").val().toLowerCase();
//   $(".book-class").each(function () {
//     $(this).toggle($(this).text().toLowerCase().includes(name_value));
//   });
// }