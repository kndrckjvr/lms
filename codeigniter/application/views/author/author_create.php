<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create Author</h6>
            </div>
            
            <div class="card-body">
                <form onsubmit="return false" method="post" id="author-create-form">
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="author-first-name">Author First Name</label>
                            <input type="text" class="form-control" id="author-first-name" name="author-first-name" placeholder="Enter Author First Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label for="author-last-name">Author Last Name</label>
                            <input type="text" class="form-control" id="author-last-name" name="author-last-name" placeholder="Enter Author Last Name">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="create-author">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>

<script>
jQuery(document).ready(function ($) {
    $("#create-author").on('click', function () {
        $("input").removeClass("is-invalid");
        isLoading(true);
        $.ajax({
            url: baseUrl + "authorapi/create",
            type: "POST",
            dataType: "JSON",
            data: {
                author_first_name: $("#author-first-name").val(),
                author_last_name: $("#author-last-name").val()
            },
            success: function success(res) {
                if (res.response) {
                    $("#author-create-form").trigger("reset");
                    showSnackbar("Successfully Added!");
                } else {
                    if (res.author_first_name) {
                        $("#author-first-name + .invalid-feedback").html(res.author_first_name);
                        $("#author-first-name").addClass("is-invalid");
                    }
                    if (res.author_last_name) {
                        $("#author-last-name + .invalid-feedback").html(res.author_last_name);
                        $("#author-last-name").addClass("is-invalid");
                    }
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