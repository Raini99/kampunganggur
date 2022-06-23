<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Emaill extends BaseController
{
    protected $attachment = 'produk/0110AHMAD_SANI.JPG';
    protected $to = 'bangjackcode@gmail.com';
    protected $title = 'Verifikasi Akun';
    protected $message = '<h2>Invoice Pembelian</h2>Kepada';



    public function test()
    {
        $cek = $this->sendEmail($this->attachment, $this->to, $this->title, $this->message);
        echo "<h1>" . $cek . "</h1>";
    }
    private function sendEmail($attachment, $to, $title, $message)
    {
        $email = \Config\Services::email();

        $email->setFrom('umkmbayan@gmail.com', 'umkm bayan');
        $email->setTo($to);

        $email->attach($attachment);

        $email->setSubject($title);
        $email->setMessage($message);

        if (!$email->send()) {
            return "gagal";
        } else {
            return "berhasil";
        }
    }
}
