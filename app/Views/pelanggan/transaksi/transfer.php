<?= $this->extend('pelanggan/layout/template') ?>
<?= $this->section('content') ?>


<?= session('pesan')  ?>
<div class="card">
    <div class="card-header bg-danger text-white">
        <h3><span class="fas fa"></span> Daftar Pembayaran</h3>
    </div>
    <div class="card-body">
        <?php
        if (session()->getFlashdata('sukses')) :
        ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('sukses') ?>
            </div>
        <?php endif; ?>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Waktu Checkout</th>
                    <th>Total Tranfer</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $id = session()->get('id_pelanggan');
                $db = \Config\Database::connect();
                $bayar = $db->query("select * from pesanan where id_pelanggan='$id' and metode_pembayaran='transfer'")->getResultArray();
                foreach ($bayar as $bayar) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $bayar['nama_penerima']; ?></td>
                        <td><?= $bayar['waktu_pembayaran']; ?></td>
                        <td>Rp.
                            <?php
                            $id_f = $bayar['id_pesanan'];
                            $total = 0;
                            $biaya = $db->query("select * from pemesanan where id_pesanan='$id_f'")->getResultArray();
                            foreach ($biaya as $biaya) :
                                $total = $total + $biaya['total_pesanan'];
                            endforeach;
                            echo number_format($total, 0, ".", ".");
                            ?>
                        </td>
                        <td>
                            <?php if (strlen($bayar['bukti_transfer']) > 0) { ?>
                                <img height="200" width="180" src="<?= base_url('bukti/' . $bayar['bukti_transfer']); ?>" alt="<?= $bayar['bukti_transfer']; ?>" class="img-pelanggan">
                            <?php  } else { ?>
                                <h5>Belum Upload</h5>
                            <?php  } ?>
                        </td>
                        <td align="center">
                            <?php if ($bayar['aksi'] == 0) { ?>
                                <a href="<?= base_url(); ?>/Pelanggan/Produk/berhasil/<?= $bayar['id_pesanan'] ?>" class="btn btn-sm btn-primary"><span class="fa fa-upload"></span></a>
                            <?php  } else { ?>
                                <font color="green"><span class="fa fa-check"></span> Terkonfirmasi </font>
                            <?php  } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>