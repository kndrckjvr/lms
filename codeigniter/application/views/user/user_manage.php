<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Manage User</h6>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-8"></div>
                    <form class="col-4" onsubmit="return false">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" id="search-field" placeholder="Search for...">
                        </div>
                    </form>
                </div>
                <table class="table-sm table-hover col" id="manage-user-table">
                    <thead>
                        <tr>
                            <th class="w-75">Username</th>
                            <th style="width: 10%" class="text-center">User Type</th>
                            <th style="width: 10%" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr data-id="<?= $user->user_id ?>" data-toggle="modal" data-target="#manage-user-modal" style="cursor: pointer;">
                                <td><?= $user->username ?></td>
                                <td class="text-center"><span class="badge badge-<?php echo ($user->user_type == 1) ? "info" : "primary"; ?>"><?php echo ($user->user_type == 1) ? "<i class='fas fa-user-shield'></i>&nbsp;Admin" : "<i class='fas fa-user-alt'></i>&nbsp;User"; ?></span></td>
                                <td class="text-center"><span class="badge badge-<?php echo ($user->status == 1) ? "success" : "danger"; ?>"><?php echo ($user->status == 1) ? "Active" : "Inactive"; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <nav class="mt-2" style="float: right;">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled prev">
                            <button class="page-link" onclick="changePage('prev')" tabindex="-1" aria-disabled="true">Previous</button>
                        </li>
                        <?php for ($i = 1; $i <= $pages; $i++) { ?>
                            <li class="page-item<?= (($i == 1) ? " active" : "") ?> page-number" onclick="changePage(<?= $i ?>)">
                                <button class="page-link"><?php echo $i . (($i == 1) ? "<span class='sr-only'>(current)</span>" : ""); ?></button>
                            </li>
                        <?php } ?>
                        <li class="page-item<?= (($pages == 0) ? " disabled" : "") ?> next">
                            <button class="page-link" onclick="changePage('next')">Next</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>
<script>
    var currentPage = 1;

    function changePage(e) {
        isLoading(true);
        $.ajax({
            url: baseUrl + "userapi/pagechange",
            type: "POST",
            dataType: "JSON",
            data: {
                page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e),
                search_text: $("#search-field").val()
            },
            success: function success(res) {
                $("#manage-user-table tbody").html("");

                if (res.userData) {
                    res.userData.forEach(element => {
                        $("#manage-user-table tbody").append(
                            "<tr data-id='" + element.user_id + "' data-toggle='modal' data-target='#manage-user-modal' style='cursor: pointer;'>" +
                            "<td>" + element.username + "</td>" +
                            "<td class='text-center'><span class='badge badge-" + ((element.user_type == 1) ? "primary'><i class='fas fa-user-shield'></i>&nbsp;Admin" : "info'><i class='fas fa-user-alt'></i>&nbsp;User") + "</span></td>" +
                            "<td class='text-center'><span class='badge badge-" + ((element.status == 1) ? "success'>Active" : "danger'>Inactive") + "</span></td>" +
                            "</tr>"
                        );
                    });
                } else {
                    $("#manage-user-table tbody").html("<td colspan='4' class='text-center'>No Book Found.</td>");
                }

                $(".page-item").removeClass("active");
                $($(".page-item")[res.currentPage]).addClass("active");

                currentPage = parseInt(res.currentPage);

                pageHandler(currentPage, res.pages);
            },
            error: function error(err) {

            },
            complete: complete()
        });
    }

    jQuery(document).ready(function($) {
        $("#search-field").donetyping(function() {
            isLoading(true)
            $.ajax({
                url: baseUrl + "userapi/searchuser",
                type: "POST",
                dataType: "JSON",
                data: {
                    search_text: $("#search-field").val()
                },
                success: function success(res) {
                    $("#manage-user-table tbody").html("");
                    if (res.userData) {
                        res.userData.forEach(element => {
                            $("#manage-user-table tbody").append(
                                "<tr data-id='" + element.user_id + "' data-toggle='modal' data-target='#manage-user-modal' style='cursor: pointer;'>" +
                                "<td>" + element.username + "</td>" +
                                "<td class='text-center'><span class='badge badge-" + ((element.user_type == 1) ? "primary'><i class='fas fa-user-shield'></i>&nbsp;Admin" : "info'><i class='fas fa-user-alt'></i>&nbsp;User") + "</span></td>" +
                                "<td class='text-center'><span class='badge badge-" + ((element.status == 1) ? "success'>Active" : "danger'>Inactive") + "</span></td>" +
                                "</tr>"
                            );
                        });
                    } else {
                        $("#manage-user-table tbody").html("<td colspan='3' class='text-center'>No User Found.</td>");
                    }

                    $("li.page-item.page-number").remove();

                    currentPage = 1;

                    pageHandler(currentPage, res.pages);

                    for (var i = 1; i <= res.pages; i++) {
                        $("li.page-item.next").before("<li class='page-item" + ((i == 1) ? " active" : "") + " page-number' onclick='changePage(" + i + ")'><button class='page-link'>" + i + "</button></li>", )
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        });
    });
</script>