<nav class="main-header navbar navbar-expand-md navbar-light navbar-light" style="background-color:#008000">
    <div class="container">
        <a href="#" class="navbar-brand">
            <!-- <img src="<?= base_url() ?>/logo2.jpg" alt="Admin Logo" height="60px" width="100%" class="img-rounded" style="opacity: .8"> -->
            <span class="brand-text text-white font-weight-bold h-1">KampungAnggur</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('/Pelanggan'); ?>" class="nav-link text-white">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/Pelanggan/Produk'); ?>" class="nav-link text-white">Produk</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/Pelanggan/kategori/index'); ?>" class="nav-link text-white">Kategori</a>
                </li>
                <?php if (session()->get('logged_in') === true) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/Pelanggan/Transaksi" class="nav-link text-white">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/Pelanggan/Transaksi/pembayaran" class="nav-link text-white">Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/Pelanggan/Tentang" class="nav-link text-white">Tentang Kami</a>
                    </li>
                <?php } ?>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <?php
            $cart = \Config\Services::cart();
            $keranjang = $cart->contents();
            $jumlah = null;

            foreach ($keranjang as $key => $value) {
                $jumlah += $value['qty'];
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/Pelanggan/Produk/keranjang'); ?>">
                    <i class="fa fa-shopping-cart text-white"></i>
                    <span class="badge badge-info badge-pill navbar-badge text-bold"><?= $jumlah ?></span>
                </a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <?php if (session()->get('logged_in') === true) { ?>
                <li class="nav-item">
                    <a href="<?= base_url() ?>/LoginUser/logout" onclick="return confirm('Apakah Anda yakin ingin keluar?');" class="nav-link text-white">
                        <i>Logout</i>
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url() ?>/LoginUser">
                        <i>Login</i>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>