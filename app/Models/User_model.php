<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends model
{
    protected $table = 'user';

    public function getPemilik()
    {
        $this->select('user.*');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function selectUser($email)
    {
        $this->select('user.*');
        $this->where(['email' => $email]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function addUser($user)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($user);
    }
}
