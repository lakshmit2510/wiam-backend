<?php

class Suppliers_Model extends CI_Model
{

    public function getAllSuppliers()
    {
        $query = $this->db->get('suppliers');

        return $query->result();
    }

    public function getSuppliersById($suppliers_id)
    {

        $query = $this->db->get_where('suppliers', array('SupplierID' => $suppliers_id));

        return $query->result();
    }

    public function updateSuppliersById($suppliers_id, $data)
    {

        $this->db->where('SupplierID', $suppliers_id);
        $this->db->update('suppliers', $data);

    }

    public function addNewSupplier($data)
    {

        $this->db->insert('suppliers', $data);

    }
    public function deleteSupplierById($suppliers_id)
    {

        $this->db->delete('suppliers', array('SupplierID' => $suppliers_id));

    }

}