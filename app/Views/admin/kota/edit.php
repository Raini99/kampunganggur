 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="container-fluid">
     <div class="row-center">
         <div class="col-md-12">
             <form action="<?php echo base_url('Admin/Kota/update'); ?>" method="post">
                 <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                     <div class="alert alert-danger" role="alert">
                         Whoops! Ada kesalahan saat input data, yaitu:
                         <ul>
                             <?php foreach ($errors as $error) : ?>
                                 <li><?= esc($error) ?></li>
                             <?php endforeach ?>
                         </ul>
                     </div>
                 <?php } ?>

                 <div class="card card-footer mx-auto" style="width: 45rem;">
                     <div class="card-header">
                         <h3 class="card-title text-bold">Form Ubah Kota</h3>

                         <div class="card-tools">
                             <button type="button" class="btn btn-tool bg-gray" data-card-widget="collapse" title="Collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                         </div>
                     </div>
                     <div class="card-body">
                         <input type="hidden" name="id_kota" value="<?php echo $kota['id_kota']; ?>">
                         <div class="form-group">
                             <label for="">Kota</label>
                             <input type="text" class="form-control" name="nama_kota" placeholder="Enter here" value="<?php echo $kota['nama_kota']; ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Ongkir</label>
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-">Rp.</i></span>
                                 </div>
                                 <input type="text" value="<?php echo $kota['ongkir']; ?>" class="form-control" name="ongkir" placeholder="Enter here">
                             </div>
                         </div>
                         <div class="card-footer">
                             <a href="<?php echo base_url('Admin/Kota'); ?>" class="btn btn-outline-success">Batal</a>
                             <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <?= $this->endSection() ?>