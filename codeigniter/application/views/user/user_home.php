<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </div>

            <div class="card-body">
                <h1 class="welcome-message text-center">Welcome, <?= $username; ?></h1>
                <!-- <pre>
                <?php
                print_r($_SESSION);
                ?>
                </pre> -->
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>
<?php if ($this->session->userdata("user_type") == "0") { ?>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row">
                <div class="col">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Unpaid Amount</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8369; <?= ($penalty == 0) ? "0" : $penalty ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col">
                                                <div class="card border-left-success shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Number of Books Reserved/Borrowed</div>
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
            </div>
        </div>
        <div class="col-1"></div>
    </div>
<?php } else {
    ?>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row">
                <div class="col-6">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Penalties</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8369; <?= ($allpenalties == 0) ? "0" : $allpenalties  ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Paid</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8369; <?= ($allpaid == 0) ? "0" : $allpaid ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
<?php
} ?>
<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Login Logs</h6>
            </div>

            <div class="card-body">
                <table class="table-sm table-hover col" id="log-table">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Date</th>
                            <th style="width: 30%; text-align: center;">Status</th>
                            <th style="width: 30%; text-align: center;">IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log) { ?>
                            <tr>
                                <td><?= date("F j, Y g:i:s A", $log->login_date_time) ?></td>
                                <td class="text-center"><span class="badge badge-<?= ($log->status) ? "success" : "danger" ?>"><?= ($log->status) ? "Login" : "Logout" ?></span></td>
                                <td class="text-center"><?= $log->ip_address ?></td>
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
            url: baseUrl + "logsapi/pagechange",
            type: "POST",
            dataType: "JSON",
            data: {
                page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e)
            },
            success: function success(res) {
                $("#log-table tbody").html("");
                if (res.logData) {
                    res.logData.forEach(element => {
                        $("#log-table tbody").append(
                            "<tr>" +
                            "<td>" + formatDate(new Date(element.login_date_time * 1000)) + "</td>" +
                            "<td class='text-center'><span class='badge badge-" + ((element.status == "1") ? "success" : "danger") + "'>" + ((element.status == "1") ? "Login" : "Logout") + "</span></td>" +
                            "<td class='text-center'>" + element.ip_address + "</td>" +
                            "</tr>")
                    });
                } else {
                    $("#log-table tbody").html("<td colspan='3' class='text-center'>No Logs Found.</td>");
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
</script>