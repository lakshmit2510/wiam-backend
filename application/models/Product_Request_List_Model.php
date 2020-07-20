<?php

class Product_Request_List_Model extends CI_Model
{

    public function getAllRequestsList()
    {
        $this->db->select('*');
        $this->db->from('Product_Request_List');
        $this->db->where('Product_Request_List.Active', 1);
        $this->db->join('users', 'Product_Request_List.CreatedBy = users.UserID', 'LEFT');
        $this->db->join('vehicle_models', 'Product_Request_List.Model = vehicle_models.ModelId', 'LEFT');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->result();
        } else {
            return array();
        }
    }

    public function getAllVehicleModels()
    {
        $query = $this->db->get('vehicle_models');

        return $query->result();
    }

    public function getRequestsListById($Request_id)
    {

        $query = $this->db->get_where('Product_Request_List', array('RequestId' => $Request_id));

        return $query->result();
    }

    public function addRequestForm($record)
    {
        $this->db->insert('Product_Request_List', $record);
        return $this->db->insert_id();
    }

    public function getMax()
    {
        $this->db->select('max(RequestId) AS Booked');
        $r = $this->db->get('Product_Request_List')->row();
        return $r->Booked + 1;
    }

    public function updateRequestsListById($Request_id, $data)
    {

        $this->db->where('RequestId', $Request_id);
        $this->db->update('Product_Request_List', $data);
    }

    public function deleteRequestListById($Request_id, $data)
    {
        $this->db->where('RequestId', $Request_id);
        $this->db->update('Product_Request_List', $data);
    }

    public function updateStock($partId, $stock, $model)
    {
        // $this->db->where('ItemNumber', $partId);
        // $this->db->where('Model', $model);
        // $this->db->update('Product_Request_List', $data);
        $this->db->set('QTYInHand', 'QTYInHand-'  . $stock . '', false);
        $this->db->where('ItemNumber', $partId);
        $this->db->update('parts');
    }
}
