<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kota_model;

class Kota extends BaseController
{
    protected $kota_model;

    public function __construct()
    {
        $this->kota_model = new Kota_model;
    }

    public function index()
    {
        $model = new Kota_model();
        $data['head'] = 'Daftar Kota';
        $data['kota'] = $model->getKota();
        return view('admin/kota/index', $data);
    }

    public function tambah()
    {
        $data['head'] = 'Form Tambah';
        return view('admin/kota/tambah', $data);
    }

    public function addKota()
    {
        $data = array(
            'nama_kota'         => $this->request->getPost('nama_kota'),
            'ongkir'            => $this->request->getPost('ongkir'),
        );

        $model = new Kota_model();
        $simpan = $model->insertKota($data);
        if ($simpan) {
            session()->setFlashdata('sukses', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('Admin/Kota'));
        }
    }

    public function ubah($id)
    {
        $model = new Kota_model();
        $data['head'] = 'Form Ubah';
        $data['kota'] = $model->getKota($id)->getRowArray();
        echo view('admin/kota/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_kota');
        $data = array(
            'nama_kota'         => $this->request->getPost('nama_kota'),
            'ongkir'            => $this->request->getPost('ongkir'),
        );
        $model = new Kota_model();
        $ubah = $model->updateKota($data, $id);
        if ($ubah) {
            session()->setFlashdata('sukses', 'Data Berhasil Diubah');
            return redirect()->to(base_url('Admin/Kota'));
        }
    }

    public function delete($id)
    {
        $model = new Kota_model();
        $hapus = $model->deleteKota($id);
        if ($hapus) {
            session()->setFlashdata('sukses', 'Data Berhasil Dihapus');
            return redirect()->to(base_url('Admin/Kota'));
        }
    }
}
