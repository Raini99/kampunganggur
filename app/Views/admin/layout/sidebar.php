<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color:#008000">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center bg-white">
        <!-- <img src="<?= base_url() ?>/logo2.jpg" alt="Admin Logo" class="img-rounded" height="70px" width="60%" style="opacity: 1"> -->
        <span class="brand-text font-weight-light font-weight-bold">KampungAnggur</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="<?= base_url() ?>/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">ADMIN</a>
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin" class="nav-link text-white">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin/Produk" class="nav-link text-white">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin/Kategori" class="nav-link text-white">
                        <i class="nav-icon fas fa-asterisk"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin/Pelanggan" class="nav-link text-white">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pelanggan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin/Kota" class="nav-link text-white">
                        <i class="nav-icon fas fa-border-all"></i>
                        <p>Kota</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin/Transaksi" class="nav-link text-white">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Pemesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin/Transaksi/pembayaran" class="nav-link text-white">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
                <li class="nav-header text-white">AKUN</li>
                <!--  <li class="nav-item">
                    <a href="<?= base_url(); ?>/Admin/Produk" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Ganti Password
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/LoginUser/logout" class="nav-link text-white" onclick="return confirm('Apakah Anda yakin ingin keluar?');">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>