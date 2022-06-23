 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="row">
     <div class="col-md-12">
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
         <form action="<?php echo base_url('Admin/Pelanggan/update'); ?>" method="post" enctype="multipart/form-data">

             <div class="card card-footer mx-auto" style="width: 45rem;">
                 <div class="card-header">
                     <h3 class="card-title text-bold">Form Ubah Pelanggan</h3>

                     <div class="card-tools">
                         <button type="button" class="btn btn-tool bg-gray" data-card-widget="collapse" title="Collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">
                     <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">
                     <div class="row-center">
                         <div class="col-md-12">
                             <div class="form-group row">
                                 <label for="" class="col-sm-2 col-form-label">Nama Customer</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" name="nama_pelanggan" placeholder="Enter nama here" value="<?php echo $pelanggan['nama_pelanggan']; ?>">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="" class="col-sm-2 col-form-label">No Telpon</label>
                                 <div class="input-group col-sm-10">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                     </div>
                                     <input type="text" value="<?php echo $pelanggan['no_hp']; ?>" class="form-control" name="no_hp">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="" class="col-sm-2 col-form-label">Email</label><br>
                                 <div class="input-group mb-3 col-sm-10">
                                     <div class="input-group-prepend">
                                         <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                     </div>
                                     <input type="hidden" value="<?php echo $pelanggan['email']; ?>" name="email">
                                     <input type="email" value="<?php echo $pelanggan['email']; ?>" class="form-control" disabled>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="" class="col-sm-2 col-form-label">Alamat</label><br>
                                 <div class="input-group mb-3 col-sm-10">
                                     <textarea class="form-control" name="alamat"><?php echo $pelanggan['alamat']; ?></textarea>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer">
                     <a href="<?php echo base_url('Admin/Pelanggan'); ?>" class="btn btn-outline-success">Batal</a>
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </div>
     </div>
     </form>
 </div>

 <?= $this->endSection() ?>