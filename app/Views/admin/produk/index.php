 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="row">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">
                 <h5 class="text-dark float-left">Data Produk</h5>
                 <a href="<?php echo base_url('Admin/Produk/tambah'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
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
                                 <th>Nama Produk</th>
                                 <th>Kategori</th>
                                 <th>Harga</th>
                                 <th>Foto</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $nomor = 0;
                                foreach ($produk as $p) { ?>
                                 <tr>
                                     <td><?php echo ++$nomor; ?></td>
                                     <td><?php echo $p['nama_produk']; ?></td>
                                     <td><?php echo $p['nama_kategori']; ?></td>
                                     <td>Rp<?= number_format($p['harga']); ?>,-</td>
                                     <td class="tengah"><img src="<?= base_url('produk/' . $p['gambar_produk']); ?>" class="gambar" width="45px"></td>
                                     <td>
                                         <a href="<?= base_url('Admin/Produk/detail'); ?>/<?= $p['id_produk'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                         <a href="<?= base_url('Admin/Produk/edit'); ?>/<?= $p['id_produk'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit text-white"></i></a>
                                         <a href="<?= base_url('Admin/Produk/delete'); ?>/<?= $p['id_produk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"><i class="fa fa-trash-alt"></i></a>
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