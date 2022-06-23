<?php

namespace App\Models;

use CodeIgniter\Model;

class Kota_model extends model
{
    protected $table = 'kota';

    public function getKota($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_kota' => $id]);
        }
    }


    public function insertKota($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }


    public function updateKota($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_kota', $id);
        return $builder->update($data);
    }

    public function deleteKota($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_kota' => $id]);
    }
}
