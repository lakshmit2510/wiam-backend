<?php

class Users_Model extends CI_Model
{

    public function getUser($userName, $pass)
    {
        $query = $this->db->get_where('users', array('Email' => $userName, "Password" => $pass));

        return $query->result();
    }

    public function saveUser($data)
    {
        $this->db->insert('users', $data);
    }

    public function getAllUsers()
    {
        $query = $this->db->get_where('users', array('Active' => 1));

        return $query->result();
    }

    public function isUserExists($email)
    {
        $query = $this->db->get_where('users', array('Email' => $email));

        return $query->num_rows();
    }

    public function updateUsersById($user_id, $data)
    {
        $this->db->where('UserID', $user_id);
        $this->db->update('users', $data);

    }
}
