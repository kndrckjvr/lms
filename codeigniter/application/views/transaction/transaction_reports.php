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
                                    <td class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center"><?= date("F d, Y | h:m:i A", $transaction->transaction_date) ?></td>
                                    <td class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center"><span class="badge badge-<?= $transaction_status[$transaction->status - 1] ?>"><?= $transaction_type[$transaction->status - 1] ?></span></td>
                                    <td class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center"><span class="badge badge-<?php echo ($transaction->user_type == 1) ? "info" : "primary"; ?>"><?php echo ($transaction->user_type == 1) ? "<i class='fas fa-user-shield'></i>" : "<i class='fas fa-user-alt'></i>"; ?>&nbsp;<?= $transaction->username ?></span></td>
                                </tr>
                            <?php
                        }
                    } else { 
                        ?>
                        <tr>
                            <td colspan="5" class="text-center" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center">No Data Found.<td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>