<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;

use App\Models\Produk_model;

class Dasbor extends BaseController
{

    protected $produk_model;
    public function __construct()
    {
        $this->produk_model = new Produk_model;
    }
    public function index()
    {
        // if (session()->get('status')) {
        //     if (session()->get('status') == 'pemilik') {
        //         return redirect()->to(base_url() . '/Pemilik');
        //     } elseif (session()->get('status') == 'admin') {
        //         return redirect()->to(base_url() . '/Admin');
        //     }
        // } else {
        //     return redirect()->to(base_url() . '/');
        // }

        $data = [
            "head" => "Beranda",
            "produk" => $this->produk_model->getLimit()
        ];
        //dd($data);
        return view('pelanggan/dasbor', $data);
    }
}
