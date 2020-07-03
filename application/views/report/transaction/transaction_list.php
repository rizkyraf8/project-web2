<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url(getController() . "/xls") ?>" class="btn btn-success"><i class="fa fa-file-excel"></i> Import Excel</a>
            </div>
            <div class="card-body">
                <table id="tableList" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <th>Customer Name</th>
                            <th>Date Target</th>
                            <th>Date Complete</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="8%">No</th>
                            <th>Customer Name</th>
                            <th>Date Target</th>
                            <th>Date Complete</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/app/js/report/transaction/transaction_list.js"></script>