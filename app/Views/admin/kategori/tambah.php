 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="row">
     <div class="col-md-12">
         <form action="<?php echo base_url(); ?>/Admin/Kategori/simpan" method="post" enctype="multipart/form-data">
             <div class="card card-footer mx-auto" style="width: 45rem;">
                 <div class="card-header">
                     <h3 class="card-title text-bold">Form Tambah Kategori</h3>

                     <div class="card-tools">
                         <button type="button" class="btn btn-tool bg-gray" data-card-widget="collapse" title="Collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="form-group row">
                         <label for="" class="col-sm-2 col-form-label">Nama Kategori</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer">
                     <a href="<?php echo base_url('Admin/Kategori'); ?>" class="btn btn-secondary" onclick="return confirm('apakah ada ingin membatalkan inputan ?')">Batal</a>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </div>
         </form>
     </div>
 </div>

 <?= $this->endSection() ?>