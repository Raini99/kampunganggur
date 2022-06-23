<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk_model extends model
{
    protected $table = 'produk';

    public function getProduk()
    {
        $this->select('produk.*, kategori.*');
        $this->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function getLimit()
    {
        $this->select('produk.*, kategori.*');
        $this->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->limit(4);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function detailProduk($id_produk)
    {
        $this->select('produk.*, kategori.*');
        $this->join('kategori', 'kategori.id_kategori=produk.id_kategori');
        $this->where(['id_produk' => $id_produk]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function satuProduk($id_produk)
    {
        $this->select('produk.*');
        $this->where(['id_produk' => $id_produk]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function addProduk($produk)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($produk);
    }

    public function updateProduk($produk, $id_produk)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_produk', $id_produk);
        return $builder->update($produk);
    }

    public function hapusProduk($id_produk)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_produk' => $id_produk]);
    }
}
