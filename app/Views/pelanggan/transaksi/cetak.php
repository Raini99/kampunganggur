<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= base_url('themes/dist'); ?>//css/adminlte.min.css">

    <style type="text/css">
        table .tr1 {
            background-color: #F2F3F4;
        }

        td,
        th {
            padding: 8px;
        }
    </style>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- ================================================================================ -->
        <div class="content">
            <div class="container">
                <!-- container -->

                <div class="row">
                    <div class="col-md-7 mx-auto">

                        <div class="card">
                            <div class="card-body">
                                <CENTER>
                                    <h5>Titian Hidayah</h5>
                                    <P> ini merupakan bukti pembayaran yang sah dari Titian Hidayah.</P>
                                </CENTER><br>
                                <div class="row">
                                    <div class="col-md-4 text-bold">
                                        Nomor Faktur
                                    </div>
                                    <div class="col-md-8">
                                        <?= $Faktur['id_faktur'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 text-bold">
                                        Waktu Pembayaran
                                    </div>
                                    <div class="col-md-8">
                                        <?= $Faktur['waktu_pembayaran'] ?>
                                    </div>
                                </div>
                                <hr>
                                <table width="100%">
                                    <tr class="tr1">
                                        <th width="330px">Status</th>
                                        <?php if ($Faktur['aksi'] != true) { ?>
                                            <td>Sedang Diproses</td>
                                        <?php } else { ?>
                                            <td>Berhasil</td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Titian Hidayah</th>
                                    </tr>
                                    <tr class="tr1">
                                        <th>Total Pesanan</th>
                                        <?php
                                        $db = \Config\Database::connect();
                                        $total = 0;
                                        $data = $db->table('pemesanan')
                                            ->join('kota', 'kota.id_kota = pemesanan.id_kota')
                                            ->getwhere(['id_faktur' => $id])->getResultArray();
                                        foreach ($data as $value) {
                                            $subtotal = $value['ongkir'] + $value['total_pesanan'];
                                            $total += $subtotal;
                                        } ?>
                                        <td>Rp<?= number_format($total); ?></td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Card End -->
                    </div>

                </div>
            </div><!-- Container End -->

        </div>
        <!-- Content End -->


    </div>
    <!-- /.content-wrapper -->
    <!-- ==================================================================================== -->
    <script type="text/javascript">
        print();
        onmousemove = function() {
            close();
        }
    </script>
</body>

</html>