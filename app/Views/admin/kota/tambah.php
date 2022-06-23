 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="container-fluid">
     <div class="row-center">
         <div class="col-md-12">
             <form action="<?php echo base_url('Admin/Kota/addKota'); ?>" method="post">
                 <div class="card card-footer mx-auto" style="width: 45rem;">
                     <div class="card-header">
                         <h3 class="card-title text-bold">Form Tambah Kota</h3>

                         <div class="card-tools">
                             <button type="button" class="btn btn-tool bg-gray" data-card-widget="collapse" title="Collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="form-group row">
                             <label for="" class="col-sm-2 col-form-label">Nama Kota</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" name="nama_kota" placeholder="Enter nama kota">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="" class="col-sm-2 col-form-label">Ongkir</label>
                             <div class="input-group mb-3 col-sm-10">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-">Rp.</i></span>
                                 </div>
                                 <input type="text" class="form-control" name="ongkir" placeholder="Enter ongkir">
                             </div>
                         </div>
                         <div class="card-footer">
                             <a href="<?php echo base_url('Admin/Kota'); ?>" class="btn btn-outline-success">Batal</a>
                             <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <?= $this->endSection() ?>