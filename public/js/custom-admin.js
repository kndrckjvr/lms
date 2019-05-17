function formatDate(date) {
    var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return monthNames[monthIndex] + ' ' + day + ', ' + year;
}

function complete() {
    isLoading(false);
}

function errorHandler(jqxhr, exception, err) {
    var msg = "";
    if (jqxhr.status === 0) {
        msg = "No Connection Found.";
    } else if (jqxhr.status == 404) {
        msg = "Page Not Found 404.";
    } else if (jqxhr.status == 500) {
        msg = "Internal Server Error [500].";
    } else if (exception === 'parsererror') {
        msg = "JSON Requested Parsing Failed.";
    } else if (exception === 'timeout') {
        msg = "It took a long time to respond.";
    } else if (exception === 'abort') {
        msg = "Request Aborted.";
    } else {
        msg = "Uncaught Error: " + jqxhr.responseText + ".";
    }
    showSnackbar("Error: " + msg, "error");
}

function isLoading(loading) {
    if (loading) {
        $(".loader-wrapper").fadeIn("slow");
    } else {
        $(".loader-wrapper").fadeOut("slow");
    }
}

$(document).ready(function () {

});