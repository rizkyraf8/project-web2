<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url(getController() . "/form") ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</a>
            </div>
            <div class="card-body">
            <table id="tableList" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="8%">No</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="8%">No</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
<script src="<?= base_url() ?>assets/app/js/user/user.js"></script>