 <?= $this->extend('admin/layout/template') ?>
 <?= $this->section('content') ?>

 <section class="content">
     <div class="card">
         <div class="card-header">
             <a href="<?= base_url('Admin/Transaksi/cetak_laporan'); ?>" target="_balnk" class="btn btn-primary float-sm-right"><i class="fa fa-file"></i> Cetak PDF</a>
         </div>
         <div class="card-body">
             <?php if (session()->getFlashdata('hapus')) : ?>
                 <div class="alert alert-danger">
                     <?= session()->getFlashdata('hapus'); ?>
                 </div>
             <?php endif; ?>
             <table id="example1" class="table table-bordered table-striped">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Nama Pemesan</th>
                         <th>Waktu Pembayaran</th>
                         <th>Ongkir</th>
                         <th>Total Pesanan</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $no = 1;
                        $t_ongkir = 0;
                        $t_harga = 0;
                        foreach ($getPembayaran as $pemesanan) : ?>
                         <tr>
                             <td><?= $no++; ?></td>
                             <td>
                                 <?php
                                    $db = \Config\Database::connect();
                                    $pembeli = 0;
                                    $data = $db->table('pesanan')->getwhere(['id_pesanan' => $pemesanan['id_pesanan']])->getRowArray();

                                    $pembeli = $data['nama_penerima'];
                                    ?>
                                 <?= $pembeli; ?>
                             </td>
                             <td><?= $pemesanan['waktu_pemesanan']; ?></td>
                             <td>Rp.
                                 <?php
                                    $ongkir = 0;
                                    $data = $db->table('kota')
                                        ->getwhere(['id_kota' => $pemesanan['id_kota']])->getRowArray();
                                    $ongkir = $data['ongkir'];
                                    $t_ongkir = $t_ongkir + $ongkir;
                                    $t_harga = $t_harga + $pemesanan['total_pesanan'];
                                    ?>
                                 <?= number_format($ongkir); ?>
                             </td>
                             <td>Rp.
                                 <?= number_format($pemesanan['total_pesanan']);
                                    ?>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                     <tr>
                         <th colspan="2">TOTAL</th>
                         <td>&nbsp;</td>
                         <th>Rp. <?= number_format($t_ongkir); ?></th>
                         <th>Rp. <?= number_format($t_harga); ?></th>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </section>

 <?= $this->endSection() ?>