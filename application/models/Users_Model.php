<?php

class Users_Model extends CI_Model
{

    public function getUser($userName, $pass)
    {
        $query = $this->db->get_where('users', array('UserName' => $userName, "Password" => $pass));

        return $query->result();
    }
}
