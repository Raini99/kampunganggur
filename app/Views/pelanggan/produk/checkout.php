<?= $this->extend('pelanggan/layout/template') ?>
<?= $this->section('content') ?>

<form action="<?= base_url('Pelanggan/Produk/addCheckout'); ?>" method="post">
    <!-- Form End -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <!-- container -->
            <?php
            $keranjang = $cart->contents();
            if (empty($keranjang)) {
                //echo "<script>alert('kosong');</script>";
                echo "<script>alert('Keranjang Belanja Kosong, Silahkan lakukan pembelian untuk mengisi keranjang belanja anda.');</script>";
                echo "<script>location='" . base_url() . "/Pelanggan/Produk/keranjang'</script>";
            } else {
            ?>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <small class="float-right">Date: <?= date('d/m/Y'); ?></small>
                            </h5>
                        </div>
                    </div>
                    <!-- /.row -->
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
                                        <th>Qty</th>
                                        <th>Subtotal</th>
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
                                            <td><img src="<?= base_url('produk/' . $produk['options']['image']); ?>" alt="image" width="70px"></td>
                                            <td><?= $produk['name']; ?></td>
                                            <td>Rp. <?= number_format($produk['price']); ?></td>
                                            <td><?= $produk['qty']; ?></td>
                                            <td>Rp. <?= number_format($produk['subtotal']); ?></td>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="mx-auto" style="width:40%">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= (old('nama')) ? old('nama') : $pelanggan['nama_pelanggan']; ?>" class="form-control form-control-sm <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telpon">Telpon</label>
                                    <input type="number" name="telpon" value="<?= (old('telpon')) ? old('telpon') : $pelanggan['no_hp']; ?>" class="form-control form-control-sm <?= ($validation->hasError('telpon') ? 'is-invalid' : ''); ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telpon'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ongkir">Ongkir</label>
                                    <select name="ongkir" class="form-control form-control-sm <?= ($validation->hasError('ongkir') ? 'is-invalid' : ''); ?>" value="<?= old('ongkir'); ?>">
                                        <option value="1">-- Pilih Ongkir --</option>
                                        <?php foreach ($getKota as $kota) :
                                        ?>
                                            <option value="<?= $kota['id_kota']; ?>"><?php echo $kota['nama_kota']; ?> : Rp. <?= number_format($kota['ongkir']); ?></option>
                                        <?php endforeach;
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ongkir'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Alamat">Alamat Pengiriman</label>
                                    <textarea name="alamat" class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" rows="3" required><?= (old('alamat')) ? old('alamat') : $pelanggan['alamat']; ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Pesan">Detail Pesan</label>
                                    <textarea name="pesan" class="form-control <?= ($validation->hasError('pesan') ? 'is-invalid' : ''); ?>" rows="3" required><?= (old('pesan')) ? old('pesan') : ""; ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pesan'); ?>
                                    </div>
                                </div>
                                <label for="">Metode Pembayaran</label>
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <div class="form-check">
                                                        <input name="metode" class="form-check-input" type="radio" id="exampleRadios1" value="transfer" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <font color='black'>Transfer Bank</font>
                                                        </label>
                                                    </div>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Jika Menggunakan Metode Ini Maka Akan Diarahkan Ke Halaman Upload Bukti Transfer
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <div class="form-check">
                                                        <input name="metode" class="form-check-input" type="radio" id="exampleRadios2" value="cod">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            <font color='black'>COD</font>
                                                        </label>
                                                    </div>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Jika Menggunakan Metode Ini Maka Anda Akan membayar setelah barang sampai ke rumah anda
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('pelanggan/keranjangblanja'); ?>" class="btn btn-outline-info col-4 offsite-6"><i class="fa fa-arrow-left"></i> Back</a>
                                    <button type="submit" name="beli" class="btn bg-orange col-4 offsite-6 float-right" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan pesanan ini?');">Pesan</button>
                                </div>
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