 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <section class="content">
     <div class="card">
         <div class="card-header">
             <h4 class="text-dark float-left">Pesanan Produk</h4>
         </div>
         <div class="card-body">
             <?php
                if (session()->getFlashdata('sukses')) {
                ?>
                 <div class="alert alert-success alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <i class="icon fas fa-check"></i> <?= session()->getFlashdata('sukses'); ?>
                 </div>
             <?php } ?>
             <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th width="30px">No</th>
                         <th>No. Pesanan</th>
                         <th>Nama Penerima</th>
                         <th>No Telpon</th>
                         <th>Waktu Pemesanan</th>
                         <th>Status</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $no = 1;
                        foreach ($getPesanan as $pesanan) : ?>
                         <tr>
                             <td><?= $no++; ?></td>
                             <td><?= 'INV/' . $pesanan['id_pesanan']; ?></td>
                             <td><?= $pesanan['nama_penerima']; ?></td>
                             <td><?= $pesanan['telpon']; ?></td>
                             <td><?= $pesanan['waktu_pembayaran']; ?></td>
                             <?php if ($pesanan['aksi'] != true) { ?>
                                 <td>
                                     <div class="badge badge-warning">Belum Lunas</div>
                                 </td>
                             <?php } else { ?>
                                 <td>
                                     <div class="badge badge-success">Lunas</div>
                                 </td>
                             <?php } ?>
                             <td width="auto">
                                 <a href="<?= base_url('Admin/Transaksi/detailPesanan/' . $pesanan['id_pesanan']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>

                                 <?php if ($pesanan['aksi'] != true) { ?>
                                     <a href="<?= base_url('Admin/Transaksi/updateStatus/' . $pesanan['id_pesanan']); ?>" class="btn btn-success btn-sm mt-1 mb-1 " onClick="return confirm('Yakin sudah lunas?')" title="Belum Lunas"><i class="fa fa-check"></i></a>
                                     <a href="<?= base_url('Admin/Transaksi/deletePesanan/' . $pesanan['id_pesanan']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin ingin membatalkan pesanan ini?')" title="Batalkan Pesanan"><i class="fa fa-times-circle"></i></a>
                                 <?php } ?>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
 </section>

 <?= $this->endSection() ?>