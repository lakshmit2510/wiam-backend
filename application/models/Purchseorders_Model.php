<?php

class Purchaseorders_Model extends CI_Model
{

    public function getAllPurchaseorders()
    {
        $query = $this->db->get('purchaseorders');

        return $query->result();
    }

    public function getPurchaseorderById($purchaseorder_id)
    {

        $query = $this->db->get_where('purchaseorders', array('' => $purchaseorder_id));

        return $query->result();
    }

    public function updatePurchaseordersById($purchaseorder_id, $data)
    {

        $this->db->where('', $purchaseorder_id);
        $this->db->update('purchaseorders', $data);

    }

    public function addNewPurchaseorder($data)
    {

        $this->db->insert('purchaseorders', $data);

    }
    public function deletePurchaseorderById($purchaseorder_id)
    {

        $this->db->delete('purchaseorders', array('' => $purchaseorder_id));

    }

}