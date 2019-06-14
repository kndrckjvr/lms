<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Reserve Books</h6>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-8"></div>
                    <form class="col-4" onsubmit="return false">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." id="book-search-field">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-deck" id="book_card_columns">
                            <?php if ($books != null) foreach ($books as $book) {
                                // var_dump($book);
                                // die();
                                $book_image_name = $book->book_image != NULL ? $book->book_image : "no_image.png";
                                ?>
                                <div class="col-md-4">
                                    <div class="card mb-4" style="width: 18rem;">
                                        <img class="card-img-top" src="<?= base_url('images/') . $book_image_name ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $book->book_name ?></h5>
                                            <p class="card-text">
                                                Book Author : <?= $book->book_author ?> <br>
                                                Section Name : <?= $book->section_name ?> <br>
                                                Book Quantity : <?= $book->book_qty ?>
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <button class="btn btn-primary" data-id="<?= $book->book_id ?>" data-toggle="modal" data-target="#reserve-book-modal">Reserve</button>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>
                                <h1>No Book Found.</h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
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
            url: baseUrl + "bookapi/pagechange",
            type: "POST",
            dataType: "JSON",
            data: {
                page: (e == 'next') ? currentPage + 1 : ((e == 'prev') ? currentPage - 1 : e),
                book_name: $("#book-search-field").val()
            },
            success: function success(res) {
                $("#book_card_columns").html("");

                if (res.bookData) {
                    res.bookData.forEach(element => {
                        $("#book_card_columns").append("<div class='col-md-4'><div class='card mb-4' style='width: 18rem;'>" +
                            "<img class='card-img-top' src='" + baseUrl + "images/" + ((element.book_image == "") ? "no_image.png" : element.book_image) + "' alt='Card image cap'>" +
                            "<div class='card-body'>" +
                            "<h5 class='card-title'>" + element.book_name + "</h5>" +
                            "<p class='card-text'> Book Author : " + element.book_author + " <br> Section Name: " + element.section_name + " <br> Book Quantity: " + element.book_qty + "</p>" +
                            "</div>" +
                            "<div class='card-body'>" +
                            "<button class='btn btn-primary' data-id='" + element.book_id + "' data-toggle='modal' data-target='#reserve-book-modal'>Reserve</button>" +
                            "</div>" +
                            "</div>" +
                            "</div>")


                    });
                } else {
                    $("#book_card_columns").html("<h1>No Book Found.</h1>");
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

    jQuery(document).ready(function($) {
        $("#book-search-field").donetyping(function() {
            isLoading(true)
            $.ajax({
                url: baseUrl + "bookapi/searchbook",
                type: "POST",
                dataType: "JSON",
                data: {
                    book_name: $("#book-search-field").val()
                },
                success: function success(res) {
                    $("#book_card_columns").html("");
                    if (res.books) {
                        res.books.forEach(element => {
                            $("#book_card_columns").append("<div class='col-md-4'><div class='card mb-4' style='width: 18rem;'>" +
                                "<img class='card-img-top' src='" + baseUrl + "images/" + ((element.book_image == "") ? "no_image.png" : element.book_image) + "' alt='Card image cap'>" +
                                "<div class='card-body'>" +
                                "<h5 class='card-title'>" + element.book_name + "</h5>" +
                                "<p class='card-text'> Book Author : " + element.book_author + " <br> Section Name: " + element.section_name + " <br> Book Quantity: " + element.book_qty + "</p>" +
                                "</div>" +
                                "<div class='card-body'>" +
                                "<button class='btn btn-primary' data-id='" + element.book_id + "' data-toggle='modal' data-target='#reserve-book-modal'>Reserve</button>" +
                                "</div>" +
                                "</div>" +
                                "</div>")
                        });
                    } else {
                        $("#book_card_columns").html("<h1>No Book Found.</h1>");
                    }

                    $("li.page-item.page-number").remove();

                    currentPage = 1;

                    pageHandler(currentPage, res.pages);

                    for (var i = 1; i <= res.pages; i++) {
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