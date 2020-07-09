<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Vendorr</h3>
            </div>
            <form role="form" action="<?= base_url(getController() . "/save") ?>" method="POST" id="form">
                <div class="card-body">
                    <input type="hidden" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="vendorId" id="vendorId" value="<?= @$data['vendorId'] ? encode(@$data['vendorId']) : "" ?>">
                    <div class="form-group">
                        <label for="vendorName">Vendor Name</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="vendorName" id="vendorName" placeholder="Enter Vendor Name" value="<?= @$data['vendorName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="vendorPhone">Vendor Phone</label>
                        <input type="number" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="vendorPhone" id="vendorPhone" placeholder="Enter Vendor Phone" value="<?= @$data['vendorPhone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="vendorProvince">Vendor Province</label>
                        <select class="form-control" name="vendorProvince" id="vendorProvince" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose Province --</option>
                            <?php
                            foreach (getListData("mst_province") as $key => $value) {
                                $selected = $value['provinceId'] == @$data['vendorProvince'] ? "selected" : "";
                            ?>
                                <option value="<?= $value['provinceId'] ?>" <?= $selected ?>><?= $value['provinceName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vendorCity">Vendor City</label>
                        <select class="form-control" name="vendorCity" id="vendorCity" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose City --</option>
                            <?php
                            foreach (getListData("mst_city", array("provinceId" => @$data['vendorProvince'])) as $key => $value) {
                                $selected = $value['cityId'] == @$data['vendorCity'] ? "selected" : "";
                            ?>
                                <option value="<?= $value['cityId'] ?>" <?= $selected ?>><?= $value['cityName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vendorAddress">Vendor Address</label>
                        <textarea type="number" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="vendorAddress" id="vendorAddress" placeholder="Enter Vendor Address"><?= @$data['vendorAddress'] ?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="loader text-center" style="text-align: center;display:none"></div>
                    <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/app/js/vendor/vendor_add.js"></script>