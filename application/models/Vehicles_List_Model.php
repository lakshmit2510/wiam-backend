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

    public function getVehicleEmailByDate()
    {
        // $this->db->select('*');
        // $this->db->from('vehicles_list');
        // $this->db->where('Active', 1);
        // $this->db->where("PreventiveMaintenanceDate >=".$date); 
        // $query = $this->db->get();
        // return $query->result();

        $query = $this->db->query('SELECT * FROM vehicles_list WHERE `PreventiveMaintenanceDate` = CURRENT_DATE + 7')->result_array();

        return $query;
    }
}
