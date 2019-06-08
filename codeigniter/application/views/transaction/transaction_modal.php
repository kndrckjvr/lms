<div class="modal fade" id="manage-payment-modal" tabindex="-1" role="dialog" aria-labelledby="manage-payment-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="manage-payment-modal-title">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="manage-payment-form">
                    <div class="row">
                        <div class="col mb-4">
                            <label for="penalties">Penalty Fee</label>
                            <input type="number" name="penalties" class="form-control" id="penalties" disabled>
                        </div>
                        <div class="col mb-4">
                            <label for="payment">Payment</label>
                            <input type="number" name="payment" class="form-control" id="payment">
                        </div>
                    </div>
                    <div class="row" style="width: 30%; float: right;">
                        <div class="col mb-4">
                            <button class="btn btn-primary btn-block" type="submit">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var user_id = 0;
    jQuery(document).ready(function($) {
        $("#manage-payment-modal").on('show.bs.modal', function(e) {
            $("#manage-payment-modal-title").html("Loading...");
            user_id = $(e.relatedTarget).data("id");
            isLoading(true);
            $.ajax({
                url: baseUrl + "penaltyapi/getpenalty",
                type: "POST",
                dataType: "JSON",
                data: {
                    user_id: $(e.relatedTarget).data("id")
                },
                success: function(res) {
                    $("#manage-payment-modal-title").html("Payment");
                    $("#penalties").val(res.penalties);
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            })
        });

        $("#manage-payment-modal").on("hidden.bs.modal", function() {
            user_id = 0;
            $("#payment").val("");
        });

        $("#manage-payment-form").submit(function(e) {
            e.preventDefault();
            isLoading(true);
            $.ajax({
                url: baseUrl + "transactionapi/create",
                type: "POST",
                dataType: "JSON",
                data: {
                    payment: $("#payment").val(),
                    user_id: user_id,
                    status: 4
                },
                success: function(res) {
                    if(res.response == 0) {
                        swal(res.errorMessage + "!", {
                            icon: "warning",
                        });
                        return;
                    } else if(res.response == 1) {
                        swal("Successfully posted your payment!", {
                            icon: "success",
                        }).then(() => {
                            $(".modal").modal("hide");
                        });
                        return;
                    }
                },
                error: function error(jqxhr, err, textStatus) {
                    errorHandler(jqxhr, err, textStatus);
                },
                complete: complete()
            })
        })
    });
</script>