<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Manage Penalty</h6>
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
                <table class="table-sm table-hover col" id="manage-penalty-table">
                    <thead>
                        <tr>
                            <th style="width: 20%">Penalty ID</th>
                            <th style="width: 40%" class="text-center">Date of Implementation</th>
                            <th style="width: 20%" class="text-center">Penalty Amount</th>
                            <th style="width: 20%" class="text-center">Penatly Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penalties as $penalty) : ?>
                            <tr>
                                <td><?= $penalty->penalty_id ?></td>
                                <td class="text-center"><?= date("F d, Y", $penalty->penalty_date) ?></td>
                                <td class="text-center"><?= $penalty->penalty_amount ?></td>
                                <td class="text-center"><?= $penalty->penalty_day ?></td>
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
                        <?php 
                    } ?>
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
            url: baseUrl + "penaltyapi/pagechange",
            type: "POST",
            dataType: "JSON",
            data: {
                page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e),
                search_text: $("#search-field").val()
            },
            success: function success(res) {
                $("#manage-penalty-table tbody").html("");
                if (res.penaltyData) {
                    res.penaltyData.forEach(element => {
                        $("#manage-penalty-table tbody").append(
                            "<tr>" +
                            "<td>" + element.penalty_id + "</td>" +
                            "<td class='text-center'>" + element.penalty_date + "</td>" +
                            "<td class='text-center'>" + element.penalty_amount + "</td>" +
                            "<td class='text-center'>" + element.penalty_pay + "</td>" +
                            "</tr>")
                    });
                } else {
                    $("#manage-penalty-table tbody").html("<td colspan='4' class='text-center'>No Penalty Found.</td>");
                }

                $(".page-item").removeClass("active");
                $($(".page-item")[res.currentPage]).addClass("active");

                currentPage = parseInt(res.currentPage);

                pageHandler(currentPage, res.pages);
            },
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
            },
            complete: complete()
        });
    }

    jQuery(document).ready(function($) {
        $("#search-field").donetyping(function() {
            isLoading(true)
            $.ajax({
                url: baseUrl + "penaltyapi/search",
                type: "POST",
                dataType: "JSON",
                data: {
                    search_text: $("#search-field").val()
                },
                success: function success(res) {
                    $("#manage-penalty-table tbody").html("");
                    if (res.penaltyData) {
                        res.penaltyData.forEach(element => {
                            $("#manage-penalty-table tbody").append(
                                "<tr>" +
                            "<td>" + element.penalty_id + "</td>" +
                            "<td class='text-center'>" + element.penalty_date + "</td>" +
                            "<td class='text-center'>" + element.penalty_amount + "</td>" +
                            "<td class='text-center'>" + element.penalty_pay + "</td>" +
                            "</tr>")
                        });
                    } else {
                        $("#manage-penalty-table tbody").html("<td colspan='4' class='text-center'>No penalty Found.</td>");
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