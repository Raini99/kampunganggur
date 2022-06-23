<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Produk_model;
use App\Models\Kategori_model;
use App\Models\Pelanggan_model;
use App\Models\Pemesanan_model;
use App\Models\Pesanan_model;
use App\Models\Kota_model;

class Kategori extends BaseController
{
    protected $produk_model;
    protected $kategori_model;
    protected $pelanggan_model;
    protected $pemesanan_model;
    protected $pesanan_model;
    protected $kota_model;
    public function __construct()
    {
        $this->produk_model = new Produk_model;
        $this->kategori_model = new Kategori_model;
        $this->pelanggan_model = new Pelanggan_model;
        $this->pemesanan_model = new Pemesanan_model;
        $this->pesanan_model = new Pesanan_model;
        $this->kota_model = new Kota_model;
    }

    public function index()
    {
        //\Config\Services::cart()
        // $data = [
        //     "head" => "Produk",
        //     "produk" => $this->produk_model->getProduk()
        // ];
        //dd($data);
        // return view('pelanggan/produk/all_produk', $data);
        return view('pelanggan/kategori/index');
    }
    
}
