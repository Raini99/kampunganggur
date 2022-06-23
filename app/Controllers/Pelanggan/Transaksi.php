<?php

namespace App\Controllers\Pelanggan;

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
        //$id_faktur = $this->request->getPost('idFaktur');
        // dd($id_invoice);
        $data = [
            'head'         => 'Semua Transaksi',
            'cart'          => \Config\Services::cart(),
            'getPesanan'    => $this->pesanan_model->dataPesanan(session()->get('id_pelanggan')),
            'cekTransaksi'  => $this->pesanan_model->getTransaksi(session()->get('id_pelanggan'))
        ];
        //dd($data);
        return view('pelanggan/transaksi/listTransaksi', $data);
    }

    // public function print($id)
    // {
    //     $data = [
    //         'head'     => 'Cetak',
    //         'cart'      => \Config\Services::cart(),
    //         'Faktur'    => $this->Faktur_model->getFaktur($id)->getRowArray(),
    //         'Tpesanan'  => $this->Faktur_model->getIdPesanan($id)->getResultArray(),
    //         'id'        => $id
    //     ];
    //     return view('/pelanggan/cetak', $data);
    // }

    public function pembayaran()
    {
        //$id_faktur = $this->request->getPost('idFaktur');
        // dd(session()->get('id_pelanggan'));
        $data = [
            'head'         => 'Pembayaran',
            'cart'          => \Config\Services::cart(),
            'getPesanan'    => $this->pesanan_model->dataPesanan(session()->get('id_pelanggan')),
            'cekTransaksi'  => $this->pesanan_model->getTransaksi(session()->get('id_pelanggan'))
        ];
        //dd($data);
        return view('pelanggan/transaksi/transfer', $data);
    }

    public function batal()
    {
        $id_pesanan = $this->request->getVar('id');
        //dd($id_pesanan);
        $this->pesanan_model->hapus($id_pesanan);
        $this->pemesanan_model->hapusPesanan($id_pesanan);
        session()->setFlashdata('batal', 'Pesan berhasil dibatalkan');
        return redirect()->to(base_url('Pelanggan/Transaksi'));
    }
}
