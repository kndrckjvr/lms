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
                            <label for="penalty_date">Penalty Date</label>
                            <input type="text" class="form-control datepicker" value="<?= date("m/d/Y", strtotime("now + 1 day")) ?>" id="penalty_date" name="penalty_date">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col">
                            <label for="penalty_amount">Penalty Amount</label>
                            <input type="number" class="form-control" min="0" id="penalty_amount" name="penalty_amount" placeholder="Enter Penalty Amount">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="penalty_day">Penalty Day</label>
                            <input type="number" class="form-control" min="0" id="penalty_day" name="penalty_day" placeholder="Enter Penalty Day">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.datepicker').datepicker({
            autoclose: true,
            startDate: "<?= date("m/d/Y", strtotime("now +1 day")) ?>"
        });

        $("#penalty-create-form").submit(function(e) {
            e.preventDefault();
            isLoading(true);
            $("input").removeClass("is-invalid");
            $.ajax({
                url: baseUrl + "penaltyapi/create",
                type: "POST",
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "JSON",
                success: function success(res) {
                    if (res.response) {
                        $("#penalty-create-form").trigger("reset");
                        showSnackbar("Successfully Added!");
                    } else {
                        if (res.penalty_date) {
                            $("#penalty_date + .invalid-feedback").html(res.penalty_date);
                            $("#penalty_date").addClass("is-invalid");
                        }
                        if (res.penalty_amount) {
                            $("#penalty_amount + .invalid-feedback").html(res.penalty_amount);
                            $("#penalty_amount").addClass("is-invalid");
                        }
                        if (res.penalty_day) {
                            $("#penalty_day + .invalid-feedback").html(res.penalty_day);
                            $("#penalty_day").addClass("is-invalid");
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