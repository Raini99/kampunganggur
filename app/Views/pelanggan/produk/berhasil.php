<?= $this->extend('pelanggan/layout/template') ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="container">
        <!-- container -->

        <!-- Main content -->
        <?php
        if (session()->getFlashdata('sukses')) :
        ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('sukses') ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <h1>Konfirmasi Pembayaran</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="callout callout-info">
                    <h5><i class="fa fa-info"></i> Informasi</h5>
                    <p>Pada saat melakukan konfirmasi pembelian barang cantumkan <strong>Nomor Faktur Pemesanan</strong> beserta <strong>Secreenshot bukti transfer</strong>. Lakukan pembayaran dalam waktu 2x24 jam setelah pemesanan, jika lewat dari itu maka pembelian akan <strong>Dibatalkan</strong>.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="<?= base_url(); ?>/Pelanggan/Produk/upload_bukti" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_pesanan" value="<?= $idPesanan['id_pesanan']; ?>">
                    <input type="hidden" name="bukti_transfer" value="<?= $idPesanan['bukti_transfer']; ?>">
                    <table>
                        <tr>
                            <td>
                                <h5>Nomor Pemesanan </h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>
                                    <div class="badge badge-success"><?= 'INV/' . $idPesanan['id_pesanan']; ?></div>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Rekening Toko </h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>526422038453305</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Nama </h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5><?= $idPesanan['nama_penerima']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Upload Bukti Pembayaran</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5><input type="file" name="bukti" class="form-control-file" id="exampleFormControlFile1"></h5>
                                <font color="red"><?= ($validation->hasError('bukti')) ? $validation->hasError('bukti') : ''; ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <h5><button type="submit" class="btn btn-primary">Upload</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col mt-5 text-center mb-5">
                <?php $wa = "https://api.whatsapp.com/send?phone=6285338531418&text=AMNOOR%20%0A=======================%0AKonfirmasi%20Pembayaran%20Produk%0ANo.Invoice%20:%20INV/" . $idPesanan['id_pesanan'] . "%0ANama%20:%20" . $idPesanan['nama_penerima']; ?>
                <a href="<?= $wa ?>" class="btn btn-success btn-lg"><i class="fa fa-phone"></i> Whatsapp</a>
                <!-- <a href="mailto:haikalwahyudi0@gmail.com?subject=Konfirmasi%20Pembayaran&body=TOKO%20HIKMAH%20Tulis%20No.Ivoice%20dan%20Nama%20Untuk%20Konfirmasi." class="btn btn-danger btn-lg"><i class="fa fa-envelope"></i> Email</a> -->
            </div>
        </div>

    </div><!-- Container End -->
</div>

<?= $this->endSection() ?>