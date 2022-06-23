<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Produk_model;
use App\Models\Kategori_model;
use App\Models\Pelanggan_model;
use App\Models\Pemesanan_model;
use App\Models\Pesanan_model;

class Transaksi extends BaseController
{
    protected $produk_model;
    protected $kategori_model;
    protected $pelanggan_model;
    protected $pemesanan_model;
    protected $pesanan_model;
    public function __construct()
    {
        $this->produk_model = new Produk_model;
        $this->kategori_model = new Kategori_model;
        $this->pelanggan_model = new Pelanggan_model;
        $this->pemesanan_model = new Pemesanan_model;
        $this->pesanan_model = new Pesanan_model;
    }

    public function index()
    {
        //\Config\Services::cart()
        $data = [
            "head" => "Transaksi",
            "getPesanan" => $this->pesanan_model->allData()
        ];
        //dd($data);
        return view('admin/transaksi/index', $data);
    }

    public function detailPesanan($id)
    {
        //$data['idFaktur'] = $this->Pemesanan_model->getIdFaktur($id)->getrow();
        $data['head'] = "Detail Transaksi";
        $data['Pesanan'] = $this->pesanan_model->getPesanan($id);
        $data['produk'] = $this->pemesanan_model->listPesanan($id);
        //dd($data);
        echo view('admin/transaksi/detailPesanan', $data);
    }


    public function updateStatus($id)
    {
        $this->pesanan_model->ubah([
            'aksi'      => 1
        ], $id);
        session()->setFlashdata('sukses', 'Pesanan Dikonfirmasi');
        return redirect()->to(base_url('Admin/Transaksi'));
    }


    public function deletePesanan($id)
    {
        $this->pesanan_model->hapus($id);
        $this->pemesanan_model->hapusPesanan($id);
        session()->setFlashdata('sukses', 'Pesanan Dibatalkan');
        return redirect()->to(base_url('Admin/Transaksi'));
    }


    public function pembayaran()
    {
        $data = [
            'head'         => 'Pembayaran',
            //'getPembayaran'  => $this->Pemesanan_model->getPembayaran()
            'getPembayaran'  => $this->pemesanan_model->dataGroup()
        ];
        //dd($data);
        echo view('admin/transaksi/pemesanan', $data);
    }

    public function cetak_laporan()
    {
        $data = [
            'head'         => 'Pembayaran',
            //'getPembayaran'  => $this->Pemesanan_model->getPembayaran()
            'getPembayaran'  => $this->pemesanan_model->dataGroup()
        ];

        echo view('admin/transaksi/cetak_laporan', $data);
    }
}
