 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="row">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <h5 class="text-dark float-left">Data Kategori</h5>
                 <a href="<?php echo base_url(); ?>/Admin/Kategori/tambah" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
             </div>
             <div class="card-body">

                 <?php
                    if (session()->getFlashdata('pesan')) {
                    ?>
                     <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon fas fa-check"></i> <?= session()->getFlashdata('pesan'); ?>
                     </div>
                 <?php } ?>

                 <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr bgcolor="lightblue">
                                 <th>No</th>
                                 <th>Nama Kategori</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $nomor = 0;
                                foreach ($kategori as $k) { ?>
                                 <tr>
                                     <td><?php echo ++$nomor; ?></td>
                                     <td><?php echo $k['nama_kategori']; ?></td>
                                     <td>
                                         <a href="<?php echo base_url('Admin/Kategori/edit/' . $k['id_kategori']); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit text-white"></i></a>
                                         <a href="<?php echo base_url('Admin/Kategori/delete/' . $k['id_kategori']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');"><i class="fa fa-trash-alt"></i></a>
                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <?= $this->endSection() ?>