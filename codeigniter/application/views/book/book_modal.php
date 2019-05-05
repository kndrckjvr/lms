<div class="modal fade" id="manage-book-modal" tabindex="-1" role="dialog" aria-labelledby="manage-book-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="manage-book-modal-title">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <table class="table-sm table-hover col" id="manage-book-modal-table">
                    <thead>
                        <tr>
                            <th>Book Code</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Added Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manage-book-item-modal" tabindex="-1" role="dialog" aria-labelledby="manage-book-item-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="manage-book-item-modal-title">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <table class="table-sm col" id="manage-book-item-modal-table">
                    <tbody>
                        <tr>
                            <td class="w-25">
                                <div style="width: 150px; height: 200px; margin: 0 auto; background: #000; background-position: center; background-size: cover;" id="upload-image-div">
                                    <p class="text-center pt-5 text-white">No Image Uploaded</p>
                                </div>
                            </td>
                            <td class="w-75">
                                <table class="table-sm col">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%"></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Book Name: </td>
                                            <td><input type="text" class="form-control" id="book-name-field" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Book Author: </td>
                                            <td><input type="text" class="form-control" id="book-author-field" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Book Code: </td>
                                            <td><input type="text" class="form-control" id="book-code-field" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Section: </td>
                                            <td>
                                            <select name="book-section-field" id="book-section-field" class="form-control" disabled>
                                                <?php
                                                    foreach($sections as $section) {
                                                        echo "<option value='$section->section_id'>$section->section_name</option>";
                                                    }
                                                ?>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status: </td>
                                            <td id="status-field">
                                                <button class="btn btn-success" data-action="available" id="available-button">Available</button>
                                                <button class="btn btn-primary" data-action="reserve" data-token="" id="reserve-button" data-toggle="modal" data-target="#user-data-modal">Reserve</button>
                                                <button class="btn btn-warning" data-action="borrow" data-token="" id="borrow-button" data-toggle="modal" data-target="#user-data-modal">Borrow</button>
                                                <button class="btn btn-info" data-action="return" data-token="" id="return-button" data-toggle="modal" data-target="#user-data-modal">Return</button>
                                                <button class="btn btn-danger" data-action="disable" id="disable-button">Disable</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Remarks:</td>
                                            <td id="remarks-field">None</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit-book-item">Edit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="user-data-modal" tabindex="-1" role="dialog" aria-labelledby="user-data-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="user-data-modal-title">Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-5"></div>
                    <form class="col-7" onsubmit="return false;">
                        <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." id="search-user-field">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="search-user-button">
                            <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
                <table class="table-sm table-hover col" id="user-data-modal-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th class="text-center">Current Borrowed Books</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>