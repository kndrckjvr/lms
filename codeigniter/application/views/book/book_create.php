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
                            <input type="text" class="form-control" id="book-author" name="book-author" placeholder="Enter Book Author">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="book-author">Book Code</label>
                            <input type="text" class="form-control" id="book-code" name="book-code" readonly value="<?= $book_section_code ?>">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label for="book-section">Book Section</label>
                            <select name="book-section" id="book-section" class="form-control">
                                <?php
                                    foreach($sections as $section) {
                                        echo "<option value='$section->section_id'>$section->section_name</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="book-image-file">Book Image File</label><br/>
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
    $("#book-section").on('change', function(e) {
        isLoading(true);
        $.ajax({
            url: baseUrl + "sectionapi/getnextcode",
            type: "POST",
            dataType: "JSON",
            data: {
                section_value: $(e.currentTarget).val()
            },
            success: function success(res) {
                // $("#book-code").val(res.value);
                document.getElementById("book-code").value = res.value;
            },
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
            },
            complete: complete()
        });
    });
    

    $("#book-create-form").submit(function (e) {
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
                if (res.response) {
                    $("#book-create-form").trigger("reset");
                    showSnackbar("Successfully Added!");
                } else {
                    console.log(res);
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

    $("#upload-image-div").on('click', function () {
        $("#book-image-file").click()
    });

    $("#book-image-file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onloadend = function () {
                $("#upload-image-div").css("background-image", "url(" + reader.result + ")");
            }

            reader.readAsDataURL(this.files[0]);
        }
        $("#upload-image-div p").hide()
    });
});
</script>