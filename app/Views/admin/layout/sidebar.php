
    <?php
        $uri = \Config\Services::uri()->getSegments();
        $menu = implode(array_slice($uri,0,2));
        $submenu = implode($uri);
    ?>

    <aside class="main-sidebar sidebar-dark-info elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?= base_url('template/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">BaseCI4</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= session()->imageurl ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= session()->name ?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-header">MAIN MENU</li>

                    <li class="nav-item">
                        <a href="<?= site_url('admin/dashboard') ?>" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item <?php echo $menu == 'adminaccount' ? 'menu-open': '' ?>">
                        <a href="#" class="nav-link <?php echo $menu == 'adminaccount' ? 'active': '' ?>">
                            <i class="nav-icon fas fa fa-user-circle"></i>
                            <p>
                                Account
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('admin/account/table') ?>" class="nav-link <?php echo $submenu == 'adminaccounttable' ? 'active': '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Table</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('admin/account/add') ?>" class="nav-link <?php echo $submenu == 'adminaccountadd' ? 'active': '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item <?php echo $menu == 'admincategory' ? 'menu-open': '' ?>">
                        <a href="#" class="nav-link <?php echo $menu == 'admincategory' ? 'active': '' ?>">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Category
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('admin/category/table') ?>" class="nav-link <?php echo $submenu == 'admincategorytable' ? 'active': '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Table</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('admin/category/add') ?>" class="nav-link <?php echo $submenu == 'admincategoryadd' ? 'active': '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item <?php echo $menu == 'adminproduct' ? 'menu-open': '' ?>">
                        <a href="#" class="nav-link <?php echo $menu == 'adminproduct' ? 'active': '' ?>">
                            <i class="nav-icon fas fas fa-boxes"></i>
                            <p>
                                Product
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= site_url('admin/product/table') ?>" class="nav-link <?php echo $submenu == 'adminproducttable' ? 'active': '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Table</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('admin/product/add') ?>" class="nav-link <?php echo $submenu == 'adminproductadd' ? 'active': '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-header">SETTING</li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
