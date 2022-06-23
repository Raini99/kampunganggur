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

<?= $this->endSection() ?>