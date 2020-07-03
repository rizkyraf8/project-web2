<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add User</h3>
            </div>
            <form role="form" action="<?= base_url(getController() . "/save") ?>" method="POST">
                <div class="card-body">
                    <input type="hidden" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="userId" id="userId" value="<?= @$data['userId'] ? encode(@$data['userId']) : "" ?>">
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="userName" id="userName" placeholder="Enter User Name" value="<?= @$data['userName'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">User Email</label>
                        <input type="email" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="userEmail" id="userEmail" placeholder="Enter User Email" value="<?= @$data['userEmail'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="userPassword">User Password</label>
                        <?php
                        if (@$data['userId']) {
                        ?>
                            <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Enter User Password">
                        <?php
                        }else{
                            ?>
                            <input type="password" class="form-control" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required" name="userPassword" id="userPassword" placeholder="Enter User Password">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="userType">User Type</label>
                        <select class="form-control" name="userType" id="userType" data-validation="required" data-validation-error-msg="Anda belum mengisi field ini" required="required">
                            <option value="">-- Choose Type --</option>
                            <?php
                            foreach (getUserType() as $key => $value) {
                                $selected = $key == @$data['userType'] ? "selected" : "";
                            ?>
                                <option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
                            <?php
                            }
                            ?>
                        </select>
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
<script src="<?= base_url() ?>assets/app/js/user/user_add.js"></script>