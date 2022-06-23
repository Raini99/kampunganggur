<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UMKM Kayangan | Halaman Registrasi</title>

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
      <a href="<?= base_url(); ?>/lte/index2.html"><b>REGISTRASI</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Registrasi pengguna baru</p>
        <?php
        if (session()->getFlashdata('status')) {
        ?>
          <div class="alert alert-warning alert-dismissible">
            <i class="icon fas fa-check"></i> <?= session()->getFlashdata('status'); ?>
          </div>
        <?php } ?>

        <form action="<?= base_url(); ?>/Register/auth" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama_pelanggan" value="<?= old('nama_pelanggan') ?>" placeholder="Nama Lengkap" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="no_hp" value="<?= old('no_hp') ?>" placeholder="No HP/WA" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" value="<?= old('email') ?>" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap" required><?= old('alamat') ?></textarea>
          </div>
          <div style="color: red">
            <?= $validation->getError('password'); ?>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" value="<?= old('password') ?>" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div style="color: red">
            <?= $validation->getError('pass_confir'); ?>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="pass_confir" value="<?= old('pass_confir') ?>" placeholder="Konfirmasi password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <a href="<?= base_url() ?>/LoginUser" class="text-center">Saya sudah punya akun</a>
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