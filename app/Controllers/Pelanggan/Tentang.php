<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;

class Tentang extends BaseController
{
    public function index()
    {
        $data = [
            "head" => "Tentang",
        ];
        //dd($data);
        return view('pelanggan/tentang/index',$data);
    }
}
