<div class="modal fade" id="manage-section-modal" tabindex="-1" role="dialog" aria-labelledby="manage-section-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary" id="manage-section-modal-title">Loading...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <table class="table-sm col" id="manage-section-modal-table">
                    <tbody>
                        <tr>
                            <td class="w-75">
                                <table class="table-sm col">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%"></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Section Name: </td>
                                            <td><input type="text" class="form-control" id="section-name-field" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Section Code: </td>
                                            <td><input type="text" class="form-control" id="section-code-field" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Status: </td>
                                            <td id="status-field">
                                                <button class="btn btn-success" data-action="available" id="available-button" disabled>Activate</button>
                                                <button class="btn btn-danger" data-action="disable" id="disable-button" disabled>Deactivate</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit-book-item">Edit</button>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $("#manage-section-modal").on('show.bs.modal', function(e) {
        console.log($(e.relatedTarget).data("id"));
        $.ajax({
            url: baseUrl + "sectionapi/getsection",
            type: "POST",
            dataType: "JSON",
            data: {
                section_id: $(e.relatedTarget).data("id")
            },
            success: function success(res) {
                $("#manage-section-modal-title").html("Edit: " + res.value.section_name + " - " + res.value.section_code);
                $("#section-name-field").val(res.value.section_name);
                $("#section-code-field").val(res.value.section_code);
                $("#status-field button").attr("disabled", "true");
                $("#status-field #" + ((res.value.status == "0") ? "available" : "disable") + "-button").removeAttr("disabled");
            },
            error: function error(jqxhr, err, textStatus) {
                errorHandler(jqxhr, err, textStatus);
            },
            complete: complete()
        });
    });
});
</script>