<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="card shadow mb-5">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create Penalty</h6>
            </div>
            
            <div class="card-body">
                <form onsubmit="return false" method="post" id="penalty-create-form">
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="penalty-date">Penalty Date</label>
                            <input type="text" class="form-control" id="penalty-date" name="penalty-date" placeholder="Enter Penalty Date">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label for="penalty-amount">Penalty Amount</label>
                            <input type="text" class="form-control" id="penalty-amount" name="penalty-amount" placeholder="Enter Penalty Amount">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="penalty-day">Penalty Day</label>
                            <input type="text" class="form-control" id="penalty-day" name="penalty-day" placeholder="Enter Penalty Day">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold" id="create-penalty">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>

<script>
jQuery(document).ready(function ($) {
    $("#login-form").submit(function(e) {
        e.preventDefault();
        isLoading(true);
        $.ajax({
            url: baseUrl + "",
            type: "POST",
            dataType: "JSON",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "JSON",
            success: function success(res) {
                
            },
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
            },
            complete: complete()
        });
    });
});
</script>