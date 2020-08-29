<?php

class Dashboard_Model extends CI_Model
{

    public function getTotalPartsList($type)
    {
        
        $this->db->select('count(PartsID) as Count,sum(CostPrice) as TotalCostPrice,sum(SellingPrice) as TotalSellingPrice,sum(SellingPrice)-sum(CostPrice) as GrossProfit');
        $this->db->from('parts');
        $this->db->where('parts.Active', 1);
        if(isset($type)) {
            $this->db->where('parts.Category', $type);
        }
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return array();
        }
    }

    public function getPartsListByCategoryA()
    {
        $this->db->select('count(PartsID) as Count,sum(CostPrice) as TotalCostPrice,sum(SellingPrice) as TotalSellingPrice,sum(SellingPrice)-sum(CostPrice) as GrossProfit');
        $this->db->from('parts');
        $this->db->where('parts.Active', 1);
        $this->db->where('parts.Category', 'High Value Stock');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return array();
        }
    }

}
