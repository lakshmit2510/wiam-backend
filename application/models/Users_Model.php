<?php

class Users_Model extends CI_Model
{

    public function getUser($userName, $pass)
    {
        $query = $this->db->get_where('users', array('Email' => $userName, "Password" => $pass, "Active" => 1));

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

    public function getUserDetailsById($id)
    {
        $query = $this->db->get_where('users', array('Active' => 1, 'UserID' => $id));

        return $query->result();
    }

    public function isUserExists($email)
    {
        $query = $this->db->get_where('users', array('Email' => $email, 'Active' => 1));

        return $query->num_rows();
    }

    public function getUserByEmail($email)
    {
        $query = $this->db->get_where('users', array('Email' => $email, 'Active' => 1));

        return $query->row();
    }

    public function isEditUserExists($id, $email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('Email', $email);
        $this->db->where("UserID !=".$id); 
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function updateUsersById($user_id, $data)
    {
        $this->db->where('UserID', $user_id);
        $this->db->update('users', $data);

    }
}
