<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= getController() == "dashboard" ? "active" : "" ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="<?= base_url('customer') ?>" class="nav-link <?= getController() == "customer" ? "active" : "" ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('vendor') ?>" class="nav-link <?= getController() == "vendor" ? "active" : "" ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Vendor
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('product') ?>" class="nav-link <?= getController() == "product" ? "active" : "" ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('category') ?>" class="nav-link <?= getController() == "category" ? "active" : "" ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Product Category
                        </p>
                    </a>
                </li>
                <li class="nav-header">Transaction</li>
                <li class="nav-item">
                    <a href="<?= base_url('transaction') ?>" class="nav-link <?= getController() == "transaction" ? "active" : "" ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Transaction
                        </p>
                    </a>
                </li>
                <li class="nav-header">Report</li>
                <li class="nav-item">
                    <a href="<?= base_url('report_transaction') ?>" class="nav-link  <?= getController() == "report_transaction" ? "active" : "" ?>">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Transaction
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('transaction') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Vendor
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('transaction') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('transaction') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-header">Setting</li>
                <?php
                if ($this->session->userData("userType")) {
                ?>
                    <li class="nav-item">
                        <a href="<?= base_url('user') ?>" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                User List
                            </p>
                        </a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a href="<?= base_url('login/logout') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</aside>