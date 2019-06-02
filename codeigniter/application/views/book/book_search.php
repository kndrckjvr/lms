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
                            <tr class="book-class" data-id="<?= $book->book_id ?>" data-toggle="modal" data-target="#view-book-modal" style="cursor: pointer;">
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
                <nav class="mt-2" style="float: right;">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled prev">
                            <button class="page-link" onclick="changePage('prev')" tabindex="-1" aria-disabled="true">Previous</button>
                        </li>
                        <?php for($i = 1; $i <= $pages; $i++) {?>
                        <li class="page-item<?= (($i == 1) ? " active" : "") ?> page-number" onclick="changePage(<?= $i ?>)">
                            <button class="page-link"><?php echo $i . (($i == 1) ? "<span class='sr-only'>(current)</span>" : ""); ?></button>
                        </li>
                        <?php } ?>
                        <li class="page-item<?= (($pages == 0) ? " disabled" : "") ?> next">
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
        url: baseUrl + "bookapi/pagechange",
        type: "POST",
        dataType: "JSON",
        data: {
            page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e),
            book_name: $("#book-search-field").val()
        },
        success: function success(res) {
            $("#search-book-table tbody").html("");
            
            if (res.bookData) {
                res.bookData.forEach(element => {
                    $("#search-book-table tbody").append(
                    "<tr data-id='" + element.book_id + "' data-toggle='modal' data-target='#view-book-modal' style='cursor: pointer;'><td>"+ element.book_name +"</td><td>"+ element.book_author +"</td><td>"+ element.section_name +"</td><td class='text-center'>"+ element.book_qty +"</td></tr>")
                });
            } else {
                $("#search-book-table tbody").html("<td colspan='4' class='text-center'>No Book Found.</td>");
            }

            $(".page-item").removeClass("active");
            $($(".page-item")[res.currentPage]).addClass("active");
            
            currentPage = parseInt(res.currentPage);

            if(currentPage == 1) {
                $($(".page-item")[0]).addClass("disabled");
            } else {
                $($(".page-item")[0]).removeClass("disabled");
            }
            
            if(currentPage == res.pages) {
                $($(".page-item")[$(".page-item").length - 1]).addClass("disabled");
            } else {
                $($(".page-item")[$(".page-item").length - 1]).removeClass("disabled");
            }
        },
        error: function error(err) {

        },
        complete: complete()
    });
}

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
                        "<tr data-id='" + element.book_id + "' data-toggle='modal' data-target='#view-book-modal' style='cursor: pointer;'><td>"+ element.book_name +"</td><td>"+ element.book_author +"</td><td>"+ element.section_name +"</td><td class='text-center'>"+ element.book_qty +"</td></tr>")
                    });
                } else {
                    $("#search-book-table tbody").html("<td colspan='4' class='text-center'>No Book Found.</td>");
                }

                $("li.page-item.page-number").remove();
                
                currentPage = 1;

                for(var i = 1; i <= res.pages; i++) {
                    $("li.page-item.next").before("<li class='page-item" + ((i == 1) ? " active" : "") + " page-number' onclick='changePage(" + i + ")'><button class='page-link'>" + i + "</button></li>", )
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