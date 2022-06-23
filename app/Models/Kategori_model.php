<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends model
{
    protected $table = 'kategori';

    public function getKategori()
    {
        $this->select('kategori.*');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function satuKategori($id_kategori)
    {
        $this->select('kategori.*');
        $this->where(['id_kategori' => $id_kategori]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function addKategori($kategori)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($kategori);
    }

    public function updateKategori($kategori, $id_kategori)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_kategori', $id_kategori);
        return $builder->update($kategori);
    }

    public function hapusKategori($id_kategori)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_kategori' => $id_kategori]);
    }
}
