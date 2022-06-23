<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_model extends model
{
    protected $table = 'pelanggan';

    public function getPelanggan()
    {
        $this->select('pelanggan.*');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function selectPelanggan($id)
    {
        $this->select('pelanggan.*');
        $this->where(['id_pelanggan' => $id]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function cekEmail($email)
    {
        $this->select('pelanggan.*');
        $this->where(['email' => $email]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function addPelanggan($pelanggan)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($pelanggan);
    }

    public function updatePelanggan($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_pelanggan', $id);
        return $builder->update($data);
    }

    public function deletePelanggan($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_pelanggan' => $id]);
    }
}
