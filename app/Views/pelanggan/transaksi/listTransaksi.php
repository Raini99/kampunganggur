<?= $this->extend('pelanggan/layout/template') ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container">
        <!-- container -->
        <div class="row">
            <div class="col-md-12 mx-auto">

                <?php
                if (session()->getFlashdata('batal')) {
                    //echo "<script>alert('kosong');</script>";
                    echo "<script>alert('" . session()->getFlashdata('batal') . "');</script>";
                    echo "<script>location='/Pelanggan/Transaksi'</script>";
                }
                ?>
                <?php
                // dd($cekTransaksi);
                if ($cekTransaksi) {
                    if ($cekTransaksi['id_pelanggan'] == session()->get('id_pelanggan')) {
                ?>
                        <!-- card -->
                        <?php foreach ($getPesanan as $pesanan) { ?>
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="idPesanan" value="<?= $pesanan['id_pesanan']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4 text-bold">
                                                    Nomor pesanan
                                                </div>
                                                <div class="col-md-8">
                                                    <?= $pesanan['id_pesanan'] ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 text-bold">
                                                    Waktu Pemesanan
                                                </div>
                                                <div class="col-md-8">
                                                    <?= $pesanan['waktu_pembayaran']
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-bold">
                                                    <?php
                                                    if ($pesanan['aksi'] == true) {
                                                    ?>

                                                        <a href="<?= base_url('Pelanggan/Transaksi/print/' . $pesanan['id_pesanan']) ?>" class="text-dark mt-3" target="_blank"><i class="fa fa-print"></i> Cetak</a>

                                                    <?php } else if ($pesanan['aksi'] == false) { ?>

                                                        <form method="POST" action="<?= base_url('Pelanggan/Transaksi/batal') ?>">
                                                            <input type="hidden" name="id" value="<?= $pesanan['id_pesanan'] ?>">
                                                            <button type="submit" class="text-dark btn btn-sm btn-danger text-white mt-3" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?');"><i class="fa fa-times"></i> Batalkan</button>
                                                        </form>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <table id="example1" class="table table-sm table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Status</th>
                                                        <?php if ($pesanan['aksi'] != true) { ?>
                                                            <td><span class="badge badge-warning">Sedang Diproses</span></td>
                                                        <?php } else { ?>
                                                            <td><span class="badge badge-success">Berhasil</span></td>
                                                        <?php } ?>
                                                    </tr>

                                                    <tr>
                                                        <?php
                                                        $db = \Config\Database::connect();
                                                        $total = 0;
                                                        $data = $db->table('pemesanan')
                                                            ->join('kota', 'kota.id_kota = pemesanan.id_kota')
                                                            ->getwhere(['id_pesanan' => $pesanan['id_pesanan']])->getResultArray();
                                                        foreach ($data as $value) {
                                                            $subtotal = $value['ongkir'] + $value['total_pesanan'];
                                                            $total += $subtotal;
                                                        }

                                                        ?>
                                                        <th>Total Belanja</th>
                                                        <td>Rp<?= number_format($total) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Metode</th>
                                                        <td><span class="badge badge-info"><?= $pesanan['metode_pembayaran'] ?></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                } else {
                    ?>
                    <div class="alert alert-danger text-center">
                        <h3>Opps, Belum ada transaksi yang dilakukan</h3>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div><!-- Container End -->
</div>

<?= $this->endSection() ?>