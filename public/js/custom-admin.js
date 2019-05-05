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

function isLoading(loading) {
    if(loading) {
        $(".loader-wrapper").fadeIn("slow");
    } else {
        $(".loader-wrapper").fadeOut("slow");
    }
}

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
        error: function error(err) {
            console.log(err);
        },
        complete: complete()
    });
});

$("#create-book").on('click', function () {
    $("input").removeClass("is-invalid");
    isLoading(true);
    $.ajax({
        url: baseUrl + "bookapi/create",
        type: "POST",
        dataType: "JSON",
        data: {
            book_name: $("#book-name").val(),
            book_author: $("#book-author").val(),
            book_code: $("#book-code").val(),
            book_section: $("#book-section").val(),
            book_image_file: $("#book-image-file").val()
        },
        success: function success(res) {
            if (res.response) {
                $("#book-create-form").trigger("reset");
                showSnackbar("Successfully Added!");
            } else {
                if (res.book_name) {
                    $("#book-name + .invalid-feedback").html(res.book_name);
                    $("#book-name").addClass("is-invalid");
                }
                if (res.book_author) {
                    $("#book-author + .invalid-feedback").html(res.book_author);
                    $("#book-author").addClass("is-invalid");
                }
                if (res.book_code) {
                    $("#book-code + .invalid-feedback").html(res.book_code);
                    $("#book-code").addClass("is-invalid");
                }
            }
        },
        error: function error(err) {
            console.log(err);
        },
        complete: complete()
    });
});

$("#upload-image-div").on('click', function () {
    $("#book-image-file").click()
});

$("#book-image-file").change(function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onloadend = function () {
            $("#upload-image-div").css("background-image", "url(" + reader.result + ")");
        }

        reader.readAsDataURL(this.files[0]);
    }
    $("#upload-image-div p").hide()
});

$("#create-section").on('click', function () {
    $("input").removeClass("is-invalid");
    isLoading(true);
    $.ajax({
        url: baseUrl + "sectionapi/create",
        type: "POST",
        dataType: "JSON",
        data: {
            section_name: $("#section-name").val(),
            section_code: $("#section-code").val()
        },
        success: function success(res) {
            if (res.response) {
                $("#section-create-form").trigger("reset");
                showSnackbar("Successfully Added!");
            } else {
                if (res.section_name) {
                    $("#section-name + .invalid-feedback").html(res.section_name);
                    $("#section-name").addClass("is-invalid");
                }
                if (res.section_code) {
                    $("#section-code + .invalid-feedback").html(res.section_code);
                    $("#section-code").addClass("is-invalid");
                }
            }
        },
        error: function error(err) {
            console.log(err);
        },
        complete: complete()
    });
});

$("#manage-book-modal").on('show.bs.modal', function (e) {
    var status = ["Available", "Reserved", "Borrowed", "Disabled"];
    isLoading(true);
    $.ajax({
        url: baseUrl + "bookapi/getbooks",
        type: "POST",
        dataType: "JSON",
        data: {
            book_id: $(e.relatedTarget).attr("data-id")
        },
        success: function success(res) {
            $("#manage-book-modal-table tbody").html("");
            $("#manage-book-modal-title").html(res.book_name);
            res.books.forEach(element => {
                $("#manage-book-modal-table tbody").append("<tr style='cursor: pointer;' data-id='" + element.book_code + "' data-toggle='modal' data-target='#manage-book-item-modal'><td>"
                    + element.book_code + "</td><td class='text-center'>" + status[element.status - 1] + "</td><td class='text-center'>"
                    + formatDate(new Date(element.created_at * 1000)) + "</td></tr>")
            });
            // status type 
            // 1 - abvailable
            // 2 - reserved
            // 3 - borrowed
            // 4 - unavailable
        },
        error: function error(err) {
            console.log(err);
        },
        complete: complete()
    });
});

$("#manage-book-item-modal").on('show.bs.modal', function (e) {
    $("#manage-book-modal").modal("hide");
    $("#status-field button").attr("disabled", "true");
    isLoading(true);
    $.ajax({
        url: baseUrl + "bookapi/getspecificbook",
        type: "POST",
        dataType: "JSON",
        data: {
            book_code: $(e.relatedTarget).attr("data-id")
        },
        success: function success(res) {
            $("#manage-book-item-modal-title").html(res.book.book_name + " - " + res.book.book_code);
            $("#book-name-field").val(res.book.book_name);
            $("#book-author-field").val(res.book.book_author);
            $("#book-section-field").val(res.book.section_id);
            $("#book-code-field").val(res.book.book_code);
            $("#manage-book-item-modal-table tbody button").attr("data-token", res.book.itembook_id);
            switch (res.book.status) {
                case "1":
                    $("#borrow-button").removeAttr("disabled");
                    $("#reserve-button").removeAttr("disabled");
                    $("#disable-button").removeAttr("disabled");
                    break;
                case "2":
                    $("#available-button").removeAttr("disabled");
                    $("#borrow-button").removeAttr("disabled");
                    break;
                case "3":
                    $("#return-button").removeAttr("disabled");
                    break;
                case "4":
                    $("#available-button").removeAttr("disabled");
                    break;
            }

            // status type 
            // 1 - abvailable
            // 2 - reserved
            // 3 - borrowed
            // 4 - unavailable
        },
        error: function error(err) {
            console.log(err);
        },
        complete: complete()
    });
});

function handleProcess(e) {
    // transaction handler
    // transaction types
    // 1 - reserve
    // 2 - borrow
    // 3 - returned
    // 4 - lost
    // 5 - paid
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
    }

    isLoading(true);
    $.ajax({
        url: baseUrl + "transactionapi/create",
        type: "POST",
        dataType: "JSON",
        data: {
            itembook_id: $(e).data("token"),
            status: status
        },
        success: function (res) {
            if (res.response) {
                $(".modal").modal("hide");
                showSnackbar("Sucessfully " + $(e).data("action") + " book.");
            }
        },
        error: function (err) {
            console.log(err);
        },
        complete: complete()
    })
}

$("#search-user-button").on('click', function(e) {
    getUser(e.currentTarget, $("#search-user-field").val());
});

$("#user-data-modal").on('show.bs.modal', function (e) {
    $(".modal").modal("hide");
    getUser(e.relatedTarget, "");
    $("#user-data-modal-title").html($(e.relatedTarget).attr("data-action").replace(/\b\w/g, function (l) {
        return l.toUpperCase();
    }));
    $("#search-user-button").attr({
        "data-token": $(e.relatedTarget).attr("data-token"),
        "data-action": $(e.relatedTarget).attr("data-action")
    });
});

function getUser(e, searchText) {
    console.log(e);
    isLoading(true);
    $.ajax({
        url: baseUrl + "userapi/getusers",
        type: "POST",
        dataType: "JSON",
        data: {
            search_text: searchText,
            action: $(e).attr("data-action"),
            itembook_id: $(e).attr("data-token")
        },
        success: function success(res) {
            $("#user-data-modal-table tbody").html("");
            if (res.users == null) {
                $("#user-data-modal-table tbody").html("<tr><td colspan='3'>No Users Found.</td></tr>");
                return;
            }
            res.users.forEach(element => {
                $("#user-data-modal-table tbody").append("<tr style='cursor: pointer;' onclick='handleProcess(this)' data-token='" + $(e).attr("data-token") + "' data-id='" + element.user_id + "' data-action='" + $(e).attr("data-action") + "'><td>"
                    + element.username + "</td><td class='text-center'>" + 0 + "</td><td class='text-center'>" + element.status + "</td></tr>")
            });

            // status type 
            // 1 - abvailable
            // 2 - reserved
            // 3 - borrowed
            // 4 - unavailable
        },
        error: function error(err) {
            console.log(err);
        },
        complete: complete()
    });
}

$("#available-button").on('click', function () {
    // logic
    // check kung anong status dati 
    // kung reserve tanggalin yung reservation ni user
    // kung disabled naman wala gagawin
    // change status to available

    swal({
        title: "Are you sure?",
        text: "This will change the status of the book into Available!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
});

$("#reserve-button").on('click', function () {

    // logic
    // open users modal(<< tapos na to) first 5 lang search button is the key + pagination
    // pick a user (<< tapos na to)
    // reserve the book
    // save the end date of reservation
    // tas pag lumagpas na yung end date na nakalagay sa remarks
    // pwede na available

    // swal({
    //     title: "Are you sure?",
    //     text: "This will change the status of the book into Available!",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //   })
    //   .then((willDelete) => {
    //     if (willDelete) {
    //       swal("Poof! Your imaginary file has been deleted!", {
    //         icon: "success",
    //       });
    //     } else {
    //       swal("Your imaginary file is safe!");
    //     }
    //   });
});


$("#borrow-buton").on('click', function () {
    // logic
    // open users modal first 5 lang search button is the key + pagination
    // pick a user
    // borrow the book sav
});

$("#edit-book-item").on('click', function () {

});

$(document).ready(function () {
    
});