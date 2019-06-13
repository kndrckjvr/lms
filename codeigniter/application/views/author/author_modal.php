<div class="modal fade" id="manage-author-modal" tabindex="-1" role="dialog" aria-labelledby="manage-author-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="manage-author-modal-title">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="author-edit-form" method="post">
                    <div class="form-row mb-3">
                        <input type="hidden" name="author_id" id="author-id">
                        <div class="col">
                            <label for="author-first-name">Author First Name</label>
                            <input type="text" class="form-control" id="author-first-name-modal" name="author-first-name" placeholder="Enter Author First Name">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label for="author-last-name">Author Last Name</label>
                            <input type="text" class="form-control" id="author-last-name-modal" name="author-last-name" placeholder="Enter Author Last Name">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $("#manage-author-modal").on('show.bs.modal', function(e) {
            $.ajax({
                url: baseUrl + "authorapi/getauthor",
                type: "POST",
                dataType: "JSON",
                data: {
                    author_id: $(e.relatedTarget).data("id")
                },
                success: function success(res) {
                    $("#author-id").val($(e.relatedTarget).data("id"));
                    $("#manage-author-modal-title").html("Edit: " + res.value.author_name);
                    $("#author-first-name-modal").val(res.value.author_fname);
                    $("#author-last-name-modal").val(res.value.author_lname);
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        });

        $("#author-edit-form").submit(function(e) {
            e.preventDefault();
            isLoading(true);
            $("input").removeClass("is-invalid");
            $.ajax({
                url: baseUrl + "authorapi/update",
                type: "POST",
                dataType: "JSON",
                data: {
                    author_first_name: $("#author-first-name-modal").val(),
                    author_last_name: $("#author-last-name-modal").val(),
                    author_id: $("#author-id").val()
                },
                success: function success(res) {
                    if (res.response) {
                        $("#author-edit-form").trigger("reset");
                        showSnackbar("Successfully Added!");
                            $(".modal").modal("hide");
                    } else {
                        if (res.author_first_name) {
                            $("#author-first-name-modal + .invalid-feedback").html(res.author_first_name);
                            $("#author-first-name-modal").addClass("is-invalid");
                        }
                        if (res.author_last_name) {
                            $("#author-last-name-modal + .invalid-feedback").html(res.author_last_name);
                            $("#author-last-name-modal").addClass("is-invalid");
                        }
                        if(res.author_first_name == null && res.author_last_name == null) {
                            showSnackbar("Successfully Updated!");
                            $(".modal").modal("hide");
                        }
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            });
        })
    });
</script>