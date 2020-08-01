<?php

class Purchaseorders_Model extends CI_Model
{

    public function getAllPurchaseorders()
    {
        $query = $this->db->get_where('purchaseorders', array('Active' => 1));

        return $query->result();
    }

    public function getPurchaseorderById($purchaseorder_id)
    {

        $query = $this->db->get_where('purchaseorders', array('PurchaseOrderID' => $purchaseorder_id));

        return $query->result();
    }

    public function updatePurchaseordersById($purchaseorder_id, $data)
    {

        $this->db->where('PurchaseOrderID', $purchaseorder_id);
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