<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Manage Payment</h6>
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
                <table class="table-sm table-hover col" id="manage-book-table">
                    <thead>
                        <tr>
                            <th class="w-75">Username</th>
                            <th style="width: 10%" class="text-center">User Type</th>
                            <th style="width: 10%" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr data-id="<?= $user->user_id ?>" data-toggle="modal" data-target="#manage-user-modal" style="cursor: pointer;">
                            <td><?= $user->username ?></td>
                            <td class="text-center"><span class="badge badge-<?php echo ($user->user_type == 1) ? "info" : "primary" ; ?>"><?php echo ($user->user_type == 1) ? "<i class='fas fa-user-shield'></i>&nbsp;Admin" : "<i class='fas fa-user-alt'></i>&nbsp;User" ; ?></span></td>
                            <td class="text-center"><span class="badge badge-<?php echo ($user->status == 1) ? "success" : "danger" ; ?>"><?php echo ($user->status == 1) ? "Active" : "Inactive" ; ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>