<?php

class Product_Request_List_Model extends CI_Model
{

    public function getAllRequestsList()
    {
        $this->db->select('*');
        $this->db->from('Product_Request_List');
        $this->db->where('Product_Request_List.Active', 1);
        $this->db->join('users', 'Product_Request_List.CreatedBy = users.UserID', 'LEFT');
        $this->db->order_by('RequestId', 'DESC');
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

    public function getListByDateAndVNo($from, $to, $vNo, $Status)
    {
        $this->db->select('*, Product_Request_List.CreatedOn');
        $this->db->from('Product_Request_List');
        $this->db->where('Product_Request_List.Active', 1);
        if($Status){
            $this->db->where('Product_Request_List.Status', $Status);
        }
       
        $this->db->join('users', 'Product_Request_List.CreatedBy = users.UserID', 'LEFT');
        if ($vNo) {
            $this->db->where('VehicleNo', $vNo);
        }
        if ($from) {
            $this->db->where('Product_Request_List.CreatedOn >=', $from);
        }
        if ($to) {
            $this->db->where('Product_Request_List.CreatedOn <=', $to);
        }

        return $this->db->get()->result_array();
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

        $this->db->where('RequestFormNo', $Request_id);
        $this->db->update('Product_Request_List', $data);
    }

    public function updateStock($partId, $stock)
    {
        $this->db->set('QTYInHand', 'QTYInHand-'  . $stock . '', false);
        $this->db->where('PartsID', $partId);
        $this->db->update('parts');
    }

    public function updateCancelStock($partId, $stock)
    {
        $this->db->set('QTYInHand', 'QTYInHand+'  . $stock . '', false);
        $this->db->where('PartsID', $partId);
        $this->db->update('parts');
    }

    public function getVNos()
    {
        $this->db->distinct('VehicleNo');
        $this->db->select('VehicleNo');
        $this->db->from('Product_Request_List');
        return $this->db->get()->result_array();
    }

}
