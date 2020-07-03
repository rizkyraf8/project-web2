<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url(getController() . "/form") ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Transaction</a>
            </div>
            <div class="card-body">
            <table id="tableList" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <!-- <th>Invoice Number</th> -->
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="8%">No</th>
                            <!-- <th>Invoice Number</th> -->
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/app/js/transaction/transaction.js"></script>