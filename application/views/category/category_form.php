<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <form role="form" action="<?= base_url(getController() . "/save") ?>" method="POST">
                <div class="card-body">
                    <input type="hidden" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="categoryId" id="categoryId" value="<?= @$data['categoryId'] ? encode(@$data['categoryId']) : "" ?>">
                    <div class="form-group">
                        <label for="categoryCode">Category Code</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="categoryCode" id="categoryCode" placeholder="Enter Category Code" value="<?= @$data['categoryCode'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="categoryName" id="categoryName" placeholder="Enter Category Name" value="<?= @$data['categoryName'] ?>">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>