<?php

class Users_Model extends CI_Model
{

    public function getUser($userName, $pass)
    {
        $query = $this->db->get_where('users', array('UserName' => $userName, "Password" => $pass));

        return $query->result();
    }

    public function saveUser($data)
    {
        $this->db->insert('users', $data);
    }

    public function getAllUsers()
    {
        $query = $this->db->get('users');

        return $query->result();
    }
}
