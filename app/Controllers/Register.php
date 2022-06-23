<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pelanggan_model;
use App\Models\User_model;

class Register extends BaseController
{
    protected $pelanggan_model;
    protected $user_model;

    public function __construct()
    {
        $this->pelanggan_model = new Pelanggan_model;
        $this->user_model = new User_model;
    }

    public function index()
    {

        // helper('text');
        $data = [
            "head" => "Tambah Produk",
            'validation' => \Config\Services::validation()
        ];
        // helper(['form']);
        //echo random_string('numeric', 5);
        return view('register', $data);
    }

    public function auth()
    {
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => 'password baru harus diisi.',
                    'min_length' => 'password minimal 4 karakter',
                    'max_length' => 'password maksimal 20 karakter'
                ]
            ],
            'pass_confir' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'konfirmasi password harus diisi.',
                    'matches'  => 'konfirmasi password tidak sesuai'
                ]
            ]
        ])) {
            // dd('gagal');
            return redirect()->to(base_url() . '/Register')->withInput();
        }
        // dd('berhasil');
        $nama = $this->request->getVar('nama_pelanggan');
        $no_hp = $this->request->getVar('no_hp');
        $email = $this->request->getVar('email');
        $alamat = $this->request->getVar('alamat');
        $password = $this->request->getVar('password');

        $pelanggan = [
            "nama_pelanggan" => $nama,
            "alamat" => $alamat,
            "no_hp" => $no_hp,
            "email" => $email,
        ];

        $akun = [
            "username" => str_replace(" ", "_", $nama),
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "level" => 'pelanggan',
        ];
        $this->user_model->addUser($akun);
        $save = $this->pelanggan_model->addPelanggan($pelanggan);

        // dd($data);

        // $tes = $this->kirim($kode_verifikasi, $email, $password);
        if ($save) {
            session()->setFlashdata('sukses', 'Akun Berhasil di daftarkan.');
            return redirect()->to(base_url() . '/LoginUser');
        } else {
            session()->setFlashdata('status', 'Akun Gagal di daftarkan coba cek data anda.');
            return redirect()->to(base_url() . '/Register')->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . '/');
    }
}
