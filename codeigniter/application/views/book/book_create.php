<div id="content-wrapper" class="d-flex flex-column">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card shadow mt-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create Book</h6>
                </div>
                
                <div class="card-body">
                    <form action="<?= base_url("bookapi/create") ?>" method="post">
                        <div class="form-row mb-3">
                            <div class="col">
                                <label for="book-name">Book Name</label>
                                <input type="text" class="form-control" id="book-name" name="book-name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col">
                                <label for="book-author">Book Author</label>
                                <input type="text" class="form-control" id="book-author" name="book-author">
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
</div>