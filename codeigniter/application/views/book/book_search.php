<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Search Books</h6>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-8"></div>
                    <form class="col-4" onsubmit="return false">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." id="book-search-field">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="book-search-button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table-sm table-hover col" id="search-book-table">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Author</th>
                            <th>Book Section</th>
                            <th class="text-center">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($books != null) foreach ($books as $book) { ?>
                            <tr class="book-class" data-id="<?= $book->book_id ?>" data-toggle="modal" data-target="#manage-book-modal" style="cursor: pointer;">
                                <td class="book-name-class"><?= $book->book_name ?></td>
                                <td><?= $book->book_author ?></td>
                                <td><?= $book->section_name ?></td>
                                <td class="text-center"><?= $book->book_qty ?></td>
                            </tr>
                        <?php } else { ?><tr>
                                <td colspan="4" class="text-center">No Book Found.</td>
                            </tr><?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>
<script>
    jQuery(document).ready(function($) {
        $("#book-search-button").on('click', function(e) {
            isLoading(true)
            $.ajax({
                url: baseUrl + "bookapi/searchbook",
                type: "POST",
                dataType: "JSON",
                data: {
                    book_name: $("#book-search-field").val()
                },
                success: function success(res) {
                    $("#search-book-table tbody").html("");
                    if (res.books) {
                        res.books.forEach(element => {
                            $("#search-book-table tbody").append(
                            "<tr data-id='" + element.book_id + "' data-toggle='modal' data-target='#manage-book-modal' style='cursor: pointer;'><td>"+ element.book_name +"</td><td>"+ element.book_author +"</td><td>"+ element.section_name +"</td><td class='text-center'>"+ element.book_qty +"</td></tr>")
                        });
                    } else {
                    $("#search-book-table tbody").html("<td colspan='4' class='text-center'>No Book Found.</td>");
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        });
    });
</script>