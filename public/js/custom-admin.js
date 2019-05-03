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
  
    return monthNames[monthIndex] + ' ' + day + ', ' +  year;
  }

$("#create-user").on('click', function() {
    $("input").removeClass("is-invalid");
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
                if(res.username) {
                    $("#username + .invalid-feedback").html(res.username);
                    $("#username").addClass("is-invalid");
                }
                if(res.password) {
                    $("#password + .invalid-feedback").html(res.password);
                    $("#password").addClass("is-invalid");
                }
            }
        },
        error: function error(err) {
            console.log(err);
        }
    });
});

$("#create-book").on('click', function() {
    $("input").removeClass("is-invalid");
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
            if(res.response) {
                $("#book-create-form").trigger("reset");
                showSnackbar("Successfully Added!");
            } else {
                if(res.book_name) {
                    $("#book-name + .invalid-feedback").html(res.book_name);
                    $("#book-name").addClass("is-invalid");
                }
                if(res.book_author) {
                    $("#book-author + .invalid-feedback").html(res.book_author);
                    $("#book-author").addClass("is-invalid");
                }
                if(res.book_code) {
                    $("#book-code + .invalid-feedback").html(res.book_code);
                    $("#book-code").addClass("is-invalid");
                }
            }
        },
        error: function error(err) {
            console.log(err);
        }
    });
});

$("#upload-image-div").on('click', function() {
    $("#book-image-file").click()
});

$("#book-image-file").change(function() {
    if(this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onloadend = function () {
            $("#upload-image-div").css("background-image", "url(" + reader.result + ")");
        }

        reader.readAsDataURL(this.files[0]);
    }
    $("#upload-image-div p").hide()
});

$("#create-section").on('click', function() {
    $("input").removeClass("is-invalid");
    $.ajax({
        url: baseUrl + "sectionapi/create",
        type: "POST",
        dataType: "JSON",
        data: {
            section_name: $("#section-name").val(),
            section_code: $("#section-code").val()
        },
        success: function success(res) {
            if(res.response) {
                $("#section-create-form").trigger("reset");
                showSnackbar("Successfully Added!");
            } else {                
                if(res.section_name) {
                    $("#section-name + .invalid-feedback").html(res.section_name);
                    $("#section-name").addClass("is-invalid");
                }
                if(res.section_code) {
                    $("#section-code + .invalid-feedback").html(res.section_code);
                    $("#section-code").addClass("is-invalid");
                }
            }
        },
        error: function error(err) {
            console.log(err);
        }
    });
});

$("#manage-book-modal").on('show.bs.modal', function(e) {
    console.log($(e.relatedTarget).attr("data-id"));
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
                $("#manage-book-modal-table tbody").append("<tr data-id='" + element.book_code + "' data-toggle='modal' data-target='#manage-book-item-modal'><td>" 
                + element.book_code + "</td><td class='text-center'>" + element.status + "</td><td class='text-center'>"
                + formatDate(new Date(element.created_at*1000)) + "</td></tr>")
            });

            // status type 
            // 1 - abvailable
            // 2 - reserved
            // 3 - borrowed
            // 4 - unavailable
        },
        error: function error(err) {
            console.log(err);
        }
    });
});

$("#manage-book-item-modal").on('show.bs.modal', function(e) {
    $("#manage-book-modal").modal("hide");
    console.log($(e.relatedTarget).attr("data-id"));
    $.ajax({
        url: baseUrl + "bookapi/getspecificbook",
        type: "POST",
        dataType: "JSON",
        data: {
            book_code: $(e.relatedTarget).attr("data-id")
        },
        success: function success(res) {
            
            // status type 
            // 1 - abvailable
            // 2 - reserved
            // 3 - borrowed
            // 4 - unavailable
        },
        error: function error(err) {
            console.log(err);
        }
    });
});