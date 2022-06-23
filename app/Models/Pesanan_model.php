<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesanan_model extends model
{
    protected $table = 'pesanan';

    public function simpan($pesanan)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($pesanan);
    }

    public function allData()
    {
        $this->select('pesanan.*');
        $this->orderBy('id_pesanan', 'DESC');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function allDataLimit()
    {
        $this->select('pesanan.*, pelanggan.nama_pelanggan');
        $this->join('pelanggan', 'pesanan.id_pelanggan=pelanggan.id_pelanggan');
        $this->orderBy('id_pesanan', 'ASC');
        $this->limit(4);
        $this->where('aksi', 0);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function getPesanan($id)
    {
        $this->select('pesanan.*');
        $this->where(['id_pesanan' => $id]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function getTransaksi($id)
    {
        $this->select('pesanan.*');
        $this->where(['id_pelanggan' => $id]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function dataPesanan($id)
    {
        $this->select('pesanan.*');
        $this->where(['id_pelanggan' => $id]);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function ubah($data, $id_pesanan)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_pesanan', $id_pesanan);
        return $builder->update($data);
    }

    public function hapus($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_pesanan' => $id]);
    }
}
