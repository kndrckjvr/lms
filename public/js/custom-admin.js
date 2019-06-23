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
    var hours = date.getHours();
    var ampm = hours >= 12 ? ' pm' : ' am';
    hours = hours % 12;
    hours = hours ? hours : 12;
    var minutes = "0" + date.getMinutes();
    var seconds = "0" + date.getSeconds();
    return monthNames[monthIndex] + ' ' + day + ', ' + year + ' ' + hours + ":" + minutes.substr(-2) + ":" + seconds.substr(-2) + ampm;
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

function handleProcess(e) {
    var status = 0;

    switch ($(e).data("action")) {
        case "reserve":
            status = 1;
            break;
        case "borrow":
            status = 2;
            break;
        case "return":
            status = 3;
            break;
        case "disable":
            status = 5;
            break;
        case "available":
            status = 6;
            break;
    }

    isLoading(true);
    $.ajax({
        url: baseUrl + "transactionapi/create",
        type: "POST",
        dataType: "JSON",
        data: {
            itembook_id: $(e).attr("data-token"),
            status: status,
            user_id: $(e).attr("data-id")
        },
        success: function (res) {
            if (res.response) {
                $(".modal").modal("hide");
                showSnackbar("Sucessfully " + $(e).data("action").replace(/\b\w/g, function (l) {
                    return l.toUpperCase();
                }) + " book.");
            }
        },
        error: function error(jqxhr, err, textStatus) {
            errorHandler(jqxhr, err, textStatus);
        },
        complete: complete()
    })
}

$(document).ready(function () {

});