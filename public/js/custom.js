$("#login-button").on('click', function() {
    $.ajax({
        url: baseUrl + "loginapi/logincheck",
        type: "POST",
        dataType: "JSON",
        data: {

        },
        success: function success(res) {
            alert(2);
        },
        error: function error() {
            alert(1)
        }
    });
});