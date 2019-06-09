<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create Book</h6>
            </div>

            <div class="card-body">
                <form onsubmit="return false" method="post" id="book-create-form" enctype="multipart/form-data">
                    <!-- <form action="<?= base_url("bookapi/create") ?>" method="post"> -->
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="book-name">Book Name</label>
                            <input type="text" class="form-control" id="book-name" name="book-name" placeholder="Enter Book Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label for="book-author">Book Author</label>
                            <select class="form-control selectpicker with-ajax" multiple data-live-search="true" id="author-picker"></select>
                            <div class="invalid-feedback"></div>
                            <input type="hidden" name="book-author" id="book-author">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="book-section">Book Section</label>
                            <select name="book-section" id="book-section" class="form-control">
                                <?php
                                if ($sections) {
                                    foreach ($sections as $section) {
                                        echo "<option value='$section->section_id'>$section->section_name</option>";
                                    }
                                } else {
                                    echo "<option>No Sections Found.</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="book-quantity">Book Quantity</label>
                            <input type="number" min="1" class="form-control" id="book-quantity" name="book-quantity" placeholder="Enter Book Quantity">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="book-image-file">Book Image File</label><br />
                            <input type="file" name="book-image-file" id="book-image-file" style="display: none">
                            <div class="invalid-feedback"></div>
                            <div style="width: 150px; height: 200px; margin: 0 auto; background: #000; background-position: center; background-size: cover; cursor: pointer;" id="upload-image-div">
                                <p class="text-center pt-5 text-white">Click to upload image</p>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="create-book">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>

<script>
    jQuery(document).ready(function($) {
        var options = {
            values: "a, b, c",
            ajax: {
                url: baseUrl + "authorapi/search",
                type: "POST",
                dataType: "json",
                data: {
                    search_text: "{{{q}}}"
                }
            },
            locale: {
                emptyTitle: "Select and Begin Typing"
            },
            log: 3,
            preprocessData: function(data) {
                var i,
                    l = data.authorData.length,
                    array = [];
                if (l) {
                    for (i = 0; i < l; i++) {
                        array.push(
                            $.extend(true, data.authorData[i], {
                                text: data.authorData[i].author_name,
                                value: data.authorData[i].author_id,
                                data: {
                                    subtext: data.authorData[i].author_sname
                                }
                            })
                        );
                    }
                }
                // You must always return a valid array when processing data. The
                // data argument passed is a clone and cannot be modified directly.
                return array;
            }
        };
        $("#author-picker")
            .selectpicker()
            .filter(".with-ajax")
            .ajaxSelectPicker(options);

        $("#book-create-form").submit(function(e) {
            $("input").removeClass("is-invalid");
            isLoading(true);
            $.ajax({
                url: baseUrl + "bookapi/create",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "JSON",
                success: function success(res) {
                    console.log(res);
                    if (res.response) {
                        $("#book-create-form").trigger("reset");
                        showSnackbar("Successfully Added!");
                    } else {
                        res.errors.forEach((element) => {
                            console.log(element);
                        });
                        if (res.book_name) {
                            $("#book-name + .invalid-feedback").html(res.book_name);
                            $("#book-name").addClass("is-invalid");
                        }
                        if (res.book_author) {
                            $("#book-author + .invalid-feedback").html(res.book_author);
                            $("#book-author").addClass("is-invalid");
                        }
                        if (res.book_code) {
                            $("#book-code + .invalid-feedback").html(res.book_code);
                            $("#book-code").addClass("is-invalid");
                        }
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        });

        $("#upload-image-div").on('click', function() {
            $("#book-image-file").click()
        });

        $("#book-image-file").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onloadend = function() {
                    $("#upload-image-div").css("background-image", "url(" + reader.result + ")");
                }

                reader.readAsDataURL(this.files[0]);
            }
            $("#upload-image-div p").hide()
        });

        $("#author-picker").on('change', function(e) {
            $("#book-author").val($(e.currentTarget).val());
        });
    });
</script>