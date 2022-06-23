<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_model;

class Kategori extends BaseController
{
    protected $kategori_model;
    public function __construct()
    {
        $this->kategori_model = new Kategori_model;
    }
    public function index()
    {
        $data = [
            "head" => "Kategori",
            "kategori" => $this->kategori_model->getKategori()
        ];
        //dd($data);
        return view('admin/kategori/index', $data);
    }

    public function tambah()
    {
        $data = [
            "head" => "Tambah Kategori"
        ];
        //dd($data);
        return view('admin/kategori/tambah', $data);
    }

    public function simpan()
    {
        $kategori = [
            "nama_kategori" => $this->request->getVar('nama_kategori'),
        ];
        $this->kategori_model->addKategori($kategori);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url() . '/Admin/Kategori');
    }


    public function edit($id_kategori)
    {
        $data = [
            "head" => "Edit Kategori",
            "kategori" => $this->kategori_model->satuKategori($id_kategori)
        ];
        //dd($data);
        return view('admin/kategori/edit', $data);
    }

    public function ubah()
    {
        $kategori = [
            "nama_kategori" => $this->request->getVar('nama_kategori'),
        ];
        $this->kategori_model->updateKategori($kategori, $this->request->getVar('id_kategori'));
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url() . '/Admin/Kategori');
    }

    public function delete($id_kategori)
    {
        $this->kategori_model->hapusKategori($id_kategori);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . '/Admin/Kategori');
    }
}
