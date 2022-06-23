<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UMKM Kayangan | Halaman Verifikasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/lte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/lte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>VERIFIKASI</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Verifikasi akun baru</p>
                <?php
                if (session()->getFlashdata('sukses')) {
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <i class="icon fas fa-check"></i> <?= session()->getFlashdata('sukses'); ?>
                    </div>
                    <h4 style="text-align: center"><a href="<?= base_url() ?>/loginkustomer">Login disini</a></h4>
                <?php } else if (session()->getFlashdata('gagal')) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fas fa-check"></i> <?= session()->getFlashdata('gagal'); ?>
                    </div>
                <?php } ?>

                <?php
                if (!session()->getFlashdata('sukses')) {
                ?>
                    <form action="<?= base_url(); ?>/Register/verifikasi" method="post">
                        <input type="hidden" name="nama_kustomer" value="<?= (old('nama_kustomer')) ? old('nama_kustomer') : $nama_kustomer ?>">
                        <input type="hidden" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $alamat ?>">
                        <input type="hidden" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : $no_hp ?>">
                        <input type="hidden" name="email" value="<?= (old('email')) ? old('email') : $email ?>">
                        <input type="hidden" name="password" value="<?= (old('password')) ? old('password') : $password ?>">
                        <input type="hidden" name="kode_random" value="<?= (old('kode_random')) ? old('kode_random') : $kode_random ?>">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="kode" placeholder="Kode Verifikasi" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Verifikasi</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                <?php } ?>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/lte/dist/js/adminlte.min.js"></script>
</body>

</html>