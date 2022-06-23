 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <div class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <img src="<?php echo base_url('bukti/' . $Pesanan['bukti_transfer']) ?>" class="img-fluid" alt=" Belum ada gambar">
                             </div>
                             <div class="col-md-3">
                                 <h3>
                                     <dd><?php echo $Pesanan['nama_penerima']; ?></dd>
                                 </h3><br>
                                 <dl class="dl-horizontal">
                                     <dt>Total Harga :</dt>
                                     <dd>
                                         <?php
                                            $db = \Config\Database::connect();
                                            $total = 0;
                                            $data = $db->table('pemesanan')
                                                ->join('kota', 'kota.id_kota = pemesanan.id_kota')
                                                ->getwhere(['id_pesanan' => $Pesanan['id_pesanan']])->getResultArray();
                                            foreach ($data as $value) {
                                                $subtotal = $value['ongkir'] + $value['total_pesanan'];
                                                $total += $subtotal;
                                            }
                                            ?>
                                         Rp <?= number_format($total) ?>
                                     </dd>
                                     <dt>Metode Pembayaran :</dt>
                                     <dd><?php echo $Pesanan['metode_pembayaran']; ?></dd>
                                     <dt>Alamat :</dt>
                                     <dd><?php echo $Pesanan['alamat']; ?></dd>
                                 </dl>
                             </div>
                             <div class="col-md-3">
                                 <h3>
                                     <dd>&nbsp;</dd>
                                 </h3><br>
                                 <dl class="dl-horizontal">
                                     <dt>Waktu Pemesanan :</dt>
                                     <dd><?php echo $Pesanan['waktu_pembayaran']; ?></dd>
                                     <dt>No. Telp :</dt>
                                     <dd><?php echo $Pesanan['telpon']; ?></dd>
                                     <dt>Detail Pesanan :</dt>
                                     <dd><?php echo $Pesanan['pesan']; ?></dd>
                                 </dl>
                             </div>
                         </div>
                         <table id="example1" class="table table-sm table-striped">
                             <thead>
                                 <th>#</th>
                                 <th>Produk</th>
                                 <th>Jumlah</th>
                                 <th>total_harga</th>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    foreach ($produk as $p) {
                                    ?>
                                     <tr>
                                         <!-- <td><span class="badge badge-warning">Sedang Diproses</span></td> -->
                                         <td><?= $no++; ?></td>
                                         <td><?= $p['nama_produk']; ?></td>
                                         <td><span class="badge badge-info"> <?= $p['jumlah']; ?> </span></td>
                                         <td><?= $p['total_pesanan']; ?></td>
                                     </tr>
                                 <?php } ?>
                             </tbody>
                         </table>
                     </div>
                     <div class="card-footer text-center">
                         <a href="<?php echo base_url('Admin/Transaksi'); ?>" class="btn btn-sm btn-info float-left"><i class="fa fa-arrow-left"></i> Back</a>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <?= $this->endSection() ?>