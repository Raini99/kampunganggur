<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User_model;
use App\Models\Pelanggan_model;

class LoginUser extends BaseController
{
    public function index()
    {
        //  helper(['form']);
        echo view('login_user');
    }

    public function auth()
    {
        $session = session();
        $usermodel = new User_model();
        $pelanggan = new Pelanggan_model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $id_pelanggan = "";
        $id = $pelanggan->cekEmail($email);
        if ($id) {
            $id_pelanggan = $id['id_pelanggan'];
        }

        $data = $usermodel->selectUser($email);
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_pelanggan'      => $id_pelanggan,
                    'username'      => $data['username'],
                    'email'      => $data['email'],
                    'level'         => $data['level'],
                    'akses_masuk'   => date("Y-m-d H:i:s", time() + (60 * 60 * 14)),
                    'logged_in'     => TRUE,
                    'status' => $data['level']
                ];
                $session->set($ses_data);
                // $session->set($ses_profil);
                if ($data['level'] == 'admin') {
                    return redirect()->to(base_url() . '/Admin');
                } elseif ($data['level'] == 'pelanggan') {
                    return redirect()->to(base_url() . '/Pelanggan');
                }
            } else {
                $session->setFlashdata('msg', 'Password Anda Salah !!');
                return redirect()->to(base_url() . '/LoginUser')->withInput();
            }
        } else {
            $session->setFlashdata('msg', 'ID Tidak Dikenal');
            return redirect()->to(base_url() . '/LoginUser')->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . '/LoginUser');
    }
}
