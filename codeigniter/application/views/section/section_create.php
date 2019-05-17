<div id="content-wrapper" class="d-flex flex-column">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card shadow mt-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Section</h6>
                </div>
                
                <div class="card-body">
                    <form onsubmit="return false" method="post" id="section-create-form">
                    <!-- <form action="<?= base_url("bookapi/create") ?>" method="post"> -->
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="section-name">Section Name</label>
                                <input type="text" class="form-control" id="section-name" name="section-name" placeholder="Enter Section Name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="section-code">Section Code</label>
                                <input type="text" class="form-control" id="section-code" name="section-code" placeholder="Enter Section Code">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="create-section">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<script>
jQuery(document).ready(function ($) {
    $("#create-section").on('click', function () {
        $("input").removeClass("is-invalid");
        isLoading(true);
        $.ajax({
            url: baseUrl + "sectionapi/create",
            type: "POST",
            dataType: "JSON",
            data: {
                section_name: $("#section-name").val(),
                section_code: $("#section-code").val()
            },
            success: function success(res) {
                if (res.response) {
                    $("#section-create-form").trigger("reset");
                    showSnackbar("Successfully Added!");
                } else {
                    if (res.section_name) {
                        $("#section-name + .invalid-feedback").html(res.section_name);
                        $("#section-name").addClass("is-invalid");
                    }
                    if (res.section_code) {
                        $("#section-code + .invalid-feedback").html(res.section_code);
                        $("#section-code").addClass("is-invalid");
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