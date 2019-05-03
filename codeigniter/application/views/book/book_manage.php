<div id="content-wrapper" class="d-flex flex-column">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card shadow mt-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Books</h6>
                </div>
                
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-8"></div>
                        <form class="col-4">
                            <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                                <th>Book Name</th>
                                <th>Book Author</th>
                                <th>Book Section</th>
                                <th class="text-center">Available Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($books != null) foreach($books as $book) { ?>
                            <tr data-id="<?= $book->book_id ?>" data-toggle="modal" data-target="#manage-book-modal" style="cursor: pointer;">
                                <td><?= $book->book_name ?></td>
                                <td><?= $book->book_author ?></td>
                                <td><?= $book->section_name ?></td>
                                <td class="text-center"><?= $book->book_qty ?></td>
                            </tr>
                            <?php } else { ?><tr><td colspan="4" class="text-center">No Book Found.</td></tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>