<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByCredential($username,$password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->where('status',1);
        $result = $this->db->get()->row_array();

        if(!$result)
            return false;
        return $result;
    }

    public function get_user($limit,$offset)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit($limit,$offset);

        $q  = $this->db->get()->result();

        if(!empty($q))
            return $q;
        return false;
    }

    public function count_users()
    {
        return $this->db->get('user')->num_rows();
    }

    public function insert_user($data)
    {
        $q= $this->db->insert('user',$data);
        if($q)
            return true;
        return false;
    }

    public function getUserById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$id);
        $q = $this->db->get()->row();

        if($q)
            return $q;
        return false;
    }

    public function update_user($id,$data)
    {
        $this->db->where('id_user', $id);
        $q = $this->db->update('user', $data); 
        if($q)
            return true;
        return false;
    }

    public function delete_user($id)
    {
         $this->db->delete('user', array('id_user' => $id)); 
    }
}