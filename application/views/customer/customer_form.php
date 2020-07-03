<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Customer</h3>
            </div>
            <form role="form" action="<?= base_url(getController() . "/save") ?>" method="POST">
                <div class="card-body">
                    <input type="hidden" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="customerId" id="customerId" value="<?= @$data['customerId'] ? encode(@$data['customerId']) : "" ?>">
                    <div class="form-group">
                        <label for="customerName">Customer Name</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="customerName" id="customerName" placeholder="Enter Customer Name" value="<?= @$data['customerName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="customerPhone">Customer Phone</label>
                        <input type="number" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="customerPhone" id="customerPhone" placeholder="Enter Customer Phone" value="<?= @$data['customerPhone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="customerProvince">Customer Province</label>
                        <select class="form-control" name="customerProvince" id="customerProvince" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose Province --</option>
                            <?php
                            foreach (getListData("mst_province") as $key => $value) {
                                $selected = $value['provinceId'] == @$data['customerProvince'] ? "selected" : "";
                            ?>
                                <option value="<?= $value['provinceId'] ?>" <?= $selected ?>><?= $value['provinceName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customerCity">Customer City</label>
                        <select class="form-control" name="customerCity" id="customerCity" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose City --</option>
                            <?php
                            foreach (getListData("mst_city", array("provinceId" => @$data['customerProvince'])) as $key => $value) {
                                $selected = $value['cityId'] == @$data['customerCity'] ? "selected" : "";
                            ?>
                                <option value="<?= $value['cityId'] ?>" <?= $selected ?>><?= $value['cityName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customerAddress">Customer Address</label>
                        <textarea type="number" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="customerAddress" id="customerAddress" placeholder="Enter Customer Address"><?= @$data['customerAddress'] ?></textarea>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/app/js/customer/customer_add.js"></script>