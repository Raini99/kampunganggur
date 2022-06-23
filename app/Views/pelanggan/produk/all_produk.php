<?= $this->extend('pelanggan/layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <?php foreach ($produk as $p) : ?>
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">

                <form action="<?= base_url('/Pelanggan/Produk/addCart'); ?>" method="post">
                    <div class="card bg-light d-flex flex-fill">
                        <input type="hidden" name="id" value="<?= $p['id_produk'] ?>">
                        <input type="hidden" name="nama" value="<?= $p['nama_produk'] ?>">
                        <input type="hidden" name="harga" value="<?= $p['harga'] ?>">
                        <input type="hidden" name="gambar" value="<?= $p['gambar_produk'] ?>">

                        <img height="300" width="97%" src="<?= base_url() ?>/produk/<?= $p['gambar_produk'] ?>" alt="<?= $p['gambar_produk'] ?>" class="card-img-top m-0">
                        <div class="card-body">
                            <!-- <h2 class="card-title"><?= $p['nama_produk'] ?> <span class="badge badge-success badge-pill text-right"><?= $p['nama_kategori'] ?></span></h2> -->
                            <h2 class="card-title"><?= $p['nama_produk'] ?></h2>
                            <p class="card-text text-left text-bold text-orange in-line">Rp<?= number_format($p['harga']); ?></p>
                            <?php $wa = "https://api.whatsapp.com/send?phone=6281997992281&text=AMNOOR%20%0A=======================%0AKonfirmasi%20Ketersediaan%20Produk%0Apakah%20Produk%20" . $p['nama_produk'] . "%20masih%20tersedia%20??"; ?>
                            <a href="<?= $wa ?>" target="_blank" class="btn btn-sm bg-teal">
                                <i class="fas fa-comments"></i>
                            </a>
                            <button type="submit" class="btn btn-sm btn-info">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                            <a href="<?= base_url() ?>/Pelanggan/Produk/detail/<?= $p['id_produk'] ?>" class="btn btn-sm btn-danger">Selengkapnya</a>
                        </div>
                        <!-- <div class="card-footer">
                            <div class="text-right">
                                <?php $wa = "https://api.whatsapp.com/send?phone=6281997992281&text=UMKM%20BAYAN%0A=======================%0AKonfirmasi%20Ketersediaan%20Produk%0Apakah%20Produk%20" . $p['nama_produk'] . "%20masih%20tersedia%20??"; ?>
                                <a href="<?= $wa ?>" target="_blank" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-cart-plus"></i> Keranjang
                                </button>
                            </div>
                        </div> -->
                    </div>
                </form>

            </div>
        <?php endforeach; ?>


    </div>
</div>

<?= $this->endSection() ?>