<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $allowedFields = ['id','date_time','outlet_id', 'Name','Qty','Pax','Gross','Discount','SST','SC','OtherCharge','Deliveryfee','Rounding','Nett','CASHTotal','CREDITTotal','CREDITCARDTotal','DEBIT_CARDTotal','DEBIT_CARDTotal','DUITNOWTotal','FEEDMETotal','MAYBANKQRTotal','TOUCHNGOTotal'];
    // protected $allowedFields = ['id','email', 'password'];
    public function getSales($limit = 10, $offset = 0)
    {
        $query = $this->db->table($this->table)
                          ->orderBy('id', 'DESC')
                          ->limit($limit, $offset);
        return $query->get()->getResultArray();
        
    }
    public function getSales_by_year($year = "2023")
    {
        $query = $this->db->table($this->table)
                          ->like('date_time', $year, 'after')
                          ->orderBy('date_time', 'ASC');
        return $query->get()->getResultArray();
    }
    public function get_sales_monthly_total()
    {
        $result=[];
        for($i=1;$i<=date('m');$i++) {
            $month='';
            if($i<10){
                $month='0'.$i;
            }
            else $month=$i;
            $query = $this->db->table($this->table)
                          ->like('date_time', date('Y-').$month, 'after')
                          ->get()->getResultArray();
            $value=0;
            foreach($query as $row){
                $value+=$row['Gross'];
            }
            $result[$i]=$value;
        }
        return $result;
    }
    

}