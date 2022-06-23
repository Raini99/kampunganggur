<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Produk_model;
use App\Models\Pesanan_model;

class Dasbor extends BaseController
{
    protected $produk_model;
    protected $pesanan_model;
    public function __construct()
    {
        $this->produk_model = new Produk_model;
        $this->pesanan_model = new Pesanan_model;
    }

    public function index()
    {
        $data = [
            "head" => "Beranda",
            "pesanan" => $this->pesanan_model->allDataLimit()
        ];
        // dd($data);
        return view('admin/dasbor', $data);
    }
}
