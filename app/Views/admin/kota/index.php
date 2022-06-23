 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h5 class="text-dark float-left">Data Kota</h5>
                         <a href="<?php echo base_url('Admin/Kota/tambah'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
                     </div>
                     <div class="card-body">

                         <?php
                            if (!empty(session()->getFlashdata('sukses'))) { ?>
                             <div class="alert alert-success">
                                 <?php echo session()->getFlashdata('sukses'); ?>
                             </div>
                         <?php } ?>

                         <div class="table-responsive">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr bgcolor="lightblue">
                                         <th>No</th>
                                         <th>Nama Kota</th>
                                         <th>Ongkir</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $nomor = 0;
                                        foreach ($kota as $key => $row) { ?>
                                         <tr>
                                             <td><?php echo ++$nomor; ?></td>
                                             <td><?php echo $row['nama_kota']; ?></td>
                                             <td>Rp<?= number_format($row['ongkir']); ?>,-</td>
                                             <td>
                                                 <a href="<?php echo base_url('Admin/Kota/ubah/' . $row['id_kota']); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit text-white"></i></a>
                                                 <a href="<?php echo base_url('Admin/Kota/delete/' . $row['id_kota']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kota ini?');"><i class="fa fa-trash-alt"></i></a>
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

     </div>
 </div>

 <?= $this->endSection() ?>