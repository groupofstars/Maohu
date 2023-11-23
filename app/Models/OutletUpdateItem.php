<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletUpdateItem extends Model
{
    protected $table = 'outlet_update_items';
    // protected $primaryKey = 'id';
    protected $allowedFields = ['id','outlet_id', 'avatar','name','description','status','created_at'];

    public function getOutletUpdateItems()
    {
        $query = $this->db->table($this->table)
                          ->orderBy('id', 'ASC');
        return $query->get()->getResultArray();
    }
    public function updateItem($item,$data)
    {
        $query = $this->db->table($this->table)
                          ->where('id', $item);
        return $query->update($data);
    }
}