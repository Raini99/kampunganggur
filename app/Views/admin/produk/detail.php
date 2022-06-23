 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="card card-solid">
     <div class="card-body">
         <div class="row">
             <div class="col-12 col-sm-6">
                 <h3 class="d-inline-block d-sm-none"><?= $produk['nama_produk'] ?></h3>
                 <div class="col-12">
                     <img src="<?= base_url() ?>/produk/<?= $produk['gambar_produk'] ?>" class="product-image" alt="Product Image">
                 </div>

                 <div class="row mt-4">
                     <nav class="w-100">
                         <div class="nav nav-tabs" id="product-tab" role="tablist">
                             <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Deskripsi</a>
                         </div>
                     </nav>
                     <div class="tab-content p-3" id="nav-tabContent">
                         <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?= $produk['deskripsi'] ?></div>
                     </div>
                 </div>
             </div>
             <div class="col-12 col-sm-6">
                 <h3 class="my-3"><?= $produk['nama_produk'] ?></h3>

                 <hr>
                 <h4>KampungAnggur</h4>
                 <div class="btn-group btn-group-toggle" data-toggle="buttons">
                     <!-- <h4 class="mt-3"><small><? //= $produk['nama_umkm']; 
                                                    ?></small></h4> -->
                 </div>


                 <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                     <label class="btn btn-default text-center">
                         <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                         <span class="text-xl">S</span>
                         <br>
                         Small
                     </label>
                     <label class="btn btn-default text-center">
                         <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                         <span class="text-xl">M</span>
                         <br>
                         Medium
                     </label>
                     <label class="btn btn-default text-center">
                         <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                         <span class="text-xl">L</span>
                         <br>
                         Large
                     </label>
                     <label class="btn btn-default text-center">
                         <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                         <span class="text-xl">XL</span>
                         <br>
                         Xtra-Large
                     </label>
                 </div> -->

                 <div class="bg-gray py-2 px-3 mt-4">
                     <h2 class="mb-0">
                         Rp<?= number_format($produk['harga']); ?>,-
                     </h2>
                     <!-- <h4 class="mt-0">
                         <small>Ex Tax: $80.00 </small>
                     </h4> -->
                 </div>

                 <!-- <div class="mt-4">
                     <div class="btn btn-primary btn-lg btn-flat">
                         <i class="fas fa-cart-plus fa-lg mr-2"></i>
                         Add to Cart
                     </div>
                 </div> -->

                 <div class="mt-4 product-share">
                     <a href="#" class="text-gray">
                         <i class="fab fa-facebook-square fa-2x"></i>
                     </a>
                     <a href="#" class="text-gray">
                         <i class="fab fa-twitter-square fa-2x"></i>
                     </a>
                     <a href="#" class="text-gray">
                         <i class="fas fa-envelope-square fa-2x"></i>
                     </a>
                     <a href="#" class="text-gray">
                         <i class="fas fa-rss-square fa-2x"></i>
                     </a>
                 </div>

                 <div class="mt-4 product-share">
                     <a href="<?= base_url() ?>/Admin/Produk" class="btn btn-primary">
                         Kembali
                     </a>
                 </div>

             </div>
         </div>
     </div>
     <!-- /.card-body -->
 </div>

 <?= $this->endSection() ?>