    <div class="modal fade" id="manage-book-modal" tabindex="-1" role="dialog" aria-labelledby="manage-book-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="m-0 font-weight-bold text-primary" id="manage-book-modal-title">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-sm table-hover col" id="manage-book-modal-table">
                        <thead>
                            <tr>
                                <th>Book Code</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Added Date</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="manage-book-modal-edit" data-id="">Edit</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-book-modal" tabindex="-1" role="dialog" aria-labelledby="edit-book-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="m-0 font-weight-bold text-primary" id="edit-book-modal-title">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return false" method="post" id="book-edit-form" enctype="multipart/form-data">
                        <input type="hidden" name="book_id" id="book-id">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="book_name_editor">Book Name</label>
                                <input type="text" class="form-control" id="book_name_editor" name="book_name" placeholder="Enter Book Name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="book_author_editor">Book Author</label>
                                <select class="form-control selectpicker with-ajax" multiple data-live-search="true" id="book_author_editor">
                                    <option value="" data-subtext="" selected>

                                    </option>
                                </select>
                                <div class="invalid-feedback" id="book-author-invalid"></div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="book_section">Book Section</label>
                                <select class="form-control selectpicker with-ajax" data-live-search="true" id="book_section_editor">
                                    <option value="" data-subtext="" selected>

                                    </option>
                                </select>
                                <div class="invalid-feedback" id="book-section-invalid"></div>
                            </div>
                            <div class="col">
                                <label for="book_quantity_editor">Book Quantity</label>
                                <input type="number" min="1" class="form-control" id="book_quantity_editor" name="book_quantity" placeholder="Enter Book Quantity">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="book_image_file_editor">Book Image File</label><br />
                                <input type="file" name="book_image_file" id="book_image_file_editor" style="display: none">
                                <div class="invalid-feedback"></div>
                                <div style="width: 150px; height: 200px; margin: 0 auto; background: #000; cursor: pointer;" id="upload-image-div-editor">
                                    <!-- <p class="text-center pt-5 text-white">Click to upload image</p> -->
                                </div>
                            </div>
                            <div class="col">
                                <label for="publish_date_editor">Publish Date</label>
                                <input type="text" class="form-control datepicker" value="<?= date("m/d/Y", strtotime("now")) ?>" id="publish_date_editor" name="publish_date">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="book_description_editor">Book Description</label>
                                <textarea name="book_description" id="book_description_editor" cols="30" rows="10" placeholder="Enter Book Description" class="form-control" style="resize: none"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" class="is-invalid" name="book_author" id="book_author_hidden_editor">
                        <input type="hidden" class="is-invalid" name="book_section" id="book_section_hidden_editor">
                        <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="create-book">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="change-status-book-item-modal" tabindex="-1" role="dialog" aria-labelledby="change-status-book-item-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="m-0 font-weight-bold text-primary" id="change-status-book-item-modal-title">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-sm col" id="change-status-book-item-modal-table">
                        <tbody>
                            <tr>
                                <td class="w-25">
                                    <div style="width: 150px; height: 200px; margin: 0 auto; background: #000; background-position: center; background-size: cover;" id="upload-image-div-change-status">
                                        <!-- <p class="text-center pt-5 text-white">No Image Uploaded</p> -->
                                    </div>
                                </td>
                                <td class="w-75">
                                    <table class="table-sm col">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%"></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Book Name: </td>
                                                <td>
                                                    <input type="text" class="form-control" id="book-name-field" disabled>
                                                    <div class="invalid-feedback"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Book Author: </td>
                                                <td>
                                                    <input type="text" class="form-control" id="book-author-field" disabled>
                                                    <div class="invalid-feedback"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Book Code: </td>
                                                <td><input type="text" class="form-control" id="book-code-field" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>Section: </td>
                                                <td>
                                                    <select name="book-section-field" id="book-section-field" class="form-control" disabled>
                                                        <?php
                                                        foreach ($sections as $section) {
                                                            echo "<option value='$section->section_id'>$section->section_name</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status: </td>
                                                <td id="status-field">
                                                    <button class="btn btn-success" data-action="available" id="available-button">Available</button>
                                                    <button class="btn btn-primary" data-action="reserve" data-token="" id="reserve-button" data-toggle="modal" data-target="#user-data-modal">Reserve</button>
                                                    <button class="btn btn-warning" data-action="borrow" data-token="" id="borrow-button" data-toggle="modal" data-target="#user-data-modal">Borrow</button>
                                                    <button class="btn btn-info" data-action="return" data-token="" id="return-button" data-toggle="modal" data-target="#user-data-modal">Return</button>
                                                    <button class="btn btn-danger" data-action="disable" id="disable-button">Disable</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Remarks:</td>
                                                <td id="remarks-field">None</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user-data-modal" tabindex="-1" role="dialog" aria-labelledby="user-data-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="m-0 font-weight-bold text-primary" id="user-data-modal-title">Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-5"></div>
                        <form class="col-7" onsubmit="return false;">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." id="search-user-field">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="search-user-button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table-sm table-hover col" id="user-data-modal-table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th class="text-center">Current Borrowed Books</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <!-- Insert Pagination here -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reserve-book-modal" tabindex="-1" role="dialog" aria-labelledby="reserve-book-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="m-0 font-weight-bold text-primary" id="reserve-book-modal-title">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-sm table-hover col" id="reserve-book-modal-table">
                        <thead>
                            <tr>
                                <th>Book Code</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Added Date</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function reserveBook(e) {
            swal({
                    title: "Reserve this Book?",
                    text: "This will be reserved to you.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((proceed) => {
                    if (proceed) {
                        $.ajax({
                            url: baseUrl + "transactionapi/usercreate",
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                itembook_id: $(e).data("id")
                            },
                            success: function(res) {
                                if (res.response) {
                                    swal("Book has been reserved!", {
                                        icon: "success",
                                    }).then(() => {
                                        $(".modal").modal("hide");
                                        window.location.href = baseUrl + "book/reserve";
                                    });
                                    search();
                                }
                            },
                            error: function error(jqxhr, err, textStatus) {
                                errorHandler(jqxhr, err, textStatus);
                            },
                            complete: complete()
                        });
                    } else {
                        swal("No changes made.");
                    }
                });
        }

        jQuery(document).ready(function($) {
            var options = {
                values: "a, b, c",
                ajax: {
                    url: baseUrl + "authorapi/search",
                    type: "POST",
                    dataType: "json",
                    data: {
                        search_text: "{{{q}}}"
                    }
                },
                locale: {
                    emptyTitle: "Select and Begin Typing"
                },
                log: 3,
                preprocessData: function(data) {
                    var i,
                        l = data.authorData.length,
                        array = [];
                    if (l) {
                        for (i = 0; i < l; i++) {
                            array.push(
                                $.extend(true, data.authorData[i], {
                                    text: data.authorData[i].author_name,
                                    value: data.authorData[i].author_id,
                                    data: {
                                        subtext: data.authorData[i].author_sname
                                    }
                                })
                            );
                        }
                    }
                    // You must always return a valid array when processing data. The
                    // data argument passed is a clone and cannot be modified directly.
                    return array;
                }
            };

            var options2 = {
                values: "a, b, c",
                ajax: {
                    url: baseUrl + "sectionapi/searchSection",
                    type: "POST",
                    dataType: "json",
                    data: {
                        search_text: "{{{q}}}"
                    }
                },
                locale: {
                    emptyTitle: "Select and Begin Typing"
                },
                log: 3,
                preprocessData: function(data) {
                    var i,
                        l = data.sectionData.length,
                        array = [];
                    if (l) {
                        for (i = 0; i < l; i++) {
                            array.push(
                                $.extend(true, data.sectionData[i], {
                                    text: data.sectionData[i].section_name,
                                    value: data.sectionData[i].section_id,
                                    data: {
                                        subtext: data.sectionData[i].section_code
                                    }
                                })
                            );
                        }
                    }
                    // You must always return a valid array when processing data. The
                    // data argument passed is a clone and cannot be modified directly.
                    return array;
                }
            };

            $("#book-edit-form").submit(function(e) {
                e.stopPropagation();
                $("input").removeClass("is-invalid");
                $(".dropdown.bootstrap-select.show-tick.form-control").removeClass("is-invalid");
                isLoading(true);
                $.ajax({
                    url: baseUrl + "bookapi/update",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "JSON",
                    success: function success(res) {
                        if (res.response) {
                            showSnackbar("Successfully Added!");
                            $(".modal").modal("hide");
                        } else {
                            if (res.book_name) {
                                $("#book_name_editor + .invalid-feedback").html(res.book_name);
                                $("#book_name_editor").addClass("is-invalid");
                            }
                            if (res.book_description) {
                                $("#book_description_editor + .invalid-feedback").html(res.book_description);
                                $("#book_description_editor").addClass("is-invalid");
                            }
                            if (res.book_author) {
                                $("#book-author-invalid-modal").html(res.book_author);
                                $(".dropdown.bootstrap-select.show-tick.form-control").addClass("is-invalid");
                            }
                            if (res.book_quantity) {
                                $("#book_quantity_editor + .invalid-feedback").html(res.book_quantity);
                                $("#book_quantity_editor").addClass("is-invalid");
                            }
                        }
                    },
                    error: function error(jqxhr, err, textStatus) {
                        errorHandler(jqxhr, err, textStatus);
                    },
                    complete: complete()
                });
            });

            $("#book_author_editor").on('change', function(e) {
                $("#book_author_hidden_editor").val($(e.currentTarget).val());
            });

            $("#book_section_editor").on('change', function(e) {
                $("#book_section_hidden_editor").val($(e.currentTarget).val());
            });

            $("#book_author_editor")
                .selectpicker()
                .filter(".with-ajax")
                .ajaxSelectPicker(options);

            $("#book_section_editor")
                .selectpicker()
                .filter(".with-ajax")
                .ajaxSelectPicker(options2);

            $("#publish_date_editor").datepicker().on('show.bs.modal', function(event) {
                event.stopPropagation();
            });

            $("#edit-book-modal").on('show.bs.modal', function(e) {
                $.ajax({
                    url: baseUrl + "bookapi/getbookeditor",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        book_id: $("#book-id").val()
                    },
                    success: function success(res) {
                        $("#edit-book-modal-title").html("Edit: " + res.book.book_name);
                        $("#book_name_editor").val(res.book.book_name);
                        $("#book_quantity_editor").val(res.book.book_qty);
                        $("#book_description_editor").val(res.book.book_description);
                        $("#publish_date_editor").datepicker('update', new Date(res.book.publish_date * 1000));
                        $("#book_author_hidden_editor").val(res.book.book_author_id);
                        $("#book_section_hidden_editor").val(res.book.section_id);
                        $("#upload-image-div-editor").css({
                            "background": "",
                            "background-image": "url(" + baseUrl + "images/" + ((res.book.book_image == "") ? "no_image.png" : res.book.book_image) + ")",
                            "background-position": "center",
                            "background-size": "cover"
                        });

                        $("#book_author_editor").html("");
                        $("#book_section_editor").html("");

                        res.book.author_value.forEach(element => {
                            $("#book_author_editor").append("<option value='" + element.author_id + "' data-subtext='" + element.author_sname + "' selected>" + element.author_name + "</option>");
                        });

                        $("#book_section_editor").html("<option value='" + res.book.section_id + "' data-subtext='" + res.book.section_code + "' selected>" + res.book.section_name + "</option>");

                        $("#book_author_editor").selectpicker("refresh");
                        $("#book_section_editor").selectpicker("refresh");
                    },
                    error: function error(jqxhr, err, textStatus) {
                        errorHandler(jqxhr, err, textStatus);
                    },
                    complete: complete()
                });
            });

            $("#manage-book-modal-edit").on('click', function(e) {
                $("#book-id").val($(e.currentTarget).attr("data-id"));
                $("#manage-book-modal").modal("hide");
                $("#edit-book-modal").modal("show");
            });

            $("#reserve-book-modal").on('show.bs.modal', function(e) {
                var statusType = ["Available", "Reserved", "Borrowed", "Disabled"];
                var status = ["success", "primary", "warning", "danger"];
                isLoading(true);
                $("#reserve-book-modal-table tbody").html("");
                $.ajax({
                    url: baseUrl + "bookapi/getbooks",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        book_id: $(e.relatedTarget).attr("data-id")
                    },
                    success: function success(res) {
                        $("#reserve-book-modal-title").html(res.book_name);
                        res.books.forEach(element => {
                            $("#reserve-book-modal-table tbody").append("<tr style='cursor: pointer;' data-id='" + element.itembook_id + "' onclick='reserveBook(this)'><td>" +
                                element.section_code + element.book_code + "</td><td class='text-center'><span class='badge badge-" + status[element.status - 1] + "'>" + statusType[element.status - 1] + "</span></td><td class='text-center'>" +
                                formatDate(new Date(element.created_at * 1000)) + "</td></tr>")
                        });
                    },
                    error: function error(jqxhr, err, textStatus) {
                        errorHandler(jqxhr, err, textStatus);
                    },
                    complete: complete()
                });
            });

            $("#manage-book-modal").on('show.bs.modal', function(e) {
                var statusType = ["Available", "Reserved", "Borrowed", "Disabled"];
                var status = ["success", "primary", "warning", "danger"];
                isLoading(true);
                $("#manage-book-modal-edit").attr("data-id", $(e.relatedTarget).attr("data-id"));
                $("#manage-book-modal-table tbody").html("");
                $.ajax({
                    url: baseUrl + "bookapi/getbooks",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        book_id: $(e.relatedTarget).attr("data-id")
                    },
                    success: function success(res) {
                        $("#manage-book-modal-title").html(res.book_name);
                        res.books.forEach(element => {
                            $("#manage-book-modal-table tbody").append("<tr style='cursor: pointer;' data-id='" + element.itembook_id + "' data-toggle='modal' data-target='#change-status-book-item-modal'><td>" +
                                element.section_code + element.book_code + "</td><td class='text-center'><span class='badge badge-" + status[element.status - 1] + "'>" + statusType[element.status - 1] + "</span></td><td class='text-center'>" +
                                formatDate(new Date(element.created_at * 1000)) + "</td></tr>")
                        });
                    },
                    error: function error(jqxhr, err, textStatus) {
                        errorHandler(jqxhr, err, textStatus);
                    },
                    complete: complete()
                });
            });

            $("#change-status-book-item-modal").on('show.bs.modal', function(e) {
                $("#manage-book-modal").modal("hide");
                $("#status-field button").attr("disabled", "true");
                isLoading(true);
                $.ajax({
                    url: baseUrl + "bookapi/getspecificbook",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        itembook_id: $(e.relatedTarget).attr("data-id")
                    },
                    success: function success(res) {
                        $("#change-status-book-item-modal-title").html(res.book.book_name + " - " + res.book.section_code + res.book.book_code);
                        $("#book-name-field").val(res.book.book_name);
                        $("#book-author-field").val(res.book.book_author);
                        $("#book-section-field").val(res.book.section_id);
                        $("#book-code-field").val(res.book.section_code + res.book.book_code);
                        $("#remarks-field").html(res.remarks);
                        $("#upload-image-div-change-status").css({
                            "background": "",
                            "background-image": "url(" + baseUrl + "images/" + ((res.book.book_image == "") ? "no_image.png" : res.book.book_image) + ")",
                            "background-position": "center",
                            "background-size": "cover"
                        });
                        $("#change-status-book-item-modal-table tbody button").attr("data-token", res.book.itembook_id);
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
                    },
                    error: function error(jqxhr, err, textStatus) {
                        errorHandler(jqxhr, err, textStatus);
                    },
                    complete: complete()
                });
            });

            $("#search-user-button").on('click', function(e) {
                getUser(e.currentTarget, $("#search-user-field").val());
            });

            $("#user-data-modal").on('show.bs.modal', function(e) {
                $(".modal").modal("hide");
                getUser(e.relatedTarget, "");
                $("#user-data-modal-title").html($(e.relatedTarget).attr("data-action").replace(/\b\w/g, function(l) {
                    return l.toUpperCase();
                }));
                $("#search-user-button").attr({
                    "data-token": $(e.relatedTarget).attr("data-token"),
                    "data-action": $(e.relatedTarget).attr("data-action")
                });
            });

            $("#available-button").on('click', function(e) {
                handleProcess(e.currentTarget);
            });

            $("#disable-button").on('click', function(e) {
                handleProcess(e.currentTarget);
            });

            $("#edit-book-item").on('click', function(e) {
                swal({
                        title: "Are you sure?",
                        text: "This will update the books details!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((proceed) => {
                        if (proceed) {

                        } else {
                            swal("No changes was made!");
                        }
                    });
            });

            function getUser(e, searchText) {
                $("#user-data-modal-table tbody").html("");
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
                        if (res.users == null) {
                            $("#user-data-modal-table tbody").html("<tr><td colspan='3'>No Users Found.</td></tr>");
                            return;
                        }
                        res.users.forEach(element => {
                            $("#user-data-modal-table tbody").append("<tr style='cursor: pointer;' onclick='handleProcess(this)' data-token='" + $(e).attr("data-token") + "' data-id='" + element.user_id + "' data-action='" + $(e).attr("data-action") + "'><td>" +
                                element.username + "</td><td class='text-center'>" + 0 + "</td><td class='text-center'>" + element.status + "</td></tr>")
                        });
                    },
                    error: function error(jqxhr, err, textStatus) {
                        errorHandler(jqxhr, err, textStatus);
                    },
                    complete: complete()
                });
            }

            $("#upload-image-div-editor").on('click', function() {
                $("#book_image_file_editor").click()
            });

            $("#book_image_file_editor").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onloadend = function() {
                        $("#upload-image-div-editor").css("background-image", "url(" + reader.result + ")");
                    }

                    reader.readAsDataURL(this.files[0]);
                }
                $("#upload-image-div-editor p").hide()
            });
        });
    </script>