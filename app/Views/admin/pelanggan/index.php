 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="content">
     <div class="container-fluid">

         <div class="card">
             <div class="card-header">
                 <h5 class="text-dark float-left">Data Pelanggan</h5>
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
                                 <th>Nama Pelanggan</th>
                                 <th>No Telpon</th>
                                 <th>Email</th>
                                 <th>Alamat</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $nomor = 0;
                                foreach ($pelanggan as $key => $row) { ?>
                                 <tr>
                                     <td><?php echo ++$nomor; ?></td>
                                     <td><?php echo $row['nama_pelanggan']; ?></td>
                                     <td><?php echo $row['no_hp']; ?></td>
                                     <td><?php echo $row['email']; ?></td>
                                     <td><?php echo $row['alamat']; ?></td>
                                     <td>
                                         <a href="<?php echo base_url('Admin/Pelanggan/ubah/' . $row['id_pelanggan']); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit text-white"></i></a>
                                         <a href="<?php echo base_url('Admin/Pelanggan/delete/' . $row['id_pelanggan']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kustomer ini?');"><i class="fa fa-trash-alt"></i></a>
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