<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Transaction</h3>
            </div>
            <form role="form" action="<?= base_url(getController() . "/save") ?>" method="POST" onsubmit="return(validate());">
                <div class="card-body">
                    <input type="hidden" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="transactionId" id="transactionId" value="<?= @$data['transactionId'] ? encode(@$data['transactionId']) : "" ?>">
                    <div class="form-group">
                        <label for="customerId">Customer</label>
                        <select class="form-control" name="customerId" id="customerId" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose Customer --</option>
                            <?php
                            foreach (getListData("customer") as $key => $value) {
                                $selected = $value['customerId'] == @$data['customerId'] ? "selected" : "";
                            ?>
                                <option value="<?= $value['customerId'] ?>" <?= $selected ?>><?= $value['customerName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transactionDateTarget">Target</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="transactionDateTarget" id="datepicker" placeholder="Enter Date Target" value="<?= @$data['transactionDateTarget'] ?>">
                    </div>

                    <div class="row" style="margin-top: 40px">
                        <div class="col-sm-6">
                            <h4 class="card-title">Data Produk</h4>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-product">Add Product</button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-sm-12">
                            <table id="tableList" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="8%">No</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Sales Price</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="8%">No</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Sales Price</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-product">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tableProduct" class="table table-bordered table-striped dataTable"
                    <thead>
                        <tr>
                            <th width="8%"></th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Product Sales Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="8%"></th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Product Sales Price</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="getCheckData()" data-dismiss="modal">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    var transactionId = "<?= encode(@$data['transactionId']) ?>";
</script>
<script src="<?= base_url() ?>assets/app/js/transaction/transaction_add.js"></script>