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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8369; <?= $penalty ?></div>
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
    <div class="row mt-4">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row">
                <div class="col-6">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Penalties</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8369; <?= $allpenalties ?></div>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">&#8369; <?= $allpaid ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- <div class="card shadow mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Login Logs</h6>
                </div>

                <div class="card-body">
                </div>
            </div> -->
        </div>
        <div class="col-1"></div>
    </div>
<?php
} ?>