<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletPromotionItem extends Model
{
    protected $table = 'outlet_promotion_items';
    protected $allowedFields = ['id','outlet_id', 'avatar','name','description','status','created_at'];
    protected $primaryKey = 'id';
    public function getOutletPromotionItems()
    {
        $query = $this->db->table($this->table)
                          ->orderBy('id', 'ASC');
        return $query->get()->getResultArray();
    }
}