<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pelanggan_model;

class Pelanggan extends BaseController
{
    protected $pelanggan_model;

    public function __construct()
    {
        $this->pelanggan_model = new Pelanggan_model;
    }

    public function index()
    {
        $data['head']  = 'Data Pelanggan';
        $data['pelanggan']  = $this->pelanggan_model->getPelanggan();
        echo view('admin/pelanggan/index', $data);
    }

    public function ubah($id)
    {
        $data['head']  = 'Ubah Pelanggan';
        $data['pelanggan'] = $this->pelanggan_model->selectPelanggan($id);
        echo view('admin/pelanggan/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_pelanggan');
        $data = array(
            'nama_pelanggan'    => $this->request->getPost('nama_pelanggan'),
            'no_hp'            => $this->request->getPost('no_hp'),
            'email'             => $this->request->getPost('email'),
            'alamat'             => $this->request->getPost('alamat'),
        );

        $ubah = $this->pelanggan_model->updatePelanggan($data, $id);
        if ($ubah) {
            session()->setFlashdata('sukses', 'Data Berhasil Diubah');
            return redirect()->to(base_url('Admin/Pelanggan'));
        }
    }

    public function delete($id)
    {
        $hapus = $this->pelanggan_model->deletePelanggan($id);
        if ($hapus) {
            session()->setFlashdata('hapus', 'Data Berhasil Dihapus');
            return redirect()->to(base_url('Admin/Pelanggan'));
        }
    }
}
