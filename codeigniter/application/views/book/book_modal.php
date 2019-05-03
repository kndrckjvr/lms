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
                                <div style="width: 150px; height: 200px; margin: 0 auto; background: #000; background-position: center; background-size: cover; cursor: pointer;" id="upload-image-div">
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
                                                <button class="btn btn-success" id="available-button">Available</button>
                                                <button class="btn btn-primary" id="reserve-button">Reserve</button>
                                                <button class="btn btn-warning" id="borrow-button">Borrow</button>
                                                <button class="btn btn-info" id="return-button">Return</button>
                                                <button class="btn btn-danger" id="disable-button">Disable</button>
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