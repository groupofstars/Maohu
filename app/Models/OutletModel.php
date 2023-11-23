<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model
{
    protected $table = 'outlets';
    protected $allowedFields = ['id','email', 'password'];
    public function getOutlets()
    {
        $query = $this->db->table($this->table)->orderBy('id', 'ASC');
        return $query->get()->getResultArray();
    }
}