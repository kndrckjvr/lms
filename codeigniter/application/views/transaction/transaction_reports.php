<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Transaction Report</h6>
                <ul style="list-style: none; line-height: 1;" class="m-0">
                    <li style="display: inline-block;" class="px-2 pr-0">
                        <span class="d-inline-block" data-toggle="tooltip" title="Print">
                            <a href="#" role="button" class="btn-action-save" onclick="printReport()" data-id="batch-setting-card">
                                <i class="fas fa-print fa-sm fa-fw"></i>
                            </a>
                        </span>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-8"></div>
                    <form class="col-4" onsubmit="return false">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table-sm table-hover col" id="transaction-reports-table">
                    <thead>
                        <tr>
                            <th class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; width: 10%;">Transaction ID</th>
                            <th class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Transaction Date</th>
                            <th class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Transaction Type</th>
                            <th class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($transactions) {
                            foreach ($transactions as $transaction) { ?>
                                <tr data-id="<?= $transaction->transaction_id ?>" data-toggle="modal" data-target="#manage-user-modal" style="cursor: pointer;">
                                    <td class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center"><?= $transaction->transaction_id ?></td>
                                    <td class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center"><?= date("F d, Y", $transaction->transaction_date) ?></td>
                                    <td class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center"><span class="badge badge-<?= $transaction_status[$transaction->status - 1] ?>"><?= $transaction_type[$transaction->status - 1] ?></span></td>
                                    <td class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center"><span class="badge badge-<?php echo ($transaction->user_type == 1) ? "info" : "primary"; ?>"><?php echo ($transaction->user_type == 1) ? "<i class='fas fa-user-shield'></i>" : "<i class='fas fa-user-alt'></i>"; ?>&nbsp;<?= $transaction->username ?></span></td>
                                </tr>
                            <?php
                        }
                    } else {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center">No Data Found.
                                <td>
                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <nav class="mt-2" style="float: right;">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <?php for($i = 1; $i <= $pages; $i++) {?>
                        <li class="page-item<?= (($i == 1) ? " active" : "") ?>" onclick="changePage(<?= $i ?>)">
                            <a class="page-link" href="#"><?php echo $i . (($i == 1) ? "<span class='sr-only'>(current)</span>" : ""); ?></a>
                        </li>
                        <?php } ?>
                        <li class="page-item<?= (($pages == 1) ? " disabled" : "") ?>">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>

<script>
var statusType = ["Reserve", "Borrow", "Return", "Pay", "Deactivate", "Activate"],
    statusClass = ["primary", "warning", "info", "secondary", "danger", "success"]
function changePage(e) {
    $.ajax({
        url: baseUrl + "transactionapi/pagechange",
        type: "POST",
        dataType: "JSON",
        data: {
            page: e
        },
        success: function success(res) {
            $("#transaction-reports-table tbody").html("");
            
            res.transactionData.forEach(data => {
                $("#transaction-reports-table tbody").append(
                    "<tr data-id='" +  data.transaction_id + "' data-toggle='modal' data-target='#manage-user-modal' style='cursor: pointer;'>" + 
                        "<td class='text-center' style='font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; text-align: center'>" +  data.transaction_id + "</td>" +
                        "<td class='text-center' style='font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; text-align: center'>" +  formatDate(new Date(data.transaction_date * 1000)) + "</td>" +
                        "<td class='text-center' style='font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; text-align: center'><span class='badge badge-" + statusClass[data.status - 1] + "'>" + statusType[data.status - 1] + "</span></td>" +
                        "<td class='text-center' style='font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; text-align: center'>" + 
                            "<span class='badge badge-" + ((data.user_type == 1) ? 'info' : 'primary') + "'>" + ((data.user_type == 1) ? '<i class=\'fas fa-user-shield\'></i>' : '<i class=\'fas fa-user-alt\'></i>') + "&nbsp;" +  data.username + "</span></td>" + 
                    "</tr>");
            });
            $(".page-item").removeClass("active");
            $($(".page-item")[res.currentPage]).addClass("active");
        },
        error: function error(err) {

        }
    });
}
</script>