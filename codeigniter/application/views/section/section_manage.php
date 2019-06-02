<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Manage Section</h6>
            </div>
            
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-8"></div>
                    <form class="col-4" onsubmit="return false">
                        <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" id="search-field" placeholder="Search for...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="search-button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
                <table class="table-sm table-hover col" id="manage-section-table">
                    <thead>
                        <tr>
                            <th class="w-75">Section Name</th>
                            <th style="width: 15%">Section Code</th>
                            <th style="width: 10%" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sections as $section): ?>
                        <tr data-id="<?= $section->section_id ?>" data-toggle="modal" data-target="#manage-section-modal" style="cursor: pointer;">
                            <td><?= $section->section_name ?></td>
                            <td><?= $section->section_code ?></td>
                            <td class="text-center"><span class="badge badge-<?php echo ($section->status == 1) ? "success" : "danger" ; ?>"><?php echo ($section->status == 1) ? "Active" : "Inactive" ; ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <nav class="mt-2" style="float: right;">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled prev">
                            <button class="page-link" onclick="changePage('prev')" tabindex="-1" aria-disabled="true">Previous</button>
                        </li>
                        <?php for($i = 1; $i <= $pages; $i++) {?>
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
        url: baseUrl + "sectionapi/pagechange",
        type: "POST",
        dataType: "JSON",
        data: {
            page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e),
            search_text: $("#search-field").val()
        },
        success: function success(res) {
            $("#manage-section-table tbody").html("");
            if (res.sectionData) {
                res.sectionData.forEach(element => {
                    $("#manage-section-table tbody").append(
                    "<tr data-id='" + element.section_id + "' data-toggle='modal' data-target='#manage-section-modal' style='cursor: pointer;'>" +
                        "<td>" + element.section_name + "</td>" +
                        "<td>" + element.section_code + "</td>" +
                        "<td class='text-center'><span class='badge badge-"+ ((element.status == 1) ? 'success' : 'danger') + "'>" + ((element.status == 1) ? 'Active' : 'Inactive') + "</span></td>" +
                    "</tr>")
                });
            } else {
                $("#manage-section-table tbody").html("<td colspan='4' class='text-center'>No Section Found.</td>");
            }

            $(".page-item").removeClass("active");
            $($(".page-item")[res.currentPage]).addClass("active");
            
            currentPage = parseInt(res.currentPage);

            if(currentPage == 1) {
                $($(".page-item")[0]).addClass("disabled");
            } else {
                $($(".page-item")[0]).removeClass("disabled");
            }
            
            if(currentPage == res.pages) {
                $($(".page-item")[$(".page-item").length - 1]).addClass("disabled");
            } else {
                $($(".page-item")[$(".page-item").length - 1]).removeClass("disabled");
            }
        },
        error: function error(err) {

        },
        complete: complete()
    });
}

jQuery(document).ready(function($) {
    $("#search-button").on("click", function(e) {
        isLoading(true)
        $.ajax({
            url: baseUrl + "sectionapi/searchsection",
            type: "POST",
            dataType: "JSON",
            data: {
                search_text: $("#search-field").val()
            },
            success: function success(res) {
                $("#manage-section-table tbody").html("");
                if (res.sectionData) {
                    res.sectionData.forEach(element => {
                        $("#manage-section-table tbody").append(
                        "<tr data-id='" + element.section_id + "' data-toggle='modal' data-target='#manage-section-modal' style='cursor: pointer;'>" +
                            "<td>" + element.section_name + "</td>" +
                            "<td>" + element.section_code + "</td>" +
                            "<td class='text-center'><span class='badge badge-"+ ((element.status == 1) ? 'success' : 'danger') + "'>" + ((element.status == 1) ? 'Active' : 'Inactive') + "</span></td>" +
                        "</tr>")
                    });
                } else {
                    $("#manage-section-table tbody").html("<td colspan='4' class='text-center'>No Section Found.</td>");
                }

                $("li.page-item.page-number").remove();
                
                currentPage = 1;

                for(var i = 1; i <= res.pages; i++) {
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