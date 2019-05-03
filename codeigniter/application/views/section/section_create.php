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