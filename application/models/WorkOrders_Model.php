<?php

class WorkOrders_Model extends CI_Model
{

    public function getAllWorkOrders()
    {
        $query = $this->db->get('workorders');

        return $query->result();
    }

    public function getWorkOrdersById($work_order_id)
    {

        $query = $this->db->get_where('workorders', array('ID' => $work_order_id));

        return $query->result();
    }

    public function updateWorkOrdersById($work_order_id, $data)
    {

        $this->db->where('ID', $work_order_id);
        $this->db->update('workorders', $data);

    }

    public function createWorkOrder($data)
    {

        $this->db->insert('workorders', $data);

    }
    public function deleteWorkOrdersById($work_order_id)
    {

        $this->db->delete('workorders', array('ID' => $work_order_id));

    }

}
