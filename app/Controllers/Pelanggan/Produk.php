<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Produk_model;
use App\Models\Kategori_model;
use App\Models\Pelanggan_model;
use App\Models\Pemesanan_model;
use App\Models\Pesanan_model;
use App\Models\Kota_model;

class Produk extends BaseController
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
        $data = [
            "head" => "Produk",
            "produk" => $this->produk_model->getProduk()
        ];
        //dd($data);
        return view('pelanggan/produk/all_produk', $data);
    }

    public function detail($id)
    {
        $data = [
            "head" => "Detail Produk",
            "produk" => $this->produk_model->detailProduk($id)
        ];
        //dd($data);
        return view('pelanggan/produk/detail', $data);
    }

    public function addCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getpost('id'),
            'qty'     => 1,
            'price'   => $this->request->getPost('harga'),
            'name'    => $this->request->getPost('nama'),
            'options' => array(
                'image' => $this->request->getPost('gambar')
            )
        ));
        session()->setFlashdata('sukses', 'Barang berhasil dimasukkan ke keranjang belanja');
        return redirect()->to(base_url('/Pelanggan/Produk'));
    }

    public function keranjang()
    {
        $data = [
            "head" => "Keranjang",
            'cart'      => \Config\services::cart()
        ];
        // dd($data);
        return view('pelanggan/produk/keranjang', $data);
    }

    public function updateCart()
    {
        $cart = \Config\services::cart();
        $i = 1;
        foreach ($cart->contents() as $produk) {
            $cart->update(array(
                'rowid'   => $produk['rowid'],
                'qty'     => $this->request->getPost('qty' . $i++),
            ));
        }
        session()->setFlashdata('sukses', 'Keranjang berhasil diupdate');
        return redirect()->to(base_url('Pelanggan/Produk/keranjang'));
    }

    public function hapusKeranjang($id)
    {
        $cart = \Config\Services::cart();
        $cart->remove($id);

        session()->setFlashdata('hapus', '1 produk telah dihapus dari keranjang');
        return redirect()->to(base_url('Pelanggan/Produk/keranjang'));
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('Pelanggan/Produk/keranjang'));
    }

    public function checkout()
    {

        $data = [
            'head' => 'Checkout',
            'cart' => \Config\Services::cart(),
            'getKota' => $this->kota_model->getKota(),
            'pelanggan' => $this->pelanggan_model->selectPelanggan(session()->get('id_pelanggan')),
            'validation'    => \Config\Services::validation()
        ];
        //dd($data);
        return view('pelanggan/produk/checkout', $data);
    }

    public function addCheckout()
    {

        //Faktur
        //dd(session()->get('id_pelanggan'));
        if ($this->request->getPost('metode') == 'transfer') {

            $no = 1;
            $this->pesanan_model->simpan([
                'id_pelanggan'        => session()->get('id_pelanggan'),
                'nama_penerima'      => $this->request->getPost('nama'),
                'telpon'            => $this->request->getPost('telpon'),
                'waktu_pembayaran'  => date('Y-m-d H:i:s', time() + 60 * 60 * 13),
                'alamat'            => $this->request->getPost('alamat'),
                'pesan'            => $this->request->getPost('pesan'),
                'metode_pembayaran' => $this->request->getPost('metode'),
                'aksi'              => 0
            ]);
            //mengambil id faktur terakhir
            $id_pesanan = $this->pesanan_model->insertID();

            $cart = \Config\Services::cart();
            foreach ($cart->contents() as $value) {
                $this->pemesanan_model->simpan([
                    'id_pesanan'         => $id_pesanan,
                    'id_pelanggan'         => session()->get('id_pelanggan'),
                    'id_produk'         => $value['id'],
                    'waktu_pemesanan'  => date('Y-m-d H:i:s', time() + 60 * 60 * 13),
                    'harga'             => $value['price'],
                    'jumlah'            => $value['qty'],
                    'id_kota'           => $this->request->getPost('ongkir'),
                    'total_pesanan'     => $value['subtotal']
                ]);
            }
            $cart->destroy();
            session()->setFlashdata('sukses', 'Pemesanan Berhasil, silahkan melakukan konfirmasi untuk pembayaran melalui tautan dibawah');
            return redirect()->to(base_url('Pelanggan/Produk/berhasil/' . $id_pesanan));
        } else if ($this->request->getPost('metode') == 'cod') {
            $no = 1;
            $this->pesanan_model->simpan([
                'id_pelanggan'       => session()->get('id_pelanggan'),
                'nama_penerima'     => $this->request->getPost('nama'),
                'telpon'            => $this->request->getPost('telpon'),
                'waktu_pembayaran'  => date('Y-m-d H:i:s', time() + 60 * 60 * 13),
                'alamat'            => $this->request->getPost('alamat'),
                'metode_pembayaran' => $this->request->getPost('metode'),
                'bukti_transfer'    => "cod_verifikasi.png",
                'aksi'              => 0

            ]);
            //mengambil id faktur terakhir
            $id_pesanan = $this->pesanan_model->insertID();

            $cart = \Config\Services::cart();
            foreach ($cart->contents() as $value) {
                $this->pemesanan_model->simpan([
                    'id_pesanan'         => $id_pesanan,
                    'id_pelanggan'         => session()->get('id_pelanggan'),
                    'id_produk'         => $value['id'],
                    'waktu_pemesanan'  => date('Y-m-d H:i:s', time() + 60 * 60 * 13),
                    'harga'             => $value['price'],
                    'jumlah'            => $value['qty'],
                    'id_kota'           => $this->request->getPost('ongkir'),
                    'total_pesanan'     => $value['subtotal']
                ]);
            }
            $cart->destroy();
            session()->setFlashdata('cod', 'Pemesanan metode COD Berhasil, harap menunggu pesanan kemudian melakukan pembayaran');
            return redirect()->to(base_url('Pelanggan'));
        }
    }

    public function berhasil($idPesanan)
    {
        $data = [
            'head'     => 'Upload Bukti',
            'cart'      => \Config\Services::cart(),
            'validation'    => \Config\Services::validation(),
            'idPesanan'  => $this->pesanan_model->getPesanan($idPesanan)
        ];
        //dd($data);
        return view('pelanggan/produk/berhasil', $data);
    }

    public function upload_bukti()
    {
        $namaFoto = "";
        $id_pesanan = $this->request->getVar('id_pesanan');
        // $bukti = $this->request->getFile('bukti');
        if (!$this->validate([

            'bukti' => [
                'rules' => 'max_size[bukti,5120]|is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar. maksimal 5 mb',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/Pelanggan/Produk/berhasil/' . $id_pesanan)->withInput();
        }
        $fileFoto = $this->request->getFile('bukti');
        if ($fileFoto->getError() == 4) {
            $gambarlama = $this->request->getVar('bukti_transfer');
            if (strlen($gambarlama) > 0) {
                $namaFoto = $gambarlama;
            }
        } else {
            $namaFoto = $fileFoto->getName();
            $foto = str_replace(" ", "_", $namaFoto); //mengganti semua spasi dalam nama file
            $namaFoto = date("is") . $foto;
            $fileFoto->move('bukti', $namaFoto);
            if (strlen($this->request->getVar('bukti_transfer')) > 0) {
                unlink(base_url() . '/bukti/' . $this->request->getVar('bukti_transfer'));
            }
        }
        $data = [
            'bukti_transfer' => $namaFoto,
        ];
        $this->pesanan_model->ubah($data, $id_pesanan);
        // $session->set(['foto' => $namaFoto]);
        //dd('berhasil');
        session()->setFlashdata('sukses', 'Upload Bukti Transfer Berhasil');
        return redirect()->to('/Pelanggan/Transaksi/pembayaran');

        //dd($data);
    }
}
