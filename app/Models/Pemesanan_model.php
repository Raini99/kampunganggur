<?php

namespace App\Models;

use CodeIgniter\Model;

class Pemesanan_model extends model
{
    protected $table = 'pemesanan';

    public function simpan($pemesanan)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($pemesanan);
    }

    public function hapusPesanan($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_pesanan' => $id]);
    }

    public function dataGroup()
    {
        // return $this->query("SELECT * FROM pembelian WHERE 
        // pembayaran.id_invoice = pembelian.id_invoice AND produk','produk.id_produk = pembelian.id_produk
        // GROUP BY id_produk")->getResultArray();
        return $this->db->table($this->table)
            ->select('pemesanan.*')
            // ->join('produk','produk.id_produk = pembelian.id_produk')
            ->selectSum('total_pesanan')
            ->groupBy('id_pesanan')
            ->get()->getResultArray();
    }

    public function listPesanan($id)
    {
        $this->select('pemesanan.*, produk.*');
        $this->join('produk', 'pemesanan.id_produk=produk.id_produk');
        $this->where(['id_pesanan' => $id]);
        $query = $this->get();
        return $query->getResultArray();
    }
}
