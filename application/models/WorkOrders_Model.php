<?php

class WorkOrders_Model extends CI_Model
{

    public function getWorkOrdersById($work_order_id)
    {
        // $query = $this->db->get('workorders');
        // $this->db->where("ID", $work_order_id);

        $query = $this->db->get_where('workorders', array('ID' => $work_order_id));

        return $query->result();
    }

}
