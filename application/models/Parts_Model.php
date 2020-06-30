<?php

class Parts_Model extends CI_Model
{

    public function getAllParts()
    {
        $query = $this->db->get('parts');

        return $query->result();
    }

    public function getPartsById($parts_id)
    {

        $query = $this->db->get_where('parts', array('PartsID' => $parts_id));

        return $query->result();
    }

    public function updatePartsById($parts_id, $data)
    {

        $this->db->where('PartsID', $parts_id);
        $this->db->update('parts', $data);
    }

    public function addNewPart($data)
    {

        $this->db->insert('parts', $data);
    }
    public function deletePartsById($parts_id)
    {

        $this->db->delete('parts', array('PartsID' => $parts_id));
    }
}
