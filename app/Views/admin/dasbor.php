 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>



 <?php
    $no = 1;
    $select = 0;
    $warna = ['info', 'success', 'teal', 'info'];
    foreach ($pesanan as $p) {
    ?>
     <div class="row">
         <div class="col-md-12">
             <div class="row">
                 <div class="col-md-11">
                     <div class="small-box bg-<?= $warna[$select++] ?>">
                         <div class="inner">
                             <h5>Pesanan <?= $no++; ?></h5>
                             <p>Pesanan dari : <?= $p['nama_pelanggan']; ?></p>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-1">
                     <?php if ($select == 1) { ?>
                         <a href="<?= base_url('Admin/Transaksi/detailPesanan/' . $p['id_pesanan']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                         <?php if ($p['aksi'] != true) { ?>
                             <a href="<?= base_url('Admin/Transaksi/updateStatus/' . $p['id_pesanan']); ?>" class="btn btn-success btn-sm mt-1 mb-1 " onClick="return confirm('Yakin sudah lunas?')" title="Belum Lunas"><i class="fa fa-check"></i></a>
                             <a href="<?= base_url('Admin/Transaksi/deletePesanan/' . $p['id_pesanan']); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin ingin membatalkan pesanan ini?')" title="Batalkan Pesanan"><i class="fa fa-times-circle"></i></a>
                         <?php } ?>
                     <?php } ?>
                 </div>
             </div>

         </div>
     </div>
 <?php } ?>


 <?= $this->endSection() ?>