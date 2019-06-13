<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Manage Author</h6>
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
                <table class="table-sm table-hover col" id="manage-author-table">
                    <thead>
                        <tr>
                            <th style="width: 40%">Author Name</th>
                            <th style="width: 20%">Author First Name</th>
                            <th style="width: 20%">Author Last Name</th>
                            <th style="width: 20%">Author Short Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($authors as $author) { ?>
                            <tr data-id="<?= $author->author_id ?>" data-toggle="modal" data-target="#manage-author-modal" style="cursor: pointer;">
                                <td><?= $author->author_name ?></td>
                                <td><?= $author->author_fname ?></td>
                                <td><?= $author->author_lname ?></td>
                                <td><?= $author->author_sname ?></td>
                            </tr>
                        <?php } ?>
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
                        <li class="page-item<?= (($pages == 0 || $pages == 1) ? " disabled" : "") ?> next">
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
            url: baseUrl + "authorapi/pagechange",
            type: "POST",
            dataType: "JSON",
            data: {
                page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e),
                search_text: $("#search-field").val()
            },
            success: function success(res) {
                $("#manage-author-table tbody").html("");
                if (res.authorData) {
                    res.authorData.forEach(element => {
                        $("#manage-author-table tbody").append(
                            "<tr data-id='" + element.author_id + "' data-toggle='modal' data-target='#manage-author-modal' style='cursor: pointer;'>" +
                            "<td>" + element.author_name + "</td>" +
                            "<td>" + element.author_fname + "</td>" +
                            "<td>" + element.author_lname + "</td>" +
                            "<td>" + element.author_sname + "</td>" +
                            "</tr>")
                    });
                } else {
                    $("#manage-author-table tbody").html("<td colspan='4' class='text-center'>No author Found.</td>");
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
                url: baseUrl + "authorapi/search",
                type: "POST",
                dataType: "JSON",
                data: {
                    search_text: $("#search-field").val()
                },
                success: function success(res) {
                    $("#manage-author-table tbody").html("");
                    if (res.authorData) {
                        res.authorData.forEach(element => {
                            $("#manage-author-table tbody").append(
                                "<tr data-id='" + element.author_id + "' data-toggle='modal' data-target='#manage-author-modal' style='cursor: pointer;'>" +
                                "<td>" + element.author_name + "</td>" +
                                "<td>" + element.author_fname + "</td>" +
                                "<td>" + element.author_lname + "</td>" +
                                "<td>" + element.author_sname + "</td>" +
                                "</tr>")
                        });
                    } else {
                        $("#manage-author-table tbody").html("<td colspan='4' class='text-center'>No author Found.</td>");
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