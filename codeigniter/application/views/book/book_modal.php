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
        </div>
    </div>
</div>

<div class="modal fade" id="manage-book-item-modal" tabindex="-1" role="dialog" aria-labelledby="manage-book-item-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="manage-book-item-modal-title">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <table class="table-sm col" id="manage-book-item-modal-table">
                    <tbody>
                        <tr>
                            <td class="w-25">
                                <div style="width: 150px; height: 200px; margin: 0 auto; background: #000; background-position: center; background-size: cover;" id="upload-image-div">
                                    <p class="text-center pt-5 text-white">No Image Uploaded</p>
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
                                            <td><input type="text" class="form-control" id="book-name-field" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Book Author: </td>
                                            <td><input type="text" class="form-control" id="book-author-field" disabled></td>
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
                                                    foreach($sections as $section) {
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit-book-item">Edit</button>
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
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $("#manage-book-modal").on('show.bs.modal', function (e) {
        var statusType = ["Available", "Reserved", "Borrowed", "Disabled"];
        var status = ["success", "primary", "warning", "danger"];
        isLoading(true);
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
                    $("#manage-book-modal-table tbody").append("<tr style='cursor: pointer;' data-id='" + element.itembook_id + "' data-toggle='modal' data-target='#manage-book-item-modal'><td>"
                        + element.section_code + element.book_code + "</td><td class='text-center'><span class='badge badge-" + status[element.status - 1] + "'>" + statusType[element.status - 1] + "</span></td><td class='text-center'>"
                        + formatDate(new Date(element.created_at * 1000)) + "</td></tr>")
                });
                // status type 
                // 1 - abvailable
                // 2 - reserved
                // 3 - borrowed
                // 4 - unavailable
            },
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
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
                itembook_id: $(e.relatedTarget).attr("data-id")
            },
            success: function success(res) {
                $("#manage-book-item-modal-title").html(res.book.book_name + " - " + res.book.section_code + res.book.book_code);
                $("#book-name-field").val(res.book.book_name);
                $("#book-author-field").val(res.book.book_author);
                $("#book-section-field").val(res.book.section_id);
                $("#book-code-field").val(res.book.section_code + res.book.book_code);
                $("#remarks-field").html(res.remarks);
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
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
            },
            complete: complete()
        });
    });

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

    $("#search-user-button").on('click', function (e) {
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
    
    $("#available-button").on('click', function (e) {
        handleProcess(e.currentTarget);
    });

    $("#disable-button").on('click', function (e) {
        handleProcess(e.currentTarget);
    });

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

    $("#edit-book-item").on('click', function () {

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
                    $("#user-data-modal-table tbody").append("<tr style='cursor: pointer;' onclick='handleProcess(this)' data-token='" + $(e).attr("data-token") + "' data-id='" + element.user_id + "' data-action='" + $(e).attr("data-action") + "'><td>"
                        + element.username + "</td><td class='text-center'>" + 0 + "</td><td class='text-center'>" + element.status + "</td></tr>")
                });
            },
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
            },
            complete: complete()
        });
    }
});
</script>