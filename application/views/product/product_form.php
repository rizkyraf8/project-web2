<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>
            <form role="form" action="<?= base_url(getController() . "/save") ?>" method="POST" data-toggle="validator">
                <div class="card-body">
                    <input type="hidden" class="form-control" name="productId" id="productId" value="<?= @$data['productId'] ? encode(@$data['productId']) : "" ?>">
                    <div class="form-group">
                        <label for="vendorId">Vendor</label>
                        <select class="form-control" name="vendorId" id="vendorId" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose Vendor --</option>
                            <?php
                            foreach (getListData("vendor") as $key => $value) {
                                $selected = $value['vendorId'] == @$data['vendorId'] ? "selected" : "";
                            ?>
                                <option value="<?= $value['vendorId'] ?>" <?= $selected ?>><?= $value['vendorName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="productName" id="productName" placeholder="Enter Product Name" value="<?= @$data['productName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Product Price</label>
                        <input type="number" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="productPrice" id="productPrice" placeholder="Enter Product Price" value="<?= @$data['productPrice'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="productSalesPrice">Product Sales Price</label>
                        <input type="number" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="productSalesPrice" id="productSalesPrice" placeholder="Enter Product Sales Price" value="<?= @$data['productSalesPrice'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoryCode">Product Category</label>
                        <select class="form-control" name="categoryCode" id="categoryCode" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose Category --</option>
                            <?php
                            foreach (getListData("product_category") as $key => $value) {
                                $selected = $value['categoryCode'] == @$data['categoryCode'] ? "selected" : "";
                            ?>
                                <option value="<?= $value['categoryCode'] ?>" <?= $selected ?>><?= $value['categoryName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Product Description</label>
                        <textarea type="number" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="productDescription" id="productDescription" placeholder="Enter Product Description"> <?= @$data['productDescription'] ?></textarea>
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