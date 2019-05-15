<div id="content-wrapper" class="d-flex flex-column">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card shadow mt-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Section</h6>
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
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>