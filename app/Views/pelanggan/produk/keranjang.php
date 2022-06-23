<?= $this->extend('pelanggan/layout/template') ?>
<?= $this->section('content') ?>
<form action="<?= base_url('Pelanggan/Produk/updateCart'); ?>" method="post">
    <!-- Form End -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <!-- container -->
            <!-- Infor -->
            <div class="callout callout-info">
                <h5><i class="fa fa-info"></i> Informasi</h5>
                <p>
                    Jika anda melakukan perubahan pada <b>Jumlah</b> di keranjang belanja, klik tombol <b>Update</b> untuk menyimpan perubahannya. Jika tidak klik update maka perubahan pada <b>Jumlah</b> tidak akan tersimpan.
                </p>
            </div>
            <!-- Infor End -->
            <?php
            $keranjang = $cart->contents();
            if (empty($keranjang)) {
                //echo "<script>alert('kosong');</script>";
                echo "<script>alert('Keranjang Belanja Kosong, Silahkan lakukan pembelian untuk mengisi keranjang belanja anda.');</script>";
                echo "<script>location='" . base_url() . "/pelanggan/Produk'</script>";
            } else {
            ?>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h5>Amnoor
                                <small class="float-right">Date: <?= date('d/m/Y'); ?></small>
                            </h5>
                        </div>
                    </div>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th width="90px">Jumlah</th>
                                        <th>Subtotal</th>
                                        <th class="tengah">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $i = 1;
                                    foreach ($cart->contents() as $produk) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td class="text-center"><img src="<?= base_url('/produk/' . $produk['options']['image']); ?>" alt="foto Produk" width="70px"></td>
                                            <td><?= $produk['name']; ?></td>
                                            <td>Rp. <?= number_format($produk['price']); ?></td>
                                            <td><input type="number" name="qty<?= $i++; ?>" class="form-control form-control-sm" min="1" value="<?= $produk['qty']; ?>" width="100px"></td>
                                            <td>Rp. <?= number_format($produk['subtotal']); ?></td>
                                            <td class="text-center">
                                                <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Update</button>

                                                <a href="<?= base_url('Pelanggan/Produk/hapusKeranjang/' . $produk['rowid']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="text-bold">
                                        <td colspan="5">Total</td>
                                        <td colspan="2">Rp. <?= number_format($cart->total()); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <div class="btn">
                                <a href="<?= base_url('/Pelanggan/Produk/clear'); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus semua data ?');" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Semua</a>
                                <a href="<?= base_url('/Pelanggan/Produk'); ?>" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Belanja Lagi</a>
                                <?php if (session()->get('logged_in') == TRUE) { ?>
                                    <a href="<?= base_url('/Pelanggan/Produk/checkout'); ?>" class="btn btn-success"><i class="fa fa-money-check"></i> Checkout</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('/LoginPelanggan'); ?>" onclick="return confirm('Maaf Anda Belum Login. Untuk melanjutkan aksi anda harus login terlebih dahulu, Apakah anda akan Login ?');" class="btn btn-success"><i class="fa fa-money-check"></i> Checkout</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            <?php } ?>

        </div><!-- Container End -->
    </div>
    <!-- Content End -->
</form><!-- Form End -->

<?= $this->endSection() ?>