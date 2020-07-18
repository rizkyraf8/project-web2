<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Transaction</h3>
            </div>
            <form role="form" action="<?= base_url(getController() . "/save_proses") ?>" method="POST" onsubmit="return(validate());" id="form">
                <div class="card-body">
                    <input type="hidden" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="transactionId" id="transactionId" value="<?= @$data['transactionId'] ? encode(@$data['transactionId']) : "" ?>">
                    <div class="form-group">
                        <label for="customerId">Customer</label>
                        <?php
                        foreach (getListData("customer") as $key => $value) {
                            $customerName = $value['customerId'] == @$data['customerId'] ? $value['customerName'] : "";
                        }
                        ?>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" placeholder="Enter Date Target" value="<?= @$customerName ?>" disabled>

                    </div>
                    <div class="form-group">
                        <label for="transactionDateTarget">Target</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="transactionDateTarget" placeholder="Enter Date Target" value="<?= @$data['transactionDateTarget'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="transactionDateActual">Complete</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="transactionDateActual" id="datepicker" placeholder="Enter Date Target" value="<?= @$data['transactionDateActual'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="transactionDateSend">Send</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="transactionDateSend" id="datepicker2" placeholder="Enter Date Target" value="<?= @$data['transactionDateSend'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose Status --</option>
                            <?php
                            foreach (getStatusTransaksi() as $key => $value) {
                                $selected = $key == @$data['status'] ? "selected" : "";
                            ?>
                                <option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row" style="margin-top: 40px">
                        <div class="col-sm-6">
                            <h4 class="card-title">Data Produk</h4>
                        </div>
                        <div class="col-sm-6 text-right">
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-product">Add Product</button> -->
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-sm-12">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="8%">No</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Sales Price</th>
                                        <th>Qty Request</th>
                                        <th>Qty Ready</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataList as $key => $value) {
                                    ?>
                                        <tr>
                                            <td width="8%"><?= $no ?></td>
                                            <td><?= $value['productName'] ?><input type="hidden" name="lineId[<?= $value['lineId'] ?>]" value="<?= $value['lineId'] ?>"/></td>
                                            <td>Rp <?= konversi_uang($value['productPrice']) ?></td>
                                            <td>Rp <?= konversi_uang($value['productSalesPrice']) ?></td>
                                            <td><?= $value['qtyRequest'] ?></td>
                                            <td><input type="number" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="qty[<?= $value['lineId'] ?>]" id="qty[<?= $value['lineId'] ?>]" value="<?= $value['qtyReady'] ?>" onkeyup="changeStatus(<?= $value['lineId'] ?>, this, <?= $value['qtyRequest'] ?>)"></td>
                                            <td>
                                                <select class="form-control" name="statusBarang[<?= $value['lineId'] ?>]" id="statusBarang[<?= $value['lineId'] ?>]" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" onchange="changeSelectStatus(<?= $value['lineId'] ?>, this.value, <?= $value['qtyRequest'] ?>)">
                                                    <option value="">-- Choose Status --</option>
                                                    <?php
                                                    foreach (getStatusBarang() as $key => $item) {
                                                        $selected = $key == @$value['status'] ? "selected" : "";
                                                    ?>
                                                        <option value="<?= $key ?>" <?= $selected ?>><?= $item ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="8%">No</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Sales Price</th>
                                        <th>Qty Request</th>
                                        <th>Qty Ready</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
<script src="<?= base_url() ?>assets/app/js/transaction/transaction_proses.js"></script>