<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Produk_model;
use App\Models\Kategori_model;

class Produk extends BaseController
{
    protected $produk_model;
    protected $kategori_model;
    protected $umkm_model;
    public function __construct()
    {
        $this->produk_model = new Produk_model;
        $this->kategori_model = new Kategori_model;
    }

    public function index()
    {
        //\Config\Services::cart()
        $data = [
            "head" => "Produk",
            "produk" => $this->produk_model->getProduk()
        ];
        //dd($data);
        return view('admin/produk/index', $data);
    }

    public function detail($id)
    {
        $data = [
            "head" => "Detail Produk",
            "produk" => $this->produk_model->detailProduk($id)
        ];
        //dd($data);
        return view('admin/produk/detail', $data);
    }

    public function tambah()
    {
        $data = [
            "head" => "Tambah Produk",
            "kategori" => $this->kategori_model->getKategori(),
            'validation' => \Config\Services::validation(),
        ];
        //dd($data);
        return view('admin/produk/tambah', $data);
    }

    public function simpan()
    {
        $gambar = 'is_image[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/png]';
        if ($this->request->getFile('gambar_produk')->getError() == 4) {
            $gambar = 'required|is_image[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/png]';
        }
        if (!$this->validate([

            'gambar_produk' => [
                'rules' => $gambar,
                'errors' => [
                    'required' => 'Gambar tidak boleh kosong',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih tidak disarankan'
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/Admin/Produk/tambah')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar_produk');
        $namaGambar = $fileGambar->getName();
        $foto = str_replace(" ", "_", $namaGambar); //mengganti semua spasi dalam nama file
        $namaGambar = date("is") . $foto; //menggabung menit detik dengan nama gambar
        $fileGambar->move('produk', $namaGambar);

        //$umkm = $this->umkm_model->selectUmkm($this->request->getVar('umkm'));
        $produk = [
            "nama_produk" => $this->request->getVar('nama_produk'),
            "id_kategori" => $this->request->getVar('kategori'),
            "harga" => $this->request->getVar('harga'),
            "gambar_produk" => $namaGambar,
            "deskripsi" => $this->request->getVar('deskripsi'),
        ];
        $this->produk_model->addProduk($produk);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url() . '/Admin/Produk');
    }

    public function edit($id_produk)
    {
        $data = [
            "head" => "Edit Produk",
            "kategori" => $this->kategori_model->getKategori(),
            'validation' => \Config\Services::validation(),
            "produk" => $this->produk_model->satuProduk($id_produk)
        ];
        //dd($data);
        return view('admin/produk/edit', $data);
    }

    public function ubah()
    {
        $gambar_baru = $this->request->getFile('gambar_produk');
        $namaGambar = $this->request->getVar('gambar_lama');

        if (!$gambar_baru->getError() == 4) { //jika gambar baru tidak kosong

            if (!$this->validate([

                'gambar_produk' => [
                    'rules' => 'is_image[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih tidak disarankan'
                    ]
                ]
            ])) {
                return redirect()->to(base_url() . '/Admin/Produk/edit/' . $this->request->getVar('id_produk'))->withInput();
            }
            $fileGambar = $gambar_baru;
            $namaGambar = $fileGambar->getName();
            $foto = str_replace(" ", "_", $namaGambar); //mengganti semua spasi dalam nama file
            $namaGambar = date("is") . $foto; //menggabung menit detik dengan nama gambar
            $fileGambar->move('produk', $namaGambar);

            $gambar = $this->produk_model->satuProduk($this->request->getVar('id_produk'))['gambar_produk'];
            if (file_exists(base_url() . '/produk/' . $gambar)) {
                unlink('produk/' . $gambar);
            }
        }
        $produk = [
            "nama_produk" => $this->request->getVar('nama_produk'),
            "id_kategori" => $this->request->getVar('kategori'),
            "harga" => $this->request->getVar('harga'),
            "gambar_produk" => $namaGambar,
            "deskripsi" => $this->request->getVar('deskripsi')
        ];
        $this->produk_model->updateProduk($produk, $this->request->getVar('id_produk'));
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url() . '/Admin/Produk');
    }


    public function delete($id_produk)
    {
        $gambar = $this->produk_model->satuProduk($id_produk)['gambar_produk'];
        if ($gambar) {
            unlink('produk/' . $gambar);
        }
        $this->produk_model->hapusProduk($id_produk);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . '/Admin/Produk');
    }
}
