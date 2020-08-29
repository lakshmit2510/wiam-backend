<?php

class Vehicles_List_Model extends CI_Model
{
    public function getVehiclesList()
    {
        $query = $this->db->get_where('vehicles_list', array('Active' => 1));

        return $query->result();
    }

    public function saveVehicleDetails($data)
    {
        $this->db->insert('vehicles_list', $data);
    }

    public function getVehicleDetailsById($id)
    {
        $query = $this->db->get_where('vehicles_list', array('Active' => 1, 'VehicleID' => $id));

        return $query->result();
    }
}
