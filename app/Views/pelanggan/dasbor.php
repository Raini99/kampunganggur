<?= $this->extend('pelanggan/layout/template') ?>
<?= $this->section('content') ?>

<div class="content">
    <div class="card text-dark text-center mt-3">
        <!-- <strong><img style="background-size:cover;" height="200" width="600" src="<?= base_url() ?>/logo2.jpg" alt="text-center"></strong>
        <br> -->
        <?php
        if (session()->getFlashdata('cod')) {
            //echo "<script>alert('kosong');</script>";
            echo "<script>alert('" . session()->getFlashdata('cod') . "');</script>";
            echo "<script>location='/Pelanggan'</script>";
        }
        ?>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url() ?>/img/header1.jpg" alt="First slide">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>/img/header2.jpg" alt="Second slide">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>/img/header3.jpg" alt="Third slide">
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><br>
        <!-- <div class="card-footer text-center">
            <b>SELAMAT DATANG DI E-COMMERCE BUMKM BAYAN</b>
            <p>Menjual berbagai macam hasil olahan masyarakat bayan seperti cemilan, kerajinan, Makanan dan minuman </p>
        </div> -->
    </div>
</div>
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
                                <?php $wa = "https://api.whatsapp.com/send?phone=6281997992281&text=AMNOOR%20%0A=======================%0AKonfirmasi%20Ketersediaan%20Produk%0Apakah%20Produk%20" . $p['nama_produk'] . "%20masih%20tersedia%20??"; ?>
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

        <!-- <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
            <div class="card">
                <img class="card-img-top" src="img/imaged.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> Gamis baranbar</h5>
                    <p class="card-text">Rp.25,000</p>
                    <a href="artikel.html" class="btn btn-danger">Selengkapnya</a>

                </div>
            </div>
        </div> -->


    </div>
</div>

<?= $this->endSection() ?>