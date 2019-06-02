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
                            <input type="text" class="form-control bg-light border-0 small" id="search-field" placeholder="Search for...">
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
                                    <td class="text-center"><?= $transaction->transaction_id ?></td>
                                    <td class="text-center"><?= date("F d, Y", $transaction->transaction_date) ?></td>
                                    <td class="text-center"><span class="badge badge-<?= $transaction_status[$transaction->status - 1] ?>"><?= $transaction_type[$transaction->status - 1] ?></span></td>
                                    <td class="text-center"><span class="badge badge-<?php echo ($transaction->user_type == 1) ? "info" : "primary"; ?>"><?php echo ($transaction->user_type == 1) ? "<i class='fas fa-user-shield'></i>" : "<i class='fas fa-user-alt'></i>"; ?>&nbsp;<?= $transaction->username ?></span></td>
                                </tr>
                            <?php
                        }
                    } else {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    No Data Found.
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
                            <button class="page-link" onclick="changePage('prev')" tabindex="-1" aria-disabled="true">Previous</button>
                        </li>
                        <?php for ($i = 1; $i <= $pages; $i++) { ?>
                            <li class="page-item<?= (($i == 1) ? " active" : "") ?>" onclick="changePage(<?= $i ?>)">
                                <button class="page-link"><?php echo $i . (($i == 1) ? "<span class='sr-only'>(current)</span>" : ""); ?></button>
                            </li>
                        <?php } ?>
                        <li class="page-item<?= (($pages == 0) ? " disabled" : "") ?>">
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
    var statusType = ["Reserve", "Borrow", "Return", "Pay", "Deactivate", "Activate"],
        statusClass = ["primary", "warning", "info", "secondary", "danger", "success"],
        currentPage = 1;

    function changePage(e) {
        isLoading(true);
        $.ajax({
            url: baseUrl + "transactionapi/pagechange",
            type: "POST",
            dataType: "JSON",
            data: {
                page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e)
            },
            success: function success(res) {
                $("#transaction-reports-table tbody").html("");

                res.transactionData.forEach(data => {
                    $("#transaction-reports-table tbody").append(
                        "<tr data-id='" + data.transaction_id + "' data-toggle='modal' data-target='#manage-user-modal' style='cursor: pointer;'>" +
                        "<td class='text-center'>" + data.transaction_id + "</td>" +
                        "<td class='text-center'>" + formatDate(new Date(data.transaction_date * 1000)) + "</td>" +
                        "<td class='text-center'><span class='badge badge-" + statusClass[data.status - 1] + "'>" + statusType[data.status - 1] + "</span></td>" +
                        "<td class='text-center'>" +
                        "<span class='badge badge-" + ((data.user_type == 1) ? 'info' : 'primary') + "'>" + ((data.user_type == 1) ? '<i class=\'fas fa-user-shield\'></i>' : '<i class=\'fas fa-user-alt\'></i>') + "&nbsp;" + data.username + "</span></td>" +
                        "</tr>");
                });

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

    function printReport() {
        var divToPrint = document.getElementById('transaction-reports-table');
        var newWin = window.open("", "Print Transaction", "width=200&height=200");
        newWin.document.write("<html>");
        newWin.document.write("<head><title>Print Transaction</title>");
        newWin.document.write('<link type="text/css" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">');
        newWin.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
        newWin.document.write('<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">');
        newWin.document.write('<link rel="stylesheet" href="<?= base_url("css/custom.css"); ?>">');
        newWin.document.write("</head><body>");
        newWin.document.write(divToPrint.outerHTML);
        newWin.document.write("</body></html>");
        newWin.print();
        newWin.close();
    }
</script>